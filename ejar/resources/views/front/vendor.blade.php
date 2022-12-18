
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
  <aside class="hp-page__sidebar hp-col-sm-4 hp-col-xs-12 hp-vendor hp-vendor--view-page site-sidebar" data-component="sticky">
  <div class="" style="">
  <div class="inner-wrapper-sticky" style="position: relative;">
  <div class="hp-vendor__summary hp-widget widget">
  <div class="hp-vendor__image">

<img src="{{ asset('/ejar/public/images/' . $vendor->photo) }}" style="    height: 160px!important;" alt="Brian Peterson" loading="lazy">
</div>
<h3 class="hp-vendor__name">
  <span>{{$vendor->name}}
</span>
</h3>
<div class="hp-vendor__details hp-vendor__details--primary">
  <time class="hp-vendor__registered-date hp-vendor__date hp-meta" datetime="2019-06-16 10:59:33">
Member since {{$vendor->created_at}}
</time>

</div>
<div class="hp-vendor__description">
  <p>
</p>
</div>
</div>

</div>
</div>
</aside>
<main class="hp-page__content hp-col-sm-8 hp-col-xs-12">
  <h1 class="hp-page__title">Listings by {{$vendor->name}}
</h1>
<div>
  <div class="hp-listings hp-block hp-grid">
  <div class="hp-row">
@foreach($produits as $produit)
  <div class="hp-grid__item hp-col-sm-6 hp-col-xs-12">
  <article class="hp-listing hp-listing--view-block hp-listing--verified">
  <header class="hp-listing__header">
  <div class="hp-listing__image">

<a href="{{url('/listing/'.$produit->id)}}">

<img src="{{ asset('/ejar/public/images/'.$produit->photo)}}" alt="{{$produit->name}} {{$produit->name_ar}}" loading="lazy">

</a>
</div>
</header>
<div class="hp-listing__content">
  <div class="hp-listing__categories hp-listing__category">

<a href="{{url('/listing-category/'.$produit->category->id)}}">{{$produit->category->name}} {{$produit->category->name_ar}}
</a>
</div>
<h4 class="hp-listing__title">
  <a href="{{url('/listing/'.$produit->id)}}">{{$produit->name}} {{$produit->name_ar}}
</a>

<i class="hp-listing__verified-badge hp-listing__verified hp-icon fas fa-check-circle" title="Verified">
</i>
</h4>
<div class="hp-listing__details hp-listing__details--primary">
  <div class="hp-listing__categories hp-listing__category">

<a href="{{url('/listing-category/'.$produit->category->id)}}">{{$produit->category->name}} {{$produit->category->name_ar}}
</a>
</div>
<div class="hp-listing__location">

<i class="hp-icon fas fa-map-marker-alt">
</i>

<a href="https://www.google.com/maps/search/?api=1&amp;query={{$produit->latitude}},{{$produit->longitude}}" target="_blank">
  {{$produit->ville()->first()->ville}} ,{{$produit->city()->first()->name}} <br>
  {{$produit->ville()->first()->name_ar}} ,{{$produit->city()->first()->name_ar}}
</a>
</div>

<time class="hp-listing__created-date hp-listing__date hp-meta" datetime="2019-06-23 11:11:15">
Added on {{$produit->created_at}} 
</time>
<!-- <div class="hp-listing__rating hp-rating">
  <div class="hp-rating__stars hp-rating-stars" data-component="rating" data-value="3.7">
</div> -->

<!-- <a href="{{url('/listing/'.$produit->id)}}#reviews" class="hp-rating__details">

<span class="hp-rating__value">3.7
</span>

<span class="hp-rating__count">(3)
</span> -->

<!-- </a>
</div> -->
</div>
<div class="hp-listing__attributes hp-listing__attributes--secondary">
  <div class="hp-row">
  @if($produit->salon != null)
  <div class="hp-col-lg-6 hp-col-xs-12">
  <div class="hp-listing__attribute hp-listing__attribute--bedrooms">
<strong>Salon
</strong>: {{$produit->salon}}
</div>
</div>
@endif

@if($produit->toilet != null)
  <div class="hp-col-lg-6 hp-col-xs-12">
  <div class="hp-listing__attribute hp-listing__attribute--bedrooms">
<strong>Bathrooms
</strong>: {{$produit->toilet}}
</div>
</div>
@endif

@if($produit->room != null)
  <div class="hp-col-lg-6 hp-col-xs-12">
  <div class="hp-listing__attribute hp-listing__attribute--bedrooms">
<strong>Bedrooms
</strong>: {{$produit->room}}
</div>
</div>
@endif

@if($produit->espacer != null)
  <div class="hp-col-lg-6 hp-col-xs-12">
  <div class="hp-listing__attribute hp-listing__attribute--bedrooms">
<strong>Saze
</strong>: {{$produit->espacer}}
</div>
</div>
@endif

@if($produit->Number_of_doors != null)
  <div class="hp-col-lg-6 hp-col-xs-12">
  <div class="hp-listing__attribute hp-listing__attribute--bedrooms">
<strong>Number Of doors
</strong>: {{$produit->Number_of_doors}}
</div>
</div>
@endif
@if($produit->Height != null)
  <div class="hp-col-lg-6 hp-col-xs-12">
  <div class="hp-listing__attribute hp-listing__attribute--bedrooms">
<strong>Height
</strong>: {{$produit->Height}}
</div>
</div>
@endif

</div>
</div>
</div>
<footer class="hp-listing__footer">
  <div class="hp-listing__attributes hp-listing__attributes--primary">
  <div class="hp-listing__attribute hp-listing__attribute--price">
@if($produit->rent_sale== "on")
   {{$produit->price}} QAR / month
    @else
    {{$produit->price}} QAR
                    
    @endif
</div>
</div>
<div class="hp-listing__actions hp-listing__actions--primary">
  <div id="message_send_modal_42" class="hp-modal" data-component="modal">
  <h3 class="hp-modal__title">Reply to Listing
</h3>
</div>

@if(!Auth::user())
<a class="hp-listing__action hp-listing__action--favorite" href="#user_login_modal">
  <i class="hp-icon fas fa-heart">
</i>
</a>
@else
@if($produit->favorite != null )
<button class="hp-listing__action hp-listing__action--favorite" onclick="addfavori({{$produit->id}})" style="    background: transparent;
    border: transparent;">
  <i id="hard{{$produit->id}}" style="color: red!important;" class="hp-icon fas fa-heart">
</i>
</button>
@else
<button class="hp-listing__action hp-listing__action--favorite" onclick="addfavori({{$produit->id}})" style="    background: transparent;
    border: transparent;">
  <i id="hard{{$produit->id}}" style="color: rgba(7,36,86,.25)" class="hp-icon fas fa-heart">
</i>
</button>
@endif
@endif
</div>
</footer>
</article>
</div>





@endforeach
</div>
</div>
{!! $produits->links('layouts.paginationfrent') !!}
</div>
</main>
</div>
</div>




@endsection




