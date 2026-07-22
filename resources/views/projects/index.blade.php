@extends('layouts.app')

@section('title', 'Projects — Nama Kamu')

@section('content')

<section class="max-w-6xl mx-auto px-6 md:px-10 pt-24 pb-16">
    <p class="text-sm font-medium text-accent tracking-widest uppercase mb-6">Portofolio</p>
    <h1 class="font-display text-4xl md:text-6xl leading-[1.1] max-w-2xl">
        Kumpulan project yang pernah saya bangun.
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