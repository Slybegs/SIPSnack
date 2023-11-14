<div class="form-group {{ $errors->has('produkID') ? 'has-error' : ''}}">
    <label for="produkID" class="control-label">{{ 'Produkid' }}</label>
    <input class="form-control" name="produkID" type="text" id="produkID" value="{{ isset($produk->produkID) ? $produk->produkID : ''}}" >
    {!! $errors->first('produkID', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
    <label for="nama" class="control-label">{{ 'Nama' }}</label>
    <input class="form-control" name="nama" type="text" id="nama" value="{{ isset($produk->nama) ? $produk->nama : ''}}" >
    {!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('kategori') ? 'has-error' : ''}}">
    <label for="kategori" class="control-label">{{ 'Kategori' }}</label>
    <input class="form-control" rows="5" name="kategori" type="text" id="kategori" {{ isset($produk->kategori) ? $produk->kategori : ''}} > 
    {!! $errors->first('kategori', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('deskripsi') ? 'has-error' : ''}}">
    <label for="deskripsi" class="control-label">{{ 'Deskripsi' }}</label>
    <textarea class="form-control" name="deskripsi" type="textarea" id="deskripsi" value="{{ isset($produk->deskripsi) ? $produk->deskripsi : ''}}" > </textarea>
    {!! $errors->first('deskripsi', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('expired') ? 'has-error' : ''}}">
    <label for="expired" class="control-label">{{ 'Expired' }}</label>
    <input class="form-control" name="expired" type="text" id="expired" value="{{ isset($produk->expired) ? $produk->expired : ''}}" >
    {!! $errors->first('expired', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('berat') ? 'has-error' : ''}}">
    <label for="berat" class="control-label">{{ 'Berat' }}</label>
    <input class="form-control" name="berat" type="number" id="berat" value="{{ isset($produk->berat) ? $produk->berat : ''}}" >
    {!! $errors->first('berat', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
