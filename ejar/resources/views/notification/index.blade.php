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

           
            <div class="btn-group btn-group-sm pull-left" role="group">
                <button onclick="add()" class="btn btn-success" title="{{ trans('cities.create') }}">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </button>
            </div>
             <div class="pull-right">
                <h4 class="mt-5 mb-5">{{ trans('general.notifications')}}</h4>
            </div>


        </div>
        
 
        <div class="panel-body ">
            <div class="table-responsive">

                <table id="dataTables-example" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>{{ trans('general.notifications') }}</th>
                            <th>{{ trans('user.name') }}</th>
                             <th>{{ trans('user.user_name') }}</th>

                        </tr>
                    </thead>
                    <tbody>
                    @foreach($notificationss as $notification)
                        <tr>
                            <td>{{ $notification->id }} </td>
                            <td>{{ json_decode($notification->data)->message}}</td>
                            @if($notification->user_id != null )
                            <td>{{ $notification->user->name }} </td>
                            <td>{{ $notification->user->user_name }} </td>
                            @else
                            <td>{{ trans('general.alluser') }}</td>
                            <td>{{ trans('general.alluser') }}</td>
                            @endif

                          
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
        
        </div>
        


        <div id="myModal" class="modal " role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="display: block;">
        <button type="button" class="close" onclick="closemodal()">&times;</button>
        <h4 class="modal-title">{{ trans('general.notifications') }}</h4>
      </div>
      <div class="modal-body row">
      
 

        <div class="form-group col-md-12 {{ $errors->has('user') ? 'has-error' : '' }}">
    <label for="user" class="col-md-2 control-label">{{ trans('user.name') }}</label>
    <div class="col-md-10">
       <select class="form-control" name="user" id="user">
        <option value="">{{ trans('general.alluser') }} </option>
         @foreach($users as $user)
         <option value="{{$user->id}}">{{$user->id}}: {{$user->name}}</option>
         @endforeach
       	
       </select>
    </div>
</div>


        <div class="form-group  col-md-12 {{ $errors->has('message') ? 'has-error' : '' }}">
    <label for="message" class="col-md-2 control-label">{{ trans('general.notifications') }}</label>
    <div class="col-md-10">
        <textarea class="form-control" name="message" type="textarea" id="message" value="" minlength="1" placeholder="{{ trans('general.notifications') }}"> </textarea>
        {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
    </div>
</div>




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" style="float: right;" id="closeb" onclick="closemodal()">{{ trans('general.Close') }}</button>

     
         <button type="button" class="btn btn-success"  id="Save" onclick="save()">{{ trans('general.Save') }}</button>

      </div>
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

		$.get("{{ url('notification/add')}}", 
        { 
         
           user:$('#user').val(),
           message:$('#message').val(),
         }, 
        function(data) {
          
           if(data == "success"){
               window.setTimeout(function(){location.reload()},2000);
           }
        });
	}
</script>

@endsection