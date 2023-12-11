<table>
    <thead>
        <tr>
            <th colspan="12" align="center"><b>Sales Report</b></th>
        </tr>
        <tr></tr>
        <tr>
            <th rowspan="2" valign="middle" align="center"><b>No.</b></th>
            <th rowspan="2" valign="middle" align="center"><b>Tanggal</b></th>
            <th rowspan="2" valign="middle" align="center"><b>Nomor Transaksi</b></th>
            <th rowspan="2" valign="middle" align="center"><b>Nama Pembeli</b></th>
            <th rowspan="2" valign="middle" align="center"><b>Produk</b></th>
            <th rowspan="2" valign="middle" align="center"><b>Payment Method</b></th>
            <th rowspan="2" valign="middle" align="center"><b>Total Penjualan</b></th>
            <th rowspan="2" valign="middle" align="center"><b>Pembayaran</b></th>
            <th rowspan="2" valign="middle" align="center"><b>Saldo</b></th>
            <th colspan="3" align="center"><b>Info Penerima</b></th>

        </tr>
        <tr>
            <th align="center"><b>Nama</b></th>
            <th align="center"><b>No Handphone</b></th>
            <th align="center"><b>Alamat</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach($transaksis as $transaksi)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $transaksi->tanggal->format('d M Y') }}</td>
                <td>{{ $transaksi->nomorTransaksi }}</td>
                <td>{{ $transaksi->user->name }}</td>
                <td>{{ $transaksi->detail->implode('produk.nama', ',') }}</td>
                <td>{{ $transaksi->bank->namaBank }}</td>
                <td>{{ $transaksi->total}}</td>
                <td>{{ $transaksi->totalHPP}}</td>
                <td>{{ $transaksi->total - $transaksi->totalHPP }}</td>
                <td>{{ $transaksi->namaPenerima}}</td>
                <td>{{ $transaksi->noHandphonePenerima}}</td>
                <td>{{ $transaksi->alamatPenerima}}</td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td>TOTAL</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>=SUM(G5:G{{ count($transaksis) + 4 }})</td>
            <td>=SUM(H5:H{{ count($transaksis) + 4 }})</td>
            <td>=SUM(I5:I{{ count($transaksis) + 4 }})</td>
        </tr>
    </tfoot>
</table>

