<section class="profile-header-compact">
    <div class="container">
        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-2">
            <div>
                <h1 class="h4 fw-bold text-dark mb-1">{{ $title }}</h1>
                @if(isset($description))
                    <p class="text-muted small mb-0">{{ $description }}</p>
                @endif
            </div>
            @if(isset($badge))
                <div>
                    <span class="badge bg-primary px-3 py-2 rounded-pill fw-semibold">{{ $badge }}</span>
                </div>
            @endif
        </div>
    </div>
</section>
