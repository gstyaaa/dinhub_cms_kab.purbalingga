<div class="card border-0 shadow-sm rounded-4 h-100 transition-all hover-shadow">
    <div class="card-body p-4 d-flex flex-column justify-content-between">
        <div>
            {{-- Bootstrap Icon PDF --}}
            <div class="mb-3 d-flex align-items-center justify-content-between">
                <div class="bg-danger bg-opacity-10 text-danger rounded-3 p-2.5 d-inline-flex align-items-center justify-content-center" style="width: 46px; height: 46px;">
                    <i class="bi bi-file-earmark-pdf-fill fs-3"></i>
                </div>
                <span class="badge bg-light text-secondary border rounded-pill px-3 py-1.5 small fw-semibold">
                    Dokumen PDF
                </span>
            </div>

            {{-- Nama Dokumen --}}
            <h5 class="fw-bold text-dark mb-2 lh-sm fs-5">
                {{ $doc->title }}
            </h5>

            {{-- Terakhir Diperbarui (Poin 8) --}}
            <p class="text-muted small mb-3" style="font-size: 0.85rem;">
                <i class="bi bi-clock-history me-1 text-primary"></i> Terakhir diperbarui: 
                <span class="fw-semibold text-dark">
                    @if(!empty($doc->file_path) && $doc->updated_at)
                        {{ $doc->updated_at->locale('id')->isoFormat('D MMMM YYYY') }}
                    @else
                        Belum diperbarui
                    @endif
                </span>
            </p>
        </div>

        {{-- Action Button & Empty State (Poin 7) --}}
        <div class="pt-2">
            @if(!empty($doc->file_path))
                <a href="{{ asset('storage/' . $doc->file_path) }}" 
                   target="_blank" 
                   rel="noopener noreferrer" 
                   class="btn btn-primary rounded-pill w-100 py-2.5 fw-semibold shadow-sm">
                    <i class="bi bi-eye-fill me-1.5"></i> Lihat PDF
                </a>
            @else
                <button class="btn btn-secondary rounded-pill w-100 py-2.5 fw-semibold opacity-75" disabled>
                    <i class="bi bi-clock me-1.5"></i> Belum Dipublikasikan
                </button>
                <div class="small text-muted text-center mt-2" style="font-size: 0.775rem;">
                    <i class="bi bi-info-circle me-1 text-primary"></i> Dokumen akan dipublikasikan setelah tersedia.
                </div>
            @endif
        </div>
    </div>
</div>
