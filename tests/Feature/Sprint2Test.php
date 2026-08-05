<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class Sprint2Test extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_loads_successfully(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Portal Layanan');
        $response->assertSee('Berita Terbaru');
    }

    public function test_berita_index_loads_published_posts(): void
    {
        $category = PostCategory::create([
            'name' => 'Transportasi',
            'slug' => 'transportasi',
            'is_active' => true,
        ]);

        $user = User::factory()->create();

        $post = Post::create([
            'post_category_id' => $category->id,
            'user_id' => $user->id,
            'title' => 'Uji Coba Transportasi Publik',
            'slug' => 'uji-coba-transportasi-publik',
            'excerpt' => 'Ringkasan uji coba',
            'content' => 'Detail isi berita',
            'status' => 'published',
            'published_at' => now(),
        ]);

        $response = $this->get('/berita');
        $response->assertStatus(200);
        $response->assertSee('Uji Coba Transportasi Publik');
    }

    public function test_berita_detail_page_loads_with_related_news(): void
    {
        $category = PostCategory::create([
            'name' => 'Lalulintas',
            'slug' => 'lalulintas',
            'is_active' => true,
        ]);

        $user = User::factory()->create();

        $post = Post::create([
            'post_category_id' => $category->id,
            'user_id' => $user->id,
            'title' => 'Rekayasa Lalu Lintas',
            'slug' => 'rekayasa-lalu-lintas',
            'excerpt' => 'Ringkasan rekayasa lalu lintas',
            'content' => 'Isi rekayasa lalu lintas',
            'status' => 'published',
            'published_at' => now(),
        ]);

        $response = $this->get('/berita/' . $post->slug);
        $response->assertStatus(200);
        $response->assertSee('Rekayasa Lalu Lintas');
    }

    public function test_ppid_page_loads(): void
    {
        $response = $this->get('/ppid');
        $response->assertStatus(200);
    }

    public function test_gallery_page_loads(): void
    {
        $response = $this->get('/galeri');
        $response->assertStatus(200);
    }

    public function test_tanya_dishub_page_loads_and_stores_question(): void
    {
        $response = $this->get('/tanya-dishub');
        $response->assertStatus(200);

        $postData = [
            'full_name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'subject' => 'Pertanyaan Kereta',
            'message' => 'Bagaimana jadwal angkutan umum di Kabupaten Purbalingga?',
        ];

        $postResponse = $this->post('/tanya-dishub', $postData);
        $postResponse->assertSessionHas('success');
        $this->assertDatabaseHas('questions', [
            'email' => 'budi@example.com',
            'subject' => 'Pertanyaan Kereta',
        ]);
    }

    public function test_footer_and_topbar_read_from_config_dishub(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee(config('dishub.name'));
        $response->assertSee(config('dishub.phone'));
        $response->assertSee(config('dishub.email'));
        $response->assertSee(config('dishub.maps.url'));
    }

    public function test_extensible_links_config_loads_properly(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee(config('links.skm.url'));
        $response->assertSee(config('links.lapor_masbup.url'));
        $response->assertSee(config('links.pemkab.url'));
    }
}


