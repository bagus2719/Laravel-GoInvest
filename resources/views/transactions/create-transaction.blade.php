@extends('layouts.app')

@section('title', 'Tambah Client | GoInvest')

@section('content')
<div class="content">
    <div class="title-info">
        <p>Tambah Data Transactions</p>
        <i class="fas fa-chart-bar"></i>
    </div>
    <form action="{{ route('transactions.store') }}" method="POST" class="form-tambah">
        @csrf
        <label for="id_client">ID Client</label>
        <select id="id_client" name="id_client" required>
            <option value="" disabled selected>PILIH ID CLIENT</option>
            @foreach($clients as $client)
            <option value="{{ $client->id_client }}">{{ $client->id_client }}</option>
            @endforeach
        </select>

        <label for="id_product">ID Product</label>
        <select id="id_product" name="id_product" required>
            <option value="" disabled selected>PILIH ID PRODUCT</option>
            @foreach($products as $product)
            <option value="{{ $product->id_product }}">{{ $product->id_product }}</option>
            @endforeach
        </select>

        <label for="tgl_transaksi">Tanggal Transaksi</label>
        <input type="date" id="tgl_transaksi" name="tgl_transaksi" placeholder="Tanggal Transaksi" required>

        <label for="jumlah">Jumlah</label>
        <input type="number" id="jumlah" name="jumlah" placeholder="Jumlah" required>

        <label for="status">Status</label>
        <select name="status" id="status">
            <option value="" disabled selected>PILIH STATUS</option>
            <option value="Jual">Jual</option>
            <option value="Beli">Beli</option>
        </select>

        <button type="submit" class="btn-tmbh">Simpan</button>
    </form>
</div>
@endsection