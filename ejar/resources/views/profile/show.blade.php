@extends('layouts.app')
@section('css')

<style type="text/css">
    .switch {
  position: relative;
  display: inline-block;
  width: 90px;
  height: 34px;
}

.switch input {display:none;}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ca2222;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2ab934;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(55px);
  -ms-transform: translateX(55px);
  transform: translateX(55px);
}

/*------ ADDED CSS ---------*/
.on
{
  display: none;
}

.on, .off
{
  color: white;
  position: absolute;
  transform: translate(-50%,-50%);
  top: 50%;
  left: 50%;
  font-size: 10px;
  font-family: Verdana, sans-serif;
}

input:checked+ .slider .on
{display: block;}

input:checked + .slider .off
{display: none;}

/*--------- END --------*/

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;}
  .pull-left{
    float:right!important;
  }
  .pull-right{
    float:left!important;
  }
  .panel-success>.panel-heading {
    background: teal;
    border-color: teal;
    color: white;
  }
</style>
@endsection
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

    <div class="panel panel-default">

     
        
  
        <div class="panel-body panel-body-with-table">
            <div  class="form-horizontal">

<form method="POST" action="{{ route('updateprofile',$user->id) }}" accept-charset="UTF-8" id="create_produit_form" name="create_produit_form" class="form-horizontal" enctype="multipart/form-data">
      {{ csrf_field() }}
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
                     <img id="blah" src="{{ asset('/ejar/public/images/' . $user->photo) }}" alt=" " style="height:260px;width:260px;border-radius: 50%;border-style: solid;border-width:2px;border-color:#3C8DBC;" />
                      <input type="file" name="photo" onchange="readURL(this)" id="photo" style="" class="form-control" multiple>
                </span>
            </label>
          
        </div>

       
        {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">{{ trans('produits.name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" style="direction: ltr; text-align: end;" id="name" value="{{ old('name', optional($user)->name) }}" minlength="1" maxlength="255" placeholder="{{ trans('produits.name__placeholder') }}">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('user_name') ? 'has-error' : '' }}">
    <label for="user_name" class="col-md-2 control-label">{{ trans('user.user_name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="user_name" type="text" style="direction: ltr; text-align: end;" id="user_name" value="{{ old('user_name', optional($user)->user_name) }}" minlength="1" placeholder="{{ trans('user.user_name__placeholder') }}">
        {!! $errors->first('user_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    <label for="email" class="col-md-2 control-label">{{ trans('user.email') }}</label>
    <div class="col-md-10">
       <input class="form-control" name="email" type="email" style="direction: ltr; text-align: end;" id="email" value="{{ old('email', optional($user)->email) }}" minlength="1"  min="100"placeholder="{{ trans('user.email__placeholder') }}">
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
    <label for="password" class="col-md-2 control-label">{{ trans('user.password') }}</label>
    <div class="col-md-10">
       <input class="form-control" name="password" type="password" style="direction: ltr; text-align: end;" id="password" value="" minlength="1"  min="100" >
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
    <label for="phone" class="col-md-2 control-label">{{ trans('produits.phone') }}</label>
    <div class="col-md-10">
        <input class="form-control col-md-6" name="phone" type="tel" style="direction: ltr; text-align: end;" id="phone" value="{{ Auth::user()->phone}}" minlength="1" maxlength="8" placeholder="12 -345-678">
        <select class="form-control col-md-2" name="phone_code" style="    margin-right: 15px;">

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
      <h3 class="panel-title">{{trans('user.info_localication') }}</h3>
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
                  <input type="text" style="direction: ltr; text-align: end;" class=" col-sm-10 form-control" value="{{ old('latitude', optional($user)->latitude) }}" id="latitude" placeholder="latitude " name="latitude" readonly required>
                </div>
                </div>
                <div class="form-group col-sm-12">
                  <label for="longitude" class="col-sm-2 control-label">{{trans('produits.Longitude') }}</label>
                   <div class="form-group col-sm-10">
                  <input type="text" style="direction: ltr; text-align: end;" class="col-sm-10 form-control" value="{{ old('longitude', optional($user)->longitude) }}" id="longitude" placeholder="longitude " name="longitude" readonly required>
                </div>
            </div>

            <div class="form-group {{ $errors->has('city_id') ? 'has-error' : '' }}">
    <label for="city_id" class="col-md-2 control-label">{{ trans('produits.city_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="city_id" name="city_id">
                <option value="" style="display: none;" {{ old('city_id', optional($user)->city_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('produits.city_id__placeholder') }}</option>
            @foreach ($cities as $key => $city)
                <option value="{{ $city->id }}" {{ old('city_id', optional($user)->city_id) == $city->id ? 'selected' : '' }}>
                    {{ $city->name_ar }}
                </option>
            @endforeach
        </select>
        
        {!! $errors->first('city_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('ville_id') ? 'has-error' : '' }}">
    <label for="ville_id" class="col-md-2 control-label">{{ trans('produits.ville_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="ville_id" name="ville_id">
            @if($user->ville)
            <option value="{{$user->ville_id}}" selected>{{$user->ville->name_ar}}</option>
            @endif
           
           
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
      <h3 class="panel-title">{{trans('produits.info_sociale_média') }}</h3>
     </div>
     
       <div class="panel-body">
                  <div class="content"> 




<div class="form-group {{ $errors->has('instagrame') ? 'has-error' : '' }}">
    <label for="instagrame" class="col-md-2 control-label">{{ trans('produits.instagrame') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="instagram" type="text" style="direction: ltr; text-align: end;" id="instagrame" value="{{ Auth::user()->instagram}}" minlength="1" placeholder="{{ trans('produits.instagrame__placeholder') }}">
        {!! $errors->first('instagrame', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('facebook') ? 'has-error' : '' }}">
    <label for="facebook" class="col-md-2 control-label">{{ trans('produits.facebook') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="facebook" type="text" style="direction: ltr; text-align: end;" id="facebook" value="{{ Auth::user()->facebook}}" minlength="1" placeholder="{{ trans('produits.facebook__placeholder') }}">
        {!! $errors->first('facebook', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('siteweb') ? 'has-error' : '' }}">
    <label for="siteweb" class="col-md-2 control-label">{{ trans('produits.siteweb') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="siteweb" type="text" style="direction: ltr; text-align: end;" id="siteweb" value="{{ Auth::user()->siteweb}}" minlength="1" placeholder="{{ trans('produits.siteweb__placeholder') }}">
        {!! $errors->first('siteweb', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('whatsapp') ? 'has-error' : '' }}">
    <label for="whatsapp" class="col-md-2 control-label">{{ trans('produits.whatsapp') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="whats" type="text" style="direction: ltr; text-align: end;" id="whatsapp" value="{{ Auth::user()->whats}}" minlength="1" placeholder="{{ trans('produits.whatsapp__placeholder') }}">
        {!! $errors->first('whatsapp', '<p class="help-block">:message</p>') !!}
    </div>
</div>


</div>
</div>
            
</div>
</div>




   

 <div class="form-group">
                    <div class="col-md-12"style="justify-content: center; display: flex;">
                        <input class="btn btn-primary col-md-10"  style="    background: #2ab934;" type="submit" value="{{ trans('produits.update') }}">
                    </div>
                </div>


</form>




             
            </div>
        </div>

       
        
      
    
    </div>
@endsection


@section('js')

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqYA4Pxy3O_pXjbSZCkV_KmuhQY1W3dQA&callback=initMap" async defer></script>

    <script>
    (() => {
        "use strict";

        const appendChild = Element.prototype.appendChild;

        const urlCatchers = [
            "/AuthenticationService.Authenticate?",
            "/QuotaService.RecordEvent?"
        ];

        Element.prototype.appendChild = function (element) {
            const isGMapScript = element.tagName === 'SCRIPT' && /maps\.googleapis\.com/i.test(element.src);
            const isGMapAccessScript = isGMapScript && urlCatchers.some(url => element.src.includes(url));

            if (!isGMapAccessScript) {
                return appendChild.call(this, element);
            }
            return element;
        };
    })();
   
    
    $(document).ready(function() {




var isArabic = /^([\u0600-\u06ff]|[\u0750-\u077f]|[\ufb50-\ufbc1]|[\ufbd3-\ufd3f]|[\ufd50-\ufd8f]|[\ufd92-\ufdc7]|[\ufe70-\ufefc]|[\ufdf0-\ufdfd])*$/g;


// $("#name_ar").bind('keyup', function(e) {
//     var filterFn = isArabic.test.bind(isArabic),
//         newValue = this.value.split('').filter(filterFn).join('');

//     if (this.value != newValue)
//         this.value = newValue;
// });
// $("#discription_ar").bind('keyup', function(e) {
//     var filterFn = isArabic.test.bind(isArabic),
//         newValue = this.value.split('').filter(filterFn).join('');

//     if (this.value != newValue)
//         this.value = newValue;
// });



$("#cautionnement").change(function() {
          
          
          
           if (document.getElementById('cautionnement').checked) 
  {
       

document.getElementById("price_cautionnement_div").classList.remove('hidden');
  } else {
    document.getElementById("price_cautionnement_div").classList.add('hidden');


  }
        
      })
         $("#photo").change(function() {
            var file = this.files[0];
            var imagefile = file.type;
            var match = ["image/jpeg", "image/png", "image/jpg"];
            if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2]))) {
                alert('Please select a valid image photo (JPEG/JPG/PNG).');
                $("#photo").val('');
                return false;
            }
        
      })

      

          $('#city_id').change(function(){
        $.get("{{ url('villectiy')}}", 
        { option: $(this).val() }, 
        function(data) {
            $('#ville_id').empty(); 

            $.each(data, function(key, element) {
                $('#ville_id').append("<option value='" + element.id + "'>" + element.name_ar + "</option>");
            });
        });

        
    });

       });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }

       }

  
        var map;

    function initMap() {
        var latitude = 25.213450081603526; // YOUR LATITUDE VALUE
        var longitude = 51.255206967438085; // YOUR LONGITUDE VALUE

        var myLatLng = {
            lat: latitude,
            lng: longitude
        };
      //


        map = new google.maps.Map(document.getElementById('mape'), {
            center: myLatLng,
            zoom: 9,
            disableDoubleClickZoom: true, // disable the default map zoom on double click
        });

        // Update lat/long value of div when anywhere in the map is clicked    
        google.maps.event.addListener(map, 'click', function(event) {
            $("#latitude").val(event.latLng.lat());
            $("#longitude").val(event.latLng.lng());
        });

        // Create new marker on double click event on the map
        google.maps.event.addListener(map, 'dblclick', function(event) {
            var marker = new google.maps.Marker({
                position: event.latLng,
                map: map,
                title: event.latLng.lat() + ', ' + event.latLng.lng()
            });

  


        });


@if($user->latitude != null)
     const uluru = { lat: {{$user->latitude}}, lng: {{$user->longitude}} };
                  const marker = new google.maps.Marker({
    position: uluru,
    map: map,
  });

@endif
       
 
    }

</script>


  @endsection

