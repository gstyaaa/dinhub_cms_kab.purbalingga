<?php

namespace App\Filament\Resources\PostCategories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PostCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
    ->label('Nama Kategori')
    ->required(),

TextInput::make('slug')
    ->label('Slug')
    ->required(),

Textarea::make('description')
    ->label('Deskripsi')
    ->columnSpanFull(),

Toggle::make('is_active')
    ->label('Aktif')
    ->default(true),
            ]);
    }
}
