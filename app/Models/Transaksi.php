<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'transaksis';

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
    protected $fillable = [ 'userID', 'bankID', 'nomorTransaksi', 'tanggal', 'noResi', 'kurir', 'ongkir', 'total', 'totalHPP', 'status', 'namaPenerima', 'noHandphonePenerima', 'alamatPenerima'];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function detail()
    {
        return $this->hasMany(DetailTransaksi::class, 'transaksiID');
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bankID');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }
}
