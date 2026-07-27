<?php

namespace App\Filament\Resources\PpidPages;

use App\Filament\Resources\PpidPages\Pages\CreatePpidPage;
use App\Filament\Resources\PpidPages\Pages\EditPpidPage;
use App\Filament\Resources\PpidPages\Pages\ListPpidPages;
use App\Filament\Resources\PpidPages\Schemas\PpidPageForm;
use App\Filament\Resources\PpidPages\Tables\PpidPagesTable;
use App\Models\PpidPage;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PpidPageResource extends Resource
{
    protected static ?string $model = PpidPage::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return PpidPageForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PpidPagesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPpidPages::route('/'),
            'create' => CreatePpidPage::route('/create'),
            'edit' => EditPpidPage::route('/{record}/edit'),
        ];
    }
}
