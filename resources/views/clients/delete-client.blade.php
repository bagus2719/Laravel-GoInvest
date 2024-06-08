@extends('layouts.app')

@section('title', 'Delete Client | GoInvest')

@section('content')
<div class="content">
    <div class="title-info">
        <p>Delete Clients</p>
        <i class="fas fa-chart-bar"></i>
    </div>

    <form action="{{ route('clients.destroy', $client->id_client) }}" method="POST" class="form-delete">
        @csrf
        @method('DELETE')
        <h4>Apakah Anda Yakin Ingin Menghapus Data?</h4>
        <input type="hidden" name="id_client" value="{{ $client->id_client }}">
        <button type="submit" class="btn-hps">Yes</button>
        <a href="{{ route('clients.index') }}" class="btn-hps">No</a>
    </form>
</div>
@endsection