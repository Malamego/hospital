<div class="form-body">
  <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}">
      <label class="col-md-2 control-label">{{ trans('main.bedn') }} <span class="required"></span> </label>
      <div class="col-md-6">
          <input type="number" name="number"  value="{{ getData($data, 'number') }}" class="form-control" placeholder="{{ trans('main.number') }}" required>
          @if ($errors->has('number'))
              <span class="help-block">
                  <strong class="help-block">{{ $errors->first('number') }}</strong>
              </span>
          @endif
      </div>
  </div>

    {{-- Add Department --}}
    <div class="form-group{{ $errors->has('dep_id') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.department') }} <span class="required"></span> </label>
        <div class="col-md-6">
            <select class="form-control select2" id="dep_id" name="dep_id">
              <option value="">{{ trans('main.select department') }}</option>
              @foreach ($dep as $c)
                  <option value="{{ $c->id }}" {{ getData($data, 'dep_id') == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
              @endforeach
            </select>
            @if ($errors->has('dep_id'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('dep_id') }}</strong>
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


        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
            <label class="col-md-2 control-label">{{ trans('main.status') }} </label>
            <div class="col-md-6">
                <select class="form-control select2" id="status" name="status">
                    <option value="">{{ trans('main.status') }}</option>
                    <option value="open" {{ getData($data, 'status') == 'open' ? ' selected' : '' }}>{{trans('main.open')}}</option>
                    <option value="close" {{ getData($data, 'status') == 'close' ? ' selected' : '' }}>{{trans('main.close')}}</option>
                </select>
                @if ($errors->has('status'))
                    <span class="help-block">
                        <strong class="help-block">{{ $errors->first('status') }}</strong>
                    </span>
                @endif
            </div>
        </div>
</div>
