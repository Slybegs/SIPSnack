<div class="form-group {{ $errors->has('namaBank') ? 'has-error' : ''}}">
    <label for="namaBank" class="control-label">{{ 'Nama bank' }}</label>
    <select class="custom-select" name="namaBank">
        <option value="BCA" {{ isset($bank->namaBank) ? ($bank->namaBank == 'BCA' ? 'selected' : '') : ''}}>BCA</option>
        <option value="MANDIRI" {{ isset($bank->namaBank) ? ($bank->namaBank == 'MANDIRI' ? 'selected' : '') : ''}}>Mandiri</option>
        <option value="BRI" {{ isset($bank->namaBank) ? ($bank->namaBank == 'BRI' ? 'selected' : '') : ''}}>BRI</option>
      </select>
    {!! $errors->first('namaBank', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('noRek') ? 'has-error' : ''}}">
    <label for="noRek" class="control-label">{{ 'No rek' }}</label>
    <input class="form-control" name="noRek" type="text" id="noRek" value="{{ isset($bank->noRek) ? $bank->noRek : ''}}" >
    {!! $errors->first('noRek', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('namaRek') ? 'has-error' : ''}}">
    <label for="namaRek" class="control-label">{{ 'Nama rek' }}</label>
    <input class="form-control" name="namaRek" type="text" id="namaRek" value="{{ isset($bank->namaRek) ? $bank->namaRek : ''}}">
    {!! $errors->first('namaRek', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
