@extends('layouts.app')

@section('title', 'Tanya Dinhub - Dinas Perhubungan Kabupaten Purbalingga')

@section('content')

@include('partials.breadcrumb', [
    'items' => [
        ['name' => 'Tanya Dinhub']
    ]
])

<section class="py-5 bg-light">
    <div class="container">

        <div class="text-center mb-5">
            <span class="badge bg-primary rounded-pill px-3 py-2 mb-3">
                Layanan Aspirasi Masyarakat
            </span>

            <h1 class="fw-bold mb-3">
                Tanya Dinhub
            </h1>

            <p class="text-muted mx-auto" style="max-width:700px;">
                Sampaikan pertanyaan, saran maupun kendala mengenai pelayanan
                Dinas Perhubungan Kabupaten Purbalingga.
                Setiap pertanyaan akan diproses oleh admin dan dijawab sesuai
                prosedur yang berlaku.
            </p>
        </div>

        @if(session('success'))
            <div class="alert alert-success border-0 shadow-sm rounded-4 mb-4">

                <div class="d-flex">

                    <i class="bi bi-check-circle-fill fs-3 me-3"></i>

                    <div>

                        <h5 class="mb-1 fw-bold">
                            Pertanyaan Berhasil Dikirim
                        </h5>

                        <div class="small">
                            {{ session('success') }}
                        </div>

                    </div>

                </div>

            </div>
        @endif

        <div class="row g-4 align-items-stretch">

            {{-- LEFT SIDE --}}
            <div class="col-lg-5">

                <div class="card border-0 shadow-sm rounded-4 h-100">

                    <div class="card-body p-4 p-lg-5">

                        <div class="mb-4">

                            <div
                                class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center"
                                style="width:80px;height:80px;">

                                <i class="bi bi-chat-dots-fill fs-1 text-primary"></i>

                            </div>

                        </div>

                        <h3 class="fw-bold mb-3">
                            Kami Siap Membantu
                        </h3>

                        <p class="text-muted mb-4">

                            Gunakan layanan ini apabila Anda memiliki:

                        </p>

                        <div class="d-flex mb-3">

                            <i class="bi bi-check-circle-fill text-success me-3 mt-1"></i>

                            <div>
                                Pertanyaan mengenai pelayanan Dinas Perhubungan.
                            </div>

                        </div>

                        <div class="d-flex mb-3">

                            <i class="bi bi-check-circle-fill text-success me-3 mt-1"></i>

                            <div>
                                Laporan kendala transportasi di Kabupaten
                                Purbalingga.
                            </div>

                        </div>

                        <div class="d-flex mb-3">

                            <i class="bi bi-check-circle-fill text-success me-3 mt-1"></i>

                            <div>
                                Masukan untuk peningkatan kualitas pelayanan.
                            </div>

                        </div>

                        <hr>

                        <div class="mt-4">

                            <h6 class="fw-bold mb-3">

                                Status Penanganan

                            </h6>

                            <div class="d-flex align-items-center mb-3">

                                <span class="badge bg-warning text-dark me-3">
                                    1
                                </span>

                                <div>

                                    <strong>Diterima</strong>

                                    <div class="small text-muted">
                                        Pertanyaan berhasil masuk ke sistem.
                                    </div>

                                </div>

                            </div>

                            <div class="d-flex align-items-center mb-3">

                                <span class="badge bg-info me-3">
                                    2
                                </span>

                                <div>

                                    <strong>Sedang Diproses</strong>

                                    <div class="small text-muted">
                                        Admin akan melakukan verifikasi.
                                    </div>

                                </div>

                            </div>

                            <div class="d-flex align-items-center">

                                <span class="badge bg-success me-3">
                                    3
                                </span>

                                <div>

                                    <strong>Sudah Dijawab</strong>

                                    <div class="small text-muted">
                                        Jawaban akan diberikan oleh admin.
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            {{-- RIGHT SIDE --}}
            <div class="col-lg-7">

                <div class="card border-0 shadow-sm rounded-4">

                    <div class="card-body p-4 p-lg-5">

                        <h4 class="fw-bold mb-4">

                            Form Pertanyaan

                        </h4>

                        <form
                            action="{{ route('question.store') }}"
                            method="POST">

                            @csrf

                            <div class="row">

                                <div class="col-md-6 mb-3">

                                    <label class="form-label fw-semibold">

                                        Nama Lengkap

                                        <span class="text-danger">*</span>

                                    </label>

                                    <input
                                        type="text"
                                        name="name"
                                        value="{{ old('name') }}"
                                        class="form-control form-control-lg @error('name') is-invalid @enderror"
                                        placeholder="Masukkan nama lengkap">

                                    @error('name')

                                        <div class="invalid-feedback">

                                            {{ $message }}

                                        </div>

                                    @enderror

                                </div>

                                <div class="col-md-6 mb-3">

                                    <label class="form-label fw-semibold">

                                        Email

                                        <span class="text-danger">*</span>

                                    </label>

                                    <input
                                        type="email"
                                        name="email"
                                        value="{{ old('email') }}"
                                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                                        placeholder="nama@email.com">

                                    @error('email')

                                        <div class="invalid-feedback">

                                            {{ $message }}

                                        </div>

                                    @enderror

                                </div>

                            </div>

                            <div class="mb-3">

                                <label class="form-label fw-semibold">

                                    Subjek

                                    <span class="text-danger">*</span>

                                </label>

                                <input
                                    type="text"
                                    name="subject"
                                    value="{{ old('subject') }}"
                                    class="form-control form-control-lg @error('subject') is-invalid @enderror"
                                    placeholder="Masukkan subjek pertanyaan">

                                @error('subject')

                                    <div class="invalid-feedback">

                                        {{ $message }}

                                    </div>

                                @enderror

                            </div>

                            <div class="mb-4">

                                <label class="form-label fw-semibold">

                                    Detail Pertanyaan

                                    <span class="text-danger">*</span>

                                </label>

                                <textarea
                                    rows="6"
                                    name="question"
                                    class="form-control @error('question') is-invalid @enderror"
                                    placeholder="Tuliskan pertanyaan Anda secara lengkap...">{{ old('question') }}</textarea>

                                @error('question')

                                    <div class="invalid-feedback">

                                        {{ $message }}

                                    </div>

                                @enderror

                            </div>

                            <div
                                class="bg-light rounded-4 p-4 border mb-4">

                                <div class="row g-3">

                                    <div class="col-md-4 text-center">

                                        <i class="bi bi-clock-history fs-2 text-primary"></i>

                                        <div class="fw-semibold mt-2">

                                            Estimasi

                                        </div>

                                        <small class="text-muted">

                                            1–3 Hari Kerja

                                        </small>

                                    </div>

                                    <div class="col-md-4 text-center">

                                        <i class="bi bi-shield-check fs-2 text-success"></i>

                                        <div class="fw-semibold mt-2">

                                            Data Aman

                                        </div>

                                        <small class="text-muted">

                                            Informasi Anda dijaga kerahasiaannya

                                        </small>

                                    </div>

                                    <div class="col-md-4 text-center">

                                        <i class="bi bi-envelope-paper-heart fs-2 text-warning"></i>

                                        <div class="fw-semibold mt-2">

                                            Balasan

                                        </div>

                                        <small class="text-muted">

                                            Melalui Admin Dinhub

                                        </small>

                                    </div>

                                </div>

                            </div>

                            <div class="d-grid">

                                <button
                                    type="submit"
                                    class="btn btn-primary btn-lg rounded-3 fw-semibold py-3">

                                    <i class="bi bi-send-fill me-2"></i>

                                    Kirim Pertanyaan

                                </button>

                            </div>

                            <div class="text-center mt-4">

                                <small class="text-muted">

                                    Dengan mengirim formulir ini Anda menyatakan
                                    bahwa informasi yang diberikan benar dan dapat
                                    dipertanggungjawabkan.

                                </small>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection

