@extends('layouts.app')

@section('title', 'Tentang Dinas - Dinas Perhubungan Kabupaten Purbalingga')

@push('styles')
<style>
.profile-hero {
    min-height: 420px;
    background: linear-gradient(135deg, #0d6efd 0%, #084298 100%);
    position: relative;
    overflow: hidden;
    color: #ffffff;
    display: flex;
    align-items: center;
}

.profile-hero-pattern {
    position: absolute;
    inset: 0;
    opacity: 0.08;
    background-image: radial-gradient(#ffffff 1px, transparent 1px);
    background-size: 20px 20px;
}

.profile-hero-content {
    position: relative;
    z-index: 2;
}
</style>
@endpush

@section('content')

    {{-- Breadcrumb --}}
    @include('partials.breadcrumb', [
        'items' => [
            ['name' => 'Profil', 'url' => route('profile.index')],
            ['name' => 'Tentang Dinas']
        ]
    ])

    {{-- HERO --}}
    <section class="profile-hero py-5">
        <div class="profile-hero-pattern"></div>
        <div class="container profile-hero-content text-center py-4">
            <span class="badge bg-warning text-dark px-3 py-2 mb-3 rounded-pill fw-bold">
                PROFIL INSTANSI
            </span>
            <h1 class="display-4 fw-bold mb-3">Tentang Dinas Perhubungan</h1>
            <p class="lead text-white-50 max-w-2xl mx-auto mb-0 fs-5">
                Mengenal sejarah, tugas, dan peran strategis Dinas Perhubungan Kabupaten Purbalingga.
            </p>
        </div>
    </section>

    {{-- TENTANG DINHUB & DESKRIPSI --}}
    <section class="py-5 bg-white border-bottom">
        <div class="container">
            <div class="max-w-4xl mx-auto">
                <div class="card border-0 shadow-blue-sm rounded-3 p-4 p-md-5 mb-5 reveal-scale">
                    <div class="card-body fs-5 lh-lg text-secondary p-0">
                        <h3 class="fw-bold text-dark mb-4 border-start border-4 border-primary ps-3">
                            Kedudukan & Peran Utama
                        </h3>
                        <p class="mb-4">
                            <strong>Dinas Perhubungan Kabupaten Purbalingga</strong> merupakan unsur pelaksana Pemerintah Daerah yang melaksanakan urusan pemerintahan di bidang perhubungan. Dipimpin oleh Kepala Dinas yang berada di bawah dan bertanggung jawab kepada Bupati melalui Sekretaris Daerah.
                        </p>
                        <p class="mb-0">
                            Dinas Perhubungan berperan dalam mewujudkan sistem transportasi yang aman, tertib, nyaman, dan berkelanjutan melalui pelayanan publik yang profesional, pembangunan sarana prasarana transportasi, pengelolaan lalu lintas, serta peningkatan kualitas angkutan bagi seluruh masyarakat Kabupaten Purbalingga.
                        </p>
                    </div>
                </div>

                {{-- FOTO KANTOR --}}
                <div class="card border-0 shadow-sm rounded-3 overflow-hidden reveal-scale delay-1">
                    <img src="{{ asset('images/hero-default.jpg') }}" class="card-img-top" alt="Kantor Dinas Perhubungan Kabupaten Purbalingga" style="max-height: 450px; object-fit: cover;">
                    <div class="card-body text-center bg-white py-3">
                        <p class="text-muted small mb-0">
                            <i class="bi bi-geo-alt-fill text-primary me-1"></i> Kantor Dinas Perhubungan Kabupaten Purbalingga — {{ config('dishub.address') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    @include('partials.profile-cta')

@endsection
