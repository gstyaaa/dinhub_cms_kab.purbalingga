<x-filament-widgets::widget>
    <x-filament::section icon="heroicon-o-bolt" heading="Pintasan Cepat Admin">
        <div style="display: flex; flex-wrap: wrap; gap: 0.65rem; margin-top: 0.25rem;">

            {{-- 1. Tulis Berita --}}
            <a href="{{ url('/admin/posts/create') }}" 
               style="flex: 1 1 135px; max-width: 175px; min-width: 125px; padding: 0.75rem 0.6rem; text-align: center; text-decoration: none; border: 1px solid rgba(229, 231, 235, 1); border-radius: 0.85rem; background: #ffffff;"
               class="dark:bg-gray-800 dark:border-gray-700/80 group hover:border-blue-500 hover:shadow-sm transition-all duration-200 no-underline">
                <div style="width: 2.35rem; height: 2.35rem; margin: 0 auto 0.35rem auto; display: flex; align-items: center; justify-content: center; border-radius: 0.65rem; background: #eff6ff;"
                     class="dark:bg-blue-950/60 group-hover:scale-105 transition-transform">
                    <svg xmlns="http://www.w3.org/2000/svg" style="width: 1.2rem; height: 1.2rem; color: #2563eb;" class="dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </div>
                <span style="font-size: 12px; font-weight: 700; color: #111827; display: block; line-height: 1.25;" class="dark:text-gray-100 group-hover:text-blue-600">Tulis Berita</span>
                <span style="font-size: 11px; color: #6b7280; display: block; margin-top: 2px;" class="dark:text-gray-400">Artikel Berita</span>
            </a>

            {{-- 2. Pengumuman --}}
            <a href="{{ url('/admin/announcements/create') }}" 
               style="flex: 1 1 135px; max-width: 175px; min-width: 125px; padding: 0.75rem 0.6rem; text-align: center; text-decoration: none; border: 1px solid rgba(229, 231, 235, 1); border-radius: 0.85rem; background: #ffffff;"
               class="dark:bg-gray-800 dark:border-gray-700/80 group hover:border-amber-500 hover:shadow-sm transition-all duration-200 no-underline">
                <div style="width: 2.35rem; height: 2.35rem; margin: 0 auto 0.35rem auto; display: flex; align-items: center; justify-content: center; border-radius: 0.65rem; background: #fffbeb;"
                     class="dark:bg-amber-950/60 group-hover:scale-105 transition-transform">
                    <svg xmlns="http://www.w3.org/2000/svg" style="width: 1.2rem; height: 1.2rem; color: #d97706;" class="dark:text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                    </svg>
                </div>
                <span style="font-size: 12px; font-weight: 700; color: #111827; display: block; line-height: 1.25;" class="dark:text-gray-100 group-hover:text-amber-600">Pengumuman</span>
                <span style="font-size: 11px; color: #6b7280; display: block; margin-top: 2px;" class="dark:text-gray-400">Info Publik</span>
            </a>

            {{-- 3. Upload Galeri --}}
            <a href="{{ url('/admin/galleries/create') }}" 
               style="flex: 1 1 135px; max-width: 175px; min-width: 125px; padding: 0.75rem 0.6rem; text-align: center; text-decoration: none; border: 1px solid rgba(229, 231, 235, 1); border-radius: 0.85rem; background: #ffffff;"
               class="dark:bg-gray-800 dark:border-gray-700/80 group hover:border-emerald-500 hover:shadow-sm transition-all duration-200 no-underline">
                <div style="width: 2.35rem; height: 2.35rem; margin: 0 auto 0.35rem auto; display: flex; align-items: center; justify-content: center; border-radius: 0.65rem; background: #ecfdf5;"
                     class="dark:bg-emerald-950/60 group-hover:scale-105 transition-transform">
                    <svg xmlns="http://www.w3.org/2000/svg" style="width: 1.2rem; height: 1.2rem; color: #059669;" class="dark:text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <span style="font-size: 12px; font-weight: 700; color: #111827; display: block; line-height: 1.25;" class="dark:text-gray-100 group-hover:text-emerald-600">Upload Galeri</span>
                <span style="font-size: 11px; color: #6b7280; display: block; margin-top: 2px;" class="dark:text-gray-400">Foto Kegiatan</span>
            </a>

            {{-- 4. Tanya Dishub --}}
            <a href="{{ url('/admin/questions') }}" 
               style="flex: 1 1 135px; max-width: 175px; min-width: 125px; padding: 0.75rem 0.6rem; text-align: center; text-decoration: none; border: 1px solid rgba(229, 231, 235, 1); border-radius: 0.85rem; background: #ffffff;"
               class="dark:bg-gray-800 dark:border-gray-700/80 group hover:border-purple-500 hover:shadow-sm transition-all duration-200 no-underline">
                <div style="width: 2.35rem; height: 2.35rem; margin: 0 auto 0.35rem auto; display: flex; align-items: center; justify-content: center; border-radius: 0.65rem; background: #faf5ff;"
                     class="dark:bg-purple-950/60 group-hover:scale-105 transition-transform">
                    <svg xmlns="http://www.w3.org/2000/svg" style="width: 1.2rem; height: 1.2rem; color: #9333ea;" class="dark:text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                </div>
                <span style="font-size: 12px; font-weight: 700; color: #111827; display: block; line-height: 1.25;" class="dark:text-gray-100 group-hover:text-purple-600">Tanya Dishub</span>
                <span style="font-size: 11px; color: #6b7280; display: block; margin-top: 2px;" class="dark:text-gray-400">Aspirasi Warga</span>
            </a>

            {{-- 5. Kelola Banner --}}
            <a href="{{ url('/admin/banners') }}" 
               style="flex: 1 1 135px; max-width: 175px; min-width: 125px; padding: 0.75rem 0.6rem; text-align: center; text-decoration: none; border: 1px solid rgba(229, 231, 235, 1); border-radius: 0.85rem; background: #ffffff;"
               class="dark:bg-gray-800 dark:border-gray-700/80 group hover:border-rose-500 hover:shadow-sm transition-all duration-200 no-underline">
                <div style="width: 2.35rem; height: 2.35rem; margin: 0 auto 0.35rem auto; display: flex; align-items: center; justify-content: center; border-radius: 0.65rem; background: #fff1f2;"
                     class="dark:bg-rose-950/60 group-hover:scale-105 transition-transform">
                    <svg xmlns="http://www.w3.org/2000/svg" style="width: 1.2rem; height: 1.2rem; color: #e11d48;" class="dark:text-rose-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                    </svg>
                </div>
                <span style="font-size: 12px; font-weight: 700; color: #111827; display: block; line-height: 1.25;" class="dark:text-gray-100 group-hover:text-rose-600">Hero Banner</span>
                <span style="font-size: 11px; color: #6b7280; display: block; margin-top: 2px;" class="dark:text-gray-400">Slider Beranda</span>
            </a>

            {{-- 6. Lihat Website --}}
            <a href="{{ route('home') }}" target="_blank" 
               style="flex: 1 1 135px; max-width: 175px; min-width: 125px; padding: 0.75rem 0.6rem; text-align: center; text-decoration: none; border: 1px solid rgba(229, 231, 235, 1); border-radius: 0.85rem; background: #ffffff;"
               class="dark:bg-gray-800 dark:border-gray-700/80 group hover:border-cyan-500 hover:shadow-sm transition-all duration-200 no-underline">
                <div style="width: 2.35rem; height: 2.35rem; margin: 0 auto 0.35rem auto; display: flex; align-items: center; justify-content: center; border-radius: 0.65rem; background: #ecfeff;"
                     class="dark:bg-cyan-950/60 group-hover:scale-105 transition-transform">
                    <svg xmlns="http://www.w3.org/2000/svg" style="width: 1.2rem; height: 1.2rem; color: #0891b2;" class="dark:text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                    </svg>
                </div>
                <span style="font-size: 12px; font-weight: 700; color: #111827; display: block; line-height: 1.25;" class="dark:text-gray-100 group-hover:text-cyan-600">Lihat Web</span>
                <span style="font-size: 11px; color: #6b7280; display: block; margin-top: 2px;" class="dark:text-gray-400">Halaman Publik</span>
            </a>

        </div>
    </x-filament::section>
</x-filament-widgets::widget>
