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

    <section class="py-5 bg-light">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-10">

                    <div class="card border-0 shadow-sm rounded-4 p-4 p-lg-5 text-center reveal">
                        <div class="card-body py-4">

                            <div class="bg-warning bg-opacity-15 text-warning rounded-circle mx-auto mb-4 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                <i class="bi bi-journal-text fs-1 text-dark"></i>
                            </div>

                            <span class="badge bg-warning text-dark rounded-pill px-3 py-2 mb-3">Regulasi & Kebijakan</span>

                            <h1 class="fw-bold mb-4">Peraturan</h1>

                            <p class="text-secondary fs-5 leading-relaxed mx-auto mb-4" style="max-width: 750px;">
                                Halaman ini akan memuat berbagai regulasi, peraturan, dan kebijakan yang berkaitan dengan keterbukaan informasi publik di Dinas Perhubungan Kabupaten Purbalingga.
                            </p>

                            <div class="alert alert-warning border-0 shadow-sm rounded-3 d-inline-block text-start px-4 py-3 mb-4" style="max-width: 650px;">
                                <div class="d-flex align-items-center gap-3">
                                    <i class="bi bi-shield-lock-fill fs-3 text-warning"></i>
                                    <span class="small text-dark">
                                        Dokumen hukum dan regulasi resmi dipublikasikan secara berkala sesuai ketentuan hukum yang berlaku.
                                    </span>
                                </div>
                            </div>

                            <div class="pt-3">
                                <a href="{{ route('ppid.index') }}" class="btn btn-outline-dark rounded-pill px-4 py-2">
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
