@extends('layouts.app')

@section('title', 'Edit Products | GoInvest')

@section('content')
<div class="content">
    <div class="title-info">
        <p>Edit Data Products</p>
        <i class="fas fa-chart-bar"></i>
    </div>

    <form action="{{ route('products.update', $products->id_product) }}" method="POST" class="form-tambah">
        @csrf
        @method('PUT')
        <label for="kode_produk">Kode Produk</label>
        <input type="text" id="kode_produk" name="kode_produk" placeholder="Kode Produk"
            value="{{ old('kode_produk', $products->kode_produk) }}" required>

        <label for="nama">Nama Produk</label>
        <input type="text" id="nama_produk" name="nama_produk" placeholder="Nama Produk"
            value="{{ old('nama_produk', $products->nama_produk) }}" required>

        <label for="harga">Harga</label>
        <input type="number" id="harga" name="harga" placeholder="Harga" value="{{ old('harga', $products->harga) }}"
            required>

        <label for="nama_penerbit">Nama Penerbit</label>
        <textarea id="nama_penerbit" name="nama_penerbit" placeholder="Nama Penerbit"
            required>{{ old('nama_penerbit', $products->nama_penerbit) }}</textarea>

        <label for="status">Status</label>
        <select name="status" id="status">
            <option value="" disabled {{ old('status', $products->status) === null ? 'selected' : '' }}>PILIH STATUS
            </option>
            <option value="Active" {{ old('status', $products->status) == 'Active' ? 'selected' : '' }}>Active</option>
            <option value="Closed" {{ old('status', $products->status) == 'Closed' ? 'selected' : '' }}>Closed</option>
        </select>

        <label for="deskripsi">Deskripsi</label>
        <textarea name="deskripsi" id="deskripsi" placeholder="Deskripsi"
            required>{{ old('deskripsi', $products->deskripsi) }}</textarea>

        <button type="submit" class="btn-tmbh">Simpan</button>
    </form>
</div>
@endsection