@extends('layouts.app')

@section('title', $project['title'].' — Thoriq Alfurqan M.L')

@section('content')

@php
    $allPhotos = [];
    if (!empty($project['cover_image'])) {
        $allPhotos[] = [
            'url' => asset('storage/' . $project['cover_image']),
            'caption' => $project['title'] . ' — Foto Utama'
        ];
    }
    if (!empty($project['gallery_images']) && is_array($project['gallery_images'])) {
        foreach ($project['gallery_images'] as $index => $photoPath) {
            $allPhotos[] = [
                'url' => asset('storage/' . $photoPath),
                'caption' => $project['title'] . ' — Galeri #' . ($index + 1)
            ];
        }
    }
@endphp

{{-- HEADER --}}
<section class="max-w-6xl mx-auto px-6 md:px-10 pt-24 pb-16">
    <a href="{{ url('/projects') }}" class="text-sm font-medium tracking-wide text-muted hover:text-accent transition-colors mb-10 inline-flex items-center gap-2 group">
        <span class="group-hover:-translate-x-1 transition-transform">&larr;</span> Kembali ke galeri trip
    </a>

    <div class="grid md:grid-cols-5 gap-12 items-end">
        <div class="md:col-span-4">
            <h1 class="font-display text-4xl md:text-6xl leading-[1.1] mb-6">{{ $project['title'] }}</h1>
            <p class="text-xl text-muted max-w-2xl leading-relaxed">{{ $project['description'] }}</p>
        </div>
        <div class="md:col-span-1 text-sm space-y-3 md:text-right border-t md:border-t-0 md:border-l border-ink/10 pt-6 md:pt-0 md:pl-6">
            <div>
                <p class="text-muted text-xs uppercase tracking-widest mb-1">Tahun</p>
                <p class="font-medium text-accent">{{ $project['year'] }}</p>
            </div>
            <div>
                <p class="text-muted text-xs uppercase tracking-widest mb-1">Kategori Trip</p>
                <p class="font-medium text-ink">{{ $project['role'] }}</p>
            </div>
        </div>
    </div>
</section>

{{-- FOTO COVER UTAMA --}}
<section class="max-w-6xl mx-auto px-6 md:px-10 pb-20">
    @if (!empty($project['cover_image']))
        <div onclick="openLightbox(0)" 
             class="group aspect-[21/9] bg-ink/5 rounded-3xl overflow-hidden relative border border-ink/10 shadow-2xl cursor-pointer">
            <img src="{{ asset('storage/' . $project['cover_image']) }}" 
                 alt="{{ $project['title'] }}" 
                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
            
            {{-- Floating Zoom Hint Overlay --}}
            <div class="absolute inset-0 bg-gradient-to-t from-ink/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end justify-between p-6 sm:p-8">
                <span class="text-sm font-semibold text-paper flex items-center gap-2">
                    <svg class="w-5 h-5 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607zM10.5 7.5v6m3-3h-6" />
                    </svg>
                    Klik foto untuk pratinjau utuh
                </span>
            </div>
        </div>
    @else
        <div class="aspect-[21/9] bg-ink/5 rounded-3xl overflow-hidden relative border border-ink/10 flex flex-col items-center justify-center text-accent/50 p-6 text-center">
            <svg class="w-16 h-16 mb-4 opacity-60" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
            </svg>
            <p class="font-display text-lg">Foto Sampul Perjalanan</p>
        </div>
    @endif
</section>

{{-- GALERI FOTO-FOTO TRAVELING (JIKA ADA) --}}
@if (!empty($project['gallery_images']) && is_array($project['gallery_images']) && count($project['gallery_images']) > 0)
<section class="max-w-6xl mx-auto px-6 md:px-10 pb-24 border-t border-ink/5 pt-20">
    <div class="mb-12">
        <p class="text-xs font-bold text-accent tracking-[0.25em] uppercase mb-2">Dokumentasi Visual</p>
        <h2 class="font-display text-3xl sm:text-4xl font-bold">Galeri Foto Traveling</h2>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach ($project['gallery_images'] as $index => $photo)
            @php $photoIndex = !empty($project['cover_image']) ? $index + 1 : $index; @endphp
            <div onclick="openLightbox({{ $photoIndex }})" 
                 class="group relative aspect-[4/3] rounded-2xl overflow-hidden border border-ink/10 bg-ink/10 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-1 cursor-pointer">
                <img src="{{ asset('storage/' . $photo) }}" 
                     alt="Foto Traveling {{ $project['title'] }}" 
                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-ink/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end p-4">
                    <span class="text-xs font-semibold text-paper tracking-wider">oiq_s</span>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endif

{{-- PROBLEM & SOLUTION / LATAR BELAKANG & PENGALAMAN --}}
<section class="max-w-6xl mx-auto px-6 md:px-10 py-24 border-t border-ink/5 grid md:grid-cols-2 gap-16">
    <div>
        <h2 class="font-display text-3xl mb-6 flex items-center gap-4">
            <span class="w-8 h-[1px] bg-accent"></span> Latar Belakang Trip
        </h2>
        <p class="text-muted text-lg leading-relaxed">{{ $project['problem'] }}</p>
    </div>
    <div>
        <h2 class="font-display text-3xl mb-6 flex items-center gap-4">
            <span class="w-8 h-[1px] bg-accent"></span> Pengalaman Trip
        </h2>
        <p class="text-muted text-lg leading-relaxed">{{ $project['solution'] }}</p>
    </div>
</section>

{{-- TECH STACK / ELEMEN TRIP --}}
<section class="max-w-6xl mx-auto px-6 md:px-10 py-24 border-t border-ink/5">
    <h2 class="font-display text-3xl mb-10 text-center">Fokus & Elemen Trip</h2>
    <div class="flex flex-wrap justify-center gap-4">
        @foreach ((array)$project['stack'] as $tech)
            <span class="px-6 py-3 rounded-full bg-ink/5 border border-ink/5 text-sm uppercase tracking-widest font-medium">{{ $tech }}</span>
        @endforeach
    </div>
</section>

{{-- HASIL/IMPACT / CATATAN PERJALANAN --}}
<section class="max-w-6xl mx-auto px-6 md:px-10 py-24 border-t border-ink/5 text-center">
    <h2 class="font-display text-3xl mb-6">Kesan & Catatan Perjalanan</h2>
    <p class="text-muted text-lg leading-relaxed max-w-3xl mx-auto mb-12">{{ $project['impact'] }}</p>
</section>

{{-- NEXT PROJECT / TRIP --}}
<section class="max-w-6xl mx-auto px-6 md:px-10 py-32 border-t border-ink/5">
    <p class="text-sm font-medium tracking-widest uppercase text-muted mb-6 text-center">Trip berikutnya</p>
    <a href="{{ url('/projects/'.$next['slug']) }}"
       class="group flex flex-col items-center justify-center max-w-3xl mx-auto text-center">
        <h2 class="font-display text-4xl md:text-5xl group-hover:text-accent transition-colors duration-500 mb-6">{{ $next['title'] }}</h2>
        <span class="text-3xl text-accent group-hover:translate-x-4 transition-transform duration-500">&rarr;</span>
    </a>
</section>


{{-- FULLSCREEN LIGHTBOX MODAL --}}
@if (count($allPhotos) > 0)
<div id="lightbox-modal" class="fixed inset-0 z-50 hidden bg-black/95 backdrop-blur-xl flex flex-col justify-between items-center p-4 sm:p-8 select-none transition-opacity duration-300">
    
    {{-- TOP LIGHTBOX BAR --}}
    <div class="w-full flex items-center justify-between text-white/80 z-10 max-w-7xl mx-auto">
        <div class="flex items-center gap-3">
            <span class="text-xs font-bold tracking-widest uppercase text-accent" id="lightbox-counter">1 / 1</span>
            <span class="text-white/40">&bull;</span>
            <span class="text-sm font-medium text-white/90 truncate max-w-xs sm:max-w-md" id="lightbox-caption"></span>
        </div>
        
        <button onclick="closeLightbox()" class="p-3 rounded-full bg-white/10 hover:bg-white/20 text-white transition-all hover:scale-110" title="Tutup (ESC)">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    {{-- MAIN LIGHTBOX IMAGE CONTAINER (UNCROPPED FIT) --}}
    <div class="relative flex-1 w-full flex items-center justify-center my-4 overflow-hidden" onclick="if(event.target === this) closeLightbox()">
        
        {{-- PREVIOUS BUTTON --}}
        @if (count($allPhotos) > 1)
        <button onclick="prevPhoto()" class="absolute left-2 sm:left-6 z-20 p-3 sm:p-4 rounded-full bg-black/40 border border-white/20 text-white hover:bg-accent hover:border-accent transition-all hover:scale-110" title="Sebelumnya (Panah Kiri)">
            <svg class="w-6 h-6 sm:w-8 sm:h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
        @endif

        {{-- UNCROPPED FULL PHOTO --}}
        <img id="lightbox-img" src="" alt="Foto Penuh Traveling" class="max-h-[85vh] max-w-[92vw] object-contain rounded-2xl shadow-2xl transition-all duration-300 transform scale-95 opacity-0 cursor-default">

        {{-- NEXT BUTTON --}}
        @if (count($allPhotos) > 1)
        <button onclick="nextPhoto()" class="absolute right-2 sm:right-6 z-20 p-3 sm:p-4 rounded-full bg-black/40 border border-white/20 text-white hover:bg-accent hover:border-accent transition-all hover:scale-110" title="Berikutnya (Panah Kanan)">
            <svg class="w-6 h-6 sm:w-8 sm:h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
            </svg>
        </button>
        @endif

    </div>

    {{-- FOOTER HINT --}}
    <div class="text-xs text-white/50 tracking-wider font-light text-center pb-2">
        Gunakan tombol panah &larr; &rarr; atau tombol ESC pada keyboard untuk berpindah & menutup
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
        img.src = item.url;
        caption.innerText = item.caption;
        counter.innerText = `${currentPhotoIndex + 1} / ${photos.length}`;
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