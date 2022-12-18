@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-right">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Order Sele' }}</h4>
        </span>

        <div class="pull-left">

            <form method="POST" action="{!! route('order_seles.order_sele.destroy', $orderSele->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('order_seles.order_sele.index') }}" class="btn btn-primary" title="{{ trans('order_seles.show_all') }}">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('order_seles.order_sele.create') }}" class="btn btn-success" title="{{ trans('order_seles.create') }}">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                  
                    <button type="submit" class="btn btn-danger" title="{{ trans('order_seles.delete') }}" onclick="return confirm(&quot;{{ trans('order_seles.confirm_delete') }}?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('order_seles.Produit') }}</dt>
            <dd>{{ $orderSele->Produit }}</dd>
            <dt>{{ trans('order_seles.User') }}</dt>
            <dd>{{ optional($orderSele->user)->name }}</dd>
            <dt>{{ trans('order_seles.price') }}</dt>
            <dd>{{ $orderSele->price }}</dd>
            <dt>{{ trans('order_seles.datestart') }}</dt>
            <dd>{{ $orderSele->datestart }}</dd>
          
            <dt>{{ trans('order_seles.cautionnement') }}</dt>
            <dd>{{ $orderSele->cautionnement }}</dd>
            <dt>{{ trans('order_seles.total') }}</dt>
            <dd>{{ $orderSele->total }}</dd>

        </dl>

    </div>
</div>

@endsection