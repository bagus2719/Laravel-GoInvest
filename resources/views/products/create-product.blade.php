@extends('layouts.app')

@section('title', 'Tambah Client | GoInvest')

@section('content')
<div class="content">
    <div class="title-info">
        <p>Tambah Data Products</p>
        <i class="fas fa-chart-bar"></i>
    </div>
    <form action="{{ route('products.store') }}" method="POST" class="form-tambah">
        @csrf
        <label for="kode_produk">Kode Produk</label>
        <input type="text" id="kode_produk" name="kode_produk" placeholder="Kode Produk" required>

        <label for="nama">Nama Produk</label>
        <input type="text" id="nama_produk" name="nama_produk" placeholder="Nama Produk" required>

        <label for="harga">Harga</label>
        <input type="number" id="harga" name="harga" placeholder="Harga" required>

        <label for="nama_penerbit">Nama Penerbit</label>
        <textarea id="nama_penerbit" name="nama_penerbit" placeholder="Nama Penerbit" required></textarea>

        <label for="status">Status</label>
        <select name="status" id="status">
            <option value="" disabled selected>PILIH STATUS</option>
            <option value="Aktif">Active</option>
            <option value="Closed">Closed</option>
        </select>

        <label for="deskripsi">Deskripsi</label>
        <textarea name="deskripsi" id="deskripsi" placeholder="Deskripsi" required></textarea>

        <button type="submit" class="btn-tmbh">Simpan</button>
    </form>
</div>
@endsection