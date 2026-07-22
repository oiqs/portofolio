@extends('layouts.app')

@section('title', 'oiq_s — Portfolio')

@section('content')

{{-- HERO --}}
<section class="max-w-6xl mx-auto px-6 md:px-10 py-16 md:py-24 grid md:grid-cols-2 gap-12 md:gap-20 items-center">
    {{-- KIRI: FOTO PROFIL --}}
    <div class="relative aspect-square rounded-full overflow-hidden bg-ink/10 max-w-sm mx-auto md:max-w-md shadow-2xl shadow-accent/5 border border-ink/5">
        {{-- Foto yang sudah dipindahkan ke folder public/images --}}
        <img src="{{ asset('images/profile.jpeg') }}" 
             alt="Profile" class="w-full h-full object-cover filter grayscale contrast-125">
        {{-- Aksen garis vertikal gaya cyberpunk/modern seperti di referensi --}}
        <div class="absolute top-0 bottom-0 right-1/4 w-6 bg-accent/30 mix-blend-overlay"></div>
    </div>

    {{-- KANAN: TEKS --}}
    <div class="flex flex-col justify-center">
        <p class="text-[11px] font-bold tracking-[0.2em] text-accent uppercase mb-4">About Personal</p>
        
        <h1 class="font-display text-5xl md:text-7xl font-bold leading-[1.1] mb-6">
            Hello, Im <br/>
            <span class="text-accent">Thoriq Alfurqan M.L</span>
        </h1>
        
        {{-- Garis Pemisah Kecil --}}
        <div class="w-12 h-1 bg-accent mb-8"></div>
        
        <p class="text-muted text-sm md:text-sm max-w-sm leading-relaxed mb-10">
            Saya fokus membangun web aplikasi yang bersih secara kode maupun tampilan — dari backend Laravel hingga detail interaksi di frontend.
        </p>
        
        {{-- Signature (Menggunakan font italic sebagai placeholder) --}}
        <div class="font-display italic text-3xl md:text-4xl text-accent mb-8 opacity-80">
            AS oiq_s
        </div>
        
        {{-- Social Icons --}}
        <div class="flex gap-6 text-accent">
            <a href="#" class="hover:text-accent-dark hover:-translate-y-1 transition-all duration-300" aria-label="Instagram">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
            </a>
            <a href="#" class="hover:text-accent-dark hover:-translate-y-1 transition-all duration-300" aria-label="WhatsApp">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a5.8 5.8 0 00-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
            </a>
            <a href="#" class="hover:text-accent-dark hover:-translate-y-1 transition-all duration-300" aria-label="Facebook">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.469h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.469h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
            </a>
        </div>
    </div>
</section>

{{-- FEATURED PROJECTS --}}
<section class="max-w-6xl mx-auto px-6 md:px-10 py-24 md:py-32">
    <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-12 gap-6">
        <h2 class="font-display text-4xl">Project Pilihan</h2>
        <a href="{{ url('/projects') }}" class="text-sm font-medium text-accent hover:text-accent-dark transition-colors tracking-wide">
            Lihat semua &rarr;
        </a>
    </div>

    <div class="grid md:grid-cols-3 gap-8">
        @foreach ($featuredProjects as $project)
            <x-project-card :project="$project" />
        @endforeach
    </div>
</section>

{{-- CTA PENUTUP --}}
<section class="max-w-6xl mx-auto px-6 md:px-10 py-32 text-center border-t border-ink/5">
    <h2 class="font-display text-4xl md:text-5xl mb-6">Punya proyek yang ingin dikerjakan?</h2>
    <p class="text-muted text-lg mb-10 max-w-2xl mx-auto">Saya terbuka untuk kolaborasi dan proyek baru.</p>
    <a href="{{ url('/contact') }}"
       class="inline-block px-10 py-4 rounded-full bg-accent text-paper hover:bg-accent-dark transition-all duration-500 hover:-translate-y-1 hover:shadow-xl hover:shadow-accent/20 font-medium tracking-wide">
        Mulai Percakapan
    </a>
</section>

@endsection