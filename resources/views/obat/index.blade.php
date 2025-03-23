<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Obat') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                <!-- Form Pencarian -->
                <form method="GET" action="{{ route('obat.index') }}" class="mb-4">
                    <input type="text" name="search" placeholder="Cari obat..." value="{{ request('search') }}"
                        class="border-gray-300 focus:ring focus:ring-indigo-200 rounded-lg p-2 w-full">
                </form>

                <!-- Tabel Obat -->
                <table border="1" class="w-full text-gray-900 dark:text-gray-100">
                    <tr>
                        <th class="py-2 px-4 border">Nama</th>
                        <th class="py-2 px-4 border">Kategori</th>
                        <th class="py-2 px-4 border">Stok</th>
                        <th class="py-2 px-4 border">Harga</th>
                        <th class="py-2 px-4 border">Aksi</th>
                    </tr>
                    @foreach ($obats as $o)
                        <tr>
                            <td class="py-2 px-4 border">{{ $o->nama }}</td>
                            <td class="py-2 px-4 border">{{ $o->kategori }}</td>
                            <td class="py-2 px-4 border">{{ $o->stok }}</td>
                            <td class="py-2 px-4 border">Rp{{ number_format($o->harga, 2, ',', '.') }}</td>
                            <td class="py-2 px-4 border">
                                <a href="{{ route('obat.show', $o->id) }}" class="text-blue-500 hover:underline">Lihat
                                    Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </table>

                <!-- Pagination -->
                <div class="mt-4">
                    {{ $obats->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
