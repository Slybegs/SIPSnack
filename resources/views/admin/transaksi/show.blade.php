@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Transaksi</div>
                    <div class="card-body">

                        <a href="{{ route('admin.transaksi.index') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modal-bukti-pembayaran">Bukti Pembayaran</button>
                        @if ($transaksi->status === 'Menunggu Pengecekan')
                            <form method="POST" action="{{ route('admin.transaksi.confirmPayment', ['transaksi' => $transaksi->id]) }}" accept-charset="UTF-8" style="display:inline">
                                @csrf
                                <button type="submit" class="btn btn-info btn-sm" title="Konfirmasi Transaksi" onclick="return confirm(&quot;Konfirmasi pembayaran?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Confirm</button>
                            </form> 
                        @endif

                        @if ($transaksi->status === 'Diproses')
                            <button type="button" class="btn btn-sm btn-default btn-input-resi" data-toggle="modal" data-target="#modal-default" data-update-url="{{ route('admin.transaksi.updateDelivery', ['transaksi' => $transaksi->id]) }}">
                                Input Resi
                            </button>
                        @endif
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
                                    <tr><th> Nomor Transaksi </th><td> {{ $transaksi->nomorTransaksi }} </td></tr>
                                    <tr><th> Metode Pembayaran</th><td> {{ $transaksi->bank->namaBank }} </td></tr>
                                    <tr><th> No Resi </th><td> {{ $transaksi->noResi ?? '-'}} </td></tr>
                                    <tr><th> Kurir </th><td> {{ $transaksi->kurir  ?? '-'}} </td></tr>
                                    <tr><th> Total </th><td> {{ $transaksi->total }} </td></tr>
                                    <tr><th> Status </th><td> {{ $transaksi->status }} </td></tr>
                                    <tr><th> Tanggal </th><td> {{ $transaksi->tanggal->format('d M Y') }} </td></tr>
                                    <tr><th> Nama Penerima </th><td> {{ $transaksi->namaPenerima }} </td></tr>
                                    <tr><th> No. HP Penerima </th><td> {{ $transaksi->noHandphonePenerima }} </td></tr>
                                    <tr><th> Alamat Penerima </th><td> {{ $transaksi->alamatPenerima }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nama Produk</th>
                                        <th>Harga</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($transaksi->detail as $detail)
                                    <tr>
                                        <td>{{ $detail->produk->nama }}</td>
                                        <td>{{ $detail->harga_jual }}</td>
                                        <td>{{ $detail->quantity}}</td>
                                        <td>{{ $detail->subtotal}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Input Resi Pengiriman</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="update-resi-form" method="POST" action="{{ route('admin.transaksi.updateDelivery', ['transaksi' => $transaksi->id]) }}">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="noResi" class="control-label">{{ 'Noresi' }}</label>
                            <input class="form-control" name="noResi" type="text" id="noResi">
                        </div>
                        <div class="form-group">
                            <label for="kurir" class="control-label">{{ 'Kurir' }}</label>
                            <input class="form-control" name="kurir" type="text" id="kurir">
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button form="update-resi-form" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-bukti-pembayaran" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Bukti Pembayaran</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('storage/'.$transaksi->buktiPembayaran)}}" alt="Your image" class="img-thumbnail mb-3 mx-auto">
                </div>
            </div>
        </div>
    </div>
@endsection
