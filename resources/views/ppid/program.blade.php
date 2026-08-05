@extends('layouts.app')

@section('title', 'Program & Kegiatan | Dinas Perhubungan Kabupaten Purbalingga')

@section('content')

    {{-- Breadcrumb --}}
    @include('partials.breadcrumb', [
        'items' => [
            ['name' => 'PPID', 'url' => route('ppid.index')],
            ['name' => 'Program & Kegiatan']
        ]
    ])

    {{-- 1. Banner Statis Lokal (Bukan CMS) --}}
    <section class="position-relative py-5 text-white overflow-hidden" style="background: linear-gradient(135deg, #071527 0%, #0d3b66 60%, #1e3a8a 100%);">
        <div class="position-absolute top-0 start-0 w-100 h-100 opacity-25" style="background-image: url('{{ asset('images/hero-default.jpg') }}'); background-size: cover; background-position: center;"></div>
        <div class="container position-relative py-4 text-center">
            {{-- Solid Icon Badge --}}
            <div class="bg-primary text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center shadow-lg border border-2 border-white" style="width: 76px; height: 76px;">
                <i class="bi bi-calendar-event-fill fs-2"></i>
            </div>
            
            <span class="badge bg-primary rounded-pill px-3 py-2 mb-3 font-semibold text-uppercase tracking-wider">
                Keterbukaan Informasi Publik
            </span>
            {{-- 2. Judul Halaman --}}
            <h1 class="fw-bold display-5 mb-3">Program & Kegiatan</h1>
            {{-- 3. Deskripsi Singkat --}}
            <p class="lead mx-auto text-white-50 mb-0" style="max-width: 720px;">
                Dokumen transparansi perencanaan kerja, anggaran, neraca, serta daftar aset Dinas Perhubungan Kabupaten Purbalingga.
            </p>
        </div>
    </section>

    {{-- 4. Daftar Dokumen --}}
    <section class="py-5 bg-light">
        <div class="container">

            <div class="row g-4">
                @forelse($documents as $doc)
                    <div class="col-12 col-md-6 col-lg-4 reveal">
                        @include('partials.document-public-card', ['doc' => $doc])
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <div class="card border-0 shadow-sm rounded-4 p-5">
                            <i class="bi bi-folder-x text-muted display-4 mb-3"></i>
                            <h5 class="fw-bold">Belum Ada Dokumen Program & Kegiatan</h5>
                            <p class="text-muted small mb-0">Daftar dokumen resmi akan ditampilkan di halaman ini.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            <div class="pt-5 text-center">
                <a href="{{ route('ppid.index') }}" class="btn btn-outline-primary rounded-pill px-4 py-2 fw-semibold">
                    <i class="bi bi-arrow-left me-2"></i> Kembali ke Profil PPID
                </a>
            </div>

        </div>
    </section>

@endsection
