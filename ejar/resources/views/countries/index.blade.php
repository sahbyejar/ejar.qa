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

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">{{ trans('countries.Countries') }}</h4>
            </div>
             <div class="btn-group btn-group-sm pull-left" role="group">
               
                
            </div>

           

        </div>
        
        @if(count($countriesObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Countries Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table id="dataTables-example" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                           
                      

                            <th>{{ trans('countries.Name') }}</th>
                            <th>{{ trans('countries.name_ar') }}</th>
                          
                            <th>{{ trans('countries.Phonecode') }}</th>
                            <th>{{ trans('countries.admin') }}</th>
                             <th>{{ trans('settings.produit_user') }}</th>
                            <th>{{ trans('countries.stat') }}</th>
                            
                           
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($countriesObjects as $countries)
                        <tr>
                           
                            <td>{{ $countries->name }}</td>
                             <td>{{ $countries->name_ar }}</td>

                           
                            <td>{{ $countries->phonecode }}</td>
                            <td> @if($countries->user_id == null)
                          <button type="button" class="btn btn-info" style="border: 0;border-radius: 0.25em;background: initial;background-color: #5cb85c;color: #fff;font-size: 1em;" title="" onclick="add({{$countries->id}})" >
                                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                        </button>
                                 @else
                                 <button type="button" style="border: 0;border-radius: 0.25em;background: initial;background-color: #7066e0;color: #fff;font-size: 1em;" class="btn btn-info" title="" onclick="edit({{$countries->user}})">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </button>
                                 @endif
                              </td>

                              <td>{{ $countries->produit_user }}
                              <button type="button" class="btn btn-info" style="border: 0;border-radius: 0.25em;background: initial;background-color: #7066e0;color: #fff;font-size: 1em;" title="" onclick="edituser({{$countries}})">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </button>  </td>
                            <td>

 <label class="switch">

                           @if($countries->stat == 1)
        <input type="checkbox" id="stat" name="stat" onclick="fun({{$countries->id}})"  checked >
     <div class="slider round"><!--ADDED HTML -->
           <span class="on">{{trans('countries.active') }}</span>
          <span class="off">{{trans('countries.inactive') }}</span>
        @else
         <input type="checkbox" id="stat" name="stat"   onclick="fun({{$countries->id}})">
     <div class="slider round"><!--ADDED HTML -->
        <span class="off">{{trans('countries.inactive') }}</span>
         <span class="on">{{trans('countries.active') }}</span>
        @endif
        </div></label>
                        </td>    

                        
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">

             {!! $countriesObjects->links('layouts.pagination') !!}
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
        <h4 class="modal-title">{{ trans('countries.admin') }}</h4>
      </div>
      <div class="modal-body form-horizontal">
        

 <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}" id="divemail1" >
    <label for="date" class="col-md-2 control-label">{{ trans('user.email') }}</label>
    <div class="col-md-10">
        <input type="email" name="email" id="email" class="form-control" required>
          
    </div>
</div>




 <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}" id="divpassword">
    <label for="date" class="col-md-2 control-label">{{ trans('user.password') }}</label>
    <div class="col-md-10">
        <input type="password" name="password" id="password" class="form-control" required>
          
    </div>
</div>

<input type="hidden" name="countriesid" id="countriesid" >

      </div>
      <br>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="closeb" onclick="closemodal()">Close</button>
         <button type="button" class="btn btn-success"  id="Save" onclick="save()">{{ trans('user.save') }}</button>
      </div>
    </div>

  </div>
</div>



        <!-- Modal -->
<div id="myModal1" class="modal " role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="display: block;">
        <button type="button" class="close" onclick="closemodal()">&times;</button>
        <h4 class="modal-title">{{ trans('countries.admin') }}</h4>
      </div>
      <div class="modal-body form-horizontal">
        

 <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}" id="divemail" >
    <label for="date" class="col-md-2 control-label">{{ trans('user.email') }}</label>
    <div class="col-md-10">
        <input type="email" name="email1" id="email1" class="form-control" required>
          
    </div>
</div>




 <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}" id="divpassword">
    <label for="date" class="col-md-2 control-label">{{ trans('user.password') }}</label>
    <div class="col-md-10">
        <input type="password" name="password1" id="password1" class="form-control" required>
          
    </div>
</div>

<input type="hidden" name="userid" id="userid" >

      </div>
      <br>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="closeb" onclick="closemodal()">Close</button>
         <button type="button" class="btn btn-success"  id="Save" onclick="editadmin()">{{ trans('user.save') }}</button>
      </div>
    </div>

  </div>
</div>





        <!-- Modal -->
<div id="myModal2" class="modal " role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="display: block;">
        <button type="button" class="close" onclick="closemodal()">&times;</button>
        <h4 class="modal-title">{{ trans('settings.produit_user') }}</h4>
      </div>
      <div class="modal-body form-horizontal">
        

 <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}" id="divemail" >
    <label for="date" class="col-md-2 control-label">{{ trans('settings.produit_user') }}</label>
    <div class="col-md-10">
        <input type="number" name="produit_user" min="1" id="produit_user" class="form-control" required>
          
    </div>
</div>





<input type="hidden" name="countrieid" id="countrieid" >

      </div>
      <br>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="closeb" onclick="closemodal()">Close</button>
         <button type="button" class="btn btn-success"  id="Save" onclick="saveedituser()">{{ trans('user.save') }}</button>
      </div>
    </div>

  </div>
</div>
@endsection
@section('js')

 <script type="text/javascript">
    $(document).ready(function() {



 


 });
function fun(id){
  $.get("{{ url('countries/countriesup')}}", 
        { id: id,
         
         }, 
        function(data) {
          
           if(data == "success"){
               window.setTimeout(function(){location.reload()},2000);
           }
        });

}


function add(id){

$('#myModal').show();

$('#countriesid').val(id)
}


function edit(user){

$('#myModal1').show();

$('#userid').val(user['id']);
$('#email1').val(user['email']);
$('#password1').val(user['password']);

}



function edituser(countrie){

$('#myModal2').show();

$('#countrieid').val(countrie['id']);
$('#produit_user').val(countrie['produit_user']);


}



function closemodal(){
    
  $('#myModal').hide();
   $('#myModal1').hide();
     $('#myModal2').hide();

  
 
}

function save(){
    $('#myModal').hide();



       $.get("{{ route('storeadmin')}}", 
        {
          
   
           email:$('#email').val(),
           password:$('#password').val(),
           id:$('#countriesid').val(),

         }, 
        function(data) {
           console.log(data);
           if(data == "success"){
            Swal.fire(
  'أحسنت!',

  'نجاح'
)
               window.setTimeout(function(){location.reload()},2000);

           }else{
              console.log(data);
 Swal.fire({
  icon: 'error',
  title: 'عفوا ...',
  text: 'هناك خطأ ما!',
})
           }
        });

}



function editadmin(){
    $('#myModal1').hide();



       $.get("{{ route('editadmin')}}", 
        {
          
   
           email:$('#email1').val(),
           password:$('#password1').val(),
           id:$('#userid').val(),

         }, 
        function(data) {
           console.log(data);
           if(data == "success"){
            Swal.fire(
  'أحسنت!',

  'نجاح'
)
               window.setTimeout(function(){location.reload()},2000);

           }else{
              console.log(data);
 Swal.fire({
  icon: 'error',
  title: 'عفوا ...',
  text: 'هناك خطأ ما!',
})
           }
        });

}


function saveedituser(){
    $('#myModal2').hide();



       $.get("{{ route('saveedituser')}}", 
        {
          
   
           id:$('#countrieid').val(),
           produit_user:$('#produit_user').val(),
         

         }, 
        function(data) {
           console.log(data);
           if(data == "success"){
            Swal.fire(
  'أحسنت!',

  'نجاح'
)
               window.setTimeout(function(){location.reload()},2000);

           }else{
              console.log(data);
 Swal.fire({
  icon: 'error',
  title: 'عفوا ...',
  text: 'هناك خطأ ما!',
})
           }
        });

}


 </script>

    


@endsection 


