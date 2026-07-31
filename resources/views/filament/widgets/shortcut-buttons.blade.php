<x-filament-widgets::widget>
    <x-filament::section icon="heroicon-o-bolt" heading="Pintasan Cepat Admin">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(130px, 1fr)); gap: 0.85rem; margin-top: 0.5rem;">
            {{-- Tulis Berita --}}
            <a href="{{ url('/admin/posts/create') }}" 
               class="flex flex-col items-center justify-center p-4 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl text-center shadow-sm hover:border-primary-500 dark:hover:border-primary-400 transition-all no-underline group">
                <div class="w-11 h-11 bg-blue-50 dark:bg-blue-950/60 rounded-lg flex items-center justify-center text-xl mb-2 group-hover:scale-105 transition-transform">
                    📝
                </div>
                <span class="text-xs font-bold text-gray-900 dark:text-gray-100">Tulis Berita</span>
                <span class="text-[11px] text-gray-500 dark:text-gray-400 mt-0.5">Artikel / Berita</span>
            </a>

            {{-- Buat Pengumuman --}}
            <a href="{{ url('/admin/announcements/create') }}" 
               class="flex flex-col items-center justify-center p-4 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl text-center shadow-sm hover:border-primary-500 dark:hover:border-primary-400 transition-all no-underline group">
                <div class="w-11 h-11 bg-amber-50 dark:bg-amber-950/60 rounded-lg flex items-center justify-center text-xl mb-2 group-hover:scale-105 transition-transform">
                    📢
                </div>
                <span class="text-xs font-bold text-gray-900 dark:text-gray-100">Pengumuman</span>
                <span class="text-[11px] text-gray-500 dark:text-gray-400 mt-0.5">Info Publik</span>
            </a>

            {{-- Upload Galeri --}}
            <a href="{{ url('/admin/galleries/create') }}" 
               class="flex flex-col items-center justify-center p-4 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl text-center shadow-sm hover:border-primary-500 dark:hover:border-primary-400 transition-all no-underline group">
                <div class="w-11 h-11 bg-emerald-50 dark:bg-emerald-950/60 rounded-lg flex items-center justify-center text-xl mb-2 group-hover:scale-105 transition-transform">
                    🖼️
                </div>
                <span class="text-xs font-bold text-gray-900 dark:text-gray-100">Upload Galeri</span>
                <span class="text-[11px] text-gray-500 dark:text-gray-400 mt-0.5">Foto Kegiatan</span>
            </a>

            {{-- Tanya Dishub --}}
            <a href="{{ url('/admin/questions') }}" 
               class="flex flex-col items-center justify-center p-4 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl text-center shadow-sm hover:border-primary-500 dark:hover:border-primary-400 transition-all no-underline group">
                <div class="w-11 h-11 bg-purple-50 dark:bg-purple-950/60 rounded-lg flex items-center justify-center text-xl mb-2 group-hover:scale-105 transition-transform">
                    💬
                </div>
                <span class="text-xs font-bold text-gray-900 dark:text-gray-100">Tanya Dishub</span>
                <span class="text-[11px] text-gray-500 dark:text-gray-400 mt-0.5">Aspirasi Warga</span>
            </a>

            {{-- Pratinjau Web --}}
            <a href="{{ route('home') }}" target="_blank" 
               class="flex flex-col items-center justify-center p-4 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl text-center shadow-sm hover:border-primary-500 dark:hover:border-primary-400 transition-all no-underline group">
                <div class="w-11 h-11 bg-cyan-50 dark:bg-cyan-950/60 rounded-lg flex items-center justify-center text-xl mb-2 group-hover:scale-105 transition-transform">
                    🌐
                </div>
                <span class="text-xs font-bold text-gray-900 dark:text-gray-100">Lihat Website</span>
                <span class="text-[11px] text-gray-500 dark:text-gray-400 mt-0.5">Halaman Publik</span>
            </a>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
