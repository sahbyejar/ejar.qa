@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-right">
            <h4 class="mt-5 mb-5">{{ isset($city->name) ? $city->name : 'City' }}</h4>
        </span>

        <div class="pull-left">

            <form method="POST" action="{!! route('cities.city.destroy', $city->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('cities.city.index') }}" class="btn btn-primary" title="{{ trans('cities.show_all') }}">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('cities.city.create') }}" class="btn btn-success" title="{{ trans('cities.create') }}">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('cities.city.edit', $city->id ) }}" class="btn btn-primary" title="{{ trans('cities.edit') }}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('cities.delete') }}" onclick="return confirm(&quot;{{ trans('cities.confirm_delete') }}?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('cities.name') }}</dt>
            <dd>{{ $city->name }}</dd>
            <dt>{{ trans('cities.name_ar') }}</dt>
            <dd>{{ $city->name_ar }}</dd>

            <dt>{{ trans('cities.Countries') }}</dt>
            <dd>{{ $city->Countries->name}}</dd>


            

        </dl>

    </div>
</div>

@endsection