<?php

namespace App\Filament\Resources\Posts\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class PostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                ImageColumn::make('thumbnail')
                    ->label('Thumbnail')
                    ->disk('public')
                    ->square()
                    ->height(60),

                TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable()
                    ->limit(40)
                    ->tooltip(fn ($record) => $record->title),

                TextColumn::make('category.name')
                    ->label('Kategori')
                    ->badge()
                    ->sortable()
                    ->searchable(),

                TextColumn::make('author.name')
                    ->label('Penulis')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'published' => 'success',
                        'draft' => 'warning',
                        default => 'gray',
                    }),

                IconColumn::make('is_headline')
                    ->label('Headline')
                    ->boolean(),

                TextColumn::make('published_at')
                    ->label('Publish')
                    ->dateTime('d M Y')
                    ->sortable(),

            ])

            ->filters([

                SelectFilter::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Published',
                    ]),

                TrashedFilter::make(),

            ])

            ->recordActions([
                EditAction::make()
                    ->label('Ubah'),
            ])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->label('Hapus Pilihan'),
                    ForceDeleteBulkAction::make()
                        ->label('Hapus Permanen'),
                    RestoreBulkAction::make()
                        ->label('Pulihkan Pilihan'),
                ])->label('Tindakan Massal'),
            ])
            ->defaultSort('created_at', 'desc')
            ->emptyStateHeading('Belum Ada Berita')
            ->emptyStateDescription('Silakan tulis dan publikasikan berita baru.')
            ->emptyStateIcon('heroicon-o-newspaper');
    }
}