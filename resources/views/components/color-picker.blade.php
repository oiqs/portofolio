{{-- FLOATING COLOR THEME SELECTOR (POJOK KIRI BAWAH) --}}
<div class="fixed bottom-6 left-6 z-50" id="color-palette-widget">
    {{-- FLOATING BUTTON --}}
    <button onclick="toggleColorPicker(event)" 
            class="p-3 rounded-full bg-paper/90 backdrop-blur-xl border border-ink/15 shadow-2xl text-muted hover:text-accent hover:border-accent hover:scale-105 active:scale-95 transition-all duration-300 group flex items-center gap-2"
            aria-label="Pilih Warna Tema"
            title="Pilih Tema Warna Website">
        <svg class="w-5 h-5 text-accent transition-transform group-hover:rotate-45 duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.098 19.902a3.75 3.75 0 005.304 0l6.401-6.402M6.75 21A3.75 3.75 0 013 17.25V4.125C3 3.504 3.504 3 4.125 3h5.25c.621 0 1.125.504 1.125 1.125v4.072M6.75 21a3.75 3.75 0 003.75-3.75V8.197M6.75 21h13.125c.621 0 1.125-.504 1.125-1.125v-5.25c0-.621-.504-1.125-1.125-1.125h-4.072M10.5 8.197l9.604-9.604a2.25 2.25 0 013.182 3.182l-9.604 9.604M10.5 8.197v4.072" />
        </svg>
        <span class="w-2.5 h-2.5 rounded-full bg-accent animate-pulse"></span>
    </button>

    {{-- DROPDOWN MENU (OPENS UPWARDS & RIGHT) --}}
    <div id="color-picker-menu" 
         class="hidden absolute bottom-14 left-0 mb-2 w-64 p-4 rounded-2xl bg-paper/95 backdrop-blur-xl border border-ink/15 shadow-2xl z-50 transition-all duration-300 transform origin-bottom-left">
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

<script>
    function toggleColorPicker(e) {
        e.stopPropagation();
        const menu = document.getElementById('color-picker-menu');
        if (menu) menu.classList.toggle('hidden');
    }

    function selectColorTheme(color) {
        if (typeof setColorTheme === 'function') {
            setColorTheme(color);
        }
        const menu = document.getElementById('color-picker-menu');
        if (menu) menu.classList.add('hidden');
    }

    document.addEventListener('click', function(e) {
        const widget = document.getElementById('color-palette-widget');
        if (widget && !widget.contains(e.target)) {
            const menu = document.getElementById('color-picker-menu');
            if (menu) menu.classList.add('hidden');
        }
    });
</script>
