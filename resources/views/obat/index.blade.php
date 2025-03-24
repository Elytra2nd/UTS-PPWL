<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <div class="py-6 flex justify-center">
        <div class="max-w-6xl w-full bg-yellow-500 text-yellow-900 shadow-lg rounded-lg p-6">
            <h3 class="text-2xl font-bold text-yellow-900">Daftar Obat</h3>

            <!-- Form Pencarian -->
            <form method="GET" action="{{ route('obat.index') }}" class="mb-6">
                <input type="text" name="search" placeholder="Cari obat..." value="{{ request('search') }}"
                    class="bg-gray-800 text-white border-gray-600 focus:ring focus:ring-yellow-400 rounded-lg p-2 w-full">
            </form>

            <!-- Tabel Obat -->
            <div class="overflow-x-auto">
                <table class="w-full bg-gray-800 rounded-lg text-white">
                    <thead>
                        <tr class="bg-gray-900 text-yellow-400 font-bold">
                            <th class="py-3 px-4 text-center">Nama</th>
                            <th class="py-3 px-4 text-center">Kategori</th>
                            <th class="py-3 px-4 text-center">Stok</th>
                            <th class="py-3 px-4 text-center">Harga</th>
                            <th class="py-3 px-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($obats as $o)
                            <tr class="border-b border-gray-900">
                                <td class="py-3 px-4 text-center text-yellow-900">{{ $o->nama }}</td>
                                <td class="py-3 px-4 text-center text-yellow-900">{{ $o->kategori }}</td>
                                <td class="py-3 px-4 text-center text-yellow-900">{{ $o->stok }}</td>
                                <td class="py-3 px-4 text-center text-yellow-900">Rp{{ number_format($o->harga, 2, ',', '.') }}</td>
                                <td class="py-3 px-4 flex justify-center">
                                    <a href="{{ route('obat.show', $o->id) }}"
                                       class="text-red-500 font-semibold hover:text-red-600 transition">
                                       Lihat Detail
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-6 flex justify-center">
                {{ $obats->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
