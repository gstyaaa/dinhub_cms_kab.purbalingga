<?php

namespace App\Filament\Resources\DokumenPublik\Pages;

use App\Filament\Resources\DokumenPublik\DokumenPublikResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDokumenPublik extends ListRecords
{
    protected static string $resource = DokumenPublikResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Tambah Dokumen Baru'),
        ];
    }
}
