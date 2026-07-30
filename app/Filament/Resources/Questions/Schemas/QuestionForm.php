<?php

namespace App\Filament\Resources\Questions\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class QuestionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Informasi Masyarakat')
                    ->schema([

                        TextInput::make('full_name')
                            ->label('Nama Lengkap')
                            ->disabled()
                            ->dehydrated(false),

                        TextInput::make('email')
                            ->label('Alamat Email')
                            ->email()
                            ->disabled()
                            ->dehydrated(false),

                        TextInput::make('subject')
                            ->label('Subjek')
                            ->columnSpanFull()
                            ->disabled()
                            ->dehydrated(false),

                        Textarea::make('message')
                            ->label('Detail Pertanyaan')
                            ->rows(6)
                            ->disabled()
                            ->dehydrated(false)
                            ->columnSpanFull(),

                    ])
                    ->columns(2),

                Section::make('Status Balasan')
                    ->schema([

                        Toggle::make('is_replied')
                            ->label('Sudah Dibalas via Email Resmi'),

                        DateTimePicker::make('replied_at')
                            ->label('Waktu Dibalas')
                            ->nullable(),

                    ])
                    ->columns(2),

            ]);
    }
}