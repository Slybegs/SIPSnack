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
        return view('web.home')->with(compact('latestProduct'));
    }
}
