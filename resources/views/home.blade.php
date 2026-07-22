@extends('layouts.app')

@section('title', 'Nama Kamu — Portfolio')

@section('content')

{{-- HERO --}}
<section class="max-w-6xl mx-auto px-6 md:px-10 pt-20 pb-24 grid md:grid-cols-5 gap-12 items-center">
    <div class="md:col-span-3">
        <p class="text-sm font-medium text-accent tracking-wide uppercase mb-6">Web Developer</p>
        <h1 class="font-display text-4xl md:text-6xl leading-[1.1] mb-8">
            Membangun antarmuka yang <span class="italic text-accent">rapi</span>,
            terukur, dan enak dipakai.
        </h1>
        <p class="text-muted text-lg max-w-md mb-10">
            Saya fokus membangun web aplikasi yang bersih secara kode maupun tampilan — dari backend Laravel hingga detail interaksi di frontend.
        </p>
        <div class="flex flex-wrap gap-4">
            <a href="{{ url('/projects') }}"
               class="px-8 py-4 rounded-full bg-accent text-paper hover:bg-accent-dark transition-all duration-500 hover:-translate-y-1 hover:shadow-xl hover:shadow-accent/20 font-medium tracking-wide">
                Lihat Project
            </a>
            <a href="{{ url('/contact') }}"
               class="px-8 py-4 rounded-full border border-ink/20 hover:border-accent hover:text-accent transition-all duration-500 font-medium tracking-wide">
                Hubungi Saya
            </a>
        </div>
    </div>

    {{-- Elemen visual signature: grid angka/skill, bukan foto generik --}}
    <div class="md:col-span-2 mt-12 md:mt-0">
        <div class="border border-ink/10 rounded-3xl p-8 bg-ink/5 backdrop-blur-sm">
            <p class="text-xs uppercase tracking-wider text-muted mb-6 font-medium">Sekilas</p>
            <div class="space-y-6">
                <div class="flex justify-between border-b border-ink/10 pb-4">
                    <span class="text-sm text-muted">Project selesai</span>
                    <span class="font-display text-2xl text-accent">12+</span>
                </div>
                <div class="flex justify-between border-b border-ink/10 pb-4">
                    <span class="text-sm text-muted">Tahun pengalaman</span>
                    <span class="font-display text-2xl text-accent">3</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-sm text-muted">Stack utama</span>
                    <span class="font-display text-2xl text-accent">Laravel</span>
                </div>
            </div>
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