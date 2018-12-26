@extends('master')
@section('title', __('eng.register'))
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('eng.register') }}</div>
                    @if (session('status'))
                        <div class="alert alert-success-gradient">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-body">
                        {!! Form::open(['id' => 'form-validation', 'method' => 'POST', 'route' => 'postCreateUser' ]) !!}
                            <div class="form-group row">
                                {{ Form::label('name', __('eng.name'), ['class' => 'col-md-4 col-form-label text-md-right']) }}
                                <div class="col-md-6">
                                    {{ Form::text('name', null, ['class' => 'form-control']) }}
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('email', __('eng.email'), ['class' => 'col-md-4 col-form-label text-md-right']) }}
                                <div class="col-md-6">
                                    {{ Form::email('email', null, ['class' => 'form-control']) }}
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('password', __('eng.password'), ['class' => 'col-md-4 col-form-label text-md-right']) }}
                                <div class="col-md-6">
                                    {{ Form::password('password', ['class' => 'form-control']) }}
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('password-confirm', __('eng.rePassword'), ['class' => 'col-md-4 col-form-label text-md-right']) }}
                                <div class="col-md-6">
                                    {{ Form::password('password-confirm', ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="row">
                                {{ Form::label('role', __('eng.role'), ['class' => 'col-md-4 col-form-label text-md-right']) }}
                                <div class="col-md-8">
                                    {{ Form::radio('role_id', '1', ['readonly' => 'readonly', 'checked' => 'checked']) }}
                                    {{ Form::label('role', 'Student', ['class' => 'col-md-3 col-form-label text-md-right']) }}
                                    {{ Form::radio('role_id', '2', false) }}
                                    {{ Form::label('role', 'Teacher', ['class' => 'col-md-3 col-form-label text-md-right']) }}
                                    {{ Form::radio('role_id', '3', false) }}
                                    {{ Form::label('role', 'Admin', ['class' => 'col-md-3 col-form-label text-md-right']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-8">
                                    {!! Form::submit(__('eng.btn_submit'), ['class' => 'btn btn-gradient-success']) !!}
                                    {!! Form::reset(__('eng.btn_reset'), ['class' => 'btn btn-gradient-default']) !!}
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
