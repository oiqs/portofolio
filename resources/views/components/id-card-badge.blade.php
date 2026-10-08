<div class="relative flex flex-col items-center justify-center select-none py-2 w-full max-w-[420px] mx-auto" id="id-card-wrapper">
    
    {{-- REALISTIC FABRIC LANYARD & 3D RETRACTABLE REEL ASSEMBLY --}}
    <div class="relative z-20 flex flex-col items-center pointer-events-none w-full" id="reel-anchor">
        
        {{-- 1. WOVEN FABRIC LANYARD STRAP (TALI FABRIC LANYARD DARI ATAS) --}}
        <div class="relative flex justify-center items-center -mt-6 mb-0.5">
            {{-- Left Strap Strand --}}
            <div class="w-8 sm:w-9 h-18 sm:h-22 bg-gradient-to-b from-accent/90 via-accent to-accent-dark shadow-lg transform -rotate-12 translate-x-3.5 origin-top border-x border-white/30 dark:border-white/20 rounded-t-sm flex items-center justify-center text-[9px] font-bold text-white/90 tracking-widest uppercase select-none overflow-hidden">
                <span class="[writing-mode:vertical-lr] rotate-180 opacity-90 font-mono tracking-wider">OIQS</span>
            </div>
            
            {{-- Right Strap Strand --}}
            <div class="w-8 sm:w-9 h-18 sm:h-22 bg-gradient-to-b from-accent/90 via-accent to-accent-dark shadow-lg transform rotate-12 -translate-x-3.5 origin-top border-x border-white/30 dark:border-white/20 rounded-t-sm flex items-center justify-center text-[9px] font-bold text-white/90 tracking-widest uppercase select-none overflow-hidden">
                <span class="[writing-mode:vertical-lr] opacity-90 font-mono tracking-wider">TRIP</span>
            </div>

            {{-- 2. METALLIC STRAP SLEEVE CLAMP (PENJEPIT LOGAM LANYARD) --}}
            <div class="absolute bottom-0 z-30 w-10 h-5 rounded-sm bg-gradient-to-r from-slate-300 via-slate-100 to-slate-400 border border-slate-400 shadow-md flex flex-col items-center justify-center">
                <div class="w-8 h-1 bg-slate-500/40 rounded-sm border-t border-slate-600/50"></div>
                <div class="w-8 h-1 bg-slate-500/40 rounded-sm border-t border-slate-600/50 mt-0.5"></div>
            </div>
        </div>

        {{-- 3. CHROME METAL SWIVEL SNAP HOOK & D-RING (GANTOUNGAN HOOK STAINLESS) --}}
        <div class="relative z-20 flex flex-col items-center -mt-0.5">
            {{-- D-Ring Metallic Ring --}}
            <div class="w-6 h-3 rounded-t-full border-2 border-slate-300 bg-gradient-to-b from-slate-200 via-slate-100 to-slate-400 shadow-sm"></div>
            {{-- Swivel Lobster Hook --}}
            <div class="w-4.5 h-5 -mt-1 rounded-b-md bg-gradient-to-b from-slate-100 via-slate-300 to-slate-500 border border-slate-400 shadow-md flex items-center justify-center">
                <div class="w-1.5 h-3 bg-slate-600/50 rounded-full border border-slate-400/40"></div>
            </div>
        </div>
        
        {{-- 4. REALISTIC 3D RETRACTABLE BADGE REEL (GULUNGAN YO-YO ID CARD 3D) --}}
        <div class="relative z-20 -mt-1 flex flex-col items-center">
            {{-- Outer Reel Metallic Body --}}
            <div class="relative w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-gradient-to-b from-slate-100 via-slate-300 to-slate-500 dark:from-slate-200 dark:via-slate-400 dark:to-slate-700 p-1 border border-slate-300 dark:border-slate-500 shadow-2xl flex items-center justify-center" id="reel-button">
                
                {{-- Rear Metallic Spring Clip (Pena Penjepit Belakang) --}}
                <div class="absolute -right-1 top-1/2 -translate-y-1/2 w-2 h-10 bg-gradient-to-r from-slate-300 to-slate-500 rounded-r-md border border-slate-400 shadow-sm"></div>

                {{-- Inner Bevel Disk & Epoxy Glossy Face --}}
                <div class="w-full h-full rounded-full bg-gradient-to-b from-slate-900 via-slate-800 to-slate-950 p-1.5 border border-slate-700/80 shadow-inner flex items-center justify-center relative overflow-hidden">
                    
                    {{-- Glossy Epoxy Reflection Arc --}}
                    <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white/25 to-transparent rounded-full pointer-events-none"></div>

                    {{-- Inner Metallic Emblem --}}
                    <div class="w-9 h-9 sm:w-11 sm:h-11 rounded-full bg-gradient-to-br from-accent/90 via-accent to-accent-dark border-2 border-white/80 dark:border-white/90 shadow-md flex items-center justify-center text-white">
                        {{-- Compass / Healing Emblem --}}
                        <svg class="w-5 h-5 text-white drop-shadow-sm" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9 9 0 100-18 9 9 0 000 18z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 13.5l1.8-4.5 4.5-1.8-1.8 4.5-4.5 1.8z" />
                        </svg>
                    </div>
                </div>
            </div>

            {{-- 5. REEL STAINLESS CORD NOZZLE EXIT (CORONG OUTLET TALI RETRACTABLE) --}}
            <div class="w-4 h-3.5 -mt-1 bg-gradient-to-b from-slate-300 via-slate-100 to-slate-500 rounded-b-md border border-slate-400 shadow-md flex items-center justify-center relative z-20" id="reel-exit-hole">
                <div class="w-2 h-2 rounded-full bg-slate-950 border border-slate-700 shadow-inner flex items-center justify-center">
                    <div class="w-1 h-1 rounded-full bg-black"></div>
                </div>
            </div>
        </div>

    </div>

    {{-- DYNAMIC SVG KEVLAR/NYLON RETRACTABLE CORD --}}
    <svg class="absolute inset-0 w-full h-full pointer-events-none overflow-visible z-15" id="reel-svg-overlay">
        <defs>
            <filter id="cord-shadow" x="-30%" y="-30%" width="160%" height="160%">
                <feDropShadow dx="1.5" dy="2.5" stdDeviation="1.2" flood-opacity="0.5" />
            </filter>
        </defs>
        {{-- Retractable Thin Black/Nylon Cord Line --}}
        <line id="reel-nylon-cord" 
              x1="0" y1="0" x2="0" y2="0" 
              stroke="#0F172A" stroke-width="2.8" stroke-linecap="round" 
              class="dark:stroke-slate-100" 
              filter="url(#cord-shadow)" />
    </svg>

    {{-- DRAGGABLE ID CARD CONTAINER WITH PHYSICS --}}
    <div id="draggable-id-card" 
         class="relative z-10 w-full max-w-[340px] sm:max-w-[400px] cursor-grab active:cursor-grabbing origin-top transition-shadow duration-300 mt-2">
        
        {{-- REAL LIFE TRANSPARENT VINYL STRAP & STAINLESS RIVET SNAP BUTTON --}}
        <div class="absolute -top-10 left-1/2 -translate-x-1/2 z-20 flex flex-col items-center pointer-events-none" id="card-strap-attachment">
            {{-- Clear Vinyl Strap Loop (PVC Transparan) --}}
            <div class="w-5 sm:w-6 h-12 bg-white/50 dark:bg-white/20 backdrop-blur-md border border-white/70 dark:border-white/40 rounded-t-sm rounded-b-md flex flex-col items-center justify-between py-1 shadow-lg relative">
                
                {{-- Metallic Rivet Snap Button (Top Stud) --}}
                <div class="w-3.5 h-3.5 rounded-full bg-gradient-to-b from-slate-100 via-slate-300 to-slate-500 border border-slate-400 shadow-md flex items-center justify-center relative z-10">
                    <div class="w-1.5 h-1.5 rounded-full bg-slate-700"></div>
                </div>
                
                {{-- Clear PVC Overlap Seam Line --}}
                <div class="w-full h-[1px] bg-white/60"></div>

                {{-- Metallic Rivet Base Stud --}}
                <div class="w-3.5 h-3.5 rounded-full bg-gradient-to-b from-slate-200 via-slate-400 to-slate-600 border border-slate-500 shadow-inner flex items-center justify-center">
                    <div class="w-1 h-1 rounded-full bg-slate-800"></div>
                </div>
            </div>
        </div>

        {{-- ACRYLIC TRANSPARENT ID CARD HOLDER FRAME --}}
        <div class="relative rounded-[2rem] p-4 sm:p-5 bg-white/20 dark:bg-slate-900/40 backdrop-blur-xl border-2 border-white/50 dark:border-white/20 shadow-2xl shadow-black/30 overflow-hidden group pt-7">
            
            {{-- Acrylic Top Center Oval Slot Hole Cutout (Lubang Gantung Slot ID Card) --}}
            <div class="absolute top-3 left-1/2 -translate-x-1/2 w-12 h-3.5 rounded-full bg-slate-900/70 dark:bg-slate-950/80 border border-white/40 dark:border-white/20 shadow-inner flex items-center justify-center pointer-events-none">
                <div class="w-10 h-2 rounded-full bg-black/60 border border-black/80"></div>
            </div>

            {{-- Acrylic Side Clip Rubber Bumper Simulation --}}
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
