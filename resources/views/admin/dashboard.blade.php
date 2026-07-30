@extends('admin.layouts.admin')

@section('title', 'Dashboard Overview')

@section('content')

{{-- STAT CARDS --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
    
    <div class="p-6 rounded-2xl border border-ink/10 bg-ink/[0.03] flex items-center justify-between shadow-sm">
        <div>
            <p class="text-xs text-muted font-semibold uppercase tracking-wider mb-1">Total Trip / Project</p>
            <h2 class="font-display text-3xl font-bold text-ink">{{ $totalProjects }}</h2>
        </div>
        <div class="w-12 h-12 rounded-xl bg-accent/10 border border-accent/20 flex items-center justify-center text-accent shrink-0">
            <svg class="w-6 h-6 shrink-0" width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
        </div>
    </div>

    <div class="p-6 rounded-2xl border border-ink/10 bg-ink/[0.03] flex items-center justify-between shadow-sm">
        <div>
            <p class="text-xs text-muted font-semibold uppercase tracking-wider mb-1">Aktivitas & Hobi</p>
            <h2 class="font-display text-3xl font-bold text-ink">{{ $totalSkills }}</h2>
        </div>
        <div class="w-12 h-12 rounded-xl bg-accent/10 border border-accent/20 flex items-center justify-center text-accent shrink-0">
            <svg class="w-6 h-6 shrink-0" width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
        </div>
    </div>

    <div class="p-6 rounded-2xl border border-ink/10 bg-ink/[0.03] flex items-center justify-between shadow-sm">
        <div>
            <p class="text-xs text-muted font-semibold uppercase tracking-wider mb-1">Jejak Perjalanan</p>
            <h2 class="font-display text-3xl font-bold text-ink">{{ $totalTimelines }}</h2>
        </div>
        <div class="w-12 h-12 rounded-xl bg-accent/10 border border-accent/20 flex items-center justify-center text-accent shrink-0">
            <svg class="w-6 h-6 shrink-0" width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </div>
    </div>

    <div class="p-6 rounded-2xl border border-ink/10 bg-ink/[0.03] flex items-center justify-between shadow-sm">
        <div>
            <p class="text-xs text-muted font-semibold uppercase tracking-wider mb-1">Pesan Masuk</p>
            <div class="flex items-baseline gap-2">
                <h2 class="font-display text-3xl font-bold text-ink">{{ $totalMessages }}</h2>
                @if ($unreadMessages > 0)
                    <span class="text-xs text-red-500 font-bold">({{ $unreadMessages }} baru)</span>
                @endif
            </div>
        </div>
        <div class="w-12 h-12 rounded-xl bg-accent/10 border border-accent/20 flex items-center justify-center text-accent shrink-0">
            <svg class="w-6 h-6 shrink-0" width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
        </div>
    </div>

</div>

{{-- TABLES / RECENT CONTENT --}}
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    
    {{-- RECENT PROJECTS --}}
    <div class="p-6 rounded-3xl border border-ink/10 bg-ink/[0.02]">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h3 class="font-display text-xl font-bold text-ink">Trip Terbaru</h3>
                <p class="text-xs text-muted">Aktivitas & destinasi perjalanan terakhir</p>
            </div>
            <a href="{{ route('admin.projects.create') }}" class="px-4 py-2 rounded-full bg-accent text-paper text-xs font-semibold hover:bg-accent-dark transition-all shadow-md shadow-accent/10">
                + Tambah Trip
            </a>
        </div>

        <div class="space-y-3">
            @forelse ($recentProjects as $project)
                <div class="flex items-center justify-between p-4 rounded-2xl border border-ink/10 bg-ink/[0.02] hover:border-accent/30 transition-all">
                    <div>
                        <p class="font-bold text-sm text-ink">{{ $project->title }}</p>
                        <p class="text-xs text-muted mt-0.5">{{ $project->year }} &bull; {{ $project->role }}</p>
                    </div>
                    <a href="{{ route('admin.projects.edit', $project) }}" class="text-xs text-accent hover:underline font-semibold px-3 py-1 rounded-lg border border-accent/20 bg-accent/5">Edit &rarr;</a>
                </div>
            @empty
                <p class="text-sm text-muted text-center py-6">Belum ada trip.</p>
            @endforelse
        </div>
    </div>

    {{-- RECENT MESSAGES --}}
    <div class="p-6 rounded-3xl border border-ink/10 bg-ink/[0.02]">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h3 class="font-display text-xl font-bold text-ink">Pesan Masuk Terbaru</h3>
                <p class="text-xs text-muted">Pesan hangat dari pengunjung website</p>
            </div>
            <a href="{{ route('admin.messages.index') }}" class="text-xs text-accent hover:underline font-semibold">Lihat Semua Inbox &rarr;</a>
        </div>

        <div class="space-y-3">
            @forelse ($recentMessages as $msg)
                <div class="p-4 rounded-2xl border border-ink/10 bg-ink/[0.02] flex items-start justify-between gap-4 hover:border-accent/30 transition-all">
                    <div class="min-w-0">
                        <div class="flex items-center gap-2 mb-1">
                            <span class="font-bold text-sm text-ink truncate">{{ $msg->name }}</span>
                            @if (!$msg->is_read)
                                <span class="px-2 py-0.5 rounded-full bg-accent text-paper text-[10px] font-bold uppercase">Baru</span>
                            @endif
                        </div>
                        <p class="text-xs text-muted line-clamp-1">{{ $msg->message }}</p>
                    </div>
                    <a href="{{ route('admin.messages.show', $msg) }}" class="text-xs text-accent hover:underline font-semibold shrink-0 px-3 py-1 rounded-lg border border-accent/20 bg-accent/5">Baca</a>
                </div>
            @empty
                <p class="text-sm text-muted text-center py-6">Belum ada pesan masuk.</p>
            @endforelse
        </div>
    </div>

</div>

@endsection
