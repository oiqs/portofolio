@extends('layouts.app')

@section('title', $project['title'].' — Nama Kamu')

@section('content')

{{-- HEADER --}}
<section class="max-w-6xl mx-auto px-6 md:px-10 pt-24 pb-16">
    <a href="{{ url('/projects') }}" class="text-sm font-medium tracking-wide text-muted hover:text-accent transition-colors mb-10 inline-flex items-center gap-2 group">
        <span class="group-hover:-translate-x-1 transition-transform">&larr;</span> Kembali ke semua project
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
                <p class="text-muted text-xs uppercase tracking-widest mb-1">Peran</p>
                <p class="font-medium text-ink">{{ $project['role'] }}</p>
            </div>
        </div>
    </div>
</section>

{{-- GAMBAR/MOCKUP --}}
<section class="max-w-6xl mx-auto px-6 md:px-10 pb-24">
    <div class="aspect-[21/9] bg-ink/5 rounded-3xl overflow-hidden relative">
        <div class="absolute inset-0 border border-ink/5 rounded-3xl"></div>
    </div>
</section>

{{-- PROBLEM & SOLUTION --}}
<section class="max-w-6xl mx-auto px-6 md:px-10 py-24 border-t border-ink/5 grid md:grid-cols-2 gap-16">
    <div>
        <h2 class="font-display text-3xl mb-6 flex items-center gap-4">
            <span class="w-8 h-[1px] bg-accent"></span> Masalah
        </h2>
        <p class="text-muted text-lg leading-relaxed">{{ $project['problem'] }}</p>
    </div>
    <div>
        <h2 class="font-display text-3xl mb-6 flex items-center gap-4">
            <span class="w-8 h-[1px] bg-accent"></span> Solusi
        </h2>
        <p class="text-muted text-lg leading-relaxed">{{ $project['solution'] }}</p>
    </div>
</section>

{{-- TECH STACK --}}
<section class="max-w-6xl mx-auto px-6 md:px-10 py-24 border-t border-ink/5">
    <h2 class="font-display text-3xl mb-10 text-center">Teknologi yang Digunakan</h2>
    <div class="flex flex-wrap justify-center gap-4">
        @foreach ($project['stack'] as $tech)
            <span class="px-6 py-3 rounded-full bg-ink/5 border border-ink/5 text-sm uppercase tracking-widest font-medium">{{ $tech }}</span>
        @endforeach
    </div>
</section>

{{-- HASIL/IMPACT --}}
<section class="max-w-6xl mx-auto px-6 md:px-10 py-24 border-t border-ink/5 text-center">
    <h2 class="font-display text-3xl mb-6">Hasil Akhir</h2>
    <p class="text-muted text-lg leading-relaxed max-w-3xl mx-auto mb-12">{{ $project['impact'] }}</p>

    <div class="flex flex-wrap justify-center gap-6 mt-8">
        @if ($project['demo_url'] !== '#')
            <a href="{{ $project['demo_url'] }}" target="_blank"
               class="px-8 py-4 rounded-full bg-accent text-paper hover:bg-accent-dark transition-all duration-500 hover:-translate-y-1 hover:shadow-xl hover:shadow-accent/20 font-medium tracking-wide">
                Lihat Demo
            </a>
        @endif
        @if ($project['github_url'] !== '#')
            <a href="{{ $project['github_url'] }}" target="_blank"
               class="px-8 py-4 rounded-full border border-ink/20 hover:border-accent hover:text-accent transition-all duration-500 hover:-translate-y-1 font-medium tracking-wide">
                Source Code
            </a>
        @endif
    </div>
</section>

{{-- NEXT PROJECT --}}
<section class="max-w-6xl mx-auto px-6 md:px-10 py-32 border-t border-ink/5">
    <p class="text-sm font-medium tracking-widest uppercase text-muted mb-6 text-center">Project berikutnya</p>
    <a href="{{ url('/projects/'.$next['slug']) }}"
       class="group flex flex-col items-center justify-center max-w-3xl mx-auto text-center">
        <h2 class="font-display text-4xl md:text-5xl group-hover:text-accent transition-colors duration-500 mb-6">{{ $next['title'] }}</h2>
        <span class="text-3xl text-accent group-hover:translate-x-4 transition-transform duration-500">&rarr;</span>
    </a>
</section>

@endsection