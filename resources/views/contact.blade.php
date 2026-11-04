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

        <div id="contact-alert" class="hidden mb-8 px-6 py-5 rounded-2xl bg-accent/10 border border-accent/20 text-accent font-medium transition-all duration-300"></div>

        @if (session('success'))
            <div class="mb-8 px-6 py-5 rounded-2xl bg-accent/10 border border-accent/20 text-accent font-medium">
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

            <div class="flex flex-col sm:flex-row gap-4 pt-2">
                <button type="submit" id="btn-submit-wa"
                    class="flex-1 inline-flex items-center justify-center gap-2.5 px-8 py-4 rounded-full bg-accent text-paper hover:bg-accent-dark transition-all duration-300 hover:-translate-y-0.5 hover:shadow-xl hover:shadow-accent/25 font-semibold tracking-wide cursor-pointer text-center">
                    <svg class="w-5 h-5 fill-current shrink-0" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a5.8 5.8 0 00-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                    <span>{{ __('Kirim via WhatsApp') }}</span>
                </button>

                <button type="button" id="btn-submit-email"
                    class="flex-1 inline-flex items-center justify-center gap-2.5 px-8 py-4 rounded-full border border-ink/15 dark:border-white/15 text-ink dark:text-white hover:border-accent hover:text-accent transition-all duration-300 hover:-translate-y-0.5 font-semibold tracking-wide cursor-pointer text-center">
                    <svg class="w-5 h-5 fill-none stroke-current shrink-0" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                    <span>{{ __('Kirim via Email') }}</span>
                </button>
            </div>
        </form>
    </div>

</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contact-form');
    const alertBox = document.getElementById('contact-alert');
    const emailBtn = document.getElementById('btn-submit-email');

    function showAlert(text) {
        if (!alertBox) return;
        alertBox.textContent = text;
        alertBox.classList.remove('hidden');
        alertBox.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }

    function getFormData() {
        const nameInput = document.getElementById('name');
        const emailInput = document.getElementById('email');
        const messageInput = document.getElementById('message');

        const name = nameInput ? nameInput.value.trim() : '';
        const email = emailInput ? emailInput.value.trim() : '';
        const message = messageInput ? messageInput.value.trim() : '';

        if (!name || !email || !message) {
            showAlert('{{ __("Mohon lengkapi semua kolom formulir.") }}');
            return null;
        }
        return { name, email, message };
    }

    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const data = getFormData();
            if (!data) return;

            const waText = "Halo Thoriq! Saya *" + data.name + "* (" + data.email + ").\n\nPesan:\n" + data.message;
            const waUrl = "https://wa.me/628972189558?text=" + encodeURIComponent(waText);

            showAlert('{{ __("Terima kasih! Mengalihkan ke WhatsApp...") }}');
            
            const win = window.open(waUrl, '_blank');
            if (!win || win.closed || typeof win.closed === 'undefined') {
                window.location.href = waUrl;
            }
        });
    }

    if (emailBtn) {
        emailBtn.addEventListener('click', function(e) {
            e.preventDefault();
            const data = getFormData();
            if (!data) return;

            const subject = "Pesan Portofolio dari " + data.name;
            const body = "Halo Thoriq,\n\nNama: " + data.name + "\nEmail: " + data.email + "\n\nPesan:\n" + data.message;
            const mailtoUrl = "mailto:oiqgemink27@gmail.com?subject=" + encodeURIComponent(subject) + "&body=" + encodeURIComponent(body);

            showAlert('{{ __("Terima kasih! Membuka aplikasi Email Anda...") }}');
            window.location.href = mailtoUrl;
        });
    }
});
</script>

@endsection
