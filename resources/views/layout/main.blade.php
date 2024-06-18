@extends('layout.app')

@section('body')
    <nav class="navbar navbar-expand-lg bg-white border-bottom">
        <div class="container w-100">
            <a class="navbar-brand" href="#">Sparepart</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link @yield('dashboard')" href="{{ route('dashboard') }}">Dashboard</a>
                    <a class="nav-link @yield('barang')" href="{{ route('barang') }}">Barang</a>
                    <a class="nav-link @yield('penjualan')" href="{{ route('penjualan') }}">Penjualan</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container py-3">
        @yield('content')
    </div>
@endsection
