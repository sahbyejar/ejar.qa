
<div class="form-group {{ $errors->has('link') ? 'has-error' : '' }}">
    <label for="link" class="col-md-2 control-label">{{ trans('sliders.link') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="link" type="text" id="link" value="{{ old('link', optional($slider)->link) }}" minlength="1" placeholder="{{ trans('sliders.link__placeholder') }}">
        {!! $errors->first('link', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
    <label for="photo" class="col-md-2 control-label">{{ trans('sliders.photo') }}</label>
    <div class="col-md-10">
        <div class="input-group uploaded-file-group">
              @if (isset($slider->photo) && !empty($slider->photo))
         <img id="blah" src="{{ asset('/ejar/public/images/' . $slider->photo) }}" alt=" " style="height:260px;width:260px;border-style: solid;border-width:2px;border-color:#3C8DBC;" />
              @else
         <img id="blah" src="http://ejar.qa/ejar/public/images/slider/erpQEl0kWQvCBTNCMb66PghDDoZVR8aFR3ye5dEN.jpg" alt=" " style="height:260px;width:260px;border-style: solid;border-width:2px;border-color:#3C8DBC;" />
              @endif<br><br>
<input type='file' name="photo" id="photo" class="form-control" onchange="readURL(this);" required  /><br>
        </div>

     
        {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Date_start') ? 'has-error' : '' }}">
    <label for="Date_start" class="col-md-2 control-label">{{ trans('sliders.Date_start') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="Date_start" type="date" id="Date_start" value="{{ old('Date_start', optional($slider)->Date_start) }}" placeholder="{{ trans('sliders.Date_start__placeholder') }}">
        {!! $errors->first('Date_start', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Date_end') ? 'has-error' : '' }}">
    <label for="Date_end" class="col-md-2 control-label">{{ trans('sliders.Date_end') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="Date_end" type="date" id="Date_end" value="{{ old('Date_end', optional($slider)->Date_end) }}" placeholder="{{ trans('sliders.Date_end__placeholder') }}">
        {!! $errors->first('Date_end', '<p class="help-block">:message</p>') !!}
    </div>
</div>

