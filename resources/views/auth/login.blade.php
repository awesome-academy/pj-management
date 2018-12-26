@extends('master')
@section('title', __('eng.login'))
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>
                @if (session('status'))
                    <div class="alert alert-info-gradient">
                        {{ session('status') }}
                    </div>
                @endif
                @if (session('warning'))
                    <div class="alert alert-danger-gradient">
                        {{ session('warning') }}
                    </div>
                @endif
                <div class="card-body">
                    {!! Form::open(['id' => 'form-validation', 'method' => 'POST', 'route' => 'login' ]) !!}
                        @csrf
                        <div class="form-group row">
                            {{ Form::label('email', __('eng.email'), ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::text('email', null, ['class' => 'form-control']) }}
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
                                {{ Form::password('password', ['class' => 'form-control', 'required' => 'required']) }}

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    {!! Form::checkbox('remember', null, ['class' => 'form-check-input']) !!}
                                    {!! Form::label('remember', __('eng.remember_me'), ['class' => 'form-check-label']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                {!! Form::submit(__('eng.btn_submit'), ['class' => 'btn btn-gradient-success']) !!}
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('eng.forgot') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
