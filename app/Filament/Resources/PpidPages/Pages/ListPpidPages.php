<?php

namespace App\Filament\Resources\PpidPages\Pages;

use App\Filament\Resources\PpidPages\PpidPageResource;
use Filament\Resources\Pages\ListRecords;

class ListPpidPages extends ListRecords
{
    protected static string $resource = PpidPageResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}