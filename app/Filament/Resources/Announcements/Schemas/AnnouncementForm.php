<?php

namespace App\Filament\Resources\Announcements\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class AnnouncementForm
{
    public static function configure(Schema $schema): Schema
{
    return $schema
        ->columns(2)
        ->components([

            TextInput::make('title')
                ->label('Judul Pengumuman')
                ->placeholder('Masukkan judul pengumuman')
                ->required()
                ->maxLength(255)
                ->columnSpanFull(),

            Textarea::make('content')
                ->label('Isi Pengumuman')
                ->placeholder('Masukkan isi pengumuman...')
                ->rows(6)
                ->required()
                ->columnSpanFull(),

            DatePicker::make('publish_date')
                ->label('Tanggal Publish')
                ->native(false)
                ->default(now()),

            Toggle::make('is_active')
                ->label('Aktif')
                ->default(true),
            Toggle::make('is_active')
                ->label('Aktif')
                ->default(true),

            Toggle::make('show_on_running_text')
                ->label('Tampilkan di Running Text')
                ->default(false),

        ]);
}
}
