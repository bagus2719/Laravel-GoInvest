<!DOCTYPE html>
<html>

<head>
    <style>
    .kop-surat {
        text-align: center;
        font-family: Arial, sans-serif;
    }

    .kop-surat h2,
    .kop-surat h3 {
        margin: 0;
    }

    .kop-surat h2 {
        font-size: 20px;
    }

    .kop-surat h3 {
        font-size: 18px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table,
    th,
    td {
        border: 1px solid black;
    }

    th,
    td {
        padding: 8px;
        text-align: left;
        font-family: Arial, sans-serif;
    }
    </style>
</head>

<body>
    <div class="kop-surat">
        <h2>GO INVEST</h2>
        <h3>Jl. Merdeka No.123, Jember, Jawa Timur</h3>
        <p>Telepon: (021) 12345678 | Email: info@goinvest.com</p>
    </div>
    <hr />
    <center>
        <h3>Data Produk</h3>
    </center>
    <table>
        <tr>
            <th>No</th>
            <th>Kode Produk</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Penerbit</th>
            <th>Status</th>
            <th>Deskripsi</th>
        </tr>
        @foreach ($products as $index => $product)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $product->kode_produk }}</td>
            <td>{{ $product->nama_produk }}</td>
            <td>Rp. {{ number_format($product->harga) }}</td>
            <td>{{ $product->nama_penerbit }}</td>
            <td>{{ $product->status }}</td>
            <td>{{ $product->deskripsi }}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>