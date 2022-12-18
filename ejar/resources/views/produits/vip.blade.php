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
                    <h1  class="page-header ">
                        @if($type == "produit")
                        {{ $produit->name }}  {{ $produit->name_ar }}
                        @elseif($type == "Company")
                        {{ $name }}
                        @endif

                    </h1>
                 

                </div>
                <!-- /.col-lg-12 -->
            </div>
       
        <div class="panel-body panel-body-with-table" >
   



       <table id="dataTables-example" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            @if($type == "Company")
                         <th>{{ trans('general.Produit') }}</th>
                        @endif
                            <th>{{ trans('vips.vip') }}</th>
                            <th>{{ trans('vips.date') }}</th>
                            <th>{{ trans('vips.dateend') }}</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($vips as $vip)
                        @if( $vip->day >= 0)
                    <tr style="    background: teal;">
                    @else
                    <tr style="    background: #b92c28;">
                    @endif
                     @if($type == "Company")
                         <td>{{ $vip->name }}</td>
                        @endif
                        @if($vip->vip == '3')
                        <td>Premium</td>
                        @else
                            <td>Vip{{ $vip->vip }}</td>
                         @endif
                            <td>{{ $vip->date }}</td>
                       
                            <td>{{ $vip->dateend }}</td>
                           
                           
                           

                          
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    
    </div>

@endsection

@section('js')

    


@endsection 