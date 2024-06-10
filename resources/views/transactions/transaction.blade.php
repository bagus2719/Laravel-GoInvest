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
                <th>ID Client</th>
                <th>ID Produk</th>
                <th>Tangga Transaksi</th>
                <th>Jumlah</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $transaction->id_client }}</td>
                <td>{{ $transaction->id_product }}</td>
                <td>{{ $transaction->tgl_transaksi }}</td>
                <td>{{ $transaction->jumlah }}</td>
                <td>{{ $transaction->status }}</td>
                <td>
                    <a href="{{ route('transactions.edit', $transaction->id_transaksi) }}" class="btn-edit">Edit</a>
                    <form action="{{ route('transactions.destroy', $transaction->id_transaksi) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-hps"
                            onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection