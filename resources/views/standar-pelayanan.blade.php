@extends('layouts.app')

@section('title', 'Standar Pelayanan | ' . config('dishub.name'))

@section('content')

    {{-- Breadcrumb --}}
    @include('partials.breadcrumb', [
        'items' => [
            ['name' => 'Standar Pelayanan']
        ]
    ])

    {{-- 1. Banner Section --}}
    <section class="position-relative py-5 text-white overflow-hidden" style="background: linear-gradient(135deg, #071527 0%, #0d3b66 60%, #1e3a8a 100%);">
        <div class="position-absolute top-0 start-0 w-100 h-100 opacity-25" style="background-image: url('{{ asset('images/Standar Pelayanan.webp') }}'); background-size: cover; background-position: center;"></div>
        <div class="container position-relative py-4 text-center">
            {{-- Solid Icon Badge --}}
            <div class="bg-primary text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center shadow-lg border border-2 border-white" style="width: 76px; height: 76px;">
                <i class="bi bi-award-fill fs-2"></i>
            </div>

            <span class="badge bg-warning text-dark rounded-pill px-3 py-2 mb-3 fw-bold text-uppercase tracking-wider">
                Mutu & Kepastian Hukum
            </span>

            {{-- Judul Halaman --}}
            <h1 class="fw-bold display-5 mb-3">Standar Pelayanan</h1>

            {{-- Deskripsi Singkat --}}
            <p class="lead mx-auto text-white-50 mb-0" style="max-width: 760px;">
                Pedoman resmi penyelenggaraan pelayanan publik Dinas Perhubungan Kabupaten Purbalingga untuk menjamin kepastian hukum, transparansi, dan kualitas pelayanan bagi masyarakat.
            </p>
        </div>
    </section>

    {{-- 2. Penjelasan Singkat Section --}}
    <section class="py-5 bg-light">
        <div class="container">

            <div class="row mb-5 reveal">
                <div class="col-12">
                    <div class="card border-0 shadow-sm rounded-4 p-4 p-lg-5">
                        <div class="card-body">
                            <div class="row align-items-center g-4">
                                <div class="col-lg-3 text-center border-end-lg">
                                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                        <i class="bi bi-file-earmark-check-fill display-5"></i>
                                    </div>
                                    <h5 class="fw-bold text-dark mb-1">Landasan Hukum</h5>
                                    <span class="badge bg-primary rounded-pill px-3 py-1.5 small">UU No. 25 Tahun 2009</span>
                                </div>
                                <div class="col-lg-9">
                                    <h4 class="fw-bold text-dark mb-3">Apa itu Standar Pelayanan?</h4>
                                    <p class="text-secondary lh-base mb-3" style="font-size: 0.975rem;">
                                        <strong>Standar Pelayanan</strong> adalah tolok ukur yang dipergunakan sebagai pedoman penyelenggaraan pelayanan dan acuan penilaian kualitas pelayanan sebagai kewajiban dan janji penyelenggara kepada masyarakat dalam rangka pelayanan yang berkualitas, cepat, mudah, terjangkau, dan terukur.
                                    </p>
                                    <p class="text-secondary lh-base mb-0" style="font-size: 0.975rem;">
                                        Dinas Perhubungan Kabupaten Purbalingga berkomitmen penuh menetapkan dan melaksanakan Standar Pelayanan publik secara terbuka untuk seluruh sektor pengujian kendaraan (KIR), perizinan angkutan, perlengkapan jalan (PJU), andalalin, dan pengelolaan retribusi parkir.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 3. Galeri Poster Section --}}
            <div class="mb-5">
                <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-2">
                    <div>
                        <h3 class="fw-bold text-dark mb-1">
                            <i class="bi bi-images text-primary me-2"></i> Galeri Poster Standar Pelayanan
                        </h3>
                        <p class="text-muted small mb-0">Klik pada kartu poster untuk membuka berkas gambar resolusi tinggi di tab baru.</p>
                    </div>
                    <span class="badge bg-primary bg-opacity-10 text-primary border border-primary-subtle rounded-pill px-3 py-2 small fw-semibold">
                        Format WebP Resmi
                    </span>
                </div>

                <div class="row g-4 justify-content-center">
                    @foreach($posters as $poster)
                        <div class="col-12 col-md-6 col-lg-4 reveal">
                            <a href="{{ $poster['image'] }}" 
                               target="_blank" 
                               rel="noopener noreferrer" 
                               class="card border-0 shadow-sm rounded-4 h-100 transition-all hover-shadow text-decoration-none overflow-hidden d-flex flex-column">
                                
                                {{-- Thumbnail Poster --}}
                                <div class="position-relative overflow-hidden bg-secondary bg-opacity-10" style="height: 230px;">
                                    <img src="{{ $poster['image'] }}" 
                                         alt="{{ $poster['title'] }}" 
                                         class="w-100 h-100 object-fit-cover transition-all"
                                         style="object-position: top center;"
                                         loading="lazy">
                                    <div class="position-absolute top-0 end-0 m-3">
                                        <span class="badge bg-primary rounded-pill px-3 py-1.5 shadow-sm small fw-semibold">
                                            POSTER
                                        </span>
                                    </div>
                                </div>

                                {{-- Isi Card --}}
                                <div class="card-body p-4 d-flex flex-column justify-content-between flex-grow-1">
                                    <div>
                                        <h5 class="fw-bold text-dark mb-2 lh-sm fs-5">
                                            {{ $poster['title'] }}
                                        </h5>
                                        <p class="text-muted small mb-3 lh-base" style="font-size: 0.875rem;">
                                            {{ $poster['description'] }}
                                        </p>
                                    </div>

                                    <div class="pt-3 border-top d-flex align-items-center justify-content-between text-primary fw-semibold small">
                                        <span>Lihat Gambar Resolusi Tinggi</span>
                                        <i class="bi bi-box-arrow-up-right"></i>
                                    </div>
                                </div>

                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- 4. Dokumen Pendukung Section --}}
            <div>
                <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-2">
                    <div>
                        <h3 class="fw-bold text-dark mb-1">
                            <i class="bi bi-folder-symlink-fill text-primary me-2"></i> Dokumen Pendukung Standar Pelayanan
                        </h3>
                        <p class="text-muted small mb-0">Berkas keputusan resmi, maklumat pelayanan, kode etik, serta hasil Survei Kepuasan Masyarakat (SKM).</p>
                    </div>
                    <span class="badge bg-success bg-opacity-10 text-success border border-success-subtle rounded-pill px-3 py-2 small fw-semibold">
                        Dokumen PDF Resmi
                    </span>
                </div>

                <div class="row g-4">
                    @forelse($documents as $doc)
                        <div class="col-12 col-md-6 col-lg-4 reveal">
                            @include('partials.document-public-card', ['doc' => $doc])
                        </div>
                    @empty
                        <div class="col-12 text-center py-5">
                            <div class="card border-0 shadow-sm rounded-4 p-5">
                                <i class="bi bi-folder-x text-muted display-4 mb-3"></i>
                                <h5 class="fw-bold">Belum Ada Dokumen Pendukung</h5>
                                <p class="text-muted small mb-0">Dokumen resmi SK Standar Pelayanan, Maklumat, dan SKM akan ditampilkan di sini.</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </section>

@endsection
