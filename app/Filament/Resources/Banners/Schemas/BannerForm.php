<?php

namespace App\Filament\Resources\Banners\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BannerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Informasi Banner')
                    ->schema([

                        TextInput::make('title')
                            ->label('Judul Banner')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('subtitle')
                            ->label('Sub Judul')
                            ->maxLength(255),

                        FileUpload::make('image')
                            ->label('Gambar Banner')
                            ->disk('public')
                            ->directory('banners')
                            ->image()
                            ->required(),

                        TextInput::make('button_text')
                            ->label('Teks Tombol'),

                        TextInput::make('button_link')
                            ->label('Link Tombol')
                            ->placeholder('/berita atau https://example.com')
                            ->maxLength(255),

                        TextInput::make('sort_order')
                            ->label('Urutan')
                            ->numeric()
                            ->default(0)
                            ->required(),

                        Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(true),

                    ])
                    ->columns(2),

            ]);
    }
}