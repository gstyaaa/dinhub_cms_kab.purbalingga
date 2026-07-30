@extends('layouts.app')

@section('title', 'Tanya Dinhub | ' . config('dishub.name'))

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
                Media resmi bagi masyarakat untuk menyampaikan pertanyaan, pengaduan, maupun masukan terkait pelayanan Dinas Perhubungan Kabupaten Purbalingga.
            </p>
        </div>

        @if(session('success'))
            <div class="alert alert-success border-0 shadow-sm rounded-4 mb-4 p-4">
                <div class="d-flex align-items-start">
                    <i class="bi bi-check-circle-fill fs-3 text-success me-3 flex-shrink-0 mt-1"></i>
                    <div>
                        <h5 class="mb-2 fw-bold text-success">
                            Pertanyaan Berhasil Dikirim
                        </h5>
                        <p class="mb-0 text-secondary">
                            {{ session('success') }}
                        </p>
                    </div>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger border-0 shadow-sm rounded-4 mb-4 p-4">
                <div class="d-flex align-items-start">
                    <i class="bi bi-exclamation-triangle-fill fs-3 text-danger me-3 flex-shrink-0 mt-1"></i>
                    <div>
                        <h5 class="mb-2 fw-bold text-danger">
                            Batas Pengiriman Terlampaui
                        </h5>
                        <p class="mb-0 text-secondary">
                            {{ session('error') }}
                        </p>
                    </div>
                </div>
            </div>
        @endif

        <div class="row g-4 align-items-stretch">

            {{-- LEFT COLUMN --}}
            <div class="col-lg-5">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body p-4 p-lg-5 d-flex flex-column justify-content-between">

                        <div>
                            {{-- Logo Instansi --}}
                            <div class="mb-4 text-center text-lg-start">
                                <img src="{{ asset(config('dishub.logo', 'images/new-dinhub.png')) }}"
                                     alt="Logo {{ config('dishub.short_name') }}"
                                     height="64"
                                     class="object-fit-contain mb-3"
                                     loading="lazy">
                                <h3 class="fw-bold mb-2">
                                    Kami Siap Membantu
                                </h3>
                                <p class="text-muted small mb-0">
                                    Layanan resmi pengajuan pertanyaan, pengaduan, dan aspirasi masyarakat terkait pelayanan {{ config('dishub.name') }}.
                                </p>
                            </div>

                            <hr class="my-4 text-muted opacity-25">

                            {{-- Scope Layanan --}}
                            <div class="mb-4">
                                <h6 class="fw-bold mb-3 text-primary">
                                    Layanan yang dapat diajukan:
                                </h6>
                                <div class="d-flex mb-3">
                                    <i class="bi bi-check-circle-fill text-success me-3 mt-1 flex-shrink-0"></i>
                                    <div class="small text-secondary">
                                        Pertanyaan mengenai pelayanan Dinas Perhubungan.
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <i class="bi bi-check-circle-fill text-success me-3 mt-1 flex-shrink-0"></i>
                                    <div class="small text-secondary">
                                        Kendala transportasi di Kabupaten Purbalingga.
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <i class="bi bi-check-circle-fill text-success me-3 mt-1 flex-shrink-0"></i>
                                    <div class="small text-secondary">
                                        Masukan untuk peningkatan kualitas pelayanan.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <hr class="my-4 text-muted opacity-25">

                            {{-- Jam Operasional & Info Email --}}
                            <div class="bg-light rounded-3 p-3 border border-light-subtle">
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <i class="bi bi-clock-fill text-primary"></i>
                                    <h6 class="fw-bold mb-0 small">Jam Operasional</h6>
                                </div>
                                <div class="small text-muted mb-2 ps-4">
                                    <div class="d-flex align-items-center mb-1" style="max-width: 290px;">
                                        <span style="width: 110px; flex-shrink: 0;">Senin – Kamis</span>
                                        <span class="me-2 fw-bold">:</span>
                                        <span>08.00 – 16.00 WIB</span>
                                    </div>
                                    <div class="d-flex align-items-center" style="max-width: 290px;">
                                        <span style="width: 110px; flex-shrink: 0;">Jum'at</span>
                                        <span class="me-2 fw-bold">:</span>
                                        <span>08.00 – 14.30 WIB</span>
                                    </div>
                                </div>
                                <div class="small text-secondary fst-italic pt-2 border-top">
                                    <i class="bi bi-info-circle me-1 text-primary"></i>
                                    Jawaban resmi akan dikirim melalui alamat email yang Anda daftarkan apabila diperlukan tindak lanjut.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            {{-- RIGHT COLUMN --}}
            <div class="col-lg-7">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body p-4 p-lg-5">

                        <h4 class="fw-bold mb-4 d-flex align-items-center">
                            <i class="bi bi-chat-left-text-fill text-primary me-2"></i>
                            Form Pertanyaan
                        </h4>

                        <form action="{{ route('question.store') }}" method="POST" id="questionForm">
                            @csrf

                            <div class="row">
                                {{-- Nama Lengkap --}}
                                <div class="col-md-6 mb-3">
                                    <label for="full_name" class="form-label fw-semibold">
                                        Nama Lengkap <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                           id="full_name"
                                           name="full_name"
                                           value="{{ old('full_name') }}"
                                           class="form-control form-control-lg placeholder-sm @error('full_name') is-invalid @enderror"
                                           placeholder="Masukkan nama lengkap"
                                           required>
                                    @error('full_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                {{-- Email --}}
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label fw-semibold">
                                        Email <span class="text-danger">*</span>
                                    </label>
                                    <input type="email"
                                           id="email"
                                           name="email"
                                           value="{{ old('email') }}"
                                           class="form-control form-control-lg placeholder-sm @error('email') is-invalid @enderror"
                                           placeholder="nama@email.com"
                                           required>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Subjek --}}
                            <div class="mb-3">
                                <label for="subject" class="form-label fw-semibold">
                                    Subjek <span class="text-danger">*</span>
                                </label>
                                <input type="text"
                                       id="subject"
                                       name="subject"
                                       value="{{ old('subject') }}"
                                       class="form-control form-control-lg placeholder-sm @error('subject') is-invalid @enderror"
                                       placeholder="Masukkan subjek pertanyaan"
                                       required>
                                @error('subject')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Detail Pertanyaan --}}
                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <label for="message" class="form-label fw-semibold mb-0">
                                        Detail Pertanyaan <span class="text-danger">*</span>
                                    </label>
                                    <small class="text-muted" id="charCount" style="font-size: 0.8rem;">0 karakter</small>
                                </div>
                                <textarea rows="5"
                                          id="message"
                                          name="message"
                                          class="form-control placeholder-sm @error('message') is-invalid @enderror"
                                          placeholder="Tuliskan pertanyaan Anda secara lengkap (minimal 20 karakter)..."
                                          required>{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Info Cards --}}
                            <div class="bg-light rounded-4 p-4 border mb-4">
                                <div class="row g-3 text-center">
                                    <div class="col-md-4">
                                        <i class="bi bi-clock-history fs-3 text-primary mb-2 d-block"></i>
                                        <div class="fw-semibold">Estimasi</div>
                                        <small class="text-muted">1–3 Hari Kerja</small>
                                    </div>
                                    <div class="col-md-4 border-start border-end">
                                        <i class="bi bi-shield-check fs-3 text-success mb-2 d-block"></i>
                                        <div class="fw-semibold">Data Aman</div>
                                        <small class="text-muted">Informasi dijaga kerahasiaannya.</small>
                                    </div>
                                    <div class="col-md-4">
                                        <i class="bi bi-envelope-check fs-3 text-warning mb-2 d-block"></i>
                                        <div class="fw-semibold">Balasan</div>
                                        <small class="text-muted">Melalui email yang Anda daftarkan.</small>
                                    </div>
                                </div>
                            </div>

                            {{-- Submit Button --}}
                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-primary btn-lg rounded-3 fw-semibold py-3" id="submitBtn">
                                    <span id="btnText">
                                        <i class="bi bi-send-fill me-2"></i> Kirim Pertanyaan
                                    </span>
                                    <span id="btnLoading" class="d-none">
                                        <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                                        Mengirim...
                                    </span>
                                </button>
                            </div>

                            <div class="text-center">
                                <small class="text-muted" style="font-size: 0.8rem;">
                                    Dengan mengirim formulir ini, Anda menyatakan bahwa informasi yang diberikan adalah benar dan dapat dipertanggungjawabkan.
                                </small>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const form = document.getElementById("questionForm");
        const submitBtn = document.getElementById("submitBtn");
        const btnText = document.getElementById("btnText");
        const btnLoading = document.getElementById("btnLoading");
        const messageInput = document.getElementById("message");
        const charCount = document.getElementById("charCount");

        // Live character counter
        if (messageInput && charCount) {
            const updateCount = () => {
                const len = messageInput.value.length;
                charCount.textContent = len + " karakter";
                if (len > 0 && len < 20) {
                    charCount.classList.add("text-warning");
                    charCount.classList.remove("text-muted", "text-success");
                } else if (len >= 20) {
                    charCount.classList.add("text-success");
                    charCount.classList.remove("text-muted", "text-warning");
                } else {
                    charCount.classList.add("text-muted");
                    charCount.classList.remove("text-warning", "text-success");
                }
            };

            messageInput.addEventListener("input", updateCount);
            updateCount();
        }

        // Auto focus to first invalid input if exists
        const firstInvalid = document.querySelector(".is-invalid");
        if (firstInvalid) {
            firstInvalid.focus();
        }

        // Loading state on form submit
        if (form && submitBtn) {
            form.addEventListener("submit", function () {
                submitBtn.disabled = true;
                btnText.classList.add("d-none");
                btnLoading.classList.remove("d-none");
            });
        }
    });
</script>
@endpush

@endsection
