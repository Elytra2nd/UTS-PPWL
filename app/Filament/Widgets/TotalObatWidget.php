<?php

namespace App\Filament\Widgets;

use App\Models\Obat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class TotalObatWidget extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Obat', Obat::count())
                ->description('Jumlah total obat yang tersedia')
                ->color('success'),
        ];
    }
}
