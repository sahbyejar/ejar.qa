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
<style>
.product-slider {  }

.product-slider #carousel { border: 4px solid #1089c0; margin: 0; }

.product-slider #thumbcarousel { margin: 12px 0 0; padding: 0 45px; }

.product-slider #thumbcarousel .item { text-align: center; }

.product-slider #thumbcarousel .item .thumb { border: 4px solid #cecece; width: 20%; margin: 0 2%; display: inline-block; vertical-align: middle; cursor: pointer; max-width: 98px; }

.product-slider #thumbcarousel .item .thumb:hover { border-color: #1089c0; }

.product-slider .item img { width: 100%; height: auto; }

.carousel-control { color: #0284b8; text-align: center; text-shadow: none; font-size: 30px; width: 30px; height: 30px; line-height: 20px; top: 23%; }

.carousel-control:hover, .carousel-control:focus, .carousel-control:active { color: #333; }

.carousel-caption, .carousel-control .fa { font: normal normal normal 30px/26px FontAwesome; }
.carousel-control { background-color: rgba(0, 0, 0, 0); bottom: auto; font-size: 20px; left: 0; position: absolute; top: 30%; width: auto; }

.carousel-control.right, .carousel-control.left { background-color: rgba(0, 0, 0, 0); background-image: none; }
</style>  
<!---->
 


  <style type="text/css">
    input[type=file]{
      display: inline;
    }
    #image_preview{
      border: 1px solid black;
      padding: 10px;
    }
    #image_preview img{
      width: 200px;
      padding: 5px;
    }
  </style>
@endsection
@section('content')

    <div class="">

        <div class="panel-heading clearfix">
            
            <span class="pull-left">
                <h4 class="mt-5 mb-5">
               {{ isset($produit->name) ? $produit->name : 'Produit' }}</h4>
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

            <div class="form-horizontal" >
      

   
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
                     <img id="blah" src="{{ asset('/ejar/public/images/' . $produit->photo) }}" alt=" " style="height:260px;width:260px;border-radius: 50%;border-style: solid;border-width:2px;border-color:#3C8DBC;" />
                    
                </span>
            </label>
          
        </div>

       
    </div>
</div>

<div class="form-group {{ $errors->has('name_ar') ? 'has-error' : '' }}">
    <label for="name_ar" class="col-md-2 control-label">{{ trans('produits.name_ar') }}</label>
    <div class="col-md-10">
        {{ $produit->name_ar }}
    </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">{{ trans('produits.name') }}</label>
    <div class="col-md-10">
       {{ $produit->name }}
    </div>
</div>


<div class="form-group {{ $errors->has('discription_ar') ? 'has-error' : '' }}">
    <label for="discription_ar" class="col-md-2 control-label">{{ trans('produits.discription_ar') }}</label>
    <div class="col-md-10">
        {{ $produit->discription_ar }}
    </div>
</div>

<div class="form-group {{ $errors->has('discription') ? 'has-error' : '' }}">
    <label for="discription" class="col-md-2 control-label">{{ trans('produits.discription') }}</label>
    <div class="col-md-10">
       {{ $produit->discription }}
    </div>
</div>

<div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
    <label for="price" class="col-md-2 control-label">{{ trans('produits.price') }}</label>
    <div class="col-md-10">
       {{ $produit->price }}
    </div>
</div>

<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
    <label for="phone" class="col-md-2 control-label">{{ trans('produits.phone') }}</label>
    <div class="col-md-10">
        {{ $produit->phone }}
    </div>
</div>







</div>         
</div>
</div>
</div>


<div class="col-md-6">
<div class="panel panel-success">
<div class="panel-heading clearfixr">
      <h3 class="panel-title">{{trans('produits.info_localication') }}</h3>
     </div>
     
       <div class="panel-body">
                  <div class="content"> 
                  
                   {{trans('produits.click_map') }}
          <!---------- el map ------------->
         <div class="form-group col-sm-12" style="padding:10px">
            <div id="mape" style="    height: 300px;width: 400; "></div>
        </div> 
        </div>
         </div>
               <div class="panel-body">
                 
                 
                <div class="form-group col-sm-12">
                  <label for="latitude" class="col-sm-2 control-label">{{trans('produits.Latitude') }}</label>
                   <div class="form-group col-sm-10">
                  <input type="text" class=" col-sm-10 form-control" value="{{ $produit->latitude }}" id="latitude" placeholder="latitude " name="latitude" readonly required>
                </div>
                </div>
                <div class="form-group col-sm-12">
                  <label for="longitude" class="col-sm-2 control-label">{{trans('produits.Longitude') }}</label>
                   <div class="form-group col-sm-10">
                  <input type="text" class="col-sm-10 form-control" value="{{ $produit->longitude }}" id="longitude" placeholder="longitude " name="longitude" readonly required>
                </div>
            </div>

            <div class="form-group {{ $errors->has('city_id') ? 'has-error' : '' }}">
    <label for="city_id" class="col-md-2 control-label">{{ trans('produits.city_id') }}</label>
    <div class="col-md-10">
         {{ optional($produit->city)->name  }}
    </div>
</div>
<div class="form-group {{ $errors->has('ville_id') ? 'has-error' : '' }}">
    <label for="ville_id" class="col-md-2 control-label">{{ trans('produits.ville_id') }}</label>
    <div class="col-md-10">
       {{ optional($produit->ville)->ville }}
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
        {{ $produit->instagrame }}
    </div>
</div>

<div class="form-group {{ $errors->has('facebook') ? 'has-error' : '' }}">
    <label for="facebook" class="col-md-2 control-label">{{ trans('produits.facebook') }}</label>
    <div class="col-md-10">
      {{ $produit->facebook }}
    </div>
</div>

<div class="form-group {{ $errors->has('siteweb') ? 'has-error' : '' }}">
    <label for="siteweb" class="col-md-2 control-label">{{ trans('produits.siteweb') }}</label>
    <div class="col-md-10">
       {{ $produit->siteweb }}
    </div>
</div>

<div class="form-group {{ $errors->has('whatsapp') ? 'has-error' : '' }}">
    <label for="whatsapp" class="col-md-2 control-label">{{ trans('produits.whatsapp') }}</label>
    <div class="col-md-10">
       {{ $produit->whatsapp }}
    </div>
</div>


</div>
</div>
            
</div>
</div>




   <div class="col-md-12">
<div class="panel panel-success">
<div class="panel-heading clearfixr">
      <h3 class="panel-title">{{trans('produits.info_special') }}</h3>
     </div>
     
       <div class="panel-body">
                  <div class="content"> 







<div class="form-group {{ $errors->has('rent_sale') ? 'has-error' : '' }}">
    <label for="rent_sale" class="col-md-2 control-label">{{ trans('produits.rent_sale') }}</label>
    <div class="col-md-10">


 <label class="switch">
    
        @if($produit->rent_sale == "on")
        <input type="checkbox" id="rent_sale" name="rent_sale" 

     checked disabled="">
     <div class="slider round"><!--ADDED HTML -->
        <span class="on">{{trans('produits.rent') }}</span>
        @else
         <input type="checkbox" id="rent_sale" name="rent_sale" 

      disabled="">
     <div class="slider round"><!--ADDED HTML -->
        <span class="off">{{trans('produits.sale') }}</span>
        @endif

        <!--END--></div></label>


       
    </div>
</div>





<div class="form-group {{ $errors->has('chiket') ? 'has-error' : '' }}">
    <label for="chiket" class="col-md-2 control-label">{{ trans('produits.chiket') }}</label>
    <div class="col-md-10">


 <label class="switch">
      @if($produit->chiket == "on")
        <input type="checkbox" id="rent_sale" name="rent_sale" 

     checked disabled="">
     <div class="slider round"><!--ADDED HTML -->
        <span class="on">{{trans('produits.Yes') }}</span>
        @else
         <input type="checkbox" id="rent_sale" name="rent_sale" 

      disabled="">
     <div class="slider round"><!--ADDED HTML -->
        <span class="off">{{trans('produits.NO') }}</span>
        @endif

    </div>
</div>



<div class="form-group {{ $errors->has('cautionnement') ? 'has-error' : '' }}">
    <label for="cautionnement" class="col-md-2 control-label">{{ trans('produits.cautionnement') }}</label>
    <div class="col-md-10">


 <label class="switch">

  @if($produit->cautionnement == "on")
        <input type="checkbox" id="rent_sale" name="rent_sale" 

     checked disabled="">
     <div class="slider round"><!--ADDED HTML -->
        <span class="on">{{trans('produits.Yes') }}</span>
        @else
         <input type="checkbox" id="rent_sale" name="rent_sale" 

      disabled="">
     <div class="slider round"><!--ADDED HTML -->
        <span class="off">{{trans('produits.NO') }}</span>
        @endif
    </div>
</div>


       @if($produit->cautionnement == "on")
       

<div id="price_cautionnement_div" class="form-group {{ $errors->has('price_cautionnement') ? 'has-error' : '' }} ">
    <label for="price_cautionnement" class="col-md-2 control-label">{{ trans('produits.price_cautionnement') }}</label>
    <div class="col-md-10">


  {{$produit->price_cautionnement}}
        
    </div>
</div>
      @endif 

<div class="form-group {{ $errors->has('espacer') ? 'has-error' : '' }}">
    <label for="espacer" class="col-md-2 control-label">{{ trans('produits.espacer') }}</label>
    <div class="col-md-10">
        {{$produit->espacer}}
    </div>
</div>

@if($produit->salon !=null)
<div class="form-group {{ $errors->has('salon') ? 'has-error' : '' }}">
    <label for="salon" class="col-md-2 control-label">{{ trans('produits.salon') }}</label>
    <div class="col-md-10">
     {{$produit->salon}}
    </div>
</div>
@endif


@if($produit->room !=null)
<div class="form-group {{ $errors->has('room') ? 'has-error' : '' }}">
    <label for="room" class="col-md-2 control-label">{{ trans('produits.room') }}</label>
    <div class="col-md-10">
     {{$produit->room}}
    </div>
</div>
@endif


@if($produit->toilet !=null)
<div class="form-group {{ $errors->has('toilet') ? 'has-error' : '' }}">
    <label for="toilet" class="col-md-2 control-label">{{ trans('produits.toilet') }}</label>
    <div class="col-md-10">
     {{$produit->toilet}}
    </div>
</div>
@endif



<div class="form-group {{ $errors->has('wifi') ? 'has-error' : '' }}">
    <label for="wifi" class="col-md-2 control-label">{{ trans('produits.wifi') }}</label>
    <div class="col-md-10">


 <label class="switch">
     @if($produit->wifi == "on")
        <input type="checkbox" id="rent_sale" name="rent_sale" 

     checked disabled="">
     <div class="slider round"><!--ADDED HTML -->
        <span class="on">{{trans('produits.Yes') }}</span>
        @else
         <input type="checkbox" id="rent_sale" name="rent_sale" 

      disabled="">
     <div class="slider round"><!--ADDED HTML -->
        <span class="off">{{trans('produits.NO') }}</span>
        @endif
</div>
</label>


    
    </div>
</div>



<div class="form-group {{ $errors->has('kahramam') ? 'has-error' : '' }}">
    <label for="kahramam" class="col-md-2 control-label">{{ trans('produits.kahramam') }}</label>
    <div class="col-md-10">
        <label class="switch">
             @if($produit->kahramam == "on")
        <input type="checkbox" id="rent_sale" name="rent_sale" 

     checked disabled="">
     <div class="slider round"><!--ADDED HTML -->
        <span class="on">{{trans('produits.Yes') }}</span>
        @else
         <input type="checkbox" id="rent_sale" name="rent_sale" 

      disabled="">
     <div class="slider round"><!--ADDED HTML -->
        <span class="off">{{trans('produits.NO') }}</span>
        @endif
            </div>
        </label>

     
        {!! $errors->first('kahramam', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('commission') ? 'has-error' : '' }}">
    <label for="commission" class="col-md-2 control-label">{{ trans('produits.commission') }}</label>
    <div class="col-md-10">
         <label class="switch">
         @if($produit->commission == "2")
        <input type="checkbox" id="rent_sale" name="rent_sale" 

     checked disabled="">
     <div class="slider round"><!--ADDED HTML -->
        <span class="on">{{trans('produits.Yes') }}</span>
        @elseif($produit->commission == "2")
         <input type="checkbox" id="rent_sale" name="rent_sale" 

      disabled="">
     <div class="slider round"><!--ADDED HTML -->
        <span class="on">demi</span>
        @else
         <input type="checkbox" id="rent_sale" name="rent_sale" 

      disabled="">
     <div class="slider round"><!--ADDED HTML -->
        <span class="off">{{trans('produits.NO') }}</span>
        @endif
        
       </div>
   </label>
    </div>
</div>




  @if($produit->parking == "on")
<div class="form-group {{ $errors->has('parking') ? 'has-error' : '' }}">
    <label for="parking" class="col-md-2 control-label">{{ trans('produits.parking') }}</label>
    <div class="col-md-10">


 <label class="switch">
   
        <input type="checkbox" id="rent_sale" name="rent_sale" 

     checked disabled="">
     <div class="slider round"><!--ADDED HTML -->
        <span class="on">{{trans('produits.Yes') }}</span>
       

    </div></label>


        {!! $errors->first('parking', '<p class="help-block">:message</p>') !!}
    </div>
</div>
@endif
  @if($produit->Piscine == "on")
<div class="form-group {{ $errors->has('Piscine') ? 'has-error' : '' }}">
    <label for="Piscine" class="col-md-2 control-label">{{ trans('produits.Piscine') }}</label>
    <div class="col-md-10">


 <label class="switch"> 
        <input type="checkbox" id="rent_sale" name="rent_sale" 

     checked disabled="">
     <div class="slider round"><!--ADDED HTML -->
        <span class="on">{{trans('produits.Yes') }}</span>
        
       </div></label>


        {!! $errors->first('Piscine', '<p class="help-block">:message</p>') !!}
    </div>
</div>
@endif


  @if($produit->gym == "on")

<div class="form-group {{ $errors->has('gym') ? 'has-error' : '' }}">
    <label for="gym" class="col-md-2 control-label">{{ trans('produits.gym') }}</label>
    <div class="col-md-10">


 <label class="switch"> <input type="checkbox" id="rent_sale" name="rent_sale" 

     checked disabled="">
     <div class="slider round"><!--ADDED HTML -->
        <span class="on">{{trans('produits.Yes') }}</span>
        <!--END--></div></label>


    </div>
</div>


@endif


  @if($produit->firstsaken == "on")

<div class="form-group {{ $errors->has('firstsaken') ? 'has-error' : '' }}">
    <label for="firstsaken" class="col-md-2 control-label">{{ trans('produits.firstsaken') }}</label>
    <div class="col-md-10">


 <label class="switch"> <input type="checkbox" id="rent_sale" name="rent_sale" 

     checked disabled="">
     <div class="slider round"><!--ADDED HTML -->
        <span class="on">{{trans('produits.Yes') }}</span>
        </div></label>


    </div>
</div>
@endif





  @if($produit->metro == "1")

<div class="form-group {{ $errors->has('metro') ? 'has-error' : '' }}">
    <label for="metro" class="col-md-2 control-label">{{ trans('produits.metro') }}</label>
    <div class="col-md-10">


 <label class="switch"> <input type="checkbox" id="rent_sale" name="rent_sale" 

     checked disabled="">
     <div class="slider round"><!--ADDED HTML -->
        <span class="on">{{trans('produits.Yes') }}</span>
        </div></label>


    </div>
</div>
@endif



  @if($produit->family == "1")

<div class="form-group {{ $errors->has('family') ? 'has-error' : '' }}">
    <label for="family" class="col-md-2 control-label">{{ trans('produits.family') }}</label>
    <div class="col-md-10">


 <label class="switch"> <input type="checkbox" id="rent_sale" name="rent_sale" 

     checked disabled="">
     <div class="slider round"><!--ADDED HTML -->
        <span class="on">{{trans('produits.Yes') }}</span>
        </div></label>


    </div>
</div>
@endif






  @if($produit->firstsaken == "on")

<div class="form-group {{ $errors->has('furnished') ? 'has-error' : '' }}">
    <label for="furnished" class="col-md-2 control-label">{{ trans('produits.furnished') }}</label>
    <div class="col-md-10">

 <label class="switch"> <input type="checkbox" id="rent_sale" name="rent_sale" 

     checked disabled="">
     <div class="slider round"><!--ADDED HTML -->
        <span class="on">{{trans('produits.Yes') }}</span>
        </div></label>
    </div>
</div>


@endif




</div>
            
</div>
</div>

</div>





                <div class="form-group">
                    <div class="col-md-12"style="justify-content: center; display: flex;">
                      
                    </div>
                </div>

            </div>

        </div>
    </div>







             <div class="col-md-12">
     <br><br>
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
           
              <li class="active"><a href="#img" data-toggle="tab">Produit video</a></li>
              <li><a href="#add_ved" data-toggle="tab">Produit image</a></li>
            
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="img" style="    min-height: 513px;">
     <div class="product-slider">
  <div id="carousel" class="carousel slide"style="min-height: 300px;" data-ride="carousel" style="min-height: 300px;">
    <div class="carousel-inner">
@foreach($images as $key => $video)
@if( $video->v == 0 && $video->type == 'video' )
      <div class="item active"> <center>
<video   style="width:auto;height:400px;" controls> 
        <source src="{{ url('/ejar/public/images/' . $video->photo)  }}" type="video/mp4"> 
        Your browser does not support the video tag. 
   </video> 

        </center> </div>
@elseif( $video->v != 0 && $video->type == 'video' )
      <div class="item "> <center>
<video   style="width:auto;height:400px;" controls> 
        <source src="{{ url('/ejar/public/images/' . $video->photo)  }}" type="video/mp4"> 
        Your browser does not support the video tag. 
   </video> 

        </center> </div>

        @endif


@endforeach

    </div>
  </div>
  <div class="clearfix">
    <div id="thumbcarousel" class="carousel slide" data-interval="false">
      <div class="carousel-inner">
        <div class="item active">
      
@foreach($images as $key => $video)


     @if(  $video->type == 'video' )
     
          <div  style="position: relative; left: 0; top: 0;   " data-target="#carousel" data-slide-to="{{$video->v}}" class="thumb">
         
          <video style="width: 115px;"  controls> 
        <source src="{{ url('/ejar/public/images/' . $video->photo)  }}" type="video/mp4"> 
        Your browser does not support the video tag. 
   </video> 
          <button style="position:absolute;bottom:0px;right:0px;" class="deleteimage" value="{{$video->id}}" ><i class="fa fa-trash"></i></button>
          </div>
          @endif
     @endforeach          <!-- ;-->
          


        </div>

      </div>
      <!-- /carousel-inner --> 
      <a class="left carousel-control" href="#thumbcarousel" role="button" data-slide="prev"> <i class="fa fa-angle-left" aria-hidden="true"></i> </a> <a class="right carousel-control" href="#thumbcarousel" role="button" data-slide="next"><i class="fa fa-angle-right" aria-hidden="true"></i> </a> 
      </div>
    <!-- /thumbcarousel --> 
    
  </div>
</div>


              </div>
    
              




                    <div class="tab-pane" id="add_ved">
                  

     <div class="product-slider">
  <div id="carousel" class="carousel slide"style="min-height: 300px;" data-ride="carousel">
    <div class="carousel-inner">
@foreach($images as $key => $image)
@if($image->i == 0 && $image->type == 'image')
      <div class="item active"> <center>
        <img style="width:auto;height:400px;" src="{{ url('/ejar/public/images/' . $image->photo) }}"></center> </div>
@elseif($image->i != 0 && $image->type == 'image')
      <div class="item"> <center><img style="width:auto;height:400px;" src="{{ url('/ejar/public/thumbs/' . $image->photo) }}"></center> </div>
@endif
@endforeach

    </div>
  </div>
  <div class="clearfix">
    <div id="thumbcarousel" class="carousel slide" data-interval="false">
      <div class="carousel-inner">
        <div class="item active">
      
@foreach($images as $key => $image)


     
     @if($image->type == 'image')
          <div  style="position: relative; left: 0; top: 0;   " data-target="#carousel" data-slide-to="{{$key}}" class="thumb">
            <img src="{{ url('/ejar/public/thumbs/' . $image->photo) }}" >
          
          <button style="position:absolute;bottom:0px;right:0px;" class="deleteimage" value="{{$image->id}}" ><i class="fa fa-trash"></i></button>
          </div>
          @endif
     @endforeach          <!-- ;-->
          


        </div>

      </div>
      <!-- /carousel-inner --> 
      <a class="left carousel-control" href="#thumbcarousel" role="button" data-slide="prev"> <i class="fa fa-angle-left" aria-hidden="true"></i> </a> <a class="right carousel-control" href="#thumbcarousel" role="button" data-slide="next"><i class="fa fa-angle-right" aria-hidden="true"></i> </a> 
      </div>
    <!-- /thumbcarousel --> 
    
  </div>
</div>




              </div>
              <!-- /.tab-pane -->
    
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
        

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



