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
                ->description('Total artikel berita')
                ->descriptionIcon(Heroicon::OutlinedDocumentText)
                ->chart([7, 10, 14, 18, 22, 28, 35])
                ->color('primary'),

            Stat::make('Berita Published', Post::where('status', 'published')->count())
                ->description('Tayang di portal publik')
                ->descriptionIcon(Heroicon::OutlinedCheckCircle)
                ->chart([5, 8, 12, 16, 20, 25, 30])
                ->color('success'),

            Stat::make('Galeri Foto', GalleryImage::count())
                ->description('Dokumentasi foto kegiatan')
                ->descriptionIcon(Heroicon::OutlinedPhoto)
                ->chart([2, 5, 8, 12, 15, 20, 25])
                ->color('info'),

            Stat::make('Pertanyaan Masuk', Question::count())
                ->description('Aspirasi & pesan warga')
                ->descriptionIcon(Heroicon::OutlinedQuestionMarkCircle)
                ->chart([1, 3, 2, 5, 4, 8, 10])
                ->color('warning'),
        ];
    }
}