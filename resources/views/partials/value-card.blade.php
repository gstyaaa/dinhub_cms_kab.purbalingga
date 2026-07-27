<div class="card border-0 shadow-sm rounded-3 hover-card h-100 p-3">
    <div class="card-body text-center">
        <div class="d-inline-flex align-items-center justify-content-center bg-primary bg-opacity-10 text-primary rounded-circle p-3 mb-3" style="width: 64px; height: 64px;">
            <i class="bi {{ $icon ?? 'bi-check-circle' }} fs-2"></i>
        </div>
        <h5 class="fw-bold mb-2 text-dark">{{ $title }}</h5>
        <p class="text-muted small mb-0">{{ $description }}</p>
    </div>
</div>
