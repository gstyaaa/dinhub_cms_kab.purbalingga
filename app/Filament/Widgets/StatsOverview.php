<?php

namespace App\Filament\Widgets;

use App\Models\GalleryImage;
use App\Models\Post;
use App\Models\Question;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected static ?int $sort = 2;

    protected function getStats(): array
    {
        return [
            Stat::make('Total Berita', Post::count())
                ->description('Jumlah berita terdaftar')
                ->descriptionIcon(Heroicon::OutlinedDocumentText)
                ->color('primary'),

            Stat::make('Berita Diterbitkan', Post::where('status', 'published')->count())
                ->description('Berita tayang di portal')
                ->descriptionIcon(Heroicon::OutlinedCheckCircle)
                ->color('success'),

            Stat::make('Galeri Foto', GalleryImage::count())
                ->description('Dokumentasi kegiatan')
                ->descriptionIcon(Heroicon::OutlinedPhoto)
                ->color('info'),

            Stat::make('Pertanyaan Masuk', Question::count())
                ->description('Pesan dari warga')
                ->descriptionIcon(Heroicon::OutlinedChatBubbleLeftRight)
                ->color('warning'),
        ];
    }
}