@extends('admin.layouts.admin')

@section('title', 'Buku Tamu & Komentar Publik')

@section('content')

@if (session('success'))
    <div class="mb-6 px-5 py-4 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 dark:text-emerald-400 text-sm font-semibold flex items-center justify-between">
        <div class="flex items-center gap-2">
            <svg class="w-5 h-5 text-emerald-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            <span>{{ session('success') }}</span>
        </div>
        <button type="button" onclick="this.parentElement.remove()" class="text-xs text-muted hover:text-ink">&times;</button>
    </div>
@endif

<div class="mb-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
        <p class="text-xs text-muted font-semibold uppercase tracking-wider mb-1">Moderasi Konten</p>
        <h2 class="font-display text-2xl md:text-3xl font-bold">Komentar & Buku Tamu</h2>
        <p class="text-xs text-muted mt-1">Kelola pesan dan ulasan publik dari pengunjung website</p>
    </div>
    
    <div class="flex items-center gap-3 flex-wrap">
        {{-- TOMBOL SINKRON DARI WEB VERCEL --}}
        <form method="POST" action="{{ route('admin.sync.web') }}">
            @csrf
            <button type="submit" class="px-4 py-2.5 rounded-xl bg-accent text-paper font-semibold text-xs hover:bg-accent/90 transition-all shadow-md shadow-accent/20 flex items-center gap-2">
                <svg class="w-4 h-4 animate-spin-hover" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                </svg>
                <span>Tarik Data Baru dari Web (Vercel)</span>
            </button>
        </form>

        <div class="px-3.5 py-2 rounded-xl bg-ink/5 border border-ink/10 text-muted font-medium text-xs">
            Total: <span class="font-bold text-ink">{{ $totalComments }}</span> Komentar
        </div>
    </div>
</div>

{{-- STAT RINGKAS --}}
<div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
    <div class="p-4 rounded-2xl bg-ink/[0.02] border border-ink/10 flex items-center justify-between">
        <div>
            <span class="text-[11px] text-muted font-semibold uppercase">Total Komentar</span>
            <p class="text-2xl font-bold text-ink">{{ $totalComments }}</p>
        </div>
        <div class="w-10 h-10 rounded-xl bg-accent/10 text-accent flex items-center justify-center font-bold">
            💬
        </div>
    </div>
    <div class="p-4 rounded-2xl bg-ink/[0.02] border border-ink/10 flex items-center justify-between">
        <div>
            <span class="text-[11px] text-muted font-semibold uppercase">Tampil di Web</span>
            <p class="text-2xl font-bold text-emerald-500">{{ $approvedCount }}</p>
        </div>
        <div class="w-10 h-10 rounded-xl bg-emerald-500/10 text-emerald-500 flex items-center justify-center font-bold">
            ✓
        </div>
    </div>
    <div class="p-4 rounded-2xl bg-ink/[0.02] border border-ink/10 flex items-center justify-between">
        <div>
            <span class="text-[11px] text-muted font-semibold uppercase">Disembunyikan</span>
            <p class="text-2xl font-bold text-muted">{{ $pendingCount }}</p>
        </div>
        <div class="w-10 h-10 rounded-xl bg-ink/10 text-muted flex items-center justify-center font-bold">
            ✕
        </div>
    </div>
</div>

<div class="bg-ink/[0.02] border border-ink/10 rounded-3xl overflow-hidden shadow-sm">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm border-collapse">
            <thead class="bg-ink/10 text-[11px] font-bold uppercase tracking-wider text-muted border-b border-ink/10">
                <tr>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4">Pengirim</th>
                    <th class="px-6 py-4">Isi Pesan Komentar</th>
                    <th class="px-6 py-4">Waktu</th>
                    <th class="px-6 py-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-ink/10">
                @forelse ($comments as $comment)
                    <tr class="hover:bg-ink/[0.04] transition-colors {{ !$comment->is_approved ? 'opacity-60' : '' }}">
                        {{-- STATUS --}}
                        <td class="px-6 py-5 align-middle whitespace-nowrap">
                            @if ($comment->is_approved)
                                <span class="px-2.5 py-1 rounded-full bg-emerald-500/10 border border-emerald-500/30 text-emerald-500 text-[10px] font-bold uppercase tracking-wider">
                                    Tampil Publik
                                </span>
                            @else
                                <span class="px-2.5 py-1 rounded-full bg-ink/10 border border-ink/20 text-muted text-[10px] font-bold uppercase tracking-wider">
                                    Disembunyikan
                                </span>
                            @endif
                        </td>

                        {{-- AVATAR & NAMA --}}
                        <td class="px-6 py-5 align-middle">
                            <div class="flex items-center gap-3">
                                <img src="{{ $comment->avatar ?: 'https://api.dicebear.com/7.x/adventurer/svg?seed=' . urlencode($comment->name) }}" 
                                     alt="{{ $comment->name }}" 
                                     class="w-10 h-10 rounded-xl bg-accent/10 border border-accent/20 object-cover shrink-0">
                                <div>
                                    <div class="font-bold text-ink text-base leading-snug">{{ $comment->name }}</div>
                                    <span class="text-[11px] text-muted">{{ $comment->ip_address ? 'IP: ' . $comment->ip_address : 'Pengunjung Web' }}</span>
                                </div>
                            </div>
                        </td>

                        {{-- PESAN --}}
                        <td class="px-6 py-5 align-middle">
                            <p class="text-sm text-ink/90 dark:text-gray-200 max-w-md break-words whitespace-pre-line leading-relaxed">
                                {{ $comment->message }}
                            </p>
                        </td>

                        {{-- WAKTU --}}
                        <td class="px-6 py-5 align-middle whitespace-nowrap text-xs text-muted">
                            <div>{{ $comment->created_at->format('d M Y, H:i') }} WIB</div>
                            <span class="text-[10px] text-muted/70">{{ $comment->created_at->diffForHumans() }}</span>
                        </td>

                        {{-- AKSI --}}
                        <td class="px-6 py-5 align-middle text-right whitespace-nowrap">
                            <div class="flex items-center justify-end gap-2">
                                {{-- TOGGLE APPROVE --}}
                                <form method="POST" action="{{ route('admin.comments.toggle', $comment) }}" class="inline">
                                    @csrf
                                    <button type="submit" 
                                            class="p-2 rounded-xl border border-ink/10 hover:bg-ink/5 text-muted hover:text-ink transition-colors"
                                            title="{{ $comment->is_approved ? 'Sembunyikan dari publik' : 'Tampilkan ke publik' }}">
                                        @if ($comment->is_approved)
                                            <svg class="w-4 h-4 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                        @else
                                            <svg class="w-4 h-4 text-muted" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"/></svg>
                                        @endif
                                    </button>
                                </form>

                                {{-- DELETE --}}
                                <form method="POST" action="{{ route('admin.comments.destroy', $comment) }}" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus komentar ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="p-2 rounded-xl border border-red-500/20 text-red-500 hover:bg-red-500/10 transition-colors"
                                            title="Hapus komentar">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-muted">
                            <div class="max-w-xs mx-auto">
                                <span class="text-3xl block mb-2">💬</span>
                                <p class="font-bold text-ink">Belum ada komentar publik.</p>
                                <p class="text-xs text-muted mt-1">Gunakan tombol "Tarik Data Baru dari Web" untuk menyinkronkan komentar dari Vercel.</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($comments->hasPages())
        <div class="px-6 py-4 border-t border-ink/10">
            {{ $comments->links() }}
        </div>
    @endif
</div>

@endsection
