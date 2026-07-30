<section id="welcome" class="py-5 bg-light border-bottom">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-4 text-center reveal-left">
                <img src="{{ asset('images/kadishub-placeholder.jpg') }}"
                     class="img-fluid rounded-3 shadow-sm"
                     alt="Kepala {{ config('dishub.name') }}"
                     loading="lazy">
            </div>

            <div class="col-lg-8 reveal-right">
                <span class="badge bg-primary px-3 py-2 mb-3 rounded-pill">
                    Sambutan Kepala Dinas
                </span>

                <h2 class="fw-bold mb-4">
                    Selamat Datang di Website Resmi
                    <span class="text-primary d-block">
                        {{ config('dishub.name') }}
                    </span>
                </h2>

                <p class="text-secondary fs-5">
                    Website ini menjadi media informasi resmi mengenai pelayanan publik, berita, program kerja, serta berbagai kegiatan {{ config('dishub.name') }}.
                </p>

                <p class="text-secondary">
                    Kami berkomitmen memberikan pelayanan transportasi yang aman, tertib, nyaman, dan berkelanjutan serta meningkatkan kualitas pelayanan kepada masyarakat melalui pemanfaatan teknologi informasi secara transparan dan akuntabel.
                </p>

                <div class="mt-4">
                    <h5 class="fw-bold mb-0">
                        SUTRISNO, S.Sos
                    </h5>
                    <p class="text-muted small">
                        Kepala {{ config('dishub.name') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>