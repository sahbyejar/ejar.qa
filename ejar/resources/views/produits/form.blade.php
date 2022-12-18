
<div class="form-group {{ $errors->has('name_ar') ? 'has-error' : '' }}">
    <label for="name_ar" class="col-md-2 control-label">{{ trans('produits.name_ar') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="name_ar" type="text" id="name_ar" value="{{ old('name_ar', optional($produit)->name_ar) }}" minlength="1" placeholder="{{ trans('produits.name_ar__placeholder') }}">
        {!! $errors->first('name_ar', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">{{ trans('produits.name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($produit)->name) }}" minlength="1" maxlength="255" placeholder="{{ trans('produits.name__placeholder') }}">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
    <label for="photo" class="col-md-2 control-label">{{ trans('produits.photo') }}</label>
    <div class="col-md-10">
        <div class="input-group uploaded-file-group">
            <label class="input-group-btn">
                <span class="btn btn-default">
                    Browse <input type="file" name="photo" id="photo" class="hidden">
                </span>
            </label>
            <input type="text" class="form-control uploaded-file-name" readonly>
        </div>

        @if (isset($produit->photo) && !empty($produit->photo))
            <div class="input-group input-width-input">
                <span class="input-group-addon">
                    <input type="checkbox" name="custom_delete_photo" class="custom-delete-file" value="1" {{ old('custom_delete_photo', '0') == '1' ? 'checked' : '' }}> Delete
                </span>

                <span class="input-group-addon custom-delete-file-name">
                    {{ $produit->photo }}
                </span>
            </div>
        @endif
        {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('discription_ar') ? 'has-error' : '' }}">
    <label for="discription_ar" class="col-md-2 control-label">{{ trans('produits.discription_ar') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="discription_ar" type="text" id="discription_ar" value="{{ old('discription_ar', optional($produit)->discription_ar) }}" minlength="1" placeholder="{{ trans('produits.discription_ar__placeholder') }}">
        {!! $errors->first('discription_ar', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('discription') ? 'has-error' : '' }}">
    <label for="discription" class="col-md-2 control-label">{{ trans('produits.discription') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="discription" type="text" id="discription" value="{{ old('discription', optional($produit)->discription) }}" minlength="1" placeholder="{{ trans('produits.discription__placeholder') }}">
        {!! $errors->first('discription', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
    <label for="price" class="col-md-2 control-label">{{ trans('produits.price') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="price" type="text" id="price" value="{{ old('price', optional($produit)->price) }}" minlength="1" placeholder="{{ trans('produits.price__placeholder') }}">
        {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
    <label for="phone" class="col-md-2 control-label">{{ trans('produits.phone') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="phone" type="text" id="phone" value="{{ old('phone', optional($produit)->phone) }}" minlength="1" placeholder="{{ trans('produits.phone__placeholder') }}">
        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('ville_id') ? 'has-error' : '' }}">
    <label for="ville_id" class="col-md-2 control-label">{{ trans('produits.ville_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="ville_id" name="ville_id">
        	    <option value="" style="display: none;" {{ old('ville_id', optional($produit)->ville_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('produits.ville_id__placeholder') }}</option>
        	@foreach ($villes as $key => $ville)
			    <option value="{{ $key }}" {{ old('ville_id', optional($produit)->ville_id) == $key ? 'selected' : '' }}>
			    	{{ $ville }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('ville_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('city_id') ? 'has-error' : '' }}">
    <label for="city_id" class="col-md-2 control-label">{{ trans('produits.city_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="city_id" name="city_id">
        	    <option value="" style="display: none;" {{ old('city_id', optional($produit)->city_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('produits.city_id__placeholder') }}</option>
        	@foreach ($cities as $key => $city)
			    <option value="{{ $key }}" {{ old('city_id', optional($produit)->city_id) == $key ? 'selected' : '' }}>
			    	{{ $city }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('city_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>







  <div class="col-md-6">
<div class="box box-success">
<div class="box-header with-border">
      <h3 class="box-title"> location informations</h3>
     </div>
       <div class="box-body">
                  <div class="content"> 
                   click  position in the map
          <!---------- el map ------------->
         <div class="form-group col-sm-10" style="padding:10px">
            <div id="mape" style="    height: 300px;width: 400; "></div>
        </div> 
        </div> </div>
               <div class="box-body">
                 
                <div class="form-group col-sm-12">
                  <label for="latitude" class="col-sm-2 control-label">Latitude</label>
                   <div class="form-group col-sm-10">
                  <input type="text" class=" col-sm-10 form-control" value="{{ old('latitude', optional($produit)->latitude) }}" id="latitude" placeholder="latitude " name="latitude" readonly required>
                </div>
                </div>
                <div class="form-group col-sm-12">
                  <label for="longitude" class="col-sm-2 control-label">Longitude</label>
                   <div class="form-group col-sm-10">
                  <input type="text" class="col-sm-10 form-control" value="{{ old('longitude', optional($produit)->longitude) }}" id="longitude" placeholder="longitude " name="longitude" readonly required>
                </div>
            </div>
</div>
            







<div class="form-group {{ $errors->has('instagrame') ? 'has-error' : '' }}">
    <label for="instagrame" class="col-md-2 control-label">{{ trans('produits.instagrame') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="instagrame" type="text" id="instagrame" value="{{ old('instagrame', optional($produit)->instagrame) }}" minlength="1" placeholder="{{ trans('produits.instagrame__placeholder') }}">
        {!! $errors->first('instagrame', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('facebook') ? 'has-error' : '' }}">
    <label for="facebook" class="col-md-2 control-label">{{ trans('produits.facebook') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="facebook" type="text" id="facebook" value="{{ old('facebook', optional($produit)->facebook) }}" minlength="1" placeholder="{{ trans('produits.facebook__placeholder') }}">
        {!! $errors->first('facebook', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('siteweb') ? 'has-error' : '' }}">
    <label for="siteweb" class="col-md-2 control-label">{{ trans('produits.siteweb') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="siteweb" type="text" id="siteweb" value="{{ old('siteweb', optional($produit)->siteweb) }}" minlength="1" placeholder="{{ trans('produits.siteweb__placeholder') }}">
        {!! $errors->first('siteweb', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('whatsapp') ? 'has-error' : '' }}">
    <label for="whatsapp" class="col-md-2 control-label">{{ trans('produits.whatsapp') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="whatsapp" type="text" id="whatsapp" value="{{ old('whatsapp', optional($produit)->whatsapp) }}" minlength="1" placeholder="{{ trans('produits.whatsapp__placeholder') }}">
        {!! $errors->first('whatsapp', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('rent_sale') ? 'has-error' : '' }}">
    <label for="rent_sale" class="col-md-2 control-label">{{ trans('produits.rent_sale') }}</label>
    <div class="col-md-10">
        <div class="checkbox">
            <label for="rent_sale_no">
            	<input id="rent_sale_no" class="required" name="rent_sale" type="checkbox" value="No" checked="checked" {{  old('rent_sale', optional($produit)->rent_sale)  }}>
                No
            </label>
        </div>
        <div class="checkbox">
            <label for="rent_sale_yes">
            	<input id="rent_sale_yes" class="required" name="rent_sale" type="checkbox" value="Yes" {{ old('rent_sale', optional($produit)->rent_sale)  }}>
                Yes
            </label>
        </div>

        {!! $errors->first('rent_sale', '<p class="help-block">:message</p>') !!}
    </div>
</div>




<div class="form-group {{ $errors->has('chiket') ? 'has-error' : '' }}">
    <label for="chiket" class="col-md-2 control-label">{{ trans('produits.chiket') }}</label>
    <div class="col-md-10">
        <div class="checkbox">
            <label for="chiket_no">
            	<input id="chiket_no" class="required" name="chiket" type="checkbox" value="No" checked="checked" {{  old('chiket', optional($produit)->chiket)  }}>
                No
            </label>
        </div>
        <div class="checkbox">
            <label for="chiket_yes">
            	<input id="chiket_yes" class="required" name="chiket" type="checkbox" value="Yes" {{ old('chiket', optional($produit)->chiket)  }}>
                Yes
            </label>
        </div>

        {!! $errors->first('chiket', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('cautionnement') ? 'has-error' : '' }}">
    <label for="cautionnement" class="col-md-2 control-label">{{ trans('produits.cautionnement') }}</label>
    <div class="col-md-10">
        <div class="checkbox">
            <label for="cautionnement_no">
            	<input id="cautionnement_no" class="required" name="cautionnement" type="checkbox" value="No" checked="checked" {{  old('cautionnement', optional($produit)->cautionnement)  }}>
                No
            </label>
        </div>
        <div class="checkbox">
            <label for="cautionnement_yes">
            	<input id="cautionnement_yes" class="required" name="cautionnement" type="checkbox" value="Yes" {{ old('cautionnement', optional($produit)->cautionnement)  }}>
                Yes
            </label>
        </div>

        {!! $errors->first('cautionnement', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('price_cautionnement') ? 'has-error' : '' }}">
    <label for="price_cautionnement" class="col-md-2 control-label">{{ trans('produits.price_cautionnement') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="price_cautionnement" type="text" id="price_cautionnement" value="{{ old('price_cautionnement', optional($produit)->price_cautionnement) }}" minlength="1" placeholder="{{ trans('produits.price_cautionnement__placeholder') }}">
        {!! $errors->first('price_cautionnement', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('espacer') ? 'has-error' : '' }}">
    <label for="espacer" class="col-md-2 control-label">{{ trans('produits.espacer') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="espacer" type="text" id="espacer" value="{{ old('espacer', optional($produit)->espacer) }}" minlength="1" placeholder="{{ trans('produits.espacer__placeholder') }}">
        {!! $errors->first('espacer', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('interface') ? 'has-error' : '' }}">
    <label for="interface" class="col-md-2 control-label">{{ trans('produits.interface') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="interface" type="text" id="interface" value="{{ old('interface', optional($produit)->interface) }}" minlength="1" placeholder="{{ trans('produits.interface__placeholder') }}">
        {!! $errors->first('interface', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('wifi') ? 'has-error' : '' }}">
    <label for="wifi" class="col-md-2 control-label">{{ trans('produits.wifi') }}</label>
    <div class="col-md-10">
        <div class="checkbox">
            <label for="wifi_no">
            	<input id="wifi_no" class="required" name="wifi" type="checkbox" value="No" checked="checked" {{  old('wifi', optional($produit)->wifi)  }}>
                No
            </label>
        </div>
        <div class="checkbox">
            <label for="wifi_yes">
            	<input id="wifi_yes" class="required" name="wifi" type="checkbox" value="Yes" {{ old('wifi', optional($produit)->wifi)  }}>
                Yes
            </label>
        </div>

        {!! $errors->first('wifi', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('kahramam') ? 'has-error' : '' }}">
    <label for="kahramam" class="col-md-2 control-label">{{ trans('produits.kahramam') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="kahramam" type="text" id="kahramam" value="{{ old('kahramam', optional($produit)->kahramam) }}" minlength="1" placeholder="{{ trans('produits.kahramam__placeholder') }}">
        {!! $errors->first('kahramam', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('route_principale') ? 'has-error' : '' }}">
    <label for="route_principale" class="col-md-2 control-label">{{ trans('produits.route_principale') }}</label>
    <div class="col-md-10">
        <div class="checkbox">
            <label for="route_principale_no">
            	<input id="route_principale_no" class="required" name="route_principale" type="checkbox" value="No" checked="checked" {{  old('route_principale', optional($produit)->route_principale)  }}>
                No
            </label>
        </div>
        <div class="checkbox">
            <label for="route_principale_yes">
            	<input id="route_principale_yes" class="required" name="route_principale" type="checkbox" value="Yes" {{ old('route_principale', optional($produit)->route_principale)  }}>
                Yes
            </label>
        </div>

        {!! $errors->first('route_principale', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('commission') ? 'has-error' : '' }}">
    <label for="commission" class="col-md-2 control-label">{{ trans('produits.commission') }}</label>
    <div class="col-md-10">
        <div class="checkbox">
            <label for="commission_1">
            	<input id="commission_1" class="required" name="commission" type="checkbox" value="1" {{ in_array('1', old('commission', optional($produit)->commission)  }}>
                No
            </label>
        </div>
        <div class="checkbox">
            <label for="commission_2">
            	<input id="commission_2" class="required" name="commission" type="checkbox" value="2" {{ in_array('2', old('commission', optional($produit)->commission)  }}>
                demi
            </label>
        </div>
        <div class="checkbox">
            <label for="commission_3">
            	<input id="commission_3" class="required" name="commission" type="checkbox" value="3" {{ in_array('3', old('commission', optional($produit)->commission)  }}>
                Yes
            </label>
        </div>

        {!! $errors->first('commission', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('vip1') ? 'has-error' : '' }}">
    <label for="vip1" class="col-md-2 control-label">{{ trans('produits.vip1') }}</label>
    <div class="col-md-10">
        <div class="checkbox">
            <label for="vip1_no">
            	<input id="vip1_no" class="required" name="vip1" type="checkbox" value="No" checked="checked" {{  old('vip1', optional($produit)->vip1)  }}>
                No
            </label>
        </div>
        <div class="checkbox">
            <label for="vip1_yes">
            	<input id="vip1_yes" class="required" name="vip1" type="checkbox" value="Yes" {{ old('vip1', optional($produit)->vip1)  }}>
                Yes
            </label>
        </div>

        {!! $errors->first('vip1', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('vip2') ? 'has-error' : '' }}">
    <label for="vip2" class="col-md-2 control-label">{{ trans('produits.vip2') }}</label>
    <div class="col-md-10">
        <div class="checkbox">
            <label for="vip2_no">
            	<input id="vip2_no" class="required" name="vip2" type="checkbox" value="No" checked="checked" {{  old('vip2', optional($produit)->vip2)  }}>
                No
            </label>
        </div>
        <div class="checkbox">
            <label for="vip2_yes">
            	<input id="vip2_yes" class="required" name="vip2" type="checkbox" value="Yes" {{ old('vip2', optional($produit)->vip2)  }}>
                Yes
            </label>
        </div>

        {!! $errors->first('vip2', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('parking') ? 'has-error' : '' }}">
    <label for="parking" class="col-md-2 control-label">{{ trans('produits.parking') }}</label>
    <div class="col-md-10">
        <div class="checkbox">
            <label for="parking_no">
            	<input id="parking_no" class="required" name="parking" type="checkbox" value="No" checked="checked" {{  old('parking', optional($produit)->parking)  }}>
                No
            </label>
        </div>
        <div class="checkbox">
            <label for="parking_yes">
            	<input id="parking_yes" class="required" name="parking" type="checkbox" value="Yes" {{ old('parking', optional($produit)->parking)  }}>
                Yes
            </label>
        </div>

        {!! $errors->first('parking', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Piscine') ? 'has-error' : '' }}">
    <label for="Piscine" class="col-md-2 control-label">{{ trans('produits.Piscine') }}</label>
    <div class="col-md-10">
        <div class="checkbox">
            <label for="Piscine_no">
            	<input id="Piscine_no" class="required" name="Piscine" type="checkbox" value="No" checked="checked" {{  old('Piscine', optional($produit)->Piscine)  }}>
                No
            </label>
        </div>
        <div class="checkbox">
            <label for="Piscine_yes">
            	<input id="Piscine_yes" class="required" name="Piscine" type="checkbox" value="Yes" {{ old('Piscine', optional($produit)->Piscine)  }}>
                Yes
            </label>
        </div>

        {!! $errors->first('Piscine', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('gym') ? 'has-error' : '' }}">
    <label for="gym" class="col-md-2 control-label">{{ trans('produits.gym') }}</label>
    <div class="col-md-10">
        <div class="checkbox">
            <label for="gym_no">
            	<input id="gym_no" class="required" name="gym" type="checkbox" value="No" checked="checked" {{  old('gym', optional($produit)->gym)  }}>
                No
            </label>
        </div>
        <div class="checkbox">
            <label for="gym_yes">
            	<input id="gym_yes" class="required" name="gym" type="checkbox" value="Yes" {{ old('gym', optional($produit)->gym)  }}>
                Yes
            </label>
        </div>

        {!! $errors->first('gym', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('firstsaken') ? 'has-error' : '' }}">
    <label for="firstsaken" class="col-md-2 control-label">{{ trans('produits.firstsaken') }}</label>
    <div class="col-md-10">
        <div class="checkbox">
            <label for="firstsaken_no">
            	<input id="firstsaken_no" class="required" name="firstsaken" type="checkbox" value="No" checked="checked" {{  old('firstsaken', optional($produit)->firstsaken)  }}>
                No
            </label>
        </div>
        <div class="checkbox">
            <label for="firstsaken_yes">
            	<input id="firstsaken_yes" class="required" name="firstsaken" type="checkbox" value="Yes" {{ old('firstsaken', optional($produit)->firstsaken)  }}>
                Yes
            </label>
        </div>

        {!! $errors->first('firstsaken', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('salon') ? 'has-error' : '' }}">
    <label for="salon" class="col-md-2 control-label">{{ trans('produits.salon') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="salon" type="text" id="salon" value="{{ old('salon', optional($produit)->salon) }}" minlength="1" placeholder="{{ trans('produits.salon__placeholder') }}">
        {!! $errors->first('salon', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('toilet') ? 'has-error' : '' }}">
    <label for="toilet" class="col-md-2 control-label">{{ trans('produits.toilet') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="toilet" type="text" id="toilet" value="{{ old('toilet', optional($produit)->toilet) }}" minlength="1" placeholder="{{ trans('produits.toilet__placeholder') }}">
        {!! $errors->first('toilet', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('room') ? 'has-error' : '' }}">
    <label for="room" class="col-md-2 control-label">{{ trans('produits.room') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="room" type="text" id="room" value="{{ old('room', optional($produit)->room) }}" minlength="1" placeholder="{{ trans('produits.room__placeholder') }}">
        {!! $errors->first('room', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('officeoy') ? 'has-error' : '' }}">
    <label for="officeoy" class="col-md-2 control-label">{{ trans('produits.officeoy') }}</label>
    <div class="col-md-10">
        <div class="checkbox">
            <label for="officeoy_no">
            	<input id="officeoy_no" class="required" name="officeoy" type="checkbox" value="No" checked="checked" {{  old('officeoy', optional($produit)->officeoy)  }}>
                No
            </label>
        </div>
        <div class="checkbox">
            <label for="officeoy_yes">
            	<input id="officeoy_yes" class="required" name="officeoy" type="checkbox" value="Yes" {{ old('officeoy', optional($produit)->officeoy)  }}>
                Yes
            </label>
        </div>

        {!! $errors->first('officeoy', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('office') ? 'has-error' : '' }}">
    <label for="office" class="col-md-2 control-label">{{ trans('produits.office') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="office" type="text" id="office" value="{{ old('office', optional($produit)->office) }}" minlength="1" placeholder="{{ trans('produits.office__placeholder') }}">
        {!! $errors->first('office', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('secretary') ? 'has-error' : '' }}">
    <label for="secretary" class="col-md-2 control-label">{{ trans('produits.secretary') }}</label>
    <div class="col-md-10">
        <div class="checkbox">
            <label for="secretary_no">
            	<input id="secretary_no" class="required" name="secretary" type="checkbox" value="No" checked="checked" {{  old('secretary', optional($produit)->secretary)  }}>
                No
            </label>
        </div>
        <div class="checkbox">
            <label for="secretary_yes">
            	<input id="secretary_yes" class="required" name="secretary" type="checkbox" value="Yes" {{ old('secretary', optional($produit)->secretary)  }}>
                Yes
            </label>
        </div>

        {!! $errors->first('secretary', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('imprimerie') ? 'has-error' : '' }}">
    <label for="imprimerie" class="col-md-2 control-label">{{ trans('produits.imprimerie') }}</label>
    <div class="col-md-10">
        <div class="checkbox">
            <label for="imprimerie_no">
            	<input id="imprimerie_no" class="required" name="imprimerie" type="checkbox" value="No" checked="checked" {{  old('imprimerie', optional($produit)->imprimerie)  }}>
                No
            </label>
        </div>
        <div class="checkbox">
            <label for="imprimerie_yes">
            	<input id="imprimerie_yes" class="required" name="imprimerie" type="checkbox" value="Yes" {{ old('imprimerie', optional($produit)->imprimerie)  }}>
                Yes
            </label>
        </div>

        {!! $errors->first('imprimerie', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('DELETED') ? 'has-error' : '' }}">
    <label for="DELETED" class="col-md-2 control-label">{{ trans('produits.DELETED') }}</label>
    <div class="col-md-10">
        <div class="checkbox">
            <label for="DELETED_no">
            	<input id="DELETED_no" class="required" name="DELETED" type="checkbox" value="No" checked="checked" {{  old('DELETED', optional($produit)->DELETED)  }}>
                No
            </label>
        </div>
        <div class="checkbox">
            <label for="DELETED_yes">
            	<input id="DELETED_yes" class="required" name="DELETED" type="checkbox" value="Yes" {{ old('DELETED', optional($produit)->DELETED)  }}>
                Yes
            </label>
        </div>

        {!! $errors->first('DELETED', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('accepted') ? 'has-error' : '' }}">
    <label for="accepted" class="col-md-2 control-label">{{ trans('produits.accepted') }}</label>
    <div class="col-md-10">
        <div class="checkbox">
            <label for="accepted_no">
            	<input id="accepted_no" class="required" name="accepted" type="checkbox" value="No" checked="checked" {{  old('accepted', optional($produit)->accepted)  }}>
                No
            </label>
        </div>
        <div class="checkbox">
            <label for="accepted_yes">
            	<input id="accepted_yes" class="required" name="accepted" type="checkbox" value="Yes" {{ old('accepted', optional($produit)->accepted)  }}>
                Yes
            </label>
        </div>

        {!! $errors->first('accepted', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('furnished') ? 'has-error' : '' }}">
    <label for="furnished" class="col-md-2 control-label">{{ trans('produits.furnished') }}</label>
    <div class="col-md-10">
        <div class="checkbox">
            <label for="furnished_no">
            	<input id="furnished_no" class="required" name="furnished" type="checkbox" value="No" checked="checked" {{  old('furnished', optional($produit)->furnished)  }}>
                No
            </label>
        </div>
        <div class="checkbox">
            <label for="furnished_yes">
            	<input id="furnished_yes" class="required" name="furnished" type="checkbox" value="Yes" {{  old('furnished', optional($produit)->furnished) }}>
                Yes
            </label>
        </div>

        {!! $errors->first('furnished', '<p class="help-block">:message</p>') !!}
    </div>
</div>

