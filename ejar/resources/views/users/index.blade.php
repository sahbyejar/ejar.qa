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
                <h4 class="mt-5 mb-5"> {{ trans('general.users') }}</h4>
            </div>

            <div class="btn-group btn-group-sm pull-left" role="group">
                <a href="{{ route('users.user.create') }}" class="btn btn-success" title="Create New User">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
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
                    <thead style="visibility: hidden;">
                        <tr>
                           <th>{{ trans('categories.photo') }}</th>
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
                            <td><img style="    width: 100px!important; height: 100px!important;border-radius: 50%;" src="{{ asset('/ejar/public/images/' . $user->photo) }}"></td>
                            <td>{{ $user->name }}</td>
                             
                            <td>{{ $user->user_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td style="text-align: end;
    direction: ltr;"> {{ $user->phone }}</td>
                          
                        
                            <td>

                                <form method="POST" action="{!! route('users.user.destroy', $user->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('users.user.show', $user->id ) }}" class="btn btn-info" title="Show User">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                          <a href="{{ url('vipcampany', $user->id ) }}" class="btn btn-success" title="{{ trans('vips.vip') }}">
                                           {{ trans('vips.vip') }}
                                        </a>
                                        <a href="{{ route('users.user.edit', $user->id ) }}" class="btn btn-primary" title="Edit User">
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
@endsection

