<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProjects = [
            [
                'slug' => 'sistem-inventaris-toko',
                'title' => 'Sistem Inventaris Toko',
                'description' => 'Aplikasi manajemen stok barang dengan laporan otomatis.',
                'year' => '2025',
                'stack' => ['Laravel', 'MySQL', 'Tailwind CSS'],
            ],
            [
                'slug' => 'platform-booking-lapangan',
                'title' => 'Platform Booking Lapangan',
                'description' => 'Aplikasi pemesanan lapangan olahraga secara online.',
                'year' => '2024',
                'stack' => ['Laravel', 'Livewire', 'MySQL'],
            ],
            [
                'slug' => 'landing-page-produk',
                'title' => 'Landing Page Produk',
                'description' => 'Landing page pemasaran untuk produk digital dengan fokus konversi.',
                'year' => '2024',
                'stack' => ['Laravel', 'Tailwind CSS', 'Alpine.js'],
            ],
        ];

        return view('home', compact('featuredProjects'));
    }
}