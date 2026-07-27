<section class="py-5 bg-light">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center mb-5 reveal">
            <div>
                <span class="badge bg-primary mb-2">
                    Berita
                </span>

                <h2 class="fw-bold mb-0">
                    Berita Terbaru
                </h2>
            </div>

            <a href="{{ route('posts.index') }}"
               class="btn btn-outline-primary">
                Lihat Semua
            </a>
        </div>

        <div class="row g-4">

            @forelse($posts as $post)

                @include('partials.post-card')

            @empty

                <div class="col-12">

                    <div class="card border-0 shadow-sm">

                        <div class="card-body text-center py-5">

                            <i class="bi bi-newspaper display-3 text-secondary mb-3"></i>

                            <h4 class="fw-bold">
                                Belum Ada Berita
                            </h4>

                            <p class="text-muted mb-0">

                                Berita terbaru akan muncul di sini.

                            </p>

                        </div>

                    </div>

                </div>

            @endforelse

        </div>

    </div>
</section>