@extends('layouts.app')
@section('css')

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

    <div class="panel panel-default">

        <div class="panel-heading clearfix">
            
            <span class="pull-left">
                <h4 class="mt-5 mb-5">
                {{ $produit->name }} photo</h4>
            </span>

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

  
            

   
           
         <div class="col-md-12">
     <br><br>
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
           
              <li class="active"><a href="#img" data-toggle="tab">Produit Image</a></li>
              <li><a href="#add_img" data-toggle="tab">Add image</a></li>
            
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="img" style="    min-height: 513px;">
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
    
              

              <div class="tab-pane" id="add_img">
                  


<form  method="POST" action="{{ route('addimage') }}" accept-charset="UTF-8" id="addimage" name="create_produit_form" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}

    <center>
       
    <input hidden type="text" name="idxx" value="{{$produit->id}}" >
    <input type="hidden" name="produit" value="{{$produit->id}}">
<input type='file' name="fileimage[]" id="fileimage" class="form-control"  multiple required  /><br>

<br><br>
 <input class="btn btn-primary" type="submit" value=" Add image to Produit" class="btn btn-primary btn-block"><i class="fa fa-plus-circle" ></i>
</center>
</form>





              </div>



              <!-- /.tab-pane -->
    
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>



             <div class="col-md-12">
     <br><br>
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
           
              <li class="active"><a href="#img" data-toggle="tab">Produit video</a></li>
              <li><a href="#add_ved" data-toggle="tab">Add video</a></li>
            
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
                  


<form  method="POST" action="{{ route('addvedio') }}" accept-charset="UTF-8" id="addvedio" name="create_produit_form" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}

    <center>
     
    <input hidden type="text" name="idxx" value="{{$produit->id}}" >
    <input type="hidden" name="produit" value="{{$produit->id}}">
<input type='file' name="file" id="file" class="form-control"   multiple required  /><br>

<br><br>
 <input class="btn btn-primary" type="submit" value=" Add Video to Produit" class="btn btn-primary btn-block"><i class="fa fa-plus-circle" ></i>
</center>
</form>





              </div>
              <!-- /.tab-pane -->
    
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
        


           
                

        </div>
    </div>

@endsection



@section('js')


  <script>
    
    $(document).ready(function() {
   
$(".deleteimage").click(function() {
    var i = $(this).val(); 
var me = $(this);
 
  $.confirm({
    title: 'Are you sure ?',
    content: 'Delete this image from salon gallery !',
    buttons: {
        confirm: function () {
                    $.ajax({
                       headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
            url: '{{Route('deleteimage')}}',
            type: "POST",
            data: {
                id: i
            },
            dataType: "html",
            success: function (datas) {
     
                 me.attr("disabled", true);
                 me.text("DELETED");
    
                 $.alert('Image deleted !');
                 window.setTimeout(function(){location.reload()},2000);
                
                
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert("Error deleting!");
                
            }
        });
         },
        cancel: function () {
           
        }

    }
});

});


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

  
       

    

</script>


  @endsection



