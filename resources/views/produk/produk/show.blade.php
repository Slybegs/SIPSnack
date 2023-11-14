@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Produk</div>
                    <div class="card-body">

                        <a href="{{ url('/produk/produk') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/produk/produk/' . $produk->id . '/edit') }}" title="Edit Produk"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('produk/produk' . '/' . $produk->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Produk" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <div class="image d-flex justify-content-center mb-4">
                                        <img style= "width: 100px; height: 100px" src="{{ asset('snackIMG/'.$produk->produkID.'.jpg' )}}" class="img-circle elevation-2" alt="User Image">
                                    </div>
                                    <tr><th> ProdukID </th><td> {{ $produk->produkID }} </td></tr><tr><th> Nama </th><td> {{ $produk->nama }} </td></tr><tr><th> Kategori </th><td> {{ $produk->kategori }} </td></tr><tr><th> Deskripsi </th><td> {{ $produk->deskripsi }} </td></tr><tr><th> Expired </th><td> {{ $produk->expired }} </td></tr><tr><th> Berat </th><td> {{ $produk->berat }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
