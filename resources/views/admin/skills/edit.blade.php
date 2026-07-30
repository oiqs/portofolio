@extends('admin.layouts.admin')

@section('title', 'Edit Hobi')

@section('content')

<div class="max-w-2xl mx-auto">
    <div class="mb-8">
        <a href="{{ route('admin.skills.index') }}" class="text-xs text-muted hover:text-accent transition-colors">&larr; Kembali ke daftar hobi</a>
        <h2 class="font-display text-3xl font-bold mt-1">Edit Aktivitas / Hobi</h2>
    </div>

    <form method="POST" action="{{ route('admin.skills.update', $skill) }}" class="bg-ink/5 border border-ink/10 rounded-3xl p-8 space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block text-xs font-semibold uppercase tracking-wider mb-2 text-muted">Nama Aktivitas / Hobi *</label>
            <input type="text" name="name" id="name" value="{{ old('name', $skill->name) }}" required
                   class="w-full px-4 py-3 rounded-xl border border-ink/10 bg-transparent focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none transition-all text-sm">
            @error('name') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="level" class="block text-xs font-semibold uppercase tracking-wider mb-2 text-muted">Tingkat Kesukaan / Level *</label>
            <input type="text" name="level" id="level" value="{{ old('level', $skill->level) }}" required
                   class="w-full px-4 py-3 rounded-xl border border-ink/10 bg-transparent focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none transition-all text-sm">
            @error('level') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="order" class="block text-xs font-semibold uppercase tracking-wider mb-2 text-muted">Urutan Tampil *</label>
            <input type="number" name="order" id="order" value="{{ old('order', $skill->order) }}" required
                   class="w-full px-4 py-3 rounded-xl border border-ink/10 bg-transparent focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none transition-all text-sm">
            @error('order') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="pt-4 flex items-center gap-4">
            <button type="submit" class="px-8 py-3.5 rounded-full bg-accent text-paper font-semibold hover:bg-accent-dark transition-all shadow-lg shadow-accent/20">
                Update Hobi
            </button>
            <a href="{{ route('admin.skills.index') }}" class="px-6 py-3.5 rounded-full border border-ink/15 text-muted hover:text-ink transition-colors">
                Batal
            </a>
        </div>
    </form>
</div>

@endsection
