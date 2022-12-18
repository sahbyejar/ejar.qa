@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-right">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'إعدادات' }}</h4>
        </span>

        <div class="pull-left">

            <form method="POST" action="{!! route('settings.settings.destroy', $settings->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('settings.settings.index') }}" class="btn btn-primary" title="{{ trans('settings.show_all') }}">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

            
                    
                    <a href="{{ route('settings.settings.edit', $settings->id ) }}" class="btn btn-primary" title="{{ trans('settings.edit') }}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('settings.delete') }}" onclick="return confirm(&quot;{{ trans('settings.confirm_delete') }}?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('settings.Link_instagram') }}</dt>
            <dd>{{ $settings->Link_instagram }}</dd>
            <dt>{{ trans('settings.Link_contact') }}</dt>
            <dd>{{ $settings->Link_contact }}</dd>
            <dt>{{ trans('settings.Link_android') }}</dt>
            <dd>{{ $settings->Link_android }}</dd>
            <dt>{{ trans('settings.Link_ios') }}</dt>
            <dd>{{ $settings->Link_ios }}</dd>
            <dt>{{ trans('settings.Link_facebook') }}</dt>
            <dd>{{ $settings->Link_facebook }}</dd>
            <dt>{{ trans('settings.Terms_Condition_ar') }}</dt>
            <dd>{{ $settings->Terms_Condition_ar }}</dd>
            <dt>{{ trans('settings.Terms_Condition_eg') }}</dt>
            <dd>{{ $settings->Terms_Condition_eg }}</dd>

        </dl>

    </div>
</div>

@endsection