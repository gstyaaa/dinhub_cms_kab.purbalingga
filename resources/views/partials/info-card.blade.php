<div class="card border-0 shadow-sm rounded-3 hover-card h-100 {{ $class ?? '' }}">
    <div class="card-body p-4">
        @if(isset($icon))
            <div class="mb-3">
                <i class="bi {{ $icon }} fs-1 text-primary"></i>
            </div>
        @endif
        @if(isset($title))
            <h5 class="fw-bold card-title mb-3 text-dark">{{ $title }}</h5>
        @endif
        <div class="card-text text-secondary lh-relaxed">
            {!! $content ?? $description ?? '' !!}
        </div>
        @if(isset($footer))
            <div class="mt-3 pt-2 border-top border-light small text-muted">
                {{ $footer }}
            </div>
        @endif
    </div>
</div>
