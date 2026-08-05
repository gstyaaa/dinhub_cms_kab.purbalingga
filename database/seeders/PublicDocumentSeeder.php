<?php

namespace Database\Seeders;

use App\Models\PublicDocument;
use Illuminate\Database\Seeder;

class PublicDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $documents = [
            // Program & Kegiatan
            [
                'category' => 'Program & Kegiatan',
                'title' => 'Rencana Kerja dan Anggaran',
            ],
            [
                'category' => 'Program & Kegiatan',
                'title' => 'Dokumen Pelaksanaan Anggaran',
            ],
            [
                'category' => 'Program & Kegiatan',
                'title' => 'Realisasi Anggaran',
            ],
            [
                'category' => 'Program & Kegiatan',
                'title' => 'Realisasi Keuangan',
            ],
            [
                'category' => 'Program & Kegiatan',
                'title' => 'Neraca',
            ],
            [
                'category' => 'Program & Kegiatan',
                'title' => 'Daftar Aset',
            ],

            // SAKIP
            [
                'category' => 'SAKIP',
                'title' => 'Cascading',
            ],
            [
                'category' => 'SAKIP',
                'title' => 'Indikator Kinerja Utama',
            ],
            [
                'category' => 'SAKIP',
                'title' => 'Rencana Strategis',
            ],
            [
                'category' => 'SAKIP',
                'title' => 'Rencana Kerja Tahunan',
            ],
            [
                'category' => 'SAKIP',
                'title' => 'Perjanjian Kinerja',
            ],
            [
                'category' => 'SAKIP',
                'title' => 'Laporan Kinerja Instansi Pemerintah',
            ],

            // Peraturan
            [
                'category' => 'Peraturan',
                'title' => 'Keputusan Menteri',
            ],
            [
                'category' => 'Peraturan',
                'title' => 'Peraturan Daerah',
            ],
            [
                'category' => 'Peraturan',
                'title' => 'Peraturan Bupati',
            ],
            [
                'category' => 'Peraturan',
                'title' => 'Peraturan Pemerintah',
            ],

            // Standar Pelayanan & Dokumen Pendukung
            [
                'category' => 'Standar Pelayanan',
                'title' => 'SK Standar Pelayanan Dinas Perhubungan',
            ],
            [
                'category' => 'Maklumat Pelayanan',
                'title' => 'Maklumat Pelayanan Dinas Perhubungan',
            ],
            [
                'category' => 'Kode Etik',
                'title' => 'Kode Etik Pelayanan Publik',
            ],
            [
                'category' => 'Nilai SKM',
                'title' => 'Nilai SKM Semester I',
            ],
            [
                'category' => 'Nilai SKM',
                'title' => 'Nilai SKM Semester II',
            ],
        ];

        foreach ($documents as $doc) {
            PublicDocument::firstOrCreate(
                [
                    'category' => $doc['category'],
                    'title' => $doc['title'],
                ],
                [
                    'file_path' => null,
                    'is_active' => true,
                ]
            );
        }
    }
}
