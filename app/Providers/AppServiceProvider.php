<?php

namespace App\Providers;

use App\Models\VisitorLog;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        // 1. Tracking Pengunjung Otomatis di Setiap Halaman Publik
        if (! Request::is('admin*') && ! Request::is('api*') && ! Request::is('livewire*')) {
            try {
                $todayDate = now()->toDateString();
                $ipHash = hash('sha256', Request::ip());

                VisitorLog::firstOrCreate([
                    'ip_hash' => $ipHash,
                    'visited_at' => $todayDate,
                ]);
            } catch (\Throwable $e) {
                // Ignore if DB not ready
            }
        }

        // 2. Share Data Statistik Pengunjung ke Footer di Semua Halaman
        View::composer('partials.footer', function ($view) {
            $todayDate = now()->toDateString();

            $todayVisitors = VisitorLog::query()
                ->where('visited_at', $todayDate)
                ->count();

            $monthVisitors = VisitorLog::query()
                ->whereYear('visited_at', now()->year)
                ->whereMonth('visited_at', now()->month)
                ->count();

            $totalVisitors = VisitorLog::query()
                ->count();

            $view->with([
                'todayVisitors' => $todayVisitors,
                'monthVisitors' => $monthVisitors,
                'totalVisitors' => $totalVisitors,
            ]);
        });
    }
}

