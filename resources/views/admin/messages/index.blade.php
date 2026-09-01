@extends('admin.layouts.admin')

@section('title', 'Pesan Masuk (Inbox)')

@section('content')

<div class="mb-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
        <p class="text-xs text-muted font-semibold uppercase tracking-wider mb-1">Kotak Masuk</p>
        <h2 class="font-display text-2xl md:text-3xl font-bold">Pesan dari Pengunjung</h2>
    </div>
    <div class="px-4 py-2 rounded-full bg-accent/10 border border-accent/20 text-accent font-medium text-xs">
        Total: {{ $messages->total() }} Pesan
    </div>
</div>

<div class="bg-ink/[0.02] border border-ink/10 rounded-3xl overflow-hidden shadow-sm">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm border-collapse">
            <thead class="bg-ink/10 text-[11px] font-bold uppercase tracking-wider text-muted border-b border-ink/10">
                <tr>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4">Pengirim & Email</th>
                    <th class="px-6 py-4">Pratinjau Pesan</th>
                    <th class="px-6 py-4">Waktu</th>
                    <th class="px-6 py-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-ink/10">
                @forelse ($messages as $msg)
                    <tr class="hover:bg-ink/[0.04] transition-colors {{ !$msg->is_read ? 'bg-accent/5 font-medium' : '' }}">
                        {{-- STATUS BADGES --}}
                        <td class="px-6 py-5 align-middle whitespace-nowrap">
                            <div class="inline-flex items-center gap-1.5 flex-wrap">
                                @if (!$msg->is_read)
                                    <span class="px-2.5 py-1 rounded-full bg-accent text-paper text-[10px] font-bold uppercase tracking-wider shadow-xs">Baru</span>
                                @else
                                    <span class="px-2.5 py-1 rounded-full bg-ink/10 text-muted border border-ink/10 text-[10px] font-semibold">Dibaca</span>
                                @endif

                                @if ($msg->is_replied)
                                    <span class="px-2.5 py-1 rounded-full bg-green-500/10 border border-green-500/30 text-green-500 text-[10px] font-bold uppercase tracking-wider">Dibalas</span>
                                @endif
                            </div>
                        </td>

                        {{-- PENGIRIM & EMAIL --}}
                        <td class="px-6 py-5 align-middle">
                            <div class="font-bold text-ink text-base leading-snug">{{ $msg->name }}</div>
                            <a href="mailto:{{ $msg->email }}" class="text-xs text-accent hover:underline font-medium">{{ $msg->email }}</a>
                        </td>

                        {{-- PRATINJAU PESAN --}}
                        <td class="px-6 py-5 align-middle">
                            <p class="text-sm text-muted max-w-xs sm:max-w-md truncate leading-relaxed" title="{{ $msg->message }}">
                                {{ $msg->message }}
                            </p>
                        </td>

                        {{-- WAKTU --}}
                        <td class="px-6 py-5 align-middle whitespace-nowrap text-xs text-muted font-medium">
                            {{ $msg->created_at->diffForHumans() }}
                        </td>

                        {{-- AKSI BUTTONS --}}
                        <td class="px-6 py-5 align-middle whitespace-nowrap text-right">
                            <div class="inline-flex items-center justify-end gap-2">
                                <a href="{{ route('admin.messages.show', $msg) }}" 
                                   class="px-3.5 py-2 rounded-xl bg-accent/10 border border-accent/30 text-accent font-semibold text-xs hover:bg-accent hover:text-paper transition-all shadow-xs flex items-center gap-1.5">
                                    <svg class="w-3.5 h-3.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    Lihat Pesan
                                </a>

                                <form action="{{ route('admin.messages.destroy', $msg) }}" method="POST" class="inline-block m-0" onsubmit="return confirm('Hapus pesan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="px-3 py-2 rounded-xl bg-red-500/10 border border-red-500/20 text-red-400 font-semibold text-xs hover:bg-red-500 hover:text-white transition-all flex items-center gap-1">
                                        <svg class="w-3.5 h-3.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-muted">Belum ada pesan masuk.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($messages->hasPages())
        <div class="p-6 border-t border-ink/10">
            {{ $messages->links() }}
        </div>
    @endif
</div>

@endsection
