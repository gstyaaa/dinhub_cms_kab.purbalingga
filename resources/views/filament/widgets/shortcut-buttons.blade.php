<x-filament-widgets::widget>
    <x-filament::section icon="heroicon-o-bolt" heading="Pintasan Cepat Admin">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(130px, 1fr)); gap: 0.85rem; margin-top: 0.5rem;">
            {{-- Tulis Berita --}}
            <a href="{{ url('/admin/posts/create') }}" 
               style="display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 1.1rem 0.5rem; background: #ffffff; border: 1px solid #e2e8f0; border-radius: 0.75rem; text-decoration: none; text-align: center; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); transition: border-color 0.2s ease;">
                <div style="width: 42px; height: 42px; background: #eff6ff; border-radius: 0.5rem; display: flex; align-items: center; justify-content: center; font-size: 1.35rem; margin-bottom: 0.5rem;">
                    📝
                </div>
                <span style="font-size: 0.8125rem; font-weight: 700; color: #0f172a;">Tulis Berita</span>
                <span style="font-size: 0.6875rem; color: #64748b; margin-top: 0.15rem;">Artikel / Berita</span>
            </a>

            {{-- Buat Pengumuman --}}
            <a href="{{ url('/admin/announcements/create') }}" 
               style="display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 1.1rem 0.5rem; background: #ffffff; border: 1px solid #e2e8f0; border-radius: 0.75rem; text-decoration: none; text-align: center; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); transition: border-color 0.2s ease;">
                <div style="width: 42px; height: 42px; background: #fffbeb; border-radius: 0.5rem; display: flex; align-items: center; justify-content: center; font-size: 1.35rem; margin-bottom: 0.5rem;">
                    📢
                </div>
                <span style="font-size: 0.8125rem; font-weight: 700; color: #0f172a;">Pengumuman</span>
                <span style="font-size: 0.6875rem; color: #64748b; margin-top: 0.15rem;">Info Publik</span>
            </a>

            {{-- Upload Galeri --}}
            <a href="{{ url('/admin/galleries/create') }}" 
               style="display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 1.1rem 0.5rem; background: #ffffff; border: 1px solid #e2e8f0; border-radius: 0.75rem; text-decoration: none; text-align: center; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); transition: border-color 0.2s ease;">
                <div style="width: 42px; height: 42px; background: #ecfdf5; border-radius: 0.5rem; display: flex; align-items: center; justify-content: center; font-size: 1.35rem; margin-bottom: 0.5rem;">
                    🖼️
                </div>
                <span style="font-size: 0.8125rem; font-weight: 700; color: #0f172a;">Upload Galeri</span>
                <span style="font-size: 0.6875rem; color: #64748b; margin-top: 0.15rem;">Foto Kegiatan</span>
            </a>

            {{-- Tanya Dishub --}}
            <a href="{{ url('/admin/questions') }}" 
               style="display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 1.1rem 0.5rem; background: #ffffff; border: 1px solid #e2e8f0; border-radius: 0.75rem; text-decoration: none; text-align: center; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); transition: border-color 0.2s ease;">
                <div style="width: 42px; height: 42px; background: #faf5ff; border-radius: 0.5rem; display: flex; align-items: center; justify-content: center; font-size: 1.35rem; margin-bottom: 0.5rem;">
                    💬
                </div>
                <span style="font-size: 0.8125rem; font-weight: 700; color: #0f172a;">Tanya Dishub</span>
                <span style="font-size: 0.6875rem; color: #64748b; margin-top: 0.15rem;">Aspirasi Warga</span>
            </a>

            {{-- Pratinjau Web --}}
            <a href="{{ route('home') }}" target="_blank" 
               style="display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 1.1rem 0.5rem; background: #ffffff; border: 1px solid #e2e8f0; border-radius: 0.75rem; text-decoration: none; text-align: center; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); transition: border-color 0.2s ease;">
                <div style="width: 42px; height: 42px; background: #ecfeff; border-radius: 0.5rem; display: flex; align-items: center; justify-content: center; font-size: 1.35rem; margin-bottom: 0.5rem;">
                    🌐
                </div>
                <span style="font-size: 0.8125rem; font-weight: 700; color: #0f172a;">Lihat Website</span>
                <span style="font-size: 0.6875rem; color: #64748b; margin-top: 0.15rem;">Halaman Publik</span>
            </a>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
