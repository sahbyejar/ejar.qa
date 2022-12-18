@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
  
        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">{{ !empty($produit->name) ? $produit->name : 'Produit' }}</h4>
            </div>
            <div class="btn-group btn-group-sm pull-right" role="group">

                <a href="{{ route('produits.produit.index') }}" class="btn btn-primary" title="{{ trans('produits.show_all') }}">
                    <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                </a>

               

            </div>
        </div>

        <div class="panel-body">

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('produits.produit.update', $produit->id) }}" id="edit_produit_form" name="edit_produit_form" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            <input type="hidden" name="category" value="{{$idd}}">


             @if($idd == 1)
             @include ('produits.formRooms', [
                                        'produit' => $produit,
                                        'id' => $idd,
                                      ])
            @elseif($idd == 2)
            @include ('produits.formStudio', [
                                        'produit' => $produit,
                                        'id' => $idd,
                                      ])
            @elseif($idd == 3)
            @include ('produits.formApartments', [
                                        'produit' => $produit,
                                        'id' => $idd,
                                      ])
            @elseif($idd == 4)
            @include ('produits.formVillas', [
                                        'produit' => $produit,
                                        'id' => $idd,
                                      ])
            @elseif($idd == 5)
             @include ('produits.formhomes', [
                                        'produit' => $produit,
                                        'id' => $idd,
                                      ])
            @elseif($idd == 6)
            @include ('produits.formOffices', [
                                        'produit' => $produit,
                                        'id' => $idd,
                                      ])
            @elseif($idd == 7)
             @include ('produits.formShops', [
                                        'produit' => $produit,
                                        'id' => $idd,
                                      ])
            @elseif($idd == 8)
            @include ('produits.formWorkers', [
                                        'produit' => $produit,
                                        'id' => $idd,
                                      ])
            @elseif($idd == 9)
            @include ('produits.formLands', [
                                        'produit' => $produit,
                                        'id' => $idd,
                                      ])
            @elseif($id == 10)
            @include ('produits.formStore', [
                                        'produit' => null,
                                        'id' => $id,
                                      ])
            @endif

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="{{ trans('produits.update') }}">
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
          $('#country').change(function(){
        $.get("{{ url('dropdowncreate')}}", 
        { option: $(this).val() }, 
        function(data) {
            $('#ctiy').empty(); 
            
            $.each(data, function(key, element) {
                $('#ctiy').append("<option value='" + element.id + "'>" + element.name + "</option>");
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


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqYA4Pxy3O_pXjbSZCkV_KmuhQY1W3dQA&callback=initMap" async defer></script>

  @endsection
