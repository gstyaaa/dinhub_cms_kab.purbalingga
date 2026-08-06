<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class LocalizePostImages extends Command
{
    protected $signature = 'localize:post-images';
    protected $description = 'Download semua gambar inline di dalam artikel berita WP dan ubah URL-nya ke server lokal';

    public function handle()
    {
        $this->info("==================================================");
        $this->info(" 🔄 MENGUNDUH DAN MENGUBAH GAMBAR INLINE DARI WP");
        $this->info("==================================================");

        $botCookie = 'wpcustom_bot_check=ManusiaAsli_' . Str::random(12);
        $posts = Post::all();
        $updatedPosts = 0;
        $downloadedImgs = 0;

        foreach ($posts as $post) {
            $content = $post->content;
            $changed = false;

            if (preg_match_all('/<img[^>]+src=["\'](https?:\/\/[^"\']+)["\']/i', $content, $matches)) {
                foreach ($matches[1] as $imgUrl) {
                    // Abaikan plugin svg lama yang broken
                    if (str_contains($imgUrl, 'embed-any-document') || str_contains($imgUrl, '.svg')) {
                        $content = str_replace($imgUrl, '', $content);
                        $changed = true;
                        continue;
                    }

                    if (str_contains($imgUrl, 'purbalinggakab.go.id')) {
                        $secureUrl = preg_replace('/^http:\/\//i', 'https://', $imgUrl);
                        $this->line(" 📥 Mengunduh Gambar: {$secureUrl}");

                        $filename = time() . '_' . Str::random(5) . '_' . pathinfo(parse_url($secureUrl, PHP_URL_PATH), PATHINFO_FILENAME) . '.webp';
                        $targetPath = "posts/{$filename}";
                        $fullTargetPath = Storage::disk('public')->path($targetPath);

                        $ch = curl_init($secureUrl);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                        curl_setopt($ch, CURLOPT_UNRESTRICTED_AUTH, true);
                        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
                        curl_setopt($ch, CURLOPT_HTTPHEADER, [
                            'Cookie: ' . $botCookie,
                            'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36'
                        ]);
                        $fileData = curl_exec($ch);
                        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                        curl_close($ch);

                        if ($httpCode === 200 && $fileData) {
                            $gdImg = @imagecreatefromstring($fileData);
                            if ($gdImg) {
                                imagealphablending($gdImg, true);
                                imagesavealpha($gdImg, true);
                                imagewebp($gdImg, $fullTargetPath, 85);
                                imagedestroy($gdImg);

                                $localUrl = '/storage/' . $targetPath;
                                $content = str_replace($imgUrl, $localUrl, $content);
                                $changed = true;
                                $downloadedImgs++;
                                $this->info("   ✅ Berhasil diubah ke: {$localUrl}");
                            }
                        } else {
                            $this->warn("   ⚠️ Gagal mendownload gambar dari {$imgUrl}");
                        }
                    }
                }
            }

            if ($changed) {
                $post->content = $content;
                $post->save();
                $updatedPosts++;
            }
        }

        $this->info("==================================================");
        $this->info(" 🎉 SELESAI! {$downloadedImgs} gambar diunduh & {$updatedPosts} artikel diperbarui.");
        $this->info("==================================================");

        return 0;
    }
}
