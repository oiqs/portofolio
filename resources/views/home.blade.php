@extends('layouts.app')

@section('title', 'Thoriq Alfurqan M.L (oiq_s) — Portfolio & Travel Journal')

@section('content')

{{-- =========================================================================
     1. HERO SECTION (#home)
     ========================================================================= --}}
<section id="home" class="scroll-reveal max-w-6xl mx-auto px-6 md:px-10 pt-16 pb-20 md:pt-24 md:pb-28">
    <div class="grid md:grid-cols-12 gap-12 lg:gap-16 items-center">
        
        {{-- FOTO PROFIL ID CARD BADGE 3D LANYARD (KIRI) --}}
        <div class="md:col-span-5 flex justify-center order-first md:order-none scroll-reveal" data-scroll="fade-right">
            <x-id-card-badge />
        </div>

        {{-- TEKS HERO (KANAN) --}}
        <div class="md:col-span-7 flex flex-col justify-center space-y-6 scroll-reveal" data-scroll="fade-left" data-scroll-delay="150">
            <div>
                <h1 class="font-display text-4xl sm:text-6xl lg:text-7xl font-bold leading-[1.1] tracking-tight min-h-[2.2em] sm:min-h-[2.1em]"
                    id="hero-typewriter-heading"
                    data-line1="{{ __('Hello, I\'m') }}"
                    data-line2="Thoriq Alfurqan M.L"
                    aria-label="{{ __('Hello, I\'m') }} Thoriq Alfurqan M.L">
                    <span id="typewriter-line1">{{ __('Hello, I\'m') }}</span><br/>
                    <span id="typewriter-line2">Thoriq Alfurqan M.L</span><span id="typewriter-cursor" class="typewriter-cursor typewriter-cursor-blink" aria-hidden="true"></span>
                </h1>
            </div>
            
            {{-- Garis Pemisah Kecil Aksent --}}
            <div class="w-16 h-1 bg-accent/80 rounded-full"></div>
            
            <p class="text-muted text-base sm:text-lg max-w-xl leading-relaxed">
                {{ __('Saya bukan ahli di bidang IT, melainkan seorang yang sangat menggemari') }} <strong class="text-ink font-semibold">{{ __('traveling') }}</strong> {{ __('dan') }} <strong class="text-ink font-semibold">{{ __('healing') }}</strong>. {{ __('Menjelajahi keindahan alam, menemukan tempat baru, dan menikmati ketenangan adalah passion utama saya.') }}
            </p>
            
            {{-- Signature / Alias Badge --}}
            <div class="flex items-center gap-4 pt-2">
                <div class="font-display text-2xl sm:text-3xl text-accent/90 font-medium">
                    AS <span class="font-bold underline decoration-accent/40 underline-offset-8">oiq_s</span>
                </div>
            </div>

            {{-- TOMBOL & SOSIAL MEDIA --}}
            <div class="pt-4 flex flex-wrap gap-5 items-center">
                <a href="#projects" 
                   class="px-8 py-3.5 rounded-full bg-accent text-paper font-medium text-sm tracking-wide hover:bg-accent-dark transition-all duration-300 hover:-translate-y-0.5 hover:shadow-lg hover:shadow-accent/20">
                    {{ __('Jelajahi Momen Trip') }}
                </a>
                <a href="#about" 
                   class="px-8 py-3.5 rounded-full border border-ink/15 text-ink font-medium text-sm tracking-wide hover:border-accent hover:text-accent transition-all duration-300 hover:-translate-y-0.5">
                    {{ __('Tentang Saya') }}
                </a>
                
                {{-- Social Icons --}}
                <div class="flex gap-4 items-center text-accent/80 pl-2">
                    <a href="https://www.instagram.com/thrqfrqn_/" target="_blank" rel="noopener" class="hover:text-accent hover:scale-110 transition-all duration-300" aria-label="Instagram">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                    </a>
                    <a href="https://wa.me/628972189558" target="_blank" rel="noopener" class="hover:text-accent hover:scale-110 transition-all duration-300" aria-label="WhatsApp">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a5.8 5.8 0 00-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>

{{-- =========================================================================
     2. ESSENCE OF TRAVEL / FILOSOFI PERJALANAN (#essence)
     ========================================================================= --}}
<section id="essence" class="scroll-reveal max-w-6xl mx-auto px-6 md:px-10 pb-24" data-scroll="fade-up">
    {{-- Header / Divider --}}
    <div class="flex items-center gap-4 mb-10">
        <span class="text-xs font-bold text-accent tracking-[0.25em] uppercase">{{ __('Filosofi Perjalanan') }}</span>
        <div class="h-[1px] flex-1 bg-gradient-to-r from-accent/30 via-ink/10 to-transparent"></div>
    </div>

    {{-- 3 Editorial Pillar Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        {{-- Pillar 1 --}}
        <div class="scroll-reveal relative group p-8 rounded-3xl border border-ink/10 dark:border-white/10 bg-white/85 dark:bg-[#121620]/90 backdrop-blur-xl shadow-lg shadow-black/5 dark:shadow-black/30 transition-all duration-500 hover:-translate-y-1.5 hover:border-accent/50 hover:shadow-2xl hover:shadow-accent/15 overflow-hidden flex flex-col justify-between"
             data-scroll="fade-up" data-scroll-delay="0">
            <div class="absolute -right-8 -top-8 w-28 h-28 bg-accent/10 dark:bg-accent/20 rounded-full blur-2xl group-hover:bg-accent/25 dark:group-hover:bg-accent/35 transition-all duration-500 pointer-events-none"></div>
            
            <div>
                <div class="flex items-center justify-between mb-8">
                    <span class="font-display text-3xl font-bold text-accent/40 group-hover:text-accent transition-colors">01</span>
                    <div class="w-11 h-11 rounded-2xl bg-accent/10 border border-accent/20 flex items-center justify-center text-accent group-hover:scale-110 group-hover:bg-accent group-hover:text-paper transition-all duration-500 shadow-sm">
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
        <div class="scroll-reveal relative group p-8 rounded-3xl border border-ink/10 dark:border-white/10 bg-white/85 dark:bg-[#121620]/90 backdrop-blur-xl shadow-lg shadow-black/5 dark:shadow-black/30 transition-all duration-500 hover:-translate-y-1.5 hover:border-accent/50 hover:shadow-2xl hover:shadow-accent/15 overflow-hidden flex flex-col justify-between"
             data-scroll="fade-up" data-scroll-delay="150">
            <div class="absolute -right-8 -top-8 w-28 h-28 bg-accent/10 dark:bg-accent/20 rounded-full blur-2xl group-hover:bg-accent/25 dark:group-hover:bg-accent/35 transition-all duration-500 pointer-events-none"></div>
            
            <div>
                <div class="flex items-center justify-between mb-8">
                    <span class="font-display text-3xl font-bold text-accent/40 group-hover:text-accent transition-colors">02</span>
                    <div class="w-11 h-11 rounded-2xl bg-accent/10 border border-accent/20 flex items-center justify-center text-accent group-hover:scale-110 group-hover:bg-accent group-hover:text-paper transition-all duration-500 shadow-sm">
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
        <div class="scroll-reveal relative group p-8 rounded-3xl border border-ink/10 dark:border-white/10 bg-white/85 dark:bg-[#121620]/90 backdrop-blur-xl shadow-lg shadow-black/5 dark:shadow-black/30 transition-all duration-500 hover:-translate-y-1.5 hover:border-accent/50 hover:shadow-2xl hover:shadow-accent/15 overflow-hidden flex flex-col justify-between"
             data-scroll="fade-up" data-scroll-delay="300">
            <div class="absolute -right-8 -top-8 w-28 h-28 bg-accent/10 dark:bg-accent/20 rounded-full blur-2xl group-hover:bg-accent/25 dark:group-hover:bg-accent/35 transition-all duration-500 pointer-events-none"></div>
            
            <div>
                <div class="flex items-center justify-between mb-8">
                    <span class="font-display text-3xl font-bold text-accent/40 group-hover:text-accent transition-colors">03</span>
                    <div class="w-11 h-11 rounded-2xl bg-accent/10 border border-accent/20 flex items-center justify-center text-accent group-hover:scale-110 group-hover:bg-accent group-hover:text-paper transition-all duration-500 shadow-sm">
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

{{-- =========================================================================
     3. ABOUT SECTION (#about) — Bio, Spider-Man Portrait, Skills, & Timeline
     ========================================================================= --}}
<section id="about" class="scroll-reveal max-w-6xl mx-auto px-6 md:px-10 py-24 border-t border-ink/5" data-scroll="fade-up">
    
    {{-- Header Section --}}
    <div class="flex items-center gap-4 mb-16">
        <span class="text-xs font-bold text-accent tracking-[0.25em] uppercase">{{ __('Tentang Saya') }}</span>
        <div class="h-[1px] flex-1 bg-gradient-to-r from-accent/30 via-ink/10 to-transparent"></div>
    </div>

    {{-- Profil Intro Grid --}}
    <div class="grid md:grid-cols-12 gap-12 lg:gap-16 items-center">
        
        {{-- FOTO PROFIL INTERAKTIF SPIDER-MAN REVEAL (KIRI) --}}
        <div class="md:col-span-5 flex flex-col items-center text-center scroll-reveal" data-scroll="fade-right">
            <div id="about-portrait-stage" 
                 class="about-portrait-stage relative p-2.5 rounded-full border-2 border-accent/40 bg-ink/5 shadow-2xl shadow-accent/15 group max-w-[320px] sm:max-w-[380px] w-full select-none cursor-crosshair"
                 aria-label="{{ __('Foto Thoriq Alfurqan M.L') }}">
                {{-- Decorative Glow Ring --}}
                <div class="about-portrait-glow absolute inset-0 rounded-full bg-accent/20 blur-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-700 pointer-events-none"></div>
                
                {{-- Frame Foto Bulat --}}
                <div class="about-portrait relative aspect-square rounded-full overflow-hidden border border-ink/10 bg-ink/10">
                    {{-- Base photo (Thoriq normal) --}}
                    <img src="{{ asset('images/profile.jpeg') }}" 
                         alt="Foto Thoriq Alfurqan M.L" 
                         class="about-person-image w-full h-full object-cover filter contrast-105 transition-all duration-700">
                    
                    {{-- Secret Reveal photo (Spider-Man mountain) --}}
                    <img src="{{ asset('images/profile-spiderman.jpg') }}" 
                         alt="{{ __('Thoriq Spider-Man Edition') }}" 
                         class="about-spider-image w-full h-full object-cover absolute inset-0"
                         aria-hidden="true">

                    <div class="absolute inset-0 bg-gradient-to-t from-paper/30 via-transparent to-transparent opacity-40 pointer-events-none"></div>
                </div>
            </div>
            <p class="text-xs text-muted/70 mt-4 tracking-wide font-mono flex items-center gap-1.5">
                <span class="inline-block w-1.5 h-1.5 rounded-full bg-accent animate-ping"></span>
                {{ __('Arahkan kursor atau sentuh foto untuk rahasia') }}
            </p>
        </div>

        {{-- DESKRIPSI (KANAN) --}}
        <div class="md:col-span-7 space-y-6 scroll-reveal" data-scroll="fade-left" data-scroll-delay="150">
            <div>
                <h2 class="font-display text-4xl sm:text-5xl font-bold leading-[1.15] mb-4">
                    {{ __('Cerita di balik') }} <br class="hidden sm:inline" />
                    <span>{{ __('Setiap Perjalanan & Healing.') }}</span>
                </h2>
                <p class="text-xl font-display text-accent/90 font-medium">Thoriq Alfurqan M.L (oiq_s)</p>
            </div>

            <div class="text-base sm:text-lg text-muted leading-relaxed space-y-4 pt-2">
                <p>
                    {{ __('Saya bukan seorang ahli di bidang IT, melainkan seseorang yang sangat menyukai') }} <strong class="text-ink font-semibold">{{ __('traveling') }}</strong> {{ __('dan aktivitas') }} <strong class="text-ink font-semibold">{{ __('healing') }}</strong>. {{ __('Bagi saya, menjelajahi tempat-tempat baru dan menikmati suasana alam adalah cara terbaik untuk menyegarkan pikiran.') }}
                </p>
                <p>
                    {{ __('Setiap perjalanan memberikan cerita dan pengalaman baru. Di sini saya senang berbagi catatan perjalanan, tempat-tempat favorit yang pernah saya kunjungi, serta momen-momen seru yang berkesan sepanjang jalan.') }}
                </p>
            </div>

            {{-- TOMBOL AKSI --}}
            <div class="pt-4 flex flex-wrap gap-4 items-center">
                <a href="#contact" 
                   class="px-8 py-3.5 rounded-full bg-accent text-paper font-medium text-sm tracking-wide hover:bg-accent-dark transition-all duration-300 hover:-translate-y-0.5 hover:shadow-lg hover:shadow-accent/20">
                    {{ __('Hubungi Saya') }}
                </a>
                <a href="#projects" 
                   class="px-8 py-3.5 rounded-full border border-ink/15 text-ink font-medium text-sm tracking-wide hover:border-accent hover:text-accent transition-all duration-300 hover:-translate-y-0.5">
                    {{ __('Lihat Galeri & Trip') }}
                </a>
            </div>
        </div>

    </div>

    {{-- SUB-SECTION: AKTIVITAS & HOBI (SKILLS) --}}
    @if(isset($skills) && count($skills) > 0)
        <div class="pt-24">
            <div class="text-center max-w-2xl mx-auto mb-16 scroll-reveal" data-scroll="fade-up">
                <p class="text-xs font-bold text-accent tracking-[0.2em] uppercase mb-3">{{ __('Aktivitas & Hobi') }}</p>
                <h3 class="font-display text-3xl sm:text-4xl font-bold">{{ __('Hal Yang Saya Sukai') }}</h3>
            </div>

            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach ($skills as $index => $skill)
                    <div class="scroll-reveal border border-ink/10 dark:border-white/10 bg-white/85 dark:bg-[#121620]/90 backdrop-blur-xl shadow-md shadow-black/5 dark:shadow-black/25 rounded-2xl p-6 hover:border-accent/40 transition-all duration-500 hover:-translate-y-1 group"
                         data-scroll="fade-up" data-scroll-delay="{{ ($index % 3) * 100 }}">
                        <div class="flex items-center justify-between mb-4">
                            <span class="font-display text-xl font-semibold group-hover:text-accent transition-colors">{{ __($skill['name'] ?? $skill->name ?? '') }}</span>
                            <span class="text-xs font-semibold px-3 py-1 rounded-full border border-accent/30 bg-accent/10 text-accent tracking-wide uppercase">
                                {{ __($skill['level'] ?? $skill->level ?? '') }}
                            </span>
                        </div>
                        <div class="w-full bg-ink/10 dark:bg-white/10 h-1.5 rounded-full overflow-hidden">
                            @php
                                $lvl = $skill['level'] ?? $skill->level ?? '';
                                $width = ($lvl === 'Sangat Suka') ? '95%' : (($lvl === 'Favorit') ? '85%' : '75%');
                            @endphp
                            <div class="bg-accent h-full rounded-full transition-all duration-1000" style="width: {{ $width }}"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    {{-- SUB-SECTION: JEJAK PERJALANAN (TIMELINE) --}}
    @if(isset($timeline) && count($timeline) > 0)
        <div class="pt-24">
            <div class="text-center max-w-2xl mx-auto mb-16 scroll-reveal" data-scroll="fade-up">
                <p class="text-xs font-bold text-accent tracking-[0.2em] uppercase mb-3">{{ __('Jejak Perjalanan') }}</p>
                <h3 class="font-display text-3xl sm:text-4xl font-bold">{{ __('Riwayat Trip & Momen') }}</h3>
            </div>

            <div class="space-y-10 max-w-3xl mx-auto">
                @foreach ($timeline as $index => $item)
                    <div class="scroll-reveal grid md:grid-cols-12 gap-4 md:gap-8 items-start group"
                         data-scroll="fade-up" data-scroll-delay="{{ min(300, $index * 80) }}">
                        <div class="md:col-span-3 md:text-right">
                            <span class="inline-block px-3 py-1 rounded-full border border-accent/20 bg-accent/5 text-xs font-mono font-semibold text-accent tracking-wider uppercase mt-1">
                                {{ $item['year'] ?? $item->year ?? '' }}
                            </span>
                        </div>
                        <div class="md:col-span-9 border-l border-ink/10 pl-6 md:pl-8 pb-8 group-last:border-transparent group-last:pb-0 relative">
                            <div class="absolute w-3.5 h-3.5 bg-accent rounded-full -left-[7px] top-1.5 ring-4 ring-paper shadow-[0_0_12px_rgba(212,175,55,0.6)]"></div>
                            <h4 class="font-display text-2xl font-semibold mb-2 group-hover:text-accent transition-colors">{{ __($item['title'] ?? $item->title ?? '') }}</h4>
                            <p class="text-muted leading-relaxed text-base">{{ __($item['description'] ?? $item->description ?? '') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

</section>

{{-- =========================================================================
     4. PROJECTS & TRIPS GALLERY (#projects)
     ========================================================================= --}}
<section id="projects" class="scroll-reveal max-w-6xl mx-auto px-6 md:px-10 py-24 border-t border-ink/5" data-scroll="fade-up">
    
    {{-- Header Section --}}
    <div class="flex items-center gap-4 mb-10">
        <span class="text-xs font-bold text-accent tracking-[0.25em] uppercase">{{ __('Galeri Perjalanan') }}</span>
        <div class="h-[1px] flex-1 bg-gradient-to-r from-accent/30 via-ink/10 to-transparent"></div>
    </div>

    <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-14 gap-6">
        <div>
            <h2 class="font-display text-3xl sm:text-4xl md:text-5xl font-bold">{{ __('Kumpulan Destinasi & Momen Trip') }}</h2>
        </div>
        
        <div class="shrink-0 bg-white/80 dark:bg-[#121620]/90 backdrop-blur-xl border border-ink/10 dark:border-white/10 px-5 py-3 rounded-2xl flex items-center gap-3 shadow-sm">
            <span class="text-2xl font-bold text-accent font-mono">{{ count($projects ?? $featuredProjects ?? []) }}</span>
            <div class="text-xs text-muted leading-tight font-medium">
                {{ __('Destinasi') }}<br/>{{ __('Tersimpan') }}
            </div>
        </div>
    </div>

    {{-- Grid Kartu Trip --}}
    @php
        $tripList = (isset($projects) && count($projects) > 0) ? $projects : ($featuredProjects ?? []);
    @endphp

    @if(count($tripList) > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($tripList as $index => $project)
                <div class="scroll-reveal" data-scroll="fade-up" data-scroll-delay="{{ ($index % 3) * 120 }}">
                    <x-project-card :project="$project" />
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-20 bg-ink/5 dark:bg-white/5 rounded-3xl border border-ink/10 dark:border-white/10">
            <p class="font-display text-xl text-muted">{{ __('Belum ada dokumentasi trip yang ditambahkan.') }}</p>
        </div>
    @endif
</section>

{{-- =========================================================================
     5. CONTACT & PUBLIC GUESTBOOK (#contact)
     ========================================================================= --}}
<section id="contact" class="scroll-reveal max-w-6xl mx-auto px-6 md:px-10 py-24 border-t border-ink/5" data-scroll="fade-up">

    {{-- PART A: Direct Contact & Form Kirim Pesan --}}
    <div class="grid md:grid-cols-5 gap-16 items-start">
        
        {{-- KIRI: INFO & SALURAN KONTAK --}}
        <div class="md:col-span-2 scroll-reveal" data-scroll="fade-right">
            <p class="text-sm font-medium text-accent tracking-widest uppercase mb-4">{{ __('Kontak') }}</p>
            <h2 class="font-display text-4xl md:text-5xl font-bold leading-[1.2] mb-6">
                {{ __('Mari') }} {{ __('berbicara.') }}
            </h2>
            <p class="text-muted text-base sm:text-lg leading-relaxed mb-10">
                {{ __('Punya rekomendasi tempat healing menarik, destinasi traveling seru, atau sekadar ingin sapa dan berdiskusi? Kirim pesan lewat form di samping!') }}
            </p>

            <div class="space-y-6 text-sm">
                <div class="p-4 rounded-2xl bg-white/70 dark:bg-[#121620]/70 border border-ink/5 dark:border-white/5 backdrop-blur-md">
                    <span class="text-muted tracking-widest uppercase text-xs block mb-1">Email</span>
                    <a href="mailto:oiqgemink27@gmail.com" class="text-base sm:text-lg hover:text-accent transition-colors font-medium break-all">oiqgemink27@gmail.com</a>
                </div>
                <div class="p-4 rounded-2xl bg-white/70 dark:bg-[#121620]/70 border border-ink/5 dark:border-white/5 backdrop-blur-md">
                    <span class="text-muted tracking-widest uppercase text-xs block mb-1">{{ __('Sosial Media & Chat') }}</span>
                    <span class="flex flex-wrap items-center gap-3 pt-1">
                        <a href="https://www.instagram.com/thrqfrqn_/" target="_blank" rel="noopener" class="text-base hover:text-accent transition-colors font-medium flex items-center gap-1.5">
                            <svg class="w-4 h-4 fill-currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                            Instagram
                        </a>
                        <span class="text-muted">&bull;</span>
                        <a href="https://wa.me/628972189558" target="_blank" rel="noopener" class="text-base hover:text-accent transition-colors font-medium flex items-center gap-1.5">
                            <svg class="w-4 h-4 fill-currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a5.8 5.8 0 00-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                            WhatsApp
                        </a>
                    </span>
                </div>
            </div>
        </div>

        {{-- KANAN: FORM PESAN PRIBADI --}}
        <div class="md:col-span-3 bg-white/85 dark:bg-[#121620]/90 backdrop-blur-xl border border-ink/10 dark:border-white/10 shadow-xl shadow-black/5 dark:shadow-black/30 rounded-3xl p-8 md:p-12 relative overflow-hidden scroll-reveal" data-scroll="fade-left" data-scroll-delay="150">
            <div class="absolute -right-16 -top-16 w-48 h-48 bg-accent/10 rounded-full blur-3xl pointer-events-none"></div>

            <div id="contact-alert" class="hidden mb-8 px-6 py-5 rounded-2xl font-medium transition-all duration-300"></div>

            @if (session('success'))
                <div class="mb-8 px-6 py-5 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 dark:text-emerald-400 font-medium">
                    {{ session('success') }}
                </div>
            @endif

            <form id="contact-form" method="POST" action="{{ url('/contact') }}" class="space-y-6">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-medium tracking-wide mb-2">{{ __('Nama Lengkap') }}</label>
                    <input type="text" name="name" id="name" required value="{{ old('name') }}"
                        class="w-full px-5 py-3.5 rounded-xl border border-ink/10 bg-transparent focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none transition-all placeholder:text-muted/50 text-sm"
                        placeholder="{{ __('Masukkan nama Anda') }}">
                    @error('name')
                        <p class="text-sm text-red-400 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium tracking-wide mb-2">{{ __('Alamat Email') }}</label>
                    <input type="email" name="email" id="email" required value="{{ old('email') }}"
                        class="w-full px-5 py-3.5 rounded-xl border border-ink/10 bg-transparent focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none transition-all placeholder:text-muted/50 text-sm"
                        placeholder="email@domain.com">
                    @error('email')
                        <p class="text-sm text-red-400 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="message" class="block text-sm font-medium tracking-wide mb-2">{{ __('Pesan Anda') }}</label>
                    <textarea name="message" id="message" rows="4" required
                        class="w-full px-5 py-3.5 rounded-xl border border-ink/10 bg-transparent focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none transition-all resize-none placeholder:text-muted/50 text-sm"
                        placeholder="{{ __('Bagikan tempat healing favorit Anda atau pesan hangat lainnya...') }}">{{ old('message') }}</textarea>
                    @error('message')
                        <p class="text-sm text-red-400 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col sm:flex-row items-center justify-between gap-6 pt-2">
                    <button type="submit" id="btn-submit"
                        class="w-full sm:w-auto inline-flex items-center justify-center gap-3 px-9 py-3.5 rounded-full bg-accent text-paper hover:bg-accent-dark transition-all duration-300 hover:-translate-y-0.5 hover:shadow-xl hover:shadow-accent/25 font-semibold tracking-wide cursor-pointer text-center text-sm">
                        <svg id="btn-spinner" class="hidden w-4 h-4 animate-spin text-paper" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                        </svg>
                        <svg id="btn-icon" class="w-4 h-4 fill-none stroke-current" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="22" y1="2" x2="11" y2="13"></line>
                            <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                        </svg>
                        <span id="btn-text">{{ __('Kirim Pesan') }}</span>
                    </button>

                    <div class="text-sm text-muted flex items-center gap-2">
                        <span>{{ __('Atau chat langsung?') }}</span>
                        <a href="https://wa.me/628972189558" target="_blank" rel="noopener" class="text-accent hover:underline font-medium inline-flex items-center gap-1">
                            WhatsApp &rarr;
                        </a>
                    </div>
                </div>
            </form>
        </div>

    </div>

    {{-- DIVIDER SECTION --}}
    <div class="my-20">
        <div class="flex items-center gap-4">
            <span class="text-xs font-bold text-accent tracking-[0.25em] uppercase">{{ __('Buku Tamu & Komentar') }}</span>
            <div class="h-[1px] flex-1 bg-gradient-to-r from-accent/30 via-ink/10 to-transparent"></div>
        </div>
    </div>

    {{-- PART B: BUKU TAMU & KOMENTAR PUBLIK (SEPERTI ALFARI.MY.ID) --}}
    <div class="grid lg:grid-cols-12 gap-10 items-start">

        {{-- KIRI: FORM TULIS KOMENTAR PUBLIK --}}
        <div class="lg:col-span-5 bg-white/85 dark:bg-[#121620]/90 backdrop-blur-xl border border-ink/10 dark:border-white/10 shadow-xl shadow-black/5 dark:shadow-black/30 rounded-3xl p-8 relative overflow-hidden scroll-reveal" data-scroll="fade-up">
            <div class="flex items-center gap-3 mb-4">
                <span class="w-2.5 h-2.5 rounded-full bg-accent animate-pulse"></span>
                <h3 class="font-display text-xl font-bold">{{ __('Tinggalkan Komentar') }}</h3>
            </div>
            <p class="text-muted text-sm leading-relaxed mb-6">
                {{ __('Pesan atau sapaan yang Anda tulis di sini akan langsung tampil secara publik dan dapat dibaca oleh pengunjung lain.') }}
            </p>

            <div id="comment-alert" class="hidden mb-6 px-5 py-4 rounded-2xl text-sm font-medium transition-all duration-300"></div>

            <form id="public-comment-form" class="space-y-6">
                {{-- Live Avatar Selector / Preview --}}
                <div class="flex items-center gap-4 p-4 rounded-2xl bg-ink/5 dark:bg-white/5 border border-ink/5 dark:border-white/5">
                    <img id="avatar-preview" 
                         src="https://api.dicebear.com/7.x/adventurer/svg?seed=Adventurer" 
                         alt="Avatar" 
                         class="w-14 h-14 rounded-2xl bg-accent/10 border border-accent/20 object-cover shrink-0 shadow-sm transition-transform duration-300 hover:scale-105">
                    <div class="flex-1 min-w-0">
                        <p class="text-xs font-semibold uppercase tracking-wider text-muted mb-1">{{ __('Avatar Traveler') }}</p>
                        <p class="text-xs text-muted/80 truncate">{{ __('Avatar berganti otomatis sesuai nama') }}</p>
                    </div>
                    <button type="button" id="btn-shuffle-avatar" 
                            class="px-3 py-2 rounded-xl text-xs font-semibold border border-ink/10 dark:border-white/10 hover:border-accent hover:text-accent transition-colors"
                            title="Acak Avatar">
                        🎲 {{ __('Acak') }}
                    </button>
                </div>

                <div>
                    <label for="comment-name" class="block text-xs font-semibold uppercase tracking-wider text-muted mb-2">{{ __('Nama Anda') }}</label>
                    <input type="text" id="comment-name" required
                        class="w-full px-5 py-3.5 rounded-xl border border-ink/10 bg-transparent focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none transition-all placeholder:text-muted/50 text-sm"
                        placeholder="{{ __('Nama atau nama panggilan...') }}">
                </div>

                <div>
                    <label for="comment-message" class="block text-xs font-semibold uppercase tracking-wider text-muted mb-2">{{ __('Pesan Komentar') }}</label>
                    <textarea id="comment-message" rows="4" required
                        class="w-full px-5 py-3.5 rounded-xl border border-ink/10 bg-transparent focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none transition-all resize-none placeholder:text-muted/50 text-sm"
                        placeholder="{{ __('Tulis pesan, kesan, atau rekomendasi destinasi traveling favoritmu...') }}"></textarea>
                </div>

                <button type="submit" id="btn-submit-comment"
                    class="w-full inline-flex items-center justify-center gap-2.5 px-8 py-3.5 rounded-full bg-accent text-paper hover:bg-accent-dark transition-all duration-300 hover:-translate-y-0.5 hover:shadow-lg hover:shadow-accent/25 font-semibold text-sm tracking-wide cursor-pointer text-center">
                    <svg id="comment-spinner" class="hidden w-4 h-4 animate-spin text-paper" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                    </svg>
                    <svg id="comment-icon" class="w-4 h-4 fill-none stroke-current" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                    </svg>
                    <span id="comment-btn-text">{{ __('Kirim Komentar') }}</span>
                </button>
            </form>
        </div>

        {{-- KANAN: DAFTAR KOMENTAR PUBLIK (FEED) --}}
        <div class="lg:col-span-7 bg-white/85 dark:bg-[#121620]/90 backdrop-blur-xl border border-ink/10 dark:border-white/10 shadow-xl shadow-black/5 dark:shadow-black/30 rounded-3xl p-8 relative overflow-hidden scroll-reveal" data-scroll="fade-up" data-scroll-delay="150">
            <div class="flex items-center justify-between pb-6 border-b border-ink/10 dark:border-white/10 mb-6">
                <div>
                    <h3 class="font-display text-xl font-bold flex items-center gap-2">
                        <span>{{ __('Komentar Publik') }}</span>
                        <span class="text-xs font-normal text-muted">💬</span>
                    </h3>
                    <p class="text-xs text-muted mt-1">{{ __('Dibaca oleh seluruh pengunjung website') }}</p>
                </div>
                <span id="comments-count-badge" class="px-3.5 py-1.5 rounded-full bg-accent/10 border border-accent/20 text-accent font-semibold text-xs">
                    {{ isset($comments) ? $comments->count() : 3 }} {{ __('Komentar') }}
                </span>
            </div>

            {{-- Feed List Container --}}
            <div id="comments-feed" class="space-y-4 max-h-[580px] overflow-y-auto pr-2 custom-scrollbar">
                @if (isset($comments) && $comments->count() > 0)
                    @foreach ($comments as $item)
                        <div class="comment-card p-5 rounded-2xl bg-ink/[0.02] dark:bg-white/[0.02] border border-ink/5 dark:border-white/5 hover:border-accent/30 transition-all duration-300">
                            <div class="flex items-start gap-4">
                                <img src="{{ $item->avatar ?: 'https://api.dicebear.com/7.x/adventurer/svg?seed=' . urlencode($item->name) }}" 
                                     alt="{{ $item->name }}" 
                                     class="w-11 h-11 rounded-2xl bg-accent/10 border border-accent/20 object-cover shrink-0 shadow-sm"
                                     loading="lazy">
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center justify-between gap-2 mb-1.5">
                                        <h4 class="font-display font-bold text-sm tracking-wide text-ink dark:text-white truncate">
                                            {{ $item->name }}
                                        </h4>
                                        <span class="text-[11px] text-muted whitespace-nowrap" data-created-at="{{ $item->created_at ? $item->created_at->toISOString() : '' }}">
                                            {{ $item->created_at ? $item->created_at->diffForHumans() : 'Baru saja' }}
                                        </span>
                                    </div>
                                    <p class="text-sm text-ink/80 dark:text-gray-300 leading-relaxed break-words whitespace-pre-line">
                                        {{ $item->message }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    {{-- Default Seed Comments when database is fresh --}}
                    <div class="comment-card p-5 rounded-2xl bg-ink/[0.02] dark:bg-white/[0.02] border border-ink/5 dark:border-white/5 hover:border-accent/30 transition-all duration-300">
                        <div class="flex items-start gap-4">
                            <img src="https://api.dicebear.com/7.x/adventurer/svg?seed=Fajar" alt="Fajar" class="w-11 h-11 rounded-2xl bg-accent/10 border border-accent/20 object-cover shrink-0 shadow-sm">
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center justify-between gap-2 mb-1.5">
                                    <h4 class="font-display font-bold text-sm tracking-wide text-ink dark:text-white">Fajar Pendaki</h4>
                                    <span class="text-[11px] text-muted">3 jam lalu</span>
                                </div>
                                <p class="text-sm text-ink/80 dark:text-gray-300 leading-relaxed">
                                    Salam lestari bang Thoriq! Dokumentasi foto Gunung Merbabu dan Sumbingnya juara banget pemandangannya!
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="comment-card p-5 rounded-2xl bg-ink/[0.02] dark:bg-white/[0.02] border border-ink/5 dark:border-white/5 hover:border-accent/30 transition-all duration-300">
                        <div class="flex items-start gap-4">
                            <img src="https://api.dicebear.com/7.x/adventurer/svg?seed=Dinda" alt="Dinda" class="w-11 h-11 rounded-2xl bg-accent/10 border border-accent/20 object-cover shrink-0 shadow-sm">
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center justify-between gap-2 mb-1.5">
                                    <h4 class="font-display font-bold text-sm tracking-wide text-ink dark:text-white">Dinda Traveling</h4>
                                    <span class="text-[11px] text-muted">1 hari lalu</span>
                                </div>
                                <p class="text-sm text-ink/80 dark:text-gray-300 leading-relaxed">
                                    Pantai Ngobaran emang sunset-nya magis banget. Sukses terus buat trip-trip berikutnya ya!
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="comment-card p-5 rounded-2xl bg-ink/[0.02] dark:bg-white/[0.02] border border-ink/5 dark:border-white/5 hover:border-accent/30 transition-all duration-300">
                        <div class="flex items-start gap-4">
                            <img src="https://api.dicebear.com/7.x/adventurer/svg?seed=Rian" alt="Rian" class="w-11 h-11 rounded-2xl bg-accent/10 border border-accent/20 object-cover shrink-0 shadow-sm">
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center justify-between gap-2 mb-1.5">
                                    <h4 class="font-display font-bold text-sm tracking-wide text-ink dark:text-white">Rian Outdoor</h4>
                                    <span class="text-[11px] text-muted">2 hari lalu</span>
                                </div>
                                <p class="text-sm text-ink/80 dark:text-gray-300 leading-relaxed">
                                    Keren websitenya minimalis & animasinya halus. Ditunggu catatan trip ke Gunung Rinjani atau Semeru bang!
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

    </div>

</section>

{{-- =========================================================================
     JAVASCRIPT: Direct Contact Form & Public Live Comments Synchronization
     ========================================================================= --}}
<script>
document.addEventListener('DOMContentLoaded', function() {

    // Deteksi lingkungan: localhost / Laragon / subpath
    const isLocal = window.location.hostname === 'localhost' || 
                    window.location.hostname === '127.0.0.1' || 
                    window.location.hostname.endsWith('.test') || 
                    window.location.hostname.endsWith('.local') ||
                    (window.location.port !== '' && window.location.port !== '80' && window.location.port !== '443');

    // Endpoint API kontak dinamis
    const contactApiUrl = (function() {
        const path = window.location.pathname;
        const subpathIndex = path.indexOf('/public');
        if (subpathIndex !== -1) {
            return path.substring(0, subpathIndex + 7) + '/contact';
        }
        if (isLocal) {
            return '/contact';
        }
        return '/api/contact';
    })();

    /* ====================================================================
       1. FORM KONTAK PRIBADI (EMAIL & BACKEND)
       ==================================================================== */
    const contactForm = document.getElementById('contact-form');
    const contactAlert = document.getElementById('contact-alert');
    const submitBtn = document.getElementById('btn-submit');
    const btnSpinner = document.getElementById('btn-spinner');
    const btnIcon = document.getElementById('btn-icon');
    const btnText = document.getElementById('btn-text');

    function showContactAlert(type, text) {
        if (!contactAlert) return;
        contactAlert.className = type === 'success'
            ? 'mb-8 px-6 py-5 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 dark:text-emerald-400 font-medium transition-all duration-300'
            : 'mb-8 px-6 py-5 rounded-2xl bg-red-500/10 border border-red-500/20 text-red-600 dark:text-red-400 font-medium transition-all duration-300';
        contactAlert.textContent = text;
        contactAlert.classList.remove('hidden');
        contactAlert.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }

    if (contactForm) {
        contactForm.addEventListener('submit', async function(e) {
            e.preventDefault();

            const name = document.getElementById('name')?.value.trim();
            const email = document.getElementById('email')?.value.trim();
            const message = document.getElementById('message')?.value.trim();

            if (!name || !email || !message) {
                showContactAlert('error', '{{ __("Mohon lengkapi semua kolom formulir.") }}');
                return;
            }

            if (submitBtn) submitBtn.disabled = true;
            if (btnSpinner) btnSpinner.classList.remove('hidden');
            if (btnIcon) btnIcon.classList.add('hidden');
            if (btnText) btnText.textContent = '{{ __("Mengirim...") }}';

            const csrfToken = contactForm.querySelector('input[name="_token"]')?.value || '';

            // 1. Post ke backend (Localhost Laravel MySQL atau Vercel Serverless)
            let backendSuccess = false;
            try {
                const backendRes = await fetch(contactApiUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        ...(csrfToken ? { 'X-CSRF-TOKEN': csrfToken } : {})
                    },
                    body: JSON.stringify({ name, email, message })
                });
                if (backendRes.ok) {
                    backendSuccess = true;
                }
            } catch (e) {
                console.error('Contact backend error:', e);
            }

            // 2. Post to FormSubmit for direct email delivery to oiqgemink27@gmail.com
            let emailSuccess = false;
            try {
                const emailRes = await fetch('https://formsubmit.co/ajax/oiqgemink27@gmail.com', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        name: name,
                        email: email,
                        message: message,
                        _subject: 'Pesan Baru Portofolio dari ' + name,
                        _captcha: 'false',
                        _template: 'table'
                    })
                });
                if (emailRes.ok) {
                    emailSuccess = true;
                }
            } catch (e) {
                console.error('FormSubmit error:', e);
            }

            if (submitBtn) submitBtn.disabled = false;
            if (btnSpinner) btnSpinner.classList.add('hidden');
            if (btnIcon) btnIcon.classList.remove('hidden');
            if (btnText) btnText.textContent = '{{ __("Kirim Pesan") }}';

            if (backendSuccess || emailSuccess) {
                contactForm.reset();
                showContactAlert('success', '{{ __("Terima kasih! Pesan kamu berhasil dikirim ke email admin (oiqgemink27@gmail.com) dan tersimpan.") }}');
            } else {
                showContactAlert('error', '{{ __("Gagal mengirim pesan. Silakan coba lagi beberapa saat lagi.") }}');
            }
        });
    }

    /* ====================================================================
       2. BUKU TAMU & KOMENTAR PUBLIK (SEPERTI ALFARI.MY.ID)
       ==================================================================== */
    const SUPABASE_URL = "{{ env('SUPABASE_URL', '') }}";
    const SUPABASE_ANON_KEY = "{{ env('SUPABASE_ANON_KEY', '') }}";

    // Endpoint API dinamis (Mendukung localhost Laragon subpath maupun hosting Vercel)
    const commentsApiUrl = (function() {
        const path = window.location.pathname;
        const subpathIndex = path.indexOf('/public');
        if (subpathIndex !== -1) {
            return path.substring(0, subpathIndex + 7) + '/api/comments';
        }
        return '/api/comments';
    })();

    const commentForm = document.getElementById('public-comment-form');
    const commentNameInput = document.getElementById('comment-name');
    const commentMessageInput = document.getElementById('comment-message');
    const avatarPreview = document.getElementById('avatar-preview');
    const btnShuffleAvatar = document.getElementById('btn-shuffle-avatar');
    const commentAlert = document.getElementById('comment-alert');
    const commentsFeed = document.getElementById('comments-feed');
    const countBadge = document.getElementById('comments-count-badge');
    const commentSubmitBtn = document.getElementById('btn-submit-comment');
    const commentSpinner = document.getElementById('comment-spinner');
    const commentIcon = document.getElementById('comment-icon');
    const commentBtnText = document.getElementById('comment-btn-text');

    let currentAvatarSeed = 'Adventurer';

    function updateAvatar(seed) {
        currentAvatarSeed = seed || 'Adventurer';
        const url = `https://api.dicebear.com/7.x/adventurer/svg?seed=${encodeURIComponent(currentAvatarSeed)}`;
        if (avatarPreview) avatarPreview.src = url;
    }

    if (commentNameInput) {
        commentNameInput.addEventListener('input', function() {
            const val = this.value.trim();
            if (val) {
                updateAvatar(val);
            }
        });
    }

    if (btnShuffleAvatar) {
        btnShuffleAvatar.addEventListener('click', function() {
            const randomSeeds = ['Hiker', 'Summit', 'Rinjani', 'Merbabu', 'Lombok', 'Bromo', 'Explorer', 'Wanderer', 'Forest', 'Ocean'];
            const random = randomSeeds[Math.floor(Math.random() * randomSeeds.length)] + Math.floor(Math.random() * 100);
            updateAvatar(random);
        });
    }

    function showCommentAlert(type, text) {
        if (!commentAlert) return;
        commentAlert.className = type === 'success'
            ? 'mb-6 px-5 py-4 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 dark:text-emerald-400 text-sm font-medium transition-all duration-300'
            : 'mb-6 px-5 py-4 rounded-2xl bg-red-500/10 border border-red-500/20 text-red-600 dark:text-red-400 text-sm font-medium transition-all duration-300';
        commentAlert.textContent = text;
        commentAlert.classList.remove('hidden');
    }

    function createCommentElement(comment) {
        const div = document.createElement('div');
        div.className = 'comment-card p-5 rounded-2xl bg-ink/[0.02] dark:bg-white/[0.02] border border-ink/5 dark:border-white/5 hover:border-accent/30 transition-all duration-300 animate-fadeIn';
        
        const avatarUrl = comment.avatar || `https://api.dicebear.com/7.x/adventurer/svg?seed=${encodeURIComponent(comment.name)}`;
        const isEn = document.documentElement.lang === 'en' || window.location.pathname.startsWith('/en');
        const timeAgo = comment.created_at ? formatTimeAgo(comment.created_at) : (comment.time_ago || (isEn ? 'Just now' : 'Baru saja'));

        div.innerHTML = `
            <div class="flex items-start gap-4">
                <img src="${avatarUrl}" alt="${escapeHtml(comment.name)}" class="w-11 h-11 rounded-2xl bg-accent/10 border border-accent/20 object-cover shrink-0 shadow-sm" loading="lazy">
                <div class="flex-1 min-w-0">
                    <div class="flex items-center justify-between gap-2 mb-1.5">
                        <h4 class="font-display font-bold text-sm tracking-wide text-ink dark:text-white truncate">
                            ${escapeHtml(comment.name)}
                        </h4>
                        <span class="text-[11px] text-muted whitespace-nowrap">${timeAgo}</span>
                    </div>
                    <p class="text-sm text-ink/80 dark:text-gray-300 leading-relaxed break-words whitespace-pre-line">
                        ${escapeHtml(comment.message)}
                    </p>
                </div>
            </div>
        `;
        return div;
    }

    function escapeHtml(string) {
        const div = document.createElement('div');
        div.textContent = string || '';
        return div.innerHTML;
    }

    function formatTimeAgo(dateInput) {
        try {
            const date = dateInput instanceof Date ? dateInput : new Date(dateInput);
            if (isNaN(date.getTime())) return 'Baru saja';
            const seconds = Math.max(0, Math.floor((new Date() - date) / 1000));
            const isEn = document.documentElement.lang === 'en' || window.location.pathname.startsWith('/en');

            if (seconds < 60) return isEn ? 'Just now' : 'Baru saja';
            const minutes = Math.floor(seconds / 60);
            if (minutes < 60) return isEn ? `${minutes} minute${minutes > 1 ? 's' : ''} ago` : `${minutes} menit yang lalu`;
            const hours = Math.floor(minutes / 60);
            if (hours < 24) return isEn ? `${hours} hour${hours > 1 ? 's' : ''} ago` : `${hours} jam yang lalu`;
            const days = Math.floor(hours / 24);
            if (days < 30) return isEn ? `${days} day${days > 1 ? 's' : ''} ago` : `${days} hari yang lalu`;
            const months = Math.floor(days / 30);
            if (months < 12) return isEn ? `${months} month${months > 1 ? 's' : ''} ago` : `${months} bulan yang lalu`;
            const years = Math.floor(days / 365);
            return isEn ? `${years} year${years > 1 ? 's' : ''} ago` : `${years} tahun yang lalu`;
        } catch (e) {
            return 'Baru saja';
        }
    }

    // Local Storage Helper untuk memastikan komentar pengunjung tetap tampil di browser mereka
    function getLocalUserComments() {
        try {
            const raw = localStorage.getItem('oiq_user_comments');
            if (raw) {
                const parsed = JSON.parse(raw);
                if (Array.isArray(parsed)) return parsed;
            }
        } catch (e) {}
        return [];
    }

    function saveLocalUserComment(comment) {
        try {
            const list = getLocalUserComments();
            list.unshift(comment);
            localStorage.setItem('oiq_user_comments', JSON.stringify(list.slice(0, 50)));
        } catch (e) {}
    }

    function mergeComments(serverList) {
        const localList = getLocalUserComments();
        const combined = [...localList, ...(Array.isArray(serverList) ? serverList : [])];
        const seen = new Set();
        const result = [];
        for (const item of combined) {
            const key = `${(item.name || '').trim().toLowerCase()}|${(item.message || '').trim().toLowerCase()}`;
            if (!seen.has(key)) {
                seen.add(key);
                result.push(item);
            }
        }
        return result.sort((a, b) => {
            const timeA = a.created_at ? new Date(a.created_at).getTime() : 0;
            const timeB = b.created_at ? new Date(b.created_at).getTime() : 0;
            return timeB - timeA;
        });
    }

    function renderComments(list) {
        if (!commentsFeed) return;
        commentsFeed.innerHTML = '';
        if (!Array.isArray(list) || list.length === 0) {
            commentsFeed.innerHTML = `
                <div class="p-8 text-center text-muted text-sm border border-dashed border-ink/10 dark:border-white/10 rounded-2xl">
                    {{ __('Belum ada komentar publik. Jadilah yang pertama berkomentar!') }}
                </div>
            `;
            if (countBadge) countBadge.textContent = `0 {{ __('Komentar') }}`;
            return;
        }

        list.forEach(item => {
            commentsFeed.appendChild(createCommentElement({
                id: item.id,
                name: item.name,
                message: item.message,
                avatar: item.avatar,
                created_at: item.created_at,
                time_ago: item.time_ago
            }));
        });
        if (countBadge) countBadge.textContent = `${list.length} {{ __('Komentar') }}`;
    }

    async function fetchPublicComments() {
        let serverComments = null;

        if (SUPABASE_URL && SUPABASE_ANON_KEY) {
            try {
                const res = await fetch(`${SUPABASE_URL}/rest/v1/comments?select=*&order=created_at.desc&limit=50`, {
                    headers: {
                        'apikey': SUPABASE_ANON_KEY,
                        'Authorization': `Bearer ${SUPABASE_ANON_KEY}`
                    }
                });
                if (res.ok) {
                    const data = await res.json();
                    if (Array.isArray(data)) {
                        serverComments = data;
                    }
                }
            } catch (err) {
                console.warn('Gagal memuat dari Supabase:', err);
            }
        }

        if (!serverComments) {
            try {
                const res = await fetch(commentsApiUrl, {
                    headers: { 'Accept': 'application/json' }
                });
                if (res.ok) {
                    const json = await res.json();
                    if (json.status === 'success' && Array.isArray(json.data)) {
                        serverComments = json.data;
                    }
                }
            } catch (err) {
                console.warn('Gagal memuat komentar dari API:', err);
            }
        }

        const finalComments = mergeComments(serverComments || []);
        renderComments(finalComments);
    }

    // Perbarui waktu relatif awal pada komentar bawaan HTML
    document.querySelectorAll('#comments-feed .comment-card [data-created-at]').forEach(span => {
        const dt = span.getAttribute('data-created-at');
        if (dt) {
            span.textContent = formatTimeAgo(dt);
        }
    });

    fetchPublicComments();
    setInterval(fetchPublicComments, 10000);

    if (commentForm) {
        commentForm.addEventListener('submit', async function(e) {
            e.preventDefault();

            const name = commentNameInput?.value.trim();
            const message = commentMessageInput?.value.trim();
            const avatar = `https://api.dicebear.com/7.x/adventurer/svg?seed=${encodeURIComponent(currentAvatarSeed)}`;

            if (!name || !message) {
                showCommentAlert('error', '{{ __("Mohon lengkapi nama dan pesan komentar Anda.") }}');
                return;
            }

            if (commentSubmitBtn) commentSubmitBtn.disabled = true;
            if (commentSpinner) commentSpinner.classList.remove('hidden');
            if (commentIcon) commentIcon.classList.add('hidden');
            if (commentBtnText) commentBtnText.textContent = '{{ __("Mengirim...") }}';

            let submitSuccess = false;
            let errorMessage = '';

            if (SUPABASE_URL && SUPABASE_ANON_KEY) {
                try {
                    const response = await fetch(`${SUPABASE_URL}/rest/v1/comments`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'apikey': SUPABASE_ANON_KEY,
                            'Authorization': `Bearer ${SUPABASE_ANON_KEY}`,
                            'Prefer': 'return=minimal'
                        },
                        body: JSON.stringify({ name, message, avatar })
                    });
                    if (response.ok) {
                        submitSuccess = true;
                    }
                } catch (err) {
                    console.error('Supabase submit error:', err);
                }
            }

            try {
                const csrfToken = document.querySelector('input[name="_token"]')?.value || '';
                const response = await fetch(commentsApiUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        ...(csrfToken ? { 'X-CSRF-TOKEN': csrfToken } : {})
                    },
                    body: JSON.stringify({ name, message, avatar })
                });

                if (response.ok) {
                    submitSuccess = true;
                } else if (!submitSuccess) {
                    const errData = await response.json().catch(() => null);
                    errorMessage = errData?.message || ('Gagal mengirim (HTTP ' + response.status + ')');
                }
            } catch (err) {
                console.error('API submit error:', err);
                if (!submitSuccess) {
                    errorMessage = 'Kendala jaringan saat mengirim komentar.';
                }
            }

            if (commentSubmitBtn) commentSubmitBtn.disabled = false;
            if (commentSpinner) commentSpinner.classList.add('hidden');
            if (commentIcon) commentIcon.classList.remove('hidden');
            if (commentBtnText) commentBtnText.textContent = '{{ __("Kirim Komentar") }}';

            if (submitSuccess) {
                saveLocalUserComment({
                    id: Date.now(),
                    name: name,
                    message: message,
                    avatar: avatar,
                    created_at: new Date().toISOString()
                });

                if (commentMessageInput) commentMessageInput.value = '';
                showCommentAlert('success', '{{ __("Komentar kamu berhasil dikirim dan kini tampil untuk semua orang!") }}');
                await fetchPublicComments();
                setTimeout(() => {
                    if (commentAlert) commentAlert.classList.add('hidden');
                }, 5000);
            } else {
                showCommentAlert('error', errorMessage || '{{ __("Gagal mengirim komentar. Silakan coba lagi.") }}');
            }
        });
    }

});
</script>

@endsection
