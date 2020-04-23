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
                        <a class="btn btn-circle btn-icon-only btn-default" href="{{ route('prescriptions.create') }}" data-toggle="tooltip" title="{{trans('main.add')}}  {{trans('main.prescriptions')}}"> <i class="fa fa-plus"></i> </a>
                        <a class="btn btn-circle btn-icon-only btn-default" href="{{ route('prescriptions.edit', [$show->id]) }}" data-toggle="tooltip" title="{{ trans('main.edit') }}  {{ trans('main.job') }}"> <i class="fa fa-edit"></i> </a>
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
                                        {{trans('main.ask-delete')}} {{ $show->name }} !
                                    </div>
                                    <div class="modal-footer">
                                        {!! Form::open([ 'method' => 'DELETE', 'route' => ['prescriptions.destroy', $show->id] ]) !!}
                                        {!! Form::submit(trans('main.approval'), ['class' => 'btn btn-danger']) !!}
                                        <a class="btn btn-default" data-dismiss="modal">
                                            {{ trans('main.cancel') }}
                                        </a>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-circle btn-icon-only btn-default" href="{{ route('prescriptions.index') }}" data-toggle="tooltip" title="{{trans('main.show-all')}}  {{trans('main.prescriptions')}}"> <i class="fa fa-list"></i> </a>
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#" data-original-title="{{trans('main.full-screen')}}" title="{{trans('main.full-screen')}}"> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                          <strong>{{trans('main.patname')}} : </strong>
                          {{ trans( $show->pat_relation->name ) }}
                          <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.preid')}} : </strong>
                            {{ $show->id }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.doctor')}} : </strong>
                            {{ trans( $show->user_relation->name ) }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.department')}} : </strong>
                            {{ trans( $show->pat_relation->dep_relation->name ) }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.urea')}} : </strong>
                            {{ trans( $show->urea ) }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.creatinie')}} : </strong>
                            {{ trans( $show->creatinie  ) }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.potassium')}} : </strong>
                            {{ trans( $show->potassium  ) }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.alt')}} : </strong>
                            {{ trans( $show->alt  ) }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.ast')}} : </strong>
                            {{ trans( $show->ast  ) }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.bilirubin')}} : </strong>
                            {{ trans( $show->bilirubin   ) }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.albumin')}} : </strong>
                            {{ trans( $show->albumin   ) }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.dispensed')}} : </strong>
                            {{ trans( $show->dispensed ) }}
                            <br><hr>
                        </div>
                        <div class="col-md-12">
                            <strong>{{trans('main.medications')}} : </strong>
                            {{ trans( $show->showMeds() ) }}
                            <br><hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
