@extends('web.layouts.app')

@section('content')
<section class="my-3" id="section-checkout">
    <div class="container">
      <div class="row">
        <!-- cart -->

        <div class="col-8 mt-3 mt-md-0 mx-auto">
            <h4 class="mb-4">Detail Transaksi</h4>
            <div class="card bg-white border shadow-0 mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 d-flex align-items-center justify-content-between">
                            <p class="text-muted small"><i class="fa-regular fa-fw fa-calendar me-1"></i>{{ $transaksi->tanggal->format('d M Y') }}  |  {{ $transaksi->nomorTransaksi }}</p> 
                            <div class="status status-warning">
                                {{ $transaksi->status}}
                            </div>
                        </div>

                        @if ($transaksi->status === 'Menunggu Pembayaran')
                        <h6 class="mt-3 mb-0">Bayar ke</h6>
                        <div class="col-12 mt-2">
                            <div class="d-flex align-items-center">
                                <img width="60" height="20" class="me-2" src="{{ asset('images/'. strtolower($transaksi->bank->namaBank) . '.png')}}" alt="bank icon">
                                <div>
                                    <h6>{{ $transaksi->bank->noRek}}</h6>
                                    <p class="text-muted">{{ $transaksi->bank->namaRek }}</p>
                                </div>
                                <button class="btn btn-outline-dark ms-auto" >Copy</button>
                            </div>
                        </div>
                        <h6 class="mt-3 mb-0">Total Belanja</h6>
                        <div class="d-flex align-items-center">
                            <h5 style="color: #E25C5C">Rp {{number_format($transaksi->total)}}</h5>
                            <button class="btn btn-outline-dark ms-auto" >Copy</button>
                        </div>
                        @elseif ($transaksi->status == 'Menunggu Pengecekan')
                        <div class="px-3 my-3">
                            <div class="alert alert-warning">
                                <i class="fa fa-fw fa-warning"></i>
                                Kami sedang mengecek pembayaran anda
                            </div>
                        </div>
                        @endif
                        <h6 class="mb-3">Detail Produk</h6>
                        @foreach($transaksi->detail as $detail)
                        <div class="col-12 col-md-8">
                            <div class="d-flex">
                                <img src="{{ asset('storage/'. $detail->produk->gambar) }}" class="border rounded" style="width: 72px; height: 72px;">
                                <div class="ms-3">
                                    <p class="nav-link">{{ $detail->produk->nama }}</p>
                                    <small class="text-muted">{{ $detail->quantity}} barang X Rp{{ number_format($detail->produk->harga_jual) }}</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 d-flex align-items-end flex-column ">
                            <p class="text-muted small">Total Harga</p>
                            <h6>Rp {{ number_format($detail->subtotal) }}</h6>
                            <a href="{{ route('produk.show', ['produk' => $detail->produk->id])}}" class="btn btn-sm text-primary mt-auto">Lihat Produk</a>
                        </div>
                        @endforeach
                        {{-- <h6 class="my-3">Info Pengiriman</h6>
                        <div class="col-12">
                        </div> --}}

                        @if ($transaksi->status === 'Menunggu Pembayaran')
                        <div class="col-12 mt-3 d-flex">
                            <form method="POST" action="{{ route('transaksi.confirmPayment', ['transaksi' => $transaksi->id ])}}">
                                @csrf
                                <button class="btn btn-primary">Konfirmasi Pembayaran</button>
                            </form>
                            <form method="POST" action="{{ route('transaksi.cancel', ['transaksi' => $transaksi->id ])}}">
                                @csrf
                                <button class="btn btn-outline-danger ms-1">Batal</button>
                            </form>
                        </div>
                        @else
                            <h6 class="my-3">Rincian Pembayaran</h6>
                            <div class="d-flex justify-content-between">
                                <p class="text-muted">Metode Pembayaran</p>
                                <img width="60" height="20" class="me-2" src="{{ asset('images/'. strtolower($transaksi->bank->namaBank) . '.png')}}" alt="bank icon">
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <p class="text-muted">Total Belanja</p>
                                <h6>Rp {{number_format($transaksi->total)}}</h6>  
                            </div>
                        @endif
                    </div>
                </div>
    
            </div>
        </div>
        <!-- cart -->
        <!-- summary -->
        <!-- summary -->
      </div>
    </div>
  </section>
  @endsection
