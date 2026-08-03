<section class="hero-fullwidth-section position-relative overflow-hidden border-bottom" style="min-height: 520px; background-color: #030812;">

    {{-- 1. FULL WIDTH BACKGROUND IMAGE SLIDER --}}
    <div id="heroBgCarousel" class="carousel slide carousel-fade position-absolute top-0 start-0 w-100 h-100" data-bs-ride="carousel" data-bs-interval="12000" data-bs-pause="hover" style="z-index: 1;">
        <div class="carousel-inner h-100">
            @if($banners->isNotEmpty())
                @foreach($banners as $banner)
                    <div class="carousel-item h-100 {{ $loop->first ? 'active' : '' }}" data-bs-interval="12000">
                        <img src="{{ Storage::url($banner->image) }}"
                             class="d-block w-100 h-100 object-fit-cover"
                             style="object-position: center 25%;"
                             alt="{{ $banner->title ?: 'Banner Dinhub Purbalingga' }}"
                             loading="lazy">
                    </div>
                @endforeach
            @else
                <div class="carousel-item h-100 active" data-bs-interval="12000">
                    <img src="{{ asset('images/hero-default.jpg') }}"
                         class="d-block w-100 h-100 object-fit-cover"
                         style="object-position: center 25%;"
                         alt="Hero Dinhub Purbalingga">
                </div>
            @endif
        </div>
    </div>

    {{-- 2. SOFT & ELEGANT LEFT DARK GRADIENT OVERLAY --}}
    <div class="position-absolute top-0 start-0 w-100 h-100"
         style="z-index: 2; pointer-events: none; background: linear-gradient(to right, rgba(3, 8, 18, 0.88) 0%, rgba(3, 8, 18, 0.65) 45%, rgba(3, 8, 18, 0.15) 75%, transparent 100%);">
    </div>

    {{-- 3. FOREGROUND CONTENT WITH EXACT ORIGINAL TYPOGRAPHY --}}
    <div class="container position-relative py-5 my-md-3" style="z-index: 3;">
        <div class="row align-items-center py-4">
            <div class="col-lg-7 reveal-left">
                <span class="badge bg-primary mb-3">
                    Portal Resmi
                </span>

                <h1 class="fw-bold text-white">
                    Selamat Datang di Portal Resmi
                    <span class="text-warning d-block">
                        Dinas Perhubungan Kabupaten Purbalingga
                    </span>
                </h1>

                <p class="lead text-white mt-4" style="font-weight: 500; opacity: 0.95;">
                    Mewujudkan pelayanan transportasi yang aman,
                    tertib, nyaman dan berkelanjutan bagi seluruh
                    masyarakat Kabupaten Purbalingga.
                </p>

                <div class="d-flex flex-column flex-sm-row gap-2.5 mt-4">
                    <a href="#welcome"
                       class="btn btn-primary px-4 py-2.5 rounded-pill fw-semibold">
                        <i class="bi bi-info-circle me-1"></i> Pelajari Lebih Lanjut
                    </a>

                    <a href="#footer"
                       class="btn btn-outline-light px-4 py-2.5 rounded-pill fw-semibold">
                        <i class="bi bi-telephone me-1"></i> Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </div>

</section>

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const heroCarouselEl = document.getElementById("heroBgCarousel");
        if (heroCarouselEl && typeof bootstrap !== "undefined") {
            const carousel = new bootstrap.Carousel(heroCarouselEl, {
                interval: 12000,
                ride: 'carousel',
                pause: 'hover',
                touch: true
            });
            carousel.cycle();
        }
    });
</script>
@endpush