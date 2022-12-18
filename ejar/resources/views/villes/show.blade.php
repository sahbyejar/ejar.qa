@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Ville' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('villes.ville.destroy', $ville->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('villes.ville.index') }}" class="btn btn-primary" title="{{ trans('villes.show_all') }}">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('villes.ville.create') }}" class="btn btn-success" title="{{ trans('villes.create') }}">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('villes.ville.edit', $ville->id ) }}" class="btn btn-primary" title="{{ trans('villes.edit') }}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('villes.delete') }}" onclick="return confirm(&quot;{{ trans('villes.confirm_delete') }}?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('villes.ville') }}</dt>
            <dd>{{ $ville->ville }}</dd>
            <dt>{{ trans('villes.name_ar') }}</dt>
            <dd>{{ $ville->name_ar }}</dd>
            <dt>{{ trans('villes.city_id') }}</dt>
            <dd>{{ optional($ville->city)->name }}</dd>

        </dl>

    </div>
</div>

@endsection