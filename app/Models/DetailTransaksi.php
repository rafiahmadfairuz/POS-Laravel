<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;
    protected $fillable = ['transaksi_id', 'products_id', 'jumlah'];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
    public function produk()
    {
        return $this->belongsTo(Product::class, 'products_id');
    }

}
