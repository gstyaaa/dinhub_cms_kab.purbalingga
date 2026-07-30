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

            <!-- Kolom 2 : Layanan Publik & Statistik Pengunjung -->
            <div class="col-lg-4 col-md-6">
                <h6 class="fw-bold mb-3 text-warning">Layanan Publik</h6>
                <ul class="list-unstyled small lh-lg mb-3">
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

                {{-- Widget Statistik Pengunjung (Ringkas & Elegan) --}}
                <div class="bg-secondary bg-opacity-25 border border-secondary border-opacity-50 text-white rounded-3 p-3 mt-3">
                    <div class="d-flex align-items-center gap-2 mb-2 pb-2 border-bottom border-secondary border-opacity-50">
                        <i class="bi bi-people-fill text-warning"></i>
                        <span class="fw-semibold small text-white">Statistik Pengunjung</span>
                    </div>
                    <div class="row g-2 text-center" style="font-size: 0.8rem;">
                        <div class="col-4 border-end border-secondary border-opacity-50">
                            <div class="text-white-50">Hari Ini</div>
                            <div class="fw-bold text-warning mt-1">{{ number_format($todayVisitors ?? 0) }}</div>
                        </div>
                        <div class="col-4 border-end border-secondary border-opacity-50">
                            <div class="text-white-50">Bulan Ini</div>
                            <div class="fw-bold text-warning mt-1">{{ number_format($monthVisitors ?? 0) }}</div>
                        </div>
                        <div class="col-4">
                            <div class="text-white-50">Total</div>
                            <div class="fw-bold text-warning mt-1">{{ number_format($totalVisitors ?? 0) }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kolom 3 : Lokasi Kantor -->
            <div class="col-lg-4 col-md-12">
                <h6 class="fw-bold mb-3 text-warning">Lokasi Kantor</h6>
                <a href="{{ config('dishub.maps.url') }}" target="_blank" rel="noopener noreferrer" class="text-decoration-none">
                    <div class="card bg-secondary bg-opacity-25 border-secondary border-opacity-50 text-white rounded-3 shadow-sm hover-card p-3">
                        <div class="card-body p-2 text-center">
                            <div class="fs-2 mb-2">🗺️</div>
                            <h6 class="fw-bold mb-2 text-white small">
                                Kantor {{ config('dishub.name') }}
                            </h6>
                            <span class="small text-warning fw-semibold">
                                {{ config('dishub.maps.label') }} <i class="bi bi-box-arrow-up-right ms-1"></i>
                            </span>
                        </div>
                    </div>
                </a>
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