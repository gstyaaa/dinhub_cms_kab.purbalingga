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

    <section class="py-5 bg-light">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-10">

                    <div class="card border-0 shadow-sm rounded-4 p-4 p-lg-5 text-center reveal">
                        <div class="card-body py-4">

                            <div class="bg-primary bg-opacity-10 text-primary rounded-circle mx-auto mb-4 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                <i class="bi bi-calendar-event-fill fs-1"></i>
                            </div>

                            <span class="badge bg-primary rounded-pill px-3 py-2 mb-3">Informasi PPID</span>

                            <h1 class="fw-bold mb-4">Program & Kegiatan</h1>

                            <p class="text-secondary fs-5 leading-relaxed mx-auto mb-4" style="max-width: 700px;">
                                Halaman ini akan memuat informasi mengenai program kerja dan kegiatan PPID Dinas Perhubungan Kabupaten Purbalingga.
                            </p>

                            <div class="alert alert-info border-0 shadow-sm rounded-3 d-inline-block text-start px-4 py-3 mb-4" style="max-width: 650px;">
                                <div class="d-flex align-items-center gap-3">
                                    <i class="bi bi-info-circle-fill fs-3 text-info"></i>
                                    <span class="small">
                                        Informasi akan dipublikasikan setelah proses verifikasi dan penetapan dokumen.
                                    </span>
                                </div>
                            </div>

                            <div class="pt-3">
                                <a href="{{ route('ppid.index') }}" class="btn btn-outline-primary rounded-pill px-4 py-2">
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
