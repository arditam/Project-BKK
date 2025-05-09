<?php
namespace App\Filament\Widgets;

use App\Models\Alumni;
use Filament\Widgets\PieChartWidget;

class RentangGajiChart extends PieChartWidget
{
    protected function getData(): array
{
    $data = [
        '<=2.500.000' => Alumni::where(function ($query) {
            $query->where('gaji_kerja', '<=', 2500000)
                  ->orWhere('gaji_wirausaha', '<=', 2500000);
        })->count(),
        
        '2.500.000 - 5.000.000' => Alumni::where(function ($query) {
            $query->whereBetween('gaji_kerja', [2500000, 5000000])
                  ->orWhereBetween('gaji_wirausaha', [2500000, 5000000]);
        })->count(),
        
        '5.000.000 - 15.000.000' => Alumni::where(function ($query) {
            $query->whereBetween('gaji_kerja', [5000000, 15000000])
                  ->orWhereBetween('gaji_wirausaha', [5000000, 15000000]);
        })->count(),
        
        '>15.000.000' => Alumni::where(function ($query) {
            $query->where('gaji_kerja', '>', 15000000)
                  ->orWhere('gaji_wirausaha', '>', 15000000);
        })->count(),
    ];

    return [
        'datasets' => [
            [
                'data' => array_values($data),
                'backgroundColor' => ['#FF6384', '#3683DC', '#FFC857', '#54C6C6'],
            ],
        ],
        'labels' => array_keys($data),
    ];
}

}
