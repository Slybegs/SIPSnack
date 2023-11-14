<?php

namespace App\Http\Controllers\Produk;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
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
            $produk = Produk::where('produkID', 'LIKE', "%$keyword%")
                ->orWhere('nama', 'LIKE', "%$keyword%")
                ->orWhere('kategori', 'LIKE', "%$keyword%")
                ->orWhere('deskripsi', 'LIKE', "%$keyword%")
                ->orWhere('expired', 'LIKE', "%$keyword%")
                ->orWhere('berat', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $produk = Produk::latest()->paginate($perPage);
        }

        return view('produk.produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('produk.produk.create');
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
        
        Produk::create($requestData);

        return redirect('produk/produk')->with('flash_message', 'Produk added!');
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
        $produk = Produk::findOrFail($id);

        return view('produk.produk.show', compact('produk'));
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
        $produk = Produk::findOrFail($id);

        return view('produk.produk.edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $produk = Produk::findOrFail($id);
        $produk->update($requestData);

        return redirect('produk/produk')->with('flash_message', 'Produk updated!');
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
        Produk::destroy($id);

        return redirect('produk/produk')->with('flash_message', 'Produk deleted!');
    }
}
