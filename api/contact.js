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

    if (req.method !== 'POST') {
        return res.status(405).json({ success: false, message: 'Method Not Allowed' });
    }

    try {
        const body = typeof req.body === 'string' ? JSON.parse(req.body) : req.body || {};
        const { name, email, message } = body;

        if (!name || !email || !message) {
            return res.status(400).json({
                success: false,
                message: 'Nama lengkap, email, dan pesan wajib diisi.'
            });
        }

        const adminEmail = process.env.ADMIN_EMAIL || 'oiqgemink27@gmail.com';

        // 1. Submit ke FormSubmit via Vercel Cloud Server (Bebas dari blokir ISP Indonesia)
        let emailDelivered = false;
        try {
            const formSubmitRes = await fetch(`https://formsubmit.co/ajax/${adminEmail}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    name: name,
                    email: email,
                    message: message,
                    _subject: `Pesan Baru Portofolio dari ${name}`,
                    _captcha: 'false',
                    _template: 'table'
                })
            });

            if (formSubmitRes.ok) {
                emailDelivered = true;
            }
        } catch (err) {
            console.error('Error forwarding to FormSubmit:', err);
        }

        return res.status(200).json({
            success: true,
            message: 'Terima kasih! Pesan kamu berhasil dikirim ke email admin (oiqgemink27@gmail.com).',
            emailDelivered: emailDelivered,
            contact: {
                name,
                email,
                message,
                created_at: new Date().toISOString()
            }
        });
    } catch (error) {
        console.error('Contact API Error:', error);
        return res.status(500).json({
            success: false,
            message: 'Terjadi kendala saat memproses pesan.'
        });
    }
}
