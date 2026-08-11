<?php

namespace App\Filament\Resources\Questions\Tables;

use App\Models\Question;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class QuestionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('full_name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->copyable()
                    ->icon('heroicon-m-envelope'),

                TextColumn::make('subject')
                    ->label('Subjek')
                    ->searchable()
                    ->limit(35),

                TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->dateTime('d M Y H:i')
                    ->sortable(),

                TextColumn::make('is_replied')
                    ->badge()
                    ->label('Status Balasan')
                    ->formatStateUsing(fn (bool $state): string => $state ? 'Sudah Dibalas' : 'Belum Dibalas')
                    ->color(fn (bool $state): string => $state ? 'success' : 'warning'),
            ])

            ->filters([
                SelectFilter::make('is_replied')
                    ->label('Status Balasan')
                    ->options([
                        '0' => 'Belum Dibalas',
                        '1' => 'Sudah Dibalas',
                    ]),
            ])

            ->recordActions([
                ViewAction::make()
                    ->label('Detail'),

                Action::make('send_email')
                    ->label('Balas via Email')
                    ->icon('heroicon-o-envelope')
                    ->color('primary')
                    ->url(fn (Question $record): string => "mailto:{$record->email}?subject=" . rawurlencode("Re: {$record->subject}"))
                    ->openUrlInNewTab(),

                Action::make('mark_as_replied')
                    ->label('Tandai Dibalas')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->hidden(fn (Question $record): bool => $record->is_replied)
                    ->requiresConfirmation()
                    ->modalHeading('Tandai Pertanyaan Sudah Dibalas')
                    ->modalDescription('Apakah Anda yakin telah membalas pertanyaan ini melalui email resmi instansi?')
                    ->modalSubmitActionLabel('Ya, Sudah Dibalas')
                    ->action(function (Question $record) {
                        $record->update([
                            'is_replied' => true,
                            'replied_at' => now(),
                        ]);

                        Notification::make()
                            ->title('Status Berhasil Diperbarui')
                            ->body('Pertanyaan telah ditandai sebagai Sudah Dibalas.')
                            ->success()
                            ->send();
                    }),

                Action::make('mark_as_unreplied')
                    ->label('Batalkan Dibalas')
                    ->icon('heroicon-o-arrow-path')
                    ->color('warning')
                    ->hidden(fn (Question $record): bool => ! $record->is_replied)
                    ->requiresConfirmation()
                    ->modalHeading('Kembalikan Status Belum Dibalas')
                    ->modalDescription('Apakah Anda yakin ingin mengembalikan status pertanyaan ini menjadi Belum Dibalas?')
                    ->modalSubmitActionLabel('Ya, Batalkan')
                    ->action(function (Question $record) {
                        $record->update([
                            'is_replied' => false,
                            'replied_at' => null,
                        ]);

                        Notification::make()
                            ->title('Status Berhasil Diperbarui')
                            ->body('Status pertanyaan dikembalikan menjadi Belum Dibalas.')
                            ->info()
                            ->send();
                    }),

                DeleteAction::make()
                    ->label('Hapus')
                    ->modalHeading('Konfirmasi Hapus Pertanyaan')
                    ->modalDescription('Apakah Anda yakin ingin menghapus pertanyaan ini? Tindakan ini tidak dapat dibatalkan.')
                    ->modalSubmitActionLabel('Ya, Hapus'),
            ])
            ->emptyStateHeading('Belum ada data pertanyaan masuk')
            ->emptyStateDescription('Pertanyaan dari masyarakat melalui fitur Tanya Dinhub akan tampil di sini.')
            ->emptyStateIcon('heroicon-o-chat-bubble-left-right');
    }
}