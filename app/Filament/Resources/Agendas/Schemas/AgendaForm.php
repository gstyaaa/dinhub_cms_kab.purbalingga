<?php

namespace App\Filament\Resources\Agendas\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class AgendaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Informasi Agenda')
                    ->schema([

                        TextInput::make('title')
                            ->label('Judul Agenda')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (Set $set, ?string $state) {
                                $set('slug', Str::slug($state));
                            }),

                        TextInput::make('slug')
                            ->label('Slug')
                            ->disabled()
                            ->dehydrated()
                            ->required(),

                        DatePicker::make('event_date')
                            ->label('Tanggal Kegiatan')
                            ->required(),

                        TimePicker::make('event_time')
                            ->label('Jam Kegiatan')
                            ->seconds(false),

                        TextInput::make('location')
                            ->label('Lokasi')
                            ->maxLength(255),

                        Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(true),

                    ])
                    ->columns(2),

                Section::make('Deskripsi Agenda')
                    ->schema([

                        RichEditor::make('description')
                            ->label('Deskripsi')
                            ->columnSpanFull(),

                    ]),

            ]);
    }
}