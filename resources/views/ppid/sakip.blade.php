@extends('layouts.app')

@section('title', 'SAKIP | Dinas Perhubungan Kabupaten Purbalingga')

@section('content')

    {{-- Breadcrumb --}}
    @include('partials.breadcrumb', [
        'items' => [
            ['name' => 'PPID', 'url' => route('ppid.index')],
            ['name' => 'SAKIP']
        ]
    ])

    <section class="py-5 bg-light">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-10">

                    <div class="card border-0 shadow-sm rounded-4 p-4 p-lg-5 text-center reveal">
                        <div class="card-body py-4">

                            <div class="bg-success bg-opacity-10 text-success rounded-circle mx-auto mb-4 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                <i class="bi bi-file-earmark-bar-graph-fill fs-1"></i>
                            </div>

                            <span class="badge bg-success rounded-pill px-3 py-2 mb-3">Akuntabilitas Kinerja</span>

                            <h1 class="fw-bold mb-4">SAKIP</h1>

                            <p class="text-secondary fs-5 leading-relaxed mx-auto mb-4" style="max-width: 750px;">
                                Halaman ini akan memuat dokumen Sistem Akuntabilitas Kinerja Instansi Pemerintah (SAKIP) Dinas Perhubungan Kabupaten Purbalingga.
                            </p>

                            <div class="alert alert-success border-0 shadow-sm rounded-3 d-inline-block text-start px-4 py-3 mb-4" style="max-width: 650px;">
                                <div class="d-flex align-items-center gap-3">
                                    <i class="bi bi-check-circle-fill fs-3 text-success"></i>
                                    <span class="small">
                                        Dokumen akan dipublikasikan secara bertahap sesuai ketentuan yang berlaku.
                                    </span>
                                </div>
                            </div>

                            <div class="pt-3">
                                <a href="{{ route('ppid.index') }}" class="btn btn-outline-success rounded-pill px-4 py-2">
                                    <i class="bi bi-arrow-left me-2"></i> Kembali ke Profil PPID
                                </a>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

@endsection
