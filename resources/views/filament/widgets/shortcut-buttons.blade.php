<x-filament-widgets::widget>
    <x-filament::section>
        <h3 class="text-lg font-bold text-gray-950 dark:text-white mb-4">
            Pintasan Cepat
        </h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <a href="{{ url('/admin/posts/create') }}" class="flex flex-col items-center justify-center p-4 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                <span class="text-2xl mb-1">📝</span>
                <span class="text-sm font-semibold text-gray-900 dark:text-white">Tambah Berita</span>
            </a>
            <a href="{{ url('/admin/announcements/create') }}" class="flex flex-col items-center justify-center p-4 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                <span class="text-2xl mb-1">📢</span>
                <span class="text-sm font-semibold text-gray-900 dark:text-white">Buat Pengumuman</span>
            </a>
            <a href="{{ url('/admin/gallery-albums/create') }}" class="flex flex-col items-center justify-center p-4 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                <span class="text-2xl mb-1">🖼️</span>
                <span class="text-sm font-semibold text-gray-900 dark:text-white">Upload Galeri</span>
            </a>
            <a href="{{ route('home') }}" target="_blank" class="flex flex-col items-center justify-center p-4 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                <span class="text-2xl mb-1">🌐</span>
                <span class="text-sm font-semibold text-gray-900 dark:text-white">Lihat Website</span>
            </a>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
