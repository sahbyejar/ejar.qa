
@extends('layouts.appfrent')
@section('css')
<style type="text/css">
  .header-hero {
 background-image: url({{ asset('/ejar/public/images/'.$category->photo)}}); 
 }
</style>
@endsection




@section('content')



<section class="hero-wrap hero-wrap-2" style="background-image:url({{ asset('/ejar/public/thumbs/'.$category->photo)}})">
<div class="overlay"></div>
<div class="container">
<div class="row no-gutters slider-text align-items-center justify-content-center">
<div class="col-md-9 pt-5 text-center">
<p class="breadcrumbs"><span class="mr-2"><a href="{{url('/')}}">Home <i class="fa fa-chevron-right"></i></a></span> <span>{{ $category->name }} {{ $category->name_ar }}  <i class="fa fa-chevron-right"></i></span></p>
<h1 class="mb-0 bread">{{ $category->name }} <br> {{ $category->name_ar }} </h1>
</div>
</div>
</div>
</section>

<section class="ftco-section ftco-no-pb ftco-no-pt">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="ftco-search d-flex justify-content-center">
<div class="row">
<div class="col-md-12 nav-link-wrap d-flex justify-content-center">
<div class="nav nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
<a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Buy Properties</a>
<a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Rent Properties</a>
</div>
</div>
<div class="col-md-12 tab-wrap">
<div class="tab-content" id="v-pills-tabContent">
<div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-nextgen-tab">
<form action="#" class="search-property-1">
<div class="row g-0">
<div class="col-md d-flex">
<div class="form-group p-4 border-0">
<label for="#">Enter Keyword</label>
<div class="form-field">
<div class="icon"><span class="fa fa-search"></span></div>
<input type="text" class="form-control" placeholder="Enter Keyword">
</div>
</div>
</div>
<div class="col-md d-flex">
<div class="form-group p-4">
<label for="#">Property Type</label>
<div class="form-field">
<div class="select-wrap">
<div class="icon"><span class="fa fa-chevron-down"></span></div>
<select name="" id="" class="form-control">
<option value="">Residential</option>
<option value="">Commercial</option>
<option value="">Land</option>
<option value="">Industrial</option>
</select>
</div>
</div>
</div>
</div>
<div class="col-md d-flex">
<div class="form-group p-4">
<label for="#">Location</label>
<div class="form-field">
<div class="icon"><span class="ion-ios-pin"></span></div>
<input type="text" class="form-control" placeholder="Search Location">
</div>
</div>
</div>
<div class="col-md d-flex">
<div class="form-group p-4">
<label for="#">Price Limit</label>
<div class="form-field">
<div class="select-wrap">
<div class="icon"><span class="fa fa-chevron-down"></span></div>
<select name="" id="" class="form-control">
<option value="">$100</option>
<option value="">$10,000</option>
<option value="">$50,000</option>
<option value="">$100,000</option>
<option value="">$200,000</option>
<option value="">$300,000</option>
<option value="">$400,000</option>
<option value="">$500,000</option>
<option value="">$600,000</option>
<option value="">$700,000</option>
<option value="">$800,000</option>
<option value="">$900,000</option>
<option value="">$1,000,000</option>
<option value="">$2,000,000</option>
</select>
</div>
</div>
</div>
</div>
<div class="col-md d-flex">
<div class="form-group d-flex w-100 border-0">
<div class="form-field w-100 align-items-center d-flex">
<input type="submit" value="Search" class="align-self-stretch form-control btn btn-primary">
</div>
</div>
</div>
</div>
</form>
</div>
<div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-performance-tab">
<form action="#" class="search-property-1">
<div class="row g-0">
<div class="col-md d-flex">
<div class="form-group p-4 border-0">
<label for="#">Enter Keyword</label>
<div class="form-field">
<div class="icon"><span class="fa fa-search"></span></div>
<input type="text" class="form-control" placeholder="Enter Keyword">
</div>
</div>
</div>
<div class="col-md d-flex">
<div class="form-group p-4">
<label for="#">Property Type</label>
<div class="form-field">
<div class="select-wrap">
<div class="icon"><span class="fa fa-chevron-down"></span></div>
<select name="" id="" class="form-control">
          @foreach($categories as $category)
<option value="">{{ $category->name }}</option>
@endforeach
</select>
</div>
</div>
</div>
</div>
<div class="col-md d-flex">
<div class="form-group p-4">
<label for="#">Location</label>
<div class="form-field">
<div class="icon"><span class="ion-ios-pin"></span></div>
<input type="text" class="form-control" placeholder="Search Location">
</div>
</div>
</div>
<div class="col-md d-flex">
<div class="form-group p-4">
<label for="#">Price Limit</label>
<div class="form-field">
<div class="select-wrap">
<div class="icon"><span class="fa fa-chevron-down"></span></div>
<select name="" id="" class="form-control">
<option value="">$100</option>
<option value="">$10,000</option>
<option value="">$50,000</option>
<option value="">$100,000</option>
<option value="">$200,000</option>
<option value="">$300,000</option>
<option value="">$400,000</option>
<option value="">$500,000</option>
<option value="">$600,000</option>
<option value="">$700,000</option>
<option value="">$800,000</option>
<option value="">$900,000</option>
<option value="">$1,000,000</option>
<option value="">$2,000,000</option>
</select>
</div>
</div>
</div>
</div>
<div class="col-md d-flex">
<div class="form-group d-flex w-100 border-0">
<div class="form-field w-100 align-items-center d-flex">
<input type="submit" value="Search" class="align-self-stretch form-control btn btn-primary">
</div>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>

<section class="ftco-section bg-light">
<div class="container-xl">
<div class="row justify-content-center">
<div class="col-md-8 heading-section text-center mb-5" data-aos="fade-up" data-aos-duration="1000">

</div>
</div>
<div class="row">


@foreach($produits as $produit)

<div class="col-md-3" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
<div class="property-wrap">
<a href="{{url('/listing/'.$produit->id)}}" class="img img-property" style="background-image:url({{ asset('/ejar/public/images/' . $produit->photo) }})">
<p class="price"><span class="orig-price">{{ $produit->price }}</span></p>
</a>
<div class="text">
<div class="list-team d-flex align-items-center mb-4">
<div class="d-flex align-items-center">
<h3 class="ml-2"></h3>
</div>
<span class="text-right">{{ optional($produit->category)->name }}</span>
</div>
<h3><a href="{{url('/listing/'.$produit->id)}}">{{ $produit->name_ar }} / {{ $produit->name }}</a></h3>
@if($produit->rent_sale== "on")
<span class="location"><i class="ion-ios-pin"></i> <span class="rent">Rent</span></span>
@else
<span class="location"><i class="ion-ios-pin"></i> <span class="sale">Sale</span></span>
@endif
<ul class="property_list mt-3 mb-0">
<li><span class="flaticon-bed"></span>{{ $produit->room }}</li>
<li><span class="flaticon-bathtub"></span>{{ $produit->toilet}}</li>
<li><span class="flaticon-blueprint"></span>{{ $produit->espacer }} sqft</li>
</ul>
</div>
</div>
</div>

@endforeach







</div>
</div>
</section>

@endsection



@section('js')

<script src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyAqYA4Pxy3O_pXjbSZCkV_KmuhQY1W3dQA&callback=initMap" async defer></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/js-marker-clusterer/1.0.0/markerclusterer.js"></script>

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
        var latitude = 25.213450081603526; // YOUR LATITUDE VALUE
        var longitude = 51.255206967438085; // YOUR LONGITUDE VALUE

        var myLatLng = {
            lat: latitude,
            lng: longitude
        };
  var randLatLng = function() {
      return new google.maps.LatLng(((Math.random() * 17000 - 8500) / 100), ((Math.random() * 36000 - 18000) / 100));
    },
    map = new google.maps.Map(document.getElementById('map'), {
      zoom: 9,
      center: myLatLng,

            disableDoubleClickZoom: true, 
    }),
    markers = [],
    markerCluster;


        var locations = [
    @foreach ($produits as $location)
        [ {{ $location->latitude }}, {{ $location->longitude }} ],
    @endforeach
    ];

  for (var i = 0; i < locations.length; i++) {
        var location = new google.maps.LatLng(locations[i][0], locations[i][1]);

    (function() {
      var marker = new google.maps.Marker({
          position: location
        }),
        circle = new google.maps.Circle({

          radius: 30.48,
          fillColor: '#FACC2E',
          strokeColor: '#000000',
          strokeOpacity: 0.75,
          strokeWeight: 20
        });
      circle.bindTo('center', marker, 'position');
      circle.bindTo('map', marker, 'map');
      markers.push(marker);
    })();


  }
  markerCluster = new MarkerClusterer(map, markers, {
    imagePath: 'https://raw.githubusercontent.com/googlemaps/js-marker-clusterer/gh-pages/images/m'
  });

    }

     

        
</script>


  @endsection



