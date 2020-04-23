<div class="form-body">
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.name') }} <span class="required"></span> </label>
        <div class="col-md-6">
            <input type="text" name="name" value="{{ getData($data, 'name') }}" class="form-control" placeholder="{{ trans('main.name') }}" required>
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('name') }}</strong>
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
