@extends('layouts.app')

@section('title', 'Thoriq Alfurqan M.L (oiq_s) — Portfolio')

@section('content')

{{-- HERO SECTION --}}
<section class="max-w-6xl mx-auto px-6 md:px-10 pt-20 pb-24 md:pt-28 md:pb-32">
    <div class="grid md:grid-cols-12 gap-12 lg:gap-16 items-center">
        
        {{-- FOTO PROFIL ID CARD BADGE (KIRI) --}}
        <div class="md:col-span-5 flex justify-center order-first md:order-none">
            <x-id-card-badge />
        </div>

        {{-- TEKS HERO (KANAN) --}}
        <div class="md:col-span-7 flex flex-col justify-center space-y-6">
            <div>
                <h1 class="font-display text-4xl sm:text-6xl lg:text-7xl font-bold leading-[1.1] tracking-tight">
                    {{ __('Hello, I\'m') }} <br/>
                    <span class="text-accent italic font-normal">Thoriq Alfurqan M.L</span>
                </h1>
            </div>
            
            {{-- Garis Pemisah Kecil Aksent --}}
            <div class="w-16 h-1 bg-accent/80 rounded-full"></div>
            
            <p class="text-muted text-base sm:text-lg max-w-xl leading-relaxed">
                {{ __('Saya bukan ahli di bidang IT, melainkan seorang yang sangat menggemari') }} <strong class="text-ink font-semibold">{{ __('traveling') }}</strong> {{ __('dan') }} <strong class="text-ink font-semibold">{{ __('healing') }}</strong>. {{ __('Menjelajahi keindahan alam, menemukan tempat baru, dan menikmati ketenangan adalah passion utama saya.') }}
            </p>
            
            {{-- Signature / Alias Badge --}}
            <div class="flex items-center gap-4 pt-2">
                <div class="font-display italic text-2xl sm:text-3xl text-accent/90">
                    AS <span class="font-bold underline decoration-accent/40 underline-offset-8">oiq_s</span>
                </div>
            </div>

            {{-- TOMBOL & SOSIAL MEDIA --}}
            <div class="pt-4 flex flex-wrap gap-5 items-center">
                <a href="{{ url('/projects') }}" 
                   class="px-8 py-3.5 rounded-full bg-accent text-paper font-medium text-sm tracking-wide hover:bg-accent-dark transition-all duration-300 hover:-translate-y-0.5 hover:shadow-lg hover:shadow-accent/20">
                    {{ __('Jelajahi Momen Trip') }}
                </a>
                <a href="{{ url('/about') }}" 
                   class="px-8 py-3.5 rounded-full border border-ink/15 text-ink font-medium text-sm tracking-wide hover:border-accent hover:text-accent transition-all duration-300 hover:-translate-y-0.5">
                    {{ __('Tentang Saya') }}
                </a>
                
                {{-- Social Icons --}}
                <div class="flex gap-4 items-center text-accent/80 pl-2">
                    <a href="https://instagram.com" target="_blank" rel="noopener" class="hover:text-accent hover:scale-110 transition-all duration-300" aria-label="Instagram">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                    </a>
                    <a href="https://wa.me" target="_blank" rel="noopener" class="hover:text-accent hover:scale-110 transition-all duration-300" aria-label="WhatsApp">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a5.8 5.8 0 00-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>

{{-- ESSENCE OF TRAVEL / HIGHLIGHT PILLARS --}}
<section class="max-w-6xl mx-auto px-6 md:px-10 pb-24">
    {{-- Subtle Header / Divider --}}
    <div class="flex items-center gap-4 mb-10">
        <span class="text-xs font-bold text-accent tracking-[0.25em] uppercase">{{ __('Filosofi Perjalanan') }}</span>
        <div class="h-[1px] flex-1 bg-gradient-to-r from-accent/30 via-ink/10 to-transparent"></div>
    </div>

    {{-- 3 Editorial Pillar Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        {{-- Pillar 1 --}}
        <div class="relative group p-8 rounded-3xl border border-ink/10 bg-gradient-to-b from-ink/[0.04] to-ink/[0.01] dark:from-white/[0.03] dark:to-transparent backdrop-blur-md transition-all duration-500 hover:-translate-y-1.5 hover:border-accent/40 hover:shadow-xl hover:shadow-accent/5 overflow-hidden flex flex-col justify-between">
            <div class="absolute -right-8 -top-8 w-28 h-28 bg-accent/10 rounded-full blur-2xl group-hover:bg-accent/20 transition-all duration-500 pointer-events-none"></div>
            
            <div>
                <div class="flex items-center justify-between mb-8">
                    <span class="font-display text-3xl font-bold text-accent/40 group-hover:text-accent transition-colors">01</span>
                    <div class="w-11 h-11 rounded-2xl bg-accent/10 border border-accent/20 flex items-center justify-center text-accent group-hover:scale-110 group-hover:bg-accent group-hover:text-paper transition-all duration-500 shadow-sm">
                        {{-- Compass / Travel Icon --}}
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9 9 0 100-18 9 9 0 000 18z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 13.5l1.8-4.5 4.5-1.8-1.8 4.5-4.5 1.8z" />
                        </svg>
                    </div>
                </div>
                <h3 class="font-display text-2xl font-bold mb-2 group-hover:text-accent transition-colors">{{ __('Traveling & Healing') }}</h3>
                <p class="text-sm text-muted leading-relaxed">{{ __('Menjelajahi keindahan lanskap alam & destinasi pilihan untuk menyegarkan kembali pikiran.') }}</p>
            </div>
            
            <div class="mt-8 pt-4 border-t border-ink/5 dark:border-white/5 flex items-center justify-between text-xs text-accent/80 font-medium">
                <span>{{ __('Jelajah & Eksplorasi') }}</span>
            </div>
        </div>

        {{-- Pillar 2 --}}
        <div class="relative group p-8 rounded-3xl border border-ink/10 bg-gradient-to-b from-ink/[0.04] to-ink/[0.01] dark:from-white/[0.03] dark:to-transparent backdrop-blur-md transition-all duration-500 hover:-translate-y-1.5 hover:border-accent/40 hover:shadow-xl hover:shadow-accent/5 overflow-hidden flex flex-col justify-between">
            <div class="absolute -right-8 -top-8 w-28 h-28 bg-accent/10 rounded-full blur-2xl group-hover:bg-accent/20 transition-all duration-500 pointer-events-none"></div>
            
            <div>
                <div class="flex items-center justify-between mb-8">
                    <span class="font-display text-3xl font-bold text-accent/40 group-hover:text-accent transition-colors">02</span>
                    <div class="w-11 h-11 rounded-2xl bg-accent/10 border border-accent/20 flex items-center justify-center text-accent group-hover:scale-110 group-hover:bg-accent group-hover:text-paper transition-all duration-500 shadow-sm">
                        {{-- Heart / Peace Icon --}}
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.684a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </div>
                </div>
                <h3 class="font-display text-2xl font-bold mb-2 group-hover:text-accent transition-colors">{{ __('Ketenangan Suasana') }}</h3>
                <p class="text-sm text-muted leading-relaxed">{{ __('Meresapi keheningan alam, suara gemericik air, dan momen rileks di setiap langkah perjalanan.') }}</p>
            </div>
            
            <div class="mt-8 pt-4 border-t border-ink/5 dark:border-white/5 flex items-center justify-between text-xs text-accent/80 font-medium">
                <span>{{ __('Kedamaian & Mindfulness') }}</span>
            </div>
        </div>

        {{-- Pillar 3 --}}
        <div class="relative group p-8 rounded-3xl border border-ink/10 bg-gradient-to-b from-ink/[0.04] to-ink/[0.01] dark:from-white/[0.03] dark:to-transparent backdrop-blur-md transition-all duration-500 hover:-translate-y-1.5 hover:border-accent/40 hover:shadow-xl hover:shadow-accent/5 overflow-hidden flex flex-col justify-between">
            <div class="absolute -right-8 -top-8 w-28 h-28 bg-accent/10 rounded-full blur-2xl group-hover:bg-accent/20 transition-all duration-500 pointer-events-none"></div>
            
            <div>
                <div class="flex items-center justify-between mb-8">
                    <span class="font-display text-3xl font-bold text-accent/40 group-hover:text-accent transition-colors">03</span>
                    <div class="w-11 h-11 rounded-2xl bg-accent/10 border border-accent/20 flex items-center justify-center text-accent group-hover:scale-110 group-hover:bg-accent group-hover:text-paper transition-all duration-500 shadow-sm">
                        {{-- Camera / Memory Icon --}}
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                </div>
                <h3 class="font-display text-2xl font-bold mb-2 group-hover:text-accent transition-colors">{{ __('Cerita Perjalanan') }}</h3>
                <p class="text-sm text-muted leading-relaxed">{{ __('Mengabadikan visual estetis, dokumentasi trip, serta memori indah sepanjang rute.') }}</p>
            </div>
            
            <div class="mt-8 pt-4 border-t border-ink/5 dark:border-white/5 flex items-center justify-between text-xs text-accent/80 font-medium">
                <span>{{ __('Visual & Dokumentasi') }}</span>
            </div>
        </div>

    </div>
</section>

{{-- FEATURED PROJECTS / TRIPS --}}
<section class="max-w-6xl mx-auto px-6 md:px-10 py-20 border-t border-ink/5">
    <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-14 gap-6">
        <div>
            <p class="text-xs font-bold text-accent tracking-[0.2em] uppercase mb-2">{{ __('Galeri Perjalanan') }}</p>
            <h2 class="font-display text-3xl sm:text-4xl font-bold">{{ __('Momen Trip Pilihan') }}</h2>
        </div>
        <a href="{{ url('/projects') }}" class="inline-flex items-center gap-2 text-sm font-medium text-accent hover:text-accent-dark transition-colors tracking-wide group">
            {{ __('Lihat Semua Trip') }} 
            <span class="group-hover:translate-x-1 transition-transform">&rarr;</span>
        </a>
    </div>

    <div class="grid md:grid-cols-3 gap-8">
        @foreach ($featuredProjects as $project)
            <x-project-card :project="$project" />
        @endforeach
    </div>
</section>

{{-- CTA PENUTUP --}}
<section class="max-w-6xl mx-auto px-6 md:px-10 py-28 text-center border-t border-ink/5">
    <div class="max-w-3xl mx-auto border border-ink/10 rounded-3xl p-10 md:p-16 bg-gradient-to-b from-ink/5 to-transparent relative overflow-hidden">
        <div class="absolute -top-24 -left-24 w-48 h-48 bg-accent/10 rounded-full blur-3xl pointer-events-none"></div>
        <h2 class="font-display text-3xl sm:text-4xl md:text-5xl mb-6 leading-tight font-bold">{{ __('Punya rekomendasi spot healing seru?') }}</h2>
        <p class="text-muted text-base sm:text-lg mb-10 max-w-xl mx-auto">{{ __('Saya selalu senang mendengar cerita perjalanan baru, menemukan destinasi alam yang tenang, atau bertukar rekomendasi tempat liburan.') }}</p>
        <a href="{{ url('/contact') }}"
           class="inline-block px-10 py-4 rounded-full bg-accent text-paper hover:bg-accent-dark transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-accent/20 font-medium tracking-wide">
            {{ __('Kirim Rekomendasi') }}
        </a>
    </div>
</section>

@endsection