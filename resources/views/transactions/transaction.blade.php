@extends('layouts.app')

@section('title', 'Transaction | GoInvest')

@section('content')
<div class="content">
    <div class="title-info">
        <p>Transaksi</p>
        <i class="fas fa-chart-bar"></i>
    </div>
    <a href="{{ route('transactions.create') }}"><button class="btn-tmbh">TAMBAH DATA</button></a>
    <a href="{{ route('transactions.index') }}"><button class="btn-cetak">CETAK DATA</button></a>
    <table class="table-data">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>ID</th>
                <th>Nama</th>
                <th>Assets</th>
                <th>Jumlah</th>
                <th>Status</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $transaction->tgl_transaksi->format('d M Y') }}</td>
                <td>{{ $transaction->id_transaksi }}</td>
                <td>{{ $transaction->client->nama }}</td>
                <td>{{ $transaction->product->nama_produk }}</td>
                <td>{{ $transaction->jumlah }}</td>
                <td>
                    <p class="{{ strtolower($transaction->status) }}">
                        {{ ucfirst($transaction->status) }}
                    </p>
                </td>
                <td>
                    <a href="{{ route('transactions.show', $transaction->id_transaksi) }}" class="btn_detail">Detail</a>
                    <a href="{{ route('transactions.edit', $transaction->id_transaksi) }}" class="btn_detail">Edit</a>
                    <form action="{{ route('transactions.destroy', $transaction->id_transaksi) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn_detail"
                            onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection