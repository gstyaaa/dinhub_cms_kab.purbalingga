<?php

namespace App\Filament\Resources\DokumenPublik\Schemas;

use App\Models\PublicDocument;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class DokumenPublikForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi & Berkas Dokumen Publik')
                    ->description('Kelola judul, berkas PDF, dan status keaktifan dokumen publik instansi.')
                    ->schema([
                        Select::make('category')
                            ->label('Kategori Dokumen')
                            ->options(PublicDocument::CATEGORIES)
                            ->required()
                            ->native(false)
                            ->columnSpanFull(),

                        TextInput::make('title')
                            ->label('Nama / Judul Resmi Dokumen')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Contoh: Rencana Kerja dan Anggaran')
                            ->columnSpanFull(),

                        FileUpload::make('file_path')
                            ->label('Unggah Berkas PDF')
                            ->helperText('Hanya menerima file berformat PDF dengan ukuran maksimal 20 MB.')
                            ->disk('public')
                            ->directory('documents')
                            ->acceptedFileTypes(['application/pdf'])
                            ->maxSize(20480) // 20 MB
                            ->columnSpanFull(),

                        Toggle::make('is_active')
                            ->label('Status Aktif')
                            ->helperText('Jika dinonaktifkan, dokumen tidak akan ditampilkan pada portal publik.')
                            ->default(true),
                    ])
                    ->columns(2),
            ]);
    }
}
