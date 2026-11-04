@extends('layouts.app')

@section('title', 'Contact — Thoriq Alfurqan M.L')

@section('content')

<section class="max-w-6xl mx-auto px-6 md:px-10 pt-24 pb-32 grid md:grid-cols-5 gap-16">

    {{-- KIRI: INFO --}}
    <div class="md:col-span-2">
        <p class="text-sm font-medium text-accent tracking-widest uppercase mb-6">{{ __('Kontak') }}</p>
        <h1 class="font-display text-4xl md:text-5xl font-bold leading-[1.2] mb-8">
            {{ __('Mari') }} {{ __('berbicara.') }}
        </h1>
        <p class="text-muted text-lg leading-relaxed mb-12">
            {{ __('Punya rekomendasi tempat healing menarik, destinasi traveling seru, atau sekadar ingin sapa dan berdiskusi? Kirim pesan lewat form di bawah!') }}
        </p>

        <div class="space-y-6 text-sm">
            <p class="flex flex-col gap-2">
                <span class="text-muted tracking-widest uppercase text-xs">Email</span>
                <a href="mailto:oiqgemink27@gmail.com" class="text-lg hover:text-accent transition-colors font-medium">oiqgemink27@gmail.com</a>
            </p>
            <p class="flex flex-col gap-2">
                <span class="text-muted tracking-widest uppercase text-xs">{{ __('Sosial Media') }}</span>
                <span class="flex gap-4">
                    <a href="https://www.instagram.com/thrqfrqn_/" target="_blank" rel="noopener" class="text-lg hover:text-accent transition-colors font-medium">Instagram</a>
                    <span class="text-muted">&bull;</span>
                    <a href="https://wa.me/628972189558" target="_blank" rel="noopener" class="text-lg hover:text-accent transition-colors font-medium">WhatsApp</a>
                </span>
            </p>
        </div>
    </div>

    {{-- KANAN: FORM --}}
    <div class="md:col-span-3 bg-white/85 dark:bg-[#121620]/90 backdrop-blur-xl border border-ink/10 dark:border-white/10 shadow-xl shadow-black/5 dark:shadow-black/30 rounded-3xl p-8 md:p-12 relative overflow-hidden">
        <div class="absolute -right-16 -top-16 w-48 h-48 bg-accent/10 rounded-full blur-3xl pointer-events-none"></div>

        <div id="contact-alert" class="hidden mb-8 px-6 py-5 rounded-2xl font-medium transition-all duration-300"></div>

        @if (session('success'))
            <div class="mb-8 px-6 py-5 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 dark:text-emerald-400 font-medium">
                {{ session('success') }}
            </div>
        @endif

        <form id="contact-form" method="POST" action="{{ url('/contact') }}" class="space-y-8">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium tracking-wide mb-3">{{ __('Nama Lengkap') }}</label>
                <input type="text" name="name" id="name" required value="{{ old('name') }}"
                    class="w-full px-5 py-4 rounded-xl border border-ink/10 bg-transparent focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none transition-all placeholder:text-muted/50"
                    placeholder="{{ __('Masukkan nama Anda') }}">
                @error('name')
                    <p class="text-sm text-red-400 mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium tracking-wide mb-3">{{ __('Alamat Email') }}</label>
                <input type="email" name="email" id="email" required value="{{ old('email') }}"
                    class="w-full px-5 py-4 rounded-xl border border-ink/10 bg-transparent focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none transition-all placeholder:text-muted/50"
                    placeholder="email@domain.com">
                @error('email')
                    <p class="text-sm text-red-400 mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="message" class="block text-sm font-medium tracking-wide mb-3">{{ __('Pesan Anda') }}</label>
                <textarea name="message" id="message" rows="6" required
                    class="w-full px-5 py-4 rounded-xl border border-ink/10 bg-transparent focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none transition-all resize-none placeholder:text-muted/50"
                    placeholder="{{ __('Bagikan tempat healing favorit Anda atau pesan hangat lainnya...') }}">{{ old('message') }}</textarea>
                @error('message')
                    <p class="text-sm text-red-400 mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col sm:flex-row items-center justify-between gap-6 pt-2">
                <button type="submit" id="btn-submit"
                    class="w-full sm:w-auto inline-flex items-center justify-center gap-3 px-10 py-4 rounded-full bg-accent text-paper hover:bg-accent-dark transition-all duration-300 hover:-translate-y-0.5 hover:shadow-xl hover:shadow-accent/25 font-semibold tracking-wide cursor-pointer text-center">
                    <svg id="btn-spinner" class="hidden w-5 h-5 animate-spin text-paper" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                    </svg>
                    <svg id="btn-icon" class="w-5 h-5 fill-none stroke-current" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="22" y1="2" x2="11" y2="13"></line>
                        <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                    </svg>
                    <span id="btn-text">{{ __('Kirim Pesan') }}</span>
                </button>

                <div class="text-sm text-muted flex items-center gap-2">
                    <span>{{ __('Atau ingin chat langsung?') }}</span>
                    <a href="https://wa.me/628972189558" target="_blank" rel="noopener" class="text-accent hover:underline font-medium inline-flex items-center gap-1">
                        WhatsApp &rarr;
                    </a>
                </div>
            </div>
        </form>
    </div>

</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contact-form');
    const alertBox = document.getElementById('contact-alert');
    const submitBtn = document.getElementById('btn-submit');
    const btnSpinner = document.getElementById('btn-spinner');
    const btnIcon = document.getElementById('btn-icon');
    const btnText = document.getElementById('btn-text');

    // KONFIGURASI PENGIRIMAN DI VERCEL:
    // Pilihan 1: Formspree (Rekomendasi - gratis + ada dashboard admin online)
    // Daftar di https://formspree.io pakai email oiqgemink27@gmail.com, lalu masukkan Form ID Anda di bawah ini:
    const FORMSPREE_ID = ''; // Contoh: 'xpwalzkq' atau 'https://formspree.io/f/xpwalzkq'

    // Pilihan 2: Web3Forms (Akses key instan di https://web3forms.com)
    const WEB3FORMS_KEY = ''; // Contoh: 'a1b2c3d4-e5f6-7890-abcd-ef1234567890'

    const ADMIN_EMAIL = 'oiqgemink27@gmail.com';
    const ADMIN_WA = '628972189558';

    function showAlert(type, htmlContent) {
        if (!alertBox) return;
        alertBox.className = type === 'success'
            ? 'mb-8 px-6 py-5 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 dark:text-emerald-400 font-medium transition-all duration-300'
            : 'mb-8 px-6 py-5 rounded-2xl bg-red-500/10 border border-red-500/20 text-red-600 dark:text-red-400 font-medium transition-all duration-300';
        alertBox.innerHTML = htmlContent;
        alertBox.classList.remove('hidden');
        alertBox.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }

    if (form) {
        form.addEventListener('submit', async function(e) {
            e.preventDefault();

            const nameInput = document.getElementById('name');
            const emailInput = document.getElementById('email');
            const messageInput = document.getElementById('message');

            const name = nameInput ? nameInput.value.trim() : '';
            const email = emailInput ? emailInput.value.trim() : '';
            const message = messageInput ? messageInput.value.trim() : '';

            if (!name || !email || !message) {
                showAlert('error', '{{ __("Mohon lengkapi semua kolom formulir.") }}');
                return;
            }

            // Set loading state
            if (submitBtn) submitBtn.disabled = true;
            if (btnSpinner) btnSpinner.classList.remove('hidden');
            if (btnIcon) btnIcon.classList.add('hidden');
            if (btnText) btnText.textContent = '{{ __("Mengirim...") }}';

            // Cek apakah sedang dijalankan di Localhost (Laragon) atau Vercel / Production
            const isLocal = ['localhost', '127.0.0.1'].includes(window.location.hostname) || 
                            window.location.hostname.endsWith('.test') || 
                            window.location.port !== '';

            let success = false;
            let successMsg = '';

            try {
                if (isLocal) {
                    // MODE LOKAL (LARAGON): Kirim ke backend Laravel & simpan ke Database MySQL (Panel Admin)
                    const csrfInput = form.querySelector('input[name="_token"]');
                    const csrfToken = csrfInput ? csrfInput.value : '';

                    const response = await fetch('{{ url("/contact") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: JSON.stringify({ name, email, message })
                    });

                    if (response.ok) {
                        const resData = await response.json();
                        success = true;
                        successMsg = resData.message || '{{ __("Pesan berhasil dikirim dan tersimpan di database Panel Admin!") }}';
                    } else {
                        throw new Error('Gagal menyimpan ke database lokal (Status: ' + response.status + ')');
                    }
                } else {
                    // MODE VERCEL (PRODUCTION):
                    // 1. Coba kirim via Formspree jika diset
                    if (FORMSPREE_ID && FORMSPREE_ID.trim() !== '') {
                        const endpoint = FORMSPREE_ID.startsWith('http') 
                            ? FORMSPREE_ID 
                            : 'https://formspree.io/f/' + FORMSPREE_ID;

                        const response = await fetch(endpoint, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json'
                            },
                            body: JSON.stringify({ name, email, message })
                        });

                        if (response.ok) {
                            success = true;
                            successMsg = '{{ __("Terima kasih! Pesan kamu berhasil dikirim ke email admin (oiqgemink27@gmail.com).") }}';
                        } else {
                            throw new Error('Layanan Formspree error status: ' + response.status);
                        }
                    } else if (WEB3FORMS_KEY && WEB3FORMS_KEY.trim() !== '') {
                        const response = await fetch('https://api.web3forms.com/submit', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json'
                            },
                            body: JSON.stringify({
                                access_key: WEB3FORMS_KEY,
                                name: name,
                                email: email,
                                message: message,
                                subject: 'Pesan Baru Portofolio dari ' + name
                            })
                        });

                        const resJson = await response.json();
                        if (response.ok && resJson.success) {
                            success = true;
                            successMsg = '{{ __("Terima kasih! Pesan kamu berhasil dikirim ke email admin (oiqgemink27@gmail.com).") }}';
                        } else {
                            throw new Error(resJson.message || 'Gagal mengirim via Web3Forms');
                        }
                    } else {
                        // 2. Default Vercel: Kirim via Serverless API (/api/contact)
                        const response = await fetch('/api/contact', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json'
                            },
                            body: JSON.stringify({ name, email, message })
                        });

                        if (response.ok) {
                            const resData = await response.json();
                            success = true;
                            successMsg = resData.message || '{{ __("Terima kasih! Pesan kamu berhasil dikirim ke email admin (oiqgemink27@gmail.com).") }}';
                        } else {
                            throw new Error('Gagal mengirim via serverless API (Status: ' + response.status + ')');
                        }
                    }
                }
            } catch (err) {
                // Jika terjadi kegagalan jaringan atau server error
                const waText = "Halo Thoriq! Saya *" + name + "* (" + email + ").\n\nPesan:\n" + message;
                const waUrl = "https://wa.me/" + ADMIN_WA + "?text=" + encodeURIComponent(waText);
                const mailUrl = "mailto:" + ADMIN_EMAIL + "?subject=" + encodeURIComponent("Pesan Portofolio dari " + name) + "&body=" + encodeURIComponent(message);

                showAlert('error', `
                    <div class="space-y-3">
                        <p class="font-bold">⚠️ Pengiriman Otomatis Terkendala</p>
                        <p class="text-sm opacity-90">Koneksi pengiriman otomatis tidak dapat menjangkau server saat ini. Anda dapat langsung mengirim pesan ini via:</p>
                        <div class="flex flex-wrap items-center gap-3 pt-1">
                            <a href="${waUrl}" target="_blank" rel="noopener" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-emerald-600 text-white font-semibold text-xs hover:bg-emerald-700 transition-all">
                                <span>💬 Kirim via WhatsApp</span> &rarr;
                            </a>
                            <a href="${mailUrl}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-ink/10 dark:bg-white/10 text-ink dark:text-white font-semibold text-xs hover:bg-accent hover:text-white transition-all">
                                <span>✉️ Kirim via Email</span> &rarr;
                            </a>
                        </div>
                    </div>
                `);

                if (submitBtn) submitBtn.disabled = false;
                if (btnSpinner) btnSpinner.classList.add('hidden');
                if (btnIcon) btnIcon.classList.remove('hidden');
                if (btnText) btnText.textContent = '{{ __("Kirim Pesan") }}';
                return;
            }

            // Reset loading state
            if (submitBtn) submitBtn.disabled = false;
            if (btnSpinner) btnSpinner.classList.add('hidden');
            if (btnIcon) btnIcon.classList.remove('hidden');
            if (btnText) btnText.textContent = '{{ __("Kirim Pesan") }}';

            if (success) {
                form.reset();
                showAlert('success', successMsg);
            }
        });
    }
});
</script>

@endsection
