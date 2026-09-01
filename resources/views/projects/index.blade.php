@extends('layouts.app')

@section('title', 'Galeri Perjalanan — Thoriq Alfurqan M.L')

@section('content')

<section class="max-w-6xl mx-auto px-6 md:px-10 pt-24 pb-16">
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
        <div>
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full border border-accent/30 bg-accent/10 text-accent text-xs font-bold tracking-[0.2em] uppercase mb-4">
                <span class="w-1.5 h-1.5 rounded-full bg-accent animate-pulse"></span>
                Dokumentasi Traveling
            </div>
            
            <h1 class="font-display text-4xl sm:text-5xl md:text-6xl font-bold leading-[1.1] max-w-3xl">
                Kumpulan Destinasi & Momen Trip Pilihan
            </h1>
        </div>

        <div class="shrink-0 bg-ink/5 dark:bg-white/5 border border-ink/10 dark:border-white/10 px-5 py-3 rounded-2xl flex items-center gap-3">
            <span class="text-2xl font-bold text-accent font-display">{{ count($projects) }}</span>
            <div class="text-xs text-muted leading-tight font-medium">
                Destinasi<br/>Tersimpan
            </div>
        </div>
    </div>
</section>

<section class="max-w-6xl mx-auto px-6 md:px-10 pb-32">
    @if(count($projects) > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($projects as $project)
                <x-project-card :project="$project" />
            @endforeach
        </div>
    @else
        <div class="text-center py-20 bg-ink/5 dark:bg-white/5 rounded-3xl border border-ink/10 dark:border-white/10">
            <p class="font-display text-xl text-muted">Belum ada dokumentasi trip yang ditambahkan.</p>
        </div>
    @endif
</section>

@endsection