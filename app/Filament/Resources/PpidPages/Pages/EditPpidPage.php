<?php

namespace App\Filament\Resources\PpidPages\Pages;

use App\Filament\Resources\PpidPages\PpidPageResource;
use Filament\Resources\Pages\EditRecord;

class EditPpidPage extends EditRecord
{
    protected static string $resource = PpidPageResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Halaman PPID berhasil diperbarui.';
    }
}