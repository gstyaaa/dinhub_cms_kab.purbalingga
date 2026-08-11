<?php

namespace Tests\Feature;

use App\Filament\Widgets\LatestPosts;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class LatestPostsWidgetTest extends TestCase
{
    use RefreshDatabase;

    public function test_latest_posts_widget_shows_newest_posts_first_and_allows_pagination(): void
    {
        $category = PostCategory::create([
            'name' => 'Umum',
            'slug' => 'umum',
            'is_active' => true,
        ]);

        $user = User::factory()->create();

        // Create 7 posts with different published_at dates
        $posts = [];
        for ($i = 1; $i <= 7; $i++) {
            $posts[] = Post::create([
                'post_category_id' => $category->id,
                'user_id' => $user->id,
                'title' => "Berita Ke-{$i}",
                'slug' => "berita-ke-{$i}",
                'excerpt' => "Ringkasan berita ke-{$i}",
                'content' => "Isi berita ke-{$i}",
                'status' => 'published',
                'published_at' => now()->subDays(10 - $i), // $i=7 is newest (3 days ago), $i=1 is oldest (9 days ago)
            ]);
        }

        // Test Livewire table widget
        Livewire::test(LatestPosts::class)
            ->assertCanSeeTableRecords([
                $posts[6], // Berita Ke-7 (Newest)
                $posts[5], // Berita Ke-6
                $posts[4], // Berita Ke-5
                $posts[3], // Berita Ke-4
                $posts[2], // Berita Ke-3
            ])
            ->assertCanNotSeeTableRecords([
                $posts[0], // Berita Ke-1 (Oldest, page 2)
                $posts[1], // Berita Ke-2 (Oldest, page 2)
            ]);
    }
}
