@extends('admin.layouts.admin')

@section('title', 'Detail Pesan Masuk')

@section('content')

<div class="max-w-3xl mx-auto">
    <div class="mb-8 flex items-center justify-between">
        <div>
            <a href="{{ route('admin.messages.index') }}" class="text-xs text-muted hover:text-accent transition-colors">&larr; Kembali ke Inbox</a>
            <h2 class="font-display text-3xl font-bold mt-1">Detail Pesan</h2>
        </div>

        <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Hapus pesan ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-4 py-2 rounded-xl border border-red-500/20 text-xs text-red-400 hover:bg-red-500/10 transition-colors">
                Hapus Pesan
            </button>
        </form>
    </div>

    <div class="bg-ink/5 border border-ink/10 rounded-3xl p-8 space-y-6">
        <div class="flex flex-wrap items-center justify-between border-b border-ink/10 pb-6 gap-4">
            <div>
                <p class="text-xs text-muted uppercase tracking-wider">Pengirim</p>
                <h3 class="font-display text-2xl font-bold text-ink mt-1">{{ $message->name }}</h3>
                <a href="mailto:{{ $message->email }}" class="text-sm text-accent hover:underline">{{ $message->email }}</a>
            </div>
            <div class="text-right">
                <p class="text-xs text-muted uppercase tracking-wider">Diterima Pada</p>
                <p class="text-sm text-ink font-medium mt-1">{{ $message->created_at->format('d M Y, H:i') }}</p>
                <p class="text-xs text-muted">{{ $message->created_at->diffForHumans() }}</p>
            </div>
        </div>

        <div>
            <p class="text-xs text-muted uppercase tracking-wider mb-3">Isi Pesan:</p>
            <div class="p-6 rounded-2xl bg-ink/5 border border-ink/5 text-ink leading-relaxed whitespace-pre-line text-base">
                {{ $message->message }}
            </div>
        </div>

        <div class="pt-4 flex items-center gap-4 border-t border-ink/10">
            <a href="mailto:{{ $message->email }}?subject=Re:%20Pesan%20Portfolio" class="px-8 py-3 rounded-full bg-accent text-paper font-semibold hover:bg-accent-dark transition-all shadow-lg shadow-accent/20 text-sm">
                Balas via Email &rarr;
            </a>
        </div>
    </div>
</div>

@endsection
