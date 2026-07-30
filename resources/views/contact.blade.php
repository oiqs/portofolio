@extends('layouts.app')

@section('title', 'Contact — Nama Kamu')

@section('content')

<section class="max-w-6xl mx-auto px-6 md:px-10 pt-24 pb-32 grid md:grid-cols-5 gap-16">

    {{-- KIRI: INFO --}}
    <div class="md:col-span-2">
        <p class="text-sm font-medium text-accent tracking-widest uppercase mb-6">Kontak</p>
        <h1 class="font-display text-4xl md:text-5xl leading-[1.2] mb-8">
            Mari <span class="italic text-accent">berbicara.</span>
        </h1>
        <p class="text-muted text-lg leading-relaxed mb-12">
            Punya rekomendasi tempat healing menarik, destinasi traveling seru, atau sekadar ingin sapa dan berdiskusi? Kirim pesan lewat form di bawah!
        </p>

        <div class="space-y-6 text-sm">
            <p class="flex flex-col gap-2">
                <span class="text-muted tracking-widest uppercase text-xs">Email</span>
                <a href="mailto:nama@email.com" class="text-lg hover:text-accent transition-colors">nama@email.com</a>
            </p>
            <p class="flex flex-col gap-2">
                <span class="text-muted tracking-widest uppercase text-xs">Sosial Media</span>
                <span class="flex gap-4">
                    <a href="https://instagram.com" target="_blank" class="text-lg hover:text-accent transition-colors">Instagram</a>
                    <span class="text-muted">&bull;</span>
                    <a href="https://wa.me" target="_blank" class="text-lg hover:text-accent transition-colors">WhatsApp</a>
                </span>
            </p>
        </div>
    </div>

    {{-- KANAN: FORM --}}
    <div class="md:col-span-3 bg-ink/5 border border-ink/5 rounded-3xl p-8 md:p-12">

        @if (session('success'))
            <div class="mb-8 px-6 py-5 rounded-2xl bg-accent/10 border border-accent/20 text-accent font-medium">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ url('/contact') }}" class="space-y-8">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium tracking-wide mb-3">Nama Lengkap</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                    class="w-full px-5 py-4 rounded-xl border border-ink/10 bg-transparent focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none transition-all placeholder:text-muted/50"
                    placeholder="Masukkan nama Anda">
                @error('name')
                    <p class="text-sm text-red-400 mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium tracking-wide mb-3">Alamat Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                    class="w-full px-5 py-4 rounded-xl border border-ink/10 bg-transparent focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none transition-all placeholder:text-muted/50"
                    placeholder="email@domain.com">
                @error('email')
                    <p class="text-sm text-red-400 mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="message" class="block text-sm font-medium tracking-wide mb-3">Pesan Anda</label>
                <textarea name="message" id="message" rows="6"
                    class="w-full px-5 py-4 rounded-xl border border-ink/10 bg-transparent focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none transition-all resize-none placeholder:text-muted/50"
                    placeholder="Bagikan tempat healing favorit Anda atau pesan hangat lainnya...">{{ old('message') }}</textarea>
                @error('message')
                    <p class="text-sm text-red-400 mt-2">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="w-full sm:w-auto px-10 py-4 rounded-full bg-accent text-paper hover:bg-accent-dark transition-all duration-500 hover:-translate-y-1 hover:shadow-xl hover:shadow-accent/20 font-medium tracking-wide">
                Kirim Pesan
            </button>
        </form>
    </div>

</section>

@endsection