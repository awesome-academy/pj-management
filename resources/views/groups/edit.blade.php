@extends('master')
@section('title', __('eng.createGroup'))
@section('content')
    <div class="card">
        <div class="card-header border bottom">
            <h4 class="card-title">{{ __('eng.createGroup') }}</h4>
        </div>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="card-body">
            <div class="row">
                <div class="col-sm-8">
                    {!! Form::model($group, ['id' => 'form-validation', 'method' => 'PUT', 'enctype' => 'multipart/form-data', 'routes' => 'group/' . $group->id . '/edit']) !!}
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
                        {!! Form::label('group_image', __('eng.image'), ['class' => 'col-sm-3 col-form-label control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::file('group_image', null, ['class' => 'form-control']) !!}
                        </div>
                        {!! $errors->first('group_image', '<span class="validate-error">:message</span>') !!}
                    </div>
                    <div class="form-group row">
                        {!! Form::label('subject_id', __('eng.sub'), ['class' => 'col-sm-3 col-form-label control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::select('subject_id', $subject, null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    {!! Form::submit(__('eng.btn_submit'), ['class' => 'btn btn-gradient-success']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
