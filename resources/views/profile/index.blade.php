@extends('layouts.app')

@section('title', 'Profil Instansi - Dinas Perhubungan Kabupaten Purbalingga')

@push('styles')
<style>
/* Profile Module Custom Styles */
.profile-hero {
    min-height: 420px;
    background: linear-gradient(135deg, #0d6efd 0%, #084298 100%);
    position: relative;
    overflow: hidden;
    color: #ffffff;
    display: flex;
    align-items: center;
}

.profile-hero-pattern {
    position: absolute;
    inset: 0;
    opacity: 0.08;
    background-image: radial-gradient(#ffffff 1px, transparent 1px);
    background-size: 20px 20px;
}

.profile-hero-content {
    position: relative;
    z-index: 2;
}
</style>
@endpush

@section('content')

    {{-- Breadcrumb --}}
    @include('partials.breadcrumb', [
        'items' => ['Profil Instansi']
    ])

    {{-- 1. HERO SECTION --}}
    <section class="profile-hero py-5">
        <div class="profile-hero-pattern"></div>
        <div class="container profile-hero-content text-center py-4">
            <span class="badge bg-warning text-dark px-3 py-2 mb-3 rounded-pill fw-bold">
                Profil Instansi
            </span>
            <h1 class="display-4 fw-bold mb-3">
                Dinas Perhubungan Kabupaten Purbalingga
            </h1>
            <p class="lead text-white-50 max-w-2xl mx-auto mb-4 fs-5">
                Mengenal lebih dekat Dinas Perhubungan Kabupaten Purbalingga beserta visi, misi, tugas pokok, fungsi, dan struktur organisasinya.
            </p>
            <div>
                <a href="{{ route('profile.organization') }}" class="btn btn-warning btn-lg fw-bold rounded-3 px-4 shadow-sm me-2 mb-2">
                    <i class="bi bi-diagram-3-fill me-2"></i> Lihat Struktur Organisasi
                </a>
                <a href="{{ route('profile.about') }}" class="btn btn-outline-light btn-lg fw-semibold rounded-3 px-4 mb-2">
                    Pelajari Lebih Lanjut
                </a>
            </div>
        </div>
    </section>

    {{-- 2. NAVIGATION CARDS GRID --}}
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <span class="badge bg-primary px-3 py-2 mb-2 rounded-pill">Menu Profil</span>
                <h2 class="fw-bold">Informasi Instansi</h2>
                <p class="text-muted">Pilih informasi profil yang ingin Anda pelajari secara mendalam.</p>
            </div>

            <div class="row g-4 max-w-4xl mx-auto">

                {{-- 1. Tentang Dinas --}}
                <div class="col-12 col-md-6">
                    <a href="{{ route('profile.about') }}" class="text-decoration-none">
                        <div class="card border-0 shadow-blue-sm rounded-3 hover-card h-100 p-4 bg-white">
                            <div class="card-body text-center d-flex flex-column align-items-center justify-content-center">
                                <div class="fs-1 text-primary mb-3">🏢</div>
                                <h4 class="fw-bold text-dark mb-2">Tentang Dinas</h4>
                                <p class="text-muted small mb-4">
                                    Informasi umum, profil, dan kedudukan Dinas Perhubungan Kabupaten Purbalingga.
                                </p>
                                <span class="btn btn-outline-primary btn-sm rounded-3 fw-semibold px-3 mt-auto">
                                    Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                                </span>
                            </div>
                        </div>
                    </a>
                </div>

                {{-- 2. Visi & Misi --}}
                <div class="col-12 col-md-6">
                    <a href="{{ route('profile.vision-mission') }}" class="text-decoration-none">
                        <div class="card border-0 shadow-blue-sm rounded-3 hover-card h-100 p-4 bg-white">
                            <div class="card-body text-center d-flex flex-column align-items-center justify-content-center">
                                <div class="fs-1 text-primary mb-3">🎯</div>
                                <h4 class="fw-bold text-dark mb-2">Visi & Misi</h4>
                                <p class="text-muted small mb-4">
                                    Visi, misi strategis, dan komitmen pelayanan publik Dinas Perhubungan.
                                </p>
                                <span class="btn btn-outline-primary btn-sm rounded-3 fw-semibold px-3 mt-auto">
                                    Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                                </span>
                            </div>
                        </div>
                    </a>
                </div>

                {{-- 3. Tugas Pokok & Fungsi --}}
                <div class="col-12 col-md-6">
                    <a href="{{ route('profile.duties') }}" class="text-decoration-none">
                        <div class="card border-0 shadow-blue-sm rounded-3 hover-card h-100 p-4 bg-white">
                            <div class="card-body text-center d-flex flex-column align-items-center justify-content-center">
                                <div class="fs-1 text-primary mb-3">📖</div>
                                <h4 class="fw-bold text-dark mb-2">Tugas Pokok & Fungsi</h4>
                                <p class="text-muted small mb-4">
                                    Landasan kedudukan, tugas pokok, dan rincian fungsi instansi.
                                </p>
                                <span class="btn btn-outline-primary btn-sm rounded-3 fw-semibold px-3 mt-auto">
                                    Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                                </span>
                            </div>
                        </div>
                    </a>
                </div>

                {{-- 4. Struktur Organisasi --}}
                <div class="col-12 col-md-6">
                    <a href="{{ route('profile.organization') }}" class="text-decoration-none">
                        <div class="card border-0 shadow-blue-sm rounded-3 hover-card h-100 p-4 bg-white">
                            <div class="card-body text-center d-flex flex-column align-items-center justify-content-center">
                                <div class="fs-1 text-primary mb-3">🏛️</div>
                                <h4 class="fw-bold text-dark mb-2">Struktur Organisasi</h4>
                                <p class="text-muted small mb-4">
                                    Bagan susunan organisasi dan hierarki jabatan Dinas Perhubungan.
                                </p>
                                <span class="btn btn-outline-primary btn-sm rounded-3 fw-semibold px-3 mt-auto">
                                    Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                                </span>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </section>

    {{-- CTA --}}
    @include('partials.profile-cta')

@endsection
