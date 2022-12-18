<nav class="header-navbar__menu" data-component="menu">

  <ul id="menu-header-menu-1" class="menu">
 

  <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home  page_item page-item-5  menu-item-16">
  <a href="{{url('/')}}" aria-current="page">Home
</a>
</li>

<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-98">
  <a href="#">Category
</a>
<ul class="sub-menu">
  @foreach($categories as $category)
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-15">
  <a href="{{url('/listing-category/'.$category->id)}}">{{$category->name}}
</a>
</li>
@endforeach 
</ul>
</li>

<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home  page_item page-item-5  menu-item-16">
  <a href="{{url('/contact')}}" aria-current="page">Contact Us
</a>
</li>
</ul>
</nav>