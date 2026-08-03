<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Beranda | ' . config('dishub.name'))</title>

    <link rel="icon" href="{{ asset(config('dishub.logo', 'images/new-dinhub.png')) }}">

    <!-- Bootstrap 5 CSS & Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        }

        .placeholder-sm::placeholder {
            font-size: 0.85rem !important;
            opacity: 0.75;
        }

        .hero-slide {
            height: 600px;
            background-size: cover;
            background-position: center;
            position: relative;
        }

        @media (max-width: 768px) {
            .hero-slide {
                height: min(380px, 55vh);
                min-height: 340px;
            }

            .hero-content h1 {
                font-size: clamp(1.5rem, 5.5vw, 2.25rem);
            }

            .hero-content p {
                font-size: 0.95rem;
                margin-top: 0.5rem !important;
                margin-bottom: 1rem !important;
            }

            .hero-content .btn {
                padding: 0.5rem 1.25rem;
                font-size: 0.95rem;
            }
        }

        .hover-card {
            transition: transform 0.25s ease-in-out, box-shadow 0.25s ease-in-out;
        }

        .hover-card:hover {
            transform: translateY(-4px);
        }

        .shadow-blue-sm {
            box-shadow: 0 4px 15px rgba(13, 110, 253, 0.12) !important;
        }

        .shadow-blue-sm:hover {
            box-shadow: 0 8px 25px rgba(13, 110, 253, 0.25) !important;
        }

        .shadow-yellow-sm {
            box-shadow: 0 4px 15px rgba(255, 193, 7, 0.22) !important;
        }

        .shadow-yellow-sm:hover {
            box-shadow: 0 8px 25px rgba(255, 193, 7, 0.38) !important;
        }


        .service-icon {
            font-size: 2.5rem;
            color: #0d6efd;
        }

        .running-text {
            background-color: #0d6efd;
            color: #ffffff;
            display: flex;
            align-items: center;
            overflow: hidden;
            white-space: nowrap;
        }

        .running-label {
            background-color: #ffc107;
            color: #212529;
            font-weight: 700;
            padding: 8px 16px;
            z-index: 2;
        }

        .running-content {
            overflow: hidden;
            width: 100%;
        }

        .running-track {
            display: inline-block;
            padding-left: 100%;
            animation: marquee 25s linear infinite;
        }

        @keyframes marquee {
            0% { transform: translate(0, 0); }
            100% { transform: translate(-100%, 0); }
        }

        /* =====================================================
           NAVBAR ACTIVE COLOR, LINING & DROPDOWN ANIMATION
        ===================================================== */
        .navbar {
            padding: 0.75rem 0;
            transition: all 0.3s ease;
        }

        .navbar-nav {
            gap: 0.35rem;
        }

        .navbar-nav .nav-link {
            position: relative;
            color: #334155 !important;
            font-weight: 600;
            padding: 0.65rem 1rem !important;
            transition: color 0.25s ease;
        }

        /* Underline Indicator (Lining) */
        .navbar-nav .nav-link::after {
            content: '';
            position: absolute;
            bottom: 4px;
            left: 12px;
            right: 12px;
            height: 3px;
            background-color: #0d6efd;
            border-radius: 99px;
            transform: scaleX(0);
            transform-origin: center;
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Hover state: blue text & animated lining */
        .navbar-nav .nav-link:hover {
            color: #0d6efd !important;
        }

        .navbar-nav .nav-link:hover::after {
            transform: scaleX(0.65);
        }

        /* Active state: bold blue text & full lining */
        .navbar-nav .nav-link.active {
            color: #0d6efd !important;
            font-weight: 700;
        }

        .navbar-nav .nav-link.active::after {
            transform: scaleX(1) !important;
        }

        /* Smooth Dropdown Animation & Invisible Bridge */
        .dropdown-menu {
            border: 1px solid rgba(13, 110, 253, 0.08) !important;
            border-radius: 16px !important;
            padding: 0.75rem !important;
            min-width: 245px !important;
            margin-top: 0.35rem !important;
            box-shadow: 0 14px 35px rgba(13, 110, 253, 0.14), 0 4px 14px rgba(0, 0, 0, 0.05) !important;
        }

        .dropdown-menu li {
            margin-bottom: 0.35rem;
        }

        .dropdown-menu li:last-child {
            margin-bottom: 0;
        }

        /* Invisible bridge to prevent losing hover state over gaps */
        .dropdown-menu::before {
            content: '';
            position: absolute;
            top: -15px;
            left: 0;
            right: 0;
            height: 15px;
            background: transparent;
        }

        .dropdown-item {
            border-radius: 10px;
            padding: 0.75rem 1.15rem !important;
            font-weight: 500;
            font-size: 0.925rem;
            color: #334155;
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .dropdown-item:hover {
            background: #eef5ff;
            color: #0d6efd;
            padding-left: 1.45rem !important;
        }

        .dropdown-item.active,
        .dropdown-item:active {
            background: #e7f1ff !important;
            color: #0d6efd !important;
            font-weight: 700;
        }

        @media (min-width: 992px) {
            .offcanvas-lg {
                position: static !important;
                z-index: auto !important;
                flex-grow: 1 !important;
                width: auto !important;
                background-color: transparent !important;
                border: 0 !important;
                opacity: 1 !important;
                visibility: visible !important;
                transform: none !important;
                transition: none !important;
            }

            .offcanvas-lg .offcanvas-body {
                display: flex !important;
                flex-grow: 1 !important;
                padding: 0 !important;
                overflow: visible !important;
            }

            .offcanvas-lg .offcanvas-header {
                display: none !important;
            }

            .navbar .dropdown {
                position: relative;
            }

            .navbar .dropdown-menu {
                display: block !important;
                opacity: 0;
                visibility: hidden;
                transform: translateY(10px) scale(0.97);
                pointer-events: none;
                transition: opacity 0.25s cubic-bezier(0.16, 1, 0.3, 1), transform 0.25s cubic-bezier(0.16, 1, 0.3, 1), visibility 0.25s;
            }

            .navbar .dropdown:hover > .dropdown-menu,
            .navbar .dropdown-menu.show {
                opacity: 1 !important;
                visibility: visible !important;
                transform: translateY(0) scale(1) !important;
                pointer-events: auto !important;
            }
        }

        /* =====================================================
           REVEAL ELEMENTS (ALWAYS VISIBLE & CLEAR)
        ===================================================== */
        .reveal,
        .reveal-left,
        .reveal-right,
        .reveal-scale {
            opacity: 1 !important;
            transform: none !important;
            visibility: visible !important;
        }

        /* Stagger Delays (Ultra Graceful) */
        .delay-1 { transition-delay: 0.25s !important; }
        .delay-2 { transition-delay: 0.50s !important; }
        .delay-3 { transition-delay: 0.75s !important; }
        .delay-4 { transition-delay: 1.00s !important; }
        .delay-5 { transition-delay: 1.25s !important; }

        /* Global SVG & Simple Clean Pagination */
        svg {
            max-width: 100%;
        }

        .pagination svg, nav svg {
            width: 1rem !important;
            height: 1rem !important;
            max-width: 1rem !important;
            max-height: 1rem !important;
        }

        .pagination {
            display: flex;
            gap: 6px;
            margin: 0;
            padding: 0;
            list-style: none;
            justify-content: center;
        }

        .pagination .page-item .page-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 36px;
            height: 36px;
            padding: 0 10px;
            font-size: 0.875rem;
            font-weight: 600;
            border-radius: 8px !important;
            color: #0d6efd;
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .pagination .page-item .page-link i {
            font-size: 0.85rem;
            line-height: 1;
        }

        .pagination .page-item.active .page-link {
            background-color: #0d6efd !important;
            border-color: #0d6efd !important;
            color: #ffffff !important;
            box-shadow: 0 4px 10px rgba(13, 110, 253, 0.25);
        }

        .pagination .page-item:not(.active):not(.disabled) .page-link:hover {
            background-color: #eef5ff;
            color: #0d6efd;
            border-color: #0d6efd;
        }

        .pagination .page-item.disabled .page-link {
            color: #adb5bd !important;
            background-color: #f8f9fa !important;
            border-color: #e9ecef !important;
            cursor: not-allowed;
        }

        /* Modern Minimalist Sidebar Category Pills */
        .card .nav-pills .nav-link {
            color: #475569;
            font-weight: 500;
            font-size: 0.925rem;
            border: 1px solid transparent;
            transition: all 0.2s ease-in-out;
        }

        .card .nav-pills .nav-link:hover:not(.active) {
            background-color: #f1f5f9;
            color: #0d6efd;
        }

        .card .nav-pills .nav-link.active {
            background-color: #eef5ff !important;
            color: #0d6efd !important;
            font-weight: 600;
            border-color: rgba(13, 110, 253, 0.15) !important;
        }

        /* Slow & Silky 1.5s Fade Transition for Hero Banner Carousel */
        #heroBgCarousel.carousel-fade .carousel-item {
            opacity: 0;
            transition-property: opacity;
            transition-duration: 1.5s !important;
            transition-timing-function: ease-in-out !important;
        }

        #heroBgCarousel.carousel-fade .carousel-item.active,
        #heroBgCarousel.carousel-fade .carousel-item-next.carousel-item-start,
        #heroBgCarousel.carousel-fade .carousel-item-prev.carousel-item-end {
            opacity: 1;
        }

        /* Native HTML5 Details Accordion Styling */
        details.mobile-dropdown-details summary {
            list-style: none !important;
            outline: none !important;
            user-select: none;
            cursor: pointer;
            transition: color 0.3s ease !important;
        }

        details.mobile-dropdown-details summary::-webkit-details-marker,
        details.mobile-dropdown-details summary::marker {
            display: none !important;
            content: "" !important;
            width: 0 !important;
            height: 0 !important;
        }

        /* Silky Smooth Rotasi Panah Chevron 180 Derajat saat Terbuka */
        .dropdown-chevron-icon {
            transform: rotate(0deg) !important;
            transition: transform 0.55s cubic-bezier(0.16, 1, 0.3, 1), color 0.4s ease !important;
            display: inline-block !important;
        }

        details.mobile-dropdown-details[open] summary .dropdown-chevron-icon {
            transform: rotate(180deg) !important;
            color: #0d6efd !important;
        }

        /* Ultra Slow & Silky Slide & Unfold Animation saat Sub-menu Membuka */
        details.mobile-dropdown-details[open] ul {
            animation: mobileSubmenuSlide 0.65s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            transform-origin: top center;
        }

        @keyframes mobileSubmenuSlide {
            0% {
                opacity: 0;
                transform: translateY(-12px) scaleY(0.94);
            }
            100% {
                opacity: 1;
                transform: translateY(0) scaleY(1);
            }
        }

        /* Default State for All Dropdown Arrows: Points DOWN (v) */
        .dropdown-chevron-icon {
            transform: rotate(0deg) !important;
            transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1) !important;
            display: inline-block !important;
        }

        /* Desktop Dropdown Open -> Rotate UP (^) */
        .dropdown-toggle.show .dropdown-chevron-icon {
            transform: rotate(180deg) !important;
            color: #0d6efd !important;
        }

        /* Mobile Collapse Open -> Rotate UP (^) */
        .offcanvas .dropdown-toggle[aria-expanded="true"] .dropdown-chevron-icon,
        .offcanvas .dropdown-toggle:not(.collapsed) .dropdown-chevron-icon {
            transform: rotate(180deg) !important;
            color: #0d6efd !important;
        }

        /* Mobile Collapse Closed -> Force Rotate Back DOWN (v) */
        .offcanvas .dropdown-toggle.collapsed .dropdown-chevron-icon,
        .offcanvas .dropdown-toggle[aria-expanded="false"] .dropdown-chevron-icon {
            transform: rotate(0deg) !important;
            color: inherit !important;
        }

        /* =====================================================
           RESPONSIVE MOBILE OPTIMIZATIONS (< 992px & < 576px)
        ===================================================== */
        @media (max-width: 991.98px) {
            /* Mobile Sticky Navbar Lock at Top 0 */
            .navbar.sticky-top {
                position: sticky !important;
                top: 0 !important;
                z-index: 1020 !important;
                background-color: #ffffff !important;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08) !important;
            }

            /* Mobile Offcanvas Drawer Sidebar (Lebar 55% max 260px) */
            .offcanvas {
                width: 55% !important;
                max-width: 260px !important;
                border-left: 1px solid rgba(13, 110, 253, 0.15) !important;
                box-shadow: -10px 0 30px rgba(0, 0, 0, 0.15) !important;
            }

            .offcanvas-header {
                padding: 0.85rem 1rem !important;
            }

            .offcanvas-body {
                padding: 0.75rem 1rem !important;
            }

            .navbar-nav {
                gap: 0.25rem;
            }

            .navbar-nav .nav-link {
                padding: 0.6rem 0.85rem !important;
                border-radius: 0.5rem;
                font-size: 0.9rem;
            }

            .navbar-nav .nav-link::after {
                display: none !important;
            }

            .navbar-nav .nav-link.active {
                background-color: #eef5ff;
                color: #0d6efd !important;
            }

            /* Animated Chevron Arrow for Dropdown Toggles */
            .offcanvas .dropdown-toggle::after {
                transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1) !important;
                margin-left: auto;
            }

            .offcanvas .dropdown-toggle:not(.collapsed)::after,
            .offcanvas .dropdown-toggle[aria-expanded="true"]::after {
                transform: rotate(180deg) !important;
            }

            .offcanvas .dropdown-item {
                font-size: 0.85rem;
                padding: 0.5rem 0.75rem;
                border-radius: 8px;
                color: #334155;
                transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
            }

            .offcanvas .dropdown-item:hover {
                background-color: #eef5ff !important;
                color: #0d6efd !important;
                padding-left: 1.1rem !important;
            }

            .offcanvas .dropdown-item.active {
                background-color: #eef5ff !important;
                color: #0d6efd !important;
                font-weight: 700;
            }

            /* Mobile Hero Banner Optimizations */
            .hero-fullwidth-section {
                min-height: auto !important;
                padding-top: 1rem;
                padding-bottom: 1.5rem;
            }

            .hero-fullwidth-section h1 {
                font-size: clamp(1.4rem, 5.2vw, 2.1rem) !important;
                line-height: 1.35 !important;
            }

            .hero-fullwidth-section p.lead {
                font-size: 0.925rem !important;
                line-height: 1.5 !important;
                margin-top: 0.75rem !important;
            }

            .hero-fullwidth-section .btn {
                display: block;
                width: 100%;
                margin-right: 0 !important;
                margin-bottom: 0.65rem;
                padding: 0.7rem 1.25rem;
                font-size: 0.95rem;
            }
        }

        @media (max-width: 575.98px) {
            /* Compact Header Logo & Running Text on Small Phones */
            .navbar-brand {
                font-size: 0.825rem !important;
                gap: 0.4rem !important;
            }

            .navbar-brand img {
                height: 34px !important;
            }

            .running-label {
                padding: 6px 10px !important;
                font-size: 0.75rem !important;
            }

            .running-track span {
                font-size: 0.85rem !important;
            }

            /* Section Padding on Mobile */
            section.py-5 {
                padding-top: 2.25rem !important;
                padding-bottom: 2.25rem !important;
            }

            .badge {
                font-size: 0.775rem !important;
            }

            h2.fw-bold {
                font-size: 1.5rem !important;
            }
        }
    </style>

    @stack('styles')
</head>

<body class="bg-light d-flex flex-column min-vh-100">

    @include('partials.topbar')

    @include('partials.navbar')

    <main class="flex-grow-1">
        @yield('content')
    </main>

    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const reveals = document.querySelectorAll(".reveal, .reveal-left, .reveal-right, .reveal-scale");

            if ("IntersectionObserver" in window) {
                const observer = new IntersectionObserver((entries, obs) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add("active");
                            obs.unobserve(entry.target);
                        }
                    });
                }, {
                    threshold: 0.1,
                    rootMargin: "0px 0px -40px 0px"
                });

                reveals.forEach(el => observer.observe(el));
            } else {
                reveals.forEach(el => el.classList.add("active"));
            }
        });
    </script>

    @stack('scripts')

</body>

</html>