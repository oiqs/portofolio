import sharp from 'sharp';
import fs from 'fs';
import path from 'path';

// Clean monochrome hiker with carrier backpack matching Chrome's default #9AA0A6 color style
// Transparent background, crisp silhouette
const svg = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32">
  <style>
    .hiker { fill: #9AA0A6; stroke: #9AA0A6; }
    @media (prefers-color-scheme: light) {
      .hiker { fill: #5F6368; stroke: #5F6368; }
    }
    @media (prefers-color-scheme: dark) {
      .hiker { fill: #9AA0A6; stroke: #9AA0A6; }
    }
  </style>

  <g class="hiker">
    <!-- Mountain ridge / Trail slope -->
    <path d="M2 28.5 Q16 27 30 24.5" fill="none" stroke-width="1.8" stroke-linecap="round" />

    <!-- Carrier Backpack (Tas Keril) -->
    <!-- Matras gulung on top of carrier -->
    <rect x="7.5" y="6" width="6.5" height="2.2" rx="1.1" stroke-width="0" />
    <!-- Main Carrier Body -->
    <rect x="8" y="8.8" width="5.8" height="10.2" rx="2" stroke-width="0" />

    <!-- Head & Rimba / Bucket Hat -->
    <circle cx="17.2" cy="7.5" r="2.5" stroke-width="0" />
    <!-- Hat Brim -->
    <path d="M13.8 7.2 Q17.2 5.5 20.6 7.5" fill="none" stroke-width="1.2" stroke-linecap="round" />

    <!-- Torso (leaning forward) -->
    <polygon points="13.2,10.5 18.2,12 16.5,19 12.8,18" stroke-width="0" />

    <!-- Front Arm holding Trekking Pole -->
    <path d="M16.5 12.2 L19.8 15.2 L21.2 18.2" fill="none" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />

    <!-- Trekking Pole (Tongkat Gunung) -->
    <line x1="21.8" y1="13" x2="20.2" y2="25.5" stroke-width="1.2" stroke-linecap="round" />

    <!-- Legs in Climbing Stride -->
    <!-- Lead leg stepping up -->
    <path d="M16.2 18.8 L19.5 22.5 L19.5 26.2" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
    <!-- Trail leg pushing back -->
    <path d="M13.8 18.8 L11.5 22.8 L9.5 27.2" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />

    <!-- Hiking Boots -->
    <line x1="18.8" y1="26.2" x2="21.5" y2="26.2" stroke-width="2" stroke-linecap="round" />
    <line x1="8.8" y1="27.2" x2="11.5" y2="27.2" stroke-width="2" stroke-linecap="round" />
  </g>
</svg>`;

async function main() {
  const publicDir = path.resolve('public');
  const distDir = path.resolve('dist');

  // Save SVG
  fs.writeFileSync(path.join(publicDir, 'favicon.svg'), svg, 'utf8');
  console.log('Saved public/favicon.svg');

  // Render PNGs at various resolutions
  const sizes = [16, 32, 48, 64, 180, 192, 512];
  for (const size of sizes) {
    const filename = size === 180 ? 'apple-touch-icon.png' : `favicon-${size}x${size}.png`;
    await sharp(Buffer.from(svg))
      .resize(size, size)
      .png()
      .toFile(path.join(publicDir, filename));
    console.log(`Generated public/${filename}`);
  }

  // Standard favicon-32x32 as favicon.png
  await sharp(Buffer.from(svg))
    .resize(32, 32)
    .png()
    .toFile(path.join(publicDir, 'favicon.png'));

  // Standard favicon.ico
  await sharp(Buffer.from(svg))
    .resize(32, 32)
    .png()
    .toFile(path.join(publicDir, 'favicon.ico'));
  console.log('Generated public/favicon.ico');

  // Sync to dist
  if (fs.existsSync(distDir)) {
    fs.copyFileSync(path.join(publicDir, 'favicon.svg'), path.join(distDir, 'favicon.svg'));
    fs.copyFileSync(path.join(publicDir, 'favicon.ico'), path.join(distDir, 'favicon.ico'));
    fs.copyFileSync(path.join(publicDir, 'favicon.png'), path.join(distDir, 'favicon.png'));
    fs.copyFileSync(path.join(publicDir, 'apple-touch-icon.png'), path.join(distDir, 'apple-touch-icon.png'));
    for (const size of [16, 32, 48, 64]) {
      const filename = `favicon-${size}x${size}.png`;
      fs.copyFileSync(path.join(publicDir, filename), path.join(distDir, filename));
    }
    console.log('Synced favicons to dist/');
  }
}

main().catch(console.error);
