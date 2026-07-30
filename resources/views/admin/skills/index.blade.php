@extends('admin.layouts.admin')

@section('title', 'Kelola Aktivitas & Hobi')

@section('content')

<div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-8">
    <div>
        <p class="text-xs text-muted font-medium uppercase tracking-wider">Hobi & Passion</p>
        <h2 class="font-display text-2xl font-bold">Aktivitas & Hobi</h2>
    </div>
    <a href="{{ route('admin.skills.create') }}" class="px-6 py-3 rounded-full bg-accent text-paper font-medium text-sm tracking-wide hover:bg-accent-dark transition-all shadow-lg shadow-accent/20">
        + Tambah Hobi Baru
    </a>
</div>

<div class="bg-ink/5 border border-ink/10 rounded-3xl overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead class="bg-ink/10 text-xs font-semibold uppercase tracking-wider text-muted border-b border-ink/10">
                <tr>
                    <th class="px-6 py-4">Urutan</th>
                    <th class="px-6 py-4">Nama Aktivitas / Hobi</th>
                    <th class="px-6 py-4">Tingkat Kesukaan / Badge</th>
                    <th class="px-6 py-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-ink/10">
                @forelse ($skills as $skill)
                    <tr class="hover:bg-ink/5 transition-colors">
                        <td class="px-6 py-4 text-accent font-bold">#{{ $skill->order }}</td>
                        <td class="px-6 py-4 font-bold text-ink">{{ $skill->name }}</td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-full border border-accent/30 bg-accent/10 text-accent text-xs font-semibold uppercase tracking-wide">
                                {{ $skill->level }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <a href="{{ route('admin.skills.edit', $skill) }}" class="px-3 py-1.5 rounded-lg border border-ink/15 text-xs text-ink hover:border-accent hover:text-accent transition-colors">
                                Edit
                            </a>
                            <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus hobi ini?')">
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
                        <td colspan="4" class="px-6 py-12 text-center text-muted">Belum ada hobi. Silakan tambah baru.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
