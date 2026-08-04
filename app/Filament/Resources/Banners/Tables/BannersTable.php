<?php

namespace App\Filament\Resources\Banners\Tables;

use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BannersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('sort_order')
            ->columns([

                ImageColumn::make('image')
                    ->label('Banner')
                    ->disk('public')
                    ->square(),

                TextColumn::make('title')
                    ->label('Nama / Judul')
                    ->placeholder('Tanpa Judul')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('sort_order')
                    ->label('Urutan')
                    ->sortable(),

                IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->date('d M Y'),

            ])
            ->filters([

            ])
            ->recordActions([
                EditAction::make()
                    ->label('Ubah'),
                DeleteAction::make()
                    ->label('Hapus')
                    ->modalHeading('Konfirmasi Hapus Banner')
                    ->modalDescription('Apakah Anda yakin ingin menghapus banner ini? Tindakan ini tidak dapat dibatalkan.')
                    ->modalSubmitActionLabel('Ya, Hapus'),
            ])
            ->emptyStateHeading('Belum Ada Banner')
            ->emptyStateDescription('Silakan unggah gambar banner untuk slider di halaman depan.')
            ->emptyStateIcon('heroicon-o-photo');
    }
}