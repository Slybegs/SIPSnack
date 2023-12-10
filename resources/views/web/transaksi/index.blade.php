@extends('web.layouts.app')

@section('content')
<section class="my-3" id="section-checkout">
    <div class="container">
      <div class="row">
        <!-- cart -->

        <div class="col-12 col-md-4">
            <div class="card bg-white shadow-0 border">
              <div class="card-body">
                <h5 class="card-title mb-3">
                  Hi, {{ auth()->user()->name }}
                </h5>
                <ul class="list-group bg-white">
                    <li class="list-group-item bg-white border-0"><i class="fa-regular fa-fw fa-envelope me-2"></i>{{ auth()->user()->email }} </li>
                    
                </ul>
    
                <div class="mt-3">
                  <button type="button" id="btn-choose-payment-method" class="btn btn-primary w-100 shadow-0 mb-2" onclick="new bootstrap.Modal(document.getElementById('profile-modal')).show();"> Edit Profile </button>
                </div>
              </div>
            </div>
          </div>
        <div class="col-lg-8 mt-3 mt-md-0">
            <h4 class="mb-4">Daftar Transaksi</h4>
            @foreach($transaksis as $transaksi)
            @php 
                $detail = $transaksi->detail()->first();
                $produk = $detail->produk;
                $count = $transaksi->detail()->count();
            @endphp
            <div class="card bg-white border shadow-0 mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 d-flex align-items-center justify-content-between">
                            <p class="text-muted small"><i class="fa-regular fa-fw fa-calendar me-1"></i>{{ $transaksi->tanggal->format('d M Y') }}  |  {{ $transaksi->nomorTransaksi }}</p> 
                            @include('web.layouts.status', ['status' => $transaksi->status])
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="d-flex">
                                <img src="{{ asset('storage/'. $produk->gambar) }}" class="border rounded" style="width: 72px; height: 72px;">
                                <div class="ms-3">
                                    <a href="#" class="nav-link">{{ $produk->nama }}</a>
                                    <small class="text-muted">{{ $detail->quantity}} barang X Rp{{ number_format($produk->harga_jual) }}</small>
                                    @if ($count > 1)
                                        <p class="small text-muted mt-2">+ {{ $count - 1}} produk lainnya</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 d-flex align-items-end flex-column ">
                            <p class="text-muted small mt-auto">Total Belanja</p>
                            <h6>Rp {{ number_format($transaksi->total) }}
                        </div>
                        <div class="col-12 d-flex mt-3">
                            <a href="{{ route('transaksi.show', ['transaksi' => $transaksi->id ])}}" class="btn btn-sm text-primary">Lihat Detail Transaksi</a>
                        </div>
                            
                    </div>
                </div>
    
            </div>
            @endforeach
        </div>
        <!-- cart -->
        <!-- summary -->
        <!-- summary -->
      </div>
    </div>
  </section>
  <div id="profile-modal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content bg-white">
            <form method="POST" action="{{ route('profile.update') }}" class="modal-body">
                {{ method_field('PATCH') }}
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="inputNama" class="form-label">Nama</label>
                            <input type="text" name="name" value="{{ auth()->user()->name }}" class="form-control" id="inputNama" aria-describedby="NamaHelp" disable>
                        </div>
                        <div class="mb-3">
                            <label for="inputEmail" class="form-label">Email</label>
                            <input type="email" value="{{ auth()->user()->email }}" class="form-control" id="inputEmail" aria-describedby="emailHelp" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="inputPassword" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="inputPassword" aria-describedby="passwordHelp">
                            <div id="passwordHelp" class="form-text">Isi jika ingin mengubah password</div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-grid gap-2">
                          <button class="btn btn-primary">Ubah Profile</button>
                          <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Batalkan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
  @endsection
