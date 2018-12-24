@extends('master')
@section('title', __('eng.task'))
@section('content')
    <div class="card">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="card-header border bottom">
            <h4 class="card-title">{{ __('eng.task') }}</h4>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">{{ __('eng.id') }}</th>
                    <th scope="col">{{ __('eng.name') }}</th>
                    <th scope="col">{{ __('eng.file') }}</th>
                    <th scope="col">{{ __('eng.action') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($task as $task)
                    <tr>
                        <th scope="row">{{ $task['id'] }}</th>
                        <td>{{ $task['name'] }}</td>
                        <td><a href="{{ url('task/' . $task['id'] . '/download') }}" class="btn btn-gradient-info">{{ __('eng.download') }}</a></td>
                        <td><a href="{{ url('task/' . $task['id'] . '/delete') }}" onclick="return confirm('{{__('eng.del_confirm')}}');">{{ __('eng.del') }}</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
