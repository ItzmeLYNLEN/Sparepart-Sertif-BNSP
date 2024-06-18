<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;

class BarangController extends Controller
{
    public function index(){
        $barang = Barang::all();

        return view('barang.index', compact('barang'));
    }

    public function create(){
        return view('barang.create');
    }

    public function store(Request $request){
        $validate = $request->validate([
            'kode_barang' => 'required|unique:barang',
            'nama_barang' => 'required',
            'harga_jual' => 'required',
            'harga_beli' => 'required',
            'satuan' => 'required',
            'stok' => 'required',
            'kategori' => 'required',
        ]);

        if($validate){
            Barang::create($validate);

            return Redirect::route('barang')->with('inputSuccess', 'success');
        }
    }

    public function edit(Barang $barang){
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, Barang $barang){
        $validate = $request->validate([
            'kode_barang' => 'required|unique:barang,kode_barang,'.$barang->kode_barang. ',kode_barang',
            'nama_barang' => 'required',
            'harga_jual' => 'required',
            'harga_beli' => 'required',
            'satuan' => 'required',
            'stok' => 'required',
            'kategori' => 'required',
        ]);

        if ($validate){
            $barang->update($validate);

            return Redirect::route('barang')->with('updateSuccess', 'success');
        }
    }

    public function delete(Barang $barang){
        $barang->delete();

        return Redirect::route('barang')->with('deleteSuccess', 'success');
    }

    public function search(Request $request){
        $barang = Barang::where('nama_barang', 'LIKE', "%$request->keyword%")->orderBy('stok', 'desc')->orderBy('kode_barang', 'asc')->get();

        return view('barang.result', compact('barang'));
    }
}
