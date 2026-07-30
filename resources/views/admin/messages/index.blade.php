@extends('admin.layouts.admin')

@section('title', 'Pesan Masuk (Inbox)')

@section('content')

<div class="mb-8">
    <p class="text-xs text-muted font-medium uppercase tracking-wider">Kotak Masuk</p>
    <h2 class="font-display text-2xl font-bold">Pesan dari Pengunjung</h2>
</div>

<div class="bg-ink/5 border border-ink/10 rounded-3xl overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead class="bg-ink/10 text-xs font-semibold uppercase tracking-wider text-muted border-b border-ink/10">
                <tr>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4">Nama Pengirim</th>
                    <th class="px-6 py-4">Email</th>
                    <th class="px-6 py-4">Pratinjau Pesan</th>
                    <th class="px-6 py-4">Waktu</th>
                    <th class="px-6 py-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-ink/10">
                @forelse ($messages as $msg)
                    <tr class="hover:bg-ink/5 transition-colors {{ !$msg->is_read ? 'bg-accent/5 font-semibold' : '' }}">
                        <td class="px-6 py-4">
                            @if (!$msg->is_read)
                                <span class="px-2.5 py-1 rounded-full bg-accent text-paper text-xs font-bold uppercase">Baru</span>
                            @else
                                <span class="px-2.5 py-1 rounded-full bg-ink/10 text-muted text-xs">Dibaca</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-ink">{{ $msg->name }}</td>
                        <td class="px-6 py-4 text-muted">{{ $msg->email }}</td>
                        <td class="px-6 py-4 text-muted max-w-xs truncate">{{ $msg->message }}</td>
                        <td class="px-6 py-4 text-muted text-xs">{{ $msg->created_at->diffForHumans() }}</td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <a href="{{ route('admin.messages.show', $msg) }}" class="px-3 py-1.5 rounded-lg border border-ink/15 text-xs text-ink hover:border-accent hover:text-accent transition-colors">
                                Lihat Pesan
                            </a>
                            <form action="{{ route('admin.messages.destroy', $msg) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus pesan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1.5 rounded-lg border border-red-500/20 text-xs text-red-400 hover:bg-red-500/10 transition-colors">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-muted">Belum ada pesan masuk.</td>
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
