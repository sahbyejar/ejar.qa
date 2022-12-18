@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
  
        <div class="panel-heading clearfix">

            
            <div class="btn-group btn-group-sm pull-right" role="group">

                <a href="{{ route('settings.settings.index') }}" class="btn btn-primary" title="{{ trans('settings.show_all') }}">
                    <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                </a>


            </div>
            <div class="pull-left">
                <h4 class="mt-5 mb-5">{{ !empty($title) ? $title : 'إعدادات' }}</h4>
            </div>
        </div>

        <div class="panel-body">

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('settings.settings.update', $settings->id) }}" id="edit_settings_form" name="edit_settings_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('settings.form', [
                                        'settings' => $settings,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="{{ trans('settings.update') }}">
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection