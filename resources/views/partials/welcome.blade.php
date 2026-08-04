@php
    $siteSettings = \App\Models\SiteSetting::getSettings();
@endphp
<section id="welcome" class="py-5 bg-light border-bottom">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-4 text-center reveal-left">
                @if($siteSettings->kadis_photo)
                    <img src="{{ asset('storage/' . $siteSettings->kadis_photo) }}"
                         class="img-fluid rounded-4 shadow-md object-fit-cover"
                         style="max-height: 380px; width: 100%;"
                         alt="Kepala {{ config('dishub.name') }}"
                         loading="lazy">
                @else
                    <img src="{{ asset('images/kadishub-placeholder.jpg') }}"
                         class="img-fluid rounded-4 shadow-md object-fit-cover"
                         style="max-height: 380px; width: 100%;"
                         alt="Kepala {{ config('dishub.name') }}"
                         loading="lazy">
                @endif
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

                <p class="text-secondary fs-5 lh-base">
                    {{ $siteSettings->kadis_welcome_text }}
                </p>

                <div class="mt-4 pt-3 border-top">
                    <h5 class="fw-bold mb-0 text-primary fs-5">
                        {{ $siteSettings->kadis_name }}
                    </h5>
                    <p class="text-muted small mb-0">
                        {{ $siteSettings->kadis_title }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>