@extends('web.layouts.app')
@section('content')    
    <section id="categories-section">
        <div class="container" id="main">
            <div class="row">
                <div class="col-12">
                    <h5 class="section-title my-3">Kategori</h5>
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
                <div class="col-12 d-flex flex-column mb-3">
                    <h5 class="section-title mb-0">Daftar Produk</h5>
                    @if (request()->exists('search'))
                    <small class="text-muted">Hasil pencarian: {{ request('search') }}</small>
                    @endif
                </div>
            </div>

            <div class="row">
                @forelse($products as $product)
                <div class="col-12 col-md-3 mb-3">
                    <a href="#" class="product-data">
                        <div class="product-image">
                            <img src="{{ asset('storage/'. $product->gambar)}}" height="140">
        
                        </div>
                        <div class="product-name">{{ $product->nama }}</div>
                        <div class="product-price">Rp{{ number_format($product->harga_jual) }}</div>
                        <div class="product-info">Terjual {{ $product->totalTerjual() }}</div>
                    </a>
                </div>
                @empty
                <p class="text-center text-muted">Tidak ada produk</p>
                @endforelse
                
            
            </div>
            
            {{ $products->links() }}
        </div>
    </section>


@endsection