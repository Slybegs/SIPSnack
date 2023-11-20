@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Transaksi</div>
                    <div class="card-body">
                        {{-- <a href="{{ url('/transaksi/transaksi/create') }}" class="btn btn-success btn-sm" title="Add New Transaksi">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a> --}}

                        <form method="GET" action="{{ url('/transaksi/transaksi') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Produk ID</th><th>Nomor Transaksi</th><th>No Resi</th><th>Kurir</th><th>Ongkir</th><th>Total</th><th>Status</th><th>Date</th><th>Address</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($transaksi as $item)
                                    <tr>
                                        <td>{{ $item->produkID }}</td><td>{{ $item->nomorTransaksi }}</td><td>{{ $item->noResi }}</td><td>{{ $item->kurir }}</td><td>{{ $item->ongkir }}</td><td>{{ $item->total }}</td><td>{{ $item->status }}</td><td>{{ $item->date }}</td><td>{{ $item->address }}</td>
                                        <td>
                                            <a href="{{ url('/transaksi/transaksi/' . $item->id) }}" title="View Transaksi"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            {{-- <a href="{{ url('/transaksi/transaksi/' . $item->id . '/edit') }}" title="Edit Transaksi"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a> --}}

                                            <form method="POST" action="{{ url('/transaksi/transaksi' . '/' . $item->id) }}/confirm-status" accept-charset="UTF-8" style="display:inline">
                                                {{ csrf_field() }}
                                                {{ method_field('PATCH') }}
                                                <button type="submit" class="btn btn-info btn-sm" title="Konfirmasi Transaksi" onclick="return confirm(&quot;Confirm transaction?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Confirm</button>
                                            </form> 

                                            {{-- <form method="POST" action="{{ url('/transaksi/transaksi' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Transaksi" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>  --}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $transaksi->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
