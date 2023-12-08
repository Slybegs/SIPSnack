<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function show(Produk $produk)
    {
        return view('web.produk.show')->with(compact('produk'));
    }
}
