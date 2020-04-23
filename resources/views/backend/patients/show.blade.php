@extends('backend.theme.layout.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject bold uppercase font-blue">{{$title}}</span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-circle btn-icon-only btn-default" href="{{ route('patients.create') }}" data-toggle="tooltip" title="{{trans('main.add')}}  {{trans('main.patients')}}"> <i class="fa fa-plus"></i> </a>
                        <a class="btn btn-circle btn-icon-only btn-default" href="{{ route('patients.edit', [$show->id]) }}" data-toggle="tooltip" title="{{ trans('main.edit') }}  {{ trans('main.job') }}"> <i class="fa fa-edit"></i> </a>
                        <span data-toggle="tooltip" title="{{ trans('main.delete') }}  {{ trans('main.job') }}">
                            <a data-toggle="modal" data-target="#myModal{{ $show->id }}" class="btn btn-circle btn-icon-only btn-default" href=""> <i class="fa fa-trash"></i> </a>
                        </span>
                        <div class="modal fade" id="myModal{{ $show->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal">x</button>
                                        <h4 class="modal-title">
                                            {{trans('main.delete')}}
                                        </h4>
                                    </div>
                                    <div class="modal-body">
                                        {{trans('main.ask-delete')}} {{ $show->title }} !
                                    </div>
                                    <div class="modal-footer">
                                        {!! Form::open([ 'method' => 'DELETE', 'route' => ['patients.destroy', $show->id] ]) !!}
                                        {!! Form::submit(trans('main.approval'), ['class' => 'btn btn-danger']) !!}
                                        <a class="btn btn-default" data-dismiss="modal">
                                            {{ trans('main.cancel') }}
                                        </a>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-circle btn-icon-only btn-default" href="{{ route('patients.index') }}" data-toggle="tooltip" title="{{trans('main.show-all')}}  {{trans('main.patients')}}"> <i class="fa fa-list"></i> </a>
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#" data-original-title="{{trans('main.full-screen')}}" title="{{trans('main.full-screen')}}"> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                          <strong>{{trans('main.name')}} : </strong>
                          {{ $show->name }}
                          <br><hr>
                        </div>
                        <div class="col-md-6">
                          <strong>{{trans('main.doctor')}} : </strong>
                          {{ $show->user_relation->name  }}
                          <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.image')}} : </strong>
                            <img style="width: 200px; height: 150px;" src="{{ ShowImage($show->image) }}" alt="">
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                          <strong>{{trans('main.address')}} : </strong>
                          {{ $show->address }}
                          <br><hr>
                        </div>
                        <div class="col-md-6">
                          <strong>{{trans('main.age')}} : </strong>
                          {{ $show->age }}
                          <br><hr>
                        </div>
                        <div class="col-md-6">
                          <strong>{{trans('main.weight')}} : </strong>
                          {{ $show->weight }}
                          <br><hr>
                        </div>
                        <div class="col-md-6">
                          <strong>{{trans('main.department')}} : </strong>
                          {{ $show->dep_relation->name }}
                          <br><hr>
                        </div>
                        <div class="col-md-6">
                          <strong>{{trans('main.bedn')}} : </strong>
                          {{ $show->bed_relation->number }}
                          <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.email')}} : </strong>
                            <a href="mailto:{{ $show->email }}">{{ $show->email }}</a>
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                          <strong>{{trans('main.phone')}} : </strong>
                          {{ $show->phone }}
                          <br><hr>
                        </div>
                        <div class="col-md-6">
                          <strong>{{trans('main.regdate')}} : </strong>
                          {{ $show->regdate }}
                          <br><hr>
                        </div>
                        <div class="col-md-6">
                          <strong>{{trans('main.sex')}} : </strong>
                          {{ $show->sex }}
                          <br><hr>
                        </div>
                        <div class="col-md-6">
                          <strong>{{trans('main.smoker')}} : </strong>
                          {{ $show->smoker }}
                          <br><hr>
                        </div>
                        <div class="col-md-6">
                          <strong>{{trans('main.hypertensive')}} : </strong>
                          {{ $show->hypertensive }}
                          <br><hr>
                        </div>
                        <div class="col-md-6">
                          <strong>{{trans('main.diabetic')}} : </strong>
                          {{ $show->diabetic }}
                          <br><hr>
                        </div>
                        <div class="col-md-12">
                            <strong>{{trans('main.history')}} : </strong>
                            {!! $show->history !!}
                            <br><hr>
                        </div>
                        <div class="col-md-12">
                            <strong>{{trans('main.ecg')}} : </strong>
                            {!! $show->ecg !!}
                            <br><hr>
                        </div>
                        <div class="col-md-12">
                            <strong>{{trans('main.echo')}} : </strong>
                            {!! $show->echo !!}
                            <br><hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
