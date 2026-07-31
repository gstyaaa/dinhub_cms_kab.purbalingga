<x-filament-widgets::widget>
    <x-filament::section>
        <div style="background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 50%, #2563eb 100%); color: #ffffff; padding: 1.75rem; border-radius: 0.75rem; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1.25rem; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);">
            <div style="flex: 1; min-width: 280px;">
                <div style="display: inline-flex; align-items: center; gap: 0.5rem; background: rgba(255, 255, 255, 0.18); padding: 0.35rem 0.85rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 700; margin-bottom: 0.75rem; border: 1px solid rgba(255, 255, 255, 0.25);">
                    <span style="height: 8px; width: 8px; background-color: #10b981; border-radius: 50%; display: inline-block;"></span>
                    <span>Sistem Aktif &bull; {{ \Carbon\Carbon::now()->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</span>
                </div>

                <h2 style="font-size: 1.65rem; font-weight: 800; margin: 0 0 0.5rem 0; color: #ffffff; line-height: 1.2;">
                    Selamat Datang, {{ auth()->user()->name ?? 'Admin' }}! 👋
                </h2>

                <p style="margin: 0; font-size: 0.875rem; opacity: 0.92; max-width: 620px; line-height: 1.5; color: #e2e8f0;">
                    Panel Pengelolaan Konten Portal Resmi <strong>Dinas Perhubungan Kabupaten Purbalingga</strong>.
                </p>
            </div>

            <div style="display: flex; gap: 0.75rem; flex-shrink: 0;">
                <a href="{{ route('home') }}" target="_blank" 
                   style="display: inline-flex; align-items: center; gap: 0.5rem; background: #ffffff; color: #1e3a8a; font-weight: 700; font-size: 0.875rem; padding: 0.65rem 1.25rem; border-radius: 0.5rem; text-decoration: none; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);">
                    <span>🌐 Pratinjau Web Utama</span>
                </a>
            </div>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
