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
            <h4 class="mt-5 mb-5">{{ isset($produit->name) ? $produit->name : 'Produit' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('produits.produit.destroy', $produit->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('produits.produit.index') }}" class="btn btn-primary" title="{{ trans('produits.show_all') }}">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                   
                    
                   

                    <button type="submit" class="btn btn-danger" title="{{ trans('produits.delete') }}" onclick="return confirm(&quot;{{ trans('produits.confirm_delete') }}?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>
    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('produits.category_id') }}</dt>
            <dd>{{ optional($produit->category)->name }}</dd>
            <dt>{{ trans('produits.user_id') }}</dt>
            <dd>{{ optional($produit->user)->name }}</dd>
            <dt>{{ trans('produits.name_ar') }}</dt>
            <dd>{{ $produit->name_ar }}</dd>
            <dt>{{ trans('produits.name') }}</dt>
            <dd>{{ $produit->name }}</dd>
            <dt>{{ trans('produits.photo') }}</dt>
            <dd>{{ asset('/ejar/public/images/' . $produit->photo) }}</dd>
            <dt>{{ trans('produits.discription_ar') }}</dt>
            <dd>{{ $produit->discription_ar }}</dd>
            <dt>{{ trans('produits.discription') }}</dt>
            <dd>{{ $produit->discription }}</dd>
            <dt>{{ trans('produits.price') }}</dt>
            <dd>{{ $produit->price }}</dd>
            <dt>{{ trans('produits.phone') }}</dt>
            <dd>{{ $produit->phone }}</dd>
            <dt>{{ trans('produits.ville_id') }}</dt>
            <dd>{{ optional($produit->ville)->ville }}</dd>
            <dt>{{ trans('produits.city_id') }}</dt>
            <dd>{{ optional($produit->city)->name }}</dd>
            <dt>{{ trans('produits.longitude') }}</dt>
            <dd>{{ $produit->longitude }}</dd>
            <dt>{{ trans('produits.latitude') }}</dt>
            <dd>{{ $produit->latitude }}</dd>
            <dt>{{ trans('produits.vupost') }}</dt>
            <dd>{{ $produit->vupost }}</dd>
            <dt>{{ trans('produits.instagrame') }}</dt>
            <dd>{{ $produit->instagrame }}</dd>
            <dt>{{ trans('produits.vuinsta') }}</dt>
            <dd>{{ $produit->vuinsta }}</dd>
            <dt>{{ trans('produits.facebook') }}</dt>
            <dd>{{ $produit->facebook }}</dd>
            <dt>{{ trans('produits.vufb') }}</dt>
            <dd>{{ $produit->vufb }}</dd>
            <dt>{{ trans('produits.siteweb') }}</dt>
            <dd>{{ $produit->siteweb }}</dd>
            <dt>{{ trans('produits.vuweb') }}</dt>
            <dd>{{ $produit->vuweb }}</dd>
            <dt>{{ trans('produits.linkshare') }}</dt>
            <dd>{{ $produit->linkshare }}</dd>
            <dt>{{ trans('produits.cliquephone') }}</dt>
            <dd>{{ $produit->cliquephone }}</dd>
            <dt>{{ trans('produits.whatsapp') }}</dt>
            <dd>{{ $produit->whatsapp }}</dd>
            <dt>{{ trans('produits.clique_whatsapp') }}</dt>
            <dd>{{ $produit->clique_whatsapp }}</dd>
            <dt>{{ trans('produits.rent_sale') }}</dt>
            <dd>{{ $produit->rent_sale }}</dd>
            <dt>{{ trans('produits.chiket') }}</dt>
            <dd>{{ $produit->chiket }}</dd>
            <dt>{{ trans('produits.cautionnement') }}</dt>
            <dd>{{ $produit->cautionnement }}</dd>
            <dt>{{ trans('produits.price_cautionnement') }}</dt>
            <dd>{{ $produit->price_cautionnement }}</dd>
            <dt>{{ trans('produits.espacer') }}</dt>
            <dd>{{ $produit->espacer }}</dd>
            <dt>{{ trans('produits.interface') }}</dt>
            <dd>{{ $produit->interface }}</dd>
            <dt>{{ trans('produits.wifi') }}</dt>
            <dd>{{ $produit->wifi }}</dd>
            <dt>{{ trans('produits.kahramam') }}</dt>
            <dd>{{ $produit->kahramam }}</dd>
            <dt>{{ trans('produits.route_principale') }}</dt>
            <dd>{{ $produit->route_principale }}</dd>
            <dt>{{ trans('produits.commission') }}</dt>
            <dd>{{ $produit->commission }}</dd>
            <dt>{{ trans('produits.vip1') }}</dt>
            <dd>{{ $produit->vip1 }}</dd>
            <dt>{{ trans('produits.vip2') }}</dt>
            <dd>{{ $produit->vip2 }}</dd>
            <dt>{{ trans('produits.parking') }}</dt>
            <dd>{{ $produit->parking }}</dd>
            <dt>{{ trans('produits.Piscine') }}</dt>
            <dd>{{ $produit->Piscine }}</dd>
            <dt>{{ trans('produits.gym') }}</dt>
            <dd>{{ $produit->gym }}</dd>
            <dt>{{ trans('produits.firstsaken') }}</dt>
            <dd>{{ $produit->firstsaken }}</dd>
            <dt>{{ trans('produits.salon') }}</dt>
            <dd>{{ $produit->salon }}</dd>
            <dt>{{ trans('produits.toilet') }}</dt>
            <dd>{{ $produit->toilet }}</dd>
            <dt>{{ trans('produits.room') }}</dt>
            <dd>{{ $produit->room }}</dd>
            <dt>{{ trans('produits.officeoy') }}</dt>
            <dd>{{ $produit->officeoy }}</dd>
            <dt>{{ trans('produits.office') }}</dt>
            <dd>{{ $produit->office }}</dd>
            <dt>{{ trans('produits.secretary') }}</dt>
            <dd>{{ $produit->secretary }}</dd>
            <dt>{{ trans('produits.imprimerie') }}</dt>
            <dd>{{ $produit->imprimerie }}</dd>
            <dt>{{ trans('produits.DELETED') }}</dt>
            <dd>{{ $produit->DELETED }}</dd>
            <dt>{{ trans('produits.accepted') }}</dt>
            <dd>{{ $produit->accepted }}</dd>
            <dt>{{ trans('produits.furnished') }}</dt>
            <dd>{{ $produit->furnished }}</dd>

        </dl>

    </div>
</div>

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
  <div id="carousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
@foreach($images as $key => $image)
@if($key == 0)
      <div class="item active"> <center><img style="width:auto;height:400px;" src="{{ url('/ejar/public/images/' . $image->photo) }}"></center> </div>
@else
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


     
     
          <div  style="position: relative; left: 0; top: 0;   " data-target="#carousel" data-slide-to="{{$key}}" class="thumb"><img src="{{ url('/ejar/public/thumbs/' . $image->photo) }}" >
          
          <button style="position:absolute;bottom:0px;right:0px;" class="deleteimage" value="{{$image->id}}" ><i class="fa fa-trash"></i></button>
          </div>
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
        <img id="blah" src="http://luxesocietyasia.com/wp-content/uploads/2018/06/La-Barbershop.jpg" alt=" " style="height:260px;width:260px;border-radius: 50%;border-style: solid;border-width:2px;border-color:#3C8DBC;" /><br><br>
    <input hidden type="text" name="idxx" value="{{$produit->id}}" >
    <input type="hidden" name="produit" value="{{$produit->id}}">
<input type='file' name="fileimage" id="fileimage" class="form-control" onchange="readURL(this);" required  /><br>

<br><br>
 <input class="btn btn-primary" type="submit" value=" Add image to Produit" class="btn btn-primary btn-block">
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