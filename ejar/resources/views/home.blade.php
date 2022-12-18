@extends('layouts.app')

@section('css')
<style type="text/css">
.panel-info>.panel-heading{
    color: #31708f!important;
    background-color: #d9edf7!important;
    border-color: #bce8f1;!important
}
.panel-green>.panel-heading {
    border-color: #5cb85c!important;
    color: #fff!important;
    background-color: #5cb85c!important;
}
.panel-yellow>.panel-heading {
    border-color: #f0ad4e!important;
    color: #fff!important;
    background-color: #f0ad4e!important;
}

.panel-yellow {
    border-color: transparent!important;
}
 .panel-info{
    border-color: transparent!important;
}
.panel-green{
    border-color: transparent!important;
}

.panel-footer {
        border-radius: 0px 0px 10px 10px!important;
    box-shadow: 5px 5px 10px 0 rgb(0 0 0 / 75%)!important;
}

</style>
@stop
@section('content')
      
     
    
              <div class="row">
@if(Auth::user()->type == 'superadmin')
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading" style="">
                            <div class="row">
                                <div class="col-xs-4">
                                    <i class="fa fa-building fa-5x"></i>
                                </div>
                                <div class="col-xs-8 text-right">
                                    <div class="huge">{{$company ?? ''}} </div>
                                    <div>{{ trans('general.campany')}}</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('campany')}}">
                            <div class="panel-footer">
                                <span class="pull-left">{{ trans('general.View_Details')}}</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
      
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-4">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-8 text-right">
                                    <div class="huge">{{$user}}</div>
                                    <div>{{ trans('user.user')}}</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('users')}}">
                            <div class="panel-footer">
                                <span class="pull-left">{{ trans('general.View_Details')}}</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                @endif 
           </div>
           <div class="row">
                    <div class="col-lg-3 col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-4">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-8 text-right">
                                    <div class="huge">{{$produits}}</div>
                                    <div>{{ trans('general.all')}}</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('produits')}}">
                            <div class="panel-footer">
                                <span class="pull-left">{{ trans('general.View_Details')}}</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
      
                 <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-4">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-8 text-right">
                                    <div class="huge">{{$active}}</div>
                                    <div>{{ trans('general.Produit')}} {{ trans('general.active')}}</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('produits')}}">
                            <div class="panel-footer">
                                <span class="pull-left">{{ trans('general.Produit')}} {{ trans('general.View_Details')}}</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
      
                 <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-4">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-8 text-right">
                                    <div class="huge">{{$enatant}}</div>
                                    <div>{{ trans('general.notconfermid')}}</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('notconfermid')}}">
                            <div class="panel-footer">
                                <span class="pull-left">{{ trans('general.View_Details')}}</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
           </div>

             

            <div class="row">

                  <div class="col-lg-3 col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-4">
                                    <i class="fa fa-eye fa-5x"></i>
                                </div>
                                <div class="col-xs-8 text-right">
                                    <div class="huge">{{$vupost}}</div>
                                    <div>{{ trans('general.vupost')}}</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('produits')}}">
                            <div class="panel-footer">
                                <span class="pull-left">{{ trans('general.View_Details')}}</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>



                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-4">
                                    <i class="fa fa-eye fa-5x"></i>
                                </div>
                                <div class="col-xs-8 text-right">
                                    <div class="huge">{{$vuinsta}}</div>
                                    <div>{{ trans('general.vuinstagrame')}}</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('produits')}}">
                            <div class="panel-footer">
                                <span class="pull-left">{{ trans('general.View_Details')}}</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>




                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-4">
                                    <i class="fa fa-eye fa-5x"></i>
                                </div>
                                <div class="col-xs-8 text-right">
                                    <div class="huge">{{$vufb}}</div>
                                    <div>{{ trans('general.vufacebook')}}</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('produits')}}">
                            <div class="panel-footer">
                                <span class="pull-left">{{ trans('general.View_Details')}}</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                 <div class="col-lg-3 col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-4">
                                    <i class="fa fa-eye fa-5x"></i>
                                </div>
                                <div class="col-xs-8 text-right">
                                    <div class="huge">{{$vuweb}}</div>
                                    <div>{{ trans('general.vuWeb')}}</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('produits')}}">
                            <div class="panel-footer">
                                <span class="pull-left">{{ trans('general.View_Details')}}</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
               
      </div>
  

    <div id="container" ></div> 
    <div id="containermonth" ></div> 

         
   
 
@endsection


@section('js')


<script src="https://code.highcharts.com/highcharts.js"></script>

<script type="text/javascript">
    
     var dateweb = <?php echo json_encode($dateweb)?>;
     var datefb = <?php echo json_encode($datefb)?>;
     var dateinstainstagrame = <?php echo json_encode($dateinstainstagrame)?>;
     var datepost = <?php echo json_encode($datepost)?>;
     var datewhatsapp = <?php echo json_encode($datewhatsapp)?>;

    Highcharts.chart('container', {
      
chart: {
    
    renderTo: 'container',
    type: 'column'
},

    title: {
        text: '{{ trans('general.vu')}}'
    },
    
    xAxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: '{{ trans('general.vu')}}'
        }
    },
    
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
          name: '{{ trans('general.vuWeb')}}',
        data: dateweb,

    }, {
        name: '{{ trans('general.vufacebook')}}',
        data: datefb,

    },{
        name: '{{ trans('general.vuinstagrame')}}',
        data: dateinstainstagrame,

    }, {
        name: '{{ trans('general.vupost')}}',
        data: datepost,

    }, {
        name: '{{ trans('general.vuwhatsapp')}}',
        data: datewhatsapp,
    }]
    });

</script>



<script type="text/javascript">
    
     var monthweb = <?php echo json_encode($monthweb)?>;
     var monthfb = <?php echo json_encode($monthfb)?>;
     var monthinstainstagrame = <?php echo json_encode($monthinstainstagrame)?>;
     var monthpost = <?php echo json_encode($monthpost)?>;
     var monthwhatsapp = <?php echo json_encode($monthwhatsapp)?>;

    Highcharts.chart('containermonth', {
      


    title: {
        text: '{{ trans('general.vujour')}}'
    },
    
    xAxis: {
        categories: [
            '1',
            '2',
            '3',
            '4',
            '5',
            '6',
            '7',
            '8',
            '9',
            '10',
            '11',
            '12',
            '13',
            '14',
            '15',
            '16',
            '17',
            '18',
            '19',
            '20',
            '21',
            '22',
            '23',
            '24',
            '25',
            '26',
            '27',
            '28',
            '29',
            '30',
            '31'
            
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: '{{ trans('general.vu')}}'
        }
    },
    
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
          name: '{{ trans('general.vuWeb')}}',
        data: monthweb,

    }, {
        name: '{{ trans('general.vufacebook')}}',
        data: monthfb,

    },{
        name: '{{ trans('general.vuinstagrame')}}',
        data: monthinstainstagrame,

    }, {
        name: '{{ trans('general.vupost')}}',
        data: monthpost,

    }, {
        name: '{{ trans('general.vuwhatsapp')}}',
        data: monthwhatsapp,
    }]
    });

</script>

@endsection
