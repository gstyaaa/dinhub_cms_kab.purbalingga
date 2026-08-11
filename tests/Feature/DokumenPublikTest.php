<?php

namespace Tests\Feature;

use App\Models\PublicDocument;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Spatie\Activitylog\Models\Activity;
use Tests\TestCase;

class DokumenPublikTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_document_pages_load_successfully(): void
    {
        PublicDocument::create([
            'category' => 'Program & Kegiatan',
            'title' => 'Rencana Kerja 2026',
            'file_path' => null,
            'is_active' => true,
        ]);

        $responseProgram = $this->get('/ppid/program');
        $responseProgram->assertStatus(200);
        $responseProgram->assertSee('Rencana Kerja 2026');
        $responseProgram->assertSee('Belum Dipublikasikan');
        $responseProgram->assertSee('Belum diperbarui');

        $responseSakip = $this->get('/ppid/sakip');
        $responseSakip->assertStatus(200);

        $responsePeraturan = $this->get('/ppid/peraturan');
        $responsePeraturan->assertStatus(200);
    }

    public function test_standar_pelayanan_page_loads_successfully(): void
    {
        PublicDocument::create([
            'category' => 'Standar Pelayanan',
            'title' => 'SK Standar Pelayanan 2026',
            'file_path' => 'documents/sk_pelayanan.pdf',
            'is_active' => true,
        ]);

        $response = $this->get('/standar-pelayanan');
        $response->assertStatus(200);
        $response->assertSee('Standar Pelayanan');
        $response->assertSee('SK Standar Pelayanan 2026');
        $response->assertSee('Galeri Poster Standar Pelayanan');
        $response->assertSee('Tanya Minhub');
    }

    public function test_automatic_file_cleanup_on_update(): void
    {
        Storage::fake('public');

        $file1 = UploadedFile::fake()->create('doc1.pdf', 500, 'application/pdf');
        $path1 = $file1->store('documents', 'public');

        $document = PublicDocument::create([
            'category' => 'SAKIP',
            'title' => 'LAKIP 2025',
            'file_path' => $path1,
            'is_active' => true,
        ]);

        Storage::disk('public')->assertExists($path1);

        $file2 = UploadedFile::fake()->create('doc2.pdf', 600, 'application/pdf');
        $path2 = $file2->store('documents', 'public');

        $document->update([
            'file_path' => $path2,
        ]);

        // Old file must be automatically deleted
        Storage::disk('public')->assertMissing($path1);
        Storage::disk('public')->assertExists($path2);
    }

    public function test_automatic_file_cleanup_on_delete(): void
    {
        Storage::fake('public');

        $file = UploadedFile::fake()->create('document_to_delete.pdf', 300, 'application/pdf');
        $path = $file->store('documents', 'public');

        $document = PublicDocument::create([
            'category' => 'Peraturan',
            'title' => 'Peraturan Bupati No 12',
            'file_path' => $path,
            'is_active' => true,
        ]);

        Storage::disk('public')->assertExists($path);

        $document->delete();

        // File must be deleted from storage
        Storage::disk('public')->assertMissing($path);
    }

    public function test_activity_log_records_changes(): void
    {
        $document = PublicDocument::create([
            'category' => 'Program & Kegiatan',
            'title' => 'DPA 2026',
            'file_path' => null,
            'is_active' => true,
        ]);

        $this->assertDatabaseHas('activity_log', [
            'log_name' => 'dokumen_publik',
            'subject_id' => $document->id,
            'description' => 'created',
        ]);

        $document->update([
            'title' => 'DPA 2026 Revisi',
        ]);

        $this->assertDatabaseHas('activity_log', [
            'log_name' => 'dokumen_publik',
            'subject_id' => $document->id,
            'description' => 'updated',
        ]);

        $document->delete();

        $this->assertDatabaseHas('activity_log', [
            'log_name' => 'dokumen_publik',
            'subject_id' => $document->id,
            'description' => 'deleted',
        ]);
    }
}
