@extends('admin.layouts.admin')

@section('title', 'Kelola Trip & Projects')

@section('content')

<div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-8">
    <div>
        <p class="text-xs text-muted font-semibold uppercase tracking-wider mb-1">Koleksi Perjalanan</p>
        <h2 class="font-display text-2xl md:text-3xl font-bold">Daftar Trip</h2>
    </div>
    <a href="{{ route('admin.projects.create') }}" class="px-6 py-3 rounded-full bg-accent text-paper font-semibold text-sm tracking-wide hover:bg-accent-dark transition-all shadow-lg shadow-accent/20">
        + Tambah Trip Baru
    </a>
</div>

<div class="bg-ink/[0.02] border border-ink/10 rounded-3xl overflow-hidden shadow-sm">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm border-collapse">
            <thead class="bg-ink/10 text-[11px] font-bold uppercase tracking-wider text-muted border-b border-ink/10">
                <tr>
                    <th class="px-6 py-4">Judul Trip</th>
                    <th class="px-6 py-4">Kategori / Role</th>
                    <th class="px-6 py-4">Tahun</th>
                    <th class="px-6 py-4">Elemen / Tags</th>
                    <th class="px-6 py-4">Featured</th>
                    <th class="px-6 py-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-ink/10">
                @forelse ($projects as $project)
                    <tr class="hover:bg-ink/[0.04] transition-colors">
                        <td class="px-6 py-4 font-bold text-ink">
                            <a href="{{ url('/projects/'.$project->slug) }}" target="_blank" class="hover:text-accent transition-colors flex items-center gap-1.5">
                                <span>{{ $project->title }}</span>
                                <svg class="w-3.5 h-3.5 opacity-50 shrink-0" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                            </a>
                        </td>
                        <td class="px-6 py-4 text-muted">{{ $project->role }}</td>
                        <td class="px-6 py-4 text-accent font-semibold">{{ $project->year }}</td>
                        <td class="px-6 py-4">
                            <div class="flex flex-wrap gap-1">
                                @foreach ((array)$project->stack as $tag)
                                    <span class="px-2.5 py-0.5 rounded-full border border-ink/10 text-[10px] text-muted font-medium uppercase tracking-wider">{{ $tag }}</span>
                                @endforeach
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            @if ($project->is_featured)
                                <span class="px-3 py-1 rounded-full bg-accent/10 border border-accent/30 text-accent text-xs font-semibold">Ya</span>
                            @else
                                <span class="px-3 py-1 rounded-full bg-ink/10 text-muted text-xs">Tidak</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right whitespace-nowrap align-middle">
                            <div class="inline-flex items-center justify-end gap-2">
                                <a href="{{ route('admin.projects.edit', $project) }}" class="px-3.5 py-1.5 rounded-xl bg-accent/10 border border-accent/30 text-xs font-semibold text-accent hover:bg-accent hover:text-paper transition-all">
                                    Edit
                                </a>
                                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="inline-block m-0" onsubmit="return confirm('Yakin ingin menghapus trip ini?')">
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
                        <td colspan="6" class="px-6 py-12 text-center text-muted">Belum ada data trip. Silakan tambah trip baru.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($projects->hasPages())
        <div class="p-6 border-t border-ink/10">
            {{ $projects->links() }}
        </div>
    @endif
</div>

@endsection
