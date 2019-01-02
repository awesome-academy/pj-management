@extends('master')
@section('title', __('eng.task'))
@section('content')
    <div class="card">
        <div class="card-header border bottom">
            <h4 class="card-title">{{ __('eng.role') }}</h4>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">{{ __('eng.id') }}</th>
                    <th scope="col">{{ __('eng.name') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($role as $role)
                    <tr>
                        <th scope="row">{{ $role->id }}</th>
                        <td>{{ $role->name }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
