<div class="d-flex flex-column min-vh-100 justify-content-between text-white position-relative p-3 p-md-4" style="background-color: #030812; background-image: radial-gradient(circle at 15% 20%, rgba(13, 110, 253, 0.2) 0%, transparent 40%), radial-gradient(circle at 85% 80%, rgba(13, 110, 253, 0.15) 0%, transparent 45%); background-attachment: fixed; font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;">

    <!-- Bootstrap 5 & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        html, body, .fi-body {
            background-color: #030812 !important;
            background-image:
                radial-gradient(circle at 15% 20%, rgba(13, 110, 253, 0.2) 0%, transparent 40%),
                radial-gradient(circle at 85% 80%, rgba(13, 110, 253, 0.15) 0%, transparent 45%) !important;
            background-attachment: fixed !important;
            min-height: 100vh !important;
            margin: 0 !important;
            padding: 0 !important;
        }

        .fi-simple-layout,
        .fi-simple-main-ctn,
        .fi-simple-main,
        .fi-simple-header,
        main {
            max-width: 100% !important;
            width: 100% !important;
            padding: 0 !important;
            margin: 0 !important;
            box-shadow: none !important;
            background: transparent !important;
        }

        .neon-blue-card {
            box-shadow: 0 0 35px rgba(13, 110, 253, 0.45), 0 0 75px rgba(13, 110, 253, 0.25) !important;
            border: 1px solid rgba(13, 110, 253, 0.4) !important;
            border-radius: 1.25rem !important;
            overflow: hidden !important;
            max-width: 960px !important;
            width: 100% !important;
            margin: auto !important;
        }

        .left-login-panel {
            background: linear-gradient(145deg, #071527 0%, #0d3b66 100%);
            color: #ffffff;
        }

        .glow-logo {
            filter: drop-shadow(0 0 15px rgba(255, 255, 255, 0.4));
            max-height: 75px !important;
            height: 75px !important;
            width: auto !important;
        }

        .fi-input-wrp {
            border-radius: 0.5rem !important;
        }

        .btn-submit-custom {
            background-color: #0d6efd !important;
            border-color: #0d6efd !important;
            color: #ffffff !important;
            font-weight: 600 !important;
            padding: 0.65rem 2rem !important;
            border-radius: 50rem !important;
            max-width: 240px !important;
            width: 100% !important;
            margin: 0 auto !important;
            display: block !important;
            transition: all 0.3s ease !important;
        }

        .btn-submit-custom:hover {
            background-color: #0b5ed7 !important;
            box-shadow: 0 0 20px rgba(13, 110, 253, 0.6) !important;
        }

        .feature-item {
            font-size: 0.825rem;
            color: rgba(255, 255, 255, 0.85);
        }
    </style>

    {{-- MAIN LOGIN CONTAINER --}}
    <main class="container py-4 my-auto">
        <div class="card border-0 neon-blue-card shadow-lg">
            <div class="row g-0">

                {{-- LEFT COLUMN: BRANDING & PORTAL INFO --}}
                <div class="col-lg-5 left-login-panel p-4 p-md-5 d-flex flex-column justify-content-between text-center text-lg-start">
                    <div>
                        <div class="mb-4 text-center">
                            <img src="{{ asset(config('dishub.logo', 'images/new-dinhub.png')) }}"
                                 alt="Logo {{ config('dishub.short_name') }}"
                                 class="d-inline-block glow-logo"
                                 style="height: 75px !important; width: auto !important; max-height: 75px !important;"
                                 height="75">
                        </div>

                        <div class="text-center text-lg-start">
                            <span class="badge bg-warning text-dark px-3 py-1.5 rounded-pill mb-3 fw-bold small">
                                PORTAL ADMIN
                            </span>

                            <h3 class="fw-bold mb-1 text-white fs-4">
                                {{ config('dishub.short_name', 'Dinhub Purbalingga') }}
                            </h3>
                            <h5 class="text-white-50 fw-normal fs-6 mb-4">
                                Kabupaten Purbalingga
                            </h5>

                            {{-- FITUR SISTEM CHECKLIST --}}
                            <div class="bg-black bg-opacity-25 rounded-3 p-3 mb-4 text-start border border-light border-opacity-10">
                                <div class="feature-item mb-2 d-flex align-items-center gap-2">
                                    <i class="bi bi-check-circle-fill text-warning"></i>
                                    <span>Kelola Berita & Pengumuman Instansi</span>
                                </div>
                                <div class="feature-item mb-2 d-flex align-items-center gap-2">
                                    <i class="bi bi-check-circle-fill text-warning"></i>
                                    <span>Tanggapan Resmi Fitur Tanya Dinhub</span>
                                </div>
                                <div class="feature-item d-flex align-items-center gap-2">
                                    <i class="bi bi-check-circle-fill text-warning"></i>
                                    <span>Galeri Dokumentasi & Banner Slider</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pt-3 border-top border-secondary border-opacity-50 text-start">
                        <div class="d-flex align-items-center gap-2 text-warning small mb-1">
                            <i class="bi bi-shield-check fs-5"></i>
                            <span class="fw-semibold">Akses Terenkripsi & Keamanan Instansi</span>
                        </div>
                        <div class="small text-white-50" style="font-size: 0.775rem;">
                            Pastikan Anda menggunakan kredensial resmi pengelola.
                        </div>
                    </div>
                </div>

                {{-- RIGHT COLUMN: LOGIN FORM --}}
                <div class="col-lg-7 bg-white p-4 p-md-5 d-flex flex-column justify-content-center">
                    <div class="mb-4">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <i class="bi bi-shield-lock-fill text-primary fs-3"></i>
                            <h4 class="fw-bold mb-0 text-dark">Login Administrator</h4>
                        </div>
                        <p class="text-muted small mb-0">
                            Masukkan email dan kata sandi Anda untuk mengakses dashboard.
                        </p>
                    </div>

                    <form wire:submit="authenticate" class="space-y-5">
                        {{ $this->form }}

                        <div class="pt-3 text-center">
                            <button type="submit" class="btn btn-primary rounded-pill fw-semibold py-2.5 px-4 shadow-sm btn-submit-custom">
                                <i class="bi bi-box-arrow-in-right me-1"></i> Login
                            </button>
                        </div>
                    </form>

                    <div class="mt-4 pt-3 border-top text-center text-muted small">
                        <a href="{{ url('/') }}" class="text-decoration-none text-secondary hover-primary">
                            <i class="bi bi-arrow-left me-1"></i> Kembali ke Beranda
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </main>

    {{-- FOOTER BAR --}}
    <footer class="text-center text-white-50 py-2 small" style="background: transparent;">
        © 2026 {{ config('dishub.name') }}. Seluruh Hak Cipta Dilindungi.
    </footer>
</div>


