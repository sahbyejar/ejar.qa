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

              

               <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">{{ trans('sliders.model_plural') }}</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('sliders.slider.create') }}" class="btn btn-success" title="{{ trans('slider.create') }}">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>

    <div class="row">

        
        @if(count($sliders) == 0)
            <div class="panel-body text-center">
                <h4>{{ trans('sliders.none_available') }}</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table id="dataTables-example" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>{{ trans('sliders.link') }}</th>
                            <th>{{ trans('sliders.Date_start') }}</th>
                            <th>{{ trans('sliders.Date_end') }}</th>
                            <th>{{ trans('sliders.photo') }}</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($sliders as $slider)
                        <tr>
                            <td>{{ $slider->link }}</td>
                            <td>{{ $slider->Date_start }}</td>
                            <td>{{ $slider->Date_end }}</td>
                            <td><img src="{{ asset('/ejar/public/thumbs/' . $slider->photo) }}"></td>

                            <td>

                                <form method="POST" action="{!! route('sliders.slider.destroy', $slider->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('sliders.slider.show', $slider->id ) }}" class="btn btn-info" title="{{ trans('sliders.show') }}">
                                           {{ trans('sliders.show') }}
                                        </a>
                                        <a href="{{ route('sliders.slider.edit', $slider->id ) }}" class="btn btn-primary" title="{{ trans('sliders.edit') }}">
                                           {{ trans('sliders.edit') }}
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('sliders.delete') }}" onclick="return confirm(&quot;{{ trans('sliders.confirm_delete') }}&quot;)">
                                           {{ trans('sliders.delete') }} 
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
            {!! $sliders->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection