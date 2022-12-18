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
                <h4 class="mt-5 mb-5">{{ trans('settings.model_plural') }}</h4>
            </div>
@if(count($settingsObjects) == 0)
            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('settings.settings.create') }}" class="btn btn-success" title="{{ trans('settings.create') }}">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

            @endif

        </div>
        
        @if(count($settingsObjects) == 0)
            <div class="panel-body text-center">
                <h4>{{ trans('settings.none_available') }}</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>{{ trans('settings.Link_instagram') }}</th>
                            <th>{{ trans('settings.Link_contact') }}</th>
                            <th>{{ trans('settings.Link_android') }}</th>
                            <th>{{ trans('settings.Link_ios') }}</th>
                            <th>{{ trans('settings.Link_facebook') }}</th>
                            <th>{{ trans('settings.produit_user') }}</th>
                            
                            <th>{{ trans('settings.Terms_Condition_ar') }}</th>
                            <th>{{ trans('settings.Terms_Condition_eg') }}</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($settingsObjects as $settings)
                        <tr>
                            <td>{{ $settings->Link_instagram }}</td>
                            <td>{{ $settings->Link_contact }}</td>
                            <td>{{ $settings->Link_android }}</td>
                            <td>{{ $settings->Link_ios }}</td>
                            <td>{{ $settings->Link_facebook }}</td>
                            <td>{{ $settings->produit_user }}</td>
                            <td>{{ $settings->Terms_Condition_ar }}</td>
                            <td>{{ $settings->Terms_Condition_eg }}</td>

                            <td>

                                <form method="POST" action="{!! route('settings.settings.destroy', $settings->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('settings.settings.show', $settings->id ) }}" class="btn btn-info" title="{{ trans('settings.show') }}">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('settings.settings.edit', $settings->id ) }}" class="btn btn-primary" title="{{ trans('settings.edit') }}">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('settings.delete') }}" onclick="return confirm(&quot;{{ trans('settings.confirm_delete') }}&quot;)">
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
            {!! $settingsObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection