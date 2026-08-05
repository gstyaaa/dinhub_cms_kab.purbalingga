<?php

namespace App\Filament\Resources\DokumenPublik\Pages;

use App\Filament\Resources\DokumenPublik\DokumenPublikResource;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;

class EditDokumenPublik extends EditRecord
{
    protected static string $resource = DokumenPublikResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Poin 9: Tombol kecil "Lihat PDF Saat Ini" membuka PDF di tab baru
            Action::make('view_current_pdf')
                ->label('Lihat PDF Saat Ini')
                ->icon('heroicon-o-arrow-top-right-on-square')
                ->color('info')
                ->size('sm')
                ->url(fn (): ?string => $this->record->file_path ? Storage::url($this->record->file_path) : null)
                ->openUrlInNewTab()
                ->visible(fn (): bool => !empty($this->record->file_path)),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
