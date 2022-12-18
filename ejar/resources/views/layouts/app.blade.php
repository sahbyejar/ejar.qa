<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ejar</title>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/rtl/bootstrap.min.css ') }}" rel="stylesheet">
    
    <!-- not use this in ltr -->
    <link href="{{asset('css/rtl/bootstrap.rtl.css ') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{asset('css/plugins/metisMenu/metisMenu.min.css ') }}" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="{{asset('css/plugins/timeline.css ') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('css/rtl/sb-admin-2.css ') }}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{asset('css/plugins/morris.css ') }}" rel="stylesheet">

   <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-notifications.min.css ') }}">
    <!-- Custom Fonts -->
    <link href="{{asset('css/font-awesome/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<link rel="icon" href="{{asset('images/LOGO.png')}}" sizes="32x32" />
<meta name="msapplication-TileImage" content="{{asset('images/LOGO.png')}}" />
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<style type="text/css">
    import * as PusherPushNotifications from "@pusher/push-notifications-web";

    .pull-right {
  
}
.panel-heading{
    box-shadow: 5px 5px 10px 0 rgb(0 0 0 / 75%);
    border-width: 20px 0px 0px 0px!important;
    border-radius: 10px 10px 0px 0px!important;
    background: teal!important;
    color: white!important;
}
.btn-primary{
       border-radius: 30px!important;
}
.form-control{
        border-radius: 30px!important;
}
.panel-body{
        box-shadow: 5px 5px 10px 0 rgb(0 0 0 / 75%);
    border-width: 20px 0px 0px 0px!important;
    border-radius: 10px!important;
}
.show {
    display: inline-block!important;
}
.pull-left {
  
}
.dropdown-container {
    
    left: -270px!important;
}

.my-active span{
      background-color: teal !important;
      color: white !important;
      border-color: teal !important;
    }

   .nav>li>a:hover {
    -webkit-border-top-left-radius: 20px 20px;
    -webkit-border-bottom-left-radius: 20px 20px;
    -webkit-border-top-right-radius: 20px 20px;
    -webkit-border-bottom-right-radius: 20px 20px;
    margin-right: 10px;
    }
    .sidebar ul li a.active {
    background-color: #48C9B0;
    -webkit-border-top-left-radius: 20px 20px;
    -webkit-border-bottom-left-radius: 20px 20px;
        -webkit-border-top-right-radius: 20px 20px;
    -webkit-border-bottom-right-radius: 20px 20px;
    margin-right: 10px;
}
</style>
 @yield('css')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
   <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               <img src="{{asset('images/LOGO.png')}}" style="width: 65px;
    height: 52px;">
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links ">
               
               
  
                <!-- /.dropdown -->
                <li class="dropdown" style="float: left;">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-language fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                      
                        <li><a href="{{ route('locale.setting', 'en') }}">English</a></li>
                                        <li><a href="{{ route('locale.setting', 'ar') }}">عربي</a></li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>




               






                 <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user" style="    left: -95px;">
                       <li>   <a class="dropdown-item" href="{{ url('profile') }}"
                                   >
                                      <i class="icon-key"></i>  {{ trans('general.profile') }}
                                    </a>
            
                        <li>   <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                      <i class="icon-key"></i>  {{ trans('general.Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>





               <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw">    </i> 
                        <span class="badge" id="badge" style="    position: absolute;top: 0px;right: 0px;padding: 5px 10px;padding-top: 5px;padding-right: 10px;padding-bottom: 5px;padding-left: 10px;border-radius: 50%;background: red;color: white;">0</span>
                        <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user" id="notifications" style="left: -205px;min-width: 363px;position: absolute;top: 100%;/* left: 0; */z-index: 1000;/* display: none; */float: left;/* min-width: 160px; */padding: 5px 0;margin: 2px 0 0;font-size: 14px;/* text-align: left; */list-style: none;background-color: #fff;-webkit-background-clip: padding-box;background-clip: padding-box;border: 1px solid #ccc;border: 1px solid rgba(0, 0, 0, .15);border-radius: 4px;-webkit-box-shadow: 0 6px 12px rgb(0 0 0 / 18%);box-shadow: 0 6px 12px rgb(0 0 0 / 18%);">
                      
                      <li style="    font-size: 13px;font-weight: bold;min-width: 270px;border-bottom: 1px solid #eee;text-align: center;padding: 4px 0 6px 0;">
  {{ trans('general.notifications')}}</li>
            @foreach($notifications  as $notification)
                        <li style="    border-bottom: 1px solid #eee;padding: 7px 11px;
    text-decoration: none;
    -moz-transition: 0.5s;
    -o-transition: 0.5s;
    -webkit-transition: 0.5s;
    transition: 0.5s;">
   @if($notification->vu =='1')
    <div style="width: 36px;
    height: 36px;
    -webkit-border-radius: 67%!important;
    -moz-border-radius: 50%;
    -ms-border-radius: 50%;
    border-radius: 50%;
    color: #fff;
    text-align: center;
    display: inline-block;
    background-color: #00BCD4 !important;">
      <i class="material-icons" style="font-size: 18px;
    line-height: 36px;">assignment_turned_in</i>
    </div>
    @elseif($notification->vu =='2')
 <div style="width: 36px;
    height: 36px;
    -webkit-border-radius: 67%!important;
    -moz-border-radius: 50%;
    -ms-border-radius: 50%;
    border-radius: 50%;
    color: #fff;
    text-align: center;
    display: inline-block;
    background-color: #8BC34A !important;">
      <i class="material-icons" style="font-size: 18px;
    line-height: 36px;">add_shopping_cart</i>
    </div>
    @elseif($notification->vu =='3')
 <div style="width: 36px;
    height: 36px;
    -webkit-border-radius: 67%!important;
    -moz-border-radius: 50%;
    -ms-border-radius: 50%;
    border-radius: 50%;
    color: #fff;
    text-align: center;
    display: inline-block;
    background-color: #e30808 !important;">
      <i class="material-icons" style="font-size: 18px;
    line-height: 36px;">account_circle</i>
    </div>

    @endif

    <div style="display: inline-block;
    position: relative;
    /* top: 3px; */
    left: -3px;">
      <p>{{ json_decode($notification->data)->message}}  </p>
    </div>

     
                      

                        </li>
            @endforeach
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <li style="color: #ffffff;"> 
                 @if(Auth::user()->type == 'admin')
                                {{ Auth::user()->Produit()->count()}} {{ trans('general.produite')}} 
                                @elseif(Auth::user()->type == 'superadmin')
                                 {{ Auth::user()->Produit()->count()}} {{ trans('general.produite')}} 
                               
                                 @elseif(Auth::user()->type == 'campany1')
                                {{ Auth::user()->Produit()->count()}} {{ trans('general.produite')}}/10
                                @elseif(Auth::user()->type == 'campany2')
                                {{ Auth::user()->Produit()->count()}} {{ trans('general.produite')}}/15 
                                @elseif(Auth::user()->type == 'campany3')
                                {{ Auth::user()->Produit()->count()}} {{ trans('general.produite')}}/25 
                                @elseif(Auth::user()->type == 'campany4')
                                {{ Auth::user()->Produit()->count()}} {{ trans('general.produite')}}/40 
                                @elseif(Auth::user()->type == 'campany5')
                                {{ Auth::user()->Produit()->count()}} {{ trans('general.produite')}}/60 
                                @elseif(Auth::user()->type == 'campany7')
                                {{ Auth::user()->Produit()->count()}} {{ trans('general.produite')}}/100 
                                @elseif(Auth::user()->type == 'campany8')
                                {{ Auth::user()->Produit()->count()}} {{ trans('general.produite')}}/200 
                                @elseif(Auth::user()->type == 'campany9')
                                {{ Auth::user()->Produit()->count()}} {{ trans('general.produite')}}/300 
                                @elseif(Auth::user()->type == 'seller')
                                {{ Auth::user()->campanyproduitSaller()}} 
                                 @else
                                {{ Auth::user()->Produit()->count()}} {{ trans('general.produite')}}
                                @endif </li>
          
     <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu" style="margin-bottom: 20px;
    box-shadow: 5px 5px 10px 0 rgb(0 0 0 / 75%);
    border-width: 20px 0px 0px 0px!important;
    border-radius: 0px 0px 10px 10px!important;
    padding: 20px;
    min-height: 2200px;">
                       
                         @include('layouts.Sidebar')
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

    <div id="wrapper" >

       

       
 <div id="page-wrapper">
            <div class="row">
                 <div class="col-lg-12">
                    <br><br>

  @yield('content')
          <!-- /#page-wrapper -->

</div>
</div>

</div>
    </div>
    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->
    <script src="{{asset('js/jquery-1.11.0.js ') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('js/bootstrap.min.js ') }}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{asset('js/metisMenu/metisMenu.min.js ') }}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{asset('js/raphael/raphael.min.js ') }}"></script>
    <script src="{{asset('js/morris/morris.min.js ') }}"></script>




  <!-- Page level plugins -->
<script src="{{asset('vendor/chart.js/Chart.min.js') }}"></script>

  <!-- Page level custom scripts -->

    <!-- DataTables JavaScript -->
    <script src="{{asset('js/jquery/jquery.dataTables.min.js ') }}"></script>
    <script src="{{asset('js/bootstrap/dataTables.bootstrap.min.js ') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{asset('js/sb-admin-2.js ') }}"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
        $(document).ready(function() {
        //  $('#dataTables-example').dataTable();


          $('#dataTables-example').dataTable({
       /** add this */
        initComplete: function() {
            $(this.api().table().container()).find('input').parent().wrap('<form>').parent().attr('autocomplete', 'off');
        },
         /****** add this */
        "searching": true,
        // "autoFill": true,
        // "language": {
        //     "lengthMenu": "Por página: _MENU_",
        //     "zeroRecords": "Sin resultados",
        //     "info": "Mostrando página _PAGE_ de _PAGES_",
        //     "infoEmpty": "No hay registros disponibles",
        //     "infoFiltered": "(Filtrado de _MAX_ registros en total)"
 
        // }
    });
        });
    </script>




<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>


 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://js.pusher.com/beams/1.0/push-notifications-cdn.js"></script>
  <script>
     const beamsClient = new PusherPushNotifications.Client({
 instanceId: '70ef81f3-765b-41ac-8941-a9a95b90e9ee',
});


      // beamsClient.start()
      //    .then(() => beamsClient.addDeviceInterest('App.User.{{ auth()->user()->id }}')) //listen to user interest
      //    .then(() => console.log('Successfully registered and subscribed!'))
      // .catch(console.error);

</script>




 @yield('js')
</body>

</html>
