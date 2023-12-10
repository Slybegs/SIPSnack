<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;

class HomeController extends Controller
{
    public function index()
    {
        $latestProduct = Produk::latest()->limit(3)->get();
        $popularProduct = Produk::leftJoin('detail_transaksis','produks.id','=','detail_transaksis.produkID')
            ->selectRaw('produks.id, produks.nama, produks.gambar, produks.harga_jual, COALESCE(sum(detail_transaksis.quantity),0) total')
            ->groupByRaw('produks.id, produks.nama, produks.gambar, produks.harga_jual')
            ->orderBy('total','desc')
            ->take(8)
            ->get();
        $categories = Produk::distinct()->get(['kategori']);
        return view('web.home')->with(compact('latestProduct', 'categories', 'popularProduct'));
    }
}
