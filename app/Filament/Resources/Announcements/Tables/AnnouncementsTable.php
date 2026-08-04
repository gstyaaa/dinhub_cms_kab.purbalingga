<?php

namespace App\Filament\Resources\Announcements\Tables;

use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AnnouncementsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->heading('Pengumuman Running Text')
            ->description('Kelola pengumuman teks berjalan yang tampil di bagian paling atas beranda web publik.')
            ->columns([

                TextColumn::make('title')
                    ->label('Judul Pengumuman')
                    ->sortable()
                    ->limit(50),

                TextColumn::make('publish_date')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->sortable(),

                IconColumn::make('is_active')
                    ->label('Status Aktif')
                    ->boolean(),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i'),

            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make()
                    ->label('Tambah Pengumuman Baru')
                    ->icon('heroicon-o-plus'),
            ])
            ->recordActions([
                EditAction::make()
                    ->label('Ubah'),
                DeleteAction::make()
                    ->label('Hapus')
                    ->modalHeading('Konfirmasi Hapus Pengumuman')
                    ->modalDescription('Apakah Anda yakin ingin menghapus pengumuman running text ini? Tindakan ini tidak dapat dibatalkan.')
                    ->modalSubmitActionLabel('Ya, Hapus'),
            ])
            ->emptyStateHeading('Belum Ada Pengumuman Running Text')
            ->emptyStateDescription('Silakan klik tombol "Tambah Pengumuman Baru" di atas untuk membuat teks berjalan baru.')
            ->emptyStateIcon('heroicon-o-megaphone');
    }
}
