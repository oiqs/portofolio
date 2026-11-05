@extends('admin.layouts.admin')

@section('title', 'Dashboard Overview')

@section('content')

@if (session('success'))
    <div class="mb-6 px-5 py-4 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 dark:text-emerald-400 text-sm font-semibold flex items-center justify-between animate-fadeIn">
        <div class="flex items-center gap-2">
            <svg class="w-5 h-5 text-emerald-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            <span>{{ session('success') }}</span>
        </div>
        <button type="button" onclick="this.parentElement.remove()" class="text-xs text-muted hover:text-ink">&times;</button>
    </div>
@endif

{{-- STAT CARDS --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-5 mb-10">
    
    <div class="p-5 rounded-2xl border border-ink/10 bg-ink/[0.03] flex items-center justify-between shadow-sm">
        <div>
            <p class="text-[11px] text-muted font-semibold uppercase tracking-wider mb-1">Total Trip</p>
            <h2 class="font-display text-2xl md:text-3xl font-bold text-ink">{{ $totalProjects }}</h2>
        </div>
        <div class="w-11 h-11 rounded-xl bg-accent/10 border border-accent/20 flex items-center justify-center text-accent shrink-0">
            <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
        </div>
    </div>

    <div class="p-5 rounded-2xl border border-ink/10 bg-ink/[0.03] flex items-center justify-between shadow-sm">
        <div>
            <p class="text-[11px] text-muted font-semibold uppercase tracking-wider mb-1">Hobi & Skill</p>
            <h2 class="font-display text-2xl md:text-3xl font-bold text-ink">{{ $totalSkills }}</h2>
        </div>
        <div class="w-11 h-11 rounded-xl bg-accent/10 border border-accent/20 flex items-center justify-center text-accent shrink-0">
            <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
        </div>
    </div>

    <div class="p-5 rounded-2xl border border-ink/10 bg-ink/[0.03] flex items-center justify-between shadow-sm">
        <div>
            <p class="text-[11px] text-muted font-semibold uppercase tracking-wider mb-1">Jejak Perjalanan</p>
            <h2 class="font-display text-2xl md:text-3xl font-bold text-ink">{{ $totalTimelines }}</h2>
        </div>
        <div class="w-11 h-11 rounded-xl bg-accent/10 border border-accent/20 flex items-center justify-center text-accent shrink-0">
            <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </div>
    </div>

    <div class="p-5 rounded-2xl border border-ink/10 bg-ink/[0.03] flex items-center justify-between shadow-sm">
        <div>
            <p class="text-[11px] text-muted font-semibold uppercase tracking-wider mb-1">Pesan Masuk</p>
            <div class="flex items-baseline gap-2">
                <h2 class="font-display text-2xl md:text-3xl font-bold text-ink">{{ $totalMessages }}</h2>
                @if ($unreadMessages > 0)
                    <span class="text-[11px] text-red-500 font-bold">({{ $unreadMessages }} baru)</span>
                @endif
            </div>
        </div>
        <div class="w-11 h-11 rounded-xl bg-accent/10 border border-accent/20 flex items-center justify-center text-accent shrink-0">
            <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
        </div>
    </div>

    <a href="{{ route('admin.comments.index') }}" class="p-5 rounded-2xl border border-ink/10 hover:border-accent/40 bg-ink/[0.03] hover:bg-accent/5 flex items-center justify-between shadow-sm transition-all group">
        <div>
            <p class="text-[11px] text-muted font-semibold uppercase tracking-wider mb-1">Komentar Publik</p>
            <h2 class="font-display text-2xl md:text-3xl font-bold text-accent group-hover:scale-105 transition-transform">{{ $totalComments }}</h2>
        </div>
        <div class="w-11 h-11 rounded-xl bg-accent/10 border border-accent/20 flex items-center justify-center text-accent shrink-0 group-hover:bg-accent group-hover:text-paper transition-colors">
            <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/></svg>
        </div>
    </a>

</div>

{{-- TABLES / RECENT CONTENT --}}
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    
    {{-- RECENT PROJECTS --}}
    <div class="p-6 rounded-3xl border border-ink/10 bg-ink/[0.02]">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h3 class="font-display text-lg font-bold text-ink">Trip Terbaru</h3>
                <p class="text-xs text-muted">Aktivitas terakhir</p>
            </div>
            <a href="{{ route('admin.projects.create') }}" class="px-3 py-1.5 rounded-full bg-accent text-paper text-xs font-semibold hover:bg-accent/90 transition-all shadow-sm">
                + Tambah
            </a>
        </div>

        <div class="space-y-3">
            @forelse ($recentProjects as $project)
                <div class="flex items-center justify-between p-3.5 rounded-2xl border border-ink/10 bg-ink/[0.02] hover:border-accent/30 transition-all">
                    <div class="min-w-0 pr-2">
                        <p class="font-bold text-sm text-ink truncate">{{ $project->title }}</p>
                        <p class="text-xs text-muted mt-0.5 truncate">{{ $project->year }} &bull; {{ $project->role }}</p>
                    </div>
                    <a href="{{ route('admin.projects.edit', $project) }}" class="text-xs text-accent hover:underline font-semibold px-2.5 py-1 rounded-lg border border-accent/20 bg-accent/5 shrink-0">Edit &rarr;</a>
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
                <h3 class="font-display text-lg font-bold text-ink">Pesan Masuk</h3>
                <p class="text-xs text-muted">Inbox pengunjung</p>
            </div>
            <a href="{{ route('admin.messages.index') }}" class="text-xs text-accent hover:underline font-semibold">Semua &rarr;</a>
        </div>

        <div class="space-y-3">
            @forelse ($recentMessages as $msg)
                <div class="p-3.5 rounded-2xl border border-ink/10 bg-ink/[0.02] flex items-start justify-between gap-3 hover:border-accent/30 transition-all">
                    <div class="min-w-0">
                        <div class="flex items-center gap-1.5 mb-1">
                            <span class="font-bold text-sm text-ink truncate">{{ $msg->name }}</span>
                            @if (!$msg->is_read)
                                <span class="px-2 py-0.5 rounded-full bg-accent text-paper text-[9px] font-bold uppercase">Baru</span>
                            @endif
                        </div>
                        <p class="text-xs text-muted line-clamp-1">{{ $msg->message }}</p>
                    </div>
                    <a href="{{ route('admin.messages.show', $msg) }}" class="text-xs text-accent hover:underline font-semibold shrink-0 px-2.5 py-1 rounded-lg border border-accent/20 bg-accent/5">Baca</a>
                </div>
            @empty
                <p class="text-sm text-muted text-center py-6">Belum ada pesan masuk.</p>
            @endforelse
        </div>
    </div>

    {{-- RECENT COMMENTS --}}
    <div class="p-6 rounded-3xl border border-ink/10 bg-ink/[0.02]">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h3 class="font-display text-lg font-bold text-ink">Komentar Publik</h3>
                <p class="text-xs text-muted">Buku tamu website</p>
            </div>
            <a href="{{ route('admin.comments.index') }}" class="text-xs text-accent hover:underline font-semibold">Kelola &rarr;</a>
        </div>

        <div class="space-y-3">
            @forelse ($recentComments as $cmt)
                <div class="p-3.5 rounded-2xl border border-ink/10 bg-ink/[0.02] flex items-start gap-3 hover:border-accent/30 transition-all">
                    <img src="{{ $cmt->avatar ?: 'https://api.dicebear.com/7.x/adventurer/svg?seed=' . urlencode($cmt->name) }}" 
                         alt="{{ $cmt->name }}" 
                         class="w-8 h-8 rounded-lg bg-accent/10 border border-accent/20 object-cover shrink-0 mt-0.5">
                    <div class="min-w-0 flex-1">
                        <div class="flex items-center justify-between gap-1 mb-1">
                            <span class="font-bold text-xs text-ink truncate">{{ $cmt->name }}</span>
                            <span class="text-[10px] text-muted">{{ $cmt->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="text-xs text-muted line-clamp-2">{{ $cmt->message }}</p>
                    </div>
                </div>
            @empty
                <p class="text-sm text-muted text-center py-6">Belum ada komentar publik.</p>
            @endforelse
        </div>
    </div>

</div>

@endsection
