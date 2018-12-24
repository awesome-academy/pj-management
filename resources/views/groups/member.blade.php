@extends('master')
@section('title', __('eng.sub'))
@section('content')
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
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">{{ __('eng.id') }}</th>
                    <th scope="col">{{ __('eng.name') }}</th>
                    <th scope="col">{{ __('eng.action') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($member as $user)
                    <tr>
                        <th scope="row">{{ $user['user']['id'] }}</th>
                        <td><a href="{{ url('exercise/' . $user['user']['id'] . '/detail') }}">{{ $user['user']['name'] }}</a></td>
                        <td><a href="{{ url('exercise/' . $user['user']['id'] . '/delete') }}" onclick="return confirm('{{ __('eng.del_confirm') }}')">{{ __('eng.del') }}</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
