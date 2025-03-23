<?php

namespace App\Filament\Widgets;

use App\Models\Obat;
use Filament\Widgets\BarChartWidget;

class ObatTerbanyakChart extends BarChartWidget
{
    protected static ?string $heading = 'Obat Terbanyak';
    protected static ?int $sort = 2;
    protected function getData(): array
    {
        $obatData = Obat::orderBy('stok', 'desc')->take(5)->get();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Stok',
                    'data' => $obatData->pluck('stok')->toArray(),
                    'backgroundColor' => ['#4CAF50', '#FF9800', '#F44336', '#03A9F4', '#9C27B0'],
                ],
            ],
            'labels' => $obatData->pluck('nama')->toArray(),
        ];
    }
}
