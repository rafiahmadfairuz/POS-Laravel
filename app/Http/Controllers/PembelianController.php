<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    public function index()
    {
        $historiPembelian = Transaksi::all();
        return view('Purcashes.view', compact('historiPembelian'));
    }
    public function transaksiBaru()
    {
        $produkTerpilih = [];
        return view('Purcashes.new', compact('produkTerpilih'));
    }
    public function cariProduk(Request $request)
    {
        $sku = $request->sku;
        $produkTerpilih = Product::where('sku', 'LIKE' , '%'.$sku.'%')->get();
        return view('Purcashes.new', compact('produkTerpilih'));
    }
}
