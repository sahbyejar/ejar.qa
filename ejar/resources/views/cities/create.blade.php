@extends('layouts.app')

@section('content')

    <div class="panel panel-default">

        <div class="panel-heading clearfix">
            
            <span class="pull-right">
                <h4 class="mt-5 mb-5">{{ trans('cities.create') }}</h4>
            </span>

            <div class="btn-group btn-group-sm pull-left" role="group">
                <a href="{{ route('cities.city.index') }}" class="btn btn-primary" title="{{ trans('cities.show_all') }}">
                    <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                </a>
            </div>

        </div>

        <div class="panel-body">
        
            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('cities.city.store') }}" accept-charset="UTF-8" id="create_city_form" name="create_city_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('cities.form', [
                                        'city' => null,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="{{ trans('cities.add') }}">
                    </div>
                </div>

            </form>

        </div>
    </div>

@endsection


