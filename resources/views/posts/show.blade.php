@extends('layouts.app')

@section('title', $post->title . ' - Dinas Perhubungan Kabupaten Purbalingga')

@section('content')

    {{-- Breadcrumb --}}
    @include('partials.breadcrumb', [
        'items' => [
            ['name' => 'Berita', 'url' => route('posts.index')],
            ['name' => $post->title]
        ]
    ])

    <section class="py-5">
        <div class="container">
            <div class="row g-4">

                {{-- Left Content: Post Detail & Related --}}
                <div class="col-lg-8">
                    <article class="card border-0 shadow-sm rounded-3 overflow-hidden mb-5">

                        {{-- Thumbnail --}}
                        @if($post->thumbnail)
                            <img src="{{ Storage::url($post->thumbnail) }}" class="card-img-top" alt="{{ $post->title }}" style="max-height: 480px; width: 100%; object-fit: cover; object-position: center 20%;">
                        @else
                            <img src="{{ asset('images/news-placeholder.jpg') }}" class="card-img-top" alt="{{ $post->title }}" style="max-height: 480px; width: 100%; object-fit: cover; object-position: center 20%;">
                        @endif

                        <div class="card-body p-4 p-md-5">

                            {{-- Category & Metadata --}}
                            <div class="d-flex flex-wrap align-items-center gap-3 mb-3">
                                @if($post->category)
                                    <span class="badge bg-primary px-3 py-2 rounded-pill">
                                        {{ $post->category->name }}
                                    </span>
                                @endif

                                <span class="small text-muted">
                                    <i class="bi bi-calendar-event me-1"></i>
                                    {{ optional($post->published_at)->format('d M Y') ?? $post->created_at->format('d M Y') }}
                                </span>

                                <span class="small text-muted">
                                    <i class="bi bi-person-fill me-1"></i>
                                    {{ $post->author->name ?? 'Admin Dinhub' }}
                                </span>

                            </div>

                            {{-- Title --}}
                            <h1 class="fw-bold mb-4 text-dark fs-2 fs-md-1">
                                {{ $post->title }}
                            </h1>

                            <hr class="my-4">

                            {{-- Content --}}
                            <div class="post-content fs-5 lh-lg text-secondary">
                                {!! $post->content !!}
                            </div>

                        </div>
                    </article>

                    {{-- Related News --}}
                    @if(isset($relatedNews) && $relatedNews->isNotEmpty())
                        <div class="mb-5">
                            <h3 class="fw-bold mb-4 text-dark border-start border-4 border-primary ps-3">
                                Berita Terkait
                            </h3>
                            <div class="row g-4">
                                @foreach($relatedNews as $related)
                                    @include('partials.post-card', ['post' => $related, 'colClass' => 'col-12 col-md-6'])
                                @endforeach
                            </div>
                        </div>
                    @endif
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

