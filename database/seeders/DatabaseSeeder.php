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
        // Admin User
        User::updateOrCreate(
            ['email' => env('ADMIN_EMAIL', 'admin@thoriq.com')],
            [
                'name' => 'Thoriq Alfurqan M.L',
                'password' => Hash::make(env('ADMIN_PASSWORD', 'password')),
            ]
        );

        // Clear previous dummy projects
        Project::truncate();

        // Seed 4 Authentic Traveling & Healing Projects matching https://perjalanan-oiq.vercel.app/
        $projects = [
            [
                'slug' => 'jelajah-pantai-gunungkidul',
                'title' => 'PANTAI NGOBARAN',
                'description' => 'Menjelajahi keunikan Pantai Ngobaran di pesisir selatan Yogyakarta, perpaduan eksotis antara tebing karang laut, deburan ombak, dan nuansa budaya pura bernuansa Bali.',
                'year' => '2026',
                'role' => 'Family Trip & Nature',
                'location_address' => 'Daerah Istimewa Yogyakarta',
                'location_map_url' => 'https://maps.google.com/maps?q=Daerah+Istimewa+Yogyakarta&t=&z=14&ie=UTF8&iwloc=&output=embed',
                'cover_image' => 'projects/DcDGkdZ4QIh9OIvEWMTWLrU8Tb5ZruQgC1BSiWBl.jpg',
                'stack' => [
                    'Pantai Ngobaran',
                    'Solo Trip',
                    'Nature',
                    'Sunset',
                    'Pantai Gunungkidul',
                    'Wisata Budaya',
                    'Ocean View',
                ],
                'problem' => 'Rutinitas harian yang padat memicu keinginan untuk mencari suasana tenang di alam terbuka. Pesisir Gunungkidul dipilih untuk menikmati angin laut, menyegarkan pikiran, sekaligus mengeksplorasi spot lanskap tebing pantai yang unik.',
                'solution' => 'Perjalanan bermotor menyusuri jalur perbukitan selatan langsung terbayar saat tiba di tepi tebing. Suasana pantai terasa sangat khas dengan keberadaan bangunan pura dan arca di atas karang, ditambah panorama laut lepas saat air mulai surut memperlihatkan alga hijau dan biota karang.',
                'impact' => 'Waktu terbaik untuk berkunjung adalah sore hari menjelang matahari terbenam agar cuaca tidak terlalu terik dan siluet bangunan terlihat sangat menawan. Pastikan menggunakan alas kaki yang nyaman dan tidak licin jika ingin turun mendekati area karang.',
                'gallery_images' => [
                    'projects/gallery/I9PTvz3TZ0zyuHPeWDgYPNKXlOQNp2okoF8Djmfz.jpg',
                    'projects/gallery/clK0tHW11jVpi7nDNxlfkset1oQyN7o1o1SfuMCH.jpg',
                    'projects/gallery/PtZ0lMwD78uebmZkCNPbhwSJYY0Zfiw73aIrKHDa.jpg',
                    'projects/gallery/yvha1SmzIOaplTqPMvJnCfrVTlOWlwTJbdcAgC6G.jpg',
                    'projects/gallery/ilcoHHFvxvWW6xQtXos23JBhJeFpTsap3ZTD28RB.jpg',
                    'projects/gallery/eiffBuqGMIDDAgG24J7q1EWYYzofsw7NcY1QbBdI.jpg',
                    'projects/gallery/p2A1lRfrBZZho1uCnFzRk3NrPPVa34NALMehkHAT.jpg',
                    'projects/gallery/8VSc4bFDvwCorItIyfYrguyGXt5PzZLxBAbWkcPk.jpg',
                    'projects/gallery/qj8WWbLR6t3VCo6KEJMQ4eGEYpDn6U8sUr1XSlSa.jpg',
                    'projects/gallery/LlBaRyft0iC69XnMgR964LsocimLnygR4YUu7DdR.jpg',
                    'projects/gallery/6rCDTxqErhisRrmlT9OAtTcO24lDCU0Is6SzKKgT.jpg',
                ],
                'is_featured' => true,
            ],
            [
                'slug' => 'merbabu-euy-kapan-lagi',
                'title' => 'GUNUNG MERBABU',
                'description' => 'Pendakian Gunung Merbabu (3.142 mdpl) menyusuri sabana hijau yang luas dan panorama megah Gunung Merapi di atas awan.',
                'year' => '2026',
                'role' => 'Hiking Tektok',
                'location_address' => 'GF56+CJJ, Dusun I, Selo, Kec. Selo, Kabupaten Boyolali, Jawa Tengah 57363',
                'location_map_url' => 'https://maps.google.com/maps?q=GF56%2BCJJ%2C+Dusun+I%2C+Selo%2C+Kec.+Selo%2C+Kabupaten+Boyolali%2C+Jawa+Tengah+57363&t=&z=14&ie=UTF8&iwloc=&output=embed',
                'cover_image' => 'projects/cqSYdBVJsAapRbn3thO9Dfm9gCuGFpjVcVMzPz6j.jpg',
                'stack' => [
                    'Hiking',
                    'Pendakian',
                    'Gunung Merbabu',
                    'Sabana',
                    'Nature',
                    'Camping',
                    'Sunrise',
                ],
                'problem' => 'Kebutuhan untuk melepas penat dari rutinitas harian dengan kembali ke alam bebas. Merbabu dipilih karena menawarkan pemandangan sabana terbuka yang asri dan jalur pendakian yang menantang namun ramah untuk dinikmati santai.',
                'solution' => 'Memulai pendakian melewati trek berhutan pinus hingga akhirnya disambut hamparan perbukitan sabana hijau yang membentang luas. Momen terbaik terjadi saat beristirahat di area camp dan menikmati matahari terbit dengan siluet gagah Gunung Merapi tepat di seberang mata.',
                'impact' => 'Fisik cukup terkuras di jalur menanjak berdebu, namun pemandangan laut awan di puncak membayar lunas semua lelah. Persiapan fisik, manajemen logistik air, serta perlengkapan penahan angin sangat krusial di jalur terbuka ini.',
                'gallery_images' => [
                    'projects/gallery/bP01cRYuC5LiiTNs9zG2RuYInQdZrl8wiHmnwAr8.jpg',
                    'projects/gallery/c7bHAE3E3uqMpfGRNImPcYlwK34NRFxQsvUiCNrH.jpg',
                    'projects/gallery/YBiECQJX9qwlIVzKrDyAlq61bLDFdrtTfRY0Orpl.jpg',
                    'projects/gallery/pJDiB0dzkOhHzAMFdECsD7NbnepoSRLYnqhls7Rq.jpg',
                    'projects/gallery/9RPQQOExO55wClg0KaoCzTqvhh8PMlMwLrnWX0Gf.jpg',
                    'projects/gallery/yhV3vhHbwWdn4ZUZu4iUUGtxa1VZmhtkOCasMzdW.jpg',
                    'projects/gallery/Q44yzXkZAzcPWWvRB4twmEfL45NATI5HWZFpaVHV.jpg',
                    'projects/gallery/jlBOt8QG4FFfjSNX60ra45pL3tnaD8gLhSW9U5uy.jpg',
                    'projects/gallery/752ThN3xO21gwf6CZmZ9mtyGV8IZzT5lqQThymMC.jpg',
                    'projects/gallery/bi6O5adb7aPWCqCS4HCKSDmaRJK3yEnSCCtYbHe8.jpg',
                    'projects/gallery/kH5jX3XLE2mUJfVnwPIF0HzliEtvlcOteCV6KCKE.jpg',
                ],
                'is_featured' => true,
            ],
            [
                'slug' => 'sumbing-euy',
                'title' => 'GUNUNG SUMBING',
                'description' => 'Pendakian menantang menuju atap tertinggi kedua di Jawa Tengah pada ketinggian 3.371 mdpl, menyuguhkan pesona kawah aktif, jalur savana terjal, dan panorama samudra awan yang megah.',
                'year' => '2026',
                'role' => 'Wisata Alam / Pendakian Gunung',
                'location_address' => 'M25P+7XG, Jl. Raya Parakan - Wonosobo, Tedeng, Batursari, Kec. Kledung, Kabupaten Temanggung, Jawa Tengah 56255',
                'location_map_url' => 'https://maps.google.com/maps?q=M25P%2B7XG%2C+Jl.+Raya+Parakan+-+Wonosobo%2C+Tedeng%2C+Batursari%2C+Kec.+Kledung%2C+Kabupaten+Temanggung%2C+Jawa+Tengah+56255&t=&z=14&ie=UTF8&iwloc=&output=embed',
                'cover_image' => 'projects/haFTneddXQaeqDF9m8SLhlLsVHosQTUQDuRZl4pZ.jpg',
                'stack' => [
                    'Hiking',
                    'Gunung Sumbing',
                    'Summit',
                    'Lautan Awan',
                    'Savana',
                ],
                'problem' => 'Tertarik untuk menaklukkan salah satu jalur terberat dan terindah di Jawa Tengah, sekaligus menikmati lanskap kawah puncak dan hamparan savana Gunung Sumbing yang tersohor.',
                'solution' => 'Menapaki jalur tanah berbatu yang menanjak konstan sejak awal lintasan, menembus kabut tipis dan udara dingin khas pegunungan. Ritme langkah diuji di jalur terjal batas vegetasi sebelum akhirnya disambut pemandangan bibir kawah dan hamparan samudra awan emas di puncak saat fajar merekah.',
                'impact' => 'Gunung Sumbing menuntut ketahanan fisik dan persiapan logistik yang matang, terutama manajemen air karena sumber air cukup minim di beberapa jalur atas. Penggunaan trekking pole sangat krusial untuk menjaga lutut saat melintasi turunan berbatu yang licin.',
                'gallery_images' => [
                    'projects/gallery/UAXSh7Wv66sOZiXAAOsvLT0VFiuaY6YjCeoThRkh.jpg',
                    'projects/gallery/Wz2ZAV5rpCpB0l4b2MDBLsa5ywVICae0Z1yHBItV.jpg',
                    'projects/gallery/cQnFCORH5s64r0GqYKJYHOcbNhZgFgg5ogdRD0On.jpg',
                    'projects/gallery/PUPdRfnPDHEObdp5RHfIGIhLzBkAsUnKq4hs7bdM.jpg',
                    'projects/gallery/GIoyJuHwTHj9qSNzT6WVdQ9xMq12BptRYHVXP9L4.jpg',
                    'projects/gallery/o3BGhXuhDgT7YIogFJMNeGgBoFfCBZ4fTRpGf71g.jpg',
                    'projects/gallery/KPjKFN3R64YMW4A5a2dHXyPqRULqYRswSxf7BI97.jpg',
                    'projects/gallery/P9Z2PPkKblBv0ZCCOHbVTntMgSeoFg5IOMXlZM8H.jpg',
                    'projects/gallery/GpM1TVyAjH3UJrhDc27J2VfEGLzExDWGixiTlvGt.jpg',
                    'projects/gallery/88TEvuHm6B15EGcEolVx43s9mbNtdlM7ERWTVG97.jpg',
                    'projects/gallery/nVZrSbyoS3N3z20unZSir08Vzos6PWbYDS86gvF2.jpg',
                    'projects/gallery/LshkAsZnzIG09HWfNdBMnLHEmjHWDqc6X7NmlKJh.jpg',
                    'projects/gallery/dkebS2zuhtB5QG0LgR1ASelzlS2Q6JwYHgFzKQx4.jpg',
                    'projects/gallery/QQCDOpQLpradt0qOAUmKabjVU6iE8B0UKVylRFtd.jpg',
                    'projects/gallery/qs2JNGYsnWMyYuKHy3EyZBxMoHu193zqKOAJvcX2.jpg',
                    'projects/gallery/7FjR2boyYIpYlcTeVFwA9lBLz2SnMjjM2fnH0fO0.jpg',
                ],
                'is_featured' => true,
            ],
            [
                'slug' => 'hiking-gunung-lawu',
                'title' => 'GUNUNG LAWU',
                'description' => 'Menikmati keindahan gunung yang dikenal dengan gunung sakral yang terletak di perbatasan Provinsi Jawa Tengah dan Jawa Timur',
                'year' => '2023',
                'role' => 'Camping',
                'location_address' => 'Jl. Tawangmangu-Plaosan, Kali Jumok, Sarangan, Kec. Plaosan, Kabupaten Magetan, Jawa Timur 63361',
                'location_map_url' => 'https://maps.google.com/maps?q=Jl.+Tawangmangu-Plaosan%2C+Kali+Jumok%2C+Sarangan%2C+Kec.+Plaosan%2C+Kabupaten+Magetan%2C+Jawa+Timur+63361&t=&z=14&ie=UTF8&iwloc=&output=embed',
                'cover_image' => 'projects/zikZTz2JYFMhzafRwStyQxisJTZcTnKZA5RNvfDa.jpg',
                'stack' => [
                    'Puncak',
                    'Trekking',
                    'Camp',
                ],
                'problem' => 'Keinginan untuk menguji ketahanan fisik sekaligus mencari ketenangan di ketinggian membawa langkah menuju Gunung Lawu—gunung yang sarat akan nilai historis, suasana sakral, serta panorama alam perbatasan Jawa Tengah dan Jawa Timur yang memukau.',
                'solution' => 'Menempuh jalur pendakian dengan kontur berbatu dan hutan yang asri, merasakan dinginnya kabut yang perlahan turun, hingga mendirikan tenda di bawah langit malam bertabur bintang. Perjalanan dilanjutkan dengan summit attack menuju Hargo Dumilah untuk menyambut momen matahari terbit yang menghangatkan savana dan samudera awan.',
                'impact' => 'Pendakian ini mengajarkan kesabaran, kerendahan hati, serta rasa hormat mendalam terhadap alam. Berdiri di salah satu puncak tertinggi di Pulau Jawa menjadi pengingat bahwa setiap perjuangan menanjak selalu terbayar lunas dengan lanskap yang menakjubkan.',
                'gallery_images' => [
                    'projects/gallery/V7YMhrbEONFnL9sRh7IVKCEyuBBPe6sGsKadk9Ii.jpg',
                    'projects/gallery/SrFVuxtZnUglc7FpoVJUb8wW9MgDkJyNeaAXGqP8.jpg',
                    'projects/gallery/TTOJSJcdPbV1c62sju9o7r90OolJ8sITh6oUfFEr.jpg',
                    'projects/gallery/mRomhg7PcctKhJpdSp3175DKdi7CyzKTCFIftCW7.jpg',
                    'projects/gallery/3LwVJHAYAe9P11HnmIUxqGWZ5qODBFFwayqOSziX.jpg',
                    'projects/gallery/F9C3YXZx3YyJknndH1QHouvjkSXZwpDbqsCPflNn.jpg',
                    'projects/gallery/H72QacqlwijYlp8u9ZWiWexggGcnh47uAJwGnZxg.jpg',
                    'projects/gallery/MU9ndNvgFt41F5c3t1qLZtXXIp2oTflBlrXlQt0e.jpg',
                    'projects/gallery/pi4ZTwNS3dJGRMfFSkMlF6twiQqdACSuQzmNL5C.jpg',
                    'projects/gallery/nYfqkWZiyXMxqO4BXmNahctBs7kfPPEv4oa3LDC9.jpg',
                    'projects/gallery/P9W7s04Oadb8j8qOawaCU4x4jbRpSU5AuKLPylgN.jpg',
                ],
                'is_featured' => true,
            ],
        ];

        foreach ($projects as $projectData) {
            Project::create($projectData);
        }

        // Clear and seed Skills / Hobi
        Skill::truncate();
        $skills = [
            ['name' => 'Eksplorasi Alam & Camping', 'level' => 'Sangat Suka', 'order' => 1],
            ['name' => 'Fotografi Perjalanan', 'level' => 'Hobi', 'order' => 2],
            ['name' => 'Wisata Kuliner & Cafe', 'level' => 'Favorit', 'order' => 3],
            ['name' => 'Road Trip & Traveling', 'level' => 'Sangat Suka', 'order' => 4],
            ['name' => 'Hunting Sunset & Pantai', 'level' => 'Favorit', 'order' => 5],
            ['name' => 'Itinerary & Trip Planning', 'level' => 'Santai', 'order' => 6],
        ];

        foreach ($skills as $skillData) {
            Skill::create($skillData);
        }

        // Clear and seed Timeline / Jejak Perjalanan
        Timeline::truncate();
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
            Timeline::create($timelineData);
        }

        // Seed Sample Contact Message
        Contact::updateOrCreate(
            ['email' => 'traveler@example.com'],
            [
                'name' => 'Budi Traveler',
                'message' => 'Halo Thoriq! Rekomendasi spot hiking dan foto pemandangannya sangat keren! Ada rencana trip ke gunung mana lagi berikutnya?',
                'is_read' => false,
            ]
        );
    }
}
