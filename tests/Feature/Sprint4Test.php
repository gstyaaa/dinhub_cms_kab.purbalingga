<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class Sprint4Test extends TestCase
{
    use RefreshDatabase;

    public function test_profile_index_page_loads_successfully(): void
    {
        $response = $this->get('/profil');
        $response->assertStatus(200);
        $response->assertSee('Profil Instansi');

        $response->assertSee('Tentang Dinas');
        $response->assertSee('Visi');
        $response->assertSee('Misi');
        $response->assertSee('Tugas Pokok');
        $response->assertSee('Struktur Organisasi');

    }

    public function test_profile_about_page_loads(): void
    {
        $response = $this->get('/profil/tentang');
        $response->assertStatus(200);
        $response->assertSee('Tentang Dinas Perhubungan');
    }

    public function test_profile_vision_mission_page_loads(): void
    {
        $response = $this->get('/profil/visi-misi');
        $response->assertStatus(200);
        $response->assertSee('Visi Instansi');
        $response->assertSee('Misi Strategis');
        $response->assertSee('Komitmen Pelayanan');
    }

    public function test_profile_duties_page_loads(): void
    {
        $response = $this->get('/profil/tugas-pokok-fungsi');
        $response->assertStatus(200);
        $response->assertSee('Kedudukan Instansi');
        $response->assertSee('Tugas Pokok');
        $response->assertSee('Fungsi Utama');
    }

    public function test_profile_organization_page_loads(): void
    {
        $response = $this->get('/profil/struktur-organisasi');
        $response->assertStatus(200);
        $response->assertSee('Struktur Organisasi');
        $response->assertSee('Bagan Struktur Organisasi');


    }
}
