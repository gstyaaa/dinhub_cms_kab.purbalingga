@extends('layouts.app')

@section('title', 'Profil PPID | Dinas Perhubungan Kabupaten Purbalingga')

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
                    <div class="card border-0 shadow-sm rounded-4 h-100 p-4">
                        <div class="card-body d-flex flex-column">
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-flex align-items-center justify-content-center" style="width: 56px; height: 56px;">
                                    <i class="bi bi-info-circle-fill fs-3"></i>
                                </div>
                                <h3 class="fw-bold mb-0">Apa itu PPID?</h3>
                            </div>
                            
                            <div class="bg-light border rounded-4 p-4 my-auto text-center d-flex flex-column align-items-center justify-content-center" style="min-height: 180px;">
                                <i class="bi bi-file-earmark-text text-primary fs-2 mb-2"></i>
                                <h6 class="fw-bold text-dark mb-1">Informasi Gambaran Umum PPID</h6>
                                <p class="text-muted small mb-0" style="max-width: 420px;">
                                    Informasi mengenai profil dan gambaran umum PPID Pelaksana Dinas Perhubungan Kabupaten Purbalingga akan dipublikasikan setelah verifikasi dan penetapan dokumen resmi.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Tugas Singkat PPID --}}
                <div class="col-lg-6 reveal-right">
                    <div class="card border-0 shadow-sm rounded-4 h-100 p-4">
                        <div class="card-body d-flex flex-column">
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <div class="bg-success bg-opacity-10 text-success rounded-circle p-3 d-flex align-items-center justify-content-center" style="width: 56px; height: 56px;">
                                    <i class="bi bi-list-check fs-3"></i>
                                </div>
                                <h3 class="fw-bold mb-0">Tugas Singkat PPID</h3>
                            </div>
                            
                            <div class="bg-light border rounded-4 p-4 my-auto text-center d-flex flex-column align-items-center justify-content-center" style="min-height: 180px;">
                                <i class="bi bi-card-checklist text-success fs-2 mb-2"></i>
                                <h6 class="fw-bold text-dark mb-1">Tugas & Fungsi PPID</h6>
                                <p class="text-muted small mb-0" style="max-width: 420px;">
                                    Rincian tugas pokok, fungsi, dan wewenang PPID Pelaksana Dinas Perhubungan Kabupaten Purbalingga akan dipublikasikan setelah penetapan SK resmi.
                                </p>
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
                            <div class="badge bg-warning text-dark px-3 py-2 mb-3 rounded-pill">Bagan Organisasi</div>
                            <h3 class="fw-bold mb-3">Struktur Organisasi PPID Pelaksana</h3>
                            <p class="text-muted mx-auto mb-4" style="max-width: 650px;">
                                Susunan tim dan bagan struktur organisasi PPID Pelaksana Dinas Perhubungan Kabupaten Purbalingga.
                            </p>

                            <div class="bg-light border rounded-4 p-5 d-flex flex-column align-items-center justify-content-center my-3" style="min-height: 240px;">
                                <i class="bi bi-diagram-3 display-3 text-primary mb-3"></i>
                                <h5 class="fw-bold text-dark mb-2">Bagan Struktur Organisasi PPID</h5>
                                <p class="text-muted small mb-0" style="max-width: 500px;">
                                    Dokumen bagan struktur organisasi PPID Pelaksana sedang dalam tahap pembaharuan SK dan penetapan resmi.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- CTA Portal PPID Kabupaten --}}
            <div class="row reveal">
                <div class="col-12">
                    <div class="card border-0 shadow-sm rounded-4 bg-primary text-white p-4 p-lg-5">
                        <div class="card-body text-center">
                            <i class="bi bi-globe display-4 mb-3 d-inline-block"></i>
                            <h3 class="fw-bold mb-3">Permohonan Informasi Publik Online</h3>
                            <p class="text-white-50 mx-auto mb-4" style="max-width: 700px;">
                                Untuk mengajukan permohonan informasi publik secara terintegrasi, Anda dapat mengunjungi Portal PPID Utama Pemerintah Kabupaten Purbalingga.
                            </p>
                            <a href="{{ config('links.pemkab.url', 'https://ppid.purbalinggakab.go.id') }}" target="_blank" rel="noopener noreferrer" class="btn btn-warning btn-lg rounded-pill px-4 py-2 fw-bold text-dark shadow-sm">
                                <i class="bi bi-box-arrow-up-right me-2"></i> Kunjungi Portal PPID Kabupaten Purbalingga
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
