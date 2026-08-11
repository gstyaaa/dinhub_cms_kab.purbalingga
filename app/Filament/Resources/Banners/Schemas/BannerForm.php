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

                Section::make('Unggah Gambar Banner')
                    ->schema([

                        FileUpload::make('image')
                            ->label('Gambar Banner')
                            ->disk('public')
                            ->directory('banners')
                            ->image()
                            ->required()
                            ->helperText('Disarankan menggunakan gambar berformat Lanskap / Rasio 16:9 (contoh: 1920 × 600 px) agar tampil maksimal.')
                            ->columnSpanFull(),

                        TextInput::make('title')
                            ->label('Nama / Judul Banner (Opsional)')
                            ->placeholder(fn () => 'Contoh: Banner ' . ((\App\Models\Banner::max('sort_order') ?? 0) + 1))
                            ->maxLength(255),

                        TextInput::make('sort_order')
                            ->label('Urutan Tampil')
                            ->helperText('Ditentukan secara otomatis (urutan terakhir + 1).')
                            ->numeric()
                            ->default(fn () => (\App\Models\Banner::max('sort_order') ?? 0) + 1)
                            ->disabled()
                            ->dehydrated()
                            ->required(),

                    ])
                    ->columns(2),

            ]);
    }
}