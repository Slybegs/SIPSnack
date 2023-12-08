@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Transaksi</div>
                    <div class="card-body">

                        <a href="{{ url('/transaksi/transaksi') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        {{-- <a href="{{ url('/transaksi/transaksi/' . $transaksi->id . '/edit') }}" title="Edit Transaksi"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('transaksi/transaksi' . '/' . $transaksi->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Transaksi" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form> --}}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $transaksi->id }}</td>
                                    </tr>
                                    <tr><th> Produk ID </th><td> {{ $transaksi->produkID }} </td></tr><tr><th> Nomor Transaksi </th><td> {{ $transaksi->nomorTransaksi }} </td></tr><tr><th> No Resi </th><td> {{ $transaksi->noResi }} </td></tr><tr><th> Kurir </th><td> {{ $transaksi->kurir }} </td></tr><tr><th> Ongkir </th><td> {{ $transaksi->ongkir }} </td></tr>
                                    <tr><th> Total </th><td> {{ $transaksi->total }} </td></tr><tr><th> Status </th><td> {{ $transaksi->status }} </td></tr><tr><th> Date </th><td> {{ $transaksi->date }} </td></tr><tr><th> Address </th><td> {{ $transaksi->address }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
