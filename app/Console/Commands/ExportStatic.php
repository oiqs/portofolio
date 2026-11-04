<?php

namespace App\Console\Commands;

use App\Models\Project;
use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ExportStatic extends Command
{
    protected $signature = 'app:export-static';
    protected $description = 'Export public portfolio pages to static HTML for Vercel with bilingual support (ID & EN)';

    public function handle()
    {
        $this->info('🚀 Starting Bilingual Static Site Export for Vercel...');

        // 1. Temporarily bypass hot reload if active
        $hotFile = public_path('hot');
        $hotBackup = public_path('hot.bak');
        if (file_exists($hotFile)) {
            rename($hotFile, $hotBackup);
        }

        $distDir = base_path('dist');

        try {
            // 2. Prepare dist directory
            if (File::exists($distDir)) {
                File::deleteDirectory($distDir);
            }
            File::makeDirectory($distDir, 0755, true);

            // 3. Define pages to render
            $basePages = [
                '/' => 'index.html',
                '/about' => 'about/index.html',
                '/projects' => 'projects/index.html',
                '/contact' => 'contact/index.html',
            ];

            // Add dynamic project pages
            $projects = Project::all();
            foreach ($projects as $project) {
                if (!empty($project->slug)) {
                    $basePages['/projects/' . $project->slug] = 'projects/' . $project->slug . '/index.html';
                }
            }

            // 4. Export both languages: 'id' (Indonesian, root) and 'en' (English, /en/)
            $locales = ['id', 'en'];

            foreach ($locales as $locale) {
                $this->info("--- Generating locale: [{$locale}] ---");

                config(['app.locale' => $locale]);
                session(['locale' => $locale]);
                app()->setLocale($locale);

                foreach ($basePages as $uri => $relativePath) {
                    $outPath = ($locale === 'en')
                        ? $distDir . '/en/' . $relativePath
                        : $distDir . '/' . $relativePath;

                    $this->line("Rendering ({$locale}): <info>{$uri}</info> -> " . str_replace($distDir . '/', '', $outPath));

                    $request = Request::create($uri, 'GET');
                    $response = app()->handle($request);
                    $html = $response->getContent();

                    // Clean and normalize URLs for static hosting & language switching
                    $html = $this->cleanHtml($html, $uri, $locale);

                    File::ensureDirectoryExists(dirname($outPath));
                    File::put($outPath, $html);
                }
            }

            // 5. Copy public assets
            $this->info('Copying assets to dist/...');

            // Copy build (Vite compiled css, js, manifest)
            if (File::exists(public_path('build'))) {
                File::copyDirectory(public_path('build'), $distDir . '/build');
            }

            // Copy images (profile, etc.)
            if (File::exists(public_path('images'))) {
                File::copyDirectory(public_path('images'), $distDir . '/images');
            }

            // Copy root static files
            $staticRootFiles = [
                'favicon.ico',
                'favicon.svg',
                'favicon.png',
                'favicon-16x16.png',
                'favicon-32x32.png',
                'favicon-48x48.png',
                'favicon-64x64.png',
                'apple-touch-icon.png',
                'robots.txt',
            ];
            foreach ($staticRootFiles as $file) {
                if (File::exists(public_path($file))) {
                    File::copy(public_path($file), $distDir . '/' . $file);
                }
            }

            // Copy referenced storage images
            $storageDir = storage_path('app/public');
            if (File::exists($storageDir)) {
                $distStorage = $distDir . '/storage';
                File::ensureDirectoryExists($distStorage);

                $usedImages = [];
                foreach ($projects as $p) {
                    if (!empty($p->cover_image)) {
                        $usedImages[] = $p->cover_image;
                    }
                    if (is_array($p->gallery_images)) {
                        foreach ($p->gallery_images as $img) {
                            if (!empty($img)) {
                                $usedImages[] = $img;
                            }
                        }
                    }
                }

                foreach ($usedImages as $imageRelPath) {
                    $src = $storageDir . '/' . $imageRelPath;
                    $dst = $distStorage . '/' . $imageRelPath;
                    if (File::exists($src)) {
                        File::ensureDirectoryExists(dirname($dst));
                        File::copy($src, $dst);
                        $this->line("Copied storage asset: {$imageRelPath}");
                    }
                }
            }

            $this->info('✅ Bilingual static export completed successfully in dist/!');
            return Command::SUCCESS;
        } finally {
            // Restore hot file if it was backed up
            if (file_exists($hotBackup)) {
                rename($hotBackup, $hotFile);
            }
        }
    }

    protected function cleanHtml(string $html, string $currentUri, string $locale): string
    {
        // 1. Tag language switch links with unique placeholders FIRST
        $html = str_replace([
            'href="http://localhost/lang/id"',
            'href="/lang/id"',
            'href="http://localhost/lang/en"',
            'href="/lang/en"',
        ], [
            'href="[[TOKEN_ID_LANG]]"',
            'href="[[TOKEN_ID_LANG]]"',
            'href="[[TOKEN_EN_LANG]]"',
            'href="[[TOKEN_EN_LANG]]"',
        ], $html);

        // 2. Replace localhost asset and base URLs
        $html = str_replace([
            'http://localhost/build/',
            'http://localhost/images/',
            'http://localhost/storage/',
            'http://localhost/',
            'http://localhost',
        ], [
            '/build/',
            '/images/',
            '/storage/',
            '/',
            '/',
        ], $html);

        // Replace any leftover http://localhost with /
        $html = preg_replace('#http://localhost/?#', '/', $html);

        // 3. For English pages, prefix internal navigation links with /en
        if ($locale === 'en') {
            // Navbar logo
            $html = str_replace('href="/" class="font-display', 'href="/en/" class="font-display', $html);

            // Nav links
            $html = str_replace('href="/"', 'href="/en/"', $html);
            $html = str_replace('href="/about"', 'href="/en/about"', $html);
            $html = str_replace('href="/projects"', 'href="/en/projects"', $html);
            $html = str_replace('href="/contact"', 'href="/en/contact"', $html);

            // Project detail links (/projects/slug -> /en/projects/slug)
            $html = preg_replace('#href="/projects/([a-z0-9\-]+)"#', 'href="/en/projects/$1"', $html);
        }

        // 4. Fill in the exact target destinations for language switching
        $idTarget = ($currentUri === '/') ? '/' : $currentUri;
        $enTarget = ($currentUri === '/') ? '/en/' : '/en' . $currentUri;

        $html = str_replace('[[TOKEN_ID_LANG]]', $idTarget, $html);
        $html = str_replace('[[TOKEN_EN_LANG]]', $enTarget, $html);

        return $html;
    }
}
