<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function sarapanSeimbang()
    {
        $data = [
            'title' => 'Mulai Hari Dengan Sarapan Seimbang',
            'author' => 'Fina Marlina Siregar',
            'content' => [
                'intro' => 'Sarapan bukan sekadar rutinitas pagi yang dilakukan untuk mengisi perut kosong. Namun, sarapan adalah salah satu kegiatan terpenting yang berdampak signifikan pada kesehatan tubuh kamu secara keseluruhan.',
                'benefits' => [
                    [
                        'title' => 'Energi Full Seharian',
                        'description' => 'Setelah berpuasa semalaman, tubuh memerlukan asupan nutrisi untuk berfungsi optimal. Sarapan yang tepat memberikan energi yang dibutuhkan untuk memulai hari dengan produktivitas optimal.'
                    ],
                    [
                        'title' => 'Otak Jadi Super Fokus',
                        'description' => 'Glukosa adalah bahan bakar utama otak. Ketika kamu sarapan dengan nutrisi yang tepat, otak mendapat pasokan glukosa yang cukup untuk berpikir jernih dan konsentrasi optimal sepanjang hari.'
                    ],
                    [
                        'title' => 'Perut Aman, Nafsu Makan Terkontrol',
                        'description' => 'Melewatkan sarapan justru membuat kamu cenderung makan berlebihan di siang atau malam hari. Sarapan membantu mengatur hormon lapar dan kenyang, sehingga nafsu makan lebih terkontrol.'
                    ],
                    [
                        'title' => 'Boost Kesehatan Jangka Panjang',
                        'description' => 'Kebiasaan sarapan teratur telah terbukti menurunkan risiko obesitas, diabetes, dan penyakit jantung. Ini investasi kesehatan jangka panjang yang sangat berharga.'
                    ]
                ]
            ]
        ];

        return view('sarapan-seimbang', compact('data'));
    }
}