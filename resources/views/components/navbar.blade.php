<header class="border-b border-ink/5 backdrop-blur-md sticky top-0 z-50 bg-paper/80">
    <div class="max-w-6xl mx-auto px-6 md:px-10 py-6 flex items-center justify-between">
        <a href="{{ url('/') }}" class="font-display text-xl tracking-wide group">
            oIQs<span class="text-accent transition-transform inline-block group-hover:scale-125">.</span>
        </a>

        <div class="flex items-center gap-3 md:gap-6">
            <nav class="hidden md:flex items-center gap-10 text-sm font-medium tracking-wide">
                <a href="{{ url('/') }}" class="text-muted hover:text-accent transition-colors">Home</a>
                <a href="{{ url('/about') }}" class="text-muted hover:text-accent transition-colors">About</a>
                <a href="{{ url('/projects') }}" class="text-muted hover:text-accent transition-colors">Projects</a>
                <a href="{{ url('/contact') }}"
                   class="px-6 py-2.5 rounded-full bg-ink text-paper hover:bg-accent transition-colors">
                    Contact
                </a>
            </nav>

            <div class="flex items-center gap-2">
                {{-- COLOR THEME SELECTOR DROPDOWN --}}
                <div class="relative" id="color-palette-dropdown">
                    <button onclick="toggleColorPicker(event)" 
                            class="p-2 rounded-full border border-ink/10 text-muted hover:text-accent hover:border-accent transition-all duration-300 group flex items-center gap-1.5"
                            aria-label="Pilih Warna Tema"
                            title="Pilih Tema Warna">
                        <svg class="w-5 h-5 text-accent transition-transform group-hover:rotate-12 duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.098 19.902a3.75 3.75 0 005.304 0l6.401-6.402M6.75 21A3.75 3.75 0 013 17.25V4.125C3 3.504 3.504 3 4.125 3h5.25c.621 0 1.125.504 1.125 1.125v4.072M6.75 21a3.75 3.75 0 003.75-3.75V8.197M6.75 21h13.125c.621 0 1.125-.504 1.125-1.125v-5.25c0-.621-.504-1.125-1.125-1.125h-4.072M10.5 8.197l9.604-9.604a2.25 2.25 0 013.182 3.182l-9.604 9.604M10.5 8.197v4.072" />
                        </svg>
                        <span class="w-2.5 h-2.5 rounded-full bg-accent animate-pulse hidden sm:inline-block"></span>
                    </button>

                    {{-- DROPDOWN MENU --}}
                    <div id="color-picker-menu" 
                         class="hidden absolute right-0 mt-3 w-64 p-4 rounded-2xl bg-paper/95 backdrop-blur-xl border border-ink/15 shadow-2xl z-50 transition-all duration-300 transform origin-top-right">
                        <div class="flex items-center justify-between mb-3 pb-2 border-b border-ink/10">
                            <span class="text-xs font-bold tracking-wider uppercase text-muted">Tema Warna</span>
                            <span class="text-[10px] text-accent font-semibold px-2 py-0.5 rounded-full bg-accent/10">6 Pilihan</span>
                        </div>
                        <div class="grid grid-cols-3 gap-2.5">
                            {{-- GOLD --}}
                            <button onclick="selectColorTheme('gold')" 
                                    class="group p-2.5 rounded-xl border border-ink/10 hover:border-accent bg-ink/5 hover:bg-ink/10 flex flex-col items-center gap-1.5 transition-all text-center">
                                <span class="w-6 h-6 rounded-full bg-[#E0B84C] shadow-md ring-2 ring-offset-2 ring-transparent group-hover:ring-[#E0B84C] transition-all"></span>
                                <span class="text-[11px] font-medium text-ink">Emas</span>
                            </button>

                            {{-- BLUE --}}
                            <button onclick="selectColorTheme('blue')" 
                                    class="group p-2.5 rounded-xl border border-ink/10 hover:border-accent bg-ink/5 hover:bg-ink/10 flex flex-col items-center gap-1.5 transition-all text-center">
                                <span class="w-6 h-6 rounded-full bg-[#3B82F6] shadow-md ring-2 ring-offset-2 ring-transparent group-hover:ring-[#3B82F6] transition-all"></span>
                                <span class="text-[11px] font-medium text-ink">Biru</span>
                            </button>

                            {{-- EMERALD --}}
                            <button onclick="selectColorTheme('emerald')" 
                                    class="group p-2.5 rounded-xl border border-ink/10 hover:border-accent bg-ink/5 hover:bg-ink/10 flex flex-col items-center gap-1.5 transition-all text-center">
                                <span class="w-6 h-6 rounded-full bg-[#10B981] shadow-md ring-2 ring-offset-2 ring-transparent group-hover:ring-[#10B981] transition-all"></span>
                                <span class="text-[11px] font-medium text-ink">Hijau</span>
                            </button>

                            {{-- VIOLET --}}
                            <button onclick="selectColorTheme('violet')" 
                                    class="group p-2.5 rounded-xl border border-ink/10 hover:border-accent bg-ink/5 hover:bg-ink/10 flex flex-col items-center gap-1.5 transition-all text-center">
                                <span class="w-6 h-6 rounded-full bg-[#A855F7] shadow-md ring-2 ring-offset-2 ring-transparent group-hover:ring-[#A855F7] transition-all"></span>
                                <span class="text-[11px] font-medium text-ink">Ungu</span>
                            </button>

                            {{-- CRIMSON --}}
                            <button onclick="selectColorTheme('crimson')" 
                                    class="group p-2.5 rounded-xl border border-ink/10 hover:border-accent bg-ink/5 hover:bg-ink/10 flex flex-col items-center gap-1.5 transition-all text-center">
                                <span class="w-6 h-6 rounded-full bg-[#F97316] shadow-md ring-2 ring-offset-2 ring-transparent group-hover:ring-[#F97316] transition-all"></span>
                                <span class="text-[11px] font-medium text-ink">Merah</span>
                            </button>

                            {{-- TEAL --}}
                            <button onclick="selectColorTheme('teal')" 
                                    class="group p-2.5 rounded-xl border border-ink/10 hover:border-accent bg-ink/5 hover:bg-ink/10 flex flex-col items-center gap-1.5 transition-all text-center">
                                <span class="w-6 h-6 rounded-full bg-[#14B8A6] shadow-md ring-2 ring-offset-2 ring-transparent group-hover:ring-[#14B8A6] transition-all"></span>
                                <span class="text-[11px] font-medium text-ink">Teal</span>
                            </button>
                        </div>
                    </div>
                </div>

                {{-- DARK MODE TOGGLE --}}
                <button onclick="toggleTheme()" class="p-2 rounded-full border border-ink/10 text-muted hover:text-accent hover:border-accent transition-colors group" aria-label="Toggle Dark Mode" title="Toggle Dark/Light Mode">
                    {{-- Sun Icon (Visible in Dark Mode) --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 hidden dark:block group-hover:rotate-45 transition-transform duration-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
                    {{-- Moon Icon (Visible in Light Mode) --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 block dark:hidden group-hover:-rotate-12 transition-transform duration-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                    </svg>
                </button>
            </div>

            <button onclick="toggleMobileMenu()" class="md:hidden text-muted hover:text-accent transition-colors" aria-label="Menu">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>

    {{-- MOBILE MENU DROPDOWN --}}
    <div id="mobile-menu" class="hidden md:hidden border-t border-ink/5 bg-paper/95 px-6 py-4 flex flex-col gap-3">
        <a href="{{ url('/') }}" class="text-muted hover:text-accent font-medium py-1">Home</a>
        <a href="{{ url('/about') }}" class="text-muted hover:text-accent font-medium py-1">About</a>
        <a href="{{ url('/projects') }}" class="text-muted hover:text-accent font-medium py-1">Projects</a>
        <a href="{{ url('/contact') }}" class="text-muted hover:text-accent font-medium py-1">Contact</a>
    </div>
</header>

<script>
    function toggleColorPicker(e) {
        e.stopPropagation();
        const menu = document.getElementById('color-picker-menu');
        menu.classList.toggle('hidden');
    }

    function selectColorTheme(color) {
        if (typeof setColorTheme === 'function') {
            setColorTheme(color);
        }
        const menu = document.getElementById('color-picker-menu');
        if (menu) menu.classList.add('hidden');
    }

    function toggleMobileMenu() {
        const menu = document.getElementById('mobile-menu');
        if (menu) menu.classList.toggle('hidden');
    }

    document.addEventListener('click', function(e) {
        const dropdown = document.getElementById('color-palette-dropdown');
        if (dropdown && !dropdown.contains(e.target)) {
            const menu = document.getElementById('color-picker-menu');
            if (menu) menu.classList.add('hidden');
        }
    });
</script>