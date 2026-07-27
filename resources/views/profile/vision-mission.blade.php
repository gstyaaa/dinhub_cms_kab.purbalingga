@extends('layouts.app')

@section('title', 'Visi & Misi - Dinas Perhubungan Kabupaten Purbalingga')

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
            ['name' => 'Visi & Misi']
        ]
    ])

    {{-- HERO --}}
    <section class="profile-hero py-5">
        <div class="profile-hero-pattern"></div>
        <div class="container profile-hero-content text-center py-4">
            <span class="badge bg-warning text-dark px-3 py-2 mb-3 rounded-pill fw-bold">
                ARAH STRATEGIS
            </span>
            <h1 class="display-4 fw-bold mb-3">Visi & Misi</h1>
            <p class="lead text-white-50 max-w-2xl mx-auto mb-0 fs-5">
                Panduan cita-cita dan langkah strategis Dinas Perhubungan Kabupaten Purbalingga.
            </p>
        </div>
    </section>

    {{-- VISI & MISI SIDE-BY-SIDE CARDS WITH SHADOW --}}
    <section class="py-5 bg-light border-bottom">
        <div class="container">
            <div class="row g-4 align-items-stretch">

                {{-- Kiri: VISI --}}
                <div class="col-lg-5 reveal-left">
                    <div class="card border-0 shadow-sm rounded-4 h-100 bg-primary text-white p-4 p-md-5 d-flex flex-column justify-content-center position-relative overflow-hidden" style="background: linear-gradient(135deg, #0d6efd 0%, #0b5ed7 100%);">
                        <div class="mb-3">
                            <span class="badge bg-warning text-dark px-3 py-1 rounded-pill fw-bold">VISI</span>
                        </div>
                        <h3 class="fw-bold mb-4 display-6">Visi Instansi</h3>
                        <blockquote class="blockquote fs-4 fst-italic mb-4 lh-base">
                            “Terwujudnya Transportasi Yang Lancar, Tertib, Aman dan Nyaman Serta Efektif dan Efisien”
                        </blockquote>
                        <div class="p-3 bg-white rounded-3 text-dark shadow-sm small">
                            Mendukung terwujudnya visi Kabupaten Purbalingga yaitu: <span class="fw-bold text-primary">“Purbalingga Yang Mandiri Dan Berdaya Saing Menuju Masyarakat Sejahtera Yang Berakhlak Mulia”</span>.
                        </div>
                    </div>
                </div>

                {{-- Kanan: MISI --}}
                <div class="col-lg-7 reveal-right">
                    <div class="card border-0 shadow-sm rounded-4 h-100 p-4 p-md-5 bg-white d-flex flex-column justify-content-center">
                        <div class="mb-3">
                            <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-1 rounded-pill fw-bold">MISI</span>
                        </div>
                        <h3 class="fw-bold text-dark mb-4 display-6">Misi Strategis</h3>

                        <div class="d-flex flex-column gap-3">
                            <div class="d-flex align-items-start gap-3 p-3 bg-light rounded-3 border-start border-3 border-primary">
                                <span class="fw-bold text-primary fs-4 lh-1 pt-1">01</span>
                                <div>
                                    <h6 class="fw-bold mb-1 text-dark">Peningkatan Infrastruktur Jalan</h6>
                                    <p class="text-muted small mb-0">
                                        Meningkatkan infrastruktur fasilitas jalan dalam rangka meningkatnya keselamatan, ketertiban dan kelancaran arus lalu lintas.
                                    </p>
                                </div>
                            </div>

                            <div class="d-flex align-items-start gap-3 p-3 bg-light rounded-3 border-start border-3 border-primary">
                                <span class="fw-bold text-primary fs-4 lh-1 pt-1">02</span>
                                <div>
                                    <h6 class="fw-bold mb-1 text-dark">Peningkatan Sarana & Prasarana Angkutan</h6>
                                    <p class="text-muted small mb-0">
                                        Meningkatkan kualitas sarana dan prasarana angkutan orang dan barang melalui peningkatan kualitas pelayanan terminal, pengujian kendaraan bermotor, dan perizinan trayek.
                                    </p>
                                </div>
                            </div>

                            <div class="d-flex align-items-start gap-3 p-3 bg-light rounded-3 border-start border-3 border-primary">
                                <span class="fw-bold text-primary fs-4 lh-1 pt-1">03</span>
                                <div>
                                    <h6 class="fw-bold mb-1 text-dark">Peningkatan Kapasitas SDM</h6>
                                    <p class="text-muted small mb-0">
                                        Meningkatkan kapasitas SDM Perhubungan dalam rangka peningkatan profesionalisme.
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- KOMITMEN PELAYANAN (4 CARDS) --}}
    <section class="py-5 bg-light border-bottom">
        <div class="container">
            @include('partials.section-title', [
                'badge' => 'Budaya Kerja',
                'title' => 'Komitmen Pelayanan',
                'subtitle' => 'Nilai-nilai utama yang dipedomani dalam memberikan pelayanan terbaik bagi masyarakat.'
            ])

            <div class="row g-4">
                <div class="col-12 col-md-6 col-lg-3 reveal-scale delay-1">
                    @include('partials.value-card', [
                        'icon' => 'bi-shield-fill-check',
                        'title' => 'Aman',
                        'description' => 'Menjamin keselamatan dan keamanan pengguna jalan serta moda transportasi.'
                    ])
                </div>
                <div class="col-12 col-md-6 col-lg-3 reveal-scale delay-2">
                    @include('partials.value-card', [
                        'icon' => 'bi-clipboard-check-fill',
                        'title' => 'Tertib',
                        'description' => 'Mewujudkan kedisiplinan dan kepatuhan terhadap peraturan lalu lintas.'
                    ])
                </div>
                <div class="col-12 col-md-6 col-lg-3 reveal-scale delay-3">
                    @include('partials.value-card', [
                        'icon' => 'bi-people-fill',
                        'title' => 'Profesional',
                        'description' => 'Memberikan pelayanan publik yang transparan, akuntabel, dan berintegritas.'
                    ])
                </div>
                <div class="col-12 col-md-6 col-lg-3 reveal-scale delay-4">
                    @include('partials.value-card', [
                        'icon' => 'bi-lightning-charge-fill',
                        'title' => 'Responsif',
                        'description' => 'Cepat dan tanggap dalam menangani aspirasi dan kebutuhan masyarakat.'
                    ])
                </div>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    @include('partials.profile-cta')

@endsection
