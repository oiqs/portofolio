@props(['project'])

<a href="{{ url('/projects/'.$project['slug']) }}"
   class="group block bg-ink/5 border border-ink/5 rounded-2xl overflow-hidden hover:border-accent/30 hover:bg-ink/10 transition-all duration-500 hover:-translate-y-1 hover:shadow-lg hover:shadow-accent/5 flex flex-col justify-between">
    <div>
        <div class="aspect-[4/3] bg-ink/10 overflow-hidden relative">
            @if (!empty($project['cover_image']))
                <img src="{{ asset('storage/'.$project['cover_image']) }}" 
                     alt="{{ $project['title'] }}" 
                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
            @else
                <div class="w-full h-full bg-gradient-to-br from-accent/20 via-ink/5 to-accent/5 flex items-center justify-center text-accent/40">
                    <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                    </svg>
                </div>
            @endif
            <div class="absolute inset-0 bg-gradient-to-t from-paper/30 via-transparent to-transparent opacity-60"></div>
        </div>
        
        <div class="p-6">
            <div class="flex items-center justify-between mb-3">
                <h3 class="font-display text-xl group-hover:text-accent transition-colors duration-300">
                    {{ $project['title'] }}
                </h3>
                <span class="text-xs text-accent font-medium tracking-wide uppercase">{{ $project['year'] }}</span>
            </div>
            <p class="text-sm text-muted mb-5 leading-relaxed">{{ $project['description'] }}</p>
        </div>
    </div>

    <div class="px-6 pb-6 pt-0">
        <div class="flex flex-wrap gap-2">
            @foreach ((array)$project['stack'] as $tech)
                <span class="text-[11px] px-3 py-1 rounded-full border border-ink/10 text-muted uppercase tracking-wider">{{ $tech }}</span>
            @endforeach
        </div>
    </div>
</a>