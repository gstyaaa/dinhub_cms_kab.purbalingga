<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Banner;
use App\Models\Post;
use Illuminate\Support\Facades\Schema;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $posts = Post::published()
            ->with(['category', 'author'])
            ->latest('published_at')
            ->take(6)
            ->get();

        $announcementsQuery = Announcement::query()
            ->where('is_active', true);

        if (Schema::hasColumn('announcements', 'show_on_running_text')) {
            $announcementsQuery->where('show_on_running_text', true);
        }

        $announcements = $announcementsQuery
            ->latest('publish_date')
            ->take(5)
            ->get();

        return view('home', compact(
            'banners',
            'posts',
            'announcements'
        ));
    }
}