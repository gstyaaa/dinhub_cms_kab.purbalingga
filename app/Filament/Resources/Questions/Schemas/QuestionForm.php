<?php

namespace App\Filament\Resources\Questions\Schemas;

use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class QuestionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Data Pelapor')
                    ->schema([

                        TextInput::make('ticket_code')
                            ->label('Kode Tiket')
                            ->disabled()
                            ->dehydrated(false),

                        TextInput::make('name')
                            ->label('Nama')
                            ->disabled()
                            ->dehydrated(false),

                        TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->disabled()
                            ->dehydrated(false),

                        TextInput::make('subject')
                            ->label('Subjek')
                            ->disabled()
                            ->dehydrated(false),

                        Textarea::make('question')
                            ->label('Pertanyaan')
                            ->rows(6)
                            ->disabled()
                            ->dehydrated(false)
                            ->columnSpanFull(),

                    ])
                    ->columns(2),

                Section::make('Penanganan')
                    ->schema([

                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'pending' => 'Menunggu',
                                'process' => 'Diproses',
                                'completed' => 'Selesai',
                            ])
                            ->required()
                            ->native(false),

                        Textarea::make('answer')
                            ->label('Jawaban')
                            ->rows(8)
                            ->placeholder('Tuliskan jawaban kepada masyarakat...')
                            ->columnSpanFull(),

                    ])
                    ->columns(1),

            ]);
    }
}