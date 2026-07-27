<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body text-center py-5">
        <i class="bi {{ $icon ?? 'bi-inbox' }} display-3 text-secondary mb-3"></i>
        <h4 class="fw-bold">{{ $title ?? 'Belum Ada Data' }}</h4>
        <p class="text-muted mb-0">
            {{ $message ?? 'Data yang Anda cari belum tersedia saat ini.' }}
        </p>
    </div>
</div>
