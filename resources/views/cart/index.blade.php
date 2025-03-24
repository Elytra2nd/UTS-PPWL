<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Obat</title>
</head>
<body>

    <h2>Tambah Obat ke Keranjang</h2>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('cart.store') }}" method="POST">
        @csrf
        <label for="obat_id">Pilih Obat:</label>
        <select name="obat_id" id="obat_id">
            @foreach($obats as $obat)
                <option value="{{ $obat->id }}">{{ $obat->nama }} - Rp {{ number_format($obat->harga, 0, ',', '.') }}</option>
            @endforeach
        </select>
        <br><br>

        <label for="jumlah">Jumlah:</label>
        <input type="number" name="jumlah" id="jumlah" required min="1">
        <br><br>

        <button type="submit">Tambah ke Keranjang</button>
    </form>

    <h2>Isi Keranjang</h2>

    @if($carts->isEmpty())
        <p>Keranjang kosong.</p>
    @else
        <table border="1">
            <thead>
                <tr>
                    <th>Nama Obat</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($carts as $cart)
                <tr>
                    <td>{{ $cart->obat->nama }}</td>
                    <td>Rp {{ number_format($cart->obat->harga, 0, ',', '.') }}</td>
                    <td>
                        <form action="{{ route('cart.update', $cart->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="number" name="jumlah" value="{{ $cart->jumlah }}" min="1">
                            <button type="submit">Update</button>
                        </form>
                    </td>
                    <td>Rp {{ number_format($cart->total_harga, 0, ',', '.') }}</td>
                    <td>
                        <form action="{{ route('cart.destroy', $cart->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

</body>
</html>
