<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class Transaksi extends Component
{
    public $search = '';
    public $produkDibeli = [];

    public function updatedSearch()
{
    $this->produkDibeli = Product::where('sku', 'LIKE', '%' . $this->search . '%')->get();
}
    public function render()
    {
        return view('livewire.transaksi', [
            'produkDibeli' => $this->produkDibeli,
        ]);
    }
}

