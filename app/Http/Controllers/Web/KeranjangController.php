<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Keranjang;

class KeranjangController extends Controller
{
    public function index(Request $request)
    {
        $keranjangs = Keranjang::where('userID', auth()->id())->get();
        return view('web.keranjang.index')->with(compact('keranjangs'));
    }

    public function store(Request $request)
    {
        $requestData = $request->all();

        $keranjang = Keranjang::firstOrNew([
            'userID' => auth()->id(),
            'produkID' => $requestData['produkID']
        ]);
        $keranjang->quantity = $keranjang->quantity + $requestData['quantity'];
        $keranjang->save();
        session()->flash('success', 'Snack ditambahkan ke keranjang');
        return redirect()->back();
    }

    public function update(Request $request, Keranjang $keranjang)
    {
        $requestData = $request->only('quantity', 'deskripsi');
        if ($requestData['quantity'] > 0) {
            $keranjang->fill($requestData);
            $keranjang->save();
        }
    }

    public function destroy($id)
    {
        Keranjang::destroy($id);

        return redirect()->back()->with('flash_message', 'Bank deleted!');
    }
}
