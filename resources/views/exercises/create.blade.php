@extends('master')
@section('title', __('eng.createEx'))
@section('content')
    <div class="card">
        <div class="card-header border bottom">
            <h4 class="card-title">{{ __('eng.createEx') }}</h4>
        </div>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="card-body">
            <div class="row">
                <div class="col-sm-8">
                    {!! Form::open(['id' => 'form-validation', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'routes' => 'exercise/' . $group->id . '/create']) !!}
                    @csrf
                    <div class="form-group row">
                        {!! Form::label('name', __('eng.group_name'), ['class' => 'col-sm-3 col-form-label control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('name', '<span class="validate-error">:message</span>') !!}
                        </div>
                        {!! Form::label('description', __('eng.label_desc'), ['class' => 'col-sm-3 col-form-label control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('description', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-10">
                            {!! Form::hidden('group_id', $group->id, ['class' => 'form-control', 'readonly']) !!}
                            {!! $errors->first('group_id', '<span class="validate-error">:message</span>') !!}
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                {!! Form::label('start_date', __('eng.start_Date'), ['class' => 'col-sm-5 col-form-label control-label']) !!}
                                <div class="icon-input">
                                    <i class="mdi mdi-calendar-clock"></i>
                                    {!! Form::text('start_date', null, ['class' => 'date form-control']) !!}
                                    {!! $errors->first('start_date', '<span class="validate-error">:message</span>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                {!! Form::label('end_date', __('eng.end_Date'), ['class' => 'col-sm-4 col-form-label control-label']) !!}
                                <div class="icon-input">
                                    <i class="mdi mdi-calendar-clock"></i>
                                    {!! Form::text('end_date', null, ['class' => 'date form-control']) !!}
                                    {!! $errors->first('end_date', '<span class="validate-error">:message</span>') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::submit(__('eng.btn_submit'), ['class' => 'btn btn-gradient-success']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
