<?php

namespace App\Filament\Resources\PostCategories\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PostCategoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
    ->label('Nama Kategori')
    ->searchable()
    ->sortable(),

TextColumn::make('slug')
    ->label('Slug')
    ->searchable(),

IconColumn::make('is_active')
    ->label('Aktif')
    ->boolean(),

TextColumn::make('created_at')
    ->label('Dibuat')
    ->dateTime('d M Y')
    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make()
                    ->label('Ubah'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->label('Hapus Pilihan'),
                ])->label('Tindakan Massal'),
            ])
            ->emptyStateHeading('Belum Ada Kategori')
            ->emptyStateDescription('Silakan buat kategori berita baru.')
            ->emptyStateIcon('heroicon-o-folder');
    }
}
