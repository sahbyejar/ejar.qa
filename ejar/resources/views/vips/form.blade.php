
<div class="form-group {{ $errors->has('vip') ? 'has-error' : '' }}">
    <label for="vip" class="col-md-2 control-label">{{ trans('vips.vip') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="vip" type="number" id="vip" value="{{ old('vip', optional($vip)->vip) }}" min="1" placeholder="{{ trans('vips.vip__placeholder') }}">
        {!! $errors->first('vip', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
    <label for="date" class="col-md-2 control-label">{{ trans('vips.date') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="date" type="text" id="date" value="{{ old('date', optional($vip)->date) }}" minlength="1" placeholder="{{ trans('vips.date__placeholder') }}">
        {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Produit_id') ? 'has-error' : '' }}">
    <label for="Produit_id" class="col-md-2 control-label">{{ trans('vips.Produit_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="Produit_id" name="Produit_id">
        	    <option value="" style="display: none;" {{ old('Produit_id', optional($vip)->Produit_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('vips.Produit_id__placeholder') }}</option>
        	@foreach ($produits as $key => $produit)
			    <option value="{{ $key }}" {{ old('Produit_id', optional($vip)->Produit_id) == $key ? 'selected' : '' }}>
			    	{{ $produit }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('Produit_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

