@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">{{ trans('vips.model_plural') }}</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('vips.vip.create') }}" class="btn btn-success" title="{{ trans('vips.create') }}">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($vips) == 0)
            <div class="panel-body text-center">
                <h4>{{ trans('vips.none_available') }}</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>{{ trans('vips.vip') }}</th>
                            <th>{{ trans('vips.date') }}</th>
                            <th>{{ trans('vips.Produit_id') }}</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($vips as $vip)
                        <tr>
                            <td>{{ $vip->vip }}</td>
                            <td>{{ $vip->date }}</td>
                            <td>{{ optional($vip->produit)->name }}</td>

                            <td>

                                <form method="POST" action="{!! route('vips.vip.destroy', $vip->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('vips.vip.show', $vip->id ) }}" class="btn btn-info" title="{{ trans('vips.show') }}">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('vips.vip.edit', $vip->id ) }}" class="btn btn-primary" title="{{ trans('vips.edit') }}">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('vips.delete') }}" onclick="return confirm(&quot;{{ trans('vips.confirm_delete') }}&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $vips->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection