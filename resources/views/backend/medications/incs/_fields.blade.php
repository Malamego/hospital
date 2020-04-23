<div class="form-body">
  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
      <label class="col-md-2 control-label">{{ trans('main.name') }}</label>
      <div class="col-md-6">
          <input type="text" name="name" value="{{ getData($data, 'name') }}" class="form-control" placeholder="{{ trans('main.name') }}" >
          @if ($errors->has('name'))
              <span class="help-block">
                  <strong class="help-block">{{ $errors->first('name') }}</strong>
              </span>
          @endif
      </div>
  </div>

    {{-- Add Department --}}
    <div class="form-group{{ $errors->has('med_id') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.medicalform') }} <span class="required"></span> </label>
        <div class="col-md-6">
            <select class="form-control select2" id="med_id" name="med_id">
              <option value="">{{ trans('main.select department') }}</option>
              @foreach ($medf as $c)
                  <option value="{{ $c->id }}" {{ getData($data, 'med_id') == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
              @endforeach
            </select>
            @if ($errors->has('med_id'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('med_id') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('concen') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.concen') }}</label>
        <div class="col-md-6">
            <input type="text" name="concen" value="{{ getData($data, 'concen') }}" class="form-control" placeholder="{{ trans('main.concen') }}" >
            @if ($errors->has('concen'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('concen') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('desc') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.description') }}</label>
        <div class="col-md-6">
            <input type="text" name="desc" value="{{ getData($data, 'desc') }}" class="form-control" placeholder="{{ trans('main.desc') }}" >
            @if ($errors->has('desc'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('desc') }}</strong>
                </span>
            @endif
        </div>
    </div>

</div>
