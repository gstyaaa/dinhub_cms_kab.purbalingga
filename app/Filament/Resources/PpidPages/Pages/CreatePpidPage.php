<?php

namespace App\Filament\Resources\PpidPages\Pages;

use App\Filament\Resources\PpidPages\PpidPageResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePpidPage extends CreateRecord
{
    protected static string $resource = PpidPageResource::class;

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Halaman PPID berhasil dibuat.';
    }
}