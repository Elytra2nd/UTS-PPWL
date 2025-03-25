<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="py-6 flex justify-center">
        <div class="max-w-6xl w-full bg-yellow-500 text-yellow-900 shadow-lg rounded-lg p-6">
            <h3 class="text-2xl font-bold text-yellow-900 text-center">Detail Obat</h3>

            <div class="bg-gray-800 text-white rounded-lg p-6 mt-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <p class="text-lg"><span class="font-semibold text-yellow-400">Nama:</span> {{ $obat->nama }}</p>
                        <p class="text-lg"><span class="font-semibold text-yellow-400">Kategori:</span> {{ $obat->kategori }}</p>
                    </div>
                    <div>
                        <p class="text-lg"><span class="font-semibold text-yellow-400">Stok:</span> {{ $obat->stok }}</p>
                        <p class="text-lg"><span class="font-semibold text-yellow-400">Harga:</span> Rp{{ number_format($obat->harga, 2, ',', '.') }}</p>
                    </div>
                </div>

                <div class="mt-4 border-t border-gray-700 pt-4">
                    <p class="text-lg"><span class="font-semibold text-yellow-400">Deskripsi:</span> {{ $obat->deskripsi }}</p>
                </div>

                <div class="text-center mt-6">
                    <a href="{{ route('obat.index') }}"
                       class="px-6 py-2 bg-yellow-500 text-yellow-900 font-semibold rounded-lg hover:bg-yellow-400 transition">
                        Kembali ke daftar obat
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
