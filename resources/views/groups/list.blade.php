@extends('master')
@section('title', __('eng.group'))
@section('content')
    <div class="row">
        @foreach($groups as $group)
            <div class="col-md-4">
                <div class="card">
                    <a href="{{ url('group/' . $group->id . '/detail') }}"><img class="card-img-top" src="{{ asset(config('app.group_image') . $group->group_image) }}" alt="#"></a>
                    <div class="card-body">
                        <h4 class="card-title m-t-10"><a href="{{ url('group/' . $group->id . '/detail') }}">{{ $group->name }}</a></h4>
                        <p class="card-text">{{ $group->description }}</p>
                        <div class="m-t-20">
                            <a href="{{ url('group/' . $group->id . '/join') }}" class="btn btn-gradient-success">{{ __('eng.join') }}</a>
                            @can('delete', $group)
                            <a href="{{ url('group/' . $group->id . '/delete') }}"  class="btn btn-gradient-warning" onclick="return confirm('{{ __('eng.del_confirm') }}');">{{ __('eng.del') }}</a>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop
