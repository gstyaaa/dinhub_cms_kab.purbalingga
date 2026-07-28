<?php

namespace App\Filament\Resources\Announcements\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class AnnouncementForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                TextInput::make('title')
                    ->label('Judul Pengumuman')
                    ->placeholder('Masukkan judul pengumuman')
                    ->required()
                    ->maxLength(255),

                Textarea::make('content')
                    ->label('Isi Pengumuman')
                    ->placeholder('Masukkan isi pengumuman...')
                    ->rows(6)
                    ->required(),

                Toggle::make('is_active')
                    ->label('Status Aktif')
                    ->default(true),
            ]);
    }
}
