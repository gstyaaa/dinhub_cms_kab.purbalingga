<?php

namespace App\Filament\Resources\DokumenPublik\Tables;

use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class DokumenPublikTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('updated_at', 'desc')
            ->columns([
                TextColumn::make('title')
                    ->label('Nama / Judul Dokumen')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->wrap(),

                TextColumn::make('category')
                    ->label('Kategori')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Program & Kegiatan' => 'info',
                        'SAKIP' => 'success',
                        'Peraturan' => 'warning',
                        'Standar Pelayanan' => 'primary',
                        'Maklumat Pelayanan' => 'secondary',
                        'Kode Etik' => 'gray',
                        'Nilai SKM' => 'info',
                        default => 'gray',
                    })
                    ->searchable()
                    ->sortable(),

                TextColumn::make('file_status')
                    ->label('Status Berkas PDF')
                    ->state(fn ($record): string => $record->file_path ? 'Sudah Diunggah' : 'Belum Diunggah')
                    ->badge()
                    ->color(fn ($record): string => $record->file_path ? 'success' : 'danger'),

                IconColumn::make('is_active')
                    ->label('Status Aktif')
                    ->boolean()
                    ->sortable(),

                TextColumn::make('updated_at')
                    ->label('Terakhir Diperbarui')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->label('Kategori')
                    ->options(\App\Models\PublicDocument::CATEGORIES),
            ])
            ->recordActions([
                EditAction::make()
                    ->label('Edit Dokumen'),
                DeleteAction::make()
                    ->label('Hapus')
                    ->modalHeading('Konfirmasi Hapus Dokumen')
                    ->modalDescription('Apakah Anda yakin ingin menghapus dokumen ini? Dokumen PDF juga akan dihapus dari server.')
                    ->modalSubmitActionLabel('Hapus')
                    ->modalCancelActionLabel('Batal'),
            ])
            ->emptyStateHeading('Belum Ada Dokumen Publik')
            ->emptyStateDescription('Daftar dokumen resmi akan otomatis ditampilkan.')
            ->emptyStateIcon('heroicon-o-document-text');
    }
}
