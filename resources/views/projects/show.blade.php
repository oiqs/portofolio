@extends('layouts.app')

@section('title', $project['title'].' — Thoriq Alfurqan M.L')

@section('content')

@php
    $allPhotos = [];
    if (!empty($project['cover_image'])) {
        $allPhotos[] = [
            'url' => asset('storage/' . $project['cover_image']),
            'caption' => $project['title'] . ' — Foto Sampul Utama'
        ];
    }
    if (!empty($project['gallery_images']) && is_array($project['gallery_images'])) {
        foreach ($project['gallery_images'] as $index => $photoPath) {
            $allPhotos[] = [
                'url' => asset('storage/' . $photoPath),
                'caption' => $project['title'] . ' — Dokumentasi #' . ($index + 1)
            ];
        }
    }
    $galleryImages = is_array($project['gallery_images'] ?? null) ? $project['gallery_images'] : [];
    $totalPhotoCount = count($allPhotos);
@endphp

{{-- HEADER TRIP --}}
<section class="max-w-6xl mx-auto px-6 md:px-10 pt-24 pb-16">
    <a href="{{ url('/projects') }}" class="text-sm font-semibold tracking-wide text-muted hover:text-accent transition-colors mb-10 inline-flex items-center gap-2 group px-4 py-2 rounded-full border border-ink/10 dark:border-white/10 bg-ink/5 dark:bg-white/5 w-fit">
        <span class="group-hover:-translate-x-1 transition-transform">&larr;</span> {{ __('Kembali ke Galeri Perjalanan') }}
    </a>

    <div class="grid md:grid-cols-5 gap-12 items-end">
        <div class="md:col-span-4 space-y-4">
            @if(!empty($project['location_address']))
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-accent/30 bg-accent/10 text-accent text-xs font-bold tracking-wider uppercase">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                    </svg>
                    {{ $project['location_address'] }}
                </div>
            @endif

            <h1 class="font-display text-4xl sm:text-5xl md:text-6xl font-bold leading-[1.1] tracking-tight">{{ $project['title'] }}</h1>
            <p class="text-lg sm:text-xl text-muted max-w-2xl leading-relaxed">{{ $project['description'] }}</p>
        </div>

        <div class="md:col-span-1 text-sm space-y-4 md:text-right border-t md:border-t-0 md:border-l border-ink/10 dark:border-white/10 pt-6 md:pt-0 md:pl-6">
            <div>
                <p class="text-muted text-xs uppercase tracking-widest font-semibold mb-1">{{ __('Tahun Trip') }}</p>
                <p class="font-bold text-accent text-lg">{{ $project['year'] }}</p>
            </div>
            <div>
                <p class="text-muted text-xs uppercase tracking-widest font-semibold mb-1">{{ __('Kategori Destinasi') }}</p>
                <p class="font-medium text-ink">{{ $project['role'] }}</p>
            </div>
            @if ($totalPhotoCount > 0)
            <div>
                <p class="text-muted text-xs uppercase tracking-widest font-semibold mb-1">{{ __('Total Dokumentasi') }}</p>
                <span class="inline-block px-3 py-1 rounded-full bg-accent/10 border border-accent/30 text-accent font-bold text-xs">
                    {{ $totalPhotoCount }} {{ __('Foto HD') }}
                </span>
            </div>
            @endif
        </div>
    </div>
</section>

{{-- FOTO COVER UTAMA --}}
<section class="max-w-6xl mx-auto px-6 md:px-10 pb-20">
    @if (!empty($project['cover_image']))
        <div class="relative group">
            {{-- Ambient Light Background Glow --}}
            <div class="absolute -inset-2 rounded-3xl bg-accent/20 blur-3xl opacity-40 group-hover:opacity-75 transition-opacity duration-700 pointer-events-none"></div>

            <div onclick="openLightbox(0)" 
                 class="relative aspect-[21/9] bg-ink/10 dark:bg-white/5 rounded-3xl overflow-hidden border border-ink/10 dark:border-white/10 shadow-2xl cursor-pointer">
                
                <img src="{{ asset('storage/' . $project['cover_image']) }}" 
                     alt="{{ $project['title'] }}" 
                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                
                {{-- Floating Top Badge --}}
                <div class="absolute top-6 left-6 z-10">
                    <span class="px-4 py-1.5 rounded-full bg-black/50 backdrop-blur-md border border-white/20 text-white text-xs font-bold tracking-widest uppercase flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-accent animate-pulse"></span>
                        {{ __('Foto Sampul Utama') }}
                    </span>
                </div>

                {{-- Floating Zoom Hint Overlay --}}
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-80 sm:opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end justify-between p-6 sm:p-8">
                    <div class="flex items-center gap-3 text-white">
                        <div class="w-10 h-10 rounded-full bg-accent text-paper flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607zM10.5 7.5v6m3-3h-6" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-bold">{{ __('Pratinjau Mode Layar Penuh') }}</p>
                            <p class="text-xs text-white/70">{{ __('Klik untuk melihat seluruh galeri foto') }}</p>
                        </div>
                    </div>

                    <span class="text-xs font-semibold px-3 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-white hidden sm:block">
                        1 / {{ $totalPhotoCount }}
                    </span>
                </div>
            </div>
        </div>
    @else
        <div class="aspect-[21/9] bg-ink/5 dark:bg-white/5 rounded-3xl overflow-hidden relative border border-ink/10 flex flex-col items-center justify-center text-accent/50 p-6 text-center">
            <svg class="w-16 h-16 mb-4 opacity-60" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
            </svg>
            <p class="font-display text-lg">{{ __('Foto Sampul Perjalanan Belum Diunggah') }}</p>
        </div>
    @endif
</section>

{{-- GALERI FOTO-FOTO TRAVELING --}}
@if (count($galleryImages) > 0)
<section class="max-w-6xl mx-auto px-6 md:px-10 pb-24 border-t border-ink/10 dark:border-white/10 pt-20">
    <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-12 gap-4">
        <div>
            <div class="flex items-center gap-2 text-xs font-bold text-accent tracking-[0.25em] uppercase mb-2">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0c-.693.04-1.33.435-1.736 1.039l-.821 1.316z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                </svg>
                {{ __('Dokumentasi Visual') }}
            </div>
            <h2 class="font-display text-3xl sm:text-4xl font-bold">{{ __('Galeri Foto Traveling') }}</h2>
        </div>
        
        <p class="text-xs text-muted font-medium bg-ink/5 dark:bg-white/5 border border-ink/10 dark:border-white/10 px-4 py-2 rounded-full w-fit">
            💡 {{ __('Klik foto mana saja untuk memperbesar & jelajah mode slide HD') }}
        </p>
    </div>

    {{-- EDITORIAL MASONRY / DYNAMIC GRID DISPLAY --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 auto-rows-[280px]">
        @foreach ($galleryImages as $index => $photo)
            @php 
                $photoIndex = !empty($project['cover_image']) ? $index + 1 : $index;
                $isFeatureTile = ($index === 0 && count($galleryImages) >= 3);
            @endphp
            
            <div onclick="openLightbox({{ $photoIndex }})" 
                 class="group relative rounded-3xl overflow-hidden border border-ink/10 dark:border-white/10 bg-ink/10 dark:bg-white/5 shadow-lg hover:shadow-2xl hover:border-accent/40 transition-all duration-500 hover:-translate-y-1.5 cursor-pointer {{ $isFeatureTile ? 'sm:col-span-2 sm:row-span-2' : 'col-span-1 row-span-1' }}">
                
                {{-- Foto Gallery --}}
                <img src="{{ asset('storage/' . $photo) }}" 
                     alt="Foto Traveling {{ $project['title'] }} #{{ $index + 1 }}" 
                     loading="lazy"
                     class="w-full h-full object-cover group-hover:scale-108 transition-transform duration-700 ease-out">
                
                {{-- Top Right Index Badge --}}
                <div class="absolute top-4 right-4 z-10">
                    <span class="px-3 py-1 rounded-full bg-black/50 backdrop-blur-md border border-white/20 text-white text-[11px] font-bold tracking-wider">
                        #{{ $index + 1 }}
                    </span>
                </div>

                {{-- Hover Gradient Overlay --}}
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-between p-6">
                    <div class="flex justify-start">
                        <span class="p-2.5 rounded-full bg-accent text-paper shadow-lg transform -translate-y-2 group-hover:translate-y-0 transition-transform duration-300">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607zM10.5 7.5v6m3-3h-6" />
                            </svg>
                        </span>
                    </div>

                    <div class="transform translate-y-2 group-hover:translate-y-0 transition-transform duration-300 flex items-center justify-between text-white">
                        <div>
                            <p class="text-xs text-accent font-bold uppercase tracking-widest">{{ __('Dokumentasi Momen') }}</p>
                            <p class="text-sm font-semibold truncate">{{ $project['title'] }}</p>
                        </div>
                        <span class="text-[11px] font-mono opacity-70">oiq_s</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endif

{{-- PROBLEM & SOLUTION / LATAR BELAKANG & PENGALAMAN --}}
<section class="max-w-6xl mx-auto px-6 md:px-10 py-24 border-t border-ink/10 dark:border-white/10 grid md:grid-cols-2 gap-16">
    <div class="space-y-4">
        <h2 class="font-display text-3xl font-bold flex items-center gap-4">
            <span class="w-8 h-[2px] bg-accent"></span> {{ __('Latar Belakang Trip') }}
        </h2>
        <p class="text-muted text-base sm:text-lg leading-relaxed">{{ $project['problem'] }}</p>
    </div>
    <div class="space-y-4">
        <h2 class="font-display text-3xl font-bold flex items-center gap-4">
            <span class="w-8 h-[2px] bg-accent"></span> {{ __('Pengalaman Trip') }}
        </h2>
        <p class="text-muted text-base sm:text-lg leading-relaxed">{{ $project['solution'] }}</p>
    </div>
</section>

{{-- TECH STACK / ELEMEN TRIP --}}
<section class="max-w-6xl mx-auto px-6 md:px-10 py-24 border-t border-ink/10 dark:border-white/10">
    <h2 class="font-display text-3xl font-bold mb-10 text-center">{{ __('Fokus & Elemen Trip') }}</h2>
    <div class="flex flex-wrap justify-center gap-3">
        @foreach ((array)$project['stack'] as $tech)
            <span class="px-6 py-3 rounded-full bg-ink/5 dark:bg-white/5 border border-ink/10 dark:border-white/10 text-xs sm:text-sm uppercase tracking-widest font-semibold hover:border-accent/40 transition-colors">{{ $tech }}</span>
        @endforeach
    </div>
</section>

{{-- HASIL/IMPACT / CATATAN PERJALANAN --}}
<section class="max-w-6xl mx-auto px-6 md:px-10 py-24 border-t border-ink/10 dark:border-white/10 text-center">
    <h2 class="font-display text-3xl sm:text-4xl font-bold mb-6">{{ __('Kesan & Catatan Perjalanan') }}</h2>
    <p class="text-muted text-base sm:text-lg leading-relaxed max-w-3xl mx-auto mb-8">{{ $project['impact'] }}</p>
</section>

{{-- LOKASI & PETA WISATA (GOOGLE MAPS) --}}
@php
    $mapEmbedSrc = null;
    $mapDirectUrl = null;
    $addressText = $project['location_address'] ?? null;
    $addressQuery = urlencode($addressText ?: $project['title']);

    // Default safe fallback search URL
    $mapDirectUrl = "https://www.google.com/maps/search/?api=1&query={$addressQuery}";
    $mapEmbedSrc = "https://maps.google.com/maps?q={$addressQuery}&t=&z=14&ie=UTF8&iwloc=&output=embed";

    if (!empty($project['location_map_url'])) {
        $rawUrl = trim($project['location_map_url']);
        
        // Extract src if full iframe tag was pasted
        if (preg_match('/src="([^"]+)"/', $rawUrl, $matches)) {
            $rawUrl = $matches[1];
        }

        // Only accept validated Google Maps embed / direct URLs
        if (str_starts_with($rawUrl, 'https://www.google.com/maps') || str_starts_with($rawUrl, 'https://maps.google.com') || str_starts_with($rawUrl, 'https://goo.gl/maps')) {
            if (str_contains($rawUrl, 'google.com/maps/embed')) {
                $mapEmbedSrc = $rawUrl;
            } elseif (filter_var($rawUrl, FILTER_VALIDATE_URL)) {
                $mapDirectUrl = $rawUrl;
            }
        }
    }
@endphp

@if (!empty($addressText) || !empty($mapEmbedSrc))
<section class="max-w-6xl mx-auto px-6 md:px-10 py-24 border-t border-ink/10 dark:border-white/10">
    <div class="mb-12 text-center max-w-2xl mx-auto">
        <p class="text-xs font-bold text-accent tracking-[0.25em] uppercase mb-2">{{ __('Petunjuk Arah & Lokasi') }}</p>
        <h2 class="font-display text-3xl sm:text-4xl font-bold">{{ __('Peta & Alamat Destinasi') }}</h2>
    </div>

    <div class="grid lg:grid-cols-12 gap-8 items-stretch">
        {{-- KARTU ALAMAT (KIRI) --}}
        <div class="lg:col-span-5 bg-ink/5 dark:bg-white/5 border border-ink/10 dark:border-white/10 rounded-3xl p-8 sm:p-10 flex flex-col justify-between space-y-8">
            <div class="space-y-6">
                <div class="w-14 h-14 rounded-2xl bg-accent/10 border border-accent/20 flex items-center justify-center text-accent">
                    <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                    </svg>
                </div>

                <div>
                    <h3 class="font-display text-2xl font-bold mb-3">{{ $project['title'] }}</h3>
                    @if (!empty($addressText))
                        <p class="text-muted text-base leading-relaxed">
                            {{ $addressText }}
                        </p>
                    @else
                        <p class="text-muted text-base leading-relaxed">
                            {{ __('Alamat destinasi dapat dilihat pada peta interaktif di samping.') }}
                        </p>
                    @endif
                </div>
            </div>

            @if (!empty($mapDirectUrl))
                <div class="pt-4">
                    <a href="{{ $mapDirectUrl }}" target="_blank" rel="noopener noreferrer" 
                       class="inline-flex items-center justify-center gap-3 w-full px-6 py-4 rounded-full bg-accent text-paper font-semibold hover:bg-accent-dark transition-all shadow-lg shadow-accent/20 hover:-translate-y-0.5">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                        </svg>
                        {{ __('Buka di Google Maps') }}
                    </a>
                </div>
            @endif
        </div>

        {{-- FRAME GOOGLE MAPS INTERAKTIF (KANAN) --}}
        <div class="lg:col-span-7 bg-ink/10 dark:bg-white/5 border border-ink/10 dark:border-white/10 rounded-3xl overflow-hidden min-h-[350px] sm:min-h-[420px] relative shadow-xl">
            @if (!empty($mapEmbedSrc))
                <iframe src="{{ $mapEmbedSrc }}" 
                        width="100%" 
                        height="100%" 
                        style="border:0; min-height: 380px;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade"
                        class="w-full h-full rounded-3xl filter saturate-[0.95] contrast-[1.05]">
                </iframe>
            @else
                <div class="flex items-center justify-center h-full p-8 text-center text-muted">
                    <p class="font-display">{{ __('Peta lokasi tidak tersedia untuk destinasi ini.') }}</p>
                </div>
            @endif
        </div>
    </div>
</section>
@endif

{{-- NEXT TRIP NAV --}}
<section class="max-w-6xl mx-auto px-6 md:px-10 py-28 border-t border-ink/10 dark:border-white/10">
    <p class="text-xs font-bold tracking-[0.25em] uppercase text-accent mb-6 text-center">Destinasi Berikutnya</p>
    <a href="{{ url('/projects/'.$next['slug']) }}"
       class="group flex flex-col items-center justify-center max-w-3xl mx-auto text-center">
        <h2 class="font-display text-3xl sm:text-4xl md:text-5xl font-bold group-hover:text-accent transition-colors duration-500 mb-4">{{ $next['title'] }}</h2>
        <span class="text-3xl text-accent group-hover:translate-x-4 transition-transform duration-500">&rarr;</span>
    </a>
</section>


{{-- ADVANCED FULLSCREEN LIGHTBOX MODAL WITH FILMSTRIP THUMBNAILS --}}
@if ($totalPhotoCount > 0)
<div id="lightbox-modal" class="fixed inset-0 z-50 hidden bg-black/95 backdrop-blur-2xl flex flex-col justify-between items-center p-4 sm:p-6 select-none transition-all duration-300">
    
    {{-- TOP BAR LIGHTBOX --}}
    <div class="w-full flex items-center justify-between text-white/90 z-20 max-w-7xl mx-auto px-2">
        <div class="flex items-center gap-3">
            <span class="px-3 py-1 rounded-full bg-accent/90 text-paper text-xs font-bold tracking-widest uppercase shadow-md" id="lightbox-counter">
                1 / {{ $totalPhotoCount }}
            </span>
            <span class="text-white/30 hidden sm:inline">&bull;</span>
            <span class="text-xs sm:text-sm font-medium text-white/80 truncate max-w-xs sm:max-w-md hidden sm:inline" id="lightbox-caption"></span>
        </div>
        
        <button onclick="closeLightbox()" 
                class="p-2.5 sm:p-3 rounded-full bg-white/10 hover:bg-accent text-white transition-all duration-300 hover:scale-110 hover:rotate-90 shadow-lg" 
                title="Tutup Pratinjau (Tekan ESC)">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    {{-- MAIN UNCROPPED IMAGE VIEW CONTAINER --}}
    <div class="relative flex-1 w-full flex items-center justify-center my-2 sm:my-4 overflow-hidden" onclick="if(event.target === this) closeLightbox()">
        
        {{-- PREV BUTTON --}}
        @if ($totalPhotoCount > 1)
        <button onclick="prevPhoto()" 
                class="absolute left-2 sm:left-6 z-30 p-3 sm:p-4 rounded-full bg-black/50 border border-white/20 text-white hover:bg-accent hover:border-accent transition-all duration-300 hover:scale-110 shadow-2xl" 
                title="Foto Sebelumnya (Panah Kiri)">
            <svg class="w-6 h-6 sm:w-7 sm:h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
        @endif

        {{-- MAIN IMAGE --}}
        <img id="lightbox-img" 
             src="" 
             alt="Foto HD Traveling" 
             class="max-h-[72vh] sm:max-h-[76vh] max-w-[92vw] object-contain rounded-2xl shadow-2xl transition-all duration-300 transform scale-95 opacity-0 cursor-default">

        {{-- NEXT BUTTON --}}
        @if ($totalPhotoCount > 1)
        <button onclick="nextPhoto()" 
                class="absolute right-2 sm:right-6 z-30 p-3 sm:p-4 rounded-full bg-black/50 border border-white/20 text-white hover:bg-accent hover:border-accent transition-all duration-300 hover:scale-110 shadow-2xl" 
                title="Foto Berikutnya (Panah Kanan)">
            <svg class="w-6 h-6 sm:w-7 sm:h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
            </svg>
        </button>
        @endif

    </div>

    {{-- FILMSTRIP THUMBNAILS AT BOTTOM --}}
    @if ($totalPhotoCount > 1)
    <div class="w-full max-w-4xl mx-auto z-20 overflow-x-auto py-2 px-4 no-scrollbar flex items-center justify-center gap-2 sm:gap-3 bg-black/40 backdrop-blur-md rounded-2xl border border-white/10">
        @foreach ($allPhotos as $idx => $ph)
            <button onclick="goToPhoto({{ $idx }})" 
                    id="thumb-btn-{{ $idx }}"
                    class="relative shrink-0 w-12 h-12 sm:w-14 sm:h-14 rounded-xl overflow-hidden border-2 transition-all duration-300 opacity-60 hover:opacity-100 hover:scale-105 border-white/20">
                <img src="{{ $ph['url'] }}" alt="Thumbnail {{ $idx + 1 }}" class="w-full h-full object-cover">
            </button>
        @endforeach
    </div>
    @endif

    {{-- KEYBOARD HINT --}}
    <div class="text-[11px] text-white/40 tracking-wider font-light text-center pt-1 hidden sm:block">
        Gunakan tombol panah <kbd class="px-1.5 py-0.5 rounded bg-white/10 border border-white/20 font-mono text-[10px] text-white/80">&larr;</kbd> <kbd class="px-1.5 py-0.5 rounded bg-white/10 border border-white/20 font-mono text-[10px] text-white/80">&rarr;</kbd> atau <kbd class="px-1.5 py-0.5 rounded bg-white/10 border border-white/20 font-mono text-[10px] text-white/80">ESC</kbd> untuk berpindah & menutup
    </div>
</div>

<script>
    const photos = @json($allPhotos);
    let currentPhotoIndex = 0;

    const modal = document.getElementById('lightbox-modal');
    const img = document.getElementById('lightbox-img');
    const counter = document.getElementById('lightbox-counter');
    const caption = document.getElementById('lightbox-caption');

    function openLightbox(index) {
        if (!photos || photos.length === 0) return;
        currentPhotoIndex = index;
        updateLightboxContent();
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
        
        setTimeout(() => {
            img.classList.remove('scale-95', 'opacity-0');
            img.classList.add('scale-100', 'opacity-100');
        }, 50);
    }

    function closeLightbox() {
        img.classList.remove('scale-100', 'opacity-100');
        img.classList.add('scale-95', 'opacity-0');
        
        setTimeout(() => {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }, 200);
    }

    function updateLightboxContent() {
        const item = photos[currentPhotoIndex];
        
        // Soft fade out / in transition
        img.classList.remove('scale-100', 'opacity-100');
        img.classList.add('scale-95', 'opacity-0');
        
        setTimeout(() => {
            img.src = item.url;
            caption.innerText = item.caption;
            counter.innerText = `${currentPhotoIndex + 1} / ${photos.length}`;

            // Update Thumbnails Active Ring
            photos.forEach((_, idx) => {
                const btn = document.getElementById(`thumb-btn-${idx}`);
                if (btn) {
                    if (idx === currentPhotoIndex) {
                        btn.classList.remove('opacity-60', 'border-white/20');
                        btn.classList.add('opacity-100', 'border-accent', 'ring-2', 'ring-accent/50', 'scale-105');
                        btn.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
                    } else {
                        btn.classList.remove('border-accent', 'ring-2', 'ring-accent/50', 'scale-105');
                        btn.classList.add('opacity-60', 'border-white/20');
                    }
                }
            });

            img.classList.remove('scale-95', 'opacity-0');
            img.classList.add('scale-100', 'opacity-100');
        }, 150);
    }

    function goToPhoto(index) {
        if (index === currentPhotoIndex) return;
        currentPhotoIndex = index;
        updateLightboxContent();
    }

    function nextPhoto() {
        currentPhotoIndex = (currentPhotoIndex + 1) % photos.length;
        updateLightboxContent();
    }

    function prevPhoto() {
        currentPhotoIndex = (currentPhotoIndex - 1 + photos.length) % photos.length;
        updateLightboxContent();
    }

    document.addEventListener('keydown', function (e) {
        if (modal.classList.contains('hidden')) return;
        if (e.key === 'Escape') closeLightbox();
        if (e.key === 'ArrowRight') nextPhoto();
        if (e.key === 'ArrowLeft') prevPhoto();
    });
</script>
@endif

@endsection