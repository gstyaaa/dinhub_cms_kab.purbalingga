<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class LocalizePostPdfs extends Command
{
    protected $signature = 'localize:post-pdfs';
    protected $description = 'Download file PDF internal dari link artikel berita WP dan ubah URL-nya ke server lokal';

    public function handle()
    {
        $this->info("==================================================");
        $this->info(" 🔄 MENGUNDUH DAN MENGUBAH LINK PDF DALAM ARTIKEL");
        $this->info("==================================================");

        $botCookie = 'wpcustom_bot_check=ManusiaAsli_' . Str::random(12);
        $posts = Post::all();
        $updatedCount = 0;
        $downloadedPdfs = 0;

        foreach ($posts as $post) {
            $content = $post->content;
            $changed = false;

            if (preg_match_all('/href=["\']([^"\']+\.pdf)["\']/i', $content, $matches)) {
                foreach ($matches[1] as $pdfUrl) {
                    // Jika URL mengarah ke WP lama atau relatif lokal
                    if (str_contains($pdfUrl, 'purbalinggakab.go.id') || !str_starts_with($pdfUrl, '/storage/')) {
                        
                        // Pakai https:// untuk hindari loss cookie redirect
                        $secureUrl = preg_replace('/^http:\/\//i', 'https://', $pdfUrl);
                        if (!str_starts_with($secureUrl, 'http')) {
                            $secureUrl = 'https://dishub.purbalinggakab.go.id/' . ltrim($secureUrl, '/');
                        }

                        $this->line(" 📥 Mengunduh PDF Asli: {$secureUrl}");

                        $filename = time() . '_' . Str::random(5) . '_' . basename(parse_url($secureUrl, PHP_URL_PATH));
                        $targetPath = "documents/{$filename}";

                        $ch = curl_init($secureUrl);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                        curl_setopt($ch, CURLOPT_UNRESTRICTED_AUTH, true);
                        curl_setopt($ch, CURLOPT_TIMEOUT, 90);
                        curl_setopt($ch, CURLOPT_HTTPHEADER, [
                            'Cookie: ' . $botCookie,
                            'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36'
                        ]);
                        $fileData = curl_exec($ch);
                        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                        curl_close($ch);

                        // Verifikasi bahwa file benar-benar file PDF asli (%PDF)
                        if ($httpCode === 200 && $fileData && str_starts_with($fileData, '%PDF')) {
                            Storage::disk('public')->put($targetPath, $fileData);
                            $localUrl = '/storage/' . $targetPath;

                            // Replace URL lama atau broken URL dengan URL lokal baru
                            $content = str_replace($pdfUrl, $localUrl, $content);
                            $changed = true;
                            $downloadedPdfs++;
                            $this->info("   ✅ BERHASIL! Diunduh (Size: " . round(strlen($fileData)/1024) . " KB) -> Link: {$localUrl}");
                        } else {
                            $this->error("   ❌ Gagal: File bukan PDF valid (terkena redirect bot check).");
                        }
                    }
                }
            }

            if ($changed) {
                $post->content = $content;
                $post->save();
                $updatedCount++;
            }
        }

        $this->info("==================================================");
        $this->info(" 🎉 SELESAI! {$downloadedPdfs} PDF valid diunduh & {$updatedCount} artikel diperbarui.");
        $this->info("==================================================");

        return 0;
    }
}
