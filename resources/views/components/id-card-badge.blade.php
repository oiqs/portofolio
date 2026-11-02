<div class="relative w-full max-w-[340px] sm:max-w-[360px] h-[500px] sm:h-[540px] md:h-[580px] flex items-center justify-center select-none" id="lanyard-mount-point">
    {{-- Extended canvas container that gives wide headroom on all sides so the 3D card is never clipped when dragged or swinging --}}
    <div id="lanyard-card-container" 
         class="absolute z-20 pointer-events-none select-none overflow-visible flex items-center justify-center"
         style="width: 880px; height: 750px; left: 50%; top: 50%; transform: translate(-50%, -50%);">
        {{-- Three.js WebGL Canvas will mount here --}}
    </div>
</div>
