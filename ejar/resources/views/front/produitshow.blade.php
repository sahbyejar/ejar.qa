
@extends('layouts.appfrent')



@section('content')


<section class="slider-hero">
<div class="overlay"></div>
<div class="hero-slider">
  @foreach($images as $slider)
<div class="item">
<div class="work">
<div class="img d-flex align-items-center js-fullheight" style="background-image:url({{ asset('/ejar/public/images/' . $slider->photo) }})">
<div class="container-xl">
<div class="row justify-content-center">
<div class="col-md-10 col-xl-6">
<div class="text text-center" data-aos="fade-up" data-aos-duration="1000">
<h2></h2>
<p class="mb-5"></p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
 @endforeach


</div>
</section>



<section class="ftco-section">
<div class="container-xl">
<div class="row justify-content-center">
<div class="col-md-8 heading-section text-center mb-5" data-aos="fade-up" data-aos-duration="1000">
<span class="subheading"><a href="{{url('/listing-category/'.$produit->category->id)}}">{{$produit->category->name}} {{$produit->category->name_ar}}
</a></span>
<h2 class="mb-4">{{$produit->name}} {{$produit->name_ar}}</h2>
</div>
</div>
<div class="row justify-content-center">
<div class="col-md-10">
<div class="row g-1 mb-1">



 @if($produit->salon != null )


<div class="col-md-3 text-center d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
<a href="#" class="services">
<div class="icon"><span class="fa fa-television"></span></div>
<div class="text">
<h2>Salon :{{$produit->salon}}</h2>
</div>
</a>
</div>
@endif

@if($produit->toilet != null )



<div class="col-md-3 text-center d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
<a href="#" class="services">
<div class="icon"><span class="fa fa-bath"></span></div>
<div class="text">
<h2>Bathrooms : {{$produit->toilet}}</h2>
</div>
</a>
</div>
@endif

@if($produit->room != null )



<div class="col-md-3 text-center d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
<a href="#" class="services">
<div class="icon"><span class="fa fa-bed"></span></div>
<div class="text">
<h2>Bedrooms: {{$produit->room}}</h2>
</div>
</a>
</div>
@endif

@if($produit->espacer != null )
 

<div class="col-md-3 text-center d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
<a href="#" class="services">
<div class="icon"><span class="fa fa-object-group"></span></div>
<div class="text">
<h2>Saze : {{$produit->espacer}}</h2>
</div>
</a>
</div>
@endif

@if($produit->Number_of_doors != null )



<div class="col-md-3 text-center d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
<a href="#" class="services">
<div class="icon"><span class="fa fa-columns"></span></div>
<div class="text">
<h2>Number Of doors : {{$produit->Number_of_doors}}</h2>
</div>
</a>
</div>
@endif







</div>
</div>
<div class="col-md-10">
<div class="row">
<div class="col-md-8 heading-section" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
<span class="subheading">@if($produit->rent_sale== "on")
<span class="rent">Rent</span>
@else
 <span class="sale">Sale</span>
@endif </span>
<h2 class="mb-4">{{$produit->name}} / {{$produit->name_ar}}</h2>
  <p>{{$produit->discription}}
</p>
<br>
<p style="    text-align: right;">{{$produit->discription_ar}}
</p>
<div class="row py-5">
<div class="col-md-6 col-lg-3">
<div class="counter-wrap" data-aos="fade-up" data-aos-duration="1000">
<div class="text">
<span class="d-block number gradient-text"><span id="count1" class="counter" data-count="50">@if($produit->rent_sale== "on")
   {{$produit->price}} QAR / month
    @else
    {{$produit->price}} QAR
                    
    @endif</span></span>
<p>Price</p>
</div>
</div>
</div>


</div>

</div>
</div>
</div>
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


 


        var location = new google.maps.LatLng({{$produit->latitude}}, {{$produit->longitude}});

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


  
  markerCluster = new MarkerClusterer(map, markers, {
    imagePath: 'https://raw.githubusercontent.com/googlemaps/js-marker-clusterer/gh-pages/images/m'
  });

    }

</script>


  @endsection




