<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Obat</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-white">
    <div class="min-h-screen flex flex-col items-center p-6">
        <!-- Tambah Obat ke Keranjang -->
        <div class="w-full max-w-3xl bg-gray-900 p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-semibold mb-4 text-yellow-400">Tambah Obat ke Keranjang</h2>
            
            @if(session('success'))
                <p class="text-green-400">{{ session('success') }}</p>
            @endif

            <form action="{{ route('cart.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="obat_id" class="block text-yellow-300">Pilih Obat:</label>
                    <select name="obat_id" id="obat_id" class="w-full p-2 bg-gray-800 text-white rounded">
                        @foreach($obats as $obat)
                            <option value="{{ $obat->id }}">{{ $obat->nama }} - Rp {{ number_format($obat->harga, 0, ',', '.') }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="jumlah" class="block text-yellow-300">Jumlah:</label>
                    <input type="number" name="jumlah" id="jumlah" required min="1" class="w-full p-2 bg-gray-800 text-white rounded">
                </div>

                <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-black px-4 py-2 rounded font-semibold">
                    Tambah ke Keranjang
                </button>
            </form>
        </div>

        <!-- Isi Keranjang -->
        <div class="w-full max-w-3xl bg-gray-900 p-6 rounded-lg shadow-lg mt-6">
            <h2 class="text-2xl font-semibold mb-4 text-yellow-400">Isi Keranjang</h2>
            @if($carts->isEmpty())
                <p class="text-gray-400">Keranjang kosong.</p>
            @else
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="text-yellow-300">
                            <th class="p-2">Nama Obat</th>
                            <th class="p-2">Harga</th>
                            <th class="p-2">Jumlah</th>
                            <th class="p-2">Total Harga</th>
                            <th class="p-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($carts as $cart)
                        <tr class="border-b border-gray-700">
                            <td class="p-2">{{ $cart->obat->nama }}</td>
                            <td class="p-2">Rp {{ number_format($cart->obat->harga, 0, ',', '.') }}</td>
                            <td class="p-2">
                                <form action="{{ route('cart.update', $cart->id) }}" method="POST" class="flex items-center">
                                    @csrf
                                    @method('PUT')
                                    <input type="number" name="jumlah" value="{{ $cart->jumlah }}" min="1" class="w-16 p-1 bg-gray-800 text-white rounded">
                                    <button type="submit" class="ml-2 bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">Update</button>
                                </form>
                            </td>
                            <td class="p-2">Rp {{ number_format($cart->total_harga, 0, ',', '.') }}</td>
                            <td class="p-2">
                                <form action="{{ route('cart.destroy', $cart->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</body>
</html>
