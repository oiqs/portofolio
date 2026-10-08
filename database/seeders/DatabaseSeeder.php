<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Timeline;
use App\Models\Contact;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin User (Configure in .env for production: ADMIN_EMAIL & ADMIN_PASSWORD)
        User::updateOrCreate(
            ['email' => env('ADMIN_EMAIL', 'admin@thoriq.com')],
            [
                'name' => 'Thoriq Alfurqan M.L',
                'password' => Hash::make(env('ADMIN_PASSWORD', 'password')),
            ]
        );

        // Seed Projects
        $projects = [
            [
                'slug' => 'jelajah-curug-bogor',
                'title' => 'Jelajah Curug & Ketenangan Bogor',
                'description' => 'Petualangan menyusuri kesegaran air terjun dan suasana alam sejuk di Bogor.',
                'year' => '2025',
                'role' => 'Solo Trip & Nature',
                'stack' => ['Curug', 'Trekking', 'Healing'],
                'problem' => 'Rutinitas harian yang padat memerlukan tempat rileksasi sejenak di akhir pekan.',
                'solution' => 'Melakukan trip singkat menyusuri jalur trekking air terjun alami dengan suasana yang hijau dan tenang.',
                'impact' => 'Pikiran menjadi jauh lebih segar dan energi kembali terisi untuk menjalani hari.',
                'location_address' => 'Curug 7 Cilember, Megamendung, Cisarua, Kabupaten Bogor, Jawa Barat 16750',
                'location_map_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.090547631336!2d106.93605487499395!3d-6.635678493358826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69b671a5c6899b%3A0xb3ab3a8c7db7ec6b!2sCurug%207%20Cilember!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid',
                'is_featured' => true,
            ],
            [
                'slug' => 'camping-gunung-pancar',
                'title' => 'Camping & Sunset Hutan Pinus',
                'description' => 'Malam santai di tengah rimbunnya pohon pinus dengan udara malam yang menenangkan.',
                'year' => '2024',
                'role' => 'Camping & Relax',
                'stack' => ['Camping', 'Hutan Pinus', 'Relax'],
                'problem' => 'Mencari suasana malam yang sepi dan sejuk jauh dari hiruk-pikuk perkotaan.',
                'solution' => 'Mendirikan tenda di tengah area hutan pinus, mengabadikan momen sunset dan api unggun.',
                'impact' => 'Merasakan ketenangan hakiki dan pengalaman berkemah yang penuh kenangan indah.',
                'location_address' => 'Taman Wisata Alam Gunung Pancar, Karang Tengah, Babakan Madang, Bogor, Jawa Barat 16810',
                'location_map_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.6397368735235!2d106.90640397499342!3d-6.567085793426297!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c73333333333%3A0x1111111111111111!2sGunung%20Pancar!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid',
                'is_featured' => true,
            ],
            [
                'slug' => 'road-trip-pantai-selatan',
                'title' => 'Road Trip & Sunset Pantai Selatan',
                'description' => 'Perjalanan menyusuri garis pantai indah dengan pemandangan ombak dan matahari terbenam.',
                'year' => '2024',
                'role' => 'Road Trip & Beach',
                'stack' => ['Pantai', 'Road Trip', 'Sunset'],
                'problem' => 'Keinginan menikmati angin laut dan pemandangan matahari terbenam dari tebing karang.',
                'solution' => 'Menyusuri jalur pesisir pantai tersembunyi sambil menikmati pemandangan sunset sepanjang jalan.',
                'impact' => 'Menghasilkan koleksi foto pemandangan indah dan kepuasan batin setelah melakukan perjalanan darat.',
                'location_address' => 'Pantai Rancabuaya, Caringin, Kabupaten Garut, Jawa Barat 44154',
                'location_map_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.762947123984!2d107.54589237499998!3d-7.556272992457497!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e666060c5555555%3A0x8888888888888888!2sPantai%20Rancabuaya!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid',
                'is_featured' => true,
            ],
        ];

        foreach ($projects as $projectData) {
            Project::updateOrCreate(['slug' => $projectData['slug']], $projectData);
        }

        // Seed Skills / Hobi
        $skills = [
            ['name' => 'Eksplorasi Alam & Camping', 'level' => 'Sangat Suka', 'order' => 1],
            ['name' => 'Fotografi Perjalanan', 'level' => 'Hobi', 'order' => 2],
            ['name' => 'Wisata Kuliner & Cafe', 'level' => 'Favorit', 'order' => 3],
            ['name' => 'Road Trip & Traveling', 'level' => 'Sangat Suka', 'order' => 4],
            ['name' => 'Hunting Sunset & Pantai', 'level' => 'Favorit', 'order' => 5],
            ['name' => 'Itinerary & Trip Planning', 'level' => 'Santai', 'order' => 6],
        ];

        foreach ($skills as $skillData) {
            Skill::updateOrCreate(['name' => $skillData['name']], $skillData);
        }

        // Seed Timeline / Jejak Perjalanan
        $timelines = [
            [
                'year' => '2024 — Sekarang',
                'title' => 'Eksplorasi Spot Healing & Alam',
                'description' => 'Aktif mengunjungi tempat-tempat wisata alam, pegunungan, dan destinasi penenang pikiran.',
                'order' => 1,
            ],
            [
                'year' => '2023',
                'title' => 'Jelajah Wisata & Kuliner Lokal',
                'description' => 'Mengunjungi berbagai tempat wisata menarik dan berburu kuliner khas daerah.',
                'order' => 2,
            ],
            [
                'year' => '2022',
                'title' => 'Awal Mula Hobi Traveling',
                'description' => 'Mulai rutin meluangkan waktu di akhir pekan untuk trip singkat dan sekadar jalan-jalan.',
                'order' => 3,
            ],
        ];

        foreach ($timelines as $timelineData) {
            Timeline::updateOrCreate(
                ['year' => $timelineData['year'], 'title' => $timelineData['title']],
                $timelineData
            );
        }

        // Seed Sample Contact Message
        Contact::updateOrCreate(
            ['email' => 'traveler@example.com'],
            [
                'name' => 'Budi Traveler',
                'message' => 'Halo Thoriq! Trip ke Curug Bogor seru sekali. Apakah ada saran destinasi air terjun lainnya yang sejuk?',
                'is_read' => false,
            ]
        );
    }
}
