<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Manajemen Obat
        </h2>
    </x-slot>

    <div class="py-6 flex justify-center">
        <div
            class="max-w-6xl w-full bg-gradient-to-br from-yellow-500 to-yellow-600 text-yellow-900 shadow-2xl rounded-xl p-8">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-3xl font-extrabold text-yellow-900 drop-shadow-md">Daftar Obat</h3>
                <div class="flex items-center space-x-4">
                    <span class="text-yellow-900 font-semibold">Total Obat: {{ $obats->total() }}</span>
                </div>
            </div>

            <!-- Form Pencarian dengan Animasi -->
            <form method="GET" action="{{ route('obat.index') }}" class="mb-6">
                <div class="relative">
                    <input type="text" name="search" placeholder="Cari obat berdasarkan nama atau kategori..."
                        value="{{ request('search') }}"
                        class="bg-white/20 backdrop-blur-sm text-yellow-900 placeholder-yellow-800 border-2 border-yellow-600 focus:ring-4 focus:ring-yellow-400 rounded-xl p-3 w-full transition-all duration-300 ease-in-out">
                    <button type="submit"
                        class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-yellow-600 text-white p-2 rounded-full hover:bg-yellow-700 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </div>
            </form>

            <!-- Tabel Obat dengan Hover Effect -->
            <div class="overflow-x-auto">
                <table class="w-full bg-white/10 backdrop-blur-sm rounded-xl text-white shadow-lg">
                    <thead>
                        <tr class="bg-yellow-900/50 text-yellow-100 font-bold">
                            <th class="py-4 px-6 text-center rounded-tl-xl">Nama</th>
                            <th class="py-4 px-6 text-center">Kategori</th>
                            <th class="py-4 px-6 text-center">Stok</th>
                            <th class="py-4 px-6 text-center">Harga</th>
                            <th class="py-4 px-6 text-center rounded-tr-xl">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($obats as $o)
                            <tr
                                class="border-b border-yellow-700/30 hover:bg-yellow-500/20 transition-all duration-300 ease-in-out">
                                <td class="py-4 px-6 text-center text-yellow-900 font-semibold">{{ $o->nama }}</td>
                                <td class="py-4 px-6 text-center text-yellow-900">{{ $o->kategori }}</td>
                                <td class="py-4 px-6 text-center text-yellow-900">
                                    <span class="bg-yellow-200 text-yellow-800 px-3 py-1 rounded-full text-sm">
                                        {{ $o->stok }}
                                    </span>
                                </td>
                                <td class="py-4 px-6 text-center text-yellow-900 font-bold">
                                    Rp{{ number_format($o->harga, 2, ',', '.') }}
                                </td>
                                <td class="py-4 px-6 flex justify-center">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('obat.show', $o->id) }}"
                                            class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition-all duration-300 transform hover:scale-105 shadow-md">
                                            Lihat Detail
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-6 text-yellow-400">
                                    Tidak ada obat yang ditemukan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination dengan Desain Modern -->
            <div class="mt-6 flex justify-center items-center space-x-4">
                {{ $obats->links('pagination::tailwind') }}
            </div>
        </div>
    </div>
</x-app-layout>
