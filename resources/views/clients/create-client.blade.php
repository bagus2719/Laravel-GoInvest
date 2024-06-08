@extends('layouts.app')

@section('title', 'Tambah Client | GoInvest')

@section('content')
<div class="content">
    <div class="title-info">
        <p>Tambah Data Clients</p>
        <i class="fas fa-chart-bar"></i>
    </div>
    <form action="{{ route('clients.store') }}" method="POST" class="form-tambah">
        @csrf
        <label for="id_user">ID User</label>
        <select id="id_user" name="id_user" required>
            <option value="" disabled selected>PILIH ID USER</option>
            @foreach($users as $user)
            <option value="{{ $user->id_user }}">{{ $user->id_user }}</option>
            @endforeach
        </select>

        <label for="nama">Nama</label>
        <input type="text" id="nama" name="nama" placeholder="Nama" required>

        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" required>

        <label for="no_telp">No. Telepon</label>
        <input type="text" id="no_telp" name="no_telp" placeholder="Nomor Telepon" required>

        <label for="alamat">Alamat</label>
        <textarea id="alamat" name="alamat" placeholder="Alamat" required></textarea>

        <button type="submit" class="btn-tmbh">Simpan</button>
    </form>
</div>
@endsection