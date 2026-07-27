<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;

class LatestPosts extends TableWidget
{
    protected static ?int $sort = 4;

    protected static ?string $heading = 'Aktivitas Terbaru - Berita Terakhir';

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Post::query()
                    ->latest()
                    ->limit(5)
            )
            ->columns([
                ImageColumn::make('thumbnail')
                    ->label('')
                    ->disk('public')
                    ->square()
                    ->height(45),

                TextColumn::make('title')
                    ->label('Judul')
                    ->limit(50)
                    ->searchable(),

                TextColumn::make('category.name')
                    ->label('Kategori')
                    ->badge(),

                TextColumn::make('author.name')
                    ->label('Penulis'),

                BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'success' => 'published',
                        'warning' => 'draft',
                    ]),

                TextColumn::make('published_at')
                    ->label('Tanggal')
                    ->date('d M Y'),
            ]);
    }
}