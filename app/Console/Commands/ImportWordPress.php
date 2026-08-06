<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PublicDocument;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ImportWordPress extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:wordpress {url=https://dishub.purbalinggakab.go.id : URL WordPress origin}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import berita, kategori, gambar, dan file PDF dari WordPress ke Laravel CMS';

    /**
     * Cookie token untuk melewati bot check
     */
    private string $botCookie;

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $baseUrl = rtrim($this->argument('url'), '/');
        $this->botCookie = 'wpcustom_bot_check=ManusiaAsli_' . Str::random(12);

        $this->info("==================================================");
        $this->info(" 🚀 MEMULAI IMPOR DATA DARI WORDPRESS");
        $this->info(" URL Source: {$baseUrl}");
        $this->info("==================================================");

        // Ambil User Admin Default
        $admin = User::first();
        if (!$admin) {
            $this->error("❌ User admin tidak ditemukan! Silakan buat user dulu atau jalankan db:seed.");
            return 1;
        }

        // 1. Import Kategori
        $categoryMap = $this->importCategories($baseUrl);

        // 2. Import Posts / Berita
        $this->importPosts($baseUrl, $admin->id, $categoryMap);

        // 3. Import PDF Documents
        $this->importPdfDocuments($baseUrl);

        // 4. Ubah link PDF di dalam artikel menjadi link lokal
        $this->call('localize:post-pdfs');

        $this->info("==================================================");
        $this->info(" 🎉 PROSES IMPOR SELESAI DENGAN SUKSES!");
        $this->info("==================================================");

        return 0;
    }

    /**
     * Helper untuk HTTP GET request ke WP REST API dengan cURL / Cookie Bypass
     */
    private function fetchApi(string $url): ?array
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Cookie: ' . $this->botCookie,
            'Accept: application/json',
        ]);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36');

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode !== 200 || !$response) {
            return null;
        }

        return json_decode($response, true);
    }

    /**
     * Import Post Categories
     */
    private function importCategories(string $baseUrl): array
    {
        $this->info("\n📁 [1/3] Mengimpor Kategori Berita...");
        $categoriesData = $this->fetchApi("{$baseUrl}/wp-json/wp/v2/categories?per_page=100");

        $map = []; // [wp_cat_id => laravel_cat_id]

        // Kategori Default jika tidak ada
        $defaultCat = PostCategory::firstOrCreate(
            ['slug' => 'berita-umum'],
            ['name' => 'Berita Umum', 'description' => 'Kategori umum berita', 'is_active' => true]
        );

        if (!$categoriesData || !is_array($categoriesData)) {
            $this->warn("⚠️  Gagal mengambil data kategori WP atau kategori kosong. Menggunakan kategori default.");
            return $map;
        }

        foreach ($categoriesData as $cat) {
            $laravelCat = PostCategory::firstOrCreate(
                ['slug' => $cat['slug']],
                [
                    'name' => html_entity_decode($cat['name'], ENT_QUOTES | ENT_HTML5, 'UTF-8'),
                    'description' => $cat['description'] ?? null,
                    'is_active' => true,
                ]
            );
            $map[$cat['id']] = $laravelCat->id;
            $this->line("   ✓ Kategori: {$laravelCat->name}");
        }

        return $map;
    }

    /**
     * Import Berita (Posts)
     */
    private function importPosts(string $baseUrl, int $adminId, array $categoryMap)
    {
        $this->info("\n📰 [2/3] Mengimpor Artikel Berita...");

        $page = 1;
        $totalImported = 0;
        $defaultCatId = PostCategory::first()?->id ?? 1;

        while (true) {
            $url = "{$baseUrl}/wp-json/wp/v2/posts?per_page=20&page={$page}&_embed";
            $postsData = $this->fetchApi($url);

            if (!$postsData || !is_array($postsData) || count($postsData) === 0) {
                break;
            }

            foreach ($postsData as $wpPost) {
                $title = html_entity_decode($wpPost['title']['rendered'] ?? 'Tanpa Judul', ENT_QUOTES | ENT_HTML5, 'UTF-8');
                $slug = Str::slug($wpPost['slug'] ?? $title);
                $content = $wpPost['content']['rendered'] ?? '';
                $excerpt = strip_tags(html_entity_decode($wpPost['excerpt']['rendered'] ?? '', ENT_QUOTES | ENT_HTML5, 'UTF-8'));
                $publishedAt = isset($wpPost['date']) ? date('Y-m-d H:i:s', strtotime($wpPost['date'])) : now();

                // Tentukan Kategori
                $categoryId = $defaultCatId;
                if (!empty($wpPost['categories']) && isset($categoryMap[$wpPost['categories'][0]])) {
                    $categoryId = $categoryMap[$wpPost['categories'][0]];
                }

                // Tentukan Thumbnail
                $thumbnailPath = null;
                if (!empty($wpPost['_embedded']['wp:featuredmedia'][0]['source_url'])) {
                    $imageUrl = $wpPost['_embedded']['wp:featuredmedia'][0]['source_url'];
                    $thumbnailPath = $this->downloadMediaFile($imageUrl, 'posts');
                }

                // Simpan atau update post ke Database
                Post::updateOrCreate(
                    ['slug' => $slug],
                    [
                        'post_category_id' => $categoryId,
                        'user_id' => $adminId,
                        'title' => $title,
                        'excerpt' => Str::limit($excerpt, 200),
                        'content' => $content,
                        'thumbnail' => $thumbnailPath,
                        'status' => 'published',
                        'is_headline' => false,
                        'published_at' => $publishedAt,
                        'meta_title' => $title,
                        'meta_description' => Str::limit($excerpt, 150),
                    ]
                );

                $totalImported++;
                $this->line("   ✓ [{$totalImported}] Artikel: " . Str::limit($title, 50));
            }

            $page++;
        }

        $this->info("   ✅ Total {$totalImported} artikel berita berhasil diimpor.");
    }

    /**
     * Import Dokumen PDF
     */
    private function importPdfDocuments(string $baseUrl)
    {
        $this->info("\n📑 [3/3] Mengimpor Dokumen PDF Publik...");

        $page = 1;
        $totalImported = 0;

        while (true) {
            $url = "{$baseUrl}/wp-json/wp/v2/media?mime_type=application/pdf&per_page=20&page={$page}";
            $mediaData = $this->fetchApi($url);

            if (!$mediaData || !is_array($mediaData) || count($mediaData) === 0) {
                break;
            }

            foreach ($mediaData as $item) {
                $title = html_entity_decode($item['title']['rendered'] ?? 'Dokumen PDF', ENT_QUOTES | ENT_HTML5, 'UTF-8');
                $pdfUrl = $item['source_url'] ?? null;

                if ($pdfUrl) {
                    $filePath = $this->downloadMediaFile($pdfUrl, 'documents');
                    if ($filePath) {
                        PublicDocument::create([
                            'category' => 'Program & Kegiatan',
                            'title' => $title,
                            'file_path' => $filePath,
                            'is_active' => true,
                        ]);
                        $totalImported++;
                        $this->line("   ✓ [{$totalImported}] PDF: " . Str::limit($title, 50));
                    }
                }
            }

            $page++;
        }

        $this->info("   ✅ Total {$totalImported} dokumen PDF berhasil diimpor.");
    }

    /**
     * Download File Media (Gambar / PDF) ke Storage Public
     */
    private function downloadMediaFile(string $fileUrl, string $folder): ?string
    {
        try {
            $filename = time() . '_' . Str::random(6) . '_' . basename(parse_url($fileUrl, PHP_URL_PATH));
            $targetPath = "{$folder}/{$filename}";

            $ch = curl_init($fileUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_TIMEOUT, 60);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Cookie: ' . $this->botCookie,
            ]);
            curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)');
            $fileData = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            if ($httpCode === 200 && $fileData) {
                Storage::disk('public')->put($targetPath, $fileData);
                return $targetPath;
            }
        } catch (\Throwable $e) {
            // Ignore download error & return null
        }

        return null;
    }
}
