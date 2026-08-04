<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'running_text',
        'running_text_active',
        'kadis_name',
        'kadis_title',
        'kadis_photo',
        'kadis_welcome_text',
    ];

    protected $casts = [
        'running_text_active' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::saved(function () {
            cache()->forget('site_settings_single');
        });
    }

    /**
     * Dapatkan instance tunggal dari pengaturan website.
     */
    public static function getSettings(): self
    {
        return static::firstOrCreate(
            ['id' => 1],
            [
                'running_text' => 'Selamat Datang di Website Resmi Dinas Perhubungan Kabupaten Purbalingga. Utamakan Keselamatan dalam Berlalulintas.',
                'running_text_active' => true,
                'kadis_name' => 'SUTRISNO, S.Sos',
                'kadis_title' => 'Kepala Dinas Perhubungan Kabupaten Purbalingga',
                'kadis_photo' => null,
                'kadis_welcome_text' => 'Website ini menjadi media informasi resmi mengenai pelayanan publik, berita, program kerja, serta berbagai kegiatan Dinas Perhubungan Kabupaten Purbalingga. Kami berkomitmen memberikan pelayanan transportasi yang aman, tertib, nyaman, dan berkelanjutan.',
            ]
        );
    }
}
