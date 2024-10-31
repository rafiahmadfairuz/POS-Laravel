<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Transaksi;

class DashboardController extends Controller
{
    public function index()
    {
        $penjualan = Transaksi::all();
        $labels = [];
        $data = [];

        foreach ($penjualan as $p) {
            $bulan = Carbon::parse($p['created_at'])->translatedFormat('l');
            $labels[] = $bulan;
            $data[] = $p['total']; 
        }
        return view('Dashboard.index')->with('labels', $labels)->with('data', $data);
    }
    
}