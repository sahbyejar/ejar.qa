
@extends('layouts.appfrent')
@section('css')

<style type="text/css">
  .header-hero {
 background-image: url({{asset('/ejar/public/images/home.jpg')}}); 
 }

</style>
@endsection




@section('content')




<div class="hp-page site-main">
  <div class="hp-row">
 <div class="form-group col-sm-12" style="padding:10px">
            <div id="mape" style="    height: 300px;width: 400; "></div>
        </div> 

  <div class="form-group col-sm col-xs-12 " style="padding:10px">
           <div class="col-sm-6"> <h5 class="widget__title">Email :</h5>{{$user->email}}</div>
          <div class="col-sm-6"> <h5 class="widget__title">Phone :</h5>{{$user->phone}}</div>
         
         
           
        </div> 

  <div class="form-group col-sm col-xs-12" style="padding:10px">
           <div class="col-sm-6"> <h5 class="widget__title">whatsapp :</h5>{{$user->whats}}</div>
    <div class="col-sm-6"> <h5 class="widget__title">Adresse :</h5>{{$user->ville()->first()->ville}} ,{{$user->city()->first()->name}} <br>
	{{$user->ville()->first()->name_ar}} ,{{$user->city()->first()->name_ar}}</div>
         
        </div> 

</div>
</div>

<div class="hp-page site-main">
  <div class="hp-row">
<div class="form-group col-sm-12">
  <form class="hp-form--narrow hp-form hp-form--user-login"  action="{{route('email')}}">
   {{ csrf_field() }}
  	<div class="form-group col-sm col-xs-12">
    <label for="fname">Name</label>
    <input class="hp-field hp-field--text" type="text" id="fname" name="name" placeholder="Your name..">
</div>
<br>
<div class="form-group col-sm col-xs-12">
    <label for="lname">Email</label>
    <input class="hp-field hp-field--text" type="text" id="lname" name="lemail" placeholder="Your Email..">
</div>
<br>
<div class="form-group col-sm col-xs-12">
    <label for="lname">Subject</label>
    <input class="hp-field hp-field--text" type="text" id="Subject" name="Subject" placeholder="Your Subject..">
</div>
<br>
	<div class="form-group col-sm col-xs-12">

 
    <label for="subject">Message</label>
    <textarea  class="hp-field hp-field--text" id="subject" name="Message" placeholder="Write something.." style="height:200px"></textarea>
</div>
    <input class="hp-field hp-field--text" type="submit" value="Send">
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
        var latitude = {{$user->latitude}}; // YOUR LATITUDE VALUE
        var longitude = {{$user->longitude}}; // YOUR LONGITUDE VALUE

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
       

        // Create new marker on double click event on the map
     


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

