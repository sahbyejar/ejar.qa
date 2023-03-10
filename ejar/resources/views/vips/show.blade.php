@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Vip' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('vips.vip.destroy', $vip->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('vips.vip.index') }}" class="btn btn-primary" title="{{ trans('vips.show_all') }}">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('vips.vip.create') }}" class="btn btn-success" title="{{ trans('vips.create') }}">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('vips.vip.edit', $vip->id ) }}" class="btn btn-primary" title="{{ trans('vips.edit') }}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('vips.delete') }}" onclick="return confirm(&quot;{{ trans('vips.confirm_delete') }}?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('vips.vip') }}</dt>
            <dd>{{ $vip->vip }}</dd>
            <dt>{{ trans('vips.date') }}</dt>
            <dd>{{ $vip->date }}</dd>
            <dt>{{ trans('vips.Produit_id') }}</dt>
            <dd>{{ optional($vip->produit)->name }}</dd>

        </dl>

    </div>
</div>

@endsection