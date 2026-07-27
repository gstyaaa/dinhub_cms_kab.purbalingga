<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::published()->with(['category', 'author']);

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category')) {
            $categorySlug = $request->input('category');
            $query->whereHas('category', function ($q) use ($categorySlug) {
                $q->where('slug', $categorySlug);
            });
        }

        $posts = $query->latest('published_at')
            ->paginate(6)
            ->withQueryString();

        $categories = PostCategory::withCount(['posts' => function ($q) {
            $q->published();
        }])->get();

        $latestPosts = Post::published()
            ->latest('published_at')
            ->take(5)
            ->get();

        return view('posts.index', compact('posts', 'categories', 'latestPosts'));
    }

    public function show($slug)
    {
        $post = Post::published()
            ->with(['category', 'author'])
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedNews = Post::published()
            ->with(['category', 'author'])
            ->where('id', '!=', $post->id)
            ->when($post->post_category_id, function ($q) use ($post) {
                $q->where('post_category_id', $post->post_category_id);
            })
            ->latest('published_at')
            ->take(3)
            ->get();

        if ($relatedNews->count() < 3) {
            $existingIds = $relatedNews->pluck('id')->push($post->id)->toArray();
            $moreNews = Post::published()
                ->with(['category', 'author'])
                ->whereNotIn('id', $existingIds)
                ->latest('published_at')
                ->take(3 - $relatedNews->count())
                ->get();
            $relatedNews = $relatedNews->merge($moreNews);
        }

        $latestPosts = Post::published()
            ->where('id', '!=', $post->id)
            ->latest('published_at')
            ->take(5)
            ->get();

        $categories = PostCategory::withCount(['posts' => function ($q) {
            $q->published();
        }])->get();

        return view('posts.show', compact('post', 'relatedNews', 'latestPosts', 'categories'));
    }
}

