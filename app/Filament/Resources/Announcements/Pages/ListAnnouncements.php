<?php

namespace App\Filament\Resources\Announcements\Pages;

use App\Filament\Resources\Announcements\AnnouncementResource;
use App\Models\SiteSetting;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ListAnnouncements extends ListRecords
{
    protected static string $resource = AnnouncementResource::class;

    protected static ?string $title = 'Pengaturan Beranda';

    protected string $view = 'filament.resources.announcements.pages.list-announcements';

    public ?array $kadisData = [];

    public function mount(): void
    {
        parent::mount();

        $settings = SiteSetting::getSettings();
        $this->kadisForm->fill($settings->toArray());
    }

    public function kadisForm(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Sambutan Kepala Dinas')
                    ->description('Kelola foto, nama, dan kata sambutan Kepala Dinas yang tampil di halaman utama beranda.')
                    ->icon('heroicon-o-user-circle')
                    ->schema([
                        // KIRI (4/12): Upload Foto Kepala Dinas
                        Group::make([
                            FileUpload::make('kadis_photo')
                                ->label('Foto Kepala Dinas')
                                ->image()
                                ->directory('kadis')
                                ->imageEditor()
                                ->imageCropAspectRatio('3:4')
                                ->maxSize(3072)
                                ->helperText('Disarankan foto portrait (Maks 3MB).'),
                        ])
                        ->columnSpan(['default' => 12, 'md' => 4]),

                        // KANAN (8/12): Nama, Jabatan, & Kalimat Sambutan
                        Group::make([
                            TextInput::make('kadis_name')
                                ->label('Nama Lengkap & Gelar')
                                ->required()
                                ->placeholder('Contoh: SUTRISNO, S.Sos'),

                            TextInput::make('kadis_title')
                                ->label('Jabatan / Sub-Judul')
                                ->required()
                                ->placeholder('Kepala Dinas Perhubungan Kabupaten Purbalingga'),

                            Textarea::make('kadis_welcome_text')
                                ->label('Kalimat Sambutan Beranda')
                                ->rows(4)
                                ->placeholder('Tuliskan kata sambutan singkat Kepala Dinas...'),
                        ])
                        ->columnSpan(['default' => 12, 'md' => 8]),
                    ])
                    ->columns(12),
            ])
            ->statePath('kadisData');
    }

    public function saveKadis(): void
    {
        $settings = SiteSetting::getSettings();
        $settings->update($this->kadisForm->getState());

        Notification::make()
            ->title('Sambutan Kepala Dinas Berhasil Disimpan!')
            ->success()
            ->send();
    }
}
