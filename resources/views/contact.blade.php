@extends('layouts.app')

@section('title', 'Contact — Thoriq Alfurqan M.L')

@section('content')

{{-- SECTION 1: KONTAK & KIRIM PESAN LANGSUNG --}}
<section class="max-w-6xl mx-auto px-6 md:px-10 pt-24 pb-16 grid md:grid-cols-5 gap-16">

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

    {{-- KANAN: FORM PESAN PRIBADI --}}
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
                <textarea name="message" id="message" rows="5" required
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

{{-- DIVIDER SECTION --}}
<div class="max-w-6xl mx-auto px-6 md:px-10 my-4">
    <div class="flex items-center gap-4">
        <span class="text-xs font-bold text-accent tracking-[0.25em] uppercase">{{ __('Buku Tamu & Komentar') }}</span>
        <div class="h-[1px] flex-1 bg-gradient-to-r from-accent/30 via-ink/10 to-transparent"></div>
    </div>
</div>

{{-- SECTION 2: BUKU TAMU & KOMENTAR PUBLIK (SEPERTI ALFARI.MY.ID) --}}
<section class="max-w-6xl mx-auto px-6 md:px-10 pt-8 pb-32">
    <div class="grid lg:grid-cols-12 gap-10 items-start">

        {{-- KIRI: FORM TULIS KOMENTAR PUBLIK --}}
        <div class="lg:col-span-5 bg-white/85 dark:bg-[#121620]/90 backdrop-blur-xl border border-ink/10 dark:border-white/10 shadow-xl shadow-black/5 dark:shadow-black/30 rounded-3xl p-8 relative overflow-hidden">
            <div class="flex items-center gap-3 mb-6">
                <span class="w-2.5 h-2.5 rounded-full bg-accent animate-pulse"></span>
                <h3 class="font-display text-xl font-bold">{{ __('Tinggalkan Komentar') }}</h3>
            </div>
            <p class="text-muted text-sm leading-relaxed mb-6">
                {{ __('Pesan atau sapaan yang Anda tulis di sini akan langsung tampil secara publik dan dapat dibaca oleh pengunjung lain.') }}
            </p>

            <div id="comment-alert" class="hidden mb-6 px-5 py-4 rounded-2xl text-sm font-medium transition-all duration-300"></div>

            <form id="public-comment-form" class="space-y-6">
                {{-- Live Avatar Selector / Preview --}}
                <div class="flex items-center gap-4 p-4 rounded-2xl bg-ink/5 dark:bg-white/5 border border-ink/5 dark:border-white/5">
                    <img id="avatar-preview" 
                         src="https://api.dicebear.com/7.x/adventurer/svg?seed=Adventurer" 
                         alt="Avatar" 
                         class="w-14 h-14 rounded-2xl bg-accent/10 border border-accent/20 object-cover shrink-0 shadow-sm transition-transform duration-300 hover:scale-105">
                    <div class="flex-1 min-w-0">
                        <p class="text-xs font-semibold uppercase tracking-wider text-muted mb-1">{{ __('Avatar Traveler') }}</p>
                        <p class="text-xs text-muted/80 truncate">{{ __('Avatar berganti otomatis sesuai nama') }}</p>
                    </div>
                    <button type="button" id="btn-shuffle-avatar" 
                            class="px-3 py-2 rounded-xl text-xs font-semibold border border-ink/10 dark:border-white/10 hover:border-accent hover:text-accent transition-colors"
                            title="Acak Avatar">
                        🎲 {{ __('Acak') }}
                    </button>
                </div>

                <div>
                    <label for="comment-name" class="block text-xs font-semibold uppercase tracking-wider text-muted mb-2">{{ __('Nama Anda') }}</label>
                    <input type="text" id="comment-name" required
                        class="w-full px-5 py-3.5 rounded-xl border border-ink/10 bg-transparent focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none transition-all placeholder:text-muted/50 text-sm"
                        placeholder="{{ __('Nama atau nama panggilan...') }}">
                </div>

                <div>
                    <label for="comment-message" class="block text-xs font-semibold uppercase tracking-wider text-muted mb-2">{{ __('Pesan Komentar') }}</label>
                    <textarea id="comment-message" rows="4" required
                        class="w-full px-5 py-3.5 rounded-xl border border-ink/10 bg-transparent focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none transition-all resize-none placeholder:text-muted/50 text-sm"
                        placeholder="{{ __('Tulis pesan, kesan, atau rekomendasi destinasi traveling favoritmu...') }}"></textarea>
                </div>

                <button type="submit" id="btn-submit-comment"
                    class="w-full inline-flex items-center justify-center gap-2.5 px-8 py-3.5 rounded-full bg-accent text-paper hover:bg-accent-dark transition-all duration-300 hover:-translate-y-0.5 hover:shadow-lg hover:shadow-accent/25 font-semibold text-sm tracking-wide cursor-pointer text-center">
                    <svg id="comment-spinner" class="hidden w-4 h-4 animate-spin text-paper" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                    </svg>
                    <svg id="comment-icon" class="w-4 h-4 fill-none stroke-current" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                    </svg>
                    <span id="comment-btn-text">{{ __('Kirim Komentar') }}</span>
                </button>
            </form>
        </div>

        {{-- KANAN: DAFTAR KOMENTAR PUBLIK (FEED) --}}
        <div class="lg:col-span-7 bg-white/85 dark:bg-[#121620]/90 backdrop-blur-xl border border-ink/10 dark:border-white/10 shadow-xl shadow-black/5 dark:shadow-black/30 rounded-3xl p-8 relative overflow-hidden">
            <div class="flex items-center justify-between pb-6 border-b border-ink/10 dark:border-white/10 mb-6">
                <div>
                    <h3 class="font-display text-xl font-bold flex items-center gap-2">
                        <span>{{ __('Komentar Publik') }}</span>
                        <span class="text-xs font-normal text-muted">💬</span>
                    </h3>
                    <p class="text-xs text-muted mt-1">{{ __('Dibaca oleh seluruh pengunjung website') }}</p>
                </div>
                <span id="comments-count-badge" class="px-3.5 py-1.5 rounded-full bg-accent/10 border border-accent/20 text-accent font-semibold text-xs">
                    {{ isset($comments) ? $comments->count() : 3 }} {{ __('Komentar') }}
                </span>
            </div>

            {{-- Feed List Container --}}
            <div id="comments-feed" class="space-y-4 max-h-[580px] overflow-y-auto pr-2 custom-scrollbar">
                @if (isset($comments) && $comments->count() > 0)
                    @foreach ($comments as $item)
                        <div class="comment-card p-5 rounded-2xl bg-ink/[0.02] dark:bg-white/[0.02] border border-ink/5 dark:border-white/5 hover:border-accent/30 transition-all duration-300">
                            <div class="flex items-start gap-4">
                                <img src="{{ $item->avatar ?: 'https://api.dicebear.com/7.x/adventurer/svg?seed=' . urlencode($item->name) }}" 
                                     alt="{{ $item->name }}" 
                                     class="w-11 h-11 rounded-2xl bg-accent/10 border border-accent/20 object-cover shrink-0 shadow-sm"
                                     loading="lazy">
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center justify-between gap-2 mb-1.5">
                                        <h4 class="font-display font-bold text-sm tracking-wide text-ink dark:text-white truncate">
                                            {{ $item->name }}
                                        </h4>
                                        <span class="text-[11px] text-muted whitespace-nowrap">
                                            {{ $item->created_at->diffForHumans() }}
                                        </span>
                                    </div>
                                    <p class="text-sm text-ink/80 dark:text-gray-300 leading-relaxed break-words whitespace-pre-line">
                                        {{ $item->message }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    {{-- Default Seed Comments when database is fresh --}}
                    <div class="comment-card p-5 rounded-2xl bg-ink/[0.02] dark:bg-white/[0.02] border border-ink/5 dark:border-white/5 hover:border-accent/30 transition-all duration-300">
                        <div class="flex items-start gap-4">
                            <img src="https://api.dicebear.com/7.x/adventurer/svg?seed=Fajar" alt="Fajar" class="w-11 h-11 rounded-2xl bg-accent/10 border border-accent/20 object-cover shrink-0 shadow-sm">
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center justify-between gap-2 mb-1.5">
                                    <h4 class="font-display font-bold text-sm tracking-wide text-ink dark:text-white">Fajar Pendaki</h4>
                                    <span class="text-[11px] text-muted">3 jam lalu</span>
                                </div>
                                <p class="text-sm text-ink/80 dark:text-gray-300 leading-relaxed">
                                    Salam lestari bang Thoriq! Dokumentasi foto Gunung Merbabu dan Sumbingnya juara banget pemandangannya!
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="comment-card p-5 rounded-2xl bg-ink/[0.02] dark:bg-white/[0.02] border border-ink/5 dark:border-white/5 hover:border-accent/30 transition-all duration-300">
                        <div class="flex items-start gap-4">
                            <img src="https://api.dicebear.com/7.x/adventurer/svg?seed=Dinda" alt="Dinda" class="w-11 h-11 rounded-2xl bg-accent/10 border border-accent/20 object-cover shrink-0 shadow-sm">
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center justify-between gap-2 mb-1.5">
                                    <h4 class="font-display font-bold text-sm tracking-wide text-ink dark:text-white">Dinda Traveling</h4>
                                    <span class="text-[11px] text-muted">1 hari lalu</span>
                                </div>
                                <p class="text-sm text-ink/80 dark:text-gray-300 leading-relaxed">
                                    Pantai Ngobaran emang sunset-nya magis banget. Sukses terus buat trip-trip berikutnya ya!
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="comment-card p-5 rounded-2xl bg-ink/[0.02] dark:bg-white/[0.02] border border-ink/5 dark:border-white/5 hover:border-accent/30 transition-all duration-300">
                        <div class="flex items-start gap-4">
                            <img src="https://api.dicebear.com/7.x/adventurer/svg?seed=Rian" alt="Rian" class="w-11 h-11 rounded-2xl bg-accent/10 border border-accent/20 object-cover shrink-0 shadow-sm">
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center justify-between gap-2 mb-1.5">
                                    <h4 class="font-display font-bold text-sm tracking-wide text-ink dark:text-white">Rian Outdoor</h4>
                                    <span class="text-[11px] text-muted">2 hari lalu</span>
                                </div>
                                <p class="text-sm text-ink/80 dark:text-gray-300 leading-relaxed">
                                    Keren websitenya minimalis & animasinya halus. Ditunggu catatan trip ke Gunung Rinjani atau Semeru bang!
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

    </div>
</section>

{{-- SCRIPTS: Direct Form + Supabase/Local Real-time Comments --}}
<script>
document.addEventListener('DOMContentLoaded', function() {

    /* ====================================================================
       1. FORM KONTAK PRIBADI (EMAIL & BACKEND)
       ==================================================================== */
    const contactForm = document.getElementById('contact-form');
    const contactAlert = document.getElementById('contact-alert');
    const submitBtn = document.getElementById('btn-submit');
    const btnSpinner = document.getElementById('btn-spinner');
    const btnIcon = document.getElementById('btn-icon');
    const btnText = document.getElementById('btn-text');

    function showContactAlert(type, text) {
        if (!contactAlert) return;
        contactAlert.className = type === 'success'
            ? 'mb-8 px-6 py-5 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 dark:text-emerald-400 font-medium transition-all duration-300'
            : 'mb-8 px-6 py-5 rounded-2xl bg-red-500/10 border border-red-500/20 text-red-600 dark:text-red-400 font-medium transition-all duration-300';
        contactAlert.textContent = text;
        contactAlert.classList.remove('hidden');
        contactAlert.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }

    if (contactForm) {
        contactForm.addEventListener('submit', async function(e) {
            e.preventDefault();

            const name = document.getElementById('name')?.value.trim();
            const email = document.getElementById('email')?.value.trim();
            const message = document.getElementById('message')?.value.trim();

            if (!name || !email || !message) {
                showContactAlert('error', '{{ __("Mohon lengkapi semua kolom formulir.") }}');
                return;
            }

            if (submitBtn) submitBtn.disabled = true;
            if (btnSpinner) btnSpinner.classList.remove('hidden');
            if (btnIcon) btnIcon.classList.add('hidden');
            if (btnText) btnText.textContent = '{{ __("Mengirim...") }}';

            const csrfToken = contactForm.querySelector('input[name="_token"]')?.value || '';

            // Post to backend (Localhost Laravel)
            const backendPromise = fetch('{{ url("/contact") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ name, email, message })
            }).catch(() => null);

            // Post to FormSubmit for direct email delivery to oiqgemink27@gmail.com
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

            await Promise.allSettled([backendPromise, emailPromise]);

            if (submitBtn) submitBtn.disabled = false;
            if (btnSpinner) btnSpinner.classList.add('hidden');
            if (btnIcon) btnIcon.classList.remove('hidden');
            if (btnText) btnText.textContent = '{{ __("Kirim Pesan") }}';

            contactForm.reset();
            showContactAlert('success', '{{ __("Terima kasih! Pesan kamu berhasil dikirim ke email admin (oiqgemink27@gmail.com) dan tersimpan.") }}');
        });
    }

    /* ====================================================================
       2. BUKU TAMU & KOMENTAR PUBLIK (SEPERTI ALFARI.MY.ID)
       ==================================================================== */
    // Konfigurasi Supabase (Opsional - jika ingin sinkronisasi multi-user real-time di Vercel):
    const SUPABASE_URL = "";       // Contoh: "https://your-project.supabase.co"
    const SUPABASE_ANON_KEY = "";  // Contoh: "eyJhbGciOiJIUzI1NiIsIn..."

    const commentForm = document.getElementById('public-comment-form');
    const commentNameInput = document.getElementById('comment-name');
    const commentMessageInput = document.getElementById('comment-message');
    const avatarPreview = document.getElementById('avatar-preview');
    const btnShuffleAvatar = document.getElementById('btn-shuffle-avatar');
    const commentAlert = document.getElementById('comment-alert');
    const commentsFeed = document.getElementById('comments-feed');
    const countBadge = document.getElementById('comments-count-badge');
    const commentSubmitBtn = document.getElementById('btn-submit-comment');
    const commentSpinner = document.getElementById('comment-spinner');
    const commentIcon = document.getElementById('comment-icon');
    const commentBtnText = document.getElementById('comment-btn-text');

    let currentAvatarSeed = 'Adventurer';

    function updateAvatar(seed) {
        currentAvatarSeed = seed || 'Adventurer';
        const url = `https://api.dicebear.com/7.x/adventurer/svg?seed=${encodeURIComponent(currentAvatarSeed)}`;
        if (avatarPreview) avatarPreview.src = url;
    }

    if (commentNameInput) {
        commentNameInput.addEventListener('input', function() {
            const val = this.value.trim();
            if (val) {
                updateAvatar(val);
            }
        });
    }

    if (btnShuffleAvatar) {
        btnShuffleAvatar.addEventListener('click', function() {
            const randomSeeds = ['Hiker', 'Summit', 'Rinjani', 'Merbabu', 'Lombok', 'Bromo', 'Explorer', 'Wanderer', 'Forest', 'Ocean'];
            const random = randomSeeds[Math.floor(Math.random() * randomSeeds.length)] + Math.floor(Math.random() * 100);
            updateAvatar(random);
        });
    }

    function showCommentAlert(type, text) {
        if (!commentAlert) return;
        commentAlert.className = type === 'success'
            ? 'mb-6 px-5 py-4 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 dark:text-emerald-400 text-sm font-medium transition-all duration-300'
            : 'mb-6 px-5 py-4 rounded-2xl bg-red-500/10 border border-red-500/20 text-red-600 dark:text-red-400 text-sm font-medium transition-all duration-300';
        commentAlert.textContent = text;
        commentAlert.classList.remove('hidden');
    }

    function createCommentElement(comment) {
        const div = document.createElement('div');
        div.className = 'comment-card p-5 rounded-2xl bg-ink/[0.02] dark:bg-white/[0.02] border border-ink/5 dark:border-white/5 hover:border-accent/30 transition-all duration-300 animate-fadeIn';
        
        const avatarUrl = comment.avatar || `https://api.dicebear.com/7.x/adventurer/svg?seed=${encodeURIComponent(comment.name)}`;
        const timeAgo = comment.time_ago || 'Baru saja';

        div.innerHTML = `
            <div class="flex items-start gap-4">
                <img src="${avatarUrl}" alt="${escapeHtml(comment.name)}" class="w-11 h-11 rounded-2xl bg-accent/10 border border-accent/20 object-cover shrink-0 shadow-sm">
                <div class="flex-1 min-w-0">
                    <div class="flex items-center justify-between gap-2 mb-1.5">
                        <h4 class="font-display font-bold text-sm tracking-wide text-ink dark:text-white truncate">
                            ${escapeHtml(comment.name)}
                        </h4>
                        <span class="text-[11px] text-muted whitespace-nowrap">${timeAgo}</span>
                    </div>
                    <p class="text-sm text-ink/80 dark:text-gray-300 leading-relaxed break-words whitespace-pre-line">
                        ${escapeHtml(comment.message)}
                    </p>
                </div>
            </div>
        `;
        return div;
    }

    function escapeHtml(string) {
        const div = document.createElement('div');
        div.textContent = string;
        return div.innerHTML;
    }

    function updateBadgeCount(increment = 1) {
        if (!countBadge) return;
        const currentText = countBadge.textContent;
        const match = currentText.match(/\d+/);
        if (match) {
            const current = parseInt(match[0], 10);
            countBadge.textContent = `${current + increment} {{ __('Komentar') }}`;
        }
    }

    // Load public comments live from shared database
    function renderComments(list) {
        if (!commentsFeed) return;
        commentsFeed.innerHTML = '';
        if (!Array.isArray(list) || list.length === 0) {
            commentsFeed.innerHTML = `
                <div class="p-8 text-center text-muted text-sm border border-dashed border-ink/10 dark:border-white/10 rounded-2xl">
                    {{ __('Belum ada komentar publik. Jadilah yang pertama berkomentar!') }}
                </div>
            `;
            if (countBadge) countBadge.textContent = `0 {{ __('Komentar') }}`;
            return;
        }

        list.forEach(item => {
            commentsFeed.appendChild(createCommentElement({
                name: item.name,
                message: item.message,
                avatar: item.avatar,
                time_ago: item.time_ago || (item.created_at ? formatTimeAgo(new Date(item.created_at)) : 'Baru saja')
            }));
        });
        if (countBadge) countBadge.textContent = `${list.length} {{ __('Komentar') }}`;
    }

    function fetchPublicComments() {
        if (SUPABASE_URL && SUPABASE_ANON_KEY) {
            fetch(`${SUPABASE_URL}/rest/v1/comments?select=*&order=created_at.desc&limit=50`, {
                headers: {
                    'apikey': SUPABASE_ANON_KEY,
                    'Authorization': `Bearer ${SUPABASE_ANON_KEY}`
                }
            })
            .then(res => res.json())
            .then(data => {
                if (Array.isArray(data)) {
                    renderComments(data);
                }
            })
            .catch(() => null);
        } else if (isLocal) {
            fetch('/api/comments')
            .then(res => res.json())
            .then(res => {
                if (res.status === 'success' && Array.isArray(res.data)) {
                    renderComments(res.data);
                }
            })
            .catch(() => null);
        }
    }

    // Initial fetch on page load
    fetchPublicComments();

    // Auto-sync polling every 10 seconds so any user sees other users' new comments automatically
    setInterval(fetchPublicComments, 10000);

    function formatTimeAgo(date) {
        const seconds = Math.floor((new Date() - date) / 1000);
        if (seconds < 60) return 'Baru saja';
        const minutes = Math.floor(seconds / 60);
        if (minutes < 60) return `${minutes} menit lalu`;
        const hours = Math.floor(minutes / 60);
        if (hours < 24) return `${hours} jam lalu`;
        const days = Math.floor(hours / 24);
        return `${days} hari lalu`;
    }

    // Handle Comment Submit
    if (commentForm) {
        commentForm.addEventListener('submit', async function(e) {
            e.preventDefault();

            const name = commentNameInput?.value.trim();
            const message = commentMessageInput?.value.trim();
            const avatar = `https://api.dicebear.com/7.x/adventurer/svg?seed=${encodeURIComponent(currentAvatarSeed)}`;

            if (!name || !message) {
                showCommentAlert('error', '{{ __("Mohon lengkapi nama dan pesan komentar Anda.") }}');
                return;
            }

            if (commentSubmitBtn) commentSubmitBtn.disabled = true;
            if (commentSpinner) commentSpinner.classList.remove('hidden');
            if (commentIcon) commentIcon.classList.add('hidden');
            if (commentBtnText) commentBtnText.textContent = '{{ __("Mengirim...") }}';

            let submitSuccess = false;

            // 1. Post to Supabase (Production Vercel)
            if (SUPABASE_URL && SUPABASE_ANON_KEY) {
                try {
                    const response = await fetch(`${SUPABASE_URL}/rest/v1/comments`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'apikey': SUPABASE_ANON_KEY,
                            'Authorization': `Bearer ${SUPABASE_ANON_KEY}`,
                            'Prefer': 'return=minimal'
                        },
                        body: JSON.stringify({
                            name: name,
                            message: message,
                            avatar: avatar
                        })
                    });

                    if (response.ok) {
                        submitSuccess = true;
                        fetchPublicComments();
                    } else {
                        throw new Error('Supabase status: ' + response.status);
                    }
                } catch (err) {
                    showCommentAlert('error', 'Gagal menghubungkan ke database komentar Supabase.');
                }
            } else if (isLocal) {
                // 2. Post to Localhost Laravel API
                try {
                    const response = await fetch('/api/comments', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({ name, message, avatar })
                    });

                    if (response.ok) {
                        submitSuccess = true;
                        fetchPublicComments();
                    } else {
                        throw new Error('Local API status: ' + response.status);
                    }
                } catch (err) {
                    showCommentAlert('error', 'Gagal menyimpan ke database komentar lokal.');
                }
            } else {
                // Di Vercel tapi SUPABASE_URL & SUPABASE_ANON_KEY belum diisi:
                showCommentAlert('error', 'Database komentar publik online (Supabase) belum dihubungkan. Hubungkan SUPABASE_URL & SUPABASE_ANON_KEY agar semua user di internet bisa saling melihat komentar.');
            }

            // Reset UI
            if (commentSubmitBtn) commentSubmitBtn.disabled = false;
            if (commentSpinner) commentSpinner.classList.add('hidden');
            if (commentIcon) commentIcon.classList.remove('hidden');
            if (commentBtnText) commentBtnText.textContent = '{{ __("Kirim Komentar") }}';

            if (submitSuccess) {
                commentMessageInput.value = '';
                showCommentAlert('success', '{{ __("Komentar kamu berhasil dikirim dan kini tampil untuk semua orang!") }}');
                setTimeout(() => {
                    if (commentAlert) commentAlert.classList.add('hidden');
                }, 5000);
            }
        });
    }

});
</script>

@endsection
