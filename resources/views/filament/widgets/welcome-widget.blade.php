<x-filament-widgets::widget>
    <div class="fi-welcome-header-card bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl p-6 shadow-sm transition-all" style="border-left: 4px solid #0D6EFD !important;">
        <div class="welcome-container flex flex-col sm:flex-row sm:items-start justify-between gap-6 sm:gap-8">
            <!-- Left Side Text Content Wrapper -->
            <div class="welcome-content min-w-0 flex-1 max-w-2xl">
                <div class="welcome-label text-[12px] font-semibold tracking-wider text-[#0D6EFD] dark:text-blue-400 uppercase mb-[12px]">
                    PANEL PENGELOLAAN WEBSITE
                </div>

                <div class="welcome-title text-xl sm:text-[21px] font-bold text-[#111827] dark:text-white tracking-tight leading-snug mb-[8px]">
                    Dinas Perhubungan Kabupaten Purbalingga
                </div>

                <div class="welcome-description text-sm text-[#64748B] dark:text-slate-400 leading-relaxed font-normal">
                    Kelola berita, dokumen publik, galeri foto, dan layanan masyarakat melalui panel administrasi ini.
                </div>
            </div>

            <!-- Right Side CTA Button Wrapper (Top Right Alignment) -->
            <div class="welcome-actions flex items-center flex-shrink-0 pt-0.5 sm:pt-0">
                <a href="{{ route('home') }}" target="_blank" rel="noopener noreferrer" 
                   class="welcome-button inline-flex items-center gap-2 px-4 py-2.5 text-sm font-semibold text-white bg-[#0D6EFD] hover:bg-blue-700 active:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-500 rounded-lg shadow-sm transition-all duration-150">
                    <x-heroicon-o-globe-alt class="w-4 h-4 text-white" />
                    <span>Lihat Website Publik</span>
                </a>
            </div>
        </div>
    </div>
</x-filament-widgets::widget>
