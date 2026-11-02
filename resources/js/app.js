import './bootstrap';
import { initLanyard } from './lanyard';

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

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', bootLanyard);
} else {
    bootLanyard();
}
