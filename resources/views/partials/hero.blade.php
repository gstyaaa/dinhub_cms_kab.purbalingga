@if($banners->isNotEmpty())

<div id="heroCarousel"
     class="carousel slide carousel-fade"
     data-bs-ride="carousel">

    <div class="carousel-inner">

        @foreach($banners as $banner)

        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">

            <div class="hero-slide"
                 style="background-image:url('{{ Storage::url($banner->image) }}')">

                <div class="hero-overlay">

                    <div class="container hero-content">

                        <h1 class="display-3 fw-bold">

                            {{ $banner->title }}

                        </h1>

                        @if($banner->subtitle)

                        <p class="lead my-4">

                            {{ $banner->subtitle }}

                        </p>

                        @endif

                        @if($banner->button_text)

                        <a href="{{ $banner->button_link ?: '#' }}"
                           class="btn btn-warning btn-lg">

                            {{ $banner->button_text }}

                        </a>

                        @endif

                    </div>

                </div>

            </div>

        </div>

        @endforeach

    </div>

    @if($banners->count() > 1)

    <button class="carousel-control-prev"
            type="button"
            data-bs-target="#heroCarousel"
            data-bs-slide="prev">

        <span class="carousel-control-prev-icon"></span>

    </button>

    <button class="carousel-control-next"
            type="button"
            data-bs-target="#heroCarousel"
            data-bs-slide="next">

        <span class="carousel-control-next-icon"></span>

    </button>

    @endif

</div>

@else

<section class="py-5 bg-white border-bottom">

    <div class="container">

        <div class="row align-items-center gy-4">

            <div class="col-lg-7 reveal-left">

                <span class="badge bg-primary mb-3">

                    Portal Resmi

                </span>

                <h1 class="fw-bold">

                    Selamat Datang di Portal Resmi

                    <span class="text-primary d-block">

                        Dinas Perhubungan Kabupaten Purbalingga

                    </span>

                </h1>

                <p class="lead text-secondary mt-4">

                    Mewujudkan pelayanan transportasi yang aman,
                    tertib, nyaman dan berkelanjutan bagi seluruh
                    masyarakat Kabupaten Purbalingga.

                </p>

                <div class="mt-4">

                    <a href="#welcome"
                       class="btn btn-primary me-2">

                        Pelajari Lebih Lanjut

                    </a>

                    <a href="#footer"
                       class="btn btn-outline-primary">

                        Hubungi Kami

                    </a>

                </div>

            </div>

            <div class="col-lg-5 reveal-right">

                <img
                    src="{{ asset('images/hero-default.jpg') }}"
                    class="img-fluid rounded shadow"
                    alt="Hero">

            </div>

        </div>

    </div>

</section>

@endif