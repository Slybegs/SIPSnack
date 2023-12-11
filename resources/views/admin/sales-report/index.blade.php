@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Laporan Penjualan</div>
                    <div class="card-body">
                        <a href="{{ route('admin.sales-report.export') }}" class="btn btn-success btn-sm" title="Add New Produk">
                            <i class="fa fa-plus" aria-hidden="true"></i> Export
                        </a>
                        <a href="{{ route('admin.sales-report-detail.export') }}" class="btn btn-success btn-sm" title="Add New Produk">
                            <i class="fa fa-plus" aria-hidden="true"></i> Export Detail
                        </a>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Nomor Transaksi</th>
                                        <th>Nama Pembeli</th>
                                        <th>Total Penjualan</th>
                                        <th>Pembayaran</th>
                                        <th>Saldo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($transaksis as $transaksi)
                                    <tr>
                                        <td>{{ $transaksi->tanggal->format('d M Y') }}</td>
                                        <td>{{ $transaksi->nomorTransaksi }}</td>
                                        <td>{{ $transaksi->user->name }}</td>
                                        <td>{{ $transaksi->total}}</td>
                                        <td>{{ $transaksi->totalHPP}}</td>
                                        <td>{{ $transaksi->total - $transaksi->totalHPP }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $transaksis->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
