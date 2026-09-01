@extends('admin.layouts.admin')

@section('title', 'Kelola Jejak Perjalanan')

@section('content')

<div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-8">
    <div>
        <p class="text-xs text-muted font-medium uppercase tracking-wider">Timeline & Milestone</p>
        <h2 class="font-display text-2xl font-bold">Jejak Perjalanan</h2>
    </div>
    <a href="{{ route('admin.timelines.create') }}" class="px-6 py-3 rounded-full bg-accent text-paper font-medium text-sm tracking-wide hover:bg-accent-dark transition-all shadow-lg shadow-accent/20">
        + Tambah Timeline Baru
    </a>
</div>

<div class="bg-ink/5 border border-ink/10 rounded-3xl overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead class="bg-ink/10 text-xs font-semibold uppercase tracking-wider text-muted border-b border-ink/10">
                <tr>
                    <th class="px-6 py-4">Urutan</th>
                    <th class="px-6 py-4">Tahun / Periode</th>
                    <th class="px-6 py-4">Judul Milestone</th>
                    <th class="px-6 py-4">Deskripsi</th>
                    <th class="px-6 py-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-ink/10">
                @forelse ($timelines as $item)
                    <tr class="hover:bg-ink/5 transition-colors">
                        <td class="px-6 py-4 text-accent font-bold">#{{ $item->order }}</td>
                        <td class="px-6 py-4">
                            <span class="px-2.5 py-1 rounded-full border border-accent/20 bg-accent/5 text-accent text-xs font-semibold">
                                {{ $item->year }}
                            </span>
                        </td>
                        <td class="px-6 py-4 font-bold text-ink">{{ $item->title }}</td>
                        <td class="px-6 py-4 text-muted text-xs max-w-xs truncate">{{ $item->description }}</td>
                        <td class="px-6 py-4 text-right whitespace-nowrap align-middle">
                            <div class="inline-flex items-center justify-end gap-2">
                                <a href="{{ route('admin.timelines.edit', $item) }}" class="px-3.5 py-1.5 rounded-xl bg-accent/10 border border-accent/30 text-xs font-semibold text-accent hover:bg-accent hover:text-paper transition-all">
                                    Edit
                                </a>
                                <form action="{{ route('admin.timelines.destroy', $item) }}" method="POST" class="inline-block m-0" onsubmit="return confirm('Yakin ingin menghapus item timeline ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3.5 py-1.5 rounded-xl bg-red-500/10 border border-red-500/20 text-xs font-semibold text-red-400 hover:bg-red-500 hover:text-white transition-all">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-muted">Belum ada timeline. Silakan tambah baru.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
