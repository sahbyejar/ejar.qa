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
    color: #938787;
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
                    <div class="col-lg-3" ><input type="text" name="find" id="find" style="border-color: teal !important;border-radius: 33px" class="form-control "> 
                      
                        </div>
                     <div class="col-lg-6" >
                        <select class="form-control col-lg-6" id="city_id" name="city_id" style="border-color: teal !important;border-radius: 33px">
                            <option>{{ trans('produits.city_id__placeholder') }}</option>
                           @foreach ($cities as $key => $city)
                <option value="{{ $key }}">{{ $city }}</option>
            @endforeach
                        </select>
                        <select class="form-control col-lg-6" id="ville_id" name="ville_id" style="border-color: teal !important;border-radius: 33px">
                            <option>{{ trans('produits.ville_id__placeholder') }}</option>
                           
                        </select>
                      </div>

                      <div class="col-lg-3" >  <button class=" form-control" name="cherche" onclick="cherche()"  style="border-color: teal !important;border-radius: 33px; background: teal; color: white;" id="cherche">{{ trans('general.Search') }}</button></div>
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
            <div class="row p-2 bg-white border rounded mt-2">
                <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" src="{{ asset('/ejar/public/images/' . $produit->photo) }}"></div>
                <div class="col-md-6 mt-1">
                    <h5>{{ $produit->name_ar }} / {{ $produit->name }}</h5>
                    <div class="d-flex flex-row">
                        <div class="ratings mr-2">
                           
                        </div>
                            
                            <span>{{ optional($produit->category)->name }}</span>
                    </div>
                    <div class="mt-1 mb-1 spec-1">
                    </div>
                    <div class="mt-1 mb-1 spec-1">
                        <span>{{ optional($produit->user)->name }}</span>
                      
                </div>
                    <p class="text-justify text-truncate para mb-0">{{ $produit->discription_ar }}<br><br></p>
                </div>
                <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                    <div class="d-flex flex-row align-items-center">
                        <h4 class="mr-1">{{ $produit->price }}</h4>
                    </div>
                    @if($produit->rent_sale== "on")
                    <h6 class="text-success">الإيجار</h6>
                    @else
                    <h6 class="text-success">بيع</h6>
                    @endif
                    <div class="d-flex flex-column mt-4">
                        <form method="POST" action="{!! route('produits.produit.destroy', $produit->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs " role="group">
                                        <a href="{{ route('produits.produit.show', $produit->id ) }}" class="btn btn-info" title="{{ trans('produits.show') }}">
                                           {{ trans('produits.show') }}
                                        </a>
                                          <a href="{{ route('produits.produit.addphoto', $produit->id ) }}" class="btn btn-success" title="{{ trans('produits.accepted') }}">
                                           الصور
                                        </a>
                                        @if(Auth::user()->type == 'admin')
                                        @if($produit->accepted !="Yes")
                                        <a href="{{ route('produits.produit.accepted', $produit->id ) }}" class="btn btn-success" title="{{ trans('produits.accepted') }}">
                                            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                        </a>
                                        @endif

                                     
                                        <button  type="button" onclick="vip('{{ $produit->id}}' ,'2','{{$produit->vip2_datestart}}','{{$produit->vip2_dateend}}')" class="btn btn-warning" title="{{ trans('produits.accepted') }}">
                                            Vip2
                                        </button>
                                           @endif
                                        @if($produit->DELETED == "off")
                                        <button type="submit" class="btn btn-danger" title="{{ trans('produits.delete') }}" onclick="return confirm(&quot;{{ trans('produits.confirm_delete') }}&quot;)">
                                           {{ trans('produits.delete') }}
                                        </button>
                                        @endif

                                       
                                    </div>

                                </form>
                    </div>
                </div>
            </div>
             @endforeach
      
        </div>
    </div>
</div>

  <div  class="panel-footer " id="produitsfooter" style="background-color: transparent;">

        </div>

              <!--   <table id="dataTables-example" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>{{ trans('produits.category_id') }}</th>
                            <th>{{ trans('produits.user_id') }}</th>
                            <th>{{ trans('produits.name_ar') }}</th>
                            <th>{{ trans('produits.name') }}</th>
                            <th>{{ trans('produits.vip1') }}</th>
                        
                            <th>{{ trans('produits.vip1_date') }}</th>
                          
                            <th>{{ trans('produits.vip2') }}</th>
                           
                            <th>{{ trans('produits.vip2_date') }}</th>
                  
                            <th>{{ trans('produits.DELETED') }}</th>
                            <th>{{ trans('produits.accepted') }}</th>
                          

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($produits as $produit)
                        <tr>
                            <td>{{ optional($produit->category)->name }}</td>
                            <td>{{ optional($produit->user)->name }}</td>
                            <td>{{ $produit->name_ar }}</td>
                            <td>{{ $produit->name }}</td>
                            <td>{{ $produit->vip1 }}</td>
                           
                            <td>{{ $produit->vip1_date }}</td>
                           
                            <td>{{ $produit->vip2 }}</td>
                          
                            <td>{{ $produit->vip2_date }}</td>
                          
                            <td>{{ $produit->DELETED }}</td>
                            <td>{{ $produit->accepted }}</td>
                           

                            <td>

                                <form method="POST" action="{!! route('produits.produit.destroy', $produit->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('produits.produit.show', $produit->id ) }}" class="btn btn-info" title="{{ trans('produits.show') }}">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                          <a href="{{ route('produits.produit.addphoto', $produit->id ) }}" class="btn btn-success" title="{{ trans('produits.accepted') }}">
                                            <span class="glyphicon glyphicon-picture" aria-hidden="true"></span>
                                        </a>
                                        @if(Auth::user()->type == 'admin')
                                        @if($produit->accepted !="Yes")
                                        <a href="{{ route('produits.produit.accepted', $produit->id ) }}" class="btn btn-success" title="{{ trans('produits.accepted') }}">
                                            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                        </a>
                                        @endif

                                        
                                        <button id="vip1"  type="button" onclick="vip('{{$produit->id}} ','1')" class="btn btn-warning" title="{{ trans('produits.accepted') }}">
                                            Vip1
                                        </button>
                                        <button id="vip2" type="button" onclick="vip('{{ $produit->id}}' ,'2')" class="btn btn-warning" title="{{ trans('produits.accepted') }}">
                                            Vip2
                                        </button>
                                           @endif
                                        @if($produit->DELETED == "off")
                                        <button type="submit" class="btn btn-danger" title="{{ trans('produits.delete') }}" onclick="return confirm(&quot;{{ trans('produits.confirm_delete') }}&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                        @endif

                                       
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table> -->

            </div>
        </div>

      
        @endif
    
    </div>

<!-- Modal -->
<div id="myModal" class="modal " role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="display: block;">
        <button type="button" class="close" onclick="closemodal()">&times;</button>
        <h4 class="modal-title">تاريخ VIP</h4>
      </div>
      <div class="modal-body row">
        <input type="hidden" name="vip" id="vip">
        <input type="hidden" name="produit" id="produit">
 

        <div class="form-group col-md-12 {{ $errors->has('date') ? 'has-error' : '' }}">
    <label for="date" class="col-md-2 control-label">{{ trans('vips.date') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="date" type="date" id="date" value="" minlength="1" placeholder="{{ trans('vips.date__placeholder') }}">
        {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
    </div>
</div>


        <div class="form-group  col-md-12 {{ $errors->has('dateend') ? 'has-error' : '' }}">
    <label for="dateend" class="col-md-2 control-label">{{ trans('vips.dateend') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="dateend" type="date" id="dateend" value="" minlength="1" placeholder="{{ trans('vips.date__placeholder') }}">
        {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
    </div>
</div>




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" style="float: right;" id="closeb" onclick="closemodal()">{{ trans('general.Close') }}</button>

        <button type="button" class="btn btn-danger"  id="deleted" onclick="deleted()">{{ trans('general.Delete') }}</button>
         <button type="button" class="btn btn-success"  id="Save" onclick="save()">{{ trans('general.Save') }}</button>

      </div>
    </div>

  </div>
</div>
@endsection

@section('js')

 <script type="text/javascript">
    $(document).ready(function() {

        $('#city_id').change(function(){
        $.get("{{ url('villectiy')}}", 
        { option: $(this).val() }, 
        function(data) {
            $('#ville_id').empty(); 

            $.each(data, function(key, element) {
                $('#ville_id').append("<option value='" + element.id + "'>" + element.name_ar + "</option>");
            });
        });

        
    });

       });
     

function vip(id,vip,start,end){
$('#vip').val();
$('#produit').val();
$('#date').val();
$('#dateend').val();
$('#vip').val(vip);
$('#produit').val(id);
$('#date').val(start);
$('#dateend').val(end);
console.log(start);
$('#myModal').show();
if(!start || start=='undefined'){
    document.getElementById('deleted').style.visibility='hidden';
}else{
    document.getElementById('deleted').style.visibility='visible';
}

}
function closemodal(){
    
  $('#myModal').hide();
  
 
}


function save(){
    $('#myModal').hide();
var vip = $('#vip').val();
var id = $('#produit').val();
       $.get("{{ url('vip')}}", 
        { vip: vip,
           Produit_id:id,
           date:$('#date').val(),
           dateend:$('#dateend').val(),
         }, 
        function(data) {
          
           if(data == "success"){
               window.setTimeout(function(){location.reload()},2000);
           }
        });

}

function deleted(){
    $('#myModal').hide();
var vip = $('#vip').val();
var id = $('#produit').val();
       $.get("{{ url('vip/deleted')}}", 
        { vip: vip,
           Produit_id:id,
           date:$('#date').val(),
           dateend:$('#dateend').val(),
         }, 
        function(data) {
          
           if(data == "success"){
               window.setTimeout(function(){location.reload()},2000);
           }
        });

}



function cherche(){
   

       $.get("{{ url('cherche')}}", 
        { 
           city_id:$('#city_id').val(),
           ville_id:$('#ville_id').val(),
           find:$('#find').val(),
         }, 
        function(data) {
            
               $('#produits').empty(); 
               $('#produitsfooter').empty(); 
               
          
  var type = "{{ Auth::user()->type }}";       

           $.each(data, function(key, element) {
              console.log(element.category.name);  
            
           
var html = "<div class='row p-2 bg-white border rounded mt-2'><div class='col-md-3 mt-1'><img class='img-fluid img-responsive rounded product-image' src='{{ asset('/ejar/public/images/') }}/"+element.photo+"'></div><div class='col-md-6 mt-1'>    <h5>"+element.name_ar +" / "+element.name +"</h5>    <div class='d-flex flex-row'><div class='ratings mr-2'></div><span>"+element.category.name +"</span>    </div>    <div class='mt-1 mb-1 spec-1'>    </div>    <div class='mt-1 mb-1 spec-1'><span>"+element.user.name +"</span>      </div>    <p class='text-justify text-truncate para mb-0'>"+element.discription_ar +"<br><br></p></div><div class='align-items-center align-content-center col-md-3 border-left mt-1'>    <div class='d-flex flex-row align-items-center'>        <h4 class='mr-1'>"+element.price +"</h4>    </div>" ;

                let id = element.id;
                if(element.rent_sale== 'on'){
                     html = html + " <h6 class='text-success'>الإيجار</h6>"

                 
                       }else{
                       html= html + " <h6 class='text-success'>بيع</h6>";
                    }

 html = html + "<div class='d-flex flex-column mt-4'><form method='POST' action='{!! route('produits.produit.destroy', [':id']) !!}' accept-charset='UTF-8' id='form' ><input name='_method' value='DELETE' type='hidden'><div class='btn-group btn-group-xs ' role='group'><a href='{{ url('produits/show/')}}/"+element.id+"' class='btn btn-info' title='{{ trans('produits.show') }}'>{{ trans('produits.show') }}</a><a href='{{ url('produits/addphoto') }}/"+ element.id +"' class='btn btn-success' title='{{ trans('produits.accepted') }}'>الصور</a>";


if(type  == 'admin'){

        html = html + " <button  type='button' onclick=\"vip("+element.id+" ,2,'"+element.vip2_datestart+"','"+element.vip2_dateend+"')\" class='btn btn-warning' title='{{ trans('produits.accepted') }}'>Vip2</button>";

 
}


 html = html + "</div></form>    </div></div>  </div>";
                   
                     $('#produits').append(html);


                               
                            
             
           
            });
         
        });

}


 </script>

    


@endsection 