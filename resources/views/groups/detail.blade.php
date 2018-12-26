@extends('master')
@section('title', __('eng.group'))
@section('content')
    <div class="row">
        @can('createEx', $group)
            <div class="col-2">
                {!! Form::open(['method' => 'GET', 'url' => 'exercise/' . $group->id . '/create']) !!}
                {!! Form::submit(__('eng.createEx'), ['class' => 'btn btn-gradient-success']) !!}
                {!! Form::close() !!}
            </div>
        @endcan
        <div class="col-2">
            <a href="{{ url('group/' . $group->id . '/exercise') }}" class="btn btn-gradient-info">{{ __('eng.exercise') }}</a>
        </div>
    </div>
    <div class="card">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="card-header border bottom">
            <h4 class="card-title">{{ __('eng.group') }}</h4>
            @can('update', $group)
                <a href="{{ url('group/' . $group->id . '/edit') }}" class="mdi mdi-pencil m-r-5"></a>
            @endcan
        </div>
        <div class="card-body">
            <img class="card-img-top" src="{{ asset(config('app.group_image') . $group->group_image) }}" alt="#">
            <div class="card-text">
                <h1>{{ $group->name }}</h1>
                @if (isset($group->user))
                <h5>{{ __('eng.created_by') }} <a href="#">{{ $group->user->name }}</a></h5>
                @endif
            </div>
            <div class="content">
                <p>{{ $group->description }}</p>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header border bottom">
            <h4 class="card-title">{{ __('eng.user') }}</h4>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">{{ __('eng.id') }}</th>
                    <th scope="col">{{ __('eng.name') }}</th>
                    @can('update', $group)
                    <th scope="col">{{ __('eng.action') }}</th>
                    @endcan
                </tr>
                </thead>
                <tbody>
                @foreach ($member as $user)
                    <tr>
                        <th scope="row">{{ $user['user']['id'] }}</th>
                        <td><a href="{{ url('user/' . $user['user']['id'] . '/detail') }}">{{ $user['user']['name'] }}</a></td>
                        @can('update', $group)
                        <td><a href="{{ url('user/' . $user['user']['id'] . '/delete') }}" onclick="return confirm('{{ __('eng.del_confirm') }}')">{{ __('eng.del') }}</a></td>
                        @endcan
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
