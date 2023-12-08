<div class="form-group {{ $errors->has('namaBank') ? 'has-error' : ''}}">
    <label for="namaBank" class="control-label">{{ 'Nama bank' }}</label>
    <input class="form-control" name="namaBank" type="text" id="namaBank" value="{{ isset($bank->namaBank) ? $bank->namaBank : ''}}" >
    {!! $errors->first('namaBank', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('noRek') ? 'has-error' : ''}}">
    <label for="noRek" class="control-label">{{ 'No rek' }}</label>
    <input class="form-control" name="noRek" type="text" id="noRek" value="{{ isset($bank->noRek) ? $bank->noRek : ''}}" >
    {!! $errors->first('noRek', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('namaRek') ? 'has-error' : ''}}">
    <label for="namaRek" class="control-label">{{ 'Nama rek' }}</label>
    <textarea class="form-control" rows="5" name="namaRek" type="textarea" id="namaRek" >{{ isset($bank->namaRek) ? $bank->namaRek : ''}}</textarea>
    {!! $errors->first('namaRek', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
