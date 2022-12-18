
@extends('layouts.appfrent')
@section('css')
<style type="text/css">
  .header-hero {
 background-image: url({{asset('/ejar/public/images/home.jpg')}}); 
 }
</style>
@endsection

@section('tolbar')
<section class=" header-hero--large" data-component="parallax">
<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    @foreach($sliders as $key => $slider)
    @if($key == 0)
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{ asset('/ejar/public/images/'.$slider->photo)}}" alt="First slide">
    </div>
    @else
     <div class="carousel-item ">
      <img class="d-block w-100" src="{{ asset('/ejar/public/images/'.$slider->photo)}}" alt="First slide">
    </div>
    @endif
    @endforeach
    
   
  </div>
</div>
</section>
@endsection

@section('content')

<div class="hp-listing-categories hp-grid hp-block">
  <div class="hp-row">
  
@foreach($categories as $category)
  <div class="hp-grid__item hp-col-sm-3 hp-col-xs-12">
  <article class="hp-listing-category hp-listing-category--view-block" style="height: 261px;">
  <header class="hp-listing-category__header">
  <div class="hp-listing-category__image">

<a href="{{url('/listing-category/'.$category->id)}}">

<img src="{{ asset('/ejar/public/images/'.$category->photo)}}" alt="Houses" loading="lazy">

</a>
</div>
<div class="hp-listing-category__item-count hp-listing-category__count">{{ count($category->produit()->get())}} Listings
</div>
</header>
<div class="hp-listing-category__content">
  <h3 class="hp-listing-category__name">
  <a href="{{url('/listing-category/'.$category->id)}}">{{ $category->name }} {{ $category->name_ar }}
</a>


</h3>
<div class="hp-listing-category__details hp-listing-category__details--primary">
  <div class="hp-listing-category__item-count hp-listing-category__count">{{ count($category->produit()->get())}} Listings
</div>
</div>
<div class="hp-listing-category__description">
</div>
</div>
</article>
</div>
@endforeach


</div>
</div>

<h2 class="has-text-align-center title title--center">VIP 1 Product Listings
</h2>
<div class="hp-listings hp-block hp-grid">
  <div class="hp-row">

  @foreach($produits1 as $kek => $produit)
<div class="hp-grid__item hp-col-sm-4 hp-col-xs-12">
  <article class="hp-listing hp-listing--view-block hp-listing--featured">
  <header class="hp-listing__header">
  
<div class="hp-listing__image">

<a href="{{url('/listing/'.$produit->id)}}">

<img src="{{ asset('/ejar/public/images/'.$produit->photo)}}" style="width: 360px;height: 240px;" alt="Stylish remodeled room" loading="lazy">

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

<time class="hp-listing__created-date hp-listing__date hp-meta" datetime="2019-06-30 11:32:04">
Added on {{$produit->created_at}} 
</time>

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
  <div id="message_send_modal_49" class="hp-modal" data-component="modal">
  <h3 class="hp-modal__title">Reply to Listing
</h3>
<form class="hp-form--narrow hp-form hp-form--message-send" data-model="message" data-message="Your message has been sent." action="#" data-action="https://demo.hivepress.io/wp-json/hivepress/v1/messages/" method="POST" data-component="form" data-selectable="true">
  <div class="hp-form__messages" data-component="messages">
</div>
<div class="hp-form__fields">
  <input type="hidden" name="listing" value="" class="hp-field hp-field--hidden">
<input type="hidden" name="recipient" value="" class="hp-field hp-field--hidden">
<div class="hp-form__field hp-form__field--textarea">
  <label class="hp-field__label hp-form__label">
  <span>Message
</span>
</label>
<textarea name="text" maxlength="2048" required="required" class="hp-field hp-field--textarea">
</textarea>
</div>
</div>
<div class="hp-form__footer">
  <button type="submit" class="hp-form__button button alt button hp-field hp-field--submit">
  <span>Send Message
</span>
</button>
</div>
</form>
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
  <i id="hard{{$produit->id}}" style="color:rgba(7,36,86,.25)" class="hp-icon fas fa-heart">
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




<h2 class="has-text-align-center title title--center">VIP 2 Product Listings
</h2>
<div class="hp-listings hp-block hp-grid">
  <div class="hp-row">

  @foreach($produits2 as $produit)
<div class="hp-grid__item hp-col-sm-4 hp-col-xs-12">
  <article class="hp-listing hp-listing--view-block hp-listing--featured">
  <header class="hp-listing__header">
  
<div class="hp-listing__image">

<a href="{{url('/listing/'.$produit->id)}}">

<img src="{{ asset('/ejar/public/images/'.$produit->photo)}}" style="width: 360px;height: 240px;" alt="Stylish remodeled room" loading="lazy">

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

<time class="hp-listing__created-date hp-listing__date hp-meta" datetime="2019-06-30 11:32:04">
Added on {{$produit->created_at}} 
</time>

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
  <div id="message_send_modal_49" class="hp-modal" data-component="modal">
  <h3 class="hp-modal__title">Reply to Listing
</h3>
<form class="hp-form--narrow hp-form hp-form--message-send" data-model="message" data-message="Your message has been sent." action="#" data-action="https://demo.hivepress.io/wp-json/hivepress/v1/messages/" method="POST" data-component="form" data-selectable="true">
  <div class="hp-form__messages" data-component="messages">
</div>
<div class="hp-form__fields">
  <input type="hidden" name="listing" value="" class="hp-field hp-field--hidden">
<input type="hidden" name="recipient" value="" class="hp-field hp-field--hidden">
<div class="hp-form__field hp-form__field--textarea">
  <label class="hp-field__label hp-form__label">
  <span>Message
</span>
</label>
<textarea name="text" maxlength="2048" required="required" class="hp-field hp-field--textarea">
</textarea>
</div>
</div>
<div class="hp-form__footer">
  <button type="submit" class="hp-form__button button alt button hp-field hp-field--submit">
  <span>Send Message
</span>
</button>
</div>
</form>
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
  <i id="hard{{$produit->id}}" style="color:rgba(7,36,86,.25)" class="hp-icon fas fa-heart">
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




<h2 class="has-text-align-center title title--center">Recent Product Listings
</h2>
<div class="hp-listings hp-block hp-grid">
  <div class="hp-row">

  @foreach($produits3 as $produit)
<div class="hp-grid__item hp-col-sm-4 hp-col-xs-12">
  <article class="hp-listing hp-listing--view-block hp-listing--featured">
  <header class="hp-listing__header">
  
<div class="hp-listing__image">

<a href="{{url('/listing/'.$produit->id)}}">

<img src="{{ asset('/ejar/public/images/'.$produit->photo)}}" style="width: 360px;height: 240px;" alt="Stylish remodeled room" loading="lazy">

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

<time class="hp-listing__created-date hp-listing__date hp-meta" datetime="2019-06-30 11:32:04">
Added on {{$produit->created_at}} 
</time>

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
  <div id="message_send_modal_49" class="hp-modal" data-component="modal">
  <h3 class="hp-modal__title">Reply to Listing
</h3>
<form class="hp-form--narrow hp-form hp-form--message-send" data-model="message" data-message="Your message has been sent." action="#" data-action="https://demo.hivepress.io/wp-json/hivepress/v1/messages/" method="POST" data-component="form" data-selectable="true">
  <div class="hp-form__messages" data-component="messages">
</div>
<div class="hp-form__fields">
  <input type="hidden" name="listing" value="" class="hp-field hp-field--hidden">
<input type="hidden" name="recipient" value="" class="hp-field hp-field--hidden">
<div class="hp-form__field hp-form__field--textarea">
  <label class="hp-field__label hp-form__label">
  <span>Message
</span>
</label>
<textarea name="text" maxlength="2048" required="required" class="hp-field hp-field--textarea">
</textarea>
</div>
</div>
<div class="hp-form__footer">
  <button type="submit" class="hp-form__button button alt button hp-field hp-field--submit">
  <span>Send Message
</span>
</button>
</div>
</form>
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
  <i id="hard{{$produit->id}}" style="color:rgba(7,36,86,.25)" class="hp-icon fas fa-heart">
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



</div>


@endsection