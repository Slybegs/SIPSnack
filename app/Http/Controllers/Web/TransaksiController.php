<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Keranjang;
use App\Models\Bank;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::where('userID', auth()->id())->get();
        return view('web.transaksi.index')->with(compact('transaksis'));
    }
    
    public function create(Request $request)
    {
        $keranjangs = Keranjang::where('userID', auth()->id())->get();
        $banks = Bank::all();
        return view('web.transaksi.create')->with(compact('keranjangs', 'banks'));
    }

    public function store(Request $request)
    {
        $requestData = $request->all();
        $transaksi = new Transaksi();
        $transaksi->fill($requestData);
        $transaksi->userID = auth()->id();
        $transaksi->tanggal = now();
        $transaksi->status = 'Menunggu Pembayaran';
        $transaksi->save();
        $transaksi->nomorTransaksi = 'SS'. str_pad($transaksi->id, 5, '0', STR_PAD_LEFT);

        $keranjangs = Keranjang::where('userID', auth()->id())->get();
        $totalHarga = 0;
        $totalHPP = 0;
        foreach ($keranjangs as $keranjang) {
            $subtotal = $keranjang->produk->harga_jual * $keranjang->quantity;
            $subtotalHPP = $keranjang->produk->harga_beli * $keranjang->quantity;
            $detail = new DetailTransaksi();
            $detail->transaksiID = $transaksi->id;
            $detail->produkID = $keranjang->produkID;
            $detail->quantity = $keranjang->quantity;
            $detail->harga_jual = $keranjang->produk->harga_jual;
            $detail->harga_beli = $keranjang->produk->harga_beli;
            $detail->subtotal = $subtotal;
            $detail->subtotal_hpp = $subtotalHPP;
            $detail->save();

            $totalHarga += $subtotal;
            $totalHPP += $subtotalHPP;
            $keranjang->delete();
        }
        $transaksi->total = $totalHarga;
        $transaksi->totalHPP = $totalHPP;
        $transaksi->save();

        session()->flash('success', 'Transaksi berhasil dibuat');
        return redirect()->route('home');
    }
    
    public function show(Request $request, Transaksi $transaksi)
    {
        return view('web.transaksi.show')->with(compact('transaksi'));
    }

    public function confirmPayment(Request $request, Transaksi $transaksi)
    {
        $transaksi->status = 'Menunggu Pengecekan';
        $transaksi->save();

        session()->flash('success', 'Terima kasih! kami akan segera mengecek pembayaran dan melakukan pengiriman');
        return redirect()->route('transaksi.show', ['transaksi' => $transaksi]);
    }

    public function cancel(Request $request, Transaksi $transaksi)
    {
        $transaksi->status = 'Batal';
        $transaksi->save();

        session()->flash('success', 'Transaksi berhasil dibatalkan');
        return redirect()->route('transaksi.show', ['transaksi' => $transaksi]);
    }

    public function confirmDelivery(Request $request, Transaksi $transaksi)
    {
        $transaksi->status = 'Selesai';
        $transaksi->save();

        session()->flash('success', 'Terima kasih sudah berbelanja di SIPSnack');
        return redirect()->route('transaksi.show', ['transaksi' => $transaksi]);

    }
}
