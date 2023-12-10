@if (in_array($status, ['Dikirim', 'Selesai']))
    <div class="status status-success">
        {{ $transaksi->status}}
    </div>
@elseif (in_array($status, ['Batal']))
    <div class="status status-danger">
        {{ $transaksi->status}}
    </div>
@else
    <div class="status status-warning">
        {{ $transaksi->status}}
    </div>
@endif