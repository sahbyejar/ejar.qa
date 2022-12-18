@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Priority' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('priorities.priority.destroy', $priority->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('priorities.priority.index') }}" class="btn btn-primary" title="{{ trans('priorities.show_all') }}">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('priorities.priority.create') }}" class="btn btn-success" title="{{ trans('priorities.create') }}">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('priorities.priority.edit', $priority->id ) }}" class="btn btn-primary" title="{{ trans('priorities.edit') }}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('priorities.delete') }}" onclick="return confirm(&quot;{{ trans('priorities.confirm_delete') }}?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('priorities.type') }}</dt>
            <dd>{{ $priority->type }}</dd>
            <dt>{{ trans('priorities.date_start') }}</dt>
            <dd>{{ $priority->date_start }}</dd>
            <dt>{{ trans('priorities.date_end') }}</dt>
            <dd>{{ $priority->date_end }}</dd>
            <dt>{{ trans('priorities.user_id') }}</dt>
            <dd>{{ optional($priority->user)->name }}</dd>
            <dt>{{ trans('priorities.numbre') }}</dt>
            <dd>{{ $priority->numbre }}</dd>

        </dl>

    </div>
</div>

@endsection