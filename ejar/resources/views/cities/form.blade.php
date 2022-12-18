
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">{{ trans('cities.name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($city)->name) }}" minlength="1" maxlength="255" placeholder="{{ trans('cities.name__placeholder') }}">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name_ar') ? 'has-error' : '' }}">
    <label for="name_ar" class="col-md-2 control-label">{{ trans('cities.name_ar') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="name_ar" type="text" id="name_ar" value="{{ old('name_ar', optional($city)->name_ar) }}" minlength="1" placeholder="{{ trans('cities.name_ar__placeholder') }}">
        {!! $errors->first('name_ar', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('countre_id') ? 'has-error' : '' }}">
    <label for="countre_id" class="col-md-2 control-label">{{ trans('cities.Countries') }}</label>
    <div class="col-md-10">
        <select class="form-control" name="countre_id"  id="countre_id" value="{{ old('countre_id', optional($city)->countre_id) }}" minlength="1" >
             <option value="{{ old('countre_id', optional($city)->countre_id ?: '') == '' ? 'selected' : '' }}" style="display: none;" {{ old('countre_id', optional($city)->countre_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('cities.countre_id__placeholder') }}</option>

                @foreach ($countries as $key => $countrie)
                <option value="{{  $countrie->id }}" {{ old('countre_id', optional($city)->countre_id) == $countrie->id ? 'selected' : '' }}>
                    {{ $countrie->name }}
                </option>
            @endforeach
            
        </select>
        {!! $errors->first('countre_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

