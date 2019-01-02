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
                    {!! Form::open(['id' => 'form-validation', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'routes' => 'user/role/create']) !!}
                    @csrf
                    <div class="form-group row">
                        {!! Form::label('name', __('eng.exercise_name'), ['class' => 'col-sm-3 col-form-label control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('name', '<span class="validate-error">:message</span>') !!}
                        </div>
                    </div>
                    {!! Form::submit(__('eng.btn_submit'), ['class' => 'btn btn-gradient-success']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
