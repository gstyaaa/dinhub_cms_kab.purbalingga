@extends('layouts.app')

@section('title', 'Berita & Informasi - Dinas Perhubungan Kabupaten Purbalingga')

@section('content')

    {{-- Breadcrumb --}}
    @include('partials.breadcrumb', [
        'items' => ['Berita']
    ])

    <section class="py-5">
        <div class="container">

            @include('partials.page-header', [
                'title' => 'Berita & Informasi',
                'subtitle' => 'Dapatkan update terbaru seputar program, pengumuman, dan kegiatan Dinas Perhubungan Kabupaten Purbalingga.'
            ])

            @if(request('search'))
                <div class="alert alert-info py-2 small d-flex justify-content-between align-items-center rounded-3 mb-4">
                    <span>
                        <i class="bi bi-search me-1"></i> Menampilkan hasil pencarian untuk kata kunci: <strong>"{{ request('search') }}"</strong>
                    </span>
                    <a href="{{ route('posts.index') }}" class="btn btn-sm btn-outline-info text-decoration-none">
                        <i class="bi bi-x-circle me-1"></i> Hapus Filter
                    </a>
                </div>
            @endif

            <div class="row g-4">

                {{-- Left Content: Grid Cards --}}
                <div class="col-lg-8">
                    <div class="row g-4">
                        @forelse($posts as $post)
                            @include('partials.post-card', ['post' => $post, 'colClass' => 'col-12 col-md-6'])
                        @empty
                            <div class="col-12">
                                @include('partials.empty-state', [
                                    'icon' => 'bi-newspaper',
                                    'title' => 'Belum Ada Berita',
                                    'message' => 'Berita terbaru belum tersedia atau tidak ditemukan.'
                                ])
                            </div>
                        @endforelse
                    </div>


                    {{-- Pagination --}}
                    <div class="d-flex justify-content-center mt-5">
                        {{ $posts->links('pagination::bootstrap-5') }}
                    </div>
                </div>

                {{-- Right Content: Sidebar --}}
                <div class="col-lg-4">
                    @include('partials.post-sidebar', [
                        'categories' => $categories,
                        'latestPosts' => $latestPosts
                    ])
                </div>

            </div>

        </div>
    </section>

@endsection

