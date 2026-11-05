import fs from 'fs';

const TMP_CONTACTS_FILE = '/tmp/contacts_store.json';

const SEED_CONTACTS = [
    {
        id: 4,
        name: "joko",
        email: "joko@gmail.com",
        message: "kapan palo nya",
        created_at: new Date(Date.now() - 2 * 3600 * 1000).toISOString()
    },
    {
        id: 3,
        name: "lukman",
        email: "lukman@gmail.com",
        message: "gelokk euy",
        created_at: new Date(Date.now() - 5 * 3600 * 1000).toISOString()
    },
    {
        id: 2,
        name: "Pengunjung Web",
        email: "pengunjung@domain.com",
        message: "Halo mas Thoriq! Ini pesan uji coba langsung ke panel admin.",
        created_at: new Date(Date.now() - 10 * 3600 * 1000).toISOString()
    },
    {
        id: 1,
        name: "Budi Traveler",
        email: "budi@traveler.com",
        message: "Halo Thoriq! Rekomendasi spot hiking dan foto pemandangannya sangat keren! Ada rencana trip ke gunung mana lagi berikutnya?",
        created_at: new Date(Date.now() - 24 * 3600 * 1000).toISOString()
    }
];

function getStoredContacts() {
    try {
        if (fs.existsSync(TMP_CONTACTS_FILE)) {
            const data = fs.readFileSync(TMP_CONTACTS_FILE, 'utf8');
            const parsed = JSON.parse(data);
            if (Array.isArray(parsed) && parsed.length > 0) {
                return parsed;
            }
        }
    } catch (e) {}
    return [...SEED_CONTACTS];
}

function saveStoredContacts(list) {
    try {
        fs.writeFileSync(TMP_CONTACTS_FILE, JSON.stringify(list), 'utf8');
    } catch (e) {}
}

export default async function handler(req, res) {
    // Set CORS headers
    res.setHeader('Access-Control-Allow-Credentials', 'true');
    res.setHeader('Access-Control-Allow-Origin', '*');
    res.setHeader('Access-Control-Allow-Methods', 'GET,OPTIONS,PATCH,DELETE,POST,PUT');
    res.setHeader(
        'Access-Control-Allow-Headers',
        'X-CSRF-Token, X-Requested-With, Accept, Accept-Version, Content-Length, Content-MD5, Content-Type, Date, X-Api-Version'
    );

    if (req.method === 'OPTIONS') {
        res.status(200).end();
        return;
    }

    const supabaseUrl = process.env.SUPABASE_URL;
    const supabaseKey = process.env.SUPABASE_ANON_KEY;

    // 1. GET Contacts (untuk disinkronkan ke panel admin Laravel)
    if (req.method === 'GET') {
        if (supabaseUrl && supabaseKey) {
            try {
                const response = await fetch(`${supabaseUrl}/rest/v1/contacts?select=*&order=created_at.desc&limit=50`, {
                    headers: {
                        'apikey': supabaseKey,
                        'Authorization': `Bearer ${supabaseKey}`
                    }
                });
                if (response.ok) {
                    const data = await response.json();
                    return res.status(200).json({ success: true, data });
                }
            } catch (err) {
                console.error('Supabase fetch contacts error:', err);
            }
        }

        const contacts = getStoredContacts();
        return res.status(200).json({ success: true, data: contacts });
    }

    // 2. POST New Contact Message
    if (req.method === 'POST') {
        try {
            let body = req.body;
            if (typeof body === 'string') {
                try { body = JSON.parse(body); } catch (e) { body = {}; }
            } else if (!body) {
                body = {};
            }

            const { name, email, message } = body;

            if (!name || !email || !message) {
                return res.status(400).json({
                    success: false,
                    message: 'Nama lengkap, email, dan pesan wajib diisi.'
                });
            }

            const newContact = {
                id: Date.now(),
                name: String(name).trim().slice(0, 100),
                email: String(email).trim().slice(0, 150),
                message: String(message).trim().slice(0, 2000),
                created_at: new Date().toISOString()
            };

            const adminEmail = process.env.ADMIN_EMAIL || 'oiqgemink27@gmail.com';

            // Kirim email notifikasi ke admin via FormSubmit
            try {
                await fetch(`https://formsubmit.co/ajax/${adminEmail}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        name: newContact.name,
                        email: newContact.email,
                        message: newContact.message,
                        _subject: `Pesan Baru Portofolio dari ${newContact.name}`,
                        _captcha: 'false',
                        _template: 'table'
                    })
                });
            } catch (err) {
                console.error('Error forwarding to FormSubmit:', err);
            }

            // Simpan ke Supabase jika terhubung
            if (supabaseUrl && supabaseKey) {
                try {
                    await fetch(`${supabaseUrl}/rest/v1/contacts`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'apikey': supabaseKey,
                            'Authorization': `Bearer ${supabaseKey}`,
                            'Prefer': 'return=minimal'
                        },
                        body: JSON.stringify({
                            name: newContact.name,
                            email: newContact.email,
                            message: newContact.message
                        })
                    });
                } catch (err) {
                    console.error('Supabase write contact error:', err);
                }
            }

            // Simpan ke storage serverless
            const list = getStoredContacts();
            list.unshift(newContact);
            saveStoredContacts(list.slice(0, 50));

            return res.status(200).json({
                success: true,
                message: 'Terima kasih! Pesan kamu berhasil dikirim.',
                contact: newContact
            });
        } catch (error) {
            console.error('Contact API Error:', error);
            return res.status(500).json({
                success: false,
                message: 'Terjadi kendala saat memproses pesan.'
            });
        }
    }

    return res.status(405).json({ success: false, message: 'Method Not Allowed' });
}
