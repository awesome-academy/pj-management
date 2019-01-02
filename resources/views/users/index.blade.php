@extends('master')
@section('title', __('eng.user'))
@section('content')
    <div class="card">
        @if (session('status'))
            <div class="alert alert-success-gradient">
                {{ session('status') }}
            </div>
        @endif
        <div class="card-header border bottom">
            <h4 class="card-title">{{ __('eng.user') }}</h4>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">{{ __('eng.id') }}</th>
                    <th scope="col">{{ __('eng.name') }}</th>
                    <th scope="col">{{ __('eng.role') }}</th>
                    <th scope="col">{{ __('eng.action') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $user['id'] }}</th>
                        <td>{{ $user['name'] }}</td>
                        <td>{{ $user->role->name }}</td>
                        <td><a href="{{ url('user/' . $user['id'] . '/delete') }}" onclick="return confirm('{{ __('eng.del_confirm') }}');">{{ __('eng.del') }}</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>
@endsection
