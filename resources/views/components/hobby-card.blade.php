@props([
    'skill',
    'index' => 0,
])

@php
    $name = (string) ($skill['name'] ?? $skill->name ?? '');
    $level = (string) ($skill['level'] ?? $skill->level ?? '');
    $lower = strtolower($name);

    // Mapping icon Lucide SVG berdasarkan nama hobi
    if (str_contains($lower, 'itinerary') || str_contains($lower, 'planning') || str_contains($lower, 'rencana') || str_contains($lower, 'peta')) {
        $icon = 'map';
    } elseif (str_contains($lower, 'sunset') || str_contains($lower, 'pantai') || str_contains($lower, 'beach') || str_contains($lower, 'laut')) {
        $icon = 'sunset';
    } elseif (str_contains($lower, 'camping') || str_contains($lower, 'alam') || str_contains($lower, 'gunung') || str_contains($lower, 'hiking')) {
        $icon = 'tent';
    } elseif (str_contains($lower, 'foto') || str_contains($lower, 'camera') || str_contains($lower, 'kamera')) {
        $icon = 'camera';
    } elseif (str_contains($lower, 'kuliner') || str_contains($lower, 'cafe') || str_contains($lower, 'kopi') || str_contains($lower, 'coffee') || str_contains($lower, 'makan')) {
        $icon = 'coffee';
    } elseif (str_contains($lower, 'road trip') || str_contains($lower, 'travel') || str_contains($lower, 'touring') || str_contains($lower, 'trip')) {
        $icon = 'car';
    } else {
        $icon = 'sparkles';
    }

    // Mapping 5 segmen indikator tingkat minat:
    // Sangat Suka = 5, Favorit = 4, Hobi / Santai = 3
    $lvlLower = strtolower($level);
    if (str_contains($lvlLower, 'sangat') || str_contains($lvlLower, 'love')) {
        $segments = 5;
    } elseif (str_contains($lvlLower, 'favorit') || str_contains($lvlLower, 'favorite')) {
        $segments = 4;
    } else {
        $segments = 3;
    }
@endphp

<div {{ $attributes->merge(['class' => 'group relative flex flex-col justify-between h-full rounded-2xl border border-ink/10 dark:border-white/15 bg-white/85 dark:bg-[#121620]/90 backdrop-blur-xl shadow-md shadow-black/5 dark:shadow-black/25 p-6 transition-all duration-300 hover:-translate-y-1.5 hover:border-accent hover:shadow-xl hover:shadow-accent/10 overflow-hidden']) }}>

    {{-- Subtle Ambient Glow in Corner on Hover --}}
    <div class="pointer-events-none absolute -right-6 -bottom-6 w-28 h-28 rounded-full bg-accent/0 blur-2xl transition-all duration-500 group-hover:bg-accent/20 dark:group-hover:bg-accent/25"></div>

    {{-- Top Section: Icon & Level Badge --}}
    <div class="flex items-center justify-between gap-3 mb-4">
        {{-- Ikon Lucide dalam kotak rounded bg-accent/10 --}}
        <div class="flex items-center justify-center w-11 h-11 rounded-xl bg-accent/10 border border-accent/20 text-accent shrink-0 transition-all duration-300 group-hover:scale-105 group-hover:bg-accent/20 group-hover:border-accent/40 shadow-xs">
            @if ($icon === 'tent')
                {{-- Lucide: Tent / Camping --}}
                <svg class="w-5 h-5 stroke-current" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 20 10 4"/>
                    <path d="m5 20 9-16"/>
                    <path d="M3 20h18"/>
                    <path d="m12 15-3 5"/>
                    <path d="m12 15 3 5"/>
                </svg>
            @elseif ($icon === 'camera')
                {{-- Lucide: Camera / Fotografi --}}
                <svg class="w-5 h-5 stroke-current" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z"/>
                    <circle cx="12" cy="13" r="3"/>
                </svg>
            @elseif ($icon === 'coffee')
                {{-- Lucide: Coffee / Kuliner & Cafe --}}
                <svg class="w-5 h-5 stroke-current" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17 8h1a4 4 0 1 1 0 8h-1"/>
                    <path d="M3 8h14v9a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4Z"/>
                    <line x1="6" x2="6" y1="2" y2="4"/>
                    <line x1="10" x2="10" y1="2" y2="4"/>
                    <line x1="14" x2="14" y1="2" y2="4"/>
                </svg>
            @elseif ($icon === 'car')
                {{-- Lucide: Car / Road Trip & Traveling --}}
                <svg class="w-5 h-5 stroke-current" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"/>
                    <circle cx="7" cy="17" r="2"/>
                    <path d="M9 17h6"/>
                    <circle cx="17" cy="17" r="2"/>
                </svg>
            @elseif ($icon === 'sunset')
                {{-- Lucide: Sunset / Pantai --}}
                <svg class="w-5 h-5 stroke-current" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 10V2"/>
                    <path d="m4.93 10.93 1.41 1.41"/>
                    <path d="M2 18h2"/>
                    <path d="M20 18h2"/>
                    <path d="m19.07 10.93-1.41 1.41"/>
                    <path d="M22 22H2"/>
                    <path d="m16 6-4 4-4-4"/>
                    <path d="M16 18a4 4 0 0 0-8 0"/>
                </svg>
            @elseif ($icon === 'map')
                {{-- Lucide: Map / Itinerary & Trip Planning --}}
                <svg class="w-5 h-5 stroke-current" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14.106 5.553a2 2 0 0 0 1.788 0l3.659-1.83A1 1 0 0 1 21 4.619v12.764a1 1 0 0 1-.553.894l-4.553 2.277a2 2 0 0 1-1.788 0l-4.212-2.106a2 2 0 0 0-1.788 0l-3.659 1.83A1 1 0 0 1 3 19.381V6.618a1 1 0 0 1 .553-.894l4.553-2.277a2 2 0 0 1 1.788 0z"/>
                    <path d="M15 5.764v15"/>
                    <path d="M9 3.236v15"/>
                </svg>
            @else
                {{-- Lucide: Sparkles (Default) --}}
                <svg class="w-5 h-5 stroke-current" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/>
                    <path d="M5 3v4"/>
                    <path d="M19 17v4"/>
                    <path d="M3 5h4"/>
                    <path d="M17 19h4"/>
                </svg>
            @endif
        </div>

        {{-- Badge Level (Anti patah baris, ukuran proporsional) --}}
        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold border border-accent/25 bg-accent/10 text-accent tracking-wide uppercase whitespace-nowrap shrink-0 shadow-xs">
            {{ __($level) }}
        </span>
    </div>

    {{-- Middle Section: Judul Hobi --}}
    <div class="my-auto py-2">
        <h3 class="font-display text-lg sm:text-xl font-bold text-ink dark:text-white leading-snug tracking-tight group-hover:text-accent transition-colors duration-300">
            {{ __($name) }}
        </h3>
    </div>

    {{-- Bottom Section: Indikator 5 Segmen Kecil (Selalu Sejajar di Bawah) --}}
    <div class="mt-auto pt-4 border-t border-ink/5 dark:border-white/5">
        <div class="flex items-center justify-between mb-2 text-[11px]">
            <span class="font-medium text-muted">
                {{ __('Tingkat Minat') }}
            </span>
            <span class="font-mono font-semibold text-accent">
                {{ $segments }}/5
            </span>
        </div>
        <div class="flex items-center gap-1.5 w-full" aria-label="{{ $segments }} of 5 segments">
            @for ($i = 1; $i <= 5; $i++)
                <div class="h-1.5 flex-1 rounded-full transition-all duration-300 {{ $i <= $segments ? 'bg-accent shadow-xs' : 'bg-ink/10 dark:bg-white/10' }}"></div>
            @endfor
        </div>
    </div>

</div>
