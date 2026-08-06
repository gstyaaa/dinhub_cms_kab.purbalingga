<?php

namespace App\Http\Controllers;

use App\Models\PublicDocument;

class ServiceStandardController extends Controller
{
    /**
     * Halaman Standar Pelayanan
     */
    public function index()
    {
        $documents = PublicDocument::active()
            ->category('Standar Pelayanan')
            ->get();

        $posters = [
            [
                'title' => 'Pelayanan Pengujian Kendaraan Bermotor (KIR)',
                'description' => 'Standar pelayanan pengujian berkala kendaraan bermotor, persyaratan, alur, dan tarif retribusi.',
                'image' => asset('images/KIR.webp'),
            ],
            [
                'title' => 'Pelayanan Izin Trayek & Angkutan',
                'description' => 'Standar pelayanan penerbitan izin trayek angkutan umum penumpang di wilayah Kabupaten Purbalingga.',
                'image' => asset('images/Ijin Trayek.webp'),
            ],
            [
                'title' => 'Persetujuan Hasil Analisis Dampak Lalu Lintas (ANDALALIN)',
                'description' => 'Standar pelayanan rekomendasi dan persetujuan dokumen hasil analisis dampak lalu lintas.',
                'image' => asset('images/andalalin.webp'),
            ],
            [
                'title' => 'Pelayanan Penerangan Jalan Umum (PJU)',
                'description' => 'Standar pelayanan pengaduan, pemeliharaan, dan perbaikan sarana Penerangan Jalan Umum.',
                'image' => asset('images/PJU.webp'),
            ],
            [
                'title' => 'Pelayanan Retribusi Parkir Tepi Jalan Umum',
                'description' => 'Standar pelayanan pengelolaan dan pengawasan tempat retribusi parkir di tepi jalan umum.',
                'image' => asset('images/Retribusi Parkir.webp'),
            ],
        ];

        return view('standar-pelayanan', compact('documents', 'posters'));
    }
}
