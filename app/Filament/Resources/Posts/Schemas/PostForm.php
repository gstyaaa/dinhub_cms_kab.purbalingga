<?php

namespace App\Filament\Resources\Posts\Schemas;

use App\Filament\Resources\Posts\PostResource;
use Filament\Actions\Action;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
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

                            FileUpload::make('thumbnail')
                                ->label('Thumbnail')
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
                                ->label('Status')
                                ->options([
                                    'draft' => 'Draft',
                                    'published' => 'Published',
                                ])
                                ->default('draft')
                                ->required(),

                            Toggle::make('is_headline')
                                ->label('Jadikan Headline')
                                ->default(false),

                            DateTimePicker::make('published_at')
                                ->label('Tanggal Publish')
                                ->seconds(false),

                        ])
                        ->columns(1),

                    Actions::make([
                        Action::make('save')
                            ->label('Simpan Berita')
                            ->submit('save')
                            ->color('primary')
                            ->button(),

                        Action::make('cancel')
                            ->label('Batal')
                            ->url(fn () => PostResource::getUrl('index'))
                            ->color('gray')
                            ->button(),
                    ])
                    ->fullWidth(),

                ])
                ->columnSpan(['lg' => 1]),

                Group::make([

                    Section::make('Isi Berita')
                        ->schema([

                            Textarea::make('excerpt')
                                ->label('Ringkasan')
                                ->rows(3)
                                ->maxLength(255)
                                ->columnSpanFull(),

                            RichEditor::make('content')
                                ->label('Isi Berita')
                                ->required()
                                ->columnSpanFull(),

                        ]),

                ])
                ->columnSpan(['lg' => 2]),

            ]);
    }
}