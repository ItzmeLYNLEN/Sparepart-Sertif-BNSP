@foreach ($barang as $item)
    <tr class=" {{$item->stok > 0 ? '' : 'table-secondary'}}">
        <td>
            <input type="radio" name="barang" class="form-check-input" id="{{$item->kode_barang}}" {{$item->stok > 0 ? '' : 'disabled'}}>
        </td>
        <td>{{ $item->kode_barang }}</td>
        <td>{{ $item->nama_barang }}</td>
        <td>{{ $item->kategori }}</td>
        <td>{{ $item->harga_jual }}</td>
        <td>{{ $item->harga_beli }}</td>
        <td>{{ $item->satuan }}</td>
        <td>{{ $item->stok }}</td>
    </tr>
@endforeach
