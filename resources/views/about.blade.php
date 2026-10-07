@extends('layouts.app')

@section('title', 'About — Thoriq Alfurqan M.L')

@section('content')

{{-- INTRO --}}
<section class="max-w-6xl mx-auto px-6 md:px-10 pt-20 pb-28">
    <div class="grid md:grid-cols-12 gap-12 lg:gap-16 items-center">
        
        {{-- FOTO PROFIL (KIRI) --}}
        <div class="md:col-span-5 flex flex-col items-center text-center">
            <div class="relative p-2.5 rounded-full border-2 border-accent/40 bg-ink/5 shadow-2xl shadow-accent/15 group max-w-[320px] sm:max-w-[380px] w-full">
                {{-- Decorative Glow Ring --}}
                <div class="absolute inset-0 rounded-full bg-accent/20 blur-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-700 pointer-events-none"></div>
                
                {{-- Frame Foto Bulat --}}
                <div class="relative aspect-square rounded-full overflow-hidden border border-ink/10 bg-ink/10">
                    <img src="{{ asset('images/profile.jpeg') }}" 
                         alt="Foto Thoriq Alfurqan M.L" 
                         class="w-full h-full object-cover filter grayscale contrast-125 group-hover:scale-105 group-hover:grayscale-0 transition-all duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-paper/30 via-transparent to-transparent opacity-60"></div>
                </div>
            </div>
        </div>

        {{-- DESKRIPSI (KANAN) --}}
        <div class="md:col-span-7 space-y-6">
            <div>
                <p class="text-xs font-bold text-accent tracking-[0.2em] uppercase mb-3">{{ __('Tentang Saya') }}</p>
                <h1 class="font-display text-4xl sm:text-5xl lg:text-6xl font-bold leading-[1.15] mb-4">
                    {{ __('Cerita di balik') }} <br class="hidden sm:inline" />
                    <span class="italic text-accent">Siganteng & Tanpan.</span>
                </h1>
                <p class="text-xl font-display text-accent/90 italic">Thoriq Alfurqan M.L (oiq_s)</p>
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
                <a href="{{ url('/contact') }}" 
                   class="px-8 py-3.5 rounded-full bg-accent text-paper font-medium text-sm tracking-wide hover:bg-accent-dark transition-all duration-300 hover:-translate-y-0.5 hover:shadow-lg hover:shadow-accent/20">
                    {{ __('Hubungi Saya') }}
                </a>
                <a href="{{ url('/projects') }}" 
                   class="px-8 py-3.5 rounded-full border border-ink/15 text-ink font-medium text-sm tracking-wide hover:border-accent hover:text-accent transition-all duration-300 hover:-translate-y-0.5">
                    {{ __('Lihat Galeri & Trip') }}
                </a>
            </div>
        </div>

    </div>
</section>

{{-- SKILLS --}}
<section class="max-w-6xl mx-auto px-6 md:px-10 py-24 border-t border-ink/5">
    <div class="text-center max-w-2xl mx-auto mb-16">
        <p class="text-xs font-bold text-accent tracking-[0.2em] uppercase mb-3">{{ __('Aktivitas & Hobi') }}</p>
        <h2 class="font-display text-3xl sm:text-4xl">{{ __('Hal Yang Saya Sukai') }}</h2>
    </div>

    <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach ($skills as $skill)
            <div class="border border-ink/10 bg-ink/5 rounded-2xl p-6 hover:border-accent/40 hover:bg-ink/10 transition-all duration-500 hover:-translate-y-1 group">
                <div class="flex items-center justify-between mb-4">
                    <span class="font-display text-xl font-semibold group-hover:text-accent transition-colors">{{ __($skill['name']) }}</span>
                    <span class="text-xs font-semibold px-3 py-1 rounded-full border border-accent/30 bg-accent/10 text-accent tracking-wide uppercase">
                        {{ __($skill['level']) }}
                    </span>
                </div>
                <div class="w-full bg-ink/10 h-1.5 rounded-full overflow-hidden">
                    <div class="bg-accent h-full rounded-full transition-all duration-1000" style="width: {{ $skill['level'] === 'Sangat Suka' ? '95%' : ($skill['level'] === 'Favorit' ? '85%' : '75%') }}"></div>
                </div>
            </div>
        @endforeach
    </div>
</section>

{{-- TIMELINE --}}
<section class="max-w-6xl mx-auto px-6 md:px-10 py-24 border-t border-ink/5">
    <div class="text-center max-w-2xl mx-auto mb-16">
        <p class="text-xs font-bold text-accent tracking-[0.2em] uppercase mb-3">{{ __('Jejak Perjalanan') }}</p>
        <h2 class="font-display text-3xl sm:text-4xl">{{ __('Riwayat Trip & Momen') }}</h2>
    </div>

    <div class="space-y-10 max-w-3xl mx-auto">
        @foreach ($timeline as $item)
            <div class="grid md:grid-cols-12 gap-4 md:gap-8 items-start group">
                <div class="md:col-span-3 md:text-right">
                    <span class="inline-block px-3 py-1 rounded-full border border-accent/20 bg-accent/5 text-xs font-semibold text-accent tracking-wider uppercase mt-1">
                        {{ $item['year'] }}
                    </span>
                </div>
                <div class="md:col-span-9 border-l border-ink/10 pl-6 md:pl-8 pb-8 group-last:border-transparent group-last:pb-0 relative">
                    <div class="absolute w-3.5 h-3.5 bg-accent rounded-full -left-[7px] top-1.5 ring-4 ring-paper shadow-[0_0_12px_rgba(212,175,55,0.6)]"></div>
                    <h3 class="font-display text-2xl font-semibold mb-2 group-hover:text-accent transition-colors">{{ __($item['title']) }}</h3>
                    <p class="text-muted leading-relaxed text-base">{{ __($item['description']) }}</p>
                </div>
            </div>
        @endforeach
    </div>
</section>

{{-- CTA --}}
<section class="max-w-6xl mx-auto px-6 md:px-10 py-28 text-center border-t border-ink/5">
    <div class="max-w-3xl mx-auto border border-ink/10 rounded-3xl p-10 md:p-16 bg-gradient-to-b from-ink/5 to-transparent relative overflow-hidden">
        <div class="absolute -top-24 -left-24 w-48 h-48 bg-accent/10 rounded-full blur-3xl pointer-events-none"></div>
        <h2 class="font-display text-3xl sm:text-4xl md:text-5xl mb-6 leading-tight">{{ __('Jelajahi Momen Perjalanan') }}</h2>
        <p class="text-muted text-base sm:text-lg mb-10 max-w-xl mx-auto">{{ __('Lihat catatan trip dan destinasi tempat-tempat healing favorit yang pernah saya kunjungi.') }}</p>
        <a href="{{ url('/projects') }}"
           class="inline-block px-10 py-4 rounded-full bg-accent text-paper hover:bg-accent-dark transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-accent/20 font-medium tracking-wide">
            {{ __('Lihat Galeri Trip') }}
        </a>
    </div>
</section>

@endsection