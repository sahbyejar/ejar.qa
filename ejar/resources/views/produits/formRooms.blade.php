
   <div class="col-md-12">
<div class="panel panel-success">
<div class="panel-heading clearfixr">
      <h3 class="panel-title">{{trans('produits.info_general') }}
</h3>
     </div>
     
       <div class="panel-body">
                  <div class="content"> 

<div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
    <label for="photo" class="col-md-2 control-label">{{ trans('produits.photo') }}</label>
    <div class="col-md-10">
        <div class="input-group uploaded-file-group">
            <label class="input-group-btn">
               
                  
                <span class="btn btn-default" style="background: transparent; border: transparent;">
                     <img id="blah" src="http://ejar.qa/images/LOGO.png" alt=" " style="height:260px;width:260px;border-radius: 50%;border-style: solid;border-width:2px;border-color:#3C8DBC;" />
                    
                     <input required type="file" name="photo[]" onchange="readURL(this);" id="photo[]" style="" class="form-control" multiple>
                </span>
            </label>
          
        </div>

       
        {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name_ar') ? 'has-error' : '' }}">
    <label for="name_ar" class="col-md-2 control-label">{{ trans('produits.name_ar') }}</label>
    <div class="col-md-10">
        <input required class="form-control" name="name_ar" type="text" id="name_ar" value="{{ old('name_ar', optional($produit)->name_ar) }}" minlength="1" placeholder="{{ trans('produits.name_ar__placeholder') }}">
        {!! $errors->first('name_ar', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">{{ trans('produits.name') }}</label>
    <div class="col-md-10">
        <input required class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($produit)->name) }}" minlength="1" maxlength="255" placeholder="{{ trans('produits.name__placeholder') }}">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>





<div class="form-group {{ $errors->has('discription_ar') ? 'has-error' : '' }}">
    <label for="discription_ar" class="col-md-2 control-label">{{ trans('produits.discription_ar') }}</label>
    <div class="col-md-10">
        <input required class="form-control" name="discription_ar" type="text" id="discription_ar" value="{{ old('discription_ar', optional($produit)->discription_ar) }}" minlength="1" placeholder="{{ trans('produits.discription_ar__placeholder') }}">
        {!! $errors->first('discription_ar', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('discription') ? 'has-error' : '' }}">
    <label for="discription" class="col-md-2 control-label">{{ trans('produits.discription') }}</label>
    <div class="col-md-10">
       <input required class="form-control" name="price" type="text" id="price" value="{{ old('price', optional($produit)->price) }}" minlength="1"  min="100"placeholder="{{ trans('produits.price__placeholder') }}">
        {!! $errors->first('discription', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
    <label for="price" class="col-md-2 control-label">{{ trans('produits.price') }}</label>
    <div class="col-md-10">
        <input required class="form-control" name="price" type="number" id="price" value="{{ old('price', optional($produit)->price) }}" minlength="1" placeholder="{{ trans('produits.price__placeholder') }}">
        {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
    <label for="phone" class="col-md-2 control-label">{{ trans('produits.phone') }}</label>
    <div class="col-md-10">
      <input required class="form-control col-md-6" name="phone" type="tel" style="direction: ltr; text-align: end;" id="phone" value="{{ Auth::user()->phone}}" minlength="1" maxlength="8" placeholder="12 -345-678">
        <select class="form-control col-md-2" name="phone_code" style="    margin-right: 15px;" required>

            @foreach($countries as $key => $value)
            <option value="+{{$value->phonecode}}" {{ old('phonecode', optional( Auth::user())->phone_code) == +$value->phonecode ? 'selected' : '' }}>{{$value->phonecode}}+</option>
            @endforeach
        </select>
        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
    </div>
</div>

</div>         
</div>
</div>
</div>



   <div class="col-md-6">
<div class="panel panel-success">
<div class="panel-heading clearfixr">
      <h3 class="panel-title">{{trans('produits.info_localication') }}</h3>
     </div>
     
       <div class="panel-body">
                  <div class="content"> 
               {{trans('produits.click_map') }}
          <!---------- el map ------------->
         <div class="form-group col-sm-12" style="padding:10px">
            <div id="mape" style="    height: 300px;width: 400; "></div>
        </div> 
        </div>
         </div>
               <div class="panel-body">
                  
             <div class="form-group col-sm-12">
                  <label for="latitude" class="col-sm-2 control-label">{{trans('produits.Latitude') }}</label>
                   <div class="form-group col-sm-10">
                  <input required  step="any" type="number" class=" col-sm-10 form-control" value="{{ old('latitude', optional($produit)->latitude) }}" id="latitude" placeholder="latitude " name="latitude"  required >
                </div>
                </div>
                <div class="form-group col-sm-12">
                  <label for="longitude" class="col-sm-2 control-label">{{trans('produits.Longitude') }}</label>
                   <div class="form-group col-sm-10">
                  <input required  step="any" type="number" class="col-sm-10 form-control" value="{{ old('longitude', optional($produit)->longitude) }}" id="longitude" placeholder="longitude " name="longitude"  required >
                </div>
            </div>


<div class="form-group {{ $errors->has('city_id') ? 'has-error' : '' }}">
    <label for="city_id" class="col-md-2 control-label">{{ trans('produits.city_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="city_id" name="city_id" required>
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
<div class="form-group {{ $errors->has('ville_id') ? 'has-error' : '' }}">
    <label for="ville_id" class="col-md-2 control-label">{{ trans('produits.ville_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="ville_id" name="ville_id" required>
                <option value="" style="display: none;" {{ old('ville_id', optional($produit)->ville_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('produits.ville_id__placeholder') }}</option>
           
        </select>
        
        {!! $errors->first('ville_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>


</div>
            
</div>
</div>



   <div class="col-md-6">
<div class="panel panel-success">
<div class="panel-heading clearfixr">
      <h3 class="panel-title">{{trans('produits.info_special') }}</h3>
     </div>
     
       <div class="panel-body">
                  <div class="content"> 




<div class="form-group {{ $errors->has('rent_sale') ? 'has-error' : '' }}">
    <label for="rent_sale" class="col-md-2 control-label">{{ trans('produits.rent_sale') }}</label>
    <div class="col-md-10">


 <label class="switch"><input  type="checkbox" id="rent_sale" name="rent_sale" {{  old('rent_sale', optional($produit)->rent_sale ?: 'off') ? 'checked' : '' }}><div class="slider round"><!--ADDED HTML --><span class="on">{{trans('produits.rent') }}</span><span class="off">{{trans('produits.sale') }}</span><!--END--></div></label>
        {!! $errors->first('rent_sale', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('chiket') ? 'has-error' : '' }}">
    <label for="chiket" class="col-md-2 control-label">{{ trans('produits.chiket') }}</label>
    <div class="col-md-10">


 <label class="switch"><input  type="checkbox" id="chiket" name="chiket" {{  old('chiket', optional($produit)->chiket ?: 'off') ? 'checked' : '' }}><div class="slider round"><!--ADDED HTML --><span class="on">{{trans('produits.Yes') }}</span><span class="off">{{trans('produits.NO') }}</span><!--END--></div></label>


        {!! $errors->first('chiket', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('cautionnement') ? 'has-error' : '' }}">
    <label for="cautionnement" class="col-md-2 control-label">{{ trans('produits.cautionnement') }}</label>
    <div class="col-md-10">


 <label class="switch"><input  type="checkbox" id="cautionnement" name="cautionnement" {{  old('cautionnement', optional($produit)->cautionnement ?: 'off') ? 'checked' : '' }}><div class="slider round"><!--ADDED HTML --><span class="on">{{trans('produits.Yes') }}</span><span class="off">{{trans('produits.NO') }}</span><!--END--></div></label>


        {!! $errors->first('cautionnement', '<p class="help-block">:message</p>') !!}
    </div>
</div>




<div id="price_cautionnement_div" class="form-group {{ $errors->has('price_cautionnement') ? 'has-error' : '' }} ">
    <label for="price_cautionnement" class="col-md-2 control-label">{{ trans('produits.price_cautionnement') }}</label>
    <div class="col-md-10">
        <input  class="form-control" name="price_cautionnement" type="number" id="price_cautionnement" value="{{ old('price_cautionnement', optional($produit)->price_cautionnement) }}" minlength="1" placeholder="{{ trans('produits.price_cautionnement__placeholder') }}">
        {!! $errors->first('price_cautionnement', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('espacer') ? 'has-error' : '' }}">
    <label for="espacer" class="col-md-2 control-label">{{ trans('produits.espacer') }}</label>
    <div class="col-md-10">
        <input  class="form-control" name="espacer" type="number" id="espacer" value="{{ old('espacer', optional($produit)->espacer) }}" minlength="1" placeholder="{{ trans('produits.espacer__placeholder') }}">
        {!! $errors->first('espacer', '<p class="help-block">:message</p>') !!}
    </div>
</div>




<div class="form-group {{ $errors->has('wifi') ? 'has-error' : '' }}">
    <label for="wifi" class="col-md-2 control-label">{{ trans('produits.wifi') }}</label>
    <div class="col-md-10">


 <label class="switch"><input  type="checkbox" id="wifi" name="wifi" {{  old('wifi', optional($produit)->wifi ?: 'off') ? 'checked' : '' }}><div class="slider round"><!--ADDED HTML --><span class="on">{{trans('produits.Yes') }}</span><span class="off">{{trans('produits.NO') }}</span><!--END--></div></label>


        {!! $errors->first('wifi', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('kahramam') ? 'has-error' : '' }}">
    <label for="kahramam" class="col-md-2 control-label">{{ trans('produits.kahramam') }}</label>
    <div class="col-md-10">
       <label class="switch"><input  type="checkbox" id="kahramam" name="kahramam" {{  old('kahramam', optional($produit)->kahramam ?: 'off') ? 'checked' : '' }}><div class="slider round"><!--ADDED HTML --><span class="on">{{trans('produits.Yes') }}</span><span class="off">{{trans('produits.NO') }}</span><!--END--></div></label>
        {!! $errors->first('kahramam', '<p class="help-block">:message</p>') !!}
    </div>
</div>




<div class="form-group {{ $errors->has('commission') ? 'has-error' : '' }}">
    <label for="commission" class="col-md-2 control-label">{{ trans('produits.commission') }}</label>
    <div class="col-md-10">
        <label class="switch"><input  type="checkbox" id="commission" name="commission" {{  old('commission', optional($produit)->commission ?: 'off') ? 'checked' : '' }}><div class="slider round"><!--ADDED HTML --><span class="on">{{trans('produits.Yes') }}</span><span class="off">{{trans('produits.NO') }}</span><!--END--></div></label>

     
        {!! $errors->first('commission', '<p class="help-block">:message</p>') !!}
    </div>
</div>









<div class="form-group {{ $errors->has('parking') ? 'has-error' : '' }}">
    <label for="parking" class="col-md-2 control-label">{{ trans('produits.parking') }}</label>
    <div class="col-md-10">


 <label class="switch"><input  type="checkbox" id="parking" name="parking" {{  old('parking', optional($produit)->parking ?: 'off') ? 'checked' : '' }}><div class="slider round"><!--ADDED HTML --><span class="on">{{trans('produits.Yes') }}</span><span class="off">{{trans('produits.NO') }}</span><!--END--></div></label>


        {!! $errors->first('parking', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('Piscine') ? 'has-error' : '' }}">
    <label for="Piscine" class="col-md-2 control-label">{{ trans('produits.Piscine') }}</label>
    <div class="col-md-10">


 <label class="switch"><input  type="checkbox" id="Piscine" name="Piscine" {{  old('Piscine', optional($produit)->Piscine ?: 'off') ? 'checked' : '' }}><div class="slider round"><!--ADDED HTML --><span class="on">{{trans('produits.Yes') }}</span><span class="off">{{trans('produits.NO') }}</span><!--END--></div></label>


        {!! $errors->first('Piscine', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('gym') ? 'has-error' : '' }}">
    <label for="gym" class="col-md-2 control-label">{{ trans('produits.gym') }}</label>
    <div class="col-md-10">


 <label class="switch"><input  type="checkbox" id="gym" name="gym" {{  old('gym', optional($produit)->gym ?: 'off') ? 'checked' : '' }}><div class="slider round"><!--ADDED HTML --><span class="on">{{trans('produits.Yes') }}</span><span class="off">{{trans('produits.NO') }}</span><!--END--></div></label>


        {!! $errors->first('gym', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('firstsaken') ? 'has-error' : '' }}">
    <label for="firstsaken" class="col-md-2 control-label">{{ trans('produits.firstsaken') }}</label>
    <div class="col-md-10">


 <label class="switch"><input  type="checkbox" id="firstsaken" name="firstsaken" {{  old('firstsaken', optional($produit)->firstsaken ?: 'off') ? 'checked' : '' }}><div class="slider round"><!--ADDED HTML --><span class="on">{{trans('produits.Yes') }}</span><span class="off">{{trans('produits.NO') }}</span><!--END--></div></label>


        {!! $errors->first('firstsaken', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('furnished') ? 'has-error' : '' }}">
    <label for="furnished" class="col-md-2 control-label">{{ trans('produits.furnished') }}</label>
    <div class="col-md-10">


 <label class="switch"><input  type="checkbox" id="furnished" name="furnished" {{  old('furnished', optional($produit)->furnished ?: 'off') ? 'checked' : '' }}><div class="slider round"><!--ADDED HTML --><span class="on">{{trans('produits.Yes') }}</span><span class="off">{{trans('produits.NO') }}</span><!--END--></div></label>


        {!! $errors->first('furnished', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('metro') ? 'has-error' : '' }}">
    <label for="metro" class="col-md-2 control-label">{{ trans('produits.metro') }}</label>
    <div class="col-md-10">


 <label class="switch">
    <input  type="checkbox" id="metro" name="metro" {{  old('metro', optional($produit)->metro ?: 'off') ? 'checked' : '' }}>
    <div class="slider round"><!--ADDED HTML -->
        <span class="on">{{trans('produits.Yes') }}</span>
        <span class="off">{{trans('produits.NO') }}</span>
        <!--END-->
    </div>
</label>


        {!! $errors->first('metro', '<p class="help-block">:message</p>') !!}
    </div>
</div>





<div class="form-group {{ $errors->has('family') ? 'has-error' : '' }}">
    <label for="family" class="col-md-2 control-label">{{ trans('produits.family') }}</label>
    <div class="col-md-10">


 <label class="switch">
    <input  type="checkbox" id="family" name="family" {{  old('family', optional($produit)->family ?: 'off') ? 'checked' : '' }}>
    <div class="slider round"><!--ADDED HTML -->
        <span class="on">{{trans('produits.Yes') }}</span>
        <span class="off">{{trans('produits.NO') }}</span>
        <!--END-->
    </div>
</label>


        {!! $errors->first('family', '<p class="help-block">:message</p>') !!}
    </div>
</div>


</div>


</div>
            
</div>
</div>



   <div class="col-md-12">
<div class="panel panel-success">
<div class="panel-heading clearfixr">
      <h3 class="panel-title">{{trans('produits.info_sociale_média') }}</h3>
     </div>
     
       <div class="panel-body">
                  <div class="content"> 




<div class="form-group {{ $errors->has('instagrame') ? 'has-error' : '' }}">
    <label for="instagrame" class="col-md-2 control-label">{{ trans('produits.instagrame') }}</label>
    <div class="col-md-10">
        <input  class="form-control" name="instagrame" type="text" id="instagrame" value="{{ Auth::user()->instagram}}{{ old('instagrame', optional($produit)->instagrame) }}" minlength="1" placeholder="{{ trans('produits.instagrame__placeholder') }}">
        {!! $errors->first('instagrame', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('facebook') ? 'has-error' : '' }}">
    <label for="facebook" class="col-md-2 control-label">{{ trans('produits.facebook') }}</label>
    <div class="col-md-10">
        <input  class="form-control" name="facebook" type="text" id="facebook" value="{{ Auth::user()->facebook}}{{ old('facebook', optional($produit)->facebook) }}" minlength="1" placeholder="{{ trans('produits.facebook__placeholder') }}">
        {!! $errors->first('facebook', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('siteweb') ? 'has-error' : '' }}">
    <label for="siteweb" class="col-md-2 control-label">{{ trans('produits.siteweb') }}</label>
    <div class="col-md-10">
        <input  class="form-control" name="siteweb" type="text" id="siteweb" value="{{ Auth::user()->siteweb}}{{ old('siteweb', optional($produit)->siteweb) }}" minlength="1" placeholder="{{ trans('produits.siteweb__placeholder') }}">
        {!! $errors->first('siteweb', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('whatsapp') ? 'has-error' : '' }}">
    <label for="whatsapp" class="col-md-2 control-label">{{ trans('produits.whatsapp') }}</label>
    <div class="col-md-10">
       <div class="col-md-12">
          
            <div class="col-md-10">  <input required class="form-control" name="whatsapp" type="text" id="whatsapp" value="{{ Auth::user()->whats}}{{ old('whatsapp', optional($produit)->whatsapp) }}" minlength="1" placeholder="{{ trans('produits.whatsapp__placeholder') }}"></div>
              <div class="col-md-2 form-control" style="direction: ltr;">{{Auth::user()->phone_code}}</div>
        </div>
        
        {!! $errors->first('whatsapp', '<p class="help-block">:message</p>') !!}
    </div>
</div>









</div>
</div>
            
</div>
</div>

