<div class="form-body">
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.name') }} <span class="required"></span> </label>
        <div class="col-md-10">
            <input type="text" name="name" value="{{ getData($data, 'name') }}" class="form-control" placeholder="{{ trans('main.name') }}" required>
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.address') }} <span class="required"></span> </label>
        <div class="col-md-10">
            <input type="text" name="address" value="{{ getData($data, 'address') }}" class="form-control" placeholder="{{ trans('main.address') }}" required>
            @if ($errors->has('address'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('address') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('age') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.age') }} <span class="required"></span> </label>
        <div class="col-md-6">
            <input type="number" name="age"  value="{{ getData($data, 'age') }}" class="form-control" placeholder="{{ trans('main.age') }}" required>
            @if ($errors->has('age'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('age') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('weight') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.weight') }} <span class="required"></span> </label>
        <div class="col-md-6">
            <input type="number" step="0.01" name="weight"  value="{{ getData($data, 'weight') }}" class="form-control" placeholder="{{ trans('main.weight') }}" required>
            @if ($errors->has('weight'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('weight') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <!-- Add by Mario for Phone -->
        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
            <label class="col-md-2 control-label">{{ trans('main.phone') }} <span class="required"></span> </label>
            <div class="col-md-10">
                <input type="text" name="phone" value="{{ getData($data, 'phone') }}" class="form-control" placeholder="{{ trans('main.phone') }}" required>
                @if ($errors->has('phone'))
                    <span class="help-block">
                        <strong class="help-block">{{ $errors->first('phone') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('history') ? ' has-error' : '' }}">
            <label class="col-md-2 control-label">{{ trans('main.history') }} <span class="required"></span> </label>
            <div class="col-md-10">
                <textarea name="history" class="form-control" placeholder="{{ trans('main.history') }}">{{ getData($data, 'history') }}</textarea>
                @if ($errors->has('history'))
                    <span class="help-block">
                        <strong class="help-block">{{ $errors->first('history') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('ecg') ? ' has-error' : '' }}">
            <label class="col-md-2 control-label">{{ trans('main.ecg') }} <span class="required"></span> </label>
            <div class="col-md-10">
                <textarea name="ecg" class="form-control" placeholder="{{ trans('main.ecg') }}">{{ getData($data, 'ecg') }}</textarea>
                @if ($errors->has('ecg'))
                    <span class="help-block">
                        <strong class="help-block">{{ $errors->first('ecg') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('echo') ? ' has-error' : '' }}">
            <label class="col-md-2 control-label">{{ trans('main.echo') }} <span class="required"></span> </label>
            <div class="col-md-10">
                <textarea name="echo" class="form-control" placeholder="{{ trans('main.echo') }}">{{ getData($data, 'echo') }}</textarea>
                @if ($errors->has('echo'))
                    <span class="help-block">
                        <strong class="help-block">{{ $errors->first('echo') }}</strong>
                    </span>
                @endif
            </div>
        </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.email') }} </label>
        <div class="col-md-10">
            <input type="email" name="email" value="{{ getData($data, 'email') }}" class="form-control" placeholder="{{ trans('main.email') }}" required>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <!-- Add Patient's Department -->
    <div class="form-group{{ $errors->has('dep_id') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.department') }}  </label>
        <div class="col-md-10">
            <select class="form-control" id="dep_id" name="dep_id">
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

    <!-- Add Patient's Bed -->
    <div class="form-group{{ $errors->has('bed_id') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.bedn') }}  </label>
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
<!-- تاريخ الدخول -->
    <div class="form-group{{ $errors->has('regdate') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.regdate') }}  </label>
        <div class="col-md-8">
            <div class="input-group date date-picker" data-date-format="yyyy-mm-dd" data-date-start-date="+0d">
                <input type="text" name="regdate" class="form-control" value="{{ getData($data, 'regdate') }}" readonly required>
                <span class="input-group-btn">
                    <button class="btn default" type="button">
                        <i class="fa fa-calendar"></i>
                    </button>
                </span>
            </div>
            @if ($errors->has('regdate'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('regdate') }}</strong>
                </span>
            @endif
        </div>
    </div>


    <div class="form-group{{ $errors->has('sex') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.sex') }} <span class="required"></span> </label>
        <div class="col-md-10">
            <select class="form-control" id="sex" name="sex">
                <option value=""></option>
                <option value="male" {{ getData($data, 'sex') == 'male' ? ' selected' : '' }}>{{trans('main.male')}}</option>
                <option value="female" {{ getData($data, 'sex') == 'female' ? ' selected' : '' }}>{{trans('main.female')}}</option>
            </select>
            @if ($errors->has('sex'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('sex') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('smoker') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.smoker') }} <span class="required"></span> </label>
        <div class="col-md-10">
            <select class="form-control" id="smoker" name="smoker">
                <option value=""></option>
                <option value="yes" {{ getData($data, 'smoker') == 'yes' ? ' selected' : '' }}>{{trans('main.yes')}}</option>
                <option value="no" {{ getData($data, 'smoker') == 'no' ? ' selected' : '' }}>{{trans('main.no')}}</option>
            </select>
            @if ($errors->has('smoker'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('smoker') }}</strong>
                </span>
            @endif
        </div>
    </div>
<!-- hypertensive الضغط -->
    <div class="form-group{{ $errors->has('hypertensive') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.hypertensive') }} <span class="required"></span> </label>
        <div class="col-md-10">
            <select class="form-control" id="hypertensive" name="hypertensive">
                <option value=""></option>
                <option value="yes" {{ getData($data, 'hypertensive') == 'yes' ? ' selected' : '' }}>{{trans('main.yes')}}</option>
                <option value="no" {{ getData($data, 'hypertensive') == 'no' ? ' selected' : '' }}>{{trans('main.no')}}</option>
            </select>
            @if ($errors->has('hypertensive'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('hypertensive') }}</strong>
                </span>
            @endif
        </div>
    </div>

<!-- diabetic مرض السكري -->
    <div class="form-group{{ $errors->has('diabetic') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.diabetic') }} <span class="required"></span> </label>
        <div class="col-md-10">
            <select class="form-control" id="diabetic" name="diabetic">
                <option value=""></option>
                <option value="yes" {{ getData($data, 'diabetic') == 'yes' ? ' selected' : '' }}>{{trans('main.yes')}}</option>
                <option value="no" {{ getData($data, 'diabetic') == 'no' ? ' selected' : '' }}>{{trans('main.no')}}</option>
            </select>
            @if ($errors->has('diabetic'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('diabetic') }}</strong>
                </span>
            @endif
        </div>
    </div>

        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
            <label class="control-label col-md-2">{{ trans('main.image') }}</label>
            <div class="col-md-10">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                        @if (checkValue(getData($data, 'image')))
                            <img src="{{ ShowImage(getData($data, 'image')) }}" alt="" />
                        @endif
                    </div>
                    <div>
                        <span class="btn red btn-outline btn-file">
                            <span class="fileinput-new"> {{ trans('main.select_image') }} </span>
                            <span class="fileinput-exists"> {{ trans('main.change') }} </span>
                            <input type="file" name="image">
                        </span>
                        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> {{ trans('main.remove') }} </a>
                    </div>
                </div>
                @if ($errors->has('image'))
                    <span class="help-block">
                        <strong class="help-block">{{ $errors->first('image') }}</strong>
                    </span>
                @endif
            </div>
        </div>

</div>
