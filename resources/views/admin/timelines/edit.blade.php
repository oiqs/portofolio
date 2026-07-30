@extends('admin.layouts.admin')

@section('title', 'Edit Jejak Perjalanan')

@section('content')

<div class="max-w-2xl mx-auto">
    <div class="mb-8">
        <a href="{{ route('admin.timelines.index') }}" class="text-xs text-muted hover:text-accent transition-colors">&larr; Kembali ke daftar timeline</a>
        <h2 class="font-display text-3xl font-bold mt-1">Edit Jejak Perjalanan</h2>
    </div>

    <form method="POST" action="{{ route('admin.timelines.update', $timeline) }}" class="bg-ink/5 border border-ink/10 rounded-3xl p-8 space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <label for="year" class="block text-xs font-semibold uppercase tracking-wider mb-2 text-muted">Tahun / Periode *</label>
                <input type="text" name="year" id="year" value="{{ old('year', $timeline->year) }}" required
                       class="w-full px-4 py-3 rounded-xl border border-ink/10 bg-transparent focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none transition-all text-sm">
                @error('year') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="order" class="block text-xs font-semibold uppercase tracking-wider mb-2 text-muted">Urutan Tampil *</label>
                <input type="number" name="order" id="order" value="{{ old('order', $timeline->order) }}" required
                       class="w-full px-4 py-3 rounded-xl border border-ink/10 bg-transparent focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none transition-all text-sm">
                @error('order') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <div>
            <label for="title" class="block text-xs font-semibold uppercase tracking-wider mb-2 text-muted">Judul Milestone *</label>
            <input type="text" name="title" id="title" value="{{ old('title', $timeline->title) }}" required
                   class="w-full px-4 py-3 rounded-xl border border-ink/10 bg-transparent focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none transition-all text-sm">
            @error('title') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="description" class="block text-xs font-semibold uppercase tracking-wider mb-2 text-muted">Deskripsi Timeline *</label>
            <textarea name="description" id="description" rows="4" required
                      class="w-full px-4 py-3 rounded-xl border border-ink/10 bg-transparent focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none transition-all text-sm">{{ old('description', $timeline->description) }}</textarea>
            @error('description') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="pt-4 flex items-center gap-4">
            <button type="submit" class="px-8 py-3.5 rounded-full bg-accent text-paper font-semibold hover:bg-accent-dark transition-all shadow-lg shadow-accent/20">
                Update Timeline
            </button>
            <a href="{{ route('admin.timelines.index') }}" class="px-6 py-3.5 rounded-full border border-ink/15 text-muted hover:text-ink transition-colors">
                Batal
            </a>
        </div>
    </form>
</div>

@endsection
