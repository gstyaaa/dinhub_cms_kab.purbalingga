@extends('layouts.app')

@section('title', 'Peraturan | Dinas Perhubungan Kabupaten Purbalingga')

@section('content')

    {{-- Breadcrumb --}}
    @include('partials.breadcrumb', [
        'items' => [
            ['name' => 'PPID', 'url' => route('ppid.index')],
            ['name' => 'Peraturan']
        ]
    ])

    {{-- 1. Banner Statis Lokal (Bukan CMS) --}}
    <section class="position-relative py-5 text-white overflow-hidden" style="background: linear-gradient(135deg, #78350f 0%, #b45309 60%, #d97706 100%);">
        <div class="position-absolute top-0 start-0 w-100 h-100 opacity-25" style="background-image: url('{{ asset('images/hero-default.jpg') }}'); background-size: cover; background-position: center;"></div>
        <div class="container position-relative py-4 text-center">
            {{-- Solid Icon Badge --}}
            <div class="bg-warning text-dark rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center shadow-lg border border-2 border-white" style="width: 76px; height: 76px;">
                <i class="bi bi-journal-text fs-2"></i>
            </div>

            <span class="badge bg-warning text-dark rounded-pill px-3 py-2 mb-3 font-semibold text-uppercase tracking-wider">
                Produk Hukum & Regulasi
            </span>
            {{-- 2. Judul Halaman --}}
            <h1 class="fw-bold display-5 mb-3">Peraturan</h1>
            {{-- 3. Deskripsi Singkat --}}
            <p class="lead mx-auto text-white-50 mb-0" style="max-width: 720px;">
                Dokumen regulasi hukum perhubungan meliputi Keputusan Menteri, Peraturan Daerah, Peraturan Bupati, dan Peraturan Pemerintah.
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
                            <h5 class="fw-bold">Belum Ada Dokumen Peraturan</h5>
                            <p class="text-muted small mb-0">Daftar dokumen produk hukum akan ditampilkan di halaman ini.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            <div class="pt-5 text-center">
                <a href="{{ route('ppid.index') }}" class="btn btn-outline-warning text-dark rounded-pill px-4 py-2 fw-semibold">
                    <i class="bi bi-arrow-left me-2"></i> Kembali ke Profil PPID
                </a>
            </div>

        </div>
    </section>

@endsection
