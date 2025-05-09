<?php
namespace App\Filament\Widgets;

use App\Models\Alumni;
use Filament\Widgets\LineChartWidget;

class AlumniTahunChart extends LineChartWidget
{
    protected static ?string $heading = 'Alumni per Tahun';

    protected function getData(): array
    {
        $data = Alumni::select('tahun_lulus')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('tahun_lulus')
            ->orderBy('tahun_lulus', 'ASC')
            ->pluck('total', 'tahun_lulus')
            ->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Lulusan per Tahun',
                    'data' => array_values($data),
                    'borderColor' => '#3F51B5',
                    'fill' => false,
                ],
            ],
            'labels' => array_keys($data),
        ];
    }
}
