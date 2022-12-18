@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-right">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'طلب الإيجار' }}</h4>
        </span>

        <div class="pull-left">

            <form method="POST" action="{!! route('order_rents.order_rent.destroy', $orderRent->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('order_rents.order_rent.index') }}" class="btn btn-primary" title="{{ trans('order_rents.show_all') }}">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('order_rents.order_rent.create') }}" class="btn btn-success" title="{{ trans('order_rents.create') }}">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
           

                    <button type="submit" class="btn btn-danger" title="{{ trans('order_rents.delete') }}" onclick="return confirm(&quot;{{ trans('order_rents.confirm_delete') }}?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('order_rents.Produit') }}</dt>
            <dd>{{ $orderRent->Produit }}</dd>
            <dt>{{ trans('order_rents.User') }}</dt>
            <dd>{{ optional($orderRent->user)->name }}</dd>
            <dt>{{ trans('order_rents.price') }}</dt>
            <dd>{{ $orderRent->price }} QAR</dd>
            <dt>{{ trans('order_rents.datestart') }}</dt>
            <dd>{{ $orderRent->datestart }}</dd>
            <dt>{{ trans('order_rents.dateend') }}</dt>
            <dd>{{ $orderRent->dateend }}</dd>
            <dt>{{ trans('order_rents.cautionnement') }}</dt>
            <dd>{{ $orderRent->cautionnement }} QAR</dd>
            <dt>{{ trans('order_rents.total') }}</dt>
            <dd>{{ $orderRent->total }} QAR</dd>

        </dl>

    </div>
</div>

@endsection