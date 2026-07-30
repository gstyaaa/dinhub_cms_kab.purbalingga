<footer id="footer" class="bg-dark text-white mt-auto py-5">
    <div class="container">
        <div class="row gy-4">

            <!-- Kolom 1 : Informasi Instansi -->
            <div class="col-lg-4 col-md-6">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <img src="{{ asset(config('dishub.logo', 'images/new-dinhub.png')) }}" alt="Logo {{ config('dishub.short_name', 'Dinhub Purbalingga') }}" height="40" class="d-inline-block object-fit-contain me-1" loading="lazy">
                    <h5 class="fw-bold mb-0 text-white fs-6">{{ config('dishub.name') }}</h5>
                </div>

                <p class="text-white-50 small mb-3">
                    {{ config('dishub.description') }}
                </p>

                <div class="small text-white-50 d-flex flex-column gap-2">
                    <div class="d-flex align-items-start gap-2">
                        <i class="bi bi-geo-alt-fill text-warning mt-1 flex-shrink-0"></i>
                        <span>{{ config('dishub.address') }}</span>
                    </div>

                    <a href="tel:{{ preg_replace('/[^0-9+]/', '', config('dishub.phone')) }}" class="text-white-50 text-decoration-none hover-white">
                        <i class="bi bi-telephone-fill text-warning me-2"></i>
                        {{ config('dishub.phone') }}
                    </a>

                    <a href="mailto:{{ config('dishub.email') }}" class="text-white-50 text-decoration-none hover-white">
                        <i class="bi bi-envelope-fill text-warning me-2"></i>
                        {{ config('dishub.email') }}
                    </a>

                    <a href="{{ config('dishub.instagram') }}" target="_blank" rel="noopener noreferrer" class="text-white-50 text-decoration-none hover-white">
                        <i class="bi bi-instagram text-warning me-2"></i>
                        Instagram
                    </a>
                </div>
            </div>

            <!-- Kolom 2 : Layanan Publik -->
            <div class="col-lg-3 col-md-6">
                <h6 class="fw-bold mb-3 text-warning">Layanan Publik</h6>
                <ul class="list-unstyled small lh-lg mb-0">
                    <li class="mb-2">
                        <a href="{{ config('links.skm.url') }}" target="_blank" rel="noopener noreferrer" class="text-white-50 text-decoration-none hover-white">
                            <i class="bi bi-star-fill text-warning me-2"></i> Survei Kepuasan Masyarakat <i class="bi bi-box-arrow-up-right small text-warning ms-1"></i>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ config('links.lapor_masbup.url') }}" target="_blank" rel="noopener noreferrer" class="text-white-50 text-decoration-none hover-white">
                            <i class="bi bi-megaphone-fill text-warning me-2"></i> Lapor Mas Bupati <i class="bi bi-box-arrow-up-right small text-warning ms-1"></i>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ config('links.pemkab.url') }}" target="_blank" rel="noopener noreferrer" class="text-white-50 text-decoration-none hover-white">
                            <i class="bi bi-globe text-warning me-2"></i> Website Kabupaten <i class="bi bi-box-arrow-up-right small text-warning ms-1"></i>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Kolom 3 : Statistik Pengunjung (Kotak Ramping) -->
            <div class="col-lg-2 col-md-6">
                <h6 class="fw-bold mb-3 text-warning text-nowrap">Statistik Pengunjung</h6>
                <div class="card bg-secondary bg-opacity-25 border-secondary border-opacity-50 text-white rounded-3 shadow-sm hover-card p-3" style="max-width: 210px;">
                    <div class="card-body p-1">
                        <div class="mb-2 pb-2 border-bottom border-secondary border-opacity-25">
                            <div class="text-white-50 small d-flex align-items-center gap-1">
                                <i class="bi bi-calendar-event text-warning"></i> Hari Ini
                            </div>
                            <div class="fw-bold text-warning ms-1 mt-1" style="font-size: 0.95rem;">{{ number_format($todayVisitors ?? 0) }}</div>
                        </div>

                        <div class="mb-2 pb-2 border-bottom border-secondary border-opacity-25">
                            <div class="text-white-50 small d-flex align-items-center gap-1">
                                <i class="bi bi-calendar-month text-warning"></i> Bulan Ini
                            </div>
                            <div class="fw-bold text-warning ms-1 mt-1" style="font-size: 0.95rem;">{{ number_format($monthVisitors ?? 0) }}</div>
                        </div>

                        <div>
                            <div class="text-white-50 small d-flex align-items-center gap-1">
                                <i class="bi bi-people-fill text-warning"></i> Total
                            </div>
                            <div class="fw-bold text-warning ms-1 mt-1" style="font-size: 0.95rem;">{{ number_format($totalVisitors ?? 0) }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kolom 4 : Lokasi Kantor -->
            <div class="col-lg-3 col-md-12">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="fw-bold mb-0 text-warning">Lokasi Kantor</h6>
                    <a href="{{ config('dishub.maps.url') }}" target="_blank" rel="noopener noreferrer" class="small text-warning text-decoration-none fw-semibold">
                        Buka Maps <i class="bi bi-box-arrow-up-right ms-1"></i>
                    </a>
                </div>
                <div class="rounded-3 overflow-hidden border border-secondary border-opacity-50 shadow-sm">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63308.20910774893!2d109.33552364827445!3d-7.380428845011421!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6557b2b0784933%3A0x1de33156a4e32da!2sKantor%20Dinas%20perhubungan%20purbalingga!5e0!3m2!1sid!2sid!4v1785395201858!5m2!1sid!2sid"
                            width="100%"
                            height="160"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="strict-origin-when-cross-origin"
                            title="Peta Lokasi Kantor {{ config('dishub.name') }}">
                    </iframe>
                </div>
            </div>

        </div>

        <hr class="border-secondary my-4">

        <div class="row align-items-center">
            <div class="col-md-12 text-center text-white-50 small">
                © 2026 {{ config('dishub.name') }}. Seluruh Hak Cipta Dilindungi.
            </div>
        </div>

    </div>
</footer>