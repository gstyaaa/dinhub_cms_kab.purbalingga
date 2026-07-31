<?php

namespace App\Filament\Resources\Announcements\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AnnouncementsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

    TextColumn::make('title')
        ->label('Judul')
        ->searchable()
        ->sortable()
        ->limit(40),

    TextColumn::make('publish_date')
        ->label('Tanggal')
        ->date('d M Y')
        ->sortable(),

    IconColumn::make('is_active')
        ->label('Status')
        ->boolean(),

    TextColumn::make('created_at')
        ->label('Dibuat')
        ->dateTime('d M Y H:i')
        ->toggleable(isToggledHiddenByDefault: true),

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
            ->emptyStateHeading('Belum Ada Pengumuman')
            ->emptyStateDescription('Silakan buat pengumuman baru untuk ditampilkan pada running text homepage.')
            ->emptyStateIcon('heroicon-o-megaphone');
    }
}
