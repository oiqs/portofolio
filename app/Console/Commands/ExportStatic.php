<?php

namespace App\Console\Commands;

use App\Models\Project;
use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ExportStatic extends Command
{
    protected $signature = 'app:export-static';
    protected $description = 'Export public portfolio pages to static HTML for Vercel';

    public function handle()
    {
        $this->info('🚀 Starting Static Site Export for Vercel...');

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
            $pages = [
                '/' => 'index.html',
                '/about' => 'about/index.html',
                '/projects' => 'projects/index.html',
                '/contact' => 'contact/index.html',
            ];

            // Add dynamic project pages
            $projects = Project::all();
            foreach ($projects as $project) {
                if (!empty($project->slug)) {
                    $pages['/projects/' . $project->slug] = 'projects/' . $project->slug . '/index.html';
                }
            }

            // 4. Render and save each page
            foreach ($pages as $uri => $relativePath) {
                $this->line("Rendering: <info>{$uri}</info> -> dist/{$relativePath}");

                $request = Request::create($uri, 'GET');
                $response = app()->handle($request);
                $html = $response->getContent();

                // Clean and normalize URLs
                $html = $this->cleanHtml($html, $uri);

                $targetPath = $distDir . '/' . $relativePath;
                File::ensureDirectoryExists(dirname($targetPath));
                File::put($targetPath, $html);
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
            foreach (['favicon.ico', 'robots.txt'] as $file) {
                if (File::exists(public_path($file))) {
                    File::copy(public_path($file), $distDir . '/' . $file);
                }
            }

            // Copy referenced storage images
            $storageDir = storage_path('app/public');
            if (File::exists($storageDir)) {
                $distStorage = $distDir . '/storage';
                File::ensureDirectoryExists($distStorage);

                // Collect only referenced images to keep size small and fast
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

            $this->info('✅ Static export completed successfully in dist/!');
            return Command::SUCCESS;
        } finally {
            // Restore hot file if it was backed up
            if (file_exists($hotBackup)) {
                rename($hotBackup, $hotFile);
            }
        }
    }

    protected function cleanHtml(string $html, string $currentUri): string
    {
        // Replace localhost URLs with root-relative URLs
        $html = str_replace([
            'http://localhost/build/',
            'http://localhost/images/',
            'http://localhost/storage/',
            'http://localhost/about',
            'http://localhost/projects',
            'http://localhost/contact',
            'http://localhost/',
            'http://localhost',
        ], [
            '/build/',
            '/images/',
            '/storage/',
            '/about',
            '/projects',
            '/contact',
            '/',
            '/',
        ], $html);

        // Replace any leftover http://localhost with /
        $html = preg_replace('#http://localhost/?#', '/', $html);

        // Handle language switcher on static site (prevent 404)
        $html = str_replace(
            ['href="/lang/id"', 'href="/lang/en"'],
            ['href="#" onclick="return false;"', 'href="#" onclick="alert(\'Versi bahasa Inggris segera hadir!\'); return false;"'],
            $html
        );

        // Enhance Contact Form for static hosting (redirects to WhatsApp on submit)
        if (str_contains($currentUri, 'contact')) {
            $contactJs = <<<'HTML'
<script>
document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.querySelector('form');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const nameInput = document.getElementById('name');
            const emailInput = document.getElementById('email');
            const messageInput = document.getElementById('message');

            const name = nameInput ? nameInput.value.trim() : '';
            const email = emailInput ? emailInput.value.trim() : '';
            const message = messageInput ? messageInput.value.trim() : '';

            if (!name || !email || !message) {
                alert('Mohon lengkapi semua kolom formulir.');
                return;
            }

            const waText = encodeURIComponent("Halo Thoriq! Saya *" + name + "* (" + email + ").\n\nPesan:\n" + message);
            const waUrl = "https://wa.me/6281234567890?text=" + waText;
            window.open(waUrl, '_blank');

            // Tampilkan notifikasi sukses
            let alertBox = document.getElementById('static-contact-alert');
            if (!alertBox) {
                alertBox = document.createElement('div');
                alertBox.id = 'static-contact-alert';
                alertBox.className = 'mb-8 px-6 py-5 rounded-2xl bg-accent/10 border border-accent/20 text-accent font-medium';
                contactForm.parentNode.insertBefore(alertBox, contactForm);
            }
            alertBox.textContent = 'Terima kasih ' + name + '! Pesan Anda telah dialihkan ke WhatsApp.';
            contactForm.reset();
        });
    }
});
</script>
</body>
HTML;
            $html = str_replace('</body>', $contactJs, $html);
        }

        return $html;
    }
}
