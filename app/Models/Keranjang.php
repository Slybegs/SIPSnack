<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;

    protected $fillable = ['userID', 'produkID', 'quantity', 'deskripsi'];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produkID');
    }
}
