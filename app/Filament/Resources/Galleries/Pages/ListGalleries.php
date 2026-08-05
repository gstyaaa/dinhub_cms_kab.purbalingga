<?php

namespace App\Filament\Resources\Galleries\Pages;

use App\Filament\Resources\Galleries\GalleryResource;
use App\Models\SiteSetting;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;

class ListGalleries extends ListRecords
{
    protected static string $resource = GalleryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('toggleGalleryStatus')
                ->label(fn () => SiteSetting::getSettings()->gallery_active ? 'Galeri: Aktif' : 'Galeri: Nonaktif')
                ->color(fn () => SiteSetting::getSettings()->gallery_active ? 'success' : 'danger')
                ->icon(fn () => SiteSetting::getSettings()->gallery_active ? 'heroicon-o-eye' : 'heroicon-o-eye-slash')
                ->tooltip(fn () => SiteSetting::getSettings()->gallery_active ? 'Klik untuk menyembunyikan galeri dari website' : 'Klik untuk menampilkan galeri di website')
                ->action(function () {
                    $settings = SiteSetting::getSettings();
                    $isActive = !$settings->gallery_active;
                    $settings->update(['gallery_active' => $isActive]);

                    Notification::make()
                        ->title($isActive ? 'Galeri Berhasil Diaktifkan!' : 'Galeri Berhasil Dinonaktifkan!')
                        ->body($isActive ? 'Menu Galeri sekarang tampil di Navbar website.' : 'Menu Galeri disembunyikan dari website.')
                        ->success()
                        ->send();
                }),

            CreateAction::make()
                ->label('Tambah Foto Galeri Baru'),
        ];
    }
}

