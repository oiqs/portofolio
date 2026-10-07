<div id="custom-cursor-dot" 
     class="fixed top-0 left-0 w-3 h-3 bg-accent rounded-full pointer-events-none z-[9999] -translate-x-1/2 -translate-y-1/2 transition-transform duration-75 ease-out opacity-0 hidden md:block shadow-[0_0_12px_var(--app-accent)]"></div>

<div id="custom-cursor-ring" 
     class="fixed top-0 left-0 w-10 h-10 border-2 border-accent/60 dark:border-accent/80 rounded-full pointer-events-none z-[9998] -translate-x-1/2 -translate-y-1/2 transition-opacity duration-300 ease-out opacity-0 hidden md:block backdrop-blur-[1px] bg-accent/5"></div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // Only run on fine pointer devices (desktop with mouse)
    if (!window.matchMedia('(pointer: fine)').matches) return;

    const dot = document.getElementById('custom-cursor-dot');
    const ring = document.getElementById('custom-cursor-ring');

    if (!dot || !ring) return;

    let mouseX = -100;
    let mouseY = -100;
    let ringX = -100;
    let ringY = -100;
    let isHovered = false;
    let isMouseDown = false;

    // Show cursor on first mousemove
    window.addEventListener('mousemove', (e) => {
        mouseX = e.clientX;
        mouseY = e.clientY;

        if (dot.classList.contains('opacity-0')) {
            dot.classList.remove('opacity-0');
            ring.classList.remove('opacity-0');
        }

        // Instant dot position
        dot.style.transform = `translate3d(${mouseX}px, ${mouseY}px, 0) scale(${isMouseDown ? 0.6 : (isHovered ? 1.5 : 1)})`;
    }, { passive: true });

    // Smooth Lerp loop for ring follower
    function render() {
        // Linear Interpolation: ring position catches up smoothly to mouse position
        ringX += (mouseX - ringX) * 0.18;
        ringY += (mouseY - ringY) * 0.18;

        let scale = 1;
        if (isHovered) scale = 1.8;
        if (isMouseDown) scale = 0.8;

        ring.style.transform = `translate3d(${ringX}px, ${ringY}px, 0) scale(${scale})`;
        requestAnimationFrame(render);
    }
    requestAnimationFrame(render);

    // Expand cursor on hover over interactive elements
    const interactiveSelectors = 'a, button, input, textarea, select, label, [role="button"], .hover-target, .project-card';
    
    document.addEventListener('mouseover', (e) => {
        if (e.target.closest(interactiveSelectors)) {
            isHovered = true;
            ring.classList.add('border-accent', 'bg-accent/15', 'shadow-[0_0_20px_var(--app-accent)]');
            ring.classList.remove('border-accent/60', 'bg-accent/5');
        }
    });

    document.addEventListener('mouseout', (e) => {
        if (e.target.closest(interactiveSelectors)) {
            isHovered = false;
            ring.classList.remove('border-accent', 'bg-accent/15', 'shadow-[0_0_20px_var(--app-accent)]');
            ring.classList.add('border-accent/60', 'bg-accent/5');
        }
    });

    // Press animation
    document.addEventListener('mousedown', () => {
        isMouseDown = true;
    });

    document.addEventListener('mouseup', () => {
        isMouseDown = false;
    });

    // Hide cursor when leaving window
    document.addEventListener('mouseleave', () => {
        dot.classList.add('opacity-0');
        ring.classList.add('opacity-0');
    });

    document.addEventListener('mouseenter', () => {
        dot.classList.remove('opacity-0');
        ring.classList.remove('opacity-0');
    });
});
</script>
