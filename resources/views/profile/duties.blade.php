@extends('layouts.app')

@section('title', 'Tugas Pokok & Fungsi - Dinas Perhubungan Kabupaten Purbalingga')

@push('styles')
<style>
.profile-hero {
    background: linear-gradient(135deg, #0d6efd 0%, #084298 100%);
    position: relative;
    overflow: hidden;
    color: #ffffff;
    padding: 50px 0;
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

.tupoksi-card {
    transition: transform 0.25s ease, box-shadow 0.25s ease;
}

.tupoksi-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(13, 110, 253, 0.1) !important;
}
</style>
@endpush

@section('content')

    {{-- Breadcrumb --}}
    @include('partials.breadcrumb', [
        'items' => [
            ['name' => 'Profil', 'url' => route('profile.index')],
            ['name' => 'Tugas Pokok & Fungsi']
        ]
    ])

    {{-- HERO --}}
    <section class="profile-hero py-4 py-md-5">
        <div class="profile-hero-pattern"></div>
        <div class="container profile-hero-content text-center py-3">
            <span class="badge bg-warning text-dark px-3 py-1 mb-2 rounded-pill fw-bold small">
                REGULASI & TUPOKSI
            </span>
            <h2 class="fw-bold mb-2 text-white">Tugas Pokok & Fungsi</h2>
            <p class="lead text-white-50 max-w-2xl mx-auto mb-0 fs-6">
                Kedudukan, Tugas Pokok, dan Fungsi Utama Dinas Perhubungan Kabupaten Purbalingga.
            </p>
        </div>
    </section>

    {{-- 2-COLUMN LAYOUT: KIRI (1 & 2), KANAN (3 - FUNGSI UTAMA) --}}
    <section class="py-5 bg-light border-bottom">
        <div class="container">
            <div class="row g-4 align-items-stretch">
                
                {{-- KOLOM KIRI: 1. KEDUDUKAN & 2. TUGAS POKOK --}}
                <div class="col-lg-5 d-flex flex-column gap-4 reveal-left">
                    
                    {{-- 1. Kedudukan --}}
                    <div class="card border-0 shadow-sm rounded-4 p-4 bg-white tupoksi-card border-start border-4 border-primary flex-fill">
                        <div class="card-body p-0">
                            <div class="d-inline-flex align-items-center justify-content-center bg-primary bg-opacity-10 text-primary rounded-3 p-3 mb-3" style="width: 44px; height: 44px;">
                                <i class="bi bi-building fs-5"></i>
                            </div>
                            <h4 class="fw-bold text-dark mb-2 fs-5">1. Kedudukan Instansi</h4>
                            <p class="text-secondary small lh-base mb-0">
                                Dinas Perhubungan Kabupaten Purbalingga merupakan unsur pelaksana Pemerintah Daerah di bidang perhubungan, dipimpin oleh Kepala Dinas yang berkedudukan di bawah dan bertanggung jawab kepada Bupati melalui Sekretaris Daerah.
                            </p>
                        </div>
                    </div>

                    {{-- 2. Tugas Pokok --}}
                    <div class="card border-0 shadow-sm rounded-4 p-4 bg-white tupoksi-card border-start border-4 border-primary flex-fill">
                        <div class="card-body p-0">
                            <div class="d-inline-flex align-items-center justify-content-center bg-primary bg-opacity-10 text-primary rounded-3 p-3 mb-3" style="width: 44px; height: 44px;">
                                <i class="bi bi-briefcase-fill fs-5"></i>
                            </div>
                            <h4 class="fw-bold text-dark mb-2 fs-5">2. Tugas Pokok</h4>
                            <p class="text-secondary small lh-base mb-0">
                                Dinas Perhubungan mempunyai tugas membantu Bupati melaksanakan urusan pemerintahan yang menjadi kewenangan Daerah dan tugas pembantuan yang diberikan kepada Daerah di bidang perhubungan.
                            </p>
                        </div>
                    </div>

                </div>

                {{-- KOLOM KANAN: 3. FUNGSI UTAMA (5 SUB-ITEMS) --}}
                <div class="col-lg-7 reveal-right">
                    <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white h-100 tupoksi-card">
                        <div class="card-body p-0">
                            
                            <div class="d-flex align-items-center justify-content-between mb-3 border-bottom pb-3">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="d-inline-flex align-items-center justify-content-center bg-primary bg-opacity-10 text-primary rounded-3" style="width: 44px; height: 44px;">
                                        <i class="bi bi-list-check fs-4"></i>
                                    </div>
                                    <div>
                                        <h4 class="fw-bold text-dark mb-0 fs-5">3. Fungsi Utama</h4>
                                        <span class="text-muted small">5 Poin Penyelenggaraan Tugas</span>
                                    </div>
                                </div>
                            </div>

                            <p class="text-secondary small mb-4">
                                Untuk menyelenggarakan tugas pokok tersebut, Dinas Perhubungan mempunyai fungsi utama sebagai berikut:
                            </p>

                            <div class="d-flex flex-column gap-3">
                                <div class="d-flex align-items-start gap-3 p-3 bg-light rounded-3">
                                    <span class="fw-bold text-primary fs-5 lh-1 pt-1">01</span>
                                    <div>
                                        <h6 class="fw-bold mb-1 text-dark">Perumusan Kebijakan Teknis</h6>
                                        <p class="text-muted small mb-0 lh-base">Perumusan kebijakan teknis di bidang perhubungan, lalu lintas, angkutan, dan sarana prasarana perhubungan.</p>
                                    </div>
                                </div>

                                <div class="d-flex align-items-start gap-3 p-3 bg-light rounded-3">
                                    <span class="fw-bold text-primary fs-5 lh-1 pt-1">02</span>
                                    <div>
                                        <h6 class="fw-bold mb-1 text-dark">Pelaksanaan Kebijakan Operasional</h6>
                                        <p class="text-muted small mb-0 lh-base">Pelaksanaan kebijakan teknis dan operasional di bidang manajemen lalu lintas, angkutan jalan, dan pengelolaan fasilitas terminal.</p>
                                    </div>
                                </div>

                                <div class="d-flex align-items-start gap-3 p-3 bg-light rounded-3">
                                    <span class="fw-bold text-primary fs-5 lh-1 pt-1">03</span>
                                    <div>
                                        <h6 class="fw-bold mb-1 text-dark">Pengujian & Perizinan</h6>
                                        <p class="text-muted small mb-0 lh-base">Pelaksanaan pengujian kendaraan bermotor, perizinan trayek angkutan, serta pengawasan penerangan jalan umum.</p>
                                    </div>
                                </div>

                                <div class="d-flex align-items-start gap-3 p-3 bg-light rounded-3">
                                    <span class="fw-bold text-primary fs-5 lh-1 pt-1">04</span>
                                    <div>
                                        <h6 class="fw-bold mb-1 text-dark">Evaluasi & Pengawasan</h6>
                                        <p class="text-muted small mb-0 lh-base">Pelaksanaan evaluasi, pengawasan, dan pelaporan kinerja di bidang perhubungan secara berkala.</p>
                                    </div>
                                </div>

                                <div class="d-flex align-items-start gap-3 p-3 bg-light rounded-3">
                                    <span class="fw-bold text-primary fs-5 lh-1 pt-1">05</span>
                                    <div>
                                        <h6 class="fw-bold mb-1 text-dark">Administrasi & Tugas Lain</h6>
                                        <p class="text-muted small mb-0 lh-base">Pelaksanaan administrasi dinas dan tugas-tugas lain yang diberikan oleh Bupati sesuai dengan bidang tugasnya.</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- CTA --}}
    @include('partials.profile-cta')

@endsection
