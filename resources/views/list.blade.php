<!DOCTYPE html>
<html>
<head>
    <title>Daftar Obat</title>
</head>
<body>
    <h2>Daftar Obat</h2>
    <form action="{{ route('obat.search') }}" method="GET">
        <input type="text" name="query" placeholder="Cari obat...">
        <button type="submit">Cari</button>
    </form>
    <table border="1">
        <tr><th>Nama</th><th>Kategori</th><th>Harga</th></tr>
        @foreach($obat as $o)
            <tr>
                <td>{{ $o->nama }}</td>
                <td>{{ $o->kategori }}</td>
                <td>{{ $o->harga }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>
