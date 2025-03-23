<?php

namespace App\Filament\Widgets;

use App\Models\Obat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class TotalStokObatWidget extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Stok Obat', Obat::sum('stok'))
                ->description('Jumlah total stok obat yang tersedia')
                ->color('info'),
        ];
    }
}
