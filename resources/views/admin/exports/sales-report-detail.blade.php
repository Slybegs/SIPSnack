<table>
    <thead>
        <tr>
            <th colspan="12" align="center"><b>Sales Report Detail</b></th>
        </tr>
        <tr></tr>
        <tr>
            <th rowspan="2" valign="middle" align="center"><b>No.</b></th>
            <th rowspan="2" valign="middle" align="center"><b>Tanggal</b></th>
            <th rowspan="2" valign="middle" align="center"><b>Nomor Transaksi</b></th>
            <th rowspan="2" valign="middle" align="center"><b>Nama Pembeli</b></th>
            <th rowspan="2" valign="middle" align="center"><b>Produk</b></th>
            <th rowspan="2" valign="middle" align="center"><b>Harga Beli</b></th>
            <th rowspan="2" valign="middle" align="center"><b>Harga Jual</b></th>
            <th rowspan="2" valign="middle" align="center"><b>Quantity</b></th>
            <th rowspan="2" valign="middle" align="center"><b>Subtotal Penjualan</b></th>
            <th rowspan="2" valign="middle" align="center"><b>Subtotal Pembelian</b></th>
            <th rowspan="2" valign="middle" align="center"><b>Payment Method</b></th>
            <th rowspan="2" valign="middle" align="center"><b>Total Penjualan</b></th>
            <th rowspan="2" valign="middle" align="center"><b>Total Pembelian</b></th>
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
        @php 
            $count = 0;
        @endphp
        @foreach($transaksis as $transaksi)
            @foreach ($transaksi->detail as $detail)
            @php 
                $count++;
            @endphp
            <tr>
                @if ($loop->first)
                    <td>{{ $loop->parent->iteration }}</td>
                    <td>{{ $transaksi->tanggal->format('d M Y') }}</td>
                    <td>{{ $transaksi->nomorTransaksi }}</td>
                    <td>{{ $transaksi->user->name }}</td>
                @else
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                @endif
                <td>{{ $detail->produk->nama}}</td>
                <td>{{ $detail->harga_beli}}</td>
                <td>{{ $detail->harga_jual}}</td>
                <td>{{ $detail->quantity }}</td>
                <td>{{ $detail->quantity * $detail->harga_beli }}</td>
                <td>{{ $detail->quantity * $detail->harga_jual }}</td>
                @if($loop->last)
                    <td>{{ $transaksi->bank->namaBank }}</td>
                    <td>{{ $transaksi->total}}</td>
                    <td>{{ $transaksi->totalHPP}}</td>
                    <td>{{ $transaksi->total - $transaksi->totalHPP }}</td>
                    <td>{{ $transaksi->namaPenerima}}</td>
                    <td>{{ $transaksi->noHandphonePenerima}}</td>
                    <td>{{ $transaksi->alamatPenerima}}</td>
                @endif
            </tr>
            @endforeach
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
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>=SUM(L5:L{{ $count + 4 }})</td>
            <td>=SUM(M5:M{{ $count + 4 }})</td>
            <td>=SUM(N5:N{{ $count + 4 }})</td>
        </tr>
    </tfoot>

</table>

