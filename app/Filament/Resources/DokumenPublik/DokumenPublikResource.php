<?php

namespace App\Filament\Resources\DokumenPublik;

use App\Filament\Resources\DokumenPublik\Pages\CreateDokumenPublik;
use App\Filament\Resources\DokumenPublik\Pages\EditDokumenPublik;
use App\Filament\Resources\DokumenPublik\Pages\ListDokumenPublik;
use App\Filament\Resources\DokumenPublik\Schemas\DokumenPublikForm;
use App\Filament\Resources\DokumenPublik\Tables\DokumenPublikTable;
use App\Models\PublicDocument;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class DokumenPublikResource extends Resource
{
    protected static ?string $model = PublicDocument::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedFolderOpen;

    protected static ?string $navigationLabel = 'Manajemen Dokumen';

    protected static ?string $modelLabel = 'Dokumen';

    protected static ?string $pluralModelLabel = 'Manajemen Dokumen';

    protected static \UnitEnum|string|null $navigationGroup = 'PPID';

    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return DokumenPublikForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DokumenPublikTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDokumenPublik::route('/'),
            'create' => CreateDokumenPublik::route('/create'),
            'edit' => EditDokumenPublik::route('/{record}/edit'),
        ];
    }

    /**
     * Admin CAN delete document record with confirmation modal
     */
    public static function canDelete(Model $record): bool
    {
        return true;
    }

    public static function canDeleteAny(): bool
    {
        return true;
    }
}
