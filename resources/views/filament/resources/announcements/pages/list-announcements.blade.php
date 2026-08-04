<x-filament-panels::page>
    {{ $this->table }}

    <div class="kadis-card-container mt-8">
        <form wire:submit="saveKadis" class="space-y-4">
            {{ $this->kadisForm }}

            <div class="flex justify-end pt-2">
                <x-filament::button type="submit" size="sm">
                    Simpan Sambutan
                </x-filament::button>
            </div>
        </form>
    </div>
</x-filament-panels::page>
