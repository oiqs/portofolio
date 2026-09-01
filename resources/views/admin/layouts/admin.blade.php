<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') — Portfolio Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }

        if (localStorage.colorTheme) {
            document.documentElement.setAttribute('data-color', localStorage.colorTheme);
        }
    </script>
</head>
<body class="bg-paper text-ink min-h-screen flex flex-col md:flex-row antialiased selection:bg-accent/20 selection:text-accent relative">

    {{-- SIDEBAR --}}
    <aside class="w-full md:w-64 bg-ink/[0.04] dark:bg-ink/[0.2] border-b md:border-b-0 md:border-r border-ink/10 flex-shrink-0 p-6 flex flex-col justify-between min-h-0 md:min-h-screen">
        <div>
            {{-- LOGO / BRAND --}}
            <div class="flex items-center justify-between pb-6 mb-6 border-b border-ink/10">
                <a href="{{ route('admin.dashboard') }}" class="font-display font-bold text-xl tracking-tight flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-accent animate-pulse"></span>
                    <span>Admin <span class="text-accent italic font-normal">Panel</span></span>
                </a>
                <a href="{{ url('/') }}" target="_blank" title="Lihat Website Utama" class="px-2.5 py-1 rounded-full border border-ink/15 text-xs text-muted hover:text-accent hover:border-accent transition-all flex items-center gap-1">
                    <span>Web</span>
                    <svg class="w-3 h-3 shrink-0" width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                </a>
            </div>

            {{-- NAVIGATION LINKS --}}
            <nav class="space-y-1.5">
                <a href="{{ route('admin.dashboard') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-xl font-medium text-sm transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-accent text-paper font-semibold shadow-md shadow-accent/20' : 'text-muted hover:bg-ink/5 hover:text-ink' }}">
                    <svg class="w-5 h-5 shrink-0" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 00-1-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('admin.projects.index') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-xl font-medium text-sm transition-all {{ request()->routeIs('admin.projects.*') ? 'bg-accent text-paper font-semibold shadow-md shadow-accent/20' : 'text-muted hover:bg-ink/5 hover:text-ink' }}">
                    <svg class="w-5 h-5 shrink-0" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                    <span>Trip & Projects</span>
                </a>

                <a href="{{ route('admin.skills.index') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-xl font-medium text-sm transition-all {{ request()->routeIs('admin.skills.*') ? 'bg-accent text-paper font-semibold shadow-md shadow-accent/20' : 'text-muted hover:bg-ink/5 hover:text-ink' }}">
                    <svg class="w-5 h-5 shrink-0" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    <span>Aktivitas & Hobi</span>
                </a>

                <a href="{{ route('admin.timelines.index') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-xl font-medium text-sm transition-all {{ request()->routeIs('admin.timelines.*') ? 'bg-accent text-paper font-semibold shadow-md shadow-accent/20' : 'text-muted hover:bg-ink/5 hover:text-ink' }}">
                    <svg class="w-5 h-5 shrink-0" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>Jejak Perjalanan</span>
                </a>

                <a href="{{ route('admin.messages.index') }}" 
                   class="flex items-center justify-between px-4 py-3 rounded-xl font-medium text-sm transition-all {{ request()->routeIs('admin.messages.*') ? 'bg-accent text-paper font-semibold shadow-md shadow-accent/20' : 'text-muted hover:bg-ink/5 hover:text-ink' }}">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 shrink-0" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <span>Pesan Masuk</span>
                    </div>
                    @php $unreadCount = \App\Models\Contact::where('is_read', false)->count(); @endphp
                    @if ($unreadCount > 0)
                        <span class="px-2 py-0.5 rounded-full bg-red-500 text-white text-[11px] font-bold">{{ $unreadCount }}</span>
                    @endif
                </a>
            </nav>
        </div>

        {{-- USER PROFILE & LOGOUT --}}
        <div class="pt-6 mt-6 border-t border-ink/10 space-y-3">
            <div class="flex items-center justify-between px-2">
                <div class="truncate">
                    <p class="text-[10px] text-muted uppercase tracking-wider font-semibold">Logged in as</p>
                    <p class="font-bold text-xs text-ink truncate">{{ Auth::user()->name ?? 'Administrator' }}</p>
                </div>
            </div>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="w-full py-2.5 px-4 rounded-xl border border-ink/15 text-xs font-semibold text-muted hover:text-red-400 hover:border-red-400/40 transition-all flex items-center justify-center gap-2 bg-ink/[0.02]">
                    <svg class="w-4 h-4 shrink-0" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    <span>Keluar (Logout)</span>
                </button>
            </form>
        </div>
    </aside>

    {{-- MAIN WORKSPACE --}}
    <div class="flex-1 flex flex-col min-w-0 bg-paper">
        
        {{-- TOP BAR --}}
        <header class="border-b border-ink/10 px-6 md:px-10 py-4 flex items-center justify-between bg-ink/[0.01]">
            <div>
                <h1 class="font-display font-bold text-xl md:text-2xl text-ink">@yield('title', 'Dashboard Overview')</h1>
            </div>
            
            <div class="flex items-center gap-3">
                {{-- COLOR THEME PICKER BUTTON IN ADMIN HEADER --}}
                <div class="relative" id="admin-color-palette-dropdown">
                    <button onclick="toggleAdminColorPicker(event)" 
                            class="p-2.5 rounded-xl border border-ink/10 hover:bg-ink/5 text-muted hover:text-accent transition-colors flex items-center gap-1.5" 
                            title="Pilih Tema Warna Admin">
                        <svg class="w-5 h-5 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.098 19.902a3.75 3.75 0 005.304 0l6.401-6.402M6.75 21A3.75 3.75 0 013 17.25V4.125C3 3.504 3.504 3 4.125 3h5.25c.621 0 1.125.504 1.125 1.125v4.072M6.75 21a3.75 3.75 0 003.75-3.75V8.197M6.75 21h13.125c.621 0 1.125-.504 1.125-1.125v-5.25c0-.621-.504-1.125-1.125-1.125h-4.072M10.5 8.197l9.604-9.604a2.25 2.25 0 013.182 3.182l-9.604 9.604M10.5 8.197v4.072" />
                        </svg>
                        <span class="w-2 h-2 rounded-full bg-accent animate-pulse"></span>
                    </button>

                    {{-- DROPDOWN MENU --}}
                    <div id="admin-color-picker-menu" 
                         class="hidden absolute right-0 mt-3 w-64 p-4 rounded-2xl bg-paper/95 backdrop-blur-xl border border-ink/15 shadow-2xl z-50 transition-all duration-300 transform origin-top-right">
                        <div class="flex items-center justify-between mb-3 pb-2 border-b border-ink/10">
                            <span class="text-xs font-bold tracking-wider uppercase text-muted">Tema Warna Admin</span>
                            <span class="text-[10px] text-accent font-semibold px-2 py-0.5 rounded-full bg-accent/10">6 Pilihan</span>
                        </div>
                        <div class="grid grid-cols-3 gap-2.5">
                            <button onclick="selectColorTheme('gold')" class="group p-2.5 rounded-xl border border-ink/10 hover:border-accent bg-ink/5 hover:bg-ink/10 flex flex-col items-center gap-1.5 transition-all text-center">
                                <span class="w-6 h-6 rounded-full bg-[#E0B84C] shadow-md ring-2 ring-offset-2 ring-transparent group-hover:ring-[#E0B84C]"></span>
                                <span class="text-[11px] font-medium text-ink">Emas</span>
                            </button>
                            <button onclick="selectColorTheme('blue')" class="group p-2.5 rounded-xl border border-ink/10 hover:border-accent bg-ink/5 hover:bg-ink/10 flex flex-col items-center gap-1.5 transition-all text-center">
                                <span class="w-6 h-6 rounded-full bg-[#3B82F6] shadow-md ring-2 ring-offset-2 ring-transparent group-hover:ring-[#3B82F6]"></span>
                                <span class="text-[11px] font-medium text-ink">Biru</span>
                            </button>
                            <button onclick="selectColorTheme('emerald')" class="group p-2.5 rounded-xl border border-ink/10 hover:border-accent bg-ink/5 hover:bg-ink/10 flex flex-col items-center gap-1.5 transition-all text-center">
                                <span class="w-6 h-6 rounded-full bg-[#10B981] shadow-md ring-2 ring-offset-2 ring-transparent group-hover:ring-[#10B981]"></span>
                                <span class="text-[11px] font-medium text-ink">Hijau</span>
                            </button>
                            <button onclick="selectColorTheme('violet')" class="group p-2.5 rounded-xl border border-ink/10 hover:border-accent bg-ink/5 hover:bg-ink/10 flex flex-col items-center gap-1.5 transition-all text-center">
                                <span class="w-6 h-6 rounded-full bg-[#A855F7] shadow-md ring-2 ring-offset-2 ring-transparent group-hover:ring-[#A855F7]"></span>
                                <span class="text-[11px] font-medium text-ink">Ungu</span>
                            </button>
                            <button onclick="selectColorTheme('crimson')" class="group p-2.5 rounded-xl border border-ink/10 hover:border-accent bg-ink/5 hover:bg-ink/10 flex flex-col items-center gap-1.5 transition-all text-center">
                                <span class="w-6 h-6 rounded-full bg-[#F97316] shadow-md ring-2 ring-offset-2 ring-transparent group-hover:ring-[#F97316]"></span>
                                <span class="text-[11px] font-medium text-ink">Merah</span>
                            </button>
                            <button onclick="selectColorTheme('teal')" class="group p-2.5 rounded-xl border border-ink/10 hover:border-accent bg-ink/5 hover:bg-ink/10 flex flex-col items-center gap-1.5 transition-all text-center">
                                <span class="w-6 h-6 rounded-full bg-[#14B8A6] shadow-md ring-2 ring-offset-2 ring-transparent group-hover:ring-[#14B8A6]"></span>
                                <span class="text-[11px] font-medium text-ink">Teal</span>
                            </button>
                        </div>
                    </div>
                </div>

                {{-- DARK MODE TOGGLE --}}
                <button onclick="toggleTheme()" class="p-2.5 rounded-xl border border-ink/10 hover:bg-ink/5 text-muted hover:text-accent transition-colors" title="Beralih Mode Gelap/Terang">
                    <svg class="w-5 h-5 hidden dark:block" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    <svg class="w-5 h-5 block dark:hidden" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>
                </button>
            </div>
        </header>

        {{-- FLASH MESSAGES & CONTENT CONTAINER --}}
        <main class="p-6 md:p-10 flex-1 max-w-7xl w-full mx-auto">
            @if (session('success'))
                <div class="mb-8 px-6 py-4 rounded-2xl bg-accent/10 border border-accent/30 text-accent font-medium flex items-center justify-between shadow-sm">
                    <div class="flex items-center gap-3">
                        <span class="w-2 h-2 rounded-full bg-accent"></span>
                        <span>{{ session('success') }}</span>
                    </div>
                    <button onclick="this.parentElement.remove()" class="text-accent/60 hover:text-accent font-bold text-lg">&times;</button>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    {{-- ALSO INCLUDE FLOATING COLOR PICKER IN BOTTOM LEFT --}}
    <x-color-picker />

    <script>
        function toggleTheme() {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.theme = 'light';
            } else {
                document.documentElement.classList.add('dark');
                localStorage.theme = 'dark';
            }
        }

        function toggleAdminColorPicker(e) {
            e.stopPropagation();
            const menu = document.getElementById('admin-color-picker-menu');
            if (menu) menu.classList.toggle('hidden');
        }

        function setColorTheme(color) {
            document.documentElement.setAttribute('data-color', color);
            localStorage.colorTheme = color;
            window.dispatchEvent(new CustomEvent('color-theme-changed', { detail: color }));
        }

        function selectColorTheme(color) {
            setColorTheme(color);
            const adminMenu = document.getElementById('admin-color-picker-menu');
            if (adminMenu) adminMenu.classList.add('hidden');
            const pickerMenu = document.getElementById('color-picker-menu');
            if (pickerMenu) pickerMenu.classList.add('hidden');
        }

        document.addEventListener('click', function(e) {
            const adminDropdown = document.getElementById('admin-color-palette-dropdown');
            if (adminDropdown && !adminDropdown.contains(e.target)) {
                const adminMenu = document.getElementById('admin-color-picker-menu');
                if (adminMenu) adminMenu.classList.add('hidden');
            }
        });
    </script>
</body>
</html>
