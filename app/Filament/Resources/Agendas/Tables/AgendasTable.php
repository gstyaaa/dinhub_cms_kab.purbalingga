<?php

namespace App\Filament\Resources\Agendas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AgendasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('title')
                    ->label('Judul Agenda')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('event_date')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->sortable(),

                TextColumn::make('event_time')
                    ->label('Jam')
                    ->time('H:i'),

                TextColumn::make('location')
                    ->label('Lokasi')
                    ->searchable()
                    ->limit(30),

                IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),

            ])

            ->defaultSort('event_date', 'desc')

            ->filters([

            ])

            ->recordActions([
                EditAction::make(),
            ])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}