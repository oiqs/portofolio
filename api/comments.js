import fs from 'fs';

// Seed default comments (tersinkronkan dengan database portofolio lokal)
const DEFAULT_COMMENTS = [
    {
        "id": 7,
        "name": "Sun",
        "message": "Deyymmmm",
        "avatar": "https://api.dicebear.com/7.x/adventurer/svg?seed=Sun",
        "created_at": "2026-11-05T13:28:41.000000Z"
    },
    {
        "id": 4,
        "name": "cah mumet",
        "message": "haoo",
        "avatar": "https://api.dicebear.com/7.x/adventurer/svg?seed=cah%20mumet",
        "created_at": "2026-11-05T13:13:38.000000Z"
    },
    {
        "id": 5,
        "name": "Raul",
        "message": "Kapan praunya",
        "avatar": "https://api.dicebear.com/7.x/adventurer/svg?seed=raul",
        "created_at": "2026-11-05T13:13:38.000000Z"
    },
    {
        "id": 6,
        "name": "joko",
        "message": "mana palonya",
        "avatar": "https://api.dicebear.com/7.x/adventurer/svg?seed=joko",
        "created_at": "2026-11-05T13:13:38.000000Z"
    },
    {
        "id": 1,
        "name": "Thoriq Admin",
        "message": "Halo selamat datang di portofolio saya!",
        "avatar": "https://api.dicebear.com/7.x/adventurer/svg?seed=Thoriq+Admin",
        "created_at": "2026-11-04T13:03:28.000000Z"
    }
];

const TMP_FILE = '/tmp/comments_store.json';

function getStoredComments() {
    try {
        if (fs.existsSync(TMP_FILE)) {
            const data = fs.readFileSync(TMP_FILE, 'utf8');
            const parsed = JSON.parse(data);
            if (Array.isArray(parsed) && parsed.length > 0) {
                // Gabungkan komentar yang ada di /tmp dengan DEFAULT_COMMENTS
                const map = new Map();
                for (const c of parsed) {
                    if (c && c.name && c.message) {
                        map.set(`${c.name.trim().toLowerCase()}|${c.message.trim().toLowerCase()}`, c);
                    }
                }
                for (const c of DEFAULT_COMMENTS) {
                    const key = `${c.name.trim().toLowerCase()}|${c.message.trim().toLowerCase()}`;
                    if (!map.has(key)) {
                        map.set(key, c);
                    }
                }
                return Array.from(map.values()).sort((a, b) => new Date(b.created_at) - new Date(a.created_at));
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
                created_at: new Date().toISOString()
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

            // Kirim notifikasi email ke admin via FormSubmit
            const adminEmail = process.env.ADMIN_EMAIL || 'oiqgemink27@gmail.com';
            try {
                fetch(`https://formsubmit.co/ajax/${adminEmail}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        name: newComment.name,
                        message: newComment.message,
                        _subject: `Komentar Baru Buku Tamu dari ${newComment.name}`,
                        _captcha: 'false',
                        _template: 'table'
                    })
                }).catch(() => null);
            } catch (err) {}

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
