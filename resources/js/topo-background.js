/**
 * ==============================================================================
 * LATAR BELAKANG GARIS KONTUR TOPOGRAFI (TOPOGRAPHIC MAP BACKGROUND)
 * ==============================================================================
 * Medan kontur alami yang bergerak perlahan ("bernapas") menggunakan 
 * noise 3D ringan & algoritma Marching Squares pada Canvas 2D.
 *
 * PENGATURAN KONFIGURASI (Ubah parameter di bawah ini sesuai selera):
 * ==============================================================================
 */
export const TOPO_CONFIG = {
    // 1. KECEPATAN & DINAMIKA MEDAN
    // Kecepatan perubahan kontur terhadap waktu (semakin kecil, semakin lambat & tenang)
    speed: 0.00018,

    // 2. KERAPATAN & STRUKTUR GARIS
    contourCount: 11,        // Jumlah level elevasi kontur yang digambar (misal: 8 - 14)
    indexInterval: 5,        // Setiap kelipatan garis ke-5 digambar tebal (Index Contour)
    noiseScale: 0.0015,      // Skala medan alam (nilai kecil = bukit luas & kontur landai)

    // 3. SUMBER WARNA CSS
    // Pilihan: '--app-ink' (tinta netral kontur peta) atau '--app-accent' (mengikuti warna aksen tema aktif)
    colorVariable: '--app-ink',

    // 4. OPASITAS & KETEBALAN - MODE TERANG (Light Mode)
    lightMode: {
        normalOpacity: 0.08, // Opasitas garis kontur biasa (rentang rekomendasi: 0.06 - 0.12)
        indexOpacity: 0.14,  // Opasitas garis indeks tebal
        normalWidth: 0.85,   // Ketebalan garis biasa (px)
        indexWidth: 1.6,     // Ketebalan garis indeks (px)
    },

    // 5. OPASITAS & KETEBALAN - MODE GELAP (Dark Mode)
    darkMode: {
        normalOpacity: 0.10, // Opasitas garis kontur biasa (rentang rekomendasi: 0.08 - 0.16)
        indexOpacity: 0.18,  // Opasitas garis indeks tebal
        normalWidth: 0.85,   // Ketebalan garis biasa (px)
        indexWidth: 1.6,     // Ketebalan garis indeks (px)
    },

    // 6. PARALLAX TERHADAP SCROLL
    parallaxFactor: 0.035,   // Pergeseran vertikal halus saat halaman di-scroll (maksimal beberapa px)

    // 7. PERFORMA & EFISIENSI
    targetFps: 30,           // Target 30 FPS untuk efisiensi CPU & hemat baterai
    gridSizeDesktop: 28,     // Ukuran sel grid di layar desktop (px)
    gridSizeMobile: 42,      // Ukuran sel grid di layar HP/tablet (px, lebih renggang & ringan)
    maxDpr: 1.5,             // Batas maksimal devicePixelRatio
};

// ==============================================================================
// 3D SIMPLEX NOISE IMPLEMENTATION (Lightweight & Self-Contained)
// ==============================================================================
function createSimplexNoise3D() {
    const p = new Uint8Array(256);
    for (let i = 0; i < 256; i++) p[i] = i;
    
    // Seeded Fisher-Yates shuffle
    let seed = 1337;
    for (let i = 255; i > 0; i--) {
        seed = (seed * 16807) % 2147483647;
        const j = seed % (i + 1);
        const temp = p[i];
        p[i] = p[j];
        p[j] = temp;
    }

    const perm = new Uint8Array(512);
    const gradP = new Float32Array(512 * 3);
    const grad3 = [
        [1, 1, 0], [-1, 1, 0], [1, -1, 0], [-1, -1, 0],
        [1, 0, 1], [-1, 0, 1], [1, 0, -1], [-1, 0, -1],
        [0, 1, 1], [0, -1, 1], [0, 1, -1], [0, -1, -1]
    ];

    for (let i = 0; i < 512; i++) {
        perm[i] = p[i & 255];
        const g = grad3[perm[i] % 12];
        gradP[i * 3] = g[0];
        gradP[i * 3 + 1] = g[1];
        gradP[i * 3 + 2] = g[2];
    }

    const F3 = 1.0 / 3.0;
    const G3 = 1.0 / 6.0;

    return function noise(x, y, z) {
        let n0, n1, n2, n3;
        const s = (x + y + z) * F3;
        const i = Math.floor(x + s);
        const j = Math.floor(y + s);
        const k = Math.floor(z + s);
        const t = (i + j + k) * G3;
        const X0 = i - t;
        const Y0 = j - t;
        const Z0 = k - t;
        const x0 = x - X0;
        const y0 = y - Y0;
        const z0 = z - Z0;

        let i1, j1, k1;
        let i2, j2, k2;
        if (x0 >= y0) {
            if (y0 >= z0) { i1 = 1; j1 = 0; k1 = 0; i2 = 1; j2 = 1; k2 = 0; }
            else if (x0 >= z0) { i1 = 1; j1 = 0; k1 = 0; i2 = 1; j2 = 0; k2 = 1; }
            else { i1 = 0; j1 = 0; k1 = 1; i2 = 1; j2 = 0; k2 = 1; }
        } else {
            if (y0 < z0) { i1 = 0; j1 = 0; k1 = 1; i2 = 0; j2 = 1; k2 = 1; }
            else if (x0 < z0) { i1 = 0; j1 = 1; k1 = 0; i2 = 0; j2 = 1; k2 = 1; }
            else { i1 = 0; j1 = 1; k1 = 0; i2 = 1; j2 = 1; k2 = 0; }
        }

        const x1 = x0 - i1 + G3;
        const y1 = y0 - j1 + G3;
        const z1 = z0 - k1 + G3;
        const x2 = x0 - i2 + 2.0 * G3;
        const y2 = y0 - j2 + 2.0 * G3;
        const z2 = z0 - k2 + 2.0 * G3;
        const x3 = x0 - 1.0 + 3.0 * G3;
        const y3 = y0 - 1.0 + 3.0 * G3;
        const z3 = z0 - 1.0 + 3.0 * G3;

        const ii = i & 255;
        const jj = j & 255;
        const kk = k & 255;

        let t0 = 0.6 - x0 * x0 - y0 * y0 - z0 * z0;
        if (t0 < 0) n0 = 0.0;
        else {
            t0 *= t0;
            const gi0 = (perm[ii + perm[jj + perm[kk]]] % 12) * 3;
            n0 = t0 * t0 * (gradP[gi0] * x0 + gradP[gi0 + 1] * y0 + gradP[gi0 + 2] * z0);
        }

        let t1 = 0.6 - x1 * x1 - y1 * y1 - z1 * z1;
        if (t1 < 0) n1 = 0.0;
        else {
            t1 *= t1;
            const gi1 = (perm[ii + i1 + perm[jj + j1 + perm[kk + k1]]] % 12) * 3;
            n1 = t1 * t1 * (gradP[gi1] * x1 + gradP[gi1 + 1] * y1 + gradP[gi1 + 2] * z1);
        }

        let t2 = 0.6 - x2 * x2 - y2 * y2 - z2 * z2;
        if (t2 < 0) n2 = 0.0;
        else {
            t2 *= t2;
            const gi2 = (perm[ii + i2 + perm[jj + j2 + perm[kk + k2]]] % 12) * 3;
            n2 = t2 * t2 * (gradP[gi2] * x2 + gradP[gi2 + 1] * y2 + gradP[gi2 + 2] * z2);
        }

        let t3 = 0.6 - x3 * x3 - y3 * y3 - z3 * z3;
        if (t3 < 0) n3 = 0.0;
        else {
            t3 *= t3;
            const gi3 = (perm[ii + 1 + perm[jj + 1 + perm[kk + 1]]] % 12) * 3;
            n3 = t3 * t3 * (gradP[gi3] * x3 + gradP[gi3 + 1] * y3 + gradP[gi3 + 2] * z3);
        }

        return 32.0 * (n0 + n1 + n2 + n3);
    };
}

// ==============================================================================
// HELPER: PARSE COLOR TO RGBA
// ==============================================================================
function parseToRgba(colorStr, alpha, fallbackRgb) {
    if (colorStr) {
        colorStr = colorStr.trim();
        if (colorStr.startsWith('#')) {
            let hex = colorStr.slice(1);
            if (hex.length === 3) {
                hex = hex.split('').map(c => c + c).join('');
            }
            if (hex.length >= 6) {
                const r = parseInt(hex.slice(0, 2), 16);
                const g = parseInt(hex.slice(2, 4), 16);
                const b = parseInt(hex.slice(4, 6), 16);
                if (!isNaN(r) && !isNaN(g) && !isNaN(b)) {
                    return `rgba(${r}, ${g}, ${b}, ${alpha})`;
                }
            }
        }
        const rgbMatch = colorStr.match(/rgba?\((\d+),\s*(\d+),\s*(\d+)/i);
        if (rgbMatch) {
            return `rgba(${rgbMatch[1]}, ${rgbMatch[2]}, ${rgbMatch[3]}, ${alpha})`;
        }
    }
    return `rgba(${fallbackRgb[0]}, ${fallbackRgb[1]}, ${fallbackRgb[2]}, ${alpha})`;
}

// ==============================================================================
// TOPOGRAPHIC BACKGROUND INITIALIZER
// ==============================================================================
export function initTopoBackground() {
    const canvas = document.getElementById('topo-canvas');
    if (!canvas || canvas.hasAttribute('data-topo-initialized')) return null;
    canvas.setAttribute('data-topo-initialized', 'true');

    const ctx = canvas.getContext('2d', { alpha: true });
    if (!ctx) return null;

    const noise3D = createSimplexNoise3D();

    let width = 0;
    let height = 0;
    let dpr = 1;
    let cols = 0;
    let rows = 0;
    let cellSize = TOPO_CONFIG.gridSizeDesktop;
    let gridValues = new Float32Array(0);

    // Color cache
    let normalStroke = '';
    let indexStroke = '';
    let normalWidth = 0.85;
    let indexWidth = 1.6;

    // Animation state
    let animFrameId = null;
    let lastFrameTime = 0;
    let scrollY = window.scrollY || 0;
    let isRunning = false;
    const intervalMs = 1000 / TOPO_CONFIG.targetFps;

    // Motion preference
    const motionQuery = window.matchMedia('(prefers-reduced-motion: reduce)');
    let prefersReducedMotion = motionQuery.matches;

    // Levels array (precomputed elevation slices)
    const levels = [];
    const minElev = -0.65;
    const maxElev = 0.65;
    const count = TOPO_CONFIG.contourCount;
    for (let k = 0; k < count; k++) {
        const t = k / (count - 1);
        levels.push(minElev + t * (maxElev - minElev));
    }

    // Refresh colors from document computed style
    function updateColors() {
        const isDark = document.documentElement.classList.contains('dark');
        const style = getComputedStyle(document.documentElement);

        const colorProperty = TOPO_CONFIG.colorVariable || '--app-ink';
        const colorVal = style.getPropertyValue(colorProperty);
        const fallback = isDark ? [244, 245, 247] : [14, 19, 31];

        const cfg = isDark ? TOPO_CONFIG.darkMode : TOPO_CONFIG.lightMode;
        normalStroke = parseToRgba(colorVal, cfg.normalOpacity, fallback);
        indexStroke = parseToRgba(colorVal, cfg.indexOpacity, fallback);
        normalWidth = cfg.normalWidth;
        indexWidth = cfg.indexWidth;
    }

    // Resize and buffer allocation
    function resize() {
        const winW = window.innerWidth;
        const winH = window.innerHeight;
        dpr = Math.min(window.devicePixelRatio || 1, TOPO_CONFIG.maxDpr);

        cellSize = winW < 768 ? TOPO_CONFIG.gridSizeMobile : TOPO_CONFIG.gridSizeDesktop;
        cols = Math.ceil(winW / cellSize) + 1;
        rows = Math.ceil(winH / cellSize) + 1;

        width = winW;
        height = winH;

        canvas.width = Math.round(winW * dpr);
        canvas.height = Math.round(winH * dpr);

        const neededSize = (cols + 1) * (rows + 1);
        if (gridValues.length < neededSize) {
            gridValues = new Float32Array(neededSize);
        }

        updateColors();

        if (prefersReducedMotion) {
            drawFrame(performance.now());
        }
    }

    // Render single topographic frame
    function drawFrame(now) {
        if (!ctx) return;

        // Reset canvas context scale
        ctx.setTransform(1, 0, 0, 1, 0, 0);
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        ctx.scale(dpr, dpr);

        const t = prefersReducedMotion ? 123.45 : now * TOPO_CONFIG.speed;
        const py = scrollY * TOPO_CONFIG.parallaxFactor;
        const scale = TOPO_CONFIG.noiseScale;

        // 1. Fill scalar field
        for (let r = 0; r <= rows; r++) {
            const worldY = (r * cellSize + py) * scale;
            const rOffset = r * (cols + 1);
            for (let c = 0; c <= cols; c++) {
                const worldX = (c * cellSize) * scale;
                // 2 Octaves of organic terrain noise
                const n1 = noise3D(worldX, worldY, t);
                const n2 = noise3D(worldX * 2.2, worldY * 2.2, t * 1.3) * 0.35;
                gridValues[rOffset + c] = (n1 + n2) * 0.74;
            }
        }

        // 2. Marching Squares for each contour level
        // Batch paths into normal lines and index lines to keep draw calls minimal
        for (let l = 0; l < levels.length; l++) {
            const L = levels[l];
            const isIndex = (l + 1) % TOPO_CONFIG.indexInterval === 0 || l === 0;

            ctx.beginPath();
            ctx.strokeStyle = isIndex ? indexStroke : normalStroke;
            ctx.lineWidth = isIndex ? indexWidth : normalWidth;
            ctx.lineCap = 'round';
            ctx.lineJoin = 'round';

            for (let r = 0; r < rows; r++) {
                const y0 = r * cellSize;
                const r0 = r * (cols + 1);
                const r1 = (r + 1) * (cols + 1);

                for (let c = 0; c < cols; c++) {
                    const x0 = c * cellSize;

                    const v0 = gridValues[r0 + c];
                    const v1 = gridValues[r0 + c + 1];
                    const v2 = gridValues[r1 + c + 1];
                    const v3 = gridValues[r1 + c];

                    let cellCase = 0;
                    if (v0 >= L) cellCase |= 8;
                    if (v1 >= L) cellCase |= 4;
                    if (v2 >= L) cellCase |= 2;
                    if (v3 >= L) cellCase |= 1;

                    if (cellCase === 0 || cellCase === 15) continue;

                    const bit3 = (cellCase >> 3) & 1;
                    const bit2 = (cellCase >> 2) & 1;
                    const bit1 = (cellCase >> 1) & 1;
                    const bit0 = cellCase & 1;

                    // Interpolate edge intersection coordinates
                    // Edge 0: Top (v0 -> v1)
                    let p0x = 0, p0y = y0;
                    if (bit3 !== bit2) {
                        const denom = v1 - v0;
                        const tEdge = Math.abs(denom) > 1e-6 ? Math.max(0, Math.min(1, (L - v0) / denom)) : 0.5;
                        p0x = x0 + tEdge * cellSize;
                    }

                    // Edge 1: Right (v1 -> v2)
                    let p1x = x0 + cellSize, p1y = 0;
                    if (bit2 !== bit1) {
                        const denom = v2 - v1;
                        const tEdge = Math.abs(denom) > 1e-6 ? Math.max(0, Math.min(1, (L - v1) / denom)) : 0.5;
                        p1y = y0 + tEdge * cellSize;
                    }

                    // Edge 2: Bottom (v3 -> v2)
                    let p2x = 0, p2y = y0 + cellSize;
                    if (bit1 !== bit0) {
                        const denom = v2 - v3;
                        const tEdge = Math.abs(denom) > 1e-6 ? Math.max(0, Math.min(1, (L - v3) / denom)) : 0.5;
                        p2x = x0 + tEdge * cellSize;
                    }

                    // Edge 3: Left (v0 -> v3)
                    let p3x = x0, p3y = 0;
                    if (bit3 !== bit0) {
                        const denom = v3 - v0;
                        const tEdge = Math.abs(denom) > 1e-6 ? Math.max(0, Math.min(1, (L - v0) / denom)) : 0.5;
                        p3y = y0 + tEdge * cellSize;
                    }

                    // Connect edges based on marching squares lookup
                    switch (cellCase) {
                        case 1:  // 3 -> 2
                        case 14:
                            ctx.moveTo(p3x, p3y); ctx.lineTo(p2x, p2y);
                            break;
                        case 2:  // 2 -> 1
                        case 13:
                            ctx.moveTo(p2x, p2y); ctx.lineTo(p1x, p1y);
                            break;
                        case 3:  // 3 -> 1
                        case 12:
                            ctx.moveTo(p3x, p3y); ctx.lineTo(p1x, p1y);
                            break;
                        case 4:  // 0 -> 1
                        case 11:
                            ctx.moveTo(p0x, p0y); ctx.lineTo(p1x, p1y);
                            break;
                        case 5: { // Saddle
                            const vc = (v0 + v1 + v2 + v3) * 0.25;
                            if (vc >= L) {
                                ctx.moveTo(p0x, p0y); ctx.lineTo(p3x, p3y);
                                ctx.moveTo(p1x, p1y); ctx.lineTo(p2x, p2y);
                            } else {
                                ctx.moveTo(p0x, p0y); ctx.lineTo(p1x, p1y);
                                ctx.moveTo(p3x, p3y); ctx.lineTo(p2x, p2y);
                            }
                            break;
                        }
                        case 6:  // 0 -> 2
                        case 9:
                            ctx.moveTo(p0x, p0y); ctx.lineTo(p2x, p2y);
                            break;
                        case 7:  // 0 -> 3
                        case 8:
                            ctx.moveTo(p0x, p0y); ctx.lineTo(p3x, p3y);
                            break;
                        case 10: { // Saddle
                            const vc = (v0 + v1 + v2 + v3) * 0.25;
                            if (vc >= L) {
                                ctx.moveTo(p0x, p0y); ctx.lineTo(p1x, p1y);
                                ctx.moveTo(p3x, p3y); ctx.lineTo(p2x, p2y);
                            } else {
                                ctx.moveTo(p0x, p0y); ctx.lineTo(p3x, p3y);
                                ctx.moveTo(p1x, p1y); ctx.lineTo(p2x, p2y);
                            }
                            break;
                        }
                    }
                }
            }
            ctx.stroke();
        }
    }

    // Main animation loop throttled to 30 FPS
    function loop(now) {
        if (!isRunning) return;

        const delta = now - lastFrameTime;
        if (delta >= intervalMs) {
            lastFrameTime = now - (delta % intervalMs);
            drawFrame(now);
        }

        animFrameId = requestAnimationFrame(loop);
    }

    function start() {
        if (isRunning || prefersReducedMotion) return;
        isRunning = true;
        lastFrameTime = performance.now();
        animFrameId = requestAnimationFrame(loop);
    }

    function stop() {
        isRunning = false;
        if (animFrameId) {
            cancelAnimationFrame(animFrameId);
            animFrameId = null;
        }
    }

    // Scroll listener with passive flag
    function onScroll() {
        scrollY = window.scrollY || 0;
        if (prefersReducedMotion) {
            drawFrame(performance.now());
        }
    }

    // Visibility change handler (pause animation when tab is inactive)
    function onVisibilityChange() {
        if (document.hidden) {
            stop();
        } else if (!prefersReducedMotion) {
            start();
        }
    }

    // Motion preference change handler
    function onMotionChange(e) {
        prefersReducedMotion = e.matches;
        if (prefersReducedMotion) {
            stop();
            drawFrame(performance.now());
        } else {
            start();
        }
    }

    // Theme mutation observer (dark mode / color theme changes)
    const themeObserver = new MutationObserver(() => {
        updateColors();
        if (prefersReducedMotion) {
            drawFrame(performance.now());
        }
    });

    themeObserver.observe(document.documentElement, {
        attributes: true,
        attributeFilter: ['class', 'data-color']
    });

    const onCustomColorChange = () => {
        updateColors();
        if (prefersReducedMotion) drawFrame(performance.now());
    };

    let resizeTimer = null;
    function onResize() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(resize, 100);
    }

    // Register event listeners
    window.addEventListener('resize', onResize, { passive: true });
    window.addEventListener('scroll', onScroll, { passive: true });
    document.addEventListener('visibilitychange', onVisibilityChange);
    window.addEventListener('public-color-theme-changed', onCustomColorChange);
    motionQuery.addEventListener('change', onMotionChange);

    // Initial setup
    resize();
    if (prefersReducedMotion) {
        drawFrame(performance.now());
    } else {
        start();
    }

    // Return cleanup/destroy function to prevent any memory leak
    return function destroy() {
        stop();
        window.removeEventListener('resize', onResize);
        window.removeEventListener('scroll', onScroll);
        document.removeEventListener('visibilitychange', onVisibilityChange);
        window.removeEventListener('public-color-theme-changed', onCustomColorChange);
        motionQuery.removeEventListener('change', onMotionChange);
        themeObserver.disconnect();
        canvas.removeAttribute('data-topo-initialized');
    };
}
