<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Obat</title>
</head>
<body>
    <h1>Daftar Obat</h1>
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Stok</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
        @foreach ($obat as $o)
        <tr>
            <td>{{ $o->nama }}</td>
            <td>{{ $o->kategori }}</td>
            <td>{{ $o->stok }}</td>
            <td>Rp{{ number_format($o->harga, 2, ',', '.') }}</td>
            <td><a href="{{ route('obat.show', $o->id) }}">Lihat Detail</a></td>
        </tr>
        @endforeach
    </table>
</body>
</html>
