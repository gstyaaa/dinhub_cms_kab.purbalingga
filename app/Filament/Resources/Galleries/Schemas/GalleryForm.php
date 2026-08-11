<?php

namespace App\Filament\Resources\Galleries\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class GalleryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Foto Kegiatan')
                    ->schema([
                        TextInput::make('title')
                            ->label('Judul / Deskripsi Kegiatan (Opsional)')
                            ->placeholder('Contoh: Sosialisasi Keselamatan Berlalulintas')
                            ->maxLength(255),

                        FileUpload::make('image')
                            ->label('File Foto')
                            ->disk('public')
                            ->directory('gallery')
                            ->image()
                            ->required(),
                    ]),
            ]);
    }
}
