@extends('layouts.app')

@section('title', 'About — Nama Kamu')

@section('content')

{{-- INTRO --}}
<section class="max-w-6xl mx-auto px-6 md:px-10 pt-24 pb-32 grid md:grid-cols-5 gap-16 items-start">
    <div class="md:col-span-2">
        <p class="text-sm font-medium text-accent tracking-widest uppercase mb-6">Tentang Saya</p>
        <h1 class="font-display text-4xl md:text-5xl leading-[1.2]">
            Cerita di balik <br/> <span class="italic text-accent">layar kode.</span>
        </h1>
    </div>

    <div class="md:col-span-3 text-lg text-muted leading-relaxed space-y-6">
        <p>
            Saya mulai tertarik dengan dunia pengembangan web sejak beberapa tahun lalu, dan sejak itu
            terus belajar membangun aplikasi yang tidak hanya berfungsi, tapi juga nyaman digunakan.
        </p>
        <p>
            Saat ini saya fokus di ekosistem Laravel untuk backend, dipadukan dengan Tailwind CSS
            untuk membangun antarmuka yang bersih dan konsisten. Saya percaya detail kecil —
            spasi, tipografi, transisi — adalah yang membedakan aplikasi biasa dan aplikasi yang terasa matang.
        </p>
    </div>
</section>

{{-- SKILLS --}}
<section class="max-w-6xl mx-auto px-6 md:px-10 py-24 border-t border-ink/5">
    <h2 class="font-display text-3xl md:text-4xl mb-16 text-center">Keahlian Utama</h2>

    <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach ($skills as $skill)
            <div class="border border-ink/5 bg-ink/5 rounded-3xl p-8 hover:border-accent/30 hover:bg-ink/10 transition-all duration-500 hover:-translate-y-1">
                <p class="font-display text-xl mb-2">{{ $skill['name'] }}</p>
                <p class="text-sm text-accent tracking-wide uppercase font-medium">{{ $skill['level'] }}</p>
            </div>
        @endforeach
    </div>
</section>

{{-- TIMELINE --}}
<section class="max-w-6xl mx-auto px-6 md:px-10 py-24 border-t border-ink/5">
    <h2 class="font-display text-3xl md:text-4xl mb-16 text-center">Perjalanan Karir</h2>

    <div class="space-y-12 max-w-4xl mx-auto">
        @foreach ($timeline as $item)
            <div class="grid md:grid-cols-5 gap-6 md:gap-16 items-start group">
                <div class="md:col-span-1 md:text-right">
                    <p class="text-sm font-medium text-accent tracking-widest mt-1">{{ $item['year'] }}</p>
                </div>
                <div class="md:col-span-4 border-l border-ink/10 pl-8 md:pl-12 pb-12 group-last:border-transparent group-last:pb-0 relative">
                    <div class="absolute w-3 h-3 bg-accent rounded-full -left-[6.5px] top-1.5 shadow-[0_0_10px_rgba(212,175,55,0.5)]"></div>
                    <h3 class="font-display text-2xl mb-3">{{ $item['title'] }}</h3>
                    <p class="text-muted leading-relaxed">{{ $item['description'] }}</p>
                </div>
            </div>
        @endforeach
    </div>
</section>

{{-- CTA --}}
<section class="max-w-6xl mx-auto px-6 md:px-10 py-32 text-center border-t border-ink/5">
    <h2 class="font-display text-4xl md:text-5xl mb-6">Lihat apa yang sudah saya kerjakan</h2>
    <p class="text-muted text-lg mb-10 max-w-2xl mx-auto">Jelajahi beberapa project yang pernah saya bangun dengan detail proses di baliknya.</p>
    <a href="{{ url('/projects') }}"
       class="inline-block px-10 py-4 rounded-full bg-accent text-paper hover:bg-accent-dark transition-all duration-500 hover:-translate-y-1 hover:shadow-xl hover:shadow-accent/20 font-medium tracking-wide">
        Lihat Project
    </a>
</section>

@endsection