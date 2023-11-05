<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class WebController extends Controller
{

    public function index()
    {
        $features = [
            (object) [
                "title" => "Pantau Risiko Real-time",
                "desc" => "Cek risiko langsung dari lapangan dengan Kompa. Kami akan beritahu kamu seketika jika ada yang perlu diperhatikan. Praktis, kan?",
                "image" => asset("assets/svg/feature-1.svg")
            ],
            (object) [
                "title" => "Laporan Gak Ribet",
                "desc" => "Laporkan risiko dan insiden dengan mudah. Kompa bikin laporan jadi lebih simpel. Kamu gak akan stress lagi.",
                "image" => asset("assets/svg/feature-2.svg")
            ],
            (object) [
                "title" => "Kolaborasi Tim Keren",
                "desc" => "Bikin tim K3Lmu bekerja sama dengan lancar. Kompa bikin semua orang bisa ikutan buat laporan HIRAC.",
                "image" => asset("assets/svg/feature-3.svg")
            ],
            (object) [
                "title" => "Data Jadi Asyik",
                "desc" => "Kompa punya analisis data pintar. Kamu bisa lihat tren dan pola risiko dengan mudah. Jadi, kamu bisa pake data buat keputusan cerdas.",
                "image" => asset("assets/svg/feature-4.svg")
            ],
            (object) [
                "title" => "Integrasi Gampang",
                "desc" => "Kompa bisa terhubung dengan sistem lain tanpa ribet. Jadi, kamu gak akan susah-susah lagi buat integrasi.",
                "image" => asset("assets/svg/feature-5.svg")
            ],
            (object) [
                "title" => "Data Aman Banget",
                "desc" => "Data kamu aman di tangan kami. Kompa pake teknologi canggih buat melindungi info-info pentingmu. Makin tenang kerja, kan?",
                "image" => asset("assets/svg/feature-6.svg")
            ]
        ];

        $steps = [
            (object) [
                "title" => "Catat Risiko dengan Cepat",
                "desc" => "Pertama, catat risiko yang kamu temui di lapangan. Pake smartphone atau komputer, gampang banget!",
            ],
            (object) [
                "title" => "Kolaborasi Bareng Tim",
                "desc" => "Langkah kedua, ajak tim K3Lmu buat bekerja sama. Mereka bisa tambahin info, kasih komentar, pokoknya seru!",
            ],
            (object) [
                "title" => "Evaluasi dan Keputusan Cerdas",
                "desc" => "Terakhir, kita evaluasi data dan ambil keputusan cerdas. Hasilnya? Keamanan yang lebih baik untuk semua.",
            ],
        ];

        return view('web.home.index', compact('features', 'steps'));
    }

}
