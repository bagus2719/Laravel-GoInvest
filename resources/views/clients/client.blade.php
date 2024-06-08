@extends('layouts.app')

@section('title', 'Clients | GoInvest')

@section('content')
<div class="content">
    <div class="title-info">
        <p>Data Clients</p>
        <i class="fas fa-chart-bar"></i>
    </div>
    <a href="{{ route('clients.create') }}"><button class="btn-tmbh">TAMBAH DATA</button></a>
    <table class="table-data">
        <thead>
            <tr>
                <th>No</th>
                <th>ID User</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>No. Telpon</th>
                <th>Alamat</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $client->id_user }}</td>
                <td>{{ $client->nama }}</td>
                <td>{{ $client->tanggal_lahir }}</td>
                <td>{{ $client->no_telp }}</td>
                <td>{{ $client->alamat }}</td>
                <td>
                    <a href="{{ route('clients.edit', $client->id_client) }}" class="btn-edit">Edit</a>
                    <form action="{{ route('clients.destroy', $client->id_client) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-hps">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection