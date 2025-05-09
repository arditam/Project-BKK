<?php
namespace App\Filament\Widgets;

use Filament\Widgets\BarChartWidget;
use App\Models\Alumni;

class AlumniJurusanChart extends BarChartWidget
{
    protected static ?string $heading = 'Alumni Jurusan';

    protected function getData(): array
    {
        $data = Alumni::select('jurusan')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('jurusan')
            ->pluck('total', 'jurusan')
            ->toArray();

        $backgroundColors = [
            'PPLG' => '#FFAB91',
            'TJKT' => '#90CAF9',
            'DKV' => '#FFE082',
            'ULP' => '#80DEEA',
            'PM' => '#CE93D8',
            'MPLB' => '#FFCC80',
            'AKL' => '#A5D6A7',
            'ANM' => '#FF8A65',
        ];

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Data Lulusan',
                    'data' => array_values($data),
                    'backgroundColor' => array_values(array_intersect_key($backgroundColors, $data)),
                ],
            ],
            'labels' => array_keys($data),
        ];
    }
}
