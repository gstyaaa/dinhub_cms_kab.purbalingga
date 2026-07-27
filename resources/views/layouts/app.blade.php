<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Dinas Perhubungan Kabupaten Purbalingga')</title>

    <link rel="icon" href="{{ asset(config('dishub.logo', 'images/new-dinhub.png')) }}">

    <!-- Bootstrap 5 CSS & Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
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
            padding: 0.6rem !important;
            margin-top: 0.25rem !important;
            box-shadow: 0 12px 30px rgba(13, 110, 253, 0.12), 0 4px 12px rgba(0, 0, 0, 0.04) !important;
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
            padding: 0.65rem 1rem;
            font-weight: 500;
            color: #334155;
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .dropdown-item:hover {
            background: #eef5ff;
            color: #0d6efd;
            padding-left: 1.35rem;
        }

        .dropdown-item.active,
        .dropdown-item:active {
            background: #e7f1ff !important;
            color: #0d6efd !important;
            font-weight: 700;
        }

        @media (min-width: 992px) {
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
           SCROLL REVEAL ANIMATIONS (ULTRA SLOW & SILKY)
        ===================================================== */
        .reveal {
            opacity: 0;
            transform: translateY(22px);
            transition: opacity 1.6s cubic-bezier(0.19, 1, 0.22, 1), transform 1.6s cubic-bezier(0.19, 1, 0.22, 1);
            will-change: opacity, transform;
        }

        .reveal-left {
            opacity: 0;
            transform: translateX(-28px);
            transition: opacity 1.6s cubic-bezier(0.19, 1, 0.22, 1), transform 1.6s cubic-bezier(0.19, 1, 0.22, 1);
            will-change: opacity, transform;
        }

        .reveal-right {
            opacity: 0;
            transform: translateX(28px);
            transition: opacity 1.6s cubic-bezier(0.19, 1, 0.22, 1), transform 1.6s cubic-bezier(0.19, 1, 0.22, 1);
            will-change: opacity, transform;
        }

        .reveal-scale {
            opacity: 0;
            transform: scale(0.96) translateY(14px);
            transition: opacity 1.6s cubic-bezier(0.19, 1, 0.22, 1), transform 1.6s cubic-bezier(0.19, 1, 0.22, 1);
            will-change: opacity, transform;
        }

        .reveal.active,
        .reveal-left.active,
        .reveal-right.active,
        .reveal-scale.active {
            opacity: 1;
            transform: translateY(0) translateX(0) scale(1);
        }

        /* Stagger Delays (Ultra Graceful) */
        .delay-1 { transition-delay: 0.25s !important; }
        .delay-2 { transition-delay: 0.50s !important; }
        .delay-3 { transition-delay: 0.75s !important; }
        .delay-4 { transition-delay: 1.00s !important; }
        .delay-5 { transition-delay: 1.25s !important; }
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