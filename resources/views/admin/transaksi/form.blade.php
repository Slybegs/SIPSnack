<div class="form-group {{ $errors->has('produkID') ? 'has-error' : ''}}">
    <label for="produkID" class="control-label">{{ 'Produkid' }}</label>
    <input class="form-control" name="produkID" type="text" id="produkID" value="{{ isset($transaksi->produkID) ? $transaksi->produkID : ''}}" >
    {!! $errors->first('produkID', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('nomorTransaksi') ? 'has-error' : ''}}">
    <label for="nomorTransaksi" class="control-label">{{ 'Nomortransaksi' }}</label>
    <input class="form-control" name="nomorTransaksi" type="text" id="nomorTransaksi" value="{{ isset($transaksi->nomorTransaksi) ? $transaksi->nomorTransaksi : ''}}" >
    {!! $errors->first('nomorTransaksi', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('noResi') ? 'has-error' : ''}}">
    <label for="noResi" class="control-label">{{ 'Noresi' }}</label>
    <input class="form-control" name="noResi" type="text" id="noResi" value="{{ isset($transaksi->noResi) ? $transaksi->noResi : ''}}" >
    {!! $errors->first('noResi', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('kurir') ? 'has-error' : ''}}">
    <label for="kurir" class="control-label">{{ 'Kurir' }}</label>
    <input class="form-control" name="kurir" type="text" id="kurir" value="{{ isset($transaksi->kurir) ? $transaksi->kurir : ''}}" >
    {!! $errors->first('kurir', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('ongkir') ? 'has-error' : ''}}">
    <label for="ongkir" class="control-label">{{ 'Ongkir' }}</label>
    <input class="form-control" name="ongkir" type="number" id="ongkir" value="{{ isset($transaksi->ongkir) ? $transaksi->ongkir : ''}}" >
    {!! $errors->first('ongkir', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('total') ? 'has-error' : ''}}">
    <label for="total" class="control-label">{{ 'Total' }}</label>
    <input class="form-control" name="total" type="number" id="total" value="{{ isset($transaksi->total) ? $transaksi->total : ''}}" >
    {!! $errors->first('total', '<p class="help-block">:message</p>') !!}
</div>
{{-- <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }}</label>
    <input class="form-control" name="status" type="text" id="status" value="{{ isset($transaksi->status) ? $transaksi->status : ''}}" >
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div> --}}
<div class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">
    <label for="date" class="control-label">{{ 'Date' }}</label>
    <input class="form-control" name="date" type="date" id="date" value="{{ isset($transaksi->date) ? $transaksi->date : ''}}" >
    {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    <label for="address" class="control-label">{{ 'Address' }}</label>
    <textarea class="form-control" rows="5" name="address" type="textarea" id="address" >{{ isset($transaksi->address) ? $transaksi->address : ''}}</textarea>
    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
