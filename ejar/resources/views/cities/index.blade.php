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

            <div class="pull-right">
                <h4 class="mt-5 mb-5">{{ trans('cities.model_plural') }}</h4>
            </div>

            <div class="btn-group btn-group-sm pull-left" role="group">
                <a href="{{ route('cities.city.create') }}" class="btn btn-success" title="{{ trans('cities.create') }}">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($cities) == 0)
            <div class="panel-body text-center">
                <h4>{{ trans('cities.none_available') }}</h4>
            </div>
        @else
        <div class="panel-body ">
            <div class="table-responsive">

                <table id="dataTables-example" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>{{ trans('cities.name') }}</th>
                            <th>{{ trans('cities.name_ar') }}</th>
                            <th>{{ trans('cities.Countries') }}</th>

                            <th>{{ trans('general.action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($cities as $city)
                        <tr>
                            <td>{{ $city->name }}</td>
                            <td>{{ $city->name_ar }}</td>
                            <td>{{ $city->Countries->name }}</td>

                            <td>

                                <form method="POST" action="{!! route('cities.city.destroy', $city->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('cities.city.show', $city->id ) }}" class="btn btn-info" title="{{ trans('cities.show') }}">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('cities.city.edit', $city->id ) }}" class="btn btn-primary" title="{{ trans('cities.edit') }}">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('cities.delete') }}" onclick="return confirm(&quot;{{ trans('cities.confirm_delete') }}&quot;)">
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
            {!! $cities->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection