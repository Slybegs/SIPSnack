<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $totalTransaksi = Transaksi::count();
        $totalUser = User::count();
        return view('admin.home')->with(compact('totalTransaksi', 'totalUser'));
    }
}
