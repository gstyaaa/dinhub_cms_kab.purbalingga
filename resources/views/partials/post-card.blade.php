<div class="{{ $colClass ?? 'col-12 col-md-6 col-lg-4' }} reveal-scale">
    <div class="card news-card h-100 border-0 shadow-sm rounded-3 hover-card">
        @if($post->thumbnail)
            <img src="{{ Storage::url($post->thumbnail) }}" class="card-img-top" alt="{{ $post->title }}" style="aspect-ratio: 16/9; width: 100%; object-fit: cover; object-position: center 20%;" loading="lazy">
        @else
            <img src="{{ asset('images/news-placeholder.webp') }}" class="card-img-top" alt="{{ $post->title }}" style="aspect-ratio: 16/9; width: 100%; object-fit: cover; object-position: center 20%;" loading="lazy">
        @endif

        <div class="card-body d-flex flex-column">
            @if($post->category)
                <div class="mb-2">
                    <span class="badge bg-primary px-2 py-1 rounded-pill">
                        {{ $post->category->name }}
                    </span>
                </div>
            @endif

            <div class="small text-muted mb-2">
                <i class="bi bi-calendar-event me-1"></i>
                {{ optional($post->published_at)->format('d M Y') ?? $post->created_at->format('d M Y') }}
            </div>

            <h5 class="fw-bold card-title mb-2">
                <a href="{{ route('posts.show', $post->slug) }}" class="text-decoration-none text-dark">
                    {{ Str::limit($post->title, 60) }}
                </a>
            </h5>

            <p class="card-text text-muted small mb-3 flex-grow-1">
                {{ Str::limit($post->excerpt ?: strip_tags($post->content), 100) }}
            </p>

            <div class="mt-auto pt-2">
                <a href="{{ route('posts.show', $post->slug) }}" class="btn btn-sm btn-outline-primary rounded-2 fw-semibold w-100">
                    Baca Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>
</div>

