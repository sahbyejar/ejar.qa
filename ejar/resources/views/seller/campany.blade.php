@extends('layouts.app')

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
                <h4 class="mt-5 mb-5">{{ trans('user.campany') }}</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
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
                    <thead>
                        <tr>
                            <th>{{ trans('user.name') }}</th>
                            <th>{{ trans('user.user_name') }}</th>
                            <th>{{ trans('user.email') }}</th>
                         
                            <th>{{ trans('user.phone') }}</th>
                          
                         

                            <th>{{ trans('general.action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->user_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                          
                        
                            <td>

                                <form method="POST" action="{!! route('destroycampany', $user->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('showcampany', $user->id ) }}" class="btn btn-info" title="Show User">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('editcampany', $user->id ) }}" class="btn btn-primary" title="Edit User">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete User" onclick="return confirm(&quot;Click Ok to delete User.&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
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
      <div class="modal-body">
        
 

        <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
    <label for="date" class="col-md-2 control-label">{{ trans('user.campany_choix') }}</label>
    <div class="col-md-10">
        <select id="type" class="form-control">
            <option value="campany1">{{ trans('user.campany1') }}</option>
            <option value="campany2">{{ trans('user.campany2') }}</option>
            <option value="campany3">{{ trans('user.campany3') }}</option>
        </select>
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
@endsection

@section('js')

 <script type="text/javascript">
     

function add(){

$('#myModal').show();

}
function closemodal(){
    
  $('#myModal').hide();
  
 
}


function save(){
    $('#myModal').hide();
var vip = $('#vip').val();
var id = $('#produit').val();
       $.get("{{ route('campanystore')}}", 
        {
          
           type:$('#type').val(),
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