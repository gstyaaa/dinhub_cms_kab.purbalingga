<section class="running-text">
    <div class="running-label">
        <i class="bi bi-megaphone-fill me-1"></i> Pengumuman
    </div>

    <div class="running-content py-2">
        <div class="running-track">
            <span>📢 Selamat Datang di Website Resmi Dinas Perhubungan Kabupaten Purbalingga</span>

            @if(isset($announcements) && $announcements->isNotEmpty())
                @foreach($announcements as $announcement)
                    <span class="mx-3">•</span>
                    <span>{{ $announcement->title }}</span>
                @endforeach
            @endif
        </div>
    </div>
</section>