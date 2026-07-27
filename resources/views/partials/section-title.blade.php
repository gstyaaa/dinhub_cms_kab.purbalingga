<div class="{{ isset($centered) && !$centered ? 'text-start' : 'text-center' }} mb-5">
    @if(isset($badge))
        <span class="badge bg-primary px-3 py-2 mb-2 rounded-pill">{{ $badge }}</span>
    @endif
    <h2 class="fw-bold text-dark mb-2">{{ $title }}</h2>
    @if(isset($subtitle))
        <p class="text-muted max-w-2xl mx-auto mb-0">{{ $subtitle }}</p>
    @endif
</div>
