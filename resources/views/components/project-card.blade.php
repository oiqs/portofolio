@props(['project'])

<a href="{{ url('/projects/'.$project['slug']) }}"
   class="group block bg-ink/5 border border-ink/5 rounded-2xl overflow-hidden hover:border-accent/30 hover:bg-ink/10 transition-all duration-500 hover:-translate-y-1 hover:shadow-lg hover:shadow-accent/5">
    <div class="aspect-[4/3] bg-ink/10 overflow-hidden relative">
        <div class="absolute inset-0 bg-gradient-to-t from-paper/20 to-transparent"></div>
    </div>
    <div class="p-6">
        <div class="flex items-center justify-between mb-3">
            <h3 class="font-display text-xl group-hover:text-accent transition-colors duration-300">
                {{ $project['title'] }}
            </h3>
            <span class="text-xs text-accent font-medium tracking-wide uppercase">{{ $project['year'] }}</span>
        </div>
        <p class="text-sm text-muted mb-5 leading-relaxed">{{ $project['description'] }}</p>
        <div class="flex flex-wrap gap-2">
            @foreach ($project['stack'] as $tech)
                <span class="text-[11px] px-3 py-1 rounded-full border border-ink/10 text-muted uppercase tracking-wider">{{ $tech }}</span>
            @endforeach
        </div>
    </div>
</a>