@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
  
        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">{{ !empty($title) ? $title : 'Order Rent' }}</h4>
            </div>
            <div class="btn-group btn-group-sm pull-right" role="group">

                <a href="{{ route('order_rents.order_rent.index') }}" class="btn btn-primary" title="{{ trans('order_rents.show_all') }}">
                    <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                </a>

                <a href="{{ route('order_rents.order_rent.create') }}" class="btn btn-success" title="{{ trans('order_rents.create') }}">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>

            </div>
        </div>

        <div class="panel-body">

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('order_rents.order_rent.update', $orderRent->id) }}" id="edit_order_rent_form" name="edit_order_rent_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('order_rents.form', [
                                        'orderRent' => $orderRent,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary pull-left" type="submit" value="{{ trans('order_rents.update') }}">
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection


@section('js')
<script >

$(document).ready(function() {

    $('#Produit').change(function(){

        $.get("{{ url('getproduit')}}",
        { option: $(this).val() },
        function(data) {
            $('#price').empty();
            $('#price').val(data.price);
            if(data.cautionnement =='on'){
                $('#cautionnement').empty();
                $('#cautionnement').val(data.price_cautionnement);
                if(data.price_cautionnement ==null){
                    cautionnement = parseInt('0');
            }else{
                cautionnement = parseInt(data.price_cautionnement);
            }
            }else{
                cautionnement = parseInt('0');
            }

            var date1 = new Date($('#dateend').val());
var date2 = new Date($('#datestart').val());
const diffTime = Math.abs(date1 - date2);
const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
    console.log(diffDays);
    $('#total').empty();
            price = parseInt($('#price').val());
            var total = (price * (diffDays/30)) + cautionnement;
            $('#total').val(parseInt(total));



        });


    });

    $('#cautionnement').change(function(){


        var date1 = new Date($('#dateend').val());
var date2 = new Date($('#datestart').val());
const diffTime = Math.abs(date1 - date2);
const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
    console.log(diffDays);
    $('#total').empty();
            price = parseInt($('#price').val());
            cautionnement = parseInt($('#cautionnement').val());
            var total = (price * (diffDays/30)) + cautionnement;
            $('#total').val(parseInt(total));
});


$('#price').change(function(){
    var date1 = new Date($('#dateend').val());
var date2 = new Date($('#datestart').val());
const diffTime = Math.abs(date1 - date2);
const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
    console.log(diffDays);
    $('#total').empty();
            price = parseInt($('#price').val());
            cautionnement = parseInt($('#cautionnement').val());
            var total = (price * (diffDays/30)) + cautionnement;
            $('#total').val(parseInt(total));


});

$('#dateend').change(function(){
    var date1 = new Date($('#dateend').val());
var date2 = new Date($('#datestart').val());
const diffTime = Math.abs(date1 - date2);
const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
    console.log(diffDays);
    $('#total').empty();
            price = parseInt($('#price').val());
            cautionnement = parseInt($('#cautionnement').val());
            var total = (price * (diffDays/30)) + cautionnement;
            $('#total').val(parseInt(total));


});



});
</script>


@endsection