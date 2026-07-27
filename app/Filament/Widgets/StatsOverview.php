<?php

namespace App\Filament\Widgets;

use App\Models\GalleryAlbum;

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
                ->description('Semua berita terdaftar')
                ->descriptionIcon(Heroicon::OutlinedDocumentText)
                ->color('primary'),

            Stat::make('Berita Published', Post::where('status', 'published')->count())
                ->description('Sudah tayang di publik')
                ->descriptionIcon(Heroicon::OutlinedCheckCircle)
                ->color('success'),

            Stat::make('Galeri Album', GalleryAlbum::count())
                ->description('Album dokumentasi foto')
                ->descriptionIcon(Heroicon::OutlinedPhoto)
                ->color('info'),

            Stat::make('Pertanyaan Masuk', Question::count())
                ->description('Pesan & aspirasi warga')
                ->descriptionIcon(Heroicon::OutlinedQuestionMarkCircle)
                ->color('warning'),
        ];
    }
}