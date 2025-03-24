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
    <ul>
        @foreach($carts as $cart)
            <li>{{ $cart->obat->nama }} - {{ $cart->jumlah }} pcs - Rp {{ number_format($cart->total_harga, 0, ',', '.') }}</li>
        @endforeach
    </ul>
</body>
</html>
