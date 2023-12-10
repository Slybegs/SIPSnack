@extends('admin.layouts.app')

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
                                        <th>Tanggal</th><th>Nomor Transaksi</th><th>Metode Pembayaran</th><th>Total</th><th>Status</th><th>Address</th><th>No Resi</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($transaksi as $item)
                                    <tr>
                                        <td>{{ $item->tanggal->format('d M Y')}}</td>
                                        <td>{{ $item->nomorTransaksi }}</td><td>{{ $item->bank->namaBank }}</td><td>{{ number_format($item->total) }}</td><td>{{ $item->status }}</td><td>{{ $item->alamatPenerima }}</td><td>{{ $item->kurir . ' - ' . $item->noResi }}</td>
                                        <td>
                                            <a href="{{ route('admin.transaksi.show', ['transaksi' => $item->id]) }}" title="View Transaksi"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            {{-- <a href="{{ route('admin.transaksi.show/, ['transaksi' => $item->id]' . $item->id . '/edit') }}" title="Edit Transaksi"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a> --}}
                                            
                                            @if ($item->status === 'Menunggu Pengecekan')
                                                <form method="POST" action="{{ route('admin.transaksi.confirmPayment', ['transaksi' => $item->id]) }}" accept-charset="UTF-8" style="display:inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-info btn-sm" title="Konfirmasi Transaksi" onclick="return confirm(&quot;Konfirmasi pembayaran?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Confirm</button>
                                                </form> 
                                            @endif

                                            @if ($item->status === 'Diproses')
                                                <button type="button" class="btn btn-sm btn-default btn-input-resi" data-toggle="modal" data-target="#modal-default" data-update-url="{{ route('admin.transaksi.updateDelivery', ['transaksi' => $item->id]) }}">
                                                    Input Resi
                                                </button>
                                            @endif
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
                    <form id="update-resi-form" method="POST">
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
@endsection
@push('scripts')
<script>
    $('.btn-input-resi').click(function(){
        $('#update-resi-form').attr('action', $(this).data('updateUrl'));
    });
</script>
@endpush