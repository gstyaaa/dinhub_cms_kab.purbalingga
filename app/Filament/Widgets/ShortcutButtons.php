<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class ShortcutButtons extends Widget
{
    protected static string $view = 'filament.widgets.shortcut-buttons';

    protected static ?int $sort = 3;

    protected int|string|array $columnSpan = 'full';
}
