@extends('master')
@section('title', __('eng.sub'))
@section('content')
    {!! Form::open(['method' => 'GET', 'url' => 'task/' . $exercise->id . '/create']) !!}
        {!! Form::submit(__('eng.upload'), ['class' => 'btn btn-gradient-success']) !!}
    {!! Form::close() !!}
    <div class="card">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="card-header border bottom">
            <h4 class="card-title">{{ __('eng.exercise') }}</h4>
        </div>
        <div class="card-body">
            <div class="card-text">
                <h1>{{ $exercise->name }}</h1>
                @if (isset($exercise->user))
                <h5>{{ __('eng.created_by') }} <a href="#">{{ $exercise->user->name }}</a></h5>
                @endif
            </div>
            <div class="content">
                <p>{{ $exercise->description }}</p>
            </div>
            <div class="content">
                <p>{{ $exercise->start_date }}</p>
            </div>
            <div class="content">
                <p>{{ $exercise->end_date }}</p>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header border bottom">
            <h4 class="card-title">{{ __('eng.task') }}</h4>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">{{ __('eng.id') }}</th>
                        <th scope="col">{{ __('eng.name') }}</th>
                        <th scope="col">{{ __('eng.user') }}</th>
                        <th scope="col">{{ __('eng.file') }}</th>
                        @can('deleteEx', $group)
                        <th scope="col">{{ __('eng.action') }}</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                @foreach ($task as $task)
                    <tr>
                        <th scope="row">{{ $task['id'] }}</th>
                        <td>{{ $task['name'] }}</td>
                        @if (isset($task->user))
                        <td><a href="{{ url('user/' . $task->user->id . '/detail') }}">{{ $task->user->name }}</a></td>
                        @else
                        <td></td>
                        @endif
                        <td><a href="{{ url('task/' . $task['id'] . '/download') }}" class="btn btn-gradient-info ">{{ __('eng.download') }}</a></td>
                        @can('deleteEx', $group)
                        <td>
                            <a href="{{ url('task/' . $task['id'] . '/edit') }}" onclick="return confirm('{{__('eng.del_confirm')}}');"><i class="ti-pencil"></i></a>
                            <a href="{{ url('task/' . $task['id'] . '/delete') }}" onclick="return confirm('{{__('eng.del_confirm')}}');"><i class="ti-trash"></i></a>
                        </td>
                        @endcan
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
