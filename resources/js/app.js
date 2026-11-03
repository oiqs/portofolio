import './bootstrap';
import { initLanyard } from './lanyard';
import { initTopoBackground } from './topo-background';

function bootLanyard() {
    const lanyardContainer = document.getElementById('lanyard-card-container');
    if (lanyardContainer && !lanyardContainer.hasAttribute('data-lanyard-initialized')) {
        lanyardContainer.setAttribute('data-lanyard-initialized', 'true');
        initLanyard(lanyardContainer, {
            frontImage: '/images/card-front.webp',
            backImage: '/images/card-back.webp',
            strapImage: '/images/card-strap.webp',
            cardColor: '#04010e',
            strapColor: '#111827',
            finish: 'glossy',
            anchor: 'center',
            orientation: 'portrait',
            size: 0.46,
            cornerRadius: 0.24,
            strapLength: 0.58,
            strapWidth: 0.54,
            gravity: 1.2,
            damping: 0.35,
            elasticity: 0.7,
            breeze: 0.12,
            interactive: true,
            metal: 'silver',
            intro: true
        });
    }
}

function bootApp() {
    initTopoBackground();
    bootLanyard();
    initHeroTypewriter();
    initSpiderReveal();
}

function initHeroTypewriter() {
    const heading = document.getElementById('hero-typewriter-heading');
    if (!heading || heading.hasAttribute('data-typewriter-initialized')) return;
    heading.setAttribute('data-typewriter-initialized', 'true');

    const line1El = document.getElementById('typewriter-line1');
    const line2El = document.getElementById('typewriter-line2');
    const cursor = document.getElementById('typewriter-cursor');
    if (!line1El || !line2El || !cursor) return;

    const text1 = heading.dataset.line1 || '';
    const text2 = heading.dataset.line2 || '';

    // Clear initial content for typing effect
    line1El.textContent = '';
    line2El.textContent = '';
    line1El.appendChild(cursor);

    const typeSpeedMin = 50;
    const typeSpeedMax = 90;
    const eraseSpeed = 25;
    const pauseBeforeLine2 = 350;
    const pauseAfterComplete = 4500;
    const pauseBeforeRetype = 500;

    let activeTimeout = null;

    function randomDelay() {
        return Math.floor(Math.random() * (typeSpeedMax - typeSpeedMin + 1)) + typeSpeedMin;
    }

    function setCursorTyping(isTyping) {
        if (cursor) {
            cursor.classList.toggle('typewriter-cursor-blink', !isTyping);
            cursor.classList.toggle('typewriter-cursor-solid', isTyping);
        }
    }

    function typeLine1(index = 0) {
        setCursorTyping(true);
        if (index <= text1.length) {
            line1El.textContent = text1.slice(0, index);
            line1El.appendChild(cursor);
            if (index < text1.length) {
                const char = text1[index];
                const delay = (char === ',' || char === '.') ? 240 : randomDelay();
                activeTimeout = setTimeout(() => typeLine1(index + 1), delay);
            } else {
                setCursorTyping(false);
                activeTimeout = setTimeout(() => {
                    line2El.after(cursor);
                    typeLine2(0);
                }, pauseBeforeLine2);
            }
        }
    }

    function typeLine2(index = 0) {
        setCursorTyping(true);
        if (index <= text2.length) {
            line2El.textContent = text2.slice(0, index);
            line2El.after(cursor);
            if (index < text2.length) {
                const char = text2[index];
                const delay = (char === '.') ? 200 : randomDelay();
                activeTimeout = setTimeout(() => typeLine2(index + 1), delay);
            } else {
                setCursorTyping(false);
                activeTimeout = setTimeout(eraseLine2, pauseAfterComplete);
            }
        }
    }

    function eraseLine2() {
        setCursorTyping(true);
        const current = line2El.textContent;
        if (current.length > 0) {
            line2El.textContent = current.slice(0, -1);
            line2El.after(cursor);
            activeTimeout = setTimeout(eraseLine2, eraseSpeed);
        } else {
            setCursorTyping(false);
            activeTimeout = setTimeout(() => typeLine2(0), pauseBeforeRetype);
        }
    }

    // Click handler to re-trigger
    heading.addEventListener('click', () => {
        if (activeTimeout) clearTimeout(activeTimeout);
        line1El.textContent = text1;
        line2El.textContent = '';
        line2El.after(cursor);
        typeLine2(0);
    });

    // Start with a natural delay after load
    activeTimeout = setTimeout(() => typeLine1(0), 300);
}

function initSpiderReveal() {
    const stage = document.getElementById('about-portrait-stage');
    if (!stage || stage.hasAttribute('data-spider-initialized')) return;
    stage.setAttribute('data-spider-initialized', 'true');

    const portrait = stage.querySelector('.about-portrait');
    if (!portrait) return;

    let leaveTimeout = null;

    function updateCoords(clientX, clientY) {
        clearTimeout(leaveTimeout);
        const rect = portrait.getBoundingClientRect();
        if (rect.width === 0 || rect.height === 0) return;

        const x = Math.max(0, Math.min(100, ((clientX - rect.left) / rect.width) * 100));
        const y = Math.max(0, Math.min(100, ((clientY - rect.top) / rect.height) * 100));

        stage.style.setProperty('--hover-x', `${x.toFixed(2)}%`);
        stage.style.setProperty('--hover-y', `${y.toFixed(2)}%`);
        stage.classList.add('spider-hovered');
        stage.dataset.spiderVisible = 'true';
    }

    function handlePointer(e) {
        updateCoords(e.clientX, e.clientY);
    }

    function handleTouch(e) {
        if (e.touches && e.touches[0]) {
            updateCoords(e.touches[0].clientX, e.touches[0].clientY);
        }
    }

    function handleLeave() {
        delete stage.dataset.spiderVisible;
        clearTimeout(leaveTimeout);
        leaveTimeout = setTimeout(() => {
            stage.classList.remove('spider-hovered');
        }, 150);
    }

    portrait.addEventListener('pointermove', handlePointer);
    portrait.addEventListener('pointerdown', handlePointer);
    portrait.addEventListener('pointerleave', handleLeave);

    portrait.addEventListener('touchmove', handleTouch, { passive: true });
    portrait.addEventListener('touchstart', handleTouch, { passive: true });
    portrait.addEventListener('touchend', handleLeave, { passive: true });
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', bootApp);
} else {
    bootApp();
}
