@extends('layout.main')

@section('title', 'Penjualan')
@section('penjualan', 'active')

@section('content')
<div class="col-md-2">
    <input type="text" id="searchInput" class="form-control mb-3" placeholder="Cari...">
</div>
    <div class="header">
        <div class="d-flex justify-content-between">
            <h5 class="m-0">Data Penjualan</h5>

            <a href="{{ route('create-penjualan') }}" class="btn btn-sm btn-primary">Tambah Data Penjualan</a>
        </div>
    </div>

    <hr>

    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>No. Faktur</th>
                    <th>Tgl Faktur</th>
                    <th>Nama Konsumen</th>
                    <th>Barang</th>
                    <th>Jumlah</th>
                    <th>Harga Satuan</th>
                    <th>Harga Total</th>
                    {{-- <th></th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($penjualan as $item)
                    <tr>
                        <td>{{ $item->no_faktur }}</td>
                        <td>{{ $item->tanggal_faktur }}</td>
                        <td>{{ $item->nama_konsumen }}</td>
                        <td>{{ $item->barang->nama_barang }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ $item->harga_satuan }}</td>
                        <td>{{ $item->harga_total }}</td>
                        {{-- <td class="text-end">   
                            <a href="{{ route('delete-barang', $item) }}" class="btn btn-sm btn-danger px-3">Delete</a>
                        </td> --}}
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
