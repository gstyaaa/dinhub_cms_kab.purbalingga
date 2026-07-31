<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Banner;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
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

        $announcements = Announcement::active()
            ->latest()
            ->take(5)
            ->get();

        return view('home', compact(
            'banners',
            'posts',
            'announcements'
        ));
    }
}