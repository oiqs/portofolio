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

    function showAlert(type, text) {
        if (!alertBox) return;
        alertBox.className = type === 'success'
            ? 'mb-8 px-6 py-5 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 dark:text-emerald-400 font-medium transition-all duration-300'
            : 'mb-8 px-6 py-5 rounded-2xl bg-red-500/10 border border-red-500/20 text-red-600 dark:text-red-400 font-medium transition-all duration-300';
        alertBox.textContent = text;
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

            const csrfInput = form.querySelector('input[name="_token"]');
            const csrfToken = csrfInput ? csrfInput.value : '';

            // 1. Submit to local/backend endpoint (saves to database contacts table for Admin Panel)
            const backendPromise = fetch('{{ url("/contact") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ name, email, message })
            }).catch(() => null);

            // 2. Submit to FormSubmit.co endpoint (delivers real email directly to oiqgemink27@gmail.com on Vercel & anywhere)
            const emailPromise = fetch('https://formsubmit.co/ajax/oiqgemink27@gmail.com', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    name: name,
                    email: email,
                    message: message,
                    _subject: 'Pesan Baru Portofolio dari ' + name,
                    _captcha: 'false',
                    _template: 'table'
                })
            }).catch(() => null);

            // Wait for both to attempt
            await Promise.allSettled([backendPromise, emailPromise]);

            // Reset loading state
            if (submitBtn) submitBtn.disabled = false;
            if (btnSpinner) btnSpinner.classList.add('hidden');
            if (btnIcon) btnIcon.classList.remove('hidden');
            if (btnText) btnText.textContent = '{{ __("Kirim Pesan") }}';

            form.reset();
            showAlert('success', '{{ __("Terima kasih! Pesan kamu berhasil dikirim ke email admin (oiqgemink27@gmail.com) dan tersimpan.") }}');
        });
    }
});
</script>

@endsection
