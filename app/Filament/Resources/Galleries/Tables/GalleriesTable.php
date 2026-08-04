<?php

namespace App\Filament\Resources\Galleries\Tables;

use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class GalleriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                ImageColumn::make('image')
                    ->label('Foto')
                    ->disk('public')
                    ->square()
                    ->size(70),

                TextColumn::make('title')
                    ->label('Judul / Kegiatan')
                    ->placeholder('Tanpa Judul')
                    ->searchable(),

                IconColumn::make('is_published')
                    ->label('Tayang')
                    ->boolean(),

                TextColumn::make('created_at')
                    ->label('Tanggal Upload')
                    ->date('d M Y, H:i'),
            ])
            ->recordActions([
                EditAction::make()
                    ->label('Ubah'),
                DeleteAction::make()
                    ->label('Hapus')
                    ->modalHeading('Konfirmasi Hapus Galeri')
                    ->modalDescription('Apakah Anda yakin ingin menghapus foto galeri ini? Tindakan ini tidak dapat dibatalkan.')
                    ->modalSubmitActionLabel('Ya, Hapus'),
            ])
            ->emptyStateHeading('Belum Ada Foto Galeri')
            ->emptyStateDescription('Silakan unggah foto kegiatan dinas perhubungan.')
            ->emptyStateIcon('heroicon-o-rectangle-stack');
    }
}
