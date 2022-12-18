@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Slider' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('sliders.slider.destroy', $slider->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('sliders.slider.index') }}" class="btn btn-primary" title="{{ trans('sliders.show_all') }}">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('sliders.slider.create') }}" class="btn btn-success" title="{{ trans('sliders.create') }}">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('sliders.slider.edit', $slider->id ) }}" class="btn btn-primary" title="{{ trans('sliders.edit') }}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('sliders.delete') }}" onclick="return confirm(&quot;{{ trans('sliders.confirm_delete') }}?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('sliders.link') }}</dt>
            <dd>{{ $slider->link }}</dd>
            <dt>{{ trans('sliders.photo') }}</dt>
            <dd><img src="{{ asset('/ejar/public/images/' . $slider->photo) }}" style="width: 200px;height: 200px;"></dd>
            <dt>{{ trans('sliders.Date_start') }}</dt>
            <dd>{{ $slider->Date_start }}</dd>
            <dt>{{ trans('sliders.Date_end') }}</dt>
            <dd>{{ $slider->Date_end }}</dd>

        </dl>

    </div>
</div>

@endsection