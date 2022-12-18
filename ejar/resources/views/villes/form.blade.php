
<div class="form-group {{ $errors->has('ville') ? 'has-error' : '' }}">
    <label for="ville" class="col-md-2 control-label">{{ trans('villes.ville') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="ville" type="text" id="ville" value="{{ old('ville', optional($ville)->ville) }}" minlength="1" placeholder="{{ trans('villes.ville__placeholder') }}">
        {!! $errors->first('ville', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name_ar') ? 'has-error' : '' }}">
    <label for="name_ar" class="col-md-2 control-label">{{ trans('villes.name_ar') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="name_ar" type="text" id="name_ar" value="{{ old('name_ar', optional($ville)->name_ar) }}" minlength="1" placeholder="{{ trans('villes.name_ar__placeholder') }}">
        {!! $errors->first('name_ar', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('city_id') ? 'has-error' : '' }}">
    <label for="city_id" class="col-md-2 control-label">{{ trans('villes.city_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="city_id" name="city_id">
        	    <option value="" style="display: none;" {{ old('city_id', optional($ville)->city_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('villes.city_id__placeholder') }}</option>
        	@foreach ($cities as $key => $city)
			    <option value="{{ $key }}" {{ old('city_id', optional($ville)->city_id) == $key ? 'selected' : '' }}>
			    	{{ $city }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('city_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

