<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    protected function projects()
    {
        return [
            [
                'slug' => 'sistem-inventaris-toko',
                'title' => 'Sistem Inventaris Toko',
                'description' => 'Aplikasi manajemen stok barang dengan laporan otomatis.',
                'year' => '2025',
                'role' => 'Fullstack Developer',
                'stack' => ['Laravel', 'MySQL', 'Tailwind CSS'],
                'problem' => 'Toko masih mencatat stok barang secara manual di buku, sering terjadi selisih data dan sulit membuat laporan bulanan.',
                'solution' => 'Membangun sistem berbasis web yang mencatat keluar-masuk barang secara real-time, lengkap dengan laporan otomatis yang bisa diunduh.',
                'impact' => 'Proses pencatatan stok jadi lebih cepat dan mengurangi kesalahan pencatatan hingga signifikan.',
                'demo_url' => '#',
                'github_url' => '#',
            ],
            [
                'slug' => 'platform-booking-lapangan',
                'title' => 'Platform Booking Lapangan',
                'description' => 'Aplikasi pemesanan lapangan olahraga secara online.',
                'year' => '2024',
                'role' => 'Web Developer',
                'stack' => ['Laravel', 'Livewire', 'MySQL'],
                'problem' => 'Pemesanan lapangan masih lewat telepon/WhatsApp, sering bentrok jadwal antar pelanggan.',
                'solution' => 'Membuat sistem booking online dengan kalender ketersediaan real-time dan konfirmasi otomatis.',
                'impact' => 'Bentrok jadwal berkurang drastis, pemilik lapangan bisa memantau pemesanan dari satu dashboard.',
                'demo_url' => '#',
                'github_url' => '#',
            ],
            [
                'slug' => 'landing-page-produk',
                'title' => 'Landing Page Produk',
                'description' => 'Landing page pemasaran untuk produk digital dengan fokus konversi.',
                'year' => '2024',
                'role' => 'Frontend Developer',
                'stack' => ['Laravel', 'Tailwind CSS', 'Alpine.js'],
                'problem' => 'Klien butuh halaman promosi yang cepat dimuat dan mudah diubah kontennya sendiri.',
                'solution' => 'Membangun landing page ringan dengan struktur konten yang bisa dikelola lewat panel sederhana.',
                'impact' => 'Waktu muat halaman jauh lebih cepat dibanding versi sebelumnya, meningkatkan rasio konversi pengunjung.',
                'demo_url' => '#',
                'github_url' => '#',
            ],
        ];
    }

    public function index()
    {
        $projects = $this->projects();

        return view('projects.index', compact('projects'));
    }

    public function show($slug)
    {
        $projects = $this->projects();

        $project = collect($projects)->firstWhere('slug', $slug);

        if (!$project) {
            abort(404);
        }

        $currentIndex = collect($projects)->search(fn($p) => $p['slug'] === $slug);
        $next = $projects[($currentIndex + 1) % count($projects)];

        return view('projects.show', compact('project', 'next'));
    }
}