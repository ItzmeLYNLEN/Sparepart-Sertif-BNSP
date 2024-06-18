<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Penjualan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualan = Penjualan::orderByDesc('created_at')->get();

        return view('penjualan.index', compact('penjualan'));
    }

    public function create()
    {
        $startOfDay = Carbon::now('Asia/Jakarta')->startOfDay();
        $endOfDay = Carbon::now('Asia/Jakarta')->endOfDay();
        $tanggal = Carbon::now('Asia/Jakarta')->format('Y-m-d');

        $penjualan = Penjualan::whereBetween('created_at', [$startOfDay, $endOfDay]);

        if ($penjualan->count() < 1) {
            $no_faktur = Carbon::now('Asia/Jakarta')->format('Ymd') . '-' . sprintf('%04d', 1);
        } else {
            $penjualanTerakhir = $penjualan->latest()->first();

            $no_faktur = Carbon::now('Asia/Jakarta')->format('Ymd') . '-' . sprintf('%04d', (explode('-', $penjualanTerakhir->no_faktur)[1] + 1));
        }

        return view('penjualan.create', compact('no_faktur', 'tanggal'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'no_faktur' => 'required',
            'tanggal_faktur' => 'required',
            'nama_konsumen' => 'required',
            'kode_barang' => 'required',
            'jumlah' => 'required|numeric|min:1',
            'harga_satuan' => 'required',
            'harga_total' => 'required',
        ]);

        if ($validate) {
            Penjualan::create($validate);

            $barang = Barang::find($request->kode_barang);

            $barang->stok = $barang->stok - $request->jumlah;

            $barang->save();

            return Redirect::route('penjualan')->with('inputSuccess', 'success');
        }
    }
}
