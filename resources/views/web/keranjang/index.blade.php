@extends('web.layouts.app')

@section('content')
<section class="my-3">
    <div class="container">
      <div class="row">
        <!-- cart -->
        <div class="col-lg-8">
          <div class="card border bg-white shadow-0">
            <div class="m-4">
              <h4 class="card-title mb-4">Your shopping cart</h4>
              @forelse($keranjangs as $keranjang)
              <div class="row gy-3 cart-data @if (!$loop->last) mb-4 border-bottom @endif" data-keranjang-id="{{ $keranjang->id }}" data-harga="{{ $keranjang->produk->harga_jual + 0}}">
                <div class="col-lg-12">
                    <div class="d-flex">
                      <img src="{{ asset('storage/'.$keranjang->produk->gambar) }}" class="border rounded" style="width: 72px; height: 72px;">
                      <div class="ms-3">
                        <a href="{{ route('produk.show', ['produk' => $keranjang->produk->id ]) }}" class="nav-link mb-1">{{ $keranjang->produk->nama }}</a>
                        <text class="h6">Rp{{ number_format($keranjang->produk->harga_jual) }}</text>
                      </div>
                    </div>
                </div>
                <div class="col-12 d-flex flex-column flex-md-row justify-content-end align-items-start mt-2 mb-2">
                    <input type="text" name="deskripsi" value="{{ $keranjang->deskripsi }}" class="form-control me-auto mb-3 mb-md-0" placeholder="Catatan" style="width: 200px;">
                    <form method="POST" action="{{ route('keranjang.destroy', ['keranjang' => $keranjang->id]) }}">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-outline-danger me-2 mb-3 mb-md-0\" title="Delete Produk" onclick="return confirm('confim delete ?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                    </form>
                    <div class="input-group mb-3" style="width: 170px;">
                        <button class="btn btn-minus btn-white border border-secondary px-3" type="button" id="button-addon1" data-mdb-ripple-color="dark">
                            <i class="fas fa-minus"></i>
                        </button>
                        <input type="tel" name="quantity" class="form-control text-center border border-secondary" value="{{ $keranjang->quantity }}" aria-label="Example text with button addon" aria-describedby="button-addon1">
                        <button class="btn btn-plus btn-white border border-secondary px-3" type="button" id="button-addon2" data-mdb-ripple-color="dark">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
              </div>
              @empty
                <p class="text-muted text-center">Tidak ada belanjaan</p>
              @endforelse
            </div>
  
          </div>
        </div>
        <!-- cart -->
        <!-- summary -->
        <div class="col-lg-4">
          <div class="card shadow-0 border bg-white">
            <div class="card-body">
              <h5 class="card-title mb-3">
                Ringkasan belanja
              </h5>
              <!-- <div class="d-flex justify-content-between">
                <p class="mb-2">Total price:</p>
                <p class="mb-2">$329.00</p>
              </div>
              <hr> -->
              <div class="d-flex justify-content-between">
                <p class="mb-2">Total Harga</p>
                <p class="mb-2 fw-bold">Rp<span class="total-price"></span></p>
              </div>
  
              <div class="mt-3">
                @if (count($keranjangs) > 0)
                  <a href="{{ route('transaksi.create') }}" class="btn btn-primary w-100 shadow-0 mb-2" disabled> Beli </a>
                @else
                  <button class="btn btn-primary w-100 shadow-0 mb-2" disabled>Beli</button>
                @endif
              </div>
            </div>
          </div>
        </div>
        <!-- summary -->
      </div>
    </div>
  </section>
@endsection
@push('script')
<script type="module">
    $(document).ready(function() {
        $('.btn-plus').click(function() {
            var curr_quantity = $(this).prev().val() || 0;
            curr_quantity = parseInt(curr_quantity)+1;
            $(this).prev().val(curr_quantity);
            updateSummary();
            updateCart($(this), curr_quantity);
        });
        $('.btn-minus').click(function() {
            var curr_quantity = $(this).next().val() || 1;
            if(curr_quantity != 1) {
                curr_quantity = parseInt(curr_quantity)-1;
                $(this).next().val(curr_quantity);
            }
            updateSummary();
            updateCart($(this), curr_quantity);
        });
        $("input[name=quantity]").on("input", function() {
            updateSummary();
            updateCart($(this), $(this).val())
        });

        $("input[name=deskripsi]").on("input", function() {
            var curr_quantity = $('input[name=deskripsi]').siblings(':last').find('input[name=quantity]').val();
            updateCart($(this), curr_quantity)
        });
        function updateCart (el, qty) {
            if (qty <= 0) return;
            var keranjangID = el.closest('.cart-data').data('keranjangId');
        
            axios.put('{{ route('keranjang.store') }}/' + keranjangID, { 
                quantity: qty,
                deskripsi: el.is('input[name=deskripsi]') ? el.val() : el.closest('input[name=deskripsi]').val()
            });
        }
        function updateSummary () {
            var totalPrice = 0;
            $('.cart-data').each(function(i, obj) {
                var price = $(this).data('harga');
                var subtotal = price * $(this).find('input[name=quantity]').val();
                totalPrice += subtotal
            });
            $('.total-price').html((totalPrice).toFixed(0).replace(/(\d)(?=(\d{3})+$)/g, "$1,"))
        }
        updateSummary()
    });
    </script>
@endpush