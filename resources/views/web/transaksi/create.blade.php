@extends('web.layouts.app')

@section('content')
<section class="my-3" id="section-checkout">
    <div class="container">
      <div class="row">
        <!-- cart -->
        <div class="col-lg-8">
          <div class="card bg-white border shadow-0">
            <div class="m-4">
              <h4 class="card-title mb-4">Checkout</h4>
              <h6 class="card-title mb-3">
                Alamat Pengiriman
              </h6>
              <form id="alamat-form" class="row mb-4">
                <div class="col-12 col-md-6 mb-3">
                  <div class="form-group">
                    <label for="namaInput">Nama Penerima</label>
                    <input type="text" name="namaPenerima" class="form-control" id="namaInput" value="{{ auth()->user()->name }}" required>
                  </div>
                </div>
                 <div class="col-12 col-md-6 mb-3">
                  <div class="form-group">
                    <label for="noHandphone">Nomor HP</label>
                    <input type="text" name="noHandphonePenerima" class="form-control" id="noHandphone" required>
                  </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="alamatInput">Alamat</label>
                        <textarea class="form-control" name="alamatPenerima" id="alamatInput" rows="3" required></textarea>
                    </div>
                </div>
              </form>
              <h6 class="card-title mb-4">Detil belanja</h6>
              @php $totalHarga = 0; @endphp
              @foreach($keranjangs as $keranjang)
                @php 
                    $totalBerat = $keranjang->produk->berat * $keranjang->quantity;
                    $totalBerat = $totalBerat > 1000 ? $totalBerat/1000 . ' kg' : $totalBerat . ' gr';
                    $totalHarga += $keranjang->produk->harga_jual * $keranjang->quantity;
                @endphp
                <div class="row gy-3 mb-4">
                    <div class="col-lg-12">
                        <div class="d-flex">
                        <img src="{{ asset('storage/'. $keranjang->produk->gambar) }}" class="border rounded" style="width: 72px; height: 72px;">
                        <div class="ms-3">
                            <a href="#" class="nav-link">{{ $keranjang->produk->nama }}</a>
                            <small class="text-muted">{{ $keranjang->quantity}} barang ({{ $totalBerat }})</small>
                            <h6 class="mt-1 mb-0">Rp{{ number_format($keranjang->produk->harga_jual) }}</h6>
                        </div>
                        </div>
                    </div>
                </div>
              @endforeach
            </div>
  
          </div>
        </div>
        <!-- cart -->
        <!-- summary -->
        <div class="col-12 col-md-4 mt-3 mt-md-0">
          <div class="card bg-white shadow-0 border">
            <div class="card-body">
              <h5 class="card-title mb-3">
                Ringkasan belanja
              </h5>
              <div class="d-flex justify-content-between">
                <p class="mb-2">Total Harga</p>
                <p class="mb-2 fw-bold">Rp{{ number_format($totalHarga) }}</p>
              </div>
  
              <div class="mt-3">
                <button id="btn-choose-payment-method" class="btn btn-primary w-100 shadow-0 mb-2" > Pilih Pembayaran </button>
              </div>
            </div>
          </div>
        </div>
        <!-- summary -->
      </div>
    </div>
  </section>
  <div id="payment-method-modal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" tabindex="-1">
      <div class="modal-dialog">
          <div class="modal-content bg-white">
              <form method="POST" action="{{ route('transaksi.store') }}" class="modal-body">
                @csrf
                <div class="accordion" id="accordionBank">
                  <div class="card payment-method-group-card">
                    <div class="card-header pt-0" id="headingBank">
                      <h2 class="mb-0">
                        <button class="btn btn-accordion" type="button" data-toggle="collapse" data-target="#bank-transfer-card" aria-expanded="true" aria-controls="bank-transfer-card">
                          Bank Transfer
                        </button>
                      </h2>
                    </div>
                    <div id="data-form"></div>
                    <div id="bank-transfer-card" class="collapse show" aria-labelledby="headingBank" data-parent="#accordionBank">
                      <div class="card-body pt-0">
                        @foreach($banks as $bank)
                        <div class="card payment-method-card">
                          <input type="radio" name="bankID" value="{{ $bank->id }}" id="{{ $bank->namaBank }}" required {{ $loop->first ? 'checked' : ''}}>
                          <label for="{{ $bank->namaBank}}">
                            <img width="60" height="20" src="{{ asset('images/'. strtolower($bank->namaBank) . '.png')}}" alt="bank icon">
                          </label>
                        </div>
                        @endforeach
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                      <div class="d-flex mb-3">
                          <p class="summary-header">Total Harga</p>
                          <h5 class="summary-price">{{ number_format($totalHarga) }}</h5>
                      </div>
                      <div class="d-grid gap-2">
                        <button class="btn btn-primary">Lanjutkan</button>
                        <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Batalkan</button>
                      </div>
                  </div>
                </div>
              </div>
          </div>
      </div>
  </div>
@endsection
@push('script')
    <script type="module">
        document.getElementById('btn-choose-payment-method').addEventListener('click', (e) => {
            
            var formFilled = document.getElementById('alamat-form').reportValidity();
            if (formFilled) {
                var inputs = $("#alamat-form").serializeArray()
                $('#data-form').html('');
                inputs.forEach(function (input, index) {
                    $("<input>").attr({ 
                        name: input.name, 
                        type: "hidden", 
                        value: input.value 
                    }).appendTo("#data-form"); 
                })
                new bootstrap.Modal(document.getElementById('payment-method-modal')).show();
            }
        });
    </script>
@endpush
