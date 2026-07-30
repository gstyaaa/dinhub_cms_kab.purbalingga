<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Banner;
use App\Models\Post;
use App\Models\VisitorLog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // 1. Logic Tracking Pengunjung (1x / IP / Hari)
        $todayDate = now()->toDateString();
        $ipHash = hash('sha256', $request->ip());

        VisitorLog::firstOrCreate([
            'ip_hash' => $ipHash,
            'visited_at' => $todayDate,
        ]);

        // 2. Query Data Banners, Posts & Announcements
        $banners = Banner::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $posts = Post::published()
            ->with(['category', 'author'])
            ->latest('published_at')
            ->take(6)
            ->get();

        $announcements = Announcement::active()
            ->latest()
            ->take(5)
            ->get();

        // 3. Query Statistik Pengunjung
        $todayVisitors = VisitorLog::query()
            ->where('visited_at', $todayDate)
            ->count();

        $monthVisitors = VisitorLog::query()
            ->whereYear('visited_at', now()->year)
            ->whereMonth('visited_at', now()->month)
            ->count();

        $totalVisitors = VisitorLog::query()
            ->count();

        return view('home', compact(
            'banners',
            'posts',
            'announcements',
            'todayVisitors',
            'monthVisitors',
            'totalVisitors'
        ));
    }
}