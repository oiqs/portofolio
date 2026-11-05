import fs from 'fs';

// Seed default comments
const DEFAULT_COMMENTS = [
    {
        id: 1,
        name: "Thoriq Admin",
        message: "Halo selamat datang di portofolio saya!",
        avatar: "https://api.dicebear.com/7.x/adventurer/svg?seed=Thoriq+Admin",
        created_at: new Date(Date.now() - 22 * 3600 * 1000).toISOString(),
        time_ago: "22 jam yang lalu"
    }
];

const TMP_FILE = '/tmp/comments_store.json';

function getStoredComments() {
    try {
        if (fs.existsSync(TMP_FILE)) {
            const data = fs.readFileSync(TMP_FILE, 'utf8');
            const parsed = JSON.parse(data);
            if (Array.isArray(parsed) && parsed.length > 0) {
                return parsed;
            }
        }
    } catch (e) {}
    return [...DEFAULT_COMMENTS];
}

function saveComments(list) {
    try {
        fs.writeFileSync(TMP_FILE, JSON.stringify(list), 'utf8');
    } catch (e) {}
}

export default async function handler(req, res) {
    // CORS headers
    res.setHeader('Access-Control-Allow-Credentials', 'true');
    res.setHeader('Access-Control-Allow-Origin', '*');
    res.setHeader('Access-Control-Allow-Methods', 'GET,OPTIONS,PATCH,DELETE,POST,PUT');
    res.setHeader(
        'Access-Control-Allow-Headers',
        'X-CSRF-Token, X-Requested-With, Accept, Accept-Version, Content-Length, Content-MD5, Content-Type, Date, X-Api-Version'
    );

    if (req.method === 'OPTIONS') {
        return res.status(200).end();
    }

    const supabaseUrl = process.env.SUPABASE_URL;
    const supabaseKey = process.env.SUPABASE_ANON_KEY;

    // 1. GET Comments
    if (req.method === 'GET') {
        if (supabaseUrl && supabaseKey) {
            try {
                const response = await fetch(`${supabaseUrl}/rest/v1/comments?select=*&order=created_at.desc&limit=50`, {
                    headers: {
                        'apikey': supabaseKey,
                        'Authorization': `Bearer ${supabaseKey}`
                    }
                });
                if (response.ok) {
                    const data = await response.json();
                    return res.status(200).json({ status: 'success', data });
                }
            } catch (err) {
                console.error('Supabase fetch error:', err);
            }
        }

        const comments = getStoredComments();
        return res.status(200).json({ status: 'success', data: comments });
    }

    // 2. POST New Comment
    if (req.method === 'POST') {
        try {
            const body = typeof req.body === 'string' ? JSON.parse(req.body) : req.body || {};
            const { name, message, avatar } = body;

            if (!name || !message) {
                return res.status(400).json({ status: 'error', message: 'Nama dan pesan komentar wajib diisi.' });
            }

            const cleanAvatar = avatar || `https://api.dicebear.com/7.x/adventurer/svg?seed=${encodeURIComponent(name)}`;
            const newComment = {
                id: Date.now(),
                name: name.trim().slice(0, 100),
                message: message.trim().slice(0, 1000),
                avatar: cleanAvatar,
                created_at: new Date().toISOString(),
                time_ago: 'Baru saja'
            };

            // Simpan ke Supabase jika terhubung
            if (supabaseUrl && supabaseKey) {
                try {
                    await fetch(`${supabaseUrl}/rest/v1/comments`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'apikey': supabaseKey,
                            'Authorization': `Bearer ${supabaseKey}`,
                            'Prefer': 'return=minimal'
                        },
                        body: JSON.stringify({
                            name: newComment.name,
                            message: newComment.message,
                            avatar: newComment.avatar
                        })
                    });
                } catch (err) {
                    console.error('Supabase write error:', err);
                }
            }

            // Simpan ke storage serverless
            const list = getStoredComments();
            list.unshift(newComment);
            saveComments(list.slice(0, 50));

            return res.status(201).json({
                status: 'success',
                message: 'Komentar berhasil dikirim!',
                data: newComment
            });
        } catch (error) {
            console.error('Post comment error:', error);
            return res.status(500).json({ status: 'error', message: 'Gagal memproses komentar.' });
        }
    }

    return res.status(405).json({ status: 'error', message: 'Method Not Allowed' });
}
