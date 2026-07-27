@extends('layouts.app')

@section('title', 'Beranda - Dinas Perhubungan Kabupaten Purbalingga')

@section('content')

    {{-- 1. Hero --}}
    @include('partials.hero')

    {{-- 2. Running Text --}}
    @include('partials.running-text')

    {{-- 3. Portal Layanan --}}
    @include('partials.services')

    {{-- 4. Sambutan --}}
    @include('partials.welcome')

    {{-- 5. Berita Terbaru --}}
    @include('partials.latest-news')

@endsection