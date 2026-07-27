<?php

namespace App\Filament\Resources\PpidPages\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PpidPagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('category')
                    ->label('Kategori')
                    ->badge()
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'profil_ppid' => 'Profil PPID',
                        'program_kegiatan' => 'Program & Kegiatan',
                        'sakip' => 'SAKIP',
                        'peraturan' => 'Peraturan',
                        default => $state,
                    }),

                TextColumn::make('title')
                    ->label('Judul')
                    ->searchable(),

                IconColumn::make('is_published')
                    ->label('Status')
                    ->boolean(),

                TextColumn::make('updated_at')
                    ->label('Terakhir Diubah')
                    ->since(),
            ])
            ->filters([])
            ->recordActions([
                EditAction::make(),
            ]);
    }
}