@extends('layout.main')

@section('title', 'Edit Barang')
@section('barang', 'active')

@section('content')
    <div class="header">
        <h5 class="m-0">Edit Data Barang</h5>
    </div>

    <div class="card card-body rounded-4 mt-3">
        <form action="" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <label for="kode_barang" class="form-label">Kode Barang</label>
                        <input type="text" class="form-control form-control-sm" value="{{$barang->kode_barang}}" id="kode_barang" name="kode_barang">
                        @error('kode_barang')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="nama_barang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control form-control-sm" value="{{$barang->nama_barang}}" id="nama_barang" name="nama_barang">
                        @error('nama_barang')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="harga_jual" class="form-label">Harga Jual</label>
                        <input type="number" class="form-control form-control-sm" value="{{$barang->harga_jual}}" id="harga_jual" name="harga_jual">
                        @error('harga_jual')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="harga_beli" class="form-label">Harga Beli</label>
                        <input type="number" class="form-control form-control-sm" value="{{$barang->harga_beli}}" id="harga_beli" name="harga_beli">
                        @error('harga_beli')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <label for="satuan" class="form-label">Satuan</label>
                        <input type="text" class="form-control form-control-sm" value="{{$barang->satuan}}" id="satuan" name="satuan">
                        @error('satuan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="number" class="form-control form-control-sm" value="{{$barang->stok}}" id="stok" name="stok">
                        @error('stok')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="kategori" class="form-label">Kategori</label>
                        <input type="text" class="form-control form-control-sm" value="{{$barang->kategori}}" id="kategori" name="kategori">
                        @error('kategori')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <hr>

            <div class="text-end">
                <button class="btn btn-md btn-success">Ubah</button>
            </div>
        </form>
    </div>
@endsection
