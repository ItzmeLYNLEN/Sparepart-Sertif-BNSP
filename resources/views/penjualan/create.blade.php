@extends('layout.main')

@section('title', 'Create Penjualan')
@section('penjualan', 'active')

@section('content')
    <div class="header">
        <h5 class="m-0">Buat Data Penjualan</h5>
    </div>

    <div class="card card-body rounded-4 mt-3">
        <form action="" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <label for="no_faktur" class="form-label">No. Faktur</label>
                        <input type="text" class="form-control form-control-sm" value="{{ $no_faktur }}" readonly
                            id="no_faktur" name="no_faktur">
                        @error('no_faktur')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="tanggal_faktur" class="form-label">Tanggal Faktur</label>
                        <input type="date" class="form-control form-control-sm" value="{{ $tanggal }}"
                            id="tanggal_faktur" name="tanggal_faktur">
                        @error('tanggal_faktur')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <label for="nama_konsumen" class="form-label">Nama Konsumen</label>
                        <input type="text" class="form-control form-control-sm" value="{{ old('nama_konsumen') }}"
                            id="nama_konsumen" name="nama_konsumen">
                        @error('nama_konsumen')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <label for="kode_barang" class="form-label">Kode Barang</label>
                        <div class="row">
                            <div class="col-md-10">
                                <input type="text" class="form-control form-control-sm" readonly
                                    value="{{ old('kode_barang') }}" id="kode_barang" name="kode_barang">
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#cariBarang">Cari</button>
                            </div>
                        </div>
                        @error('kode_barang')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="nama_barang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control form-control-sm" readonly value="{{ old('nama_barang') }}"
                            id="nama_barang" name="nama_barang">
                        @error('nama_barang')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <label for="harga_satuan" class="form-label">Harga Satuan</label>
                        <input type="text" class="form-control form-control-sm" readonly
                            value="{{ old('harga_satuan') }}" id="harga_satuan" name="harga_satuan">
                        @error('harga_satuan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="number" class="form-control form-control-sm" data-max="{{old('stok')}}" value="{{ old('jumlah') }}"
                            id="jumlah" name="jumlah">
                        <input type="hidden" name="stok" id="stok">
                        @error('jumlah')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group mb-2">
                        <label for="harga_total" class="form-label">Harga Total</label>
                        <input type="text" class="form-control form-control-sm" readonly
                            value="{{ old('harga_total') }}" id="harga_total" name="harga_total">
                        @error('harga_total')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <hr>

            <div class="text-end">
                <button class="btn btn-sm btn-primary">Tambah</button>
            </div>
        </form>
    </div>

    <div class="modal fade" id="cariBarang" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="cariBarangLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="cariBarangLabel">Pencarian Barang</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="" id="searchBarang" method="post">
                        <input type="text" placeholder="Search barang" class="form-control" name="keyword">
                    </form>

                    <div class="table-responsive mt-3">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Harga Jual</th>
                                    <th>Harga Beli</th>
                                    <th>Satuan</th>
                                    <th>Stok</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-sm btn-primary save">Select</button>
                </div>
            </div>
        </div>
    </div>
@endsection
