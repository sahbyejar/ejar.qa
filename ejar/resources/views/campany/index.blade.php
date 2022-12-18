@extends('layouts.app')
@section('css')
<style type="text/css">
    .table-bordered>tbody>tr>td, .table-bordered {

        border: 0px solid transparent!important;
    }
    .table-striped>tbody>tr:nth-of-type(odd) {
    background-color: transparent;
}
</style>

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

            <div class="pull-right">
                <h4 class="mt-5 mb-5">{{ trans('user.campany') }}</h4>
            </div>

            <div class="btn-group btn-group-sm pull-left" role="group">
                <button onclick="add()" class="btn btn-success" title="Create New User">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </button>
            </div>

        </div>
        
        @if(count($users) == 0)
            <div class="panel-body text-center">
                <h4>No Users Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table id="dataTables-example" class="table table-striped table-bordered table-hover">
                    <thead style="    visibility: hidden;">
                        <tr>
                             <th>{{ trans('categories.photo') }}</th>
                            <th>{{ trans('user.name') }}</th>
                           
                            <th></th>
                            <th>{{ trans('user.email') }}</th>
                         
                            <th>{{ trans('user.phone') }}</th>
                          
                         <th></th>

                            <th>{{ trans('general.action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                    @if($user->day >= 15 )
                     <tr style="    background: teal;">
                    @elseif($user->day < 15 && $user->day > 0)
                    <tr style="    background: #e38d13;">
                    @else
                    <tr style="    background: #b92c28;">
                    @endif
                              <td><img style="    width: 100px!important; height: 100px!important;border-radius: 50%;" src="{{ asset('/ejar/public/images/' . $user->photo) }}"></td>

                            <td  style="color: #ffffff;" >{{ $user->name }}<br>
                            {{ $user->user_name }}</td>
                           
                            <td>
                                 <a href="https://www.facebook.com/sharer.php?u=ejar.qa/vendor/{{$user->id}}" style="color: #ffffff;">{{ trans('general.lient')}} </a>
                            </td>
                            <td  style="color: #ffffff;">
                                @if($user->type == 'admin')
                                {{ $user->Produit()->count()}} {{ trans('general.produite')}} 
                                @elseif($user->type == 'campany6')
                                {{ $user->Produit()->count()}} {{ trans('general.produite')}}
                                @elseif($user->type == 'campany1')
                                {{ $user->Produit()->count()}} {{ trans('general.produite')}}/10
                                @elseif($user->type == 'campany2')
                                {{ $user->Produit()->count()}} {{ trans('general.produite')}}/15 
                                @elseif($user->type == 'campany3')
                                {{ $user->Produit()->count()}} {{ trans('general.produite')}}/25 
                                @elseif($user->type == 'campany4')
                                {{ $user->Produit()->count()}} {{ trans('general.produite')}}/40 
                                @elseif($user->type == 'campany5')
                                {{ $user->Produit()->count()}} {{ trans('general.produite')}}/60 
                                @elseif($user->type == 'campany7')
                                {{ $user->Produit()->count()}} {{ trans('general.produite')}}/100 
                                @elseif($user->type == 'campany8')
                                {{ $user->Produit()->count()}} {{ trans('general.produite')}}/200 
                                @elseif($user->type == 'campany9')
                                {{ $user->Produit()->count()}} {{ trans('general.produite')}}/300 
                                @endif
                            </td>
                            <td  style="color: #ffffff;">{{ $user->email }}</td>
                            <td style="text-align: end;direction: ltr;color: #ffffff;">{{ $user->phone_code }}{{ $user->phone }}</td>
                          
                        
                            <td>

                                <form method="POST" action="{!! route('destroycampany', $user->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('showcampany', $user->id ) }}" class="btn btn-info" title="Show User">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                         <a href="{{ url('vipcampany', $user->id ) }}" class="btn btn-success" title="{{ trans('vips.vip') }}">
                                           {{ trans('vips.vip') }}
                                        </a>
                                        <a href="{{ route('editcampany', $user->id ) }}" class="btn btn-primary" title="Edit User">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>
                                         <a onclick="edite({{$user}})" class="btn btn-success" title="Create New User">
                    <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                </a>
                                        @if($user->DELETED != "Yes")
                                        <button type="submit" class="btn btn-danger" title="Delete User" onclick="return confirm(&quot;Click Ok to delete User.&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                        @endif
                                    </div>

                                </form>
                                
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $users->render() !!}
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
        <h4 class="modal-title">{{ trans('user.campanyType') }}</h4>
      </div>
      <div class="modal-body form-horizontal">
        
 

        <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
    <label for="date" class="col-md-2 control-label">{{ trans('user.campany_choix') }}</label>
    <div class="col-md-10">
        <select id="type" class="form-control">
            <option value="campany1">{{ trans('user.campany1') }}</option>
            <option value="campany2">{{ trans('user.campany2') }}</option>
            <option value="campany3">{{ trans('user.campany3') }}</option>
            <option value="campany4">{{ trans('user.campany4') }}</option>
            <option value="campany5">{{ trans('user.campany5') }}</option>

            <option value="campany7">{{ trans('user.campany7') }}</option>
            <option value="campany8">{{ trans('user.campany8') }}</option>
            <option value="campany9">{{ trans('user.campany9') }}</option>

            <option value="campany6">{{ trans('user.campany6') }}</option>

        </select>
    </div>
</div>



 <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
    <label for="date" class="col-md-2 control-label">{{ trans('user.campany_date') }}</label>
    <div class="col-md-10">
        <input type="date" name="expert" id="expert" class="form-control">
          
    </div>
</div>


<div class="form-group {{ $errors->has('cautionnement') ? 'has-error' : '' }}">
    <label for="cautionnement" class="col-md-2 control-label">{{ trans('user.auto') }}</label>
    <div class="col-md-10">


 <label class="switch">
  <input  type="checkbox" id="auto" name="auto" >
    <div class="slider round"><!--ADDED HTML -->
        <span class="on">{{trans('produits.Yes') }}</span>
        <span class="off">{{trans('produits.NO') }}</span><!--END-->
      </div></label>


        {!! $errors->first('cautionnement', '<p class="help-block">:message</p>') !!}
    </div>
</div>




 <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}" id="divemail" >
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
<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
    <label for="phone" class="col-md-2 control-label">{{ trans('produits.phone') }}</label>
    <div class="col-md-10">
        <input class="form-control col-md-6" name="phone" type="tel" style="direction: ltr; text-align: end;" id="phone"  minlength="1" maxlength="8" placeholder="12 -345-678">
            
            <select class="form-control col-md-2" name="phone_code" id="phone_code" style="    margin-right: 15px;">

                @foreach($countries as $key => $value)
                <option value="+{{$value->phonecode}}" {{ old('phonecode')}}>{{$value->phonecode}}+</option>
                @endforeach
            </select>
        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
    </div>
</div>


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
        <h4 class="modal-title">{{ trans('user.campany_date') }}</h4>
      </div>
      <div class="modal-body form-horizontal">
        
 

        <input type="hidden" name="idc" id="idc">

 <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
    <label for="date" class="col-md-2 control-label">{{ trans('user.campany_date') }}</label>
    <div class="col-md-10">
        <input type="date" name="expert" id="expert1" class="form-control">
          
    </div>
</div>



      </div>
      <br>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="closeb" onclick="closemodal()">Close</button>
         <button type="button" class="btn btn-success"  id="Save" onclick="save1()">{{ trans('user.save') }}</button>
      </div>
    </div>

  </div>
</div>
@endsection

@section('js')

 <script type="text/javascript">

  var value = 1;
    var checkbox1 = document.getElementById("auto")
  checkbox1.checked = value
  document.getElementById("auto").addEventListener("change", function(element){
    console.log(checkbox1.checked)
    if(checkbox1.checked == false){
      $('#auto').val('off');
      document.getElementById('divemail').style.visibility = 'hidden';
      document.getElementById('divpassword').style.visibility = 'hidden';
      document.getElementById("email").required = false;
      document.getElementById("password").required = false;
    }else if(checkbox1.checked == true){
       $('#auto').val('on');
 document.getElementById('divemail').style.visibility = 'visible';
      document.getElementById('divpassword').style.visibility = 'visible';

      document.getElementById("email").required = true;
      document.getElementById("password").required = true;

    }
  }); 

function add(){

$('#myModal').show();

}

function edite(user){

$('#expert1').val(user.expert);
$('#idc').val(user.id);
$('#myModal1').show();


}
function closemodal(){
    
  $('#myModal').hide();
   $('#myModal1').hide();
  
 
}


function save(){
    $('#myModal').hide();


console.log($('#auto').val());
if($('#auto').val()=="on"&& $('#email').val()=="" ){
$('#auto').val("off");
}

       $.get("{{ route('campanystore')}}", 
        {
          
           type:$('#type').val(),
           expert:$('#expert').val(),


           auto:$('#auto').val(),
           email:$('#email').val(),
           password:$('#password').val(),
           phone_code:$('#phone_code').val(),
           phone:$('#phone').val(),
          
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


function save1(){
    $('#myModal1').hide();


       $.get("{{ route('campanyeditdate')}}", 
        {
          
           id:$('#idc').val(),
           expert:$('#expert1').val(),
         }, 
        function(data) {
           console.log(data);
           if(data == "success"){
               window.setTimeout(function(){location.reload()},2000);
           }
        });

}

 </script>

    


@endsection 