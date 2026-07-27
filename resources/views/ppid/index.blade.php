@extends('layouts.app')

@section('title', 'PPID - Dinas Perhubungan Kabupaten Purbalingga')

@section('content')

    {{-- Breadcrumb --}}
    @include('partials.breadcrumb', [
        'items' => ['PPID']
    ])

    <section class="py-5">
        <div class="container">
            <div class="mb-5 text-center">
                <span class="badge bg-primary px-3 py-2 mb-2 rounded-pill">Keterbukaan Informasi</span>
                <h2 class="fw-bold">Pejabat Pengelola Informasi dan Dokumentasi (PPID)</h2>
                <p class="text-muted">
                    Layanan keterbukaan informasi publik Dinas Perhubungan Kabupaten Purbalingga.
                </p>
            </div>

            <div class="row g-4">
                @forelse($ppidPages as $page)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card border-0 shadow-sm rounded-3 hover-card h-100 p-3">
                            <div class="card-body">
                                <div class="badge bg-info text-dark mb-3">
                                    {{ ucfirst($page->category ?? 'Informasi') }}
                                </div>
                                <h5 class="fw-bold mb-2">{{ $page->title }}</h5>
                                <p class="text-muted small">
                                    {{ Str::limit(strip_tags($page->content), 120) }}
                                </p>
                                @if($page->attachment)
                                    <a href="{{ Storage::url($page->attachment) }}" target="_blank" class="btn btn-sm btn-outline-primary mt-2">
                                        <i class="bi bi-download me-1"></i> Unduh Lampiran
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="card border-0 shadow-sm rounded-3">
                            <div class="card-body text-center py-5">
                                <i class="bi bi-file-earmark-text display-3 text-secondary mb-3"></i>
                                <h4 class="fw-bold">Layanan PPID</h4>
                                <p class="text-muted max-w-lg mx-auto mb-4">
                                    Selamat Datang di PPID Dinas Perhubungan Kabupaten Purbalingga. Anda dapat mengajukan permohonan informasi publik secara online atau mengunduh dokumen resmi.
                                </p>
                                <a href="{{ config('links.pemkab.url') }}" target="_blank" rel="noopener noreferrer" class="btn btn-primary">
                                    <i class="bi bi-globe me-1"></i> Portal PPID Utama Pemkab Purbalingga
                                </a>

                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

@endsection
