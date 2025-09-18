<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    // Dashboard user content - konten yang sebenarnya ada di halaman dashboard
    private $dashboardContent = [
        // Profil Page
        [
            'title' => 'Profil Pengguna',
            'description' => 'Kelola informasi profil Anda, update foto profil, nama lengkap, lokasi, dan detail lainnya.',
            'category' => 'profil',
            'category_name' => 'Profil',
            'author' => 'Lifia System',
            'url' => '/profil',
            'image' => '/images/profile-icon.png',
            'keywords' => ['profil', 'user', 'pengguna', 'foto', 'nama', 'lokasi', 'detail', 'informasi', 'update']
        ],
        [
            'title' => 'Detail Lainnya',
            'description' => 'Lengkapi informasi profil Anda dengan detail tambahan dan pengaturan akun.',
            'category' => 'profil',
            'category_name' => 'Profil',
            'author' => 'Lifia System',
            'url' => '/profil',
            'image' => '/images/profile-icon.png',
            'keywords' => ['detail', 'profil', 'pengaturan', 'akun', 'informasi', 'lengkap']
        ],
        
        // Aktivitas Page
        [
            'title' => 'Dashboard Aktivitas',
            'description' => 'Pantau dan kelola aktivitas harian Anda dalam satu dashboard yang mudah digunakan.',
            'category' => 'aktivitas',
            'category_name' => 'Aktivitas',
            'author' => 'Lifia System',
            'url' => '/aktivitas',
            'image' => '/images/activity-icon.png',
            'keywords' => ['dashboard', 'aktivitas', 'harian', 'pantau', 'kelola', 'monitor']
        ],
        
        // Koleksi Page
        [
            'title' => 'Artikel Favorit',
            'description' => 'Kumpulan artikel favorit yang telah Anda simpan untuk dibaca kembali.',
            'category' => 'koleksi',
            'category_name' => 'Koleksi',
            'author' => 'Lifia System',
            'url' => '/koleksi',
            'image' => '/images/collection-icon.png',
            'keywords' => ['artikel', 'favorit', 'koleksi', 'simpan', 'bookmark', 'saved']
        ],
        
        // Progres Page
        [
            'title' => 'Progress Terbaru',
            'description' => 'Pantau perkembangan kesehatan Anda setiap hari dengan tracking progress yang detail.',
            'category' => 'progres',
            'category_name' => 'Progres',
            'author' => 'Lifia System',
            'url' => '/progres',
            'image' => '/images/progress-icon.png',
            'keywords' => ['progress', 'perkembangan', 'kesehatan', 'tracking', 'pantau', 'harian']
        ],
        [
            'title' => 'Rencana Hari Ini',
            'description' => 'Lihat dan kelola rencana aktivitas kesehatan Anda untuk hari ini.',
            'category' => 'progres',
            'category_name' => 'Progres',
            'author' => 'Lifia System',
            'url' => '/progres',
            'image' => '/images/progress-icon.png',
            'keywords' => ['rencana', 'hari ini', 'aktivitas', 'kesehatan', 'planning', 'jadwal']
        ],
        [
            'title' => 'Olahraga',
            'description' => 'Cardio 30 menit - Mulai sesi olahraga harian Anda untuk menjaga kebugaran.',
            'category' => 'progres',
            'category_name' => 'Progres',
            'author' => 'Lifia System',
            'url' => '/progres',
            'image' => '/images/exercise-icon.png',
            'keywords' => ['olahraga', 'cardio', 'fitness', 'kebugaran', 'latihan', 'exercise']
        ],
        [
            'title' => 'Nutrisi',
            'description' => 'Makan sehat 1000 kalori - Pantau asupan nutrisi harian Anda.',
            'category' => 'progres',
            'category_name' => 'Progres',
            'author' => 'Lifia System',
            'url' => '/progres',
            'image' => '/images/nutrition-icon.png',
            'keywords' => ['nutrisi', 'makan', 'sehat', 'kalori', 'asupan', 'diet', 'makanan']
        ],
        [
            'title' => 'Tidur',
            'description' => 'Target 8 jam - Pantau kualitas dan durasi tidur Anda untuk kesehatan optimal.',
            'category' => 'progres',
            'category_name' => 'Progres',
            'author' => 'Lifia System',
            'url' => '/progres',
            'image' => '/images/sleep-icon.png',
            'keywords' => ['tidur', 'sleep', 'istirahat', 'target', 'kualitas', 'durasi', 'jam']
        ],
        [
            'title' => 'Progress Aktivitas',
            'description' => 'Tabel progress aktivitas harian Anda dengan detail pencapaian dan target.',
            'category' => 'progres',
            'category_name' => 'Progres',
            'author' => 'Lifia System',
            'url' => '/progres',
            'image' => '/images/progress-icon.png',
            'keywords' => ['progress', 'aktivitas', 'tabel', 'pencapaian', 'target', 'detail']
        ],
        
        // Premium Page
        [
            'title' => 'Premium Anda Aktif',
            'description' => 'Nikmati semua fitur premium Lifia untuk pengalaman kesehatan yang lebih lengkap.',
            'category' => 'premium',
            'category_name' => 'Premium',
            'author' => 'Lifia System',
            'url' => '/premium',
            'image' => '/images/premium-icon.png',
            'keywords' => ['premium', 'aktif', 'fitur', 'lengkap', 'upgrade', 'membership']
        ],
        [
            'title' => 'Fitur Premium',
            'description' => 'Akses ke semua fitur premium termasuk konsultasi ahli, program khusus, dan konten eksklusif.',
            'category' => 'premium',
            'category_name' => 'Premium',
            'author' => 'Lifia System',
            'url' => '/premium',
            'image' => '/images/premium-icon.png',
            'keywords' => ['fitur', 'premium', 'konsultasi', 'ahli', 'program', 'eksklusif', 'konten']
        ],
        
        // Non-Premium Page
        [
            'title' => 'Paket Latihan yang Fleksibel',
            'description' => 'Pilih paket latihan yang sesuai dengan tujuan Anda. Dapatkan panduan, latihan, dan dukungan sesuai kebutuhan.',
            'category' => 'nonpremium',
            'category_name' => 'Paket',
            'author' => 'Lifia System',
            'url' => '/nonpremium',
            'image' => '/images/package-icon.png',
            'keywords' => ['paket', 'latihan', 'fleksibel', 'panduan', 'dukungan', 'kebutuhan', 'tujuan']
        ],
        [
            'title' => 'Paket Gratis',
            'description' => '2 rencana latihan mingguan, video tutorial dasar, pelacakan progres sederhana, dukungan via email.',
            'category' => 'nonpremium',
            'category_name' => 'Paket',
            'author' => 'Lifia System',
            'url' => '/nonpremium',
            'image' => '/images/free-icon.png',
            'keywords' => ['gratis', 'free', 'rencana', 'latihan', 'mingguan', 'tutorial', 'progres', 'email']
        ],
        [
            'title' => 'Paket Standar',
            'description' => 'Semua rencana latihan, video tutorial premium, pelacakan progres + nutrisi, dukungan via chat.',
            'category' => 'nonpremium',
            'category_name' => 'Paket',
            'author' => 'Lifia System',
            'url' => '/nonpremium',
            'image' => '/images/standard-icon.png',
            'keywords' => ['standar', 'standard', 'premium', 'tutorial', 'nutrisi', 'chat', 'lengkap']
        ],
        [
            'title' => 'Paket Pelajar',
            'description' => 'Semua fitur Standar, diskon khusus pelajar, grup komunitas pelajar dengan harga terjangkau.',
            'category' => 'nonpremium',
            'category_name' => 'Paket',
            'author' => 'Lifia System',
            'url' => '/nonpremium',
            'image' => '/images/student-icon.png',
            'keywords' => ['pelajar', 'student', 'diskon', 'komunitas', 'terjangkau', 'grup']
        ]
    ];

    public function search(Request $request)
    {
        $query = $request->get('q', '');
        $results = [];

        if (empty($query)) {
            // If no query, show all categories
            return view('search.results', [
                'query' => '',
                'results' => [],
                'categories' => $this->getCategories()
            ]);
        }

        // Search through dashboard content
        foreach ($this->dashboardContent as $content) {
            $score = $this->calculateRelevanceScore($content, $query);
            if ($score > 0) {
                $content['relevance_score'] = $score;
                $results[] = $content;
            }
        }

        // Sort by relevance score (highest first)
        usort($results, function($a, $b) {
            return $b['relevance_score'] <=> $a['relevance_score'];
        });

        return view('search.results', [
            'query' => $query,
            'results' => $results,
            'categories' => $this->getCategories()
        ]);
    }

    public function suggestions(Request $request)
    {
        $query = $request->get('q', '');
        $suggestions = [];

        if (strlen($query) >= 2) {
            foreach ($this->dashboardContent as $content) {
                $score = $this->calculateRelevanceScore($content, $query);
                if ($score > 0) {
                    $content['relevance_score'] = $score;
                    $suggestions[] = $content;
                }
            }

            // Sort by relevance score
            usort($suggestions, function($a, $b) {
                return $b['relevance_score'] <=> $a['relevance_score'];
            });

            // Limit to 6 results for dropdown
            $suggestions = array_slice($suggestions, 0, 6);

            // Format for dropdown display
            $formatted = [];
            foreach ($suggestions as $article) {
                $formatted[] = [
                    'title' => $article['title'],
                    'description' => substr($article['description'], 0, 100) . '...',
                    'category' => $article['category_name'],
                    'author' => $article['author'],
                    'url' => $article['url'],
                    'image' => $article['image'] ?? '/image/Rectangle 127.png'
                ];
            }

            return response()->json($formatted);
        }

        return response()->json([]);
    }

    public function quickSearch(Request $request)
    {
        $query = $request->get('q', '');
        $results = [];

        if (strlen($query) >= 1) {
            foreach ($this->dashboardContent as $content) {
                $score = $this->calculateRelevanceScore($content, $query);
                if ($score > 0) {
                    $content['relevance_score'] = $score;
                    $results[] = $content;
                }
            }

            // Sort by relevance score
            usort($results, function($a, $b) {
                return $b['relevance_score'] <=> $a['relevance_score'];
            });

            // Limit to 8 results for quick search
            $results = array_slice($results, 0, 8);
        }

        return response()->json([
            'query' => $query,
            'results' => $results,
            'total' => count($results)
        ]);
    }

    private function calculateRelevanceScore($article, $query)
    {
        $score = 0;
        $query = strtolower($query);

        // Title match (highest priority)
        if (stripos($article['title'], $query) !== false) {
            $score += 10;
        }

        // Description match
        if (stripos($article['description'], $query) !== false) {
            $score += 5;
        }

        // Category match
        if (stripos($article['category_name'], $query) !== false) {
            $score += 3;
        }

        // Keywords match
        foreach ($article['keywords'] as $keyword) {
            if (stripos($keyword, $query) !== false) {
                $score += 2;
                break;
            }
        }

        return $score;
    }

    private function getCategories()
    {
        return [
            'profil' => 'Profil',
            'aktivitas' => 'Aktivitas',
            'koleksi' => 'Koleksi',
            'progres' => 'Progres',
            'premium' => 'Premium',
            'nonpremium' => 'Paket'
        ];
    }
}
