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
                <h4 class="mt-5 mb-5">{{ trans('villes.model_plural') }}</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('villes.ville.create') }}" class="btn btn-success" title="{{ trans('villes.create') }}">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($villes) == 0)
            <div class="panel-body text-center">
                <h4>{{ trans('villes.none_available') }}</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table id="dataTables-example" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>{{ trans('villes.ville') }}</th>
                            <th>{{ trans('villes.name_ar') }}</th>
                            <th>{{ trans('villes.city_id') }}</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($villes as $ville)
                        <tr>
                            <td>{{ $ville->ville }}</td>
                            <td>{{ $ville->name_ar }}</td>
                            <td>{{ optional($ville->city)->name }}</td>

                            <td>

                                <form method="POST" action="{!! route('villes.ville.destroy', $ville->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('villes.ville.show', $ville->id ) }}" class="btn btn-info" title="{{ trans('villes.show') }}">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('villes.ville.edit', $ville->id ) }}" class="btn btn-primary" title="{{ trans('villes.edit') }}">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('villes.delete') }}" onclick="return confirm(&quot;{{ trans('villes.confirm_delete') }}&quot;)">
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
            {!! $villes->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection