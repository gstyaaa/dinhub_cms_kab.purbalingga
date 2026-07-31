{{-- Search Box --}}
<div class="card shadow-sm border-0 rounded-3 mb-4">
    <div class="card-header bg-primary text-white fw-bold">
        <i class="bi bi-search me-1"></i> Cari Berita
    </div>
    <div class="card-body">
        <form action="{{ route('posts.index') }}" method="GET">
            <div class="input-group">
                <input
                    type="text"
                    name="search"
                    class="form-control"
                    placeholder="Kata kunci..."
                    value="{{ request('search') }}">
                <button class="btn btn-primary" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </form>
    </div>
</div>

{{-- Category List --}}
<div class="card shadow-sm border-0 rounded-3 mb-4">
    <div class="card-header bg-primary text-white fw-bold">
        <i class="bi bi-folder me-1"></i> Kategori Berita
    </div>
    <div class="card-body p-2">
        <div class="nav flex-column nav-pills gap-1">
            @php
                $isAllActive = !request('category');
            @endphp
            <a href="{{ route('posts.index') }}"
               class="nav-link d-flex justify-content-between align-items-center py-2 px-3 rounded-2 {{ $isAllActive ? 'active' : '' }}">
                <span>
                    <i class="bi bi-grid me-2 opacity-75"></i>
                    Semua Kategori
                </span>
            </a>

            @forelse($categories as $category)
                @php
                    $isCatActive = request('category') == $category->slug;
                @endphp
                <a
                    href="{{ route('posts.index', ['category' => $category->slug]) }}"
                    class="nav-link d-flex justify-content-between align-items-center py-2 px-3 rounded-2 {{ $isCatActive ? 'active' : '' }}">
                    <span>
                        <i class="bi bi-tag me-2 opacity-75"></i>
                        {{ $category->name }}
                    </span>
                    @if(isset($category->posts_count))
                        <span class="badge {{ $isCatActive ? 'bg-primary text-white' : 'bg-light text-secondary border-0' }} rounded-pill">
                            {{ $category->posts_count }}
                        </span>
                    @endif
                </a>
            @empty
                <div class="text-muted p-2 small">
                    Belum ada kategori.
                </div>
            @endforelse
        </div>
    </div>
</div>

{{-- Latest News --}}
<div class="card shadow-sm border-0 rounded-3">
    <div class="card-header bg-primary text-white fw-bold">
        <i class="bi bi-newspaper me-1"></i> Berita Terbaru
    </div>
    <div class="list-group list-group-flush">
        @forelse($latestPosts as $latest)
            <a
                href="{{ route('posts.show', $latest->slug) }}"
                class="list-group-item list-group-item-action py-3">
                <div class="small text-muted mb-1">
                    <i class="bi bi-calendar-event me-1"></i>
                    {{ optional($latest->published_at)->format('d M Y') ?? $latest->created_at->format('d M Y') }}
                </div>
                <div class="fw-semibold text-dark">
                    {{ Str::limit($latest->title, 50) }}
                </div>
            </a>
        @empty
            <div class="list-group-item text-muted">
                Belum ada berita terbaru.
            </div>
        @endforelse
    </div>
</div>
