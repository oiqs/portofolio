@php
    $currentLang = app()->getLocale();
@endphp

<header class="border-b border-ink/5 dark:border-white/5 backdrop-blur-xl sticky top-0 z-50 bg-paper/80 dark:bg-paper/80 transition-all duration-300">
    <div class="max-w-6xl mx-auto px-6 md:px-10 py-6 flex items-center justify-between">
        {{-- LOGO --}}
        <a href="{{ url('/') }}" class="font-display text-xl tracking-wide group hover-target flex items-center gap-0.5">
            <span class="transition-colors duration-300 group-hover:text-accent">oIQs</span>
            <span class="text-accent transition-transform duration-500 inline-block group-hover:scale-150 group-hover:rotate-[360deg]">.</span>
        </a>

        <div class="flex items-center gap-4 md:gap-6">
            {{-- DESKTOP NAVIGATION (Model Asli dengan Animasi Hover & Touch) --}}
            <nav class="hidden md:flex items-center gap-10 text-sm font-medium tracking-wide">
                {{-- Home --}}
                <a href="{{ url('/') }}" 
                   class="relative py-1 text-muted hover:text-accent transition-all duration-300 group hover-target flex items-center gap-1.5 {{ request()->is('/') ? 'text-accent font-semibold' : '' }}">
                    <span class="inline-block transition-transform duration-300 group-hover:-translate-y-0.5 group-active:translate-y-0">
                        {{ __('Home') }}
                    </span>
                    {{-- Animated Underline Bar --}}
                    <span class="absolute bottom-0 left-0 h-0.5 bg-accent rounded-full transition-all duration-300 ease-out {{ request()->is('/') ? 'w-full shadow-[0_0_8px_var(--app-accent)]' : 'w-0 group-hover:w-full' }}"></span>
                </a>

                {{-- About --}}
                <a href="{{ url('/about') }}" 
                   class="relative py-1 text-muted hover:text-accent transition-all duration-300 group hover-target flex items-center gap-1.5 {{ request()->is('about') ? 'text-accent font-semibold' : '' }}">
                    <span class="inline-block transition-transform duration-300 group-hover:-translate-y-0.5 group-active:translate-y-0">
                        {{ __('About') }}
                    </span>
                    {{-- Animated Underline Bar --}}
                    <span class="absolute bottom-0 left-0 h-0.5 bg-accent rounded-full transition-all duration-300 ease-out {{ request()->is('about') ? 'w-full shadow-[0_0_8px_var(--app-accent)]' : 'w-0 group-hover:w-full' }}"></span>
                </a>

                {{-- Projects --}}
                <a href="{{ url('/projects') }}" 
                   class="relative py-1 text-muted hover:text-accent transition-all duration-300 group hover-target flex items-center gap-1.5 {{ request()->is('projects*') ? 'text-accent font-semibold' : '' }}">
                    <span class="inline-block transition-transform duration-300 group-hover:-translate-y-0.5 group-active:translate-y-0">
                        {{ __('Projects') }}
                    </span>
                    {{-- Animated Underline Bar --}}
                    <span class="absolute bottom-0 left-0 h-0.5 bg-accent rounded-full transition-all duration-300 ease-out {{ request()->is('projects*') ? 'w-full shadow-[0_0_8px_var(--app-accent)]' : 'w-0 group-hover:w-full' }}"></span>
                </a>

                {{-- Contact Button dengan Animasi Hover & Glow --}}
                <a href="{{ url('/contact') }}"
                   class="px-6 py-2.5 rounded-full bg-ink text-paper dark:bg-white dark:text-paper-dark hover:bg-accent dark:hover:bg-accent hover:text-paper transition-all duration-300 hover:scale-105 hover:shadow-[0_0_20px_var(--app-accent)] active:scale-95 hover-target font-semibold">
                    {{ __('Contact') }}
                </a>
            </nav>

            <div class="flex items-center gap-2">
                {{-- LANGUAGE SWITCHER DROPDOWN --}}
                <div class="relative" id="lang-picker-dropdown">
                    <button onclick="toggleLangPicker(event)" 
                            class="px-3 py-1.5 rounded-full border border-ink/10 text-muted hover:text-accent hover:border-accent text-xs font-semibold tracking-wider transition-all duration-300 flex items-center gap-1.5 hover-target group active:scale-95"
                            aria-label="Pilih Bahasa"
                            title="Pilih Bahasa / Change Language">
                        @if ($currentLang === 'en')
                            <span>🇬🇧</span>
                            <span>EN</span>
                        @else
                            <span>🇮🇩</span>
                            <span>ID</span>
                        @endif
                        <svg class="w-3.5 h-3.5 text-muted group-hover:text-accent transition-transform duration-300 group-hover:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>

                    <div id="lang-picker-menu" 
                         class="hidden absolute right-0 mt-2 w-44 p-2 rounded-2xl bg-paper/95 dark:bg-paper/95 backdrop-blur-xl border border-ink/15 dark:border-white/15 shadow-2xl z-50 transition-all duration-300 origin-top-right transform scale-95 opacity-0">
                        <div class="text-[10px] font-bold tracking-wider uppercase text-muted px-3 py-1.5 border-b border-ink/10 mb-1">
                            {{ __('Bahasa') }}
                        </div>
                        <a href="{{ route('lang.switch', 'id') }}" 
                           class="flex items-center justify-between px-3 py-2 rounded-xl text-xs font-medium hover:bg-ink/5 dark:hover:bg-white/5 transition-colors {{ $currentLang === 'id' ? 'text-accent font-bold bg-accent/10' : 'text-ink dark:text-white' }}">
                            <span class="flex items-center gap-2"><span>🇮🇩</span> Bahasa Indonesia</span>
                            @if ($currentLang === 'id')
                                <span class="text-accent font-bold">✓</span>
                            @endif
                        </a>
                        <a href="{{ route('lang.switch', 'en') }}" 
                           class="flex items-center justify-between px-3 py-2 rounded-xl text-xs font-medium hover:bg-ink/5 dark:hover:bg-white/5 transition-colors {{ $currentLang === 'en' ? 'text-accent font-bold bg-accent/10' : 'text-ink dark:text-white' }}">
                            <span class="flex items-center gap-2"><span>🇬🇧</span> English</span>
                            @if ($currentLang === 'en')
                                <span class="text-accent font-bold">✓</span>
                            @endif
                        </a>
                    </div>
                </div>

                {{-- DARK MODE TOGGLE --}}
                <button onclick="toggleTheme()" class="p-2 rounded-full border border-ink/10 text-muted hover:text-accent hover:border-accent transition-all duration-300 group hover-target hover:scale-110 active:scale-90" aria-label="Toggle Dark Mode" title="Toggle Dark/Light Mode">
                    {{-- Sun Icon --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 hidden dark:block group-hover:rotate-45 transition-transform duration-500 text-accent" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="5"></circle>
                        <line x1="12" y1="1" x2="12" y2="3"></line>
                        <line x1="12" y1="21" x2="12" y2="23"></line>
                        <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                        <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                        <line x1="1" y1="12" x2="3" y2="12"></line>
                        <line x1="21" y1="12" x2="23" y2="12"></line>
                        <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                        <line x1="18.36" y1="4.22" x2="19.78" y2="5.64"></line>
                    </svg>
                    {{-- Moon Icon --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 block dark:hidden group-hover:-rotate-12 transition-transform duration-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                    </svg>
                </button>

                {{-- MOBILE MENU BUTTON --}}
                <button onclick="toggleMobileMenu()" class="md:hidden text-muted hover:text-accent transition-all duration-300 hover-target p-1 active:scale-90" aria-label="Menu">
                    <svg id="hamburger-icon" class="w-7 h-7 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg id="close-icon" class="w-7 h-7 hidden transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- MOBILE MENU DROPDOWN DENGAN ANIMASI SLIDE --}}
    <div id="mobile-menu" class="hidden md:hidden overflow-hidden transition-all duration-400 ease-in-out max-h-0 opacity-0 border-t border-ink/5 bg-paper/95 dark:bg-paper/95 backdrop-blur-xl px-6 py-4 flex flex-col gap-3">
        <a href="{{ url('/') }}" class="text-muted hover:text-accent font-medium py-1.5 transition-colors flex items-center justify-between {{ request()->is('/') ? 'text-accent font-bold' : '' }}">
            <span>{{ __('Home') }}</span>
            <span class="text-xs">&rarr;</span>
        </a>
        <a href="{{ url('/about') }}" class="text-muted hover:text-accent font-medium py-1.5 transition-colors flex items-center justify-between {{ request()->is('about') ? 'text-accent font-bold' : '' }}">
            <span>{{ __('About') }}</span>
            <span class="text-xs">&rarr;</span>
        </a>
        <a href="{{ url('/projects') }}" class="text-muted hover:text-accent font-medium py-1.5 transition-colors flex items-center justify-between {{ request()->is('projects*') ? 'text-accent font-bold' : '' }}">
            <span>{{ __('Projects') }}</span>
            <span class="text-xs">&rarr;</span>
        </a>
        <a href="{{ url('/contact') }}" class="text-muted hover:text-accent font-medium py-1.5 transition-colors flex items-center justify-between {{ request()->is('contact') ? 'text-accent font-bold' : '' }}">
            <span>{{ __('Contact') }}</span>
            <span class="text-xs">&rarr;</span>
        </a>
        <div class="flex items-center gap-4 pt-2 border-t border-ink/10">
            <a href="{{ route('lang.switch', 'id') }}" class="text-xs font-semibold px-3 py-1.5 rounded-full transition-all {{ $currentLang === 'id' ? 'bg-accent text-paper' : 'text-muted bg-ink/5' }}">🇮🇩 Indonesia</a>
            <a href="{{ route('lang.switch', 'en') }}" class="text-xs font-semibold px-3 py-1.5 rounded-full transition-all {{ $currentLang === 'en' ? 'bg-accent text-paper' : 'text-muted bg-ink/5' }}">🇬🇧 English</a>
        </div>
    </div>
</header>

<script>
    function toggleLangPicker(e) {
        e.stopPropagation();
        const menu = document.getElementById('lang-picker-menu');
        if (!menu) return;

        if (menu.classList.contains('hidden')) {
            menu.classList.remove('hidden');
            setTimeout(() => {
                menu.classList.remove('scale-95', 'opacity-0');
                menu.classList.add('scale-100', 'opacity-100');
            }, 10);
        } else {
            menu.classList.remove('scale-100', 'opacity-100');
            menu.classList.add('scale-95', 'opacity-0');
            setTimeout(() => menu.classList.add('hidden'), 200);
        }
    }

    function toggleMobileMenu() {
        const menu = document.getElementById('mobile-menu');
        const hamburgerIcon = document.getElementById('hamburger-icon');
        const closeIcon = document.getElementById('close-icon');
        if (!menu) return;

        if (menu.classList.contains('hidden')) {
            menu.classList.remove('hidden');
            setTimeout(() => {
                menu.classList.remove('max-h-0', 'opacity-0');
                menu.classList.add('max-h-96', 'opacity-100');
            }, 10);
            if (hamburgerIcon) hamburgerIcon.classList.add('hidden');
            if (closeIcon) closeIcon.classList.remove('hidden');
        } else {
            menu.classList.remove('max-h-96', 'opacity-100');
            menu.classList.add('max-h-0', 'opacity-0');
            setTimeout(() => menu.classList.add('hidden'), 400);
            if (hamburgerIcon) hamburgerIcon.classList.remove('hidden');
            if (closeIcon) closeIcon.classList.add('hidden');
        }
    }

    document.addEventListener('click', function(e) {
        const dropdown = document.getElementById('lang-picker-dropdown');
        if (dropdown && !dropdown.contains(e.target)) {
            const menu = document.getElementById('lang-picker-menu');
            if (menu && !menu.classList.contains('hidden')) {
                menu.classList.remove('scale-100', 'opacity-100');
                menu.classList.add('scale-95', 'opacity-0');
                setTimeout(() => menu.classList.add('hidden'), 200);
            }
        }
    });
</script>