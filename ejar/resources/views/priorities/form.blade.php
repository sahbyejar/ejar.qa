
<div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
    <label for="type" class="col-md-2 control-label">{{ trans('priorities.type') }}</label>
    <div class="col-md-10">
        <select class="form-control" required id="type" name="type">
        	    <option value="" style="display: none;" {{ old('type', optional($priority)->type ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('priorities.type__placeholder') }}</option>
        	@foreach (['Vip1' => 'Vip1',
'Vip2' => 'Vip2',
'Premier' => 'Premier'] as $key => $text)
			    <option value="{{ $key }}" {{ old('type', optional($priority)->type) == $key ? 'selected' : '' }}>
			    	{{ $text }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('date_start') ? 'has-error' : '' }}">
    <label for="date_start" class="col-md-2 control-label">{{ trans('priorities.date_start') }}</label>
    <div class="col-md-10">
        <input class="form-control" required name="date_start" type="date" id="date_start" value="{{ old('date_start', optional($priority)->date_start) }}" placeholder="{{ trans('priorities.date_start__placeholder') }}">
        {!! $errors->first('date_start', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('date_end') ? 'has-error' : '' }}">
    <label for="date_end" class="col-md-2 control-label">{{ trans('priorities.date_end') }}</label>
    <div class="col-md-10">
        <input class="form-control" required name="date_end" type="date" id="date_end" value="{{ old('date_end', optional($priority)->date_end) }}" placeholder="{{ trans('priorities.date_end__placeholder') }}">
        {!! $errors->first('date_end', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
    <label for="user_id" class="col-md-2 control-label">{{ trans('priorities.user_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" required id="user_id" name="user_id">
        	    <option value="" style="display: none;" {{ old('user_id', optional($priority)->user_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('priorities.user_id__placeholder') }}</option>
        	@foreach ($users as $key => $user)
			    <option value="{{ $key }}" {{ old('user_id', optional($priority)->user_id) == $key ? 'selected' : '' }}>
			    	{{ $user }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('numbre') ? 'has-error' : '' }}">
    <label for="numbre" class="col-md-2 control-label">{{ trans('priorities.numbre') }}</label>
    <div class="col-md-10">
        <input class="form-control" required name="numbre" type="number" min="1" id="numbre" value="{{ old('numbre', optional($priority)->numbre) }}" minlength="1" placeholder="{{ trans('priorities.numbre__placeholder') }}">
        {!! $errors->first('numbre', '<p class="help-block">:message</p>') !!}
    </div>
</div>

