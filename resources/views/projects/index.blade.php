@extends('layouts.app')

@section('title', 'Galeri Perjalanan — Thoriq Alfurqan M.L')

@section('content')

<section class="max-w-6xl mx-auto px-6 md:px-10 pt-24 pb-16">
    <p class="text-sm font-medium text-accent tracking-widest uppercase mb-6">Galeri Perjalanan</p>
    <h1 class="font-display text-4xl md:text-6xl leading-[1.1] max-w-2xl">
        Kumpulan destinasi & momen trip pilihan.
    </h1>
</section>

<section class="max-w-6xl mx-auto px-6 md:px-10 pb-32">
    <div class="grid md:grid-cols-3 gap-8">
        @foreach ($projects as $project)
            <x-project-card :project="$project" />
        @endforeach
    </div>
</section>

@endsection