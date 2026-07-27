<?php

namespace App\Filament\Resources\PpidPages\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PpidPageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('category')
                    ->label('Kategori')
                    ->options([
                        'profil_ppid' => 'Profil PPID',
                        'program_kegiatan' => 'Program & Kegiatan',
                        'sakip' => 'SAKIP',
                        'peraturan' => 'Peraturan',
                    ])
                    ->disabled()
                    ->dehydrated()
                    ->required(),

                TextInput::make('title')
                    ->label('Judul')
                    ->required()
                    ->maxLength(255),

                RichEditor::make('content')
                    ->label('Isi Konten')
                    ->columnSpanFull(),

                FileUpload::make('attachment')
                    ->label('Lampiran (PDF)')
                    ->directory('ppid')
                    ->acceptedFileTypes([
                        'application/pdf',
                    ])
                    ->downloadable()
                    ->openable(),

                Toggle::make('is_published')
                    ->label('Publikasikan')
                    ->default(true),
            ])
            ->columns(2);
    }
}