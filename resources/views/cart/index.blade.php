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
                    <input type="number" name="jumlah" id="jumlah" required min="1"
                        class="w-full p-2 bg-gray-800 text-white rounded">
                </div>

                <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-black px-4 py-2 rounded font-semibold">
                    Tambah ke Keranjang
                </button>
            </form>
        </div>

        <!-- Isi Keranjang -->
        <div class="w-full max-w-3xl bg-gray-900 p-6 rounded-lg shadow-lg mt-6">
            <h2 class="text-2xl font-semibold mb-4 text-yellow-400">Isi Keranjang</h2>
            <ul class="space-y-3">
                @foreach($carts as $cart)
                    <li class="flex justify-between items-center bg-gray-800 p-4 rounded">
                        <span>{{ $cart->obat->nama }} - {{ $cart->jumlah }} pcs - Rp {{ number_format($cart->total_harga, 0, ',', '.') }}</span>
                        <div class="space-x-2">
                            <button class="bg-yellow-500 hover:bg-yellow-600 text-black px-3 py-1 rounded">Edit</button>
                            <form action="{{ route('cart.destroy', $cart->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">Hapus</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</body>
</html>
