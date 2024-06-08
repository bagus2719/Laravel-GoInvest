@extends('layouts.app')

@section('title')
Dashboard | GoInvest
@endsection

@section('content')
<div class="content">
    <div class="home-content">
        <h1>Selamat Datang Admin</h1>
    </div>
    <div class="title-info">
        <p>Dashboard</p>
        <i class="fas fa-chart-bar"></i>
    </div>
    <div class="data-info">
        <div class="box">
            <i class="fas fa-user"></i>
            <div class="data">
                <p>User</p>
                <span>{{ $userCount }}</span>
            </div>
        </div>
        <div class="box">
            <i class="fas fa-pen"></i>
            <div class="data">
                <p>Clients</p>
                <span>{{ $clientCount }}</span>
            </div>
        </div>
        <div class="box">
            <i class="fas fa-table"></i>
            <div class="data">
                <p>Products</p>
                <span>{{ $productCount }}</span>
            </div>
        </div>
        <div class="box">
            <i class="fas fa-dollar"></i>
            <div class="data">
                <p>Pendapatan</p>
                <span>{{ number_format($income, 0, ',', '.') }}</span>
            </div>
        </div>
    </div>
</div>
@endsection