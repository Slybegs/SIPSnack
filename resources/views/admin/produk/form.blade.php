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
    <input class="form-control" rows="5" name="kategori" type="text" id="kategori" value="{{ isset($produk->kategori) ? $produk->kategori : ''}}" > 
    {!! $errors->first('kategori', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('harga_beli') ? 'has-error' : ''}}">
    <label for="harga_beli" class="control-label">{{ 'Harga Beli' }}</label>
    <input class="form-control" rows="5" name="harga_beli" type="text" id="harga_beli" value="{{ isset($produk->harga_beli) ? $produk->harga_beli : ''}}" > 
    {!! $errors->first('harga_beli', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('harga_jual') ? 'has-error' : ''}}">
    <label for="harga_jual" class="control-label">{{ 'Harga Jual' }}</label>
    <input class="form-control" rows="5" name="harga_jual" type="text" id="harga_jual" value="{{ isset($produk->harga_jual) ? $produk->harga_jual : ''}}" > 
    {!! $errors->first('harga_jual', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('deskripsi') ? 'has-error' : ''}}">
    <label for="deskripsi" class="control-label">{{ 'Deskripsi' }}</label>
    <textarea class="form-control" name="deskripsi" type="textarea" id="deskripsi">{{ isset($produk->deskripsi) ? $produk->deskripsi : ''}}</textarea>
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
<div class="form-group {{ $errors->has('gambar') ? 'has-error' : ''}}">
    <label for="gambar" class="control-label">{{ 'Gambar' }}</label>
    <div class="custom-file">
        <input type="file" class="custom-file-input" name="gambar" id="customFile">
        <label class="custom-file-label" for="customFile">Choose file</label>
    </div>
    @if(isset($produk->gambar))
        <img src="{{ asset('storage/'.$produk->gambar) }}" alt="Your image" class="img-thumbnail mt-1" width="200">
    @else
        <img src="#" alt="Your image" class="img-thumbnail mt-1" width="200" style="display: none">
    @endif
</div>



<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

@push('scripts')
<script>
    document.querySelector('.custom-file-input').addEventListener('change',function(e){
        const [file] = document.getElementById("customFile").files
        if (file) {
            var fileName = file.name;
            var nextSibling = e.target.nextElementSibling
            nextSibling.innerText = fileName
            var imgNode = e.target.parentNode.nextElementSibling
            imgNode.src = URL.createObjectURL(file)
            imgNode.style.display = 'block';
        }
    })
    </script>
@endpush
