<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Obat</title>
</head>
<body>
    <h1>Detail Obat</h1>
    <p><strong>Nama:</strong> {{ $obat->nama }}</p>
    <p><strong>Kategori:</strong> {{ $obat->kategori }}</p>
    <p><strong>Stok:</strong> {{ $obat->stok }}</p>
    <p><strong>Harga:</strong> Rp{{ number_format($obat->harga, 2, ',', '.') }}</p>
    <p><strong>Deskripsi:</strong> {{ $obat->deskripsi }}</p>
    <a href="{{ url('/') }}">Kembali ke Daftar Obat</a>
</body>
</html>
