<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $skills = [
            ['name' => 'Laravel', 'level' => 'Mahir'],
            ['name' => 'Tailwind CSS', 'level' => 'Mahir'],
            ['name' => 'JavaScript', 'level' => 'Menengah'],
            ['name' => 'MySQL', 'level' => 'Mahir'],
            ['name' => 'Git & GitHub', 'level' => 'Menengah'],
            ['name' => 'REST API', 'level' => 'Menengah'],
        ];

        $timeline = [
            [
                'year' => '2024 — Sekarang',
                'title' => 'Freelance Web Developer',
                'description' => 'Mengerjakan berbagai proyek web untuk klien, fokus di Laravel dan integrasi frontend modern.',
            ],
            [
                'year' => '2023',
                'title' => 'Belajar Fullstack Development',
                'description' => 'Memperdalam PHP, Laravel, dan dasar-dasar desain UI/UX secara mandiri dan lewat kursus.',
            ],
            [
                'year' => '2022',
                'title' => 'Mulai Belajar Pemrograman',
                'description' => 'Mengenal dasar HTML, CSS, dan JavaScript, membangun beberapa project sederhana.',
            ],
        ];

        return view('about', compact('skills', 'timeline'));
    }
}