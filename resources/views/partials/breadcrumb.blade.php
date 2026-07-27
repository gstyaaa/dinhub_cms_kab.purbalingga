<nav aria-label="breadcrumb" class="bg-light border-bottom py-3">
    <div class="container">
        <ol class="breadcrumb mb-0 small">
            <li class="breadcrumb-item">
                <a href="{{ route('home') }}" class="text-decoration-none text-primary fw-semibold">
                    <i class="bi bi-house-door-fill me-1"></i> Beranda
                </a>
            </li>
            @if(isset($items))
                @foreach($items as $item)
                    @if($loop->last)
                        <li class="breadcrumb-item active text-muted" aria-current="page">
                            {{ is_array($item) ? ($item['name'] ?? $item['title'] ?? '') : $item }}
                        </li>
                    @else
                        <li class="breadcrumb-item">
                            @if(is_array($item) && isset($item['url']))
                                <a href="{{ $item['url'] }}" class="text-decoration-none text-primary fw-semibold">
                                    {{ $item['name'] ?? $item['title'] ?? '' }}
                                </a>
                            @else
                                {{ is_array($item) ? ($item['name'] ?? $item['title'] ?? '') : $item }}
                            @endif
                        </li>
                    @endif
                @endforeach
            @endif
        </ol>
    </div>
</nav>

