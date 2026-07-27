@extends('layouts.app')

@section('title', 'Struktur Organisasi - Dinas Perhubungan Kabupaten Purbalingga')

@push('styles')
<style>
    /* Hero Section Styles */
    .profile-hero {
        position: relative;
        overflow: hidden;
        background: linear-gradient(135deg, #0d6efd 0%, #0b5ed7 100%);
        color: #fff;
        padding: 90px 0;
    }

    .profile-hero::before {
        content: "";
        position: absolute;
        inset: 0;
        background-image: radial-gradient(rgba(255,255,255,.15) 1px, transparent 1px);
        background-size: 18px 18px;
        opacity: .35;
    }

    .profile-hero-content {
        position: relative;
        z-index: 2;
    }

    .hero-badge {
        background: #ffc107;
        color: #212529;
        font-weight: 700;
        border-radius: 999px;
        padding: .55rem 1rem;
        display: inline-block;
        margin-bottom: 1rem;
    }

    .feature-icon {
        width: 60px;
        height: 60px;
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }

    .org-section {
        padding: 60px 0 80px 0;
        background: #f8fafc;
    }

    .org-chart-panel {
        width: 100%;
        overflow-x: auto;
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.05);
        padding: 32px 24px;
        border: 1px solid #e2e8f0;
    }

    .org-diagram {
        position: relative;
        width: 1480px;
        height: 740px;
        margin: 0 auto;
    }

    .org-line {
        position: absolute;
        z-index: 1;
        background: #8bb9f5;
        border-radius: 999px;
    }

    .org-line-dashed {
        background: transparent;
        border-top: 2px dashed #94a3b8;
        border-radius: 0;
    }

    .org-line-dashed-v {
        background: transparent;
        border-left: 2px dashed #94a3b8;
        border-radius: 0;
    }

    .org-card {
        position: absolute;
        z-index: 2;
        width: 220px;
        min-height: 74px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #d8e2ef;
        border-radius: 1rem;
        background: #ffffff;
        padding: 1rem;
        text-align: center;
        box-shadow: 0 0.125rem 0.35rem rgba(15, 23, 42, 0.06);
        transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
    }

    .org-card:hover {
        transform: translateY(-3px);
        border-color: #86b7fe;
        box-shadow: 0 0.5rem 1rem rgba(13, 110, 253, 0.12);
    }

    .org-title {
        margin: 0;
        color: #0f172a;
        font-size: 0.9rem;
        font-weight: 700;
        line-height: 1.35;
        letter-spacing: 0;
        text-transform: uppercase;
    }

    .org-card-head {
        width: 260px;
        min-height: 92px;
        background: linear-gradient(135deg, #0d6efd 0%, #0b5ed7 100%);
        border-color: #0a58ca;
    }

    .org-card-head .org-title {
        color: #ffffff;
        font-size: 1rem;
    }

    .org-card-secretariat {
        background: #e7f1ff;
        border-color: #9ec5fe;
    }

    .org-card-field {
        border-color: #0d6efd;
        border-width: 2px;
    }

    .org-card-functional {
        background: #f8fafc;
        border-color: #cbd5e1;
    }

    .org-card-dashed {
        background: #ffffff;
        border-color: #94a3b8;
        border-style: dashed;
    }

    .org-card-staff,
    .org-card-section {
        background: #ffffff;
    }

    .org-reference {
        position: absolute;
        right: 0;
        bottom: 0;
        z-index: 2;
        width: 330px;
        color: #64748b;
        font-size: 0.72rem;
        line-height: 1.45;
        text-align: right;
    }

    .org-head { top: 0; left: 610px; }
    .org-functional { top: 145px; left: 110px; }
    .org-secretariat { top: 145px; left: 1010px; }
    .org-planning { top: 250px; left: 880px; width: 230px; }
    .org-general { top: 250px; left: 1130px; width: 230px; }
    .org-traffic { top: 360px; left: 205px; width: 260px; }
    .org-transport { top: 360px; left: 928px; width: 260px; }
    .org-functional-sub { top: 505px; left: 30px; width: 190px; min-height: 88px; }
    .org-traffic-management { top: 505px; left: 240px; width: 190px; min-height: 88px; }
    .org-traffic-infra { top: 505px; left: 450px; width: 190px; min-height: 88px; }
    .org-uptd { top: 620px; left: 630px; width: 220px; min-height: 88px; }
    .org-transport-management { top: 505px; left: 850px; width: 190px; min-height: 88px; }
    .org-transport-control { top: 505px; left: 1060px; width: 220px; min-height: 118px; }

    .line-root { top: 92px; left: 739px; width: 2px; height: 36px; }
    .line-functional-h { top: 128px; left: 220px; width: 519px; height: 2px; }
    .line-functional-v { top: 128px; left: 219px; width: 2px; height: 17px; }
    .line-secretariat-h { top: 128px; left: 740px; width: 380px; height: 2px; }
    .line-secretariat-v { top: 128px; left: 1119px; width: 2px; height: 17px; }
    .line-main-down { top: 128px; left: 739px; width: 2px; height: 492px; }
    .line-field-horizontal { top: 335px; left: 335px; width: 723px; height: 2px; }
    .line-traffic { top: 335px; left: 335px; width: 2px; height: 25px; }
    .line-transport { top: 335px; left: 1058px; width: 2px; height: 25px; }
    .line-secretariat-down { top: 219px; left: 1119px; width: 2px; height: 16px; }
    .line-secretariat-sub { top: 235px; left: 995px; width: 250px; height: 2px; }
    .line-subbag-planning { top: 235px; left: 995px; width: 2px; height: 15px; }
    .line-subbag-general { top: 235px; left: 1245px; width: 2px; height: 15px; }
    .line-traffic-down { top: 434px; left: 335px; width: 2px; height: 41px; }
    .line-traffic-sub { top: 475px; left: 335px; width: 210px; height: 2px; }
    .line-functional-sub-source { display: none; }
    .line-functional-sub-h { top: 475px; left: 125px; width: 210px; height: 2px; }
    .line-functional-sub-v { top: 475px; left: 125px; width: 2px; height: 30px; }
    .line-traffic-management { top: 475px; left: 335px; width: 2px; height: 30px; }
    .line-traffic-infra { top: 475px; left: 545px; width: 2px; height: 30px; }
    .line-transport-down { top: 434px; left: 1058px; width: 2px; height: 41px; }
    .line-transport-sub { top: 475px; left: 945px; width: 225px; height: 2px; }
    .line-transport-management { top: 475px; left: 945px; width: 2px; height: 30px; }
    .line-transport-control { top: 475px; left: 1170px; width: 2px; height: 30px; }

    @media (max-width: 1199px) {
        .org-chart-panel {
            padding: 28px 18px;
        }
    }

    @media (max-width: 991px) {
        .profile-hero {
            padding: 70px 0;
        }

        .profile-hero h1 {
            font-size: 2.2rem;
        }

        .org-chart-panel {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
    }
</style>
@endpush

@section('content')

    {{-- Breadcrumb --}}
    @include('partials.breadcrumb', [
        'items' => [
            ['name' => 'Profil', 'url' => route('profile.index')],
            ['name' => 'Struktur Organisasi']
        ]
    ])

    {{-- 1. HERO SECTION --}}
    <section class="profile-hero py-5">
        <div class="container profile-hero-content text-center py-4">
            <span class="hero-badge">
                BAGAN INSTANSI
            </span>
            <h1 class="display-4 fw-bold mb-3">Struktur Organisasi</h1>
            <p class="lead text-white-50 max-w-2xl mx-auto mb-0 fs-5">
                Bagan susunan organisasi dan hierarki jabatan Dinas Perhubungan Kabupaten Purbalingga.
            </p>
        </div>
    </section>

    {{-- 2. INFORMASI STRUKTUR ORGANISASI & TUJUAN --}}
    <section class="py-5 bg-white border-bottom">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm rounded-4 h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="feature-icon bg-primary-subtle text-primary me-3">
                                    <i class="bi bi-diagram-3-fill"></i>
                                </div>
                                <h4 class="fw-bold mb-0 text-dark">
                                    Struktur Organisasi
                                </h4>
                            </div>
                            <p class="text-muted mb-0">
                                Struktur organisasi Dinas Perhubungan Kabupaten Purbalingga disusun berdasarkan Peraturan Bupati Kabupaten Purbalingga Nomor 58 Tahun 2022 mengenai kedudukan, susunan organisasi, tugas, fungsi dan tata kerja perangkat daerah.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm rounded-4 h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="feature-icon bg-success-subtle text-success me-3">
                                    <i class="bi bi-info-circle-fill"></i>
                                </div>
                                <h4 class="fw-bold mb-0 text-dark">
                                    Tujuan
                                </h4>
                            </div>
                            <p class="text-muted mb-0">
                                Bagan organisasi ini memberikan gambaran mengenai pembagian tugas, hubungan koordinasi serta tanggung jawab setiap unsur organisasi dalam mendukung penyelenggaraan pelayanan publik di bidang perhubungan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 3. BAGAN STRUKTUR ORGANISASI --}}
    <section class="org-section">
        <div class="container">
            <div class="text-center mb-4">
                <span class="badge bg-primary rounded-pill px-3 py-2 mb-2">Bagan Hirarki Resmi</span>
                <h2 class="fw-bold text-dark mb-2">Bagan Struktur Organisasi</h2>
                <p class="text-muted mb-0">Berdasarkan Lampiran Peraturan Bupati Purbalingga Nomor 58 Tahun 2022</p>
            </div>

            <div class="d-block d-md-none text-center mb-3">
                <span class="badge bg-white text-secondary border shadow-sm px-3 py-2 rounded-pill small">
                    <i class="bi bi-arrows-left-right text-primary me-1"></i> Geser ke samping untuk melihat seluruh bagan
                </span>
            </div>

            <div class="org-chart-panel">
                <div class="org-diagram" role="img" aria-label="Bagan Struktur Organisasi Dinas Perhubungan Kabupaten Purbalingga">
                    <span class="org-line line-root"></span>
                    <span class="org-line org-line-dashed line-functional-h"></span>
                    <span class="org-line org-line-dashed-v line-functional-v"></span>
                    <span class="org-line line-secretariat-h"></span>
                    <span class="org-line line-secretariat-v"></span>
                    <span class="org-line line-main-down"></span>
                    <span class="org-line line-field-horizontal"></span>
                    <span class="org-line line-traffic"></span>
                    <span class="org-line line-transport"></span>
                    <span class="org-line line-secretariat-down"></span>
                    <span class="org-line line-secretariat-sub"></span>
                    <span class="org-line line-subbag-planning"></span>
                    <span class="org-line line-subbag-general"></span>
                    <span class="org-line line-traffic-down"></span>
                    <span class="org-line line-traffic-sub"></span>
                    <span class="org-line org-line-dashed-v line-functional-sub-source"></span>
                    <span class="org-line org-line-dashed line-functional-sub-h"></span>
                    <span class="org-line org-line-dashed-v line-functional-sub-v"></span>
                    <span class="org-line line-traffic-management"></span>
                    <span class="org-line line-traffic-infra"></span>
                    <span class="org-line line-transport-down"></span>
                    <span class="org-line line-transport-sub"></span>
                    <span class="org-line line-transport-management"></span>
                    <span class="org-line line-transport-control"></span>

                    <div class="org-card org-card-head org-head rounded-4 shadow-sm">
                        <p class="org-title">Kepala Dinas</p>
                    </div>

                    <div class="org-card org-card-functional org-functional rounded-4 shadow-sm">
                        <p class="org-title">Kelompok Jabatan Fungsional</p>
                    </div>

                    <div class="org-card org-card-secretariat org-secretariat rounded-4 shadow-sm">
                        <p class="org-title">Sekretariat</p>
                    </div>

                    <div class="org-card org-card-staff org-planning rounded-4 shadow-sm">
                        <p class="org-title">Subbag Perencanaan dan Keuangan</p>
                    </div>

                    <div class="org-card org-card-staff org-general rounded-4 shadow-sm">
                        <p class="org-title">Subbag Umum dan Kepegawaian</p>
                    </div>

                    <div class="org-card org-card-field org-traffic rounded-4 shadow-sm">
                        <p class="org-title">Bidang Lalu Lintas</p>
                    </div>

                    <div class="org-card org-card-field org-transport rounded-4 shadow-sm">
                        <p class="org-title">Bidang Angkutan</p>
                    </div>

                    <div class="org-card org-card-dashed org-functional-sub rounded-4 shadow-sm">
                        <p class="org-title">Sub Koordinator dan Kelompok Jabatan Fungsional</p>
                    </div>

                    <div class="org-card org-card-section org-traffic-management rounded-4 shadow-sm">
                        <p class="org-title">Seksi Manajemen Lalu Lintas</p>
                    </div>

                    <div class="org-card org-card-section org-traffic-infra rounded-4 shadow-sm">
                        <p class="org-title">Seksi Sarana dan Prasarana Lalu Lintas</p>
                    </div>

                    <div class="org-card org-card-field org-uptd rounded-4 shadow-sm">
                        <p class="org-title">UPTD</p>
                    </div>

                    <div class="org-card org-card-section org-transport-management rounded-4 shadow-sm">
                        <p class="org-title">Seksi Manajemen Angkutan Umum</p>
                    </div>

                    <div class="org-card org-card-section org-transport-control rounded-4 shadow-sm">
                        <p class="org-title">Seksi Pengendalian dan Ketertiban Lalu Lintas dan Angkutan Jalan</p>
                    </div>

                    <p class="org-reference mb-0">
                        Lampiran Peraturan Bupati Purbalingga Nomor 58 Tahun 2022 tentang kedudukan, susunan organisasi, tugas dan fungsi serta tata kerja Dinas Perhubungan Kabupaten Purbalingga.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- 4. CTA --}}
    @include('partials.profile-cta')

@endsection
