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

    <div class="">

        <div class="panel-heading clearfix">
            
            <span class="pull-left">
                <h4 class="mt-5 mb-5">
               {{ trans('produits.Create') }} {{$category->name_ar}}</h4>
            </span>

         

        </div>

        <div class="panel-body">
        
            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('produits.produit.store') }}" accept-charset="UTF-8" id="create_produit_form" name="create_produit_form" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="category" value="{{$category->id}}">

   
            @if($id == 1)
             @include ('produits.formRooms', [
                                        'produit' => null,
                                        'id' => $id,
                                      ])
            @elseif($id == 2)
            @include ('produits.formStudio', [
                                        'produit' => null,
                                        'id' => $id,
                                      ])
            @elseif($id == 3)
            @include ('produits.formApartments', [
                                        'produit' => null,
                                        'id' => $id,
                                      ])
            @elseif($id == 4)
            @include ('produits.formVillas', [
                                        'produit' => null,
                                        'id' => $id,
                                      ])
            @elseif($id == 5)
             @include ('produits.formhomes', [
                                        'produit' => null,
                                        'id' => $id,
                                      ])
            @elseif($id == 6)
            @include ('produits.formOffices', [
                                        'produit' => null,
                                        'id' => $id,
                                      ])
            @elseif($id == 7)
             @include ('produits.formShops', [
                                        'produit' => null,
                                        'id' => $id,
                                      ])
            @elseif($id == 8)
            @include ('produits.formWorkers', [
                                        'produit' => null,
                                        'id' => $id,
                                      ])
            @elseif($id == 9)
            @include ('produits.formLands', [
                                        'produit' => null,
                                        'id' => $id,
                                      ])
            
            @elseif($id == 10)
            @include ('produits.formStore', [
                                        'produit' => null,
                                        'id' => $id,
                                      ])
            
            @endif
           
                <div class="form-group">
                    <div class="col-md-12"style="justify-content: center; display: flex;">
                        <input class="btn btn-primary col-md-10"  style="    background: #2ab934;" type="submit" value="{{ trans('produits.add') }}">
                    </div>
                </div>

            </form>

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
                $('#ville_id').append("<option value='" + element.id + "'>" + element.ville + "</option>");
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

    }

</script>


  @endsection



