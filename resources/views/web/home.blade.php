@extends('web.layouts.app')
@section('content')    
    <section id="new-product-section">
      <div class="container py-5">
          <h2>What's New ?</h2>
          <div class="row">
            @foreach($latestProduct as $product)
              <div class="col-12 col-md-4">
                <a href="{{ route('produk.show', ['produk' => $product->id]) }}" class="row product-data rounded">
                    <div class="col-12 col-md-4">
                        <img src="{{ asset('storage/'.$product->gambar)}}" class="img-thumbnail"/>
                      </div>
                    <div class="col-12 col-md-8">
                      <div class="product-name">
                        {{ $product->nama }}
                      </div>
                      <div class="product-price">
                      Rp{{ number_format($product->harga_jual) }}
                      </div>
                    </div>
                </a>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </section>
    <section id="popular-product-section">
        <div class="container" id="main">
            <div class="row">
                <div class="col-12">
                    <h5 class="section-title mb-3">Kategori</h5>
                </div>
            </div>

            <div class="row">
                @php 
                    $backgrounds = [
                        'step-bg',
                        'wavy-bg',
                        'cross-bg',
                        'diagonal-bg'
                    ];
                @endphp
                @foreach ($categories as $category)
                <div class="col-6 col-md-3">
                    <a href="{{ route('produk.index', ['kategori' => $category['kategori']])}}" class="card {{ $backgrounds[$loop->index % 4]}}">
                        <div class="card-body">
                            <div class="card-title text-center my-2 text-white fw-bold">
                                {{$category['kategori']}}
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            
            </div>
        </div>
    </section>
    <section id="popular-product-section">
        <div class="container" id="main">
            <div class="row">
                <div class="col-12">
                    <h5 class="section-title">Popular Products</h5>
                </div>
            </div>

            <div class="row">
                @foreach($popularProduct as $product)
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