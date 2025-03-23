<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\Obat;

class DashboardStatsWidget extends StatsOverviewWidget
{
    protected static ?int $columns = 3; // Mengatur jumlah kolom

    protected function getCards(): array
    {
        return [
            Card::make('Total Obat', Obat::count())
                ->description('Jumlah total obat yang tersedia')
                ->color('success'),

            Card::make('Total Stok Obat', Obat::sum('stok'))
                ->description('Jumlah total stok obat yang tersedia')
                ->color('info'),

            Card::make('Obat Terbanyak', Obat::orderBy('stok', 'desc')->first()->nama)
                ->description('Obat dengan jumlah stok terbanyak')
                ->color('warning'),
        ];
    }
}
