@extends('layouts.app')

@section('title', 'Galeri - Dinas Perhubungan Kabupaten Purbalingga')

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
                    Dokumentasi foto dan album kegiatan Dinas Perhubungan Kabupaten Purbalingga.
                </p>
            </div>

            <div class="row g-4">
                @forelse($albums as $album)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card border-0 shadow-sm rounded-3 hover-card h-100 overflow-hidden">
                            @if($album->cover_image)
                                <img src="{{ Storage::url($album->cover_image) }}" class="card-img-top" alt="{{ $album->title }}" style="height: 220px; object-fit: cover;">
                            @elseif($album->images->isNotEmpty())
                                <img src="{{ Storage::url($album->images->first()->image_path) }}" class="card-img-top" alt="{{ $album->title }}" style="height: 220px; object-fit: cover;">
                            @else
                                <img src="{{ asset('images/gallery-placeholder.jpg') }}" class="card-img-top" alt="{{ $album->title }}" style="height: 220px; object-fit: cover;">
                            @endif

                            <div class="card-body">
                                <span class="badge bg-secondary mb-2">
                                    <i class="bi bi-images me-1"></i> {{ $album->images->count() }} Foto
                                </span>
                                <h5 class="fw-bold card-title mb-2">
                                    {{ $album->title }}
                                </h5>
                                <p class="card-text text-muted small">
                                    {{ Str::limit($album->description, 100) }}
                                </p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="card border-0 shadow-sm rounded-3">
                            <div class="card-body text-center py-5">
                                <i class="bi bi-images display-3 text-secondary mb-3"></i>
                                <h4 class="fw-bold">Belum Ada Galeri</h4>
                                <p class="text-muted mb-0">
                                    Dokumentasi galeri kegiatan akan ditampilkan di sini.
                                </p>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>

            <div class="d-flex justify-content-center mt-5">
                {{ $albums->links() }}
            </div>
        </div>
    </section>

@endsection
