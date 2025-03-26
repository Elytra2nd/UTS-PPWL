<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard User') }}
        </h2>
        <a href="{{ route('cart.index') }}" class="ml-8 mt-4 flex items-center text-gray-800 dark:text-gray-200 hover:text-blue-500">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 mr-2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.6 8M7 13h10m0 0l1.6 8M10 21h4"/>
    </svg>
    <span class="text-lg">Cart</span>
</a>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Kartu Total Stok Obat -->
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 mb-6">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Total Stok Obat</h3>
                <p class="text-2xl font-bold text-indigo-600">{{ $totalStok }}</p>
            </div>

            <!-- Daftar Obat Terbaru -->
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Obat Terbaru</h3>
                <table class="w-full text-gray-900 dark:text-gray-100">
                    <thead>
                        <tr class="bg-gray-200 dark:bg-gray-700">
                            <th class="py-2 px-4 border">Nama</th>
                            <th class="py-2 px-4 border">Kategori</th>
                            <th class="py-2 px-4 border">Stok</th>
                            <th class="py-2 px-4 border">Harga</th>
                            <th class="py-2 px-4 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($obats as $o)
                            <tr class="border-b">
                                <td class="py-2 px-4">{{ $o->nama }}</td>
                                <td class="py-2 px-4">{{ $o->kategori }}</td>
                                <td class="py-2 px-4">{{ $o->stok }}</td>
                                <td class="py-2 px-4">Rp{{ number_format($o->harga, 2, ',', '.') }}</td>
                                <td class="py-2 px-4">
                                    <a href="{{ route('obat.show', $o->id) }}" class="text-blue-500 hover:underline">Lihat
                                        Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Tombol Lihat Semua Obat -->
                <div class="mt-4">
                    <a href="{{ route('obat.index') }}"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Lihat Semua Obat
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
