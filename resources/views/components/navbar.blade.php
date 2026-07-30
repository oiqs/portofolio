<header class="border-b border-ink/5 backdrop-blur-md sticky top-0 z-50 bg-paper/80">
    <div class="max-w-6xl mx-auto px-6 md:px-10 py-6 flex items-center justify-between">
        <a href="{{ url('/') }}" class="font-display text-xl tracking-wide group">
            oIQs<span class="text-accent transition-transform inline-block group-hover:scale-125">.</span>
        </a>

        <div class="flex items-center gap-6">
            <nav class="hidden md:flex items-center gap-10 text-sm font-medium tracking-wide">
                <a href="{{ url('/') }}" class="text-muted hover:text-accent transition-colors">Home</a>
                <a href="{{ url('/about') }}" class="text-muted hover:text-accent transition-colors">About</a>
                <a href="{{ url('/projects') }}" class="text-muted hover:text-accent transition-colors">Projects</a>
                <a href="{{ url('/contact') }}"
                   class="px-6 py-2.5 rounded-full bg-ink text-paper hover:bg-accent transition-colors">
                    Contact
                </a>
            </nav>

            <button onclick="toggleTheme()" class="p-2 rounded-full border border-ink/10 text-muted hover:text-accent hover:border-accent transition-colors group" aria-label="Toggle Dark Mode">
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

            <button class="md:hidden text-muted hover:text-accent transition-colors" aria-label="Menu">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>
</header>