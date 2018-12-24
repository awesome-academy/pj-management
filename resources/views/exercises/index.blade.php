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
            <i class="fa fa-edit"></i>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">{{ __('eng.id') }}</th>
                    <th scope="col">{{ __('eng.name') }}</th>
                    <th scope="col">{{ __('eng.created_by') }}</th>
                    @can('deleteEx', $group)
                    <th scope="col">{{ __('eng.action') }}</th>
                    @endcan
                </tr>
                </thead>
                <tbody>
                @foreach ($exercise as $ex)
                    <tr>
                        <th scope="row">{{ $ex->id }}</th>
                        <td><a href="{{ url('exercise/' . $ex->id . '/detail') }}">{{ $ex->name }}</a></td>
                        <td><a href="{{ url('user/' . $ex->user->id . '/detail') }}">{{ $ex->user->name }}</a></td>
                        @can('deleteEx', $group)
                        <td><a href="{{ url('exercise/' . $ex->id . '/delete') }}" onclick="return confirm('{{ __('eng.del_confirm') }}')">{{ __('eng.del') }}</a></td>
                        @endcan
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
