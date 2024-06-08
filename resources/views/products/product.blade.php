@extends('layouts.app')
@section('title', 'Products | GoInvest')

@section('content')
<div class="content">
    <div class="title-info">
        <p>Data Products</p>
        <i class="fas fa-chart-bar"></i>
    </div>
    <a href="{{ route('products.create') }}"><button class="btn-tmbh">
            TAMBAH DATA
        </button></a>
    <a href="{{ route('products.index') }}"><button class="btn-cetak">
            CETAK DATA
        </button></a>
    <table class="table-data">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Produk</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Penerbit</th>
                <th>Status</th>
                <th>Deskripsi</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $index => $product)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $product->kode_produk }}</td>
                    <td>{{ $product->nama_produk }}</td>
                    <td>{{ $product->harga }}</td>
                    <td>{{ $product->nama_penerbit }}</td>
                    <td>{{ $product->status }}</td>
                    <td>{{ $product->deskripsi }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product->id_product) }}" class="btn-edit">Edit</a>
                        <form action="{{ route('products.destroy', $product->id_product) }}" method="POST"
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