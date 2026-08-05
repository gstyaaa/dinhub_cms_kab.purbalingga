<section class="hero-fullwidth-section position-relative overflow-hidden border-bottom">

    {{-- 1. FULL WIDTH BACKGROUND IMAGE SLIDER --}}
    <div id="heroBgCarousel" class="carousel slide carousel-fade position-absolute top-0 start-0 w-100 h-100" data-bs-ride="carousel" data-bs-interval="10000" data-bs-pause="hover" style="z-index: 1;">
        <div class="carousel-inner h-100">
            @if($banners->isNotEmpty())
                @foreach($banners as $banner)
                    <div class="carousel-item h-100 {{ $loop->first ? 'active' : '' }}" data-bs-interval="10000">
                        <img src="{{ Storage::url($banner->image) }}"
                             class="d-block w-100 h-100 object-fit-cover"
                             style="object-position: center 25%;"
                             alt="{{ $banner->title ?: 'Banner Dinhub Purbalingga' }}"
                             loading="lazy">
                    </div>
                @endforeach
            @else
                <div class="carousel-item h-100 active" data-bs-interval="10000">
                    <img src="{{ asset('images/hero-default.jpg') }}"
                         class="d-block w-100 h-100 object-fit-cover"
                         style="object-position: center 25%;"
                         alt="Hero Dinhub Purbalingga">
                </div>
            @endif
        </div>
    </div>

    {{-- 2. ELEGANT DARK GRADIENT OVERLAY --}}
    <div class="position-absolute top-0 start-0 w-100 h-100 hero-overlay"></div>

    {{-- 3. FOREGROUND CONTENT --}}
    <div class="container position-relative py-4 py-md-5 my-md-2 hero-content-wrapper">
        <div class="row align-items-center py-2 py-md-4">
            <div class="col-lg-8 col-xl-7 reveal-left hero-text-box">
                <span class="badge bg-primary mb-2 mb-md-3 px-3 py-2 rounded-pill fw-semibold">
                    Portal Resmi
                </span>

                <h1 class="fw-bold text-white hero-title">
                    Selamat Datang di Portal Resmi
                    <span class="text-warning d-block mt-1">
                        Dinas Perhubungan Kabupaten Purbalingga
                    </span>
                </h1>

                <p class="lead text-white mt-3 mt-md-4 hero-subtitle" style="font-weight: 500; opacity: 0.95;">
                    Mewujudkan pelayanan transportasi yang aman,
                    tertib, nyaman dan berkelanjutan bagi seluruh
                    masyarakat Kabupaten Purbalingga.
                </p>

                <div class="d-flex flex-column flex-sm-row align-items-stretch align-items-sm-center gap-2 gap-sm-3 mt-4 pt-1 hero-action-btns">
                    <a href="#welcome"
                       class="btn btn-primary px-4 py-2.5 rounded-pill fw-semibold shadow-sm">
                        <i class="bi bi-info-circle me-1.5"></i> Pelajari Lebih Lanjut
                    </a>

                    <a href="#footer"
                       class="btn btn-outline-light px-4 py-2.5 rounded-pill fw-semibold">
                        <i class="bi bi-telephone me-1.5"></i> Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- 4. CONTROLS OVERLAY (RESPONSIVE ARROWS & INDICATORS) --}}
    @if($banners->count() > 1)
        {{-- TOMBOL PANAH KIRI (PREV) --}}
        <button class="hero-arrow-btn hero-arrow-prev position-absolute top-50 start-0 translate-middle-y"
                type="button"
                data-bs-target="#heroBgCarousel"
                data-bs-slide="prev"
                aria-label="Banner Sebelumnya">
            <svg class="hero-arrow-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M15 18l-6-6 6-6"/>
            </svg>
        </button>

        {{-- TOMBOL PANAH KANAN (NEXT) --}}
        <button class="hero-arrow-btn hero-arrow-next position-absolute top-50 end-0 translate-middle-y"
                type="button"
                data-bs-target="#heroBgCarousel"
                data-bs-slide="next"
                aria-label="Banner Selanjutnya">
            <svg class="hero-arrow-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M9 18l6-6-6-6"/>
            </svg>
        </button>

        {{-- INDIKATOR SLIDE (DOTS / 1, 2, 3...) --}}
        <div class="position-absolute bottom-0 start-50 translate-middle-x mb-3 d-flex align-items-center gap-2 hero-indicators-container">
            @foreach($banners as $index => $banner)
                <button type="button"
                        data-bs-target="#heroBgCarousel"
                        data-bs-slide-to="{{ $index }}"
                        class="hero-indicator-btn {{ $loop->first ? 'active' : '' }}"
                        aria-current="{{ $loop->first ? 'true' : 'false' }}"
                        aria-label="Slide {{ $index + 1 }}"
                        style="width: {{ $loop->first ? '28px' : '10px' }}; background-color: {{ $loop->first ? '#3b82f6' : 'rgba(255, 255, 255, 0.7)' }};">
                </button>
            @endforeach
        </div>
    @endif

</section>

<style>
    /* Section & Overlay Heights */
    .hero-fullwidth-section {
        min-height: 520px;
        background-color: #030812;
    }

    .hero-overlay {
        z-index: 2;
        pointer-events: none;
        background: linear-gradient(to right, rgba(3, 8, 18, 0.90) 0%, rgba(3, 8, 18, 0.70) 50%, rgba(3, 8, 18, 0.25) 85%, transparent 100%);
    }

    .hero-content-wrapper {
        z-index: 3;
        pointer-events: none;
    }

    .hero-text-box {
        pointer-events: auto;
    }

    /* Arrow Buttons Base Styling */
    .hero-arrow-btn {
        z-index: 20;
        width: 48px;
        height: 48px;
        border-radius: 50%;
        background: rgba(15, 23, 42, 0.85);
        border: 2px solid rgba(255, 255, 255, 0.6) !important;
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(8px);
        padding: 0;
        transition: all 0.2s ease-in-out;
    }

    .hero-arrow-prev {
        left: 1.25rem;
    }

    .hero-arrow-next {
        right: 1.25rem;
    }

    .hero-arrow-svg {
        width: 22px;
        height: 22px;
    }

    .hero-arrow-btn:hover {
        background-color: #2563eb !important;
        border-color: #ffffff !important;
        transform: translateY(-50%) scale(1.1) !important;
        box-shadow: 0 6px 20px rgba(37, 99, 235, 0.6) !important;
    }

    /* Indicators Base Styling */
    .hero-indicators-container {
        z-index: 20;
    }

    .hero-indicator-btn {
        height: 8px;
        border-radius: 4px;
        border: none;
        cursor: pointer;
        padding: 0;
        transition: all 0.3s ease;
    }

    /* Responsive Breakpoints */
    @media (max-width: 991.98px) {
        .hero-fullwidth-section {
            min-height: 460px;
        }

        .hero-overlay {
            background: linear-gradient(to bottom, rgba(3, 8, 18, 0.85) 0%, rgba(3, 8, 18, 0.75) 60%, rgba(3, 8, 18, 0.5) 100%);
        }
    }

    @media (max-width: 767.98px) {
        .hero-fullwidth-section {
            min-height: 400px;
        }

        .hero-arrow-btn {
            width: 36px;
            height: 36px;
            border-width: 1.5px !important;
            background: rgba(15, 23, 42, 0.8);
        }

        .hero-arrow-prev {
            left: 0.5rem;
        }

        .hero-arrow-next {
            right: 0.5rem;
        }

        .hero-arrow-svg {
            width: 18px;
            height: 18px;
        }

        .hero-title {
            font-size: clamp(1.3rem, 4.8vw, 1.8rem) !important;
        }

        .hero-subtitle {
            font-size: 0.875rem !important;
        }
    }
</style>

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const heroCarouselEl = document.getElementById("heroBgCarousel");
        if (!heroCarouselEl) return;

        function initCarousel() {
            if (typeof bootstrap !== "undefined" && bootstrap.Carousel) {
                const instance = bootstrap.Carousel.getOrCreateInstance(heroCarouselEl, {
                    interval: 10000,
                    ride: 'carousel',
                    pause: 'hover',
                    touch: true
                });
                instance.cycle();

                // Failsafe Event Handlers
                const prevBtn = document.querySelector('.hero-arrow-prev');
                const nextBtn = document.querySelector('.hero-arrow-next');

                if (prevBtn) {
                    prevBtn.onclick = function (e) {
                        e.preventDefault();
                        e.stopPropagation();
                        instance.prev();
                    };
                }

                if (nextBtn) {
                    nextBtn.onclick = function (e) {
                        e.preventDefault();
                        e.stopPropagation();
                        instance.next();
                    };
                }

                const indicatorBtns = document.querySelectorAll('.hero-indicator-btn');
                indicatorBtns.forEach((btn, idx) => {
                    btn.onclick = function (e) {
                        e.preventDefault();
                        e.stopPropagation();
                        instance.to(idx);
                    };
                });

                // Animate Indicators on Slide Event
                heroCarouselEl.addEventListener('slide.bs.carousel', function (e) {
                    indicatorBtns.forEach((btn, idx) => {
                        if (idx === e.to) {
                            btn.style.width = '28px';
                            btn.style.backgroundColor = '#3b82f6';
                            btn.classList.add('active');
                        } else {
                            btn.style.width = '10px';
                            btn.style.backgroundColor = 'rgba(255, 255, 255, 0.7)';
                            btn.classList.remove('active');
                        }
                    });
                });
            } else {
                setTimeout(initCarousel, 250);
            }
        }

        initCarousel();
    });
</script>
@endpush