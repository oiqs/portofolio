<div class="relative flex flex-col items-center justify-center select-none py-4 w-full max-w-[420px] mx-auto" id="id-card-wrapper">
    
    {{-- ANCHOR CLIP & REEL (BAGIAN ATAS KLIP ID CARD) --}}
    <div class="relative z-20 flex flex-col items-center pointer-events-none" id="reel-anchor">
        {{-- Pocket / Clip Holder Box --}}
        <div class="px-6 py-2 rounded-xl bg-accent text-paper shadow-md flex items-center justify-center border border-white/20 z-10 min-w-[70px]">
            <span class="w-2.5 h-2.5 rounded-full bg-white animate-ping"></span>
        </div>
        
        {{-- Realistic 3D Retractable Reel Badge Button --}}
        <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-gradient-to-b from-slate-100 via-slate-200 to-slate-400 dark:from-slate-200 dark:via-slate-300 dark:to-slate-600 border-2 border-slate-300 dark:border-slate-500 shadow-xl -mt-4 flex items-center justify-center relative z-20" id="reel-button">
            {{-- Inner Bevel & Core Circle --}}
            <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-gradient-to-b from-accent/30 via-accent/50 to-accent/80 border-2 border-white/80 dark:border-white/90 shadow-inner flex items-center justify-center">
                {{-- Reel Cord Exit Hole --}}
                <div class="w-3 h-3 rounded-full bg-slate-800 dark:bg-slate-900 border border-slate-600 shadow-inner relative flex items-center justify-center" id="reel-exit-hole">
                    <div class="w-1 h-1 rounded-full bg-black"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- DYNAMIC SVG NYLON RETRACTABLE CORD (REAL LIFE CORD) --}}
    <svg class="absolute inset-0 w-full h-full pointer-events-none overflow-visible z-15" id="reel-svg-overlay">
        <defs>
            <filter id="cord-shadow" x="-20%" y="-20%" width="140%" height="140%">
                <feDropShadow dx="1" dy="2" stdDeviation="1" flood-opacity="0.4" />
            </filter>
        </defs>
        {{-- Retractable Thin Black/Nylon Cord Line --}}
        <line id="reel-nylon-cord" 
              x1="0" y1="0" x2="0" y2="0" 
              stroke="#0F172A" stroke-width="2.5" stroke-linecap="round" 
              class="dark:stroke-slate-200" 
              filter="url(#cord-shadow)" />
    </svg>

    {{-- DRAGGABLE ID CARD CONTAINER WITH PHYSICS --}}
    <div id="draggable-id-card" 
         class="relative z-10 w-full max-w-[340px] sm:max-w-[400px] cursor-grab active:cursor-grabbing origin-top transition-shadow duration-300 mt-2">
        
        {{-- REAL LIFE CLEAR VINYL STRAP & METAL RIVET SNAP BUTTON --}}
        <div class="absolute -top-7 left-1/2 -translate-x-1/2 z-20 flex flex-col items-center pointer-events-none" id="card-strap-attachment">
            <div class="w-4 sm:w-5 h-8 bg-gradient-to-b from-white/90 via-white/60 to-white/95 dark:from-white/50 dark:to-white/70 border-x border-white/40 rounded-sm flex items-center justify-center shadow-md">
                {{-- Metal Rivet Snap Button --}}
                <div class="w-3 h-3 rounded-full bg-gradient-to-b from-slate-200 to-slate-400 border border-slate-500 shadow-inner flex items-center justify-center">
                    <div class="w-1.5 h-1.5 rounded-full bg-slate-600"></div>
                </div>
            </div>
        </div>

        {{-- ACRYLIC TRANSPARENT ID CARD HOLDER FRAME --}}
        <div class="relative rounded-[2rem] p-4 sm:p-5 bg-white/20 dark:bg-slate-900/40 backdrop-blur-xl border-2 border-white/50 dark:border-white/20 shadow-2xl shadow-black/30 overflow-hidden group">
            
            {{-- Acrylic Side & Top Clips Simulation --}}
            <div class="absolute top-2.5 left-1/2 -translate-x-1/2 w-12 h-1.5 rounded-full bg-slate-400/40 dark:bg-white/30"></div>
            <div class="absolute top-1/3 left-0 w-2 h-7 rounded-r-md bg-slate-400/40 dark:bg-white/30"></div>
            <div class="absolute top-1/3 right-0 w-2 h-7 rounded-l-md bg-slate-400/40 dark:bg-white/30"></div>
            <div class="absolute bottom-1/3 left-0 w-2 h-7 rounded-r-md bg-slate-400/40 dark:bg-white/30"></div>
            <div class="absolute bottom-1/3 right-0 w-2 h-7 rounded-l-md bg-slate-400/40 dark:bg-white/30"></div>

            {{-- Hologram / Metallic Reflection Effect --}}
            <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white/15 to-transparent pointer-events-none group-hover:opacity-100 transition-opacity duration-500"></div>

            {{-- INNER ID CARD CONTENT --}}
            <div class="rounded-2xl p-5 sm:p-6 bg-paper dark:bg-slate-950 border border-ink/10 dark:border-white/10 shadow-inner text-center relative overflow-hidden flex flex-col items-center">
                
                {{-- Metallic Hologram Header Strip --}}
                <div class="w-full py-1.5 px-3.5 rounded-xl bg-gradient-to-r from-accent/30 via-accent/10 to-accent/30 border border-accent/20 mb-4 flex items-center justify-between">
                    <span class="text-[10px] font-bold tracking-widest uppercase text-accent">RA TRIP RA SMILE</span>
                    <div class="flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-accent animate-pulse"></span>
                        <span class="text-[9px] font-bold uppercase text-accent tracking-wider">VERIFIED</span>
                    </div>
                </div>

                {{-- PROFILE PHOTO --}}
                <div class="relative w-48 h-48 sm:w-60 sm:h-60 rounded-2xl overflow-hidden border-2 border-accent/40 shadow-xl mb-4 group/photo">
                    <img src="{{ asset('images/profile.jpeg') }}" 
                         alt="Foto Thoriq Alfurqan M.L" 
                         class="w-full h-full object-cover filter grayscale contrast-110 group-hover/photo:grayscale-0 group-hover/photo:scale-105 transition-all duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent"></div>
                    <span class="absolute bottom-2.5 left-3 px-3 py-0.5 rounded-md bg-black/60 text-white text-[11px] font-mono tracking-wider">@oiq_s</span>
                </div>

                {{-- USER DETAILS --}}
                <h3 class="font-display text-xl sm:text-2xl font-bold tracking-tight text-ink dark:text-white leading-tight">
                    Thoriq Alfurqan M.L
                </h3>
                <p class="text-xs sm:text-sm font-semibold text-accent mt-1">Traveler & Healing Enthusiast</p>

                {{-- DECORATIVE BARCODE & SERIAL NO --}}
                <div class="mt-5 pt-4 border-t border-ink/10 dark:border-white/10 w-full flex items-center justify-between">
                    <div class="flex gap-0.5 items-center h-5 opacity-70">
                        <div class="w-0.5 h-full bg-ink dark:bg-white"></div>
                        <div class="w-1 h-full bg-ink dark:bg-white"></div>
                        <div class="w-0.5 h-full bg-ink dark:bg-white"></div>
                        <div class="w-1.5 h-full bg-ink dark:bg-white"></div>
                        <div class="w-0.5 h-full bg-ink dark:bg-white"></div>
                        <div class="w-1 h-full bg-ink dark:bg-white"></div>
                        <div class="w-0.5 h-full bg-ink dark:bg-white"></div>
                        <div class="w-1.5 h-full bg-ink dark:bg-white"></div>
                    </div>
                    <span class="text-[10px] font-mono text-muted">ID: 2026-OIQS-8890</span>
                </div>
            </div>

        </div>
    </div>
</div>

{{-- PHYSICS INTERACTIVE DRAG & REAL LIFE RETRACTABLE CORD SCRIPT --}}
<script>
document.addEventListener('DOMContentLoaded', () => {
    const card = document.getElementById('draggable-id-card');
    const wrapper = document.getElementById('id-card-wrapper');
    const exitHole = document.getElementById('reel-exit-hole');
    const attachment = document.getElementById('card-strap-attachment');
    const cordLine = document.getElementById('reel-nylon-cord');

    if (!card || !wrapper || !cordLine) return;

    let isDragging = false;
    let startX = 0, startY = 0;
    let currentX = 0, currentY = 0;
    let targetX = 0, targetY = 0;

    // Physics spring parameters
    let vx = 0, vy = 0;
    let rotation = 0, vr = 0;
    const stiffness = 0.15;
    const damping = 0.84;

    // Ambient Idle Sway Parameters
    let time = 0;

    // Mouse & Touch down
    function onStart(e) {
        isDragging = true;
        const clientX = e.touches ? e.touches[0].clientX : e.clientX;
        const clientY = e.touches ? e.touches[0].clientY : e.clientY;

        startX = clientX - currentX;
        startY = clientY - currentY;

        card.style.cursor = 'grabbing';
    }

    // Mouse & Touch move
    function onMove(e) {
        if (!isDragging) return;

        const clientX = e.touches ? e.touches[0].clientX : e.clientX;
        const clientY = e.touches ? e.touches[0].clientY : e.clientY;

        targetX = clientX - startX;
        targetY = clientY - startY;

        // Expanded max drag distance to allow pulling far across screen (650px radius)
        const maxDist = 650;
        const dist = Math.hypot(targetX, targetY);
        if (dist > maxDist) {
            targetX = (targetX / dist) * maxDist;
            targetY = (targetY / dist) * maxDist;
        }

        // Calculate dynamic tilt rotation angle based on horizontal displacement
        rotation = targetX * 0.12;
    }

    // Mouse & Touch release
    function onEnd() {
        if (!isDragging) return;
        isDragging = false;
        card.style.cursor = 'grab';
        targetX = 0;
        targetY = 0;
    }

    // Event Listeners
    card.addEventListener('mousedown', onStart);
    window.addEventListener('mousemove', onMove);
    window.addEventListener('mouseup', onEnd);

    card.addEventListener('touchstart', onStart, { passive: true });
    window.addEventListener('touchmove', onMove, { passive: true });
    window.addEventListener('touchend', onEnd);

    // Update SVG Nylon Cord Coordinates in Real Time
    function updateCordSVG() {
        if (!wrapper || !exitHole || !attachment || !cordLine) return;

        const wrapperRect = wrapper.getBoundingClientRect();
        const exitRect = exitHole.getBoundingClientRect();
        const attachRect = attachment.getBoundingClientRect();

        // Calculate exact center coordinates relative to wrapper SVG
        const x1 = (exitRect.left + exitRect.width / 2) - wrapperRect.left;
        const y1 = (exitRect.top + exitRect.height / 2) - wrapperRect.top;

        const x2 = (attachRect.left + attachRect.width / 2) - wrapperRect.left;
        const y2 = (attachRect.top + attachRect.height / 2) - wrapperRect.top;

        cordLine.setAttribute('x1', x1);
        cordLine.setAttribute('y1', y1);
        cordLine.setAttribute('x2', x2);
        cordLine.setAttribute('y2', y2);
    }

    // Main Physics Animation Loop
    function updatePhysics() {
        if (isDragging) {
            // Smoothly move towards drag target
            currentX += (targetX - currentX) * 0.35;
            currentY += (targetY - currentY) * 0.35;
        } else {
            // Spring recoil return physics back to origin (0, 0)
            const ax = (0 - currentX) * stiffness;
            const ay = (0 - currentY) * stiffness;
            vx = (vx + ax) * damping;
            vy = (vy + ay) * damping;

            currentX += vx;
            currentY += vy;

            // Pendulum rotational spring return
            const ar = (-currentX * 0.15 - rotation) * stiffness;
            vr = (vr + ar) * damping;
            rotation += vr;

            // Ambient gentle idle sway when stationary
            time += 0.04;
            if (Math.abs(currentX) < 1 && Math.abs(currentY) < 1) {
                rotation += Math.sin(time) * 0.15;
            }
        }

        // Apply 3D Transform to ID Card
        card.style.transform = `translate3d(${currentX}px, ${currentY}px, 0) rotate(${rotation}deg)`;

        // Update SVG retractable cord string
        updateCordSVG();

        requestAnimationFrame(updatePhysics);
    }

    requestAnimationFrame(updatePhysics);
});
</script>
