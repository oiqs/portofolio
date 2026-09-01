@props(['project'])

@php
    $galleryImages = is_array($project['gallery_images'] ?? null) ? $project['gallery_images'] : [];
    $totalPhotos = count($galleryImages) + (!empty($project['cover_image']) ? 1 : 0);
    $location = $project['location_address'] ?? null;
@endphp

<a href="{{ url('/projects/'.$project['slug']) }}"
   class="group block bg-ink/5 dark:bg-white/[0.03] border border-ink/10 dark:border-white/10 rounded-3xl overflow-hidden hover:border-accent/40 hover:bg-ink/[0.08] dark:hover:bg-white/[0.06] transition-all duration-500 hover:-translate-y-1.5 hover:shadow-2xl hover:shadow-accent/10 flex flex-col justify-between">
    <div>
        <div class="aspect-[4/3] bg-ink/10 dark:bg-white/5 overflow-hidden relative">
            @if (!empty($project['cover_image']))
                <img src="{{ asset('storage/'.$project['cover_image']) }}" 
                     alt="{{ $project['title'] }}" 
                     loading="lazy"
                     class="w-full h-full object-cover group-hover:scale-108 transition-transform duration-700 ease-out">
            @else
                <div class="w-full h-full bg-gradient-to-br from-accent/20 via-ink/5 to-accent/5 flex flex-col items-center justify-center text-accent/40">
                    <svg class="w-12 h-12 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                    </svg>
                    <span class="text-xs font-medium">Foto Perjalanan</span>
                </div>
            @endif

            {{-- Vignette Overlay --}}
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-black/20 opacity-70 group-hover:opacity-40 transition-opacity duration-500"></div>

            {{-- Top Badges --}}
            <div class="absolute top-4 left-4 right-4 flex items-center justify-between pointer-events-none">
                <span class="px-3 py-1 rounded-full bg-black/40 backdrop-blur-md border border-white/20 text-white text-[11px] font-semibold tracking-wider uppercase">
                    {{ $project['year'] }}
                </span>

                @if ($totalPhotos > 0)
                    <span class="px-3 py-1 rounded-full bg-accent/90 backdrop-blur-md text-paper text-[11px] font-bold tracking-wide flex items-center gap-1.5 shadow-md">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0c-.693.04-1.33.435-1.736 1.039l-.821 1.316z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                        </svg>
                        {{ $totalPhotos }} Foto
                    </span>
                @endif
            </div>

            {{-- Location Badge at Bottom of Image if available --}}
            @if ($location)
                <div class="absolute bottom-3 left-4 right-4 text-white text-xs font-medium flex items-center gap-1.5 truncate">
                    <svg class="w-3.5 h-3.5 text-accent shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                    </svg>
                    <span class="truncate opacity-90">{{ $location }}</span>
                </div>
            @endif
        </div>
        
        <div class="p-6">
            <div class="flex items-center justify-between mb-2">
                <h3 class="font-display text-xl sm:text-2xl font-bold group-hover:text-accent transition-colors duration-300">
                    {{ $project['title'] }}
                </h3>
            </div>
            <p class="text-sm text-muted line-clamp-2 leading-relaxed mb-4">{{ $project['description'] }}</p>
        </div>
    </div>

    <div class="px-6 pb-6 pt-0 flex items-center justify-between border-t border-ink/5 dark:border-white/5 pt-4 mt-auto">
        <div class="flex flex-wrap gap-1.5">
            @foreach (array_slice((array)$project['stack'], 0, 3) as $tech)
                <span class="text-[10px] px-2.5 py-0.5 rounded-full bg-ink/5 dark:bg-white/10 text-muted uppercase font-semibold tracking-wider">{{ $tech }}</span>
            @endforeach
            @if (count((array)$project['stack']) > 3)
                <span class="text-[10px] px-2 py-0.5 rounded-full bg-ink/5 dark:bg-white/10 text-muted">+{{ count((array)$project['stack']) - 3 }}</span>
            @endif
        </div>
        
        <span class="text-xs font-semibold text-accent group-hover:translate-x-1 transition-transform duration-300 flex items-center gap-1">
            Lihat &rarr;
        </span>
    </div>
</a>