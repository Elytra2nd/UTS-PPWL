<x-filament-panels::page>
    <x-filament::widget>
        <x-filament::card>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    @livewire(\App\Filament\Widgets\TotalObatWidget::class)
                </div>
                <div>
                    @livewire(\App\Filament\Widgets\ObatTerbanyakChart::class)
                </div>
            </div>
        </x-filament::card>
    </x-filament::widget>
</x-filament-panels::page>
