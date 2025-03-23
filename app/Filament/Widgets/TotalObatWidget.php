<?php

namespace App\Filament\Widgets;

use App\Models\Obat;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class TotalObatWidget extends StatsOverviewWidget
{
    protected static ?int $columns = 2; // 2 kolom

    protected function getCards(): array
    {
        return [
            Card::make('Total Obat', Obat::count())
                ->description('Jumlah total obat yang tersedia')
                ->color('success'),
        ];
    }

}
