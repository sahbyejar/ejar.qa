


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
  .form-horizontal .control-label {
    text-align: right;
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
                     
                </span>
            </label>
          
        </div>

       
        {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">{{ trans('general.campany') }}</label>
    <div class="col-md-10">
        {{ old('name', optional($user)->name) }}
    </div>
</div>


<div class="form-group {{ $errors->has('user_name') ? 'has-error' : '' }}">
    <label for="user_name" class="col-md-2 control-label">{{ trans('user.user_name') }}</label>
    <div class="col-md-10">
        {{ old('user_name', optional($user)->user_name) }}
    </div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    <label for="email" class="col-md-2 control-label">{{ trans('user.email') }}</label>
    <div class="col-md-10">
     {{ old('email', optional($user)->email) }}
    </div>
</div>



<div class="form-group {{ $errors->has('CommercialRecord') ? 'has-error' : '' }}">
    <label for="CommercialRecord" class="col-md-2 control-label">{{ trans('user.CommercialRecord') }}</label>
    <div class="col-md-10">
     {{ old('CommercialRecord', optional($user)->CommercialRecord) }}
    </div>
</div>



<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
    <label for="phone" class="col-md-2 control-label">{{ trans('produits.phone') }}</label>
      <div class="col-md-10" style="unicode-bidi: plaintext;
    display: flex;">
 {{ $user->phone_code }} 
     {{ $user->phone}}  
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
                  
          <!---------- el map ------------->
         <div class="form-group col-sm-12" style="padding:10px">
            <div id="mape" style="    height: 300px;width: 400; "></div>
        </div> 
        </div>
         </div>
               <div class="panel-body">
                 
                 
               

            <div class="form-group {{ $errors->has('city_id') ? 'has-error' : '' }}">
    <label for="city_id" class="col-md-2 control-label">{{ trans('produits.city_id') }}</label>
    <div class="col-md-10">
   {{$user->city()->first()->name}} <br>
  {{$user->city()->first()->name_ar}}
    </div>
</div>
<div class="form-group {{ $errors->has('ville_id') ? 'has-error' : '' }}">
    <label for="ville_id" class="col-md-2 control-label">{{ trans('produits.ville_id') }}</label>
    <div class="col-md-10">
        {{$user->ville()->first()->ville}} <br>
        {{$user->ville()->first()->name_ar}} 
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
        {{ $user->instagram}}
    </div>
</div>

<div class="form-group {{ $errors->has('facebook') ? 'has-error' : '' }}">
    <label for="facebook" class="col-md-2 control-label">{{ trans('produits.facebook') }}</label>
    <div class="col-md-10">
       {{ $user->facebook}}
    </div>
</div>

<div class="form-group {{ $errors->has('siteweb') ? 'has-error' : '' }}">
    <label for="siteweb" class="col-md-2 control-label">{{ trans('produits.siteweb') }}</label>
    <div class="col-md-10">
        {{ $user->siteweb}}
    </div>
</div>

<div class="form-group {{ $errors->has('whatsapp') ? 'has-error' : '' }}">
    <label for="whatsapp" class="col-md-2 control-label">{{ trans('produits.whatsapp') }}</label>
      <div class="col-md-10" style="unicode-bidi: plaintext;
    display: flex;">
 {{ $user->phone_code }} 
   {{ $user->whats}}
    </div>
</div>


</div>
</div>
            
</div>
</div>




   







             
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
   
    
  


  
        var map;

    function initMap() {
        var latitude ={{$user->latitude}}; // YOUR LATITUDE VALUE
        var longitude = {{$user->longitude}} ; // YOUR LONGITUDE VALUE

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


