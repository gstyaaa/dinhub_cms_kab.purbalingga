<div class="mb-4">
    @if(isset($badge))
        <span class="badge bg-primary px-3 py-2 mb-2 rounded-pill">{{ $badge }}</span>
    @endif
    <h2 class="fw-bold text-primary mb-1">{{ $title }}</h2>
    @if(isset($subtitle))
        <p class="text-muted mb-0">
            {{ $subtitle }}
        </p>
    @endif
</div>
