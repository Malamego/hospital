<div class="form-body">
  <!-- Add Patient's Name -->
  <div class="form-group{{ $errors->has('pat_id') ? ' has-error' : '' }}">
      <label class="col-md-2 control-label">{{ trans('main.patient') }}  </label>
      <div class="col-md-10">
          <select class="form-control" id="pat_id" name="pat_id">
            @foreach ($pat as $c)
                <option value="{{ $c->id }}" {{ getData($data, 'pat_id') == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
            @endforeach
          </select>
          @if ($errors->has('pat_id'))
              <span class="help-block">
                  <strong class="help-block">{{ $errors->first('pat_id') }}</strong>
              </span>
          @endif
      </div>
  </div>

  <!-- Add Patient's Name -->
  <div class="form-group{{ $errors->has('bed_id') ? ' has-error' : '' }}">
      <label class="col-md-2 control-label">{{ trans('main.bed') }}  </label>
      <div class="col-md-10">
          <select class="form-control" id="bed_id" name="bed_id">
            @foreach ($bed as $c)
                <option value="{{ $c->id }}" {{ getData($data, 'bed_id') == $c->id ? 'selected' : '' }}>{{ $c->number }}</option>
            @endforeach
          </select>
          @if ($errors->has('bed_id'))
              <span class="help-block">
                  <strong class="help-block">{{ $errors->first('bed_id') }}</strong>
              </span>
          @endif
      </div>
  </div>

  <div class="form-group{{ $errors->has('urea') ? ' has-error' : '' }}">
      <label class="col-md-2 control-label">{{ trans('main.urea') }} <span class="required"></span> </label>
      <div class="col-md-6">
          <input type="number" step="0.01" name="urea"  value="{{ getData($data, 'urea') }}" class="form-control" placeholder="{{ trans('main.urea') }}" required>
          @if ($errors->has('urea'))
              <span class="help-block">
                  <strong class="help-block">{{ $errors->first('urea') }}</strong>
              </span>
          @endif
      </div>
  </div>

  <div class="form-group{{ $errors->has('creatinie') ? ' has-error' : '' }}">
      <label class="col-md-2 control-label">{{ trans('main.creatinie') }} <span class="required"></span> </label>
      <div class="col-md-6">
          <input type="number" step="0.01" name="creatinie"  value="{{ getData($data, 'creatinie') }}" class="form-control" placeholder="{{ trans('main.creatinie') }}" required>
          @if ($errors->has('creatinie'))
              <span class="help-block">
                  <strong class="help-block">{{ $errors->first('creatinie') }}</strong>
              </span>
          @endif
      </div>
  </div>

  <div class="form-group{{ $errors->has('potassium') ? ' has-error' : '' }}">
      <label class="col-md-2 control-label">{{ trans('main.potassium') }} <span class="required"></span> </label>
      <div class="col-md-6">
          <input type="number" step="0.01" name="potassium"  value="{{ getData($data, 'potassium') }}" class="form-control" placeholder="{{ trans('main.potassium') }}" required>
          @if ($errors->has('potassium'))
              <span class="help-block">
                  <strong class="help-block">{{ $errors->first('potassium') }}</strong>
              </span>
          @endif
      </div>
  </div>

  <div class="form-group{{ $errors->has('alt') ? ' has-error' : '' }}">
      <label class="col-md-2 control-label">{{ trans('main.alt') }} <span class="required"></span> </label>
      <div class="col-md-6">
          <input type="number" step="0.01" name="alt"  value="{{ getData($data, 'alt') }}" class="form-control" placeholder="{{ trans('main.alt') }}" required>
          @if ($errors->has('alt'))
              <span class="help-block">
                  <strong class="help-block">{{ $errors->first('alt') }}</strong>
              </span>
          @endif
      </div>
  </div>

  <div class="form-group{{ $errors->has('ast') ? ' has-error' : '' }}">
      <label class="col-md-2 control-label">{{ trans('main.ast') }} <span class="required"></span> </label>
      <div class="col-md-6">
          <input type="number" step="0.01" name="ast"  value="{{ getData($data, 'ast') }}" class="form-control" placeholder="{{ trans('main.ast') }}" required>
          @if ($errors->has('ast'))
              <span class="help-block">
                  <strong class="help-block">{{ $errors->first('ast') }}</strong>
              </span>
          @endif
      </div>
  </div>

  <div class="form-group{{ $errors->has('bilirubin') ? ' has-error' : '' }}">
      <label class="col-md-2 control-label">{{ trans('main.bilirubin') }} <span class="required"></span> </label>
      <div class="col-md-6">
          <input type="number" step="0.01" name="bilirubin"  value="{{ getData($data, 'bilirubin') }}" class="form-control" placeholder="{{ trans('main.bilirubin') }}" required>
          @if ($errors->has('bilirubin'))
              <span class="help-block">
                  <strong class="help-block">{{ $errors->first('bilirubin') }}</strong>
              </span>
          @endif
      </div>
  </div>

  <div class="form-group{{ $errors->has('albumin') ? ' has-error' : '' }}">
      <label class="col-md-2 control-label">{{ trans('main.albumin') }} <span class="required"></span> </label>
      <div class="col-md-6">
          <input type="number" step="0.01" name="albumin"  value="{{ getData($data, 'albumin') }}" class="form-control" placeholder="{{ trans('main.albumin') }}" required>
          @if ($errors->has('albumin'))
              <span class="help-block">
                  <strong class="help-block">{{ $errors->first('albumin') }}</strong>
              </span>
          @endif
      </div>
  </div>

  {{-- Add Patient's medications --}}
    <div class="form-group{{ $errors->has('med_id') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.medications') }} <span class="required"></span> </label>
          <option value="">{{ trans('main.selectMedications') }}</option>
        <div class="col-md-6">
            <select class="form-control select2" name="med_id[]" id="med_id" multiple>
              @foreach ($med as $pt)
                  <option value="{{ $pt->id }}" {{ getData($data, 'med_id') == $pt->id ? 'selected' : '' }}>{{ $pt->name }}</option>
              @endforeach
            </select>
            @if ($errors->has('med_id'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('med_id') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('dispensed') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.dispensed') }} <span class="required"></span> </label>
        <div class="col-md-10">
            <select class="form-control" id="dispensed" name="dispensed">
                <option value="no"></option>
                <option value="no" {{ getData($data, 'dispensed') == 'no' ? ' selected' : '' }}>{{trans('main.no')}}</option>
                <option value="yes" {{ getData($data, 'dispensed') == 'yes' ? ' selected' : '' }}>{{trans('main.yes')}}</option>
            </select>
            @if ($errors->has('dispensed'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('dispensed') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
