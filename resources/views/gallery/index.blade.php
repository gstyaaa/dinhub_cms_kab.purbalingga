@extends('layouts.app')

@section('title', 'Galeri Kegiatan - Dinas Perhubungan Kabupaten Purbalingga')

@section('content')

    {{-- Breadcrumb --}}
    @include('partials.breadcrumb', [
        'items' => ['Galeri']
    ])

    <section class="py-5">
        <div class="container">
            <div class="mb-5 text-center">
                <span class="badge bg-primary px-3 py-2 mb-2 rounded-pill">Dokumentasi</span>
                <h2 class="fw-bold">Galeri Kegiatan</h2>
                <p class="text-muted">
                    Dokumentasi foto kegiatan Dinas Perhubungan Kabupaten Purbalingga.
                </p>
            </div>

            {{-- Grid 4 Kolom / 4 Per Baris --}}
            <div class="row g-4">
                @forelse($photos as $photo)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100 gallery-card position-relative">
                            <div class="ratio ratio-1x1 overflow-hidden bg-light">
                                <img src="{{ Storage::url($photo->image) }}" 
                                     class="card-img-top object-fit-cover transition-transform" 
                                     alt="{{ $photo->title ?? 'Foto Kegiatan' }}"
                                     loading="lazy">
                            </div>

                            <div class="card-body p-3 d-flex flex-column justify-content-between">
                                <div>
                                    <h6 class="fw-semibold card-title mb-1 text-truncate" title="{{ $photo->title }}">
                                        {{ $photo->title ?: 'Dokumentasi Kegiatan' }}
                                    </h6>
                                    <small class="text-muted d-block">
                                        <i class="bi bi-calendar3 me-1"></i> {{ $photo->created_at->format('d M Y') }}
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="card border-0 shadow-sm rounded-4">
                            <div class="card-body text-center py-5">
                                <i class="bi bi-images display-3 text-secondary mb-3"></i>
                                <h4 class="fw-bold">Belum Ada Foto Galeri</h4>
                                <p class="text-muted mb-0">
                                    Dokumentasi foto kegiatan akan diunggah dan ditampilkan di sini.
                                </p>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>

            <div class="mt-4 pt-2">
                {{ $photos->links() }}
            </div>
        </div>
    </section>

    <style>
        .gallery-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .gallery-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1) !important;
        }
        .transition-transform {
            transition: transform 0.4s ease;
        }
        .gallery-card:hover .transition-transform {
            transform: scale(1.08);
        }
    </style>

@endsection
