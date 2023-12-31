@extends('web.layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row gx-5">
      <aside class="col-6">
        <div class="border rounded-4 mb-3 d-flex justify-content-center">
          <img src="{{ asset('storage/' . $produk->gambar) }}" style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit">
        </div>
      </aside>
      <main class="col-lg-6">
        <div class="ps-lg-3">
          <h4 class="title text-dark">
            {{ $produk->nama }}
          </h4>
          <div class="d-flex flex-row my-3">
            <span class="text-muted"><i class="fas fa-shopping-basket fa-sm mx-1"></i>{{ $produk->totalTerjual() }} terjual</span>
            @if ($produk->stok > 0)
            <span class="text-success ms-2">In stock</span>
            @else
            <span class="text-danger ms-2">Stok habis</span>
            @endif
          </div>
  
          <div class="mb-3">
            <span class="h5">Rp{{ number_format($produk->harga_jual) }}</span>
            <span class="text-muted">/per piece</span>
          </div>
  
          <p class="mb-3">
            {!! nl2br($produk->deskripsi) !!}
          </p>
  
          <div class="row">
            <dd class="col-3 text-muted">Kategory:</dd>
            <dd class="col-9"><a href="google.com" class="text-primary">{{ $produk->kategori }}</a></dd>
  
            <dd class="col-3 text-muted">Berat</dd>
            <dd class="col-9">{{ $produk->berat }} gr</dd>
  
            <dd class="col-3 text-muted">Expired</dd>
            <dd class="col-9">{{ $produk->expired }}</dd>
          </div>
          @if ($produk->stok > 0)
          <hr>
  
          <form method="POST">
            @csrf
            <input type="hidden" name="produkID" value="{{ $produk->id }}">
            <div class="row mb-4">
                <div class="col-md-4 col-6">
                <label class="mb-2 d-block">Quantity</label>
                <div class="input-group" style="width: 170px;">
                    <button class="btn btn-minus btn-white border border-secondary px-3" type="button" id="button-addon1" data-mdb-ripple-color="dark">
                    <i class="fas fa-minus"></i>
                    </button>
                    <input type="text" name="quantity" class="form-control text-center border border-secondary" value="1" aria-label="Example text with button addon" aria-describedby="button-addon1">
                    <button class="btn btn-plus btn-white border border-secondary px-3" type="button" id="button-addon2" data-mdb-ripple-color="dark">
                    <i class="fas fa-plus"></i>
                    </button>
                </div>
                </div>
            </div>
            <button type="submit" formaction="{{ route('keranjang.store') }}" class="btn btn-primary shadow-0"> <i class="fas fa-plus"></i> Keranjang </a>
            <button type="submit" formaction="{{ route('keranjang.store') }}" class="btn btn-outline-primary shadow-0 ms-2"> Beli Langsung </a>
          </form>
          @endif
        </div>
      </main>
    </div>

  </div>
  <section id="recommendation-product-section">
    <div class="container" id="main">
        <div class="row">
            <div class="col-12">
                <h5 class="section-title">Produk yang mungkin kamu suka</h5>
            </div>
        </div>

        <div class="row">
            <!-- product grid -->
            @foreach($randomProduk as $product)
                <div class="col-12 col-md-3 mb-3">
                    <a href="{{ route('produk.show', ['produk' => $product->id])}}" class="product-data">
                        <div class="product-image">
                            <img src="{{ asset('storage/'. $product->gambar)}}" height="140">
        
                        </div>
                        <div class="product-name">{{ $product->nama }}</div>
                        <div class="product-price">Rp{{ number_format($product->harga_jual) }}</div>
                        <div class="product-info">Terjual {{ $product->total }}</div>
                    </a>
                </div>
            @endforeach
        
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
        });
        $('.btn-minus').click(function() {
            var curr_quantity = $(this).next().val() || 1;
            if(curr_quantity != 1) {
                curr_quantity = parseInt(curr_quantity)-1;
                $(this).next().val(curr_quantity);
            }
        });
    });
    </script>
@endpush