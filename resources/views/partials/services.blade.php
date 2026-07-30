<section class="py-5 bg-white border-bottom">
    <div class="container">
        <div class="text-center mb-5 reveal">
            <span class="badge bg-primary px-3 py-2 mb-2 rounded-pill">Layanan Publik</span>
            <h2 class="fw-bold">Portal Layanan</h2>
            <p class="text-muted">
                Akses berbagai layanan internal dan portal eksternal Dinas Perhubungan Kabupaten Purbalingga dengan mudah.
            </p>
        </div>

        <div class="row g-4">

            {{-- 1. Berita (Internal) --}}
            <div class="col-12 col-md-6 col-lg-4 reveal-scale delay-1">
                <a href="{{ route('posts.index') }}" class="text-decoration-none text-dark">
                    <div class="card h-100 border-0 shadow-blue-sm rounded-3 hover-card p-3">
                        <div class="card-body text-center">
                            <div class="mb-3">
                                <i class="bi bi-newspaper service-icon"></i>
                            </div>
                            <h5 class="fw-bold card-title mb-2">Berita</h5>
                            <p class="card-text text-muted small">
                                Informasi dan berita seputar kegiatan serta publikasi Dinas Perhubungan.
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            {{-- 2. PPID (Internal) --}}
            <div class="col-12 col-md-6 col-lg-4 reveal-scale delay-2">
                <a href="{{ route('ppid.index') }}" class="text-decoration-none text-dark">
                    <div class="card h-100 border-0 shadow-blue-sm rounded-3 hover-card p-3">
                        <div class="card-body text-center">
                            <div class="mb-3">
                                <i class="bi bi-file-earmark-text service-icon"></i>
                            </div>
                            <h5 class="fw-bold card-title mb-2">PPID</h5>
                            <p class="card-text text-muted small">
                                Layanan Keterbukaan Informasi Publik dan permohonan dokumen resmi.
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            {{-- 3. Tanya Dinhub (Internal) --}}
            <div class="col-12 col-md-6 col-lg-4 reveal-scale delay-3">
                <a href="{{ route('question.create') }}" class="text-decoration-none text-dark">
                    <div class="card h-100 border-0 shadow-blue-sm rounded-3 hover-card p-3">
                        <div class="card-body text-center">
                            <div class="mb-3">
                                <i class="bi bi-chat-left-text service-icon"></i>
                            </div>
                            <h5 class="fw-bold card-title mb-2">Tanya Dinhub</h5>
                            <p class="card-text text-muted small">
                                Layanan pengajuan pertanyaan, pengaduan, dan aspirasi masyarakat.
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            {{-- 4. SKM ↗ (Eksternal) --}}
            <div class="col-12 col-md-6 col-lg-4 reveal-scale delay-1">
                <a href="{{ config('links.skm.url') }}" target="_blank" rel="noopener noreferrer" class="text-decoration-none text-dark">
                    <div class="card h-100 border-0 shadow-yellow-sm rounded-3 hover-card p-3">
                        <div class="card-body text-center">
                            <div class="mb-3">
                                <i class="bi bi-clipboard-check service-icon text-warning"></i>
                            </div>
                            <h5 class="fw-bold card-title mb-2">
                                SKM <i class="bi bi-box-arrow-up-right fs-6 text-warning"></i>
                            </h5>
                            <p class="card-text text-muted small">
                                Survei Kepuasan Masyarakat atas pelayanan Dinas Perhubungan.
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            {{-- 5. Aduan Bupati / Lapor Masbup ↗ (Eksternal) --}}
            <div class="col-12 col-md-6 col-lg-4 reveal-scale delay-2">
                <a href="{{ config('links.lapor_masbup.url') }}" target="_blank" rel="noopener noreferrer" class="text-decoration-none text-dark">
                    <div class="card h-100 border-0 shadow-yellow-sm rounded-3 hover-card p-3">
                        <div class="card-body text-center">
                            <div class="mb-3">
                                <i class="bi bi-chat-left-quote service-icon text-warning"></i>
                            </div>
                            <h5 class="fw-bold card-title mb-2">
                                Aduan Bupati <i class="bi bi-box-arrow-up-right fs-6 text-warning"></i>
                            </h5>
                            <p class="card-text text-muted small">
                                Layanan pengaduan dan aspirasi masyarakat langsung ke Bupati.
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            {{-- 6. Website Kabupaten ↗ (Eksternal) --}}
            <div class="col-12 col-md-6 col-lg-4 reveal-scale delay-3">
                <a href="{{ config('links.pemkab.url') }}" target="_blank" rel="noopener noreferrer" class="text-decoration-none text-dark">
                    <div class="card h-100 border-0 shadow-yellow-sm rounded-3 hover-card p-3">
                        <div class="card-body text-center">
                            <div class="mb-3">
                                <i class="bi bi-globe service-icon text-warning"></i>
                            </div>
                            <h5 class="fw-bold card-title mb-2">
                                Website Kabupaten <i class="bi bi-box-arrow-up-right fs-6 text-warning"></i>
                            </h5>
                            <p class="card-text text-muted small">
                                Portal resmi Pemerintah Kabupaten Purbalingga.
                            </p>
                        </div>
                    </div>
                </a>
            </div>



        </div>
    </div>
</section>