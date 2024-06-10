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
        <h3>Data Clients</h3>
    </center>
    <table>
        <tr>
            <th>No</th>
            <th>ID User</th>
            <th>Nama</th>
            <th>Tanggal Lahir</th>
            <th>No. Telpon</th>
            <th>Alamat</th>
        </tr>
        @foreach($clients as $client)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $client->id_user }}</td>
                <td>{{ $client->nama }}</td>
                <td>{{ $client->tanggal_lahir }}</td>
                <td>{{ $client->no_telp }}</td>
                <td>{{ $client->alamat }}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>