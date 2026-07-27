<?php

namespace Database\Seeders;

use App\Models\PpidPage;
use Illuminate\Database\Seeder;

class PpidPageSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            [
                'category' => 'profil_ppid',
                'title' => 'Profil PPID',
            ],
            [
                'category' => 'program_kegiatan',
                'title' => 'Program & Kegiatan',
            ],
            [
                'category' => 'sakip',
                'title' => 'SAKIP',
            ],
            [
                'category' => 'peraturan',
                'title' => 'Peraturan',
            ],
        ];

        foreach ($pages as $page) {
            PpidPage::updateOrCreate(
                [
                    'category' => $page['category'],
                ],
                [
                    'title' => $page['title'],
                    'content' => null,
                    'is_published' => true,
                ]
            );
        }
    }
}