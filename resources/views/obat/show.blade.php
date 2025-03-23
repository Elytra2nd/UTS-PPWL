<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Obat') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                <h3 class="text-lg font-semibold">{{ $obat->nama }}</h3>
                <p><strong>Kategori:</strong> {{ $obat->kategori }}</p>
                <p><strong>Stok:</strong> {{ $obat->stok }}</p>
                <p><strong>Harga:</strong> Rp{{ number_format($obat->harga, 2, ',', '.') }}</p>
                <p><strong>Deskripsi:</strong> {{ $obat->deskripsi }}</p>

                <a href="{{ route('obat.index') }}" class="text-blue-500 hover:underline mt-4 inline-block">Kembali ke
                    daftar obat</a>

            </div>
        </div>
    </div>
</x-app-layout>
