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
                <h4 class="mt-5 mb-5">{{ trans('priorities.model_plural') }}</h4>
            </div>

            <div class="btn-group btn-group-sm pull-left" role="group">
                <a href="{{ route('priorities.priority.create') }}" class="btn btn-success" title="{{ trans('priorities.create') }}">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($priorities) == 0)
            <div class="panel-body text-center">
                <h4>{{ trans('priorities.none_available') }}</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>{{ trans('priorities.user_id') }}</th>
                            <th>{{ trans('priorities.type') }}</th>
                            <th>{{ trans('priorities.date_start') }}</th>
                            <th>{{ trans('priorities.date_end') }}</th>
                            
                            <th>{{ trans('priorities.numbre') }}</th>
                             <th>{{ trans('priorities.numbre') }}</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($priorities as $priority)
                          @if($priority->day > 0 )
                     <tr style="    background: teal;">
                   @else
                    <tr style="    background: #b92c28;">
                    @endif
                            <td>{{ optional($priority->user)->name }}</td>
                            <td>{{ $priority->type }}</td>
                            <td>{{ $priority->date_start }}</td>
                            <td>{{ $priority->date_end }}</td>
                            
                            <td>{{ $priority->numbre }}</td>
                             <td>{{ $priority->day }}</td>

                            <td>

                                <form method="POST" action="{!! route('priorities.priority.destroy', $priority->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('priorities.priority.show', $priority->id ) }}" class="btn btn-info" title="{{ trans('priorities.show') }}">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('priorities.priority.edit', $priority->id ) }}" class="btn btn-primary" title="{{ trans('priorities.edit') }}">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('priorities.delete') }}" onclick="return confirm(&quot;{{ trans('priorities.confirm_delete') }}&quot;)">
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
          {!! $priorities->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection