@extends('layouts.app')

@section('title', 'Edit Client | GoInvest')

@section('content')
<div class="content">
    <div class="title-info">
        <p>Edit Data Clients</p>
        <i class="fas fa-chart-bar"></i>
    </div>
    <form action="{{ route('clients.update', $clients->id_client) }}" method="POST" class="form-tambah">
        @csrf
        @method('PUT')
        <label for="id_user">ID User</label>
        <select id="id_user" name="id_user" required>
            <option value="" disabled selected>PILIH ID USER</option>
            @foreach($users as $user)
                <option value="{{ old('id_user', $user->id_user) }}" {{ $clients->id_user == $user->id_user ? 'selected' : '' }}>
                    {{ $user->id_user }}
                </option>
            @endforeach
        </select>

        <label for="nama">Nama</label>
        <input type="text" id="nama" name="nama" value="{{ old('nama', $clients->nama) }}" required>

        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" id="tanggal_lahir" name="tanggal_lahir"
            value="{{ old('tanggal_lahir', $clients->tanggal_lahir) }}" required>
        <label for="no_telp">No. Telepon</label>
        <input type="text" id="no_telp" name="no_telp" value="{{ old('no_telp', $clients->no_telp) }}" required>

        <label for="alamat">Alamat</label>
        <textarea id="alamat" name="alamat" required>{{ old('alamat', $clients->alamat) }}</textarea>

        <button type="submit" class="btn-tmbh">Simpan</button>
    </form>
</div>
@endsection