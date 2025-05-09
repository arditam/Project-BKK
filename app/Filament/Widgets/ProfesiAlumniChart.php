<?php
namespace App\Filament\Widgets;

use App\Models\Alumni;
use Filament\Widgets\DoughnutChartWidget;

class ProfesiAlumniChart extends DoughnutChartWidget
{
    protected static ?string $heading = 'Rasio Profesi Alumni';

    protected function getData(): array
    {
        $data = [
            'Kuliah' => Alumni::where('status', 'Kuliah')->count(),
            'Bekerja' => Alumni::where('status', 'Kerja')->count(),
            'Wirausaha' => Alumni::where('status', 'Wirausaha')->count(),
            'Menganggur' => Alumni::where('status', 'Tidak')->count(),
        ];

        return [
            'datasets' => [
                [
                    'data' => array_values($data),
                    'backgroundColor' => ['#F57C51', '#7ED957', '#8288FF', '#6D6E70'],
                ],
            ],
            'labels' => array_keys($data),
        ];
    }
}
