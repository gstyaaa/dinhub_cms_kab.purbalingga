<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class PostsChart extends ChartWidget
{
    protected ?string $heading = 'Statistik Publikasi Berita';

    protected static ?int $sort = 3;

    protected int|string|array $columnSpan = 'full';

    protected function getData(): array
    {
        $posts = Post::select(
                DB::raw('MONTH(published_at) as month'),
                DB::raw('COUNT(*) as total')
            )
            ->whereNotNull('published_at')
            ->where('status', 'published')
            ->groupBy(DB::raw('MONTH(published_at)'))
            ->orderBy(DB::raw('MONTH(published_at)'))
            ->get();

        $labels = [];
        $data = [];

        $months = [
            1 => 'Jan',
            2 => 'Feb',
            3 => 'Mar',
            4 => 'Apr',
            5 => 'Mei',
            6 => 'Jun',
            7 => 'Jul',
            8 => 'Agu',
            9 => 'Sep',
            10 => 'Okt',
            11 => 'Nov',
            12 => 'Des',
        ];

        foreach ($posts as $post) {
            $labels[] = $months[$post->month];
            $data[] = $post->total;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Berita',
                    'data' => $data,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}