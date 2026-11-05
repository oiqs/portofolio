/**
 * Scroll Animations & Single Page Scrollspy Engine
 * Provides high-performance 60fps scroll reveals, reading progress bar,
 * active navigation highlighting, and smooth offset scrolling.
 */

export function initScrollAnimations() {
    initScrollProgress();
    initScrollReveal();
    initScrollspy();
    initSmoothAnchorScroll();
    handleInitialHash();
}

/**
 * 1. Top Reading Progress Bar
 */
function initScrollProgress() {
    let progressBar = document.getElementById('scroll-progress-bar');
    if (!progressBar) {
        progressBar = document.createElement('div');
        progressBar.id = 'scroll-progress-bar';
        progressBar.className = 'fixed top-0 left-0 h-[3px] bg-gradient-to-r from-accent via-cyan-400 to-accent w-0 z-[100] transition-[width] duration-150 ease-out pointer-events-none shadow-[0_0_10px_var(--app-accent)]';
        document.body.prepend(progressBar);
    }

    let ticking = false;
    function updateProgress() {
        const scrollTop = window.scrollY || document.documentElement.scrollTop;
        const docHeight = document.documentElement.scrollHeight - window.innerHeight;
        const progress = docHeight > 0 ? Math.min(100, Math.max(0, (scrollTop / docHeight) * 100)) : 0;
        progressBar.style.width = `${progress}%`;
        ticking = false;
    }

    window.addEventListener('scroll', () => {
        if (!ticking) {
            window.requestAnimationFrame(updateProgress);
            ticking = true;
        }
    }, { passive: true });

    updateProgress();
}

/**
 * 2. IntersectionObserver Scroll Reveal
 */
function initScrollReveal() {
    const reveals = document.querySelectorAll('.scroll-reveal');
    if (!reveals.length) return;

    // Check prefers-reduced-motion
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches || !('IntersectionObserver' in window)) {
        reveals.forEach(el => el.classList.add('is-revealed'));
        return;
    }

    const observer = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const el = entry.target;
                const delay = el.getAttribute('data-scroll-delay');
                if (delay) {
                    el.style.transitionDelay = `${delay}ms`;
                }
                el.classList.add('is-revealed');
                obs.unobserve(el);
            }
        });
    }, {
        threshold: 0.08,
        rootMargin: '0px 0px -40px 0px'
    });

    reveals.forEach(el => observer.observe(el));
}

/**
 * 3. Single-Page Scrollspy for Navbar
 */
function initScrollspy() {
    const sectionIds = ['home', 'essence', 'about', 'projects', 'contact'];
    const sections = sectionIds
        .map(id => document.getElementById(id))
        .filter(el => el !== null);

    if (!sections.length) return;

    const navLinks = document.querySelectorAll('nav a[href^="#"], #mobile-menu a[href^="#"]');
    if (!navLinks.length) return;

    let ticking = false;

    function highlightActiveNav() {
        const scrollPosition = (window.scrollY || document.documentElement.scrollTop) + 140;
        let currentSectionId = '';

        for (let i = sections.length - 1; i >= 0; i--) {
            const section = sections[i];
            const top = section.offsetTop;
            if (scrollPosition >= top) {
                currentSectionId = section.getAttribute('id');
                break;
            }
        }

        // If at top or in essence, map to home
        if (!currentSectionId || currentSectionId === 'essence') {
            currentSectionId = 'home';
        }

        navLinks.forEach(link => {
            const href = link.getAttribute('href');
            const targetId = href.replace('#', '');
            const isTarget = targetId === currentSectionId;
            const underline = link.querySelector('.nav-underline');
            const isContactPill = link.classList.contains('nav-contact-btn');
            const isMobile = link.classList.contains('mobile-nav-link');

            if (underline) {
                if (isTarget) {
                    link.classList.add('text-accent', 'font-semibold');
                    link.classList.remove('text-muted');
                    underline.classList.remove('w-0');
                    underline.classList.add('w-full', 'shadow-[0_0_8px_var(--app-accent)]');
                } else {
                    link.classList.remove('text-accent', 'font-semibold');
                    link.classList.add('text-muted');
                    underline.classList.remove('w-full', 'shadow-[0_0_8px_var(--app-accent)]');
                    underline.classList.add('w-0');
                }
            } else if (isContactPill) {
                if (isTarget) {
                    link.classList.add('ring-2', 'ring-accent', 'shadow-[0_0_20px_var(--app-accent)]');
                } else {
                    link.classList.remove('ring-2', 'ring-accent', 'shadow-[0_0_20px_var(--app-accent)]');
                }
            } else if (isMobile) {
                if (isTarget) {
                    link.classList.add('text-accent', 'font-bold');
                    link.classList.remove('text-muted');
                } else {
                    link.classList.remove('text-accent', 'font-bold');
                    link.classList.add('text-muted');
                }
            }
        });

        ticking = false;
    }

    window.addEventListener('scroll', () => {
        if (!ticking) {
            window.requestAnimationFrame(highlightActiveNav);
            ticking = true;
        }
    }, { passive: true });

    highlightActiveNav();
}

/**
 * 4. Smooth Anchor Click Handler with Header Offset
 */
function initSmoothAnchorScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href === '#' || href === '') return;

            const target = document.querySelector(href);
            if (target) {
                e.preventDefault();

                // Close mobile menu if open
                const mobileMenu = document.getElementById('mobile-menu');
                const hamburgerIcon = document.getElementById('hamburger-icon');
                const closeIcon = document.getElementById('close-icon');
                if (mobileMenu && !mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.remove('max-h-96', 'opacity-100');
                    mobileMenu.classList.add('max-h-0', 'opacity-0');
                    setTimeout(() => mobileMenu.classList.add('hidden'), 300);
                    if (hamburgerIcon) hamburgerIcon.classList.remove('hidden');
                    if (closeIcon) closeIcon.classList.add('hidden');
                }

                // Smooth scroll to element with 80px header offset
                const headerOffset = 80;
                const elementPosition = target.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });

                if (history.pushState) {
                    history.pushState(null, null, href);
                }
            }
        });
    });
}

/**
 * 5. Handle initial hash on page load (e.g. user opens /#about or redirects from subpage)
 */
function handleInitialHash() {
    if (window.location.hash) {
        const hash = window.location.hash;
        setTimeout(() => {
            const target = document.querySelector(hash);
            if (target) {
                const headerOffset = 80;
                const elementPosition = target.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - headerOffset;
                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
            }
        }, 150);
    }
}
