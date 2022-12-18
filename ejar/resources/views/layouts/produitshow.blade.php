
@extends('layouts.appfrent')
@section('css')
<style type="text/css">
  .header-hero {
 background-image: url({{ asset('/ejar/public/images/'.$produit->photo)}}); 
 }
</style>
@endsection


@section('tolbar')
<section class="header-hero hp-listing-category hp-listing-category--view-page header-hero--large header-hero--cover" data-component="parallax">
	<div class="header-hero__content">
	<div class="container">
	<div class="row">
	<div class="col-sm-8 col-sm-offset-2 col-xs-12">
	<div class="hp-listing-category__header">

<h1 class="hp-listing-category__name">{{ $produit->name }} 
</h1>
<div class="hp-listing-category__description">{{ $produit->name_ar }}
</div>
</div>
</div>
</div>
</div>
</div>
</section>
@endsection


@section('content')


<div class="site-content" id="content">
  <div class="container">
  <div class="content-area">
  <div class="hp-page site-main">
  <div class="hp-row hp-listing hp-listing--view-page">
  <main class="hp-page__content hp-col-sm-8 hp-col-xs-12">
  <div class="hp-listing__categories hp-listing__category">

<a href="{{url('/listing-category/'.$produit->category->id)}}">{{$produit->category->name}} {{$produit->category->name_ar}}
</a>
</div>
<h1 class="hp-listing__title">
  <span>{{$produit->name}} {{$produit->name_ar}}
</span>
</h1>
<div class="hp-listing__details hp-listing__details--primary">
  <div class="hp-listing__categories hp-listing__category">

<a href="{{url('/listing-category/'.$produit->category->id)}}">{{$produit->category->name}} {{$produit->category->name_ar}}
</a>
</div>
<div class="hp-listing__location">

<i class="hp-icon fas fa-map-marker-alt">
</i>

<a href="https://www.google.com/maps/search/?api=1&amp;query={$produit->latitude}},{{$produit->longitude}}" target="_blank"> {{$produit->ville()->first()->ville}} ,{{$produit->city()->first()->name}} <br>
  {{$produit->ville()->first()->name_ar}} ,{{$produit->city()->first()->name_ar}}
</a>
</div>

<time class="hp-listing__created-date hp-listing__date hp-meta" datetime="2019-06-30 11:32:04">
Added on {{$produit->created_at}} 
</time>

</div>
<div class="hp-page__topbar hp-page__topbar--separate">
  <nav class="hp-menu--tabbed hp-menu hp-menu--listing-manage">
  <ul>
  <li class="hp-menu__item hp-menu__item--current current-menu-item">
  <a href="{{url('/listing/'.$produit->id)}}">
  <span>Details
</span>
</a>
</li>

</ul>
</nav>
<div class="hp-listing__actions hp-listing__actions--secondary">
  <a class="hp-listing__action hp-listing__action--favorite hp-link" href="#user_login_modal">
  <i class="hp-icon fas fa-heart">
</i>
<span>Add to Favorites
</span>
</a>
</div>
</div>
<div class="hp-listing__images" data-component="carousel-slider">

<img src="{{ asset('/ejar/public/images/'.$produit->photo)}}" data-src="" alt="{{$produit->category->name}} {{$produit->category->name_ar}}" loading="lazy">
@foreach($images as $image)

<img src="{{ asset('/ejar/public/images/'.$image->photo)}}" data-src="" alt="{{$produit->category->name}} {{$produit->category->name_ar}}" loading="lazy">

@endforeach
</div>
<div class="hp-listing__attributes hp-listing__attributes--secondary">
  <div class="hp-row">
  <div class="hp-col-lg-6 hp-col-xs-12">
  <div class="hp-listing__attribute hp-listing__attribute--bedrooms">

<strong>Bedrooms
</strong>: 1
</div>
</div>
<div class="hp-col-lg-6 hp-col-xs-12">
  <div class="hp-listing__attribute hp-listing__attribute--bathrooms">

<strong>Bathrooms
</strong>: 1
</div>
</div>
<div class="hp-col-lg-6 hp-col-xs-12">
  <div class="hp-listing__attribute hp-listing__attribute--sq-footage">

<strong>Sq. Footage
</strong>: 130 ft²
</div>
</div>
<div class="hp-col-lg-6 hp-col-xs-12">
  <div class="hp-listing__attribute hp-listing__attribute--pets">

<strong>Pets
</strong>: Cats Only
</div>
</div>
</div>
</div>
<div class="hp-listing__description">
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae eleifend massa. Sed tristique vehicula urna, et scelerisque orci suscipit nec. Donec egestas id nulla at lacinia. Donec lorem lectus, suscipit ac mi id, blandit posuere enim. Quisque mollis erat fermentum risus auctor fermentum curabitur quis aliquet dui. Integer enim nisl, sollicitudin sed dui et, luctus egestas magna.
</p>
</div>
<div id="reviews" class="hp-section">
  <h2 class="hp-section__title">Reviews
</h2>
<div class="hp-reviews hp-block hp-grid">
  <div class="hp-row">
  <div class="hp-grid__item hp-col-sm-12 hp-col-xs-12">
  <div class="hp-review hp-review--view-block">
  <header class="hp-review__header">
  <div class="hp-review__image">

<img src="https://demo.hivepress.io/wp-content/uploads/2019/06/matheus-ferrero-216385-unsplash-150x150.jpg" class="avatar avatar-150 photo" height="150" width="150" alt="" loading="lazy">
</div>
<div class="hp-review__summary">
  <div class="hp-review__author">Michelle Foster
</div>
<div class="hp-review__details">
  <div class="hp-review__rating hp-rating-stars" data-component="rating" data-value="4">
</div>

<time class="hp-review__created-date hp-review__date hp-meta" datetime="2019-06-18 09:41:05">06/18/2019
</time>
</div>
</div>
</header>
<div class="hp-review__content">
  <div class="hp-review__text">
  <p>Nunc facilisis felis pharetra urna cursus, sed porta lacus commodo. Praesent aliquet facilisis tincidunt. Nullam malesuada blandit est, nec accumsan tortor malesuada donec.
</p>
</div>
</div>
</div>
</div>
<div class="hp-grid__item hp-col-sm-12 hp-col-xs-12">
  <div class="hp-review hp-review--view-block">
  <header class="hp-review__header">
  <div class="hp-review__image">

<img src="https://demo.hivepress.io/wp-content/uploads/2019/06/angelika-agibalova-1245864-unsplash-150x150.jpg" class="avatar avatar-150 photo" height="150" width="150" alt="" loading="lazy">
</div>
<div class="hp-review__summary">
  <div class="hp-review__author">Thomas Hinton
</div>
<div class="hp-review__details">
  <div class="hp-review__rating hp-rating-stars" data-component="rating" data-value="4">
</div>

<time class="hp-review__created-date hp-review__date hp-meta" datetime="2019-06-18 09:35:40">06/18/2019
</time>
</div>
</div>
</header>
<div class="hp-review__content">
  <div class="hp-review__text">
  <p>Aliquam et eros vel dui finibus interdum quis vel nulla. Fusce vestibulum ex eget cursus commodo. Nulla vitae blandit sapien. Ut sit amet mauris id enim ullamcorper.
</p>
</div>
</div>
</div>
</div>
<div class="hp-grid__item hp-col-sm-12 hp-col-xs-12">
  <div class="hp-review hp-review--view-block">
  <header class="hp-review__header">
  <div class="hp-review__image">

<img src="https://demo.hivepress.io/wp-content/uploads/2019/06/ansley-ventura-368550-unsplash-150x150.jpg" class="avatar avatar-150 photo" height="150" width="150" alt="" loading="lazy">
</div>
<div class="hp-review__summary">
  <div class="hp-review__author">Mary Lockhart
</div>
<div class="hp-review__details">
  <div class="hp-review__rating hp-rating-stars" data-component="rating" data-value="4">
</div>

<time class="hp-review__created-date hp-review__date hp-meta" datetime="2019-06-18 09:29:27">06/18/2019
</time>
</div>
</div>
</header>
<div class="hp-review__content">
  <div class="hp-review__text">
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vitae nibh vitae lectus gravida condimentum et blandit lacus. Donec egestas ex ac accumsan praesent.
</p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</main>
<aside class="hp-page__sidebar hp-col-sm-4 hp-col-xs-12 site-sidebar" data-component="sticky">
  <div class="hp-listing__attributes hp-listing__attributes--primary hp-widget widget">
  <div class="hp-listing__attribute hp-listing__attribute--price">
$870 / month
</div>
</div>
<div class="hp-listing__actions hp-listing__actions--primary hp-widget widget">
  <div id="listing_report_modal" class="hp-modal" data-component="modal">
  <h3 class="hp-modal__title">Report Listing
</h3>
<form class="hp-form--narrow hp-form hp-form--listing-report" data-model="listing" data-id="49" data-message="Listing has been reported." action="#" data-action="https://demo.hivepress.io/wp-json/hivepress/v1/listings/49/report/" method="POST" data-reset="true" data-component="form" data-selectable="true">
  <div class="hp-form__header">
  <p class="hp-form__description">Please provide details that will help us verify that this listing violates the terms of service.
</p>
<div class="hp-form__messages" data-component="messages">
</div>
</div>
<div class="hp-form__fields">
  <div class="hp-form__field hp-form__field--textarea">
  <label class="hp-field__label hp-form__label">
  <span>Details
</span>
</label>
<textarea name="details" maxlength="2048" required="required" class="hp-field hp-field--textarea">
</textarea>
</div>
</div>
<div class="hp-form__footer">
  <button type="submit" class="hp-form__button button alt button hp-field hp-field--submit">
  <span>Report Listing
</span>
</button>
</div>
</form>
</div>
<div id="review_submit_modal" class="hp-modal" data-component="modal">
  <h3 class="hp-modal__title">Write a Review
</h3>
<form class="hp-form--narrow hp-form hp-form--review-submit" data-model="review" data-message="Your review has been submitted." action="#" data-action="https://demo.hivepress.io/wp-json/hivepress/v1/reviews/" method="POST" data-component="form" data-selectable="true">
  <div class="hp-form__messages" data-component="messages">
</div>
<div class="hp-form__fields">
  <input type="hidden" name="listing" value="49" class="hp-field hp-field--hidden">
<div class="hp-form__field hp-form__field--rating">
  <label class="hp-field__label hp-form__label">
  <span>Rating
</span>
</label>
<div class="hp-rating-stars hp-rating-stars--large hp-field hp-field--rating" data-component="rating" data-name="rating" data-value="">
</div>
</div>
<div class="hp-form__field hp-form__field--textarea">
  <label class="hp-field__label hp-form__label">
  <span>Review
</span>
</label>
<textarea name="text" maxlength="2048" required="required" class="hp-field hp-field--textarea">
</textarea>
</div>
</div>
<div class="hp-form__footer">
  <button type="submit" class="hp-form__button button alt button hp-field hp-field--submit">
  <span>Submit Review
</span>
</button>
</div>
</form>
</div>
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
<button type="button" class="hp-listing__action hp-listing__action--message button button--large button--primary alt" data-component="link" data-url="#user_login_modal">Reply to Listing
</button>

<a href="#user_login_modal" class="hp-listing__action hp-listing__action--review hp-link">

<i class="hp-icon fas fa-star">
</i>

<span>Write a Review
</span>

</a>

<a href="#user_login_modal" class="hp-listing__action hp-listing__action--report hp-link">
  <i class="hp-icon fas fa-flag">
</i>
<span>Report Listing
</span>
</a>
</div>
<div data-markers="[{&quot;title&quot;:&quot;Stylish remodeled room&quot;,&quot;latitude&quot;:40.807566,&quot;longitude&quot;:-73.920729,&quot;content&quot;:&quot;&lt;div class=\&quot;hp-listing hp-listing--map-block\&quot;&gt;&lt;h5 class=\&quot;hp-listing__title\&quot;&gt;&lt;a href=https://demo.hivepress.io/"https:////demo.hivepress.io//listing//stylish-remodeled-room///">Stylish remodeled room&lt;\/a&gt;\n&lt;\/h5&gt;&lt;\/div&gt;&quot;}]" class="hp-listing__map widget hp-map" data-component="map">
</div>
<article class="hp-vendor hp-vendor--view-block">
  <header class="hp-vendor__header">
  <div class="hp-vendor__image">

<a href="https://demo.hivepress.io/vendor/brian/">

<img src="https://demo.hivepress.io/wp-content/uploads/2019/06/micah-296507-unsplash.jpg" alt="Brian Peterson" loading="lazy">

</a>
</div>
</header>
<div class="hp-vendor__content">
  <h4 class="hp-vendor__name">
  <a href="https://demo.hivepress.io/vendor/brian/">Brian Peterson
</a>
</h4>
<div class="hp-vendor__details hp-vendor__details--primary">
  <time class="hp-vendor__registered-date hp-vendor__date hp-meta" datetime="2019-06-16 10:59:33">
Member since 06/16/2019
</time>
<div class="hp-vendor__rating hp-rating">
  <div class="hp-rating__stars hp-rating-stars" data-component="rating" data-value="4.3">
</div>
<div class="hp-rating__details">

<span class="hp-rating__value">4.3
</span>

<span class="hp-rating__count">(54)
</span>
</div>
</div>
</div>
</div>
<footer class="hp-vendor__footer">
  <div class="hp-vendor__attributes hp-vendor__attributes--primary">
</div>
<div class="hp-vendor__actions hp-vendor__actions--primary">
  <div id="message_send_modal_32" class="hp-modal" data-component="modal">
  <h3 class="hp-modal__title">Send Message
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
<a href="#user_login_modal" title="Send Message" class="hp-vendor__action hp-vendor__action--message">
  <i class="hp-icon fas fa-comment">
</i>
</a>
</div>
</footer>
</article>
</aside>
</div>
<footer class="hp-page__footer">
  <div class="hp-section">
  <h2 class="hp-section__title">Related Listings
</h2>
<div class="hp-listings hp-block hp-grid">
  <div class="hp-row">
  <div class="hp-grid__item hp-col-sm-4 hp-col-xs-12">
  <article class="hp-listing hp-listing--view-block">
  <header class="hp-listing__header">
  <div class="hp-listing__image">

<a href="https://demo.hivepress.io/listing/room-with-private-entrance/">

<img src="https://demo.hivepress.io/wp-content/uploads/2019/06/sven-brandsma-1379481-unsplash-400x300.jpg" alt="Room with private entrance" loading="lazy">

</a>
</div>
</header>
<div class="hp-listing__content">
  <div class="hp-listing__categories hp-listing__category">

<a href="https://demo.hivepress.io/listing-category/rooms/">Rooms
</a>
</div>
<h4 class="hp-listing__title">
  <a href="https://demo.hivepress.io/listing/room-with-private-entrance/">Room with private entrance
</a>
</h4>
<div class="hp-listing__details hp-listing__details--primary">
  <div class="hp-listing__categories hp-listing__category">

<a href="https://demo.hivepress.io/listing-category/rooms/">Rooms
</a>
</div>
<div class="hp-listing__location">

<i class="hp-icon fas fa-map-marker-alt">
</i>

<a href="https://www.google.com/maps/search/?api=1&amp;query=40.828039,-73.94244" target="_blank">St Nicholas Ave, New York, NY
</a>
</div>

<time class="hp-listing__created-date hp-listing__date hp-meta" datetime="2019-06-05 11:25:33">
Added on 06/05/2019
</time>
<div class="hp-listing__rating hp-rating">
  <div class="hp-rating__stars hp-rating-stars" data-component="rating" data-value="3.3">
</div>

<a href="https://demo.hivepress.io/listing/room-with-private-entrance/#reviews" class="hp-rating__details">

<span class="hp-rating__value">3.3
</span>

<span class="hp-rating__count">(3)
</span>

</a>
</div>
</div>
<div class="hp-listing__attributes hp-listing__attributes--secondary">
  <div class="hp-row">
  <div class="hp-col-lg-6 hp-col-xs-12">
  <div class="hp-listing__attribute hp-listing__attribute--bedrooms">

<strong>Bedrooms
</strong>: 1
</div>
</div>
<div class="hp-col-lg-6 hp-col-xs-12">
  <div class="hp-listing__attribute hp-listing__attribute--bathrooms">

<strong>Bathrooms
</strong>: 1
</div>
</div>
<div class="hp-col-lg-6 hp-col-xs-12">
  <div class="hp-listing__attribute hp-listing__attribute--sq-footage">

<strong>Sq. Footage
</strong>: 160 ft²
</div>
</div>
<div class="hp-col-lg-6 hp-col-xs-12">
  <div class="hp-listing__attribute hp-listing__attribute--pets">

<strong>Pets
</strong>: Allowed
</div>
</div>
</div>
</div>
</div>
<footer class="hp-listing__footer">
  <div class="hp-listing__attributes hp-listing__attributes--primary">
  <div class="hp-listing__attribute hp-listing__attribute--price">
$650 / month
</div>
</div>
<div class="hp-listing__actions hp-listing__actions--primary">
  <div id="message_send_modal_47" class="hp-modal" data-component="modal">
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
<a href="#user_login_modal" title="Reply to Listing" class="hp-listing__action hp-listing__action--message">
  <i class="hp-icon fas fa-comment">
</i>
</a>

<a class="hp-listing__action hp-listing__action--favorite" href="#user_login_modal">
  <i class="hp-icon fas fa-heart">
</i>
</a>
</div>
</footer>
</article>
</div>
<div class="hp-grid__item hp-col-sm-4 hp-col-xs-12">
  <article class="hp-listing hp-listing--view-block">
  <header class="hp-listing__header">
  <div class="hp-listing__image">

<a href="https://demo.hivepress.io/listing/bright-and-spacious-room/">

<img src="https://demo.hivepress.io/wp-content/uploads/2019/06/sylwia-pietruszka-218324-unsplash-400x300.jpg" alt="Bright and spacious room" loading="lazy">

</a>
</div>
</header>
<div class="hp-listing__content">
  <div class="hp-listing__categories hp-listing__category">

<a href="https://demo.hivepress.io/listing-category/rooms/">Rooms
</a>
</div>
<h4 class="hp-listing__title">
  <a href="https://demo.hivepress.io/listing/bright-and-spacious-room/">Bright and spacious room
</a>
</h4>
<div class="hp-listing__details hp-listing__details--primary">
  <div class="hp-listing__categories hp-listing__category">

<a href="https://demo.hivepress.io/listing-category/rooms/">Rooms
</a>
</div>
<div class="hp-listing__location">

<i class="hp-icon fas fa-map-marker-alt">
</i>

<a href="https://www.google.com/maps/search/?api=1&amp;query=40.832781,-73.928279" target="_blank">1001 Woodycrest Ave, Bronx, NY
</a>
</div>

<time class="hp-listing__created-date hp-listing__date hp-meta" datetime="2019-06-04 11:23:53">
Added on 06/04/2019
</time>
<div class="hp-listing__rating hp-rating">
  <div class="hp-rating__stars hp-rating-stars" data-component="rating" data-value="4.7">
</div>

<a href="https://demo.hivepress.io/listing/bright-and-spacious-room/#reviews" class="hp-rating__details">

<span class="hp-rating__value">4.7
</span>

<span class="hp-rating__count">(3)
</span>

</a>
</div>
</div>
<div class="hp-listing__attributes hp-listing__attributes--secondary">
  <div class="hp-row">
  <div class="hp-col-lg-6 hp-col-xs-12">
  <div class="hp-listing__attribute hp-listing__attribute--bedrooms">

<strong>Bedrooms
</strong>: 1
</div>
</div>
<div class="hp-col-lg-6 hp-col-xs-12">
  <div class="hp-listing__attribute hp-listing__attribute--bathrooms">

<strong>Bathrooms
</strong>: 1
</div>
</div>
<div class="hp-col-lg-6 hp-col-xs-12">
  <div class="hp-listing__attribute hp-listing__attribute--sq-footage">

<strong>Sq. Footage
</strong>: 180 ft²
</div>
</div>
<div class="hp-col-lg-6 hp-col-xs-12">
  <div class="hp-listing__attribute hp-listing__attribute--pets">

<strong>Pets
</strong>: Cats Only
</div>
</div>
</div>
</div>
</div>
<footer class="hp-listing__footer">
  <div class="hp-listing__attributes hp-listing__attributes--primary">
  <div class="hp-listing__attribute hp-listing__attribute--price">
$920 / month
</div>
</div>
<div class="hp-listing__actions hp-listing__actions--primary">
  <div id="message_send_modal_46" class="hp-modal" data-component="modal">
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
<a href="#user_login_modal" title="Reply to Listing" class="hp-listing__action hp-listing__action--message">
  <i class="hp-icon fas fa-comment">
</i>
</a>

<a class="hp-listing__action hp-listing__action--favorite" href="#user_login_modal">
  <i class="hp-icon fas fa-heart">
</i>
</a>
</div>
</footer>
</article>
</div>
<div class="hp-grid__item hp-col-sm-4 hp-col-xs-12">
  <article class="hp-listing hp-listing--view-block">
  <header class="hp-listing__header">
  <div class="hp-listing__image">

<a href="https://demo.hivepress.io/listing/central-and-quiet-room/">

<img src="https://demo.hivepress.io/wp-content/uploads/2019/06/jarek-ceborski-250955-unsplash-400x300.jpg" alt="Central and quiet room" loading="lazy">

</a>
</div>
</header>
<div class="hp-listing__content">
  <div class="hp-listing__categories hp-listing__category">

<a href="https://demo.hivepress.io/listing-category/rooms/">Rooms
</a>
</div>
<h4 class="hp-listing__title">
  <a href="https://demo.hivepress.io/listing/central-and-quiet-room/">Central and quiet room
</a>
</h4>
<div class="hp-listing__details hp-listing__details--primary">
  <div class="hp-listing__categories hp-listing__category">

<a href="https://demo.hivepress.io/listing-category/rooms/">Rooms
</a>
</div>
<div class="hp-listing__location">

<i class="hp-icon fas fa-map-marker-alt">
</i>

<a href="https://www.google.com/maps/search/?api=1&amp;query=40.829985,-73.919695" target="_blank">1011 Carroll Pl, Bronx, NY
</a>
</div>

<time class="hp-listing__created-date hp-listing__date hp-meta" datetime="2019-06-07 11:22:22">
Added on 06/07/2019
</time>
<div class="hp-listing__rating hp-rating">
  <div class="hp-rating__stars hp-rating-stars" data-component="rating" data-value="3.7">
</div>

<a href="https://demo.hivepress.io/listing/central-and-quiet-room/#reviews" class="hp-rating__details">

<span class="hp-rating__value">3.7
</span>

<span class="hp-rating__count">(3)
</span>

</a>
</div>
</div>
<div class="hp-listing__attributes hp-listing__attributes--secondary">
  <div class="hp-row">
  <div class="hp-col-lg-6 hp-col-xs-12">
  <div class="hp-listing__attribute hp-listing__attribute--bedrooms">

<strong>Bedrooms
</strong>: 1
</div>
</div>
<div class="hp-col-lg-6 hp-col-xs-12">
  <div class="hp-listing__attribute hp-listing__attribute--bathrooms">

<strong>Bathrooms
</strong>: 1
</div>
</div>
<div class="hp-col-lg-6 hp-col-xs-12">
  <div class="hp-listing__attribute hp-listing__attribute--sq-footage">

<strong>Sq. Footage
</strong>: 150 ft²
</div>
</div>
<div class="hp-col-lg-6 hp-col-xs-12">
  <div class="hp-listing__attribute hp-listing__attribute--pets">

<strong>Pets
</strong>: Not Allowed
</div>
</div>
</div>
</div>
</div>
<footer class="hp-listing__footer">
  <div class="hp-listing__attributes hp-listing__attributes--primary">
  <div class="hp-listing__attribute hp-listing__attribute--price">
$850 / month
</div>
</div>
<div class="hp-listing__actions hp-listing__actions--primary">
  <div id="message_send_modal_45" class="hp-modal" data-component="modal">
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
<a href="#user_login_modal" title="Reply to Listing" class="hp-listing__action hp-listing__action--message">
  <i class="hp-icon fas fa-comment">
</i>
</a>

<a class="hp-listing__action hp-listing__action--favorite" href="#user_login_modal">
  <i class="hp-icon fas fa-heart">
</i>
</a>
</div>
</footer>
</article>
</div>
</div>
</div>
</div>
</footer>
</div>
</div>
</div>
</div>


@endsection



@section('js')


  @endsection



