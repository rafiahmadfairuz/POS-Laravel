<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\DetailTransaksi;
use App\Models\Transaksi as ModelTransaksi;

class Transaksi extends Component
{
    public $cari, $total, $bayar, $kembalian, $totalSemuaBelanja;
    public $transaksiAktif;

    public function transaksiBaru()
    {
        $this->reset();

        $this->transaksiAktif = new ModelTransaksi();
        $this->transaksiAktif->resi = 'INV/' . date('YmdHis');
        $this->transaksiAktif->total = 0;
        $this->transaksiAktif->status = 'pending';
        $this->transaksiAktif->save();
    }

    public function batalTransaksi()
    {

        if ($this->transaksiAktif) {
            $detilTransaksi = DetailTransaksi::where('transaksi_id', $this->transaksiAktif->id)->get();
            foreach ($detilTransaksi as $detail) {
                $produk = Product::find($detail->products_id);
                $produk->initial_quantity += $detail->jumlah;
                $produk->save();
                $detail->delete();
            }
            $this->transaksiAktif->delete();
        }
        $this->reset();
    }

    public function updateCari()
    {
        $produk = Product::where('sku', $this->cari)->first();
        if ($produk && $produk->initial_quantity > 0) {
            $detil = DetailTransaksi::firstOrNew([
                'transaksi_id' => $this->transaksiAktif->id,
                'products_id' => $produk->id,
            ], [
                'jumlah' => 0,
            ]);
            $detil->jumlah += 1;
            $detil->save();
            $produk->initial_quantity -= 1;
            $produk->save();
            $this->reset('cari');
        }
    }

    public function updatedBayar()
    {
        if($this->bayar > 0){
           $this->kembalian = $this->bayar - $this->totalSemuaBelanja;
        }
    }

    public function hapusSatuProduk($id){
       $produkHapus = DetailTransaksi::find($id);
       if($produkHapus) {
        $produk = Product::find($produkHapus->products_id);
        $produk->initial_quantity += $produkHapus->jumlah;
        $produk->save();
       }
       $produkHapus->delete();
    }


    public function selesaikanPembayaran()
    {
        $this->transaksiAktif->total = $this->totalSemuaBelanja;
        $this->transaksiAktif->status = 'selesai';
        $this->transaksiAktif->save();
        $this->reset();
    }

    public function render()
    {
        if ($this->transaksiAktif) {
            $dataLaporan = [];
            $produkTransaksi = DetailTransaksi::where('transaksi_id', $this->transaksiAktif->id)->get();
            $this->totalSemuaBelanja = $produkTransaksi->sum(function ($detil) {
                return $detil->produk->purchase_price * $detil->jumlah;
            });
        } else {
            $dataLaporan = ModelTransaksi::where('status', 'selesai')->get();
            $produkTransaksi = [];
        }
        return view('livewire.transaksi', compact('produkTransaksi', 'dataLaporan'));
    }
}

