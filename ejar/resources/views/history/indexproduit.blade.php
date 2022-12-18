@extends('layouts.app')
@section('css')

<style type="text/css">
 

.ratings i {
    font-size: 16px;
    color: red
}

.strike-text {
    color: red;
    text-decoration: line-through
}

.product-image {
    width: 100%
}

.dot {
    height: 7px;
    width: 7px;
    margin-left: 6px;
    margin-right: 6px;
    margin-top: 3px;
    background-color: blue;
    border-radius: 50%;
    display: inline-block
}

.spec-1 {
    color: white;
    font-size: 15px
}

h5 {
    font-weight: 400
}

.para {
    font-size: 16px
}
.rounded {
    border-radius: .25rem!important;
}

.border {
    border: 1px solid #dee2e6!important;
}
.bg-white {
    background-color: #fff!important;
}
.mt-2, .my-2 {
    margin-top: .5rem!important;
}
</style>

<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css'>
<link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js'></script>
@endsection
@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}
           
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif



       
     <div class="row">
                <div class="col-lg-12">
                    <h1  class="page-header ">{{ trans('produits.model_plural') }}</h1>
                  <!--   <div class="col-lg-3" ><input type="text" name="find" id="find" style="border-color: teal !important;border-radius: 33px" class="form-control "> 
                      
                        </div>
               

                      <div class="col-lg-3" >  <button class=" form-control" name="cherche" onclick="cherche()"  style="border-color: teal !important;border-radius: 33px; background: teal; color: white;" id="cherche">{{ trans('general.Search') }}</button></div> -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        @if(count($produits) == 0)
            <div class="panel-body text-center">
                <h4>{{ trans('produits.none_available') }}</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table" >
         <div class="container mt-5 mb-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-10" id="produits">

                @foreach($produits as $produit)
                @if($produit->action == 'add')
            <div class="row p-2 bg-white border rounded mt-2" style="background: teal!important;">
                @elseif($produit->action == 'delete')
            <div class="row p-2 bg-white border rounded mt-2" style="background: darkred!important;">
                @endif
                <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" src="{{ asset('/ejar/public/images/' . $produit->photo) }}"></div>
                <div class="col-md-4 mt-1">
                    <h5 style="color: white;">{{ $produit->name_ar }} / {{ $produit->name }}</h5>
                    <div class="d-flex flex-row">
                   
                            <span style="color: white;">{{ optional($produit->category)->name }}</span>
                    </div>
                   
                    <div class="mt-1 mb-1 spec-1">
                        <span style="color: white;">{{ optional($produit->user)->name }}</span>
                      
                </div>
                    <p class="text-justify text-truncate para mb-0" style="color: white;">{{ $produit->discription_ar }}<br><br></p>
                     <p class="mr-1"> <a href="https://www.facebook.com/sharer.php?u=ejar.qa/listing/{{$produit->id}}"style="color: white;" >{{ trans('general.lient')}} </a></p>
                </div>



                       
                
                <div class="col-md-2 mt-1">
                    <div class="d-flex flex-row align-items-center">
                        <h4 class="mr-1" style="color: white;"> {{ trans('general.vu')}}</h4>
                    </div>

                     <div class="mt-1 mb-1 spec-1" style="color: white;">
                        {{ trans('general.vuWeb')}} : {{$produit->vuweb}}
                    </div>

                     <div class="mt-1 mb-1 spec-1">
                        {{ trans('general.vufacebook')}} : {{$produit->vufb}}
                    </div>

                     <div class="mt-1 mb-1 spec-1">
                    {{ trans('general.vuinstagrame')}} : {{$produit->vuinsta}}
                    </div>


                     <div class="mt-1 mb-1 spec-1">
                        {{ trans('general.vupost')}} : {{$produit->vupost}}
                    </div>

                    <div class="mt-1 mb-1 spec-1">
                        {{ trans('general.vuwhatsapp')}} : {{$produit->clique_whatsapp}}
                    </div>

                </div>





                
            </div>




             @endforeach




      
        </div>
    </div>
</div>

  <div  class="panel-footer " id="produitsfooter" style="background-color: transparent;">

      
        </div>

          

            </div>
        
      
        @endif
    
    </div>



@endsection

@section('js')



    


@endsection 