@extends('layout.main')

@section('title', 'Barang')
@section('barang', 'active')

@section('content')
<div class="col-md-2">
    <input type="text" id="searchInput" class="form-control mb-3" placeholder="Cari...">
</div>
    <div class="header">
        <div class="d-flex justify-content-between">
            <h5 class="m-0">Data Barang</h5>

            <a href="{{ route('create-barang') }}" class="btn btn-sm btn-primary">Tambah Barang</a>
        </div>
    </div>

    <hr>

    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Harga Jual</th>
                    <th>Harga Beli</th>
                    <th>Satuan</th>
                    <th>Stok</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barang as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->kode_barang }}</td>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ $item->kategori }}</td>
                        <td>{{ $item->harga_jual }}</td>
                        <td>{{ $item->harga_beli }}</td>
                        <td>{{ $item->satuan }}</td>
                        <td>{{ $item->stok }}</td>
                        <td class="text-end">
                            <a href="{{ route('edit-barang', $item) }}" class="btn btn-sm btn-primary px-3">Ubah</a>
                            <a href="{{ route('delete-barang', $item) }}" class="btn btn-sm btn-danger px-3">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("searchInput").addEventListener("keyup", function() {
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("searchInput");
                filter = input.value.toUpperCase();
                table = document.querySelector("table");
                tr = table.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td");
                    for (var j = 0; j < td.length; j++) {
                        if (td[j]) {
                            txtValue = td[j].textContent || td[j].innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].style.display = "";
                                break;
                            } else {
                                tr[i].style.display = "none";
                            }
                        }
                    }
                }
            });
        });
    </script>
@endsection
