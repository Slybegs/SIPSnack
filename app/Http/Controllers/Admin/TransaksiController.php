<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $transaksi = Transaksi::where('produkID', 'LIKE', "%$keyword%")
                ->orWhere('nomorTransaksi', 'LIKE', "%$keyword%")
                ->orWhere('noResi', 'LIKE', "%$keyword%")
                ->orWhere('kurir', 'LIKE', "%$keyword%")
                ->orWhere('ongkir', 'LIKE', "%$keyword%")
                ->orWhere('total', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->orWhere('date', 'LIKE', "%$keyword%")
                ->orWhere('address', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $transaksi = Transaksi::latest()->paginate($perPage);
        }

        return view('transaksi.transaksi.index', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('transaksi.transaksi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Transaksi::create($requestData);

        return redirect('transaksi/transaksi')->with('flash_message', 'Transaksi added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        return view('transaksi.transaksi.show', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        return view('transaksi.transaksi.edit', compact('transaksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function confirmStatus(Request $request, $id)
    {
        
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update(['status' => 'Pengiriman']);

        return redirect('transaksi/transaksi')->with('flash_message', 'Status berhasil diperbarui!');
    }

    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update($requestData);
        print("LOL");

        return redirect('transaksi/transaksi')->with('flash_message', 'Transaksi updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Transaksi::destroy($id);

        return redirect('transaksi/transaksi')->with('flash_message', 'Transaksi deleted!');
    }
}
