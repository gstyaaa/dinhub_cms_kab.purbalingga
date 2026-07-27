<div class="bg-primary text-white py-2">
    <div class="container d-flex flex-wrap justify-content-between align-items-center small gap-2">

        <!-- Kiri : Jam Pelayanan -->
        <div class="d-flex align-items-center gap-3">
            <span>
                <i class="bi bi-clock-fill me-1 text-warning"></i>
                {{ config('dishub.operating_hours', "Senin – Kamis 08.00–16.00 | Jum'at 08.00–14.30 WIB") }}
            </span>
        </div>


        <!-- Kanan : Instagram -->
        <div class="d-flex align-items-center gap-3 ms-auto">
            <a href="{{ config('dishub.instagram') }}" target="_blank" rel="noopener noreferrer" class="text-white text-decoration-none d-flex align-items-center gap-1" title="Instagram Dinhub">
                <i class="bi bi-instagram text-warning"></i>
                <span class="d-none d-sm-inline">Instagram</span>
            </a>
        </div>

    </div>
</div>