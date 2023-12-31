<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'produks';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['kode', 'nama', 'kategori', 'harga_beli', 'harga_jual', 'deskripsi', 'expired', 'berat'];

    public function detail()
    {
        return $this->hasMany(DetailTransaksi::class, 'produkID');
    }

    public function totalTerjual()
    {
        return $this->detail()->sum('quantity');
    }
}
