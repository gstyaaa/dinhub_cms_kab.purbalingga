@extends('layouts.app')

@section('title', 'Profil PPID | Dinas Perhubungan Kabupaten Purbalingga')

@push('styles')
<style>
    .org-chart-panel {
        width: 100%;
        overflow-x: auto;
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.05);
        padding: 32px 24px;
        border: 1px solid #e2e8f0;
    }

    .org-diagram-ppid {
        position: relative;
        width: 1080px;
        height: 390px;
        margin: 0 auto;
    }

    .org-line {
        position: absolute;
        z-index: 1;
        background: #8bb9f5;
        border-radius: 999px;
    }

    .org-card {
        position: absolute;
        z-index: 2;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        border: 1px solid #d8e2ef;
        border-radius: 1rem;
        background: #ffffff;
        padding: 0.85rem 1rem;
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
        font-size: 0.875rem;
        font-weight: 700;
        line-height: 1.35;
        letter-spacing: 0;
        text-transform: uppercase;
    }

    .org-subtitle {
        margin-top: 0.2rem;
        color: #334155;
        font-size: 0.825rem;
        font-weight: 600;
        line-height: 1.3;
        text-transform: none;
    }

    .org-card-head {
        width: 340px;
        min-height: 84px;
        background: linear-gradient(135deg, #0d6efd 0%, #0b5ed7 100%);
        border-color: #0a58ca;
    }

    .org-card-head .org-title {
        color: #ffc107;
        font-size: 0.775rem;
        letter-spacing: 0.5px;
    }

    .org-card-head .org-subtitle {
        color: #ffffff;
        font-size: 0.925rem;
    }

    .org-card-secretariat {
        width: 360px;
        min-height: 84px;
        background: #e7f1ff;
        border-color: #9ec5fe;
    }

    .org-card-secretariat .org-title {
        color: #0d6efd;
        font-size: 0.775rem;
        letter-spacing: 0.5px;
    }

    .org-card-secretariat .org-subtitle {
        color: #052c65;
        font-size: 0.9rem;
    }

    .org-card-field-ppid {
        width: 230px;
        min-height: 84px;
        border-color: #0d6efd;
        border-width: 2px;
        background: #ffffff;
    }

    .org-card-field-ppid .org-title {
        color: #0f172a;
        font-size: 0.825rem;
    }

    /* Absolute positioning for PPID diagram nodes */
    .ppid-node-atasan { top: 0; left: 370px; }
    .ppid-node-pelaksana { top: 130px; left: 360px; }
    .ppid-node-b1 { top: 285px; left: 20px; }
    .ppid-node-b2 { top: 285px; left: 280px; }
    .ppid-node-b3 { top: 285px; left: 540px; }
    .ppid-node-b4 { top: 285px; left: 800px; }

    /* Absolute positioning for PPID diagram lines */
    .line-ppid-1 { top: 84px; left: 539px; width: 2px; height: 46px; }
    .line-ppid-2 { top: 214px; left: 539px; width: 2px; height: 36px; }
    .line-ppid-h-split { top: 250px; left: 134px; width: 792px; height: 2px; }
    .line-ppid-drop-1 { top: 250px; left: 134px; width: 2px; height: 35px; }
    .line-ppid-drop-2 { top: 250px; left: 394px; width: 2px; height: 35px; }
    .line-ppid-drop-3 { top: 250px; left: 654px; width: 2px; height: 35px; }
    .line-ppid-drop-4 { top: 250px; left: 924px; width: 2px; height: 35px; }

    @media (max-width: 991px) {
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
            ['name' => 'PPID', 'url' => route('ppid.index')],
            ['name' => 'Profil PPID']
        ]
    ])

    <section class="py-5 bg-light">
        <div class="container">

            {{-- Header Title --}}
            <div class="text-center mb-5 reveal">
                <span class="badge bg-primary rounded-pill px-3 py-2 mb-3">Keterbukaan Informasi Publik</span>
                <h1 class="fw-bold mb-3">Profil PPID</h1>
                <p class="text-muted mx-auto" style="max-width: 750px;">
                    Pejabat Pengelola Informasi dan Dokumentasi (PPID) Pelaksana Dinas Perhubungan Kabupaten Purbalingga.
                </p>
            </div>

            <div class="row g-4 mb-5">
                {{-- Apa Itu PPID --}}
                <div class="col-lg-6 reveal-left">
                    <div class="card border-0 shadow-sm rounded-4 h-100 p-3 p-md-4">
                        <div class="card-body d-flex flex-column p-2">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-primary text-white rounded-3 p-3 d-flex align-items-center justify-content-center shadow-sm" style="width: 50px; height: 50px;">
                                        <i class="bi bi-info-circle-fill fs-4"></i>
                                    </div>
                                    <div>
                                        <h3 class="fw-bold mb-0 text-dark fs-4">Apa itu PPID?</h3>
                                        <span class="text-muted small">Gambaran Umum Instansi</span>
                                    </div>
                                </div>
                                <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill small fw-semibold">
                                    Profil Resmi
                                </span>
                            </div>

                            {{-- SINGLE RECTANGLE CONTAINER FOR EXPLANATION --}}
                            <div class="p-4 rounded-3 border my-auto" style="background-color: #f8fafc; border-color: #e2e8f0 !important; border-left: 4px solid #0d6efd !important;">
                                <p class="text-secondary lh-base mb-3" style="font-size: 0.95rem;">
                                    <strong>Pejabat Pengelola Informasi dan Dokumentasi (PPID) Pelaksana</strong> Dinas Perhubungan Kabupaten Purbalingga adalah unit kerja resmi yang bertanggung jawab dalam pengolahan, penyimpanan, pendokumentasian, serta penyediaan pelayanan informasi publik di lingkungan Dinas Perhubungan.
                                </p>
                                <p class="text-secondary lh-base mb-3" style="font-size: 0.95rem;">
                                    Dibentuk berdasarkan amanat <strong>UU No. 14 Tahun 2008</strong> tentang Keterbukaan Informasi Publik (KIP) dan Regulasi Pemerintah Kabupaten Purbalingga untuk menjamin hak masyarakat dalam memperoleh informasi publik secara transparan, akurat, dan akuntabel.
                                </p>
                                <div class="pt-2 border-top border-secondary border-opacity-10 d-flex align-items-center gap-2">
                                    <i class="bi bi-shield-check text-primary fs-5"></i>
                                    <span class="small fw-semibold text-primary">Menjamin Pelayanan Informasi Cepat, Tepat & Transparan</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Tugas Pokok dan Fungsi PPID --}}
                <div class="col-lg-6 reveal-right">
                    <div class="card border-0 shadow-sm rounded-4 h-100 p-3 p-md-4">
                        <div class="card-body d-flex flex-column p-2">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-success text-white rounded-3 p-3 d-flex align-items-center justify-content-center shadow-sm" style="width: 50px; height: 50px;">
                                        <i class="bi bi-list-check fs-4"></i>
                                    </div>
                                    <div>
                                        <h3 class="fw-bold mb-0 text-dark fs-4">Tugas Pokok dan Fungsi</h3>
                                        <span class="text-muted small">Fungsi & Tanggung Jawab Utama</span>
                                    </div>
                                </div>
                                <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill small fw-semibold">
                                    Tupoksi
                                </span>
                            </div>

                            <div class="d-flex flex-column gap-2.5 my-auto">
                                {{-- Task Item 1 --}}
                                <div class="p-3 rounded-3 border d-flex align-items-start gap-3" style="background-color: #ffffff; border-color: #e2e8f0 !important;">
                                    <div class="bg-success bg-opacity-10 text-success rounded-circle p-2 d-flex align-items-center justify-content-center flex-shrink-0 mt-0.5" style="width: 32px; height: 32px;">
                                        <i class="bi bi-check-lg fw-bold"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold text-dark mb-1 fs-6">Pelayanan Informasi Publik</h6>
                                        <p class="text-secondary small mb-0 lh-base" style="font-size: 0.85rem;">
                                            Menyediakan, memberikan, dan mengelola permohonan informasi publik masyarakat secara sederhana, cepat, dan efisien.
                                        </p>
                                    </div>
                                </div>

                                {{-- Task Item 2 --}}
                                <div class="p-3 rounded-3 border d-flex align-items-start gap-3" style="background-color: #ffffff; border-color: #e2e8f0 !important;">
                                    <div class="bg-success bg-opacity-10 text-success rounded-circle p-2 d-flex align-items-center justify-content-center flex-shrink-0 mt-0.5" style="width: 32px; height: 32px;">
                                        <i class="bi bi-check-lg fw-bold"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold text-dark mb-1 fs-6">Pengklasifikasian Informasi</h6>
                                        <p class="text-secondary small mb-0 lh-base" style="font-size: 0.85rem;">
                                            Mengategorikan daftar informasi publik (berkala, serta merta, setiap saat, maupun yang dikecualikan).
                                        </p>
                                    </div>
                                </div>

                                {{-- Task Item 3 --}}
                                <div class="p-3 rounded-3 border d-flex align-items-start gap-3" style="background-color: #ffffff; border-color: #e2e8f0 !important;">
                                    <div class="bg-success bg-opacity-10 text-success rounded-circle p-2 d-flex align-items-center justify-content-center flex-shrink-0 mt-0.5" style="width: 32px; height: 32px;">
                                        <i class="bi bi-check-lg fw-bold"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold text-dark mb-1 fs-6">Pendokumentasian Arsip</h6>
                                        <p class="text-secondary small mb-0 lh-base" style="font-size: 0.85rem;">
                                            Mengoordinasikan pengumpulan, pengolahan, penyimpanan, dan pengamanan dokumen resmi milik dinas.
                                        </p>
                                    </div>
                                </div>

                                {{-- Task Item 4 --}}
                                <div class="p-3 rounded-3 border d-flex align-items-start gap-3" style="background-color: #ffffff; border-color: #e2e8f0 !important;">
                                    <div class="bg-success bg-opacity-10 text-success rounded-circle p-2 d-flex align-items-center justify-content-center flex-shrink-0 mt-0.5" style="width: 32px; height: 32px;">
                                        <i class="bi bi-check-lg fw-bold"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold text-dark mb-1 fs-6">Penanganan Keberatan</h6>
                                        <p class="text-secondary small mb-0 lh-base" style="font-size: 0.85rem;">
                                            Memproses dan menyelesaikan tanggapan atas sengketa atau keberatan permohonan informasi publik.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Struktur Organisasi PPID --}}
            <div class="row mb-5 reveal">
                <div class="col-12">
                    <div class="card border-0 shadow-sm rounded-4 p-4 p-lg-5">
                        <div class="card-body text-center">
                            <div class="badge bg-warning text-dark px-3 py-2 mb-3 rounded-pill">Bagan Hirarki Resmi</div>
                            <h3 class="fw-bold mb-2 text-dark">Struktur Sekretariat Pejabat Pengelola Informasi dan Dokumentasi (PPID) Pelaksana</h3>
                            <p class="text-muted mx-auto mb-4" style="max-width: 700px;">
                                Dinas Perhubungan Kabupaten Purbalingga
                            </p>

                            <div class="d-block d-md-none text-center mb-3">
                                <span class="badge bg-white text-secondary border shadow-sm px-3 py-2 rounded-pill small">
                                    <i class="bi bi-arrows-left-right text-primary me-1"></i> Geser ke samping untuk melihat bagan lengkap
                                </span>
                            </div>

                            {{-- EXACT ORGANISATION DIAGRAM SYSTEM FROM PROFILE/ORGANIZATION --}}
                            <div class="org-chart-panel">
                                <div class="org-diagram-ppid" role="img" aria-label="Bagan Struktur Sekretariat PPID Pelaksana Dinas Perhubungan Kabupaten Purbalingga">
                                    
                                    {{-- Lines --}}
                                    <span class="org-line line-ppid-1"></span>
                                    <span class="org-line line-ppid-2"></span>
                                    <span class="org-line line-ppid-h-split"></span>
                                    <span class="org-line line-ppid-drop-1"></span>
                                    <span class="org-line line-ppid-drop-2"></span>
                                    <span class="org-line line-ppid-drop-3"></span>
                                    <span class="org-line line-ppid-drop-4"></span>

                                    {{-- Level 1: Atasan PPID Pelaksana --}}
                                    <div class="org-card org-card-head ppid-node-atasan rounded-4 shadow-sm">
                                        <p class="org-title">Atasan PPID Pelaksana:</p>
                                        <p class="org-subtitle">Kepala Dinas Perhubungan Kabupaten Purbalingga</p>
                                    </div>

                                    {{-- Level 2: PPID Pelaksana --}}
                                    <div class="org-card org-card-secretariat ppid-node-pelaksana rounded-4 shadow-sm">
                                        <p class="org-title">PPID Pelaksana:</p>
                                        <p class="org-subtitle">Sekretaris Dinas Perhubungan Kabupaten Purbalingga</p>
                                    </div>

                                    {{-- Level 3: 4 Bidang --}}
                                    <div class="org-card org-card-field-ppid ppid-node-b1 rounded-4 shadow-sm">
                                        <p class="org-title">Bidang Arsip dan Dokumentasi</p>
                                    </div>

                                    <div class="org-card org-card-field-ppid ppid-node-b2 rounded-4 shadow-sm">
                                        <p class="org-title">Bidang Pengumpulan dan Pengolahan Informasi Publik</p>
                                    </div>

                                    <div class="org-card org-card-field-ppid ppid-node-b3 rounded-4 shadow-sm">
                                        <p class="org-title">Bidang Pelayanan Informasi Publik</p>
                                    </div>

                                    <div class="org-card org-card-field-ppid ppid-node-b4 rounded-4 shadow-sm">
                                        <p class="org-title">Bidang Sengketa Informasi</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Komitmen Keterbukaan Informasi Publik --}}
            <div class="row reveal">
                <div class="col-12">
                    <div class="card border-0 shadow-sm rounded-4 text-white p-4 p-lg-5 overflow-hidden position-relative" style="background: linear-gradient(135deg, #0d6efd 0%, #0b5ed7 60%, #0a58ca 100%);">
                        <div class="card-body text-center position-relative z-1">
                            {{-- Ikon Utama --}}
                            <div class="bg-warning text-dark rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center shadow-lg border border-2 border-white" style="width: 72px; height: 72px;">
                                <i class="bi bi-shield-check fs-1"></i>
                            </div>

                            <span class="badge bg-warning text-dark rounded-pill px-3 py-2 mb-3 fw-bold text-uppercase tracking-wider">
                                Visi & Komitmen Pelayanan
                            </span>

                            {{-- Judul --}}
                            <h3 class="fw-bold mb-3 text-white fs-2">Komitmen Keterbukaan Informasi Publik</h3>

                            {{-- Deskripsi --}}
                            <p class="text-white-50 mx-auto mb-5 lead" style="max-width: 820px; font-size: 1.05rem;">
                                Dinas Perhubungan Kabupaten Purbalingga berkomitmen menyelenggarakan pelayanan informasi publik secara terbuka, akurat, dan dapat dipertanggungjawabkan sebagai wujud transparansi serta akuntabilitas kepada masyarakat sesuai ketentuan peraturan perundang-undangan yang berlaku.
                            </p>

                            {{-- 3 Poin Nilai Utama --}}
                            <div class="row g-4 text-start pt-3 border-top border-white border-opacity-20">
                                {{-- 1. Transparan --}}
                                <div class="col-md-4">
                                    <div class="bg-white bg-opacity-10 rounded-4 p-4 h-100 border border-white border-opacity-15">
                                        <div class="d-flex align-items-center gap-3 mb-2">
                                            <div class="bg-warning text-dark rounded-circle p-2.5 d-inline-flex align-items-center justify-content-center flex-shrink-0" style="width: 42px; height: 42px;">
                                                <i class="bi bi-eye-fill fs-5"></i>
                                            </div>
                                            <h5 class="fw-bold text-white mb-0 fs-5">Transparan</h5>
                                        </div>
                                        <p class="text-white-50 small mb-0 lh-base" style="font-size: 0.875rem;">
                                            Informasi publik disampaikan secara terbuka sesuai ketentuan.
                                        </p>
                                    </div>
                                </div>

                                {{-- 2. Akuntabel --}}
                                <div class="col-md-4">
                                    <div class="bg-white bg-opacity-10 rounded-4 p-4 h-100 border border-white border-opacity-15">
                                        <div class="d-flex align-items-center gap-3 mb-2">
                                            <div class="bg-warning text-dark rounded-circle p-2.5 d-inline-flex align-items-center justify-content-center flex-shrink-0" style="width: 42px; height: 42px;">
                                                <i class="bi bi-file-earmark-check-fill fs-5"></i>
                                            </div>
                                            <h5 class="fw-bold text-white mb-0 fs-5">Akuntabel</h5>
                                        </div>
                                        <p class="text-white-50 small mb-0 lh-base" style="font-size: 0.875rem;">
                                            Informasi yang dipublikasikan dapat dipertanggungjawabkan.
                                        </p>
                                    </div>
                                </div>

                                {{-- 3. Melayani --}}
                                <div class="col-md-4">
                                    <div class="bg-white bg-opacity-10 rounded-4 p-4 h-100 border border-white border-opacity-15">
                                        <div class="d-flex align-items-center gap-3 mb-2">
                                            <div class="bg-warning text-dark rounded-circle p-2.5 d-inline-flex align-items-center justify-content-center flex-shrink-0" style="width: 42px; height: 42px;">
                                                <i class="bi bi-people-fill fs-5"></i>
                                            </div>
                                            <h5 class="fw-bold text-white mb-0 fs-5">Melayani</h5>
                                        </div>
                                        <p class="text-white-50 small mb-0 lh-base" style="font-size: 0.875rem;">
                                            Pelayanan informasi diberikan secara profesional dan responsif.
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection


