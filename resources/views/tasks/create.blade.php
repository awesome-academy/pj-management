@extends('master')
@section('title', __('eng.upload_task'))
@section('content')
    <div class="card">
        <div class="card-header border bottom">
            <h4 class="card-title">{{ __('eng.upload_task') }}</h4>
        </div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="row">
                <div class="col-sm-8">
                    {!! Form::open(['id' => 'form-validation', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'routes' => 'task.create']) !!}
                    @csrf
                    <div class="form-group row">
                        {!! Form::label('name', __('eng.name'), ['class' => 'col-sm-3 col-form-label control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('exercise', __('eng.exercise'), ['class' => 'col-sm-3 col-form-label control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('exercise', $exercise->name, ['class' => 'form-control', 'readonly']) !!}
                            {!! Form::hidden('exercise_id', $exercise->id, ['class' => 'form-control', 'readonly']) !!}
                            {!! Form::hidden('user_id', Auth::id(), ['class' => 'form-control', 'readonly']) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('description', __('eng.label_desc'), ['class' => 'col-sm-3 col-form-label control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('description', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('file', __('eng.file'), ['class' => 'col-sm-3 col-form-label control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::file('file', null, ['class' => 'form-control']) !!}
                        </div>
                        {!! $errors->first('file', '<span class="validate-error">:message</span>') !!}
                    </div>
                    <div class="form-group row">
                        {!! Form::label('link', __('eng.link'), ['class' => 'col-sm-3 col-form-label control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('link', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    {!! Form::submit(__('eng.btn_submit'), ['class' => 'btn btn-gradient-success']) !!}
                    {!! Form::reset(__('eng.btn_reset'), ['class' => 'btn btn-gradient-default']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
