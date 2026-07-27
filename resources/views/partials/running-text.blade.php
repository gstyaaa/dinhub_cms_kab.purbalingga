<section class="running-text">
    <div class="running-label">
        <i class="bi bi-megaphone-fill me-1"></i> Pengumuman
    </div>

    <div class="running-content py-2">
        <div class="running-track">
            @if(isset($announcements) && $announcements->isNotEmpty())
                @foreach($announcements as $announcement)
                    <span class="me-5">
                        📢 <strong>{{ optional($announcement->publish_date)->format('d M Y') ?? $announcement->created_at->format('d M Y') }}</strong> — {{ $announcement->title }}
                    </span>
                @endforeach
            @else
                <span>
                    📢 Selamat Datang di Website Resmi Dinas Perhubungan Kabupaten Purbalingga
                </span>
            @endif
        </div>
    </div>
</section>