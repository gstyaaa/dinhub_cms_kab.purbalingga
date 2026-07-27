<?php

namespace App\Filament\Resources\WebsiteSettings\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class WebsiteSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Informasi Website')
                    ->components([

                        TextInput::make('site_name')
                            ->label('Nama Website')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('institution_name')
                            ->label('Nama Instansi')
                            ->required()
                            ->maxLength(255),

                        FileUpload::make('logo')
                            ->label('Logo')
                            ->directory('settings')
                            ->image(),

                        FileUpload::make('logo_white')
                            ->label('Logo Putih')
                            ->directory('settings')
                            ->image(),

                        FileUpload::make('favicon')
                            ->label('Favicon')
                            ->directory('settings')
                            ->image(),

                    ])
                    ->columns(2),

                Section::make('Kontak')
                    ->components([

                        Textarea::make('address')
                            ->label('Alamat')
                            ->rows(3)
                            ->columnSpanFull(),

                        TextInput::make('email')
                            ->label('Email')
                            ->email(),

                        TextInput::make('phone')
                            ->label('Telepon')
                            ->tel(),

                    ])
                    ->columns(2),

                Section::make('Media Sosial')
                    ->components([

                        TextInput::make('facebook')
                            ->label('Facebook')
                            ->url(),

                        TextInput::make('instagram')
                            ->label('Instagram')
                            ->url(),

                        TextInput::make('youtube')
                            ->label('YouTube')
                            ->url(),

                    ])
                    ->columns(3),

                Section::make('Footer')
                    ->components([

                        TextInput::make('copyright')
                            ->label('Copyright'),

                        Textarea::make('google_maps')
                            ->label('Embed Google Maps')
                            ->rows(5)
                            ->columnSpanFull(),

                    ]),

            ]);
    }
}