<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index (Request $request)
    {
        $categories = Produk::distinct()->get(['kategori']);
        $products = Produk::inRandomOrder()
            ->when($request->exists('kategori'), function ($q) {
                return $q->where('kategori', request('kategori'));
            })
            ->when($request->exists('search'), function ($q) {
                $keyword = request('search');
                return $q->where('nama', 'LIKE', "%$keyword%")
                ->orWhere('deskripsi', 'LIKE', "%$keyword%");
            })
            ->paginate(8);
        return view('web.produk.index')->with(compact('categories', 'products'));
    }

    public function show(Produk $produk)
    {
        $randomProduk = Produk::inRandomOrder()
            ->where('id', '!=', $produk->id)
            ->limit(8)
            ->get();
        return view('web.produk.show')->with(compact('produk', 'randomProduk'));
    }
}
