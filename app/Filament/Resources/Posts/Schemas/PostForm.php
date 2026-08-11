<?php

namespace App\Filament\Resources\Posts\Schemas;

use App\Filament\Resources\Posts\PostResource;
use Filament\Actions\Action;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns([
                'default' => 1,
                'lg' => 3,
            ])
            ->components([

                Group::make([

                    Section::make('Informasi Berita')
                        ->schema([

                            Select::make('post_category_id')
                                ->label('Kategori Berita')
                                ->relationship('category', 'name')
                                ->searchable()
                                ->preload()
                                ->required(),

                            TextInput::make('title')
                                ->label('Judul Berita')
                                ->placeholder('Masukkan judul berita')
                                ->required()
                                ->maxLength(255)
                                ->live(onBlur: true)
                                ->afterStateUpdated(function (Set $set, ?string $state, $record) {
                                    if (blank($record?->slug)) {
                                        $set('slug', Str::slug($state));
                                    }
                                }),

                            Hidden::make('slug')
                                ->dehydrated(),

                            FileUpload::make('thumbnail')
                                ->label('Thumbnail Berita')
                                ->image()
                                ->directory('posts')
                                ->disk('public')
                                ->imageEditor()
                                ->previewable()
                                ->downloadable()
                                ->openable(),

                        ])
                        ->columns(2),

                    Section::make('Publikasi')
                        ->schema([

                            Select::make('status')
                                ->label('Status Publikasi')
                                ->options([
                                    'draft' => 'Draf',
                                    'published' => 'Diterbitkan',
                                ])
                                ->default('draft')
                                ->required(),

                            Toggle::make('is_headline')
                                ->label('Jadikan Headline Berita')
                                ->default(false),

                            DateTimePicker::make('published_at')
                                ->label('Tanggal Publikasi')
                                ->seconds(false),

                        ])
                        ->columns(1),

                ])
                ->columnSpan(['lg' => 1]),

                Group::make([

                    Section::make('Isi Berita')
                        ->schema([

                            Textarea::make('excerpt')
                                ->label('Ringkasan / Sub-Judul')
                                ->placeholder('Masukkan ringkasan singkat berita...')
                                ->rows(3)
                                ->maxLength(255)
                                ->columnSpanFull(),

                            RichEditor::make('content')
                                ->label('Isi Lengkap Berita')
                                ->required()
                                ->columnSpanFull(),

                        ]),

                ])
                ->columnSpan(['lg' => 2]),

            ]);
    }
}