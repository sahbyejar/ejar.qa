@extends('layouts.app')
@section('css')
<style type="text/css">
    th { white-space: nowrap; }
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
                <h4 class="mt-5 mb-5">{{ trans('order_rents.model_plural') }}</h4>
            </div>

            <div class="btn-group btn-group-sm pull-left" role="group">
                <a href="{{ route('order_rents.order_rent.create') }}" class="btn btn-success" title="{{ trans('order_rents.create') }}">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>

        @if(count($orderRents) == 0)
            <div class="panel-body text-center">
                <h4>{{ trans('order_rents.none_available') }}</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table id="example" class="table table-striped ">
                    <thead>
                        <tr>
                            <th>{{ trans('order_rents.Produit') }}</th>
                            <th>{{ trans('order_rents.User') }}</th>
                            <th>{{ trans('order_rents.price') }}</th>
                            <th>{{ trans('order_rents.datestart') }}</th>
                            <th>{{ trans('order_rents.dateend') }}</th>
                            <th>{{ trans('order_rents.cautionnement') }}</th>
                            <th>{{ trans('order_rents.total') }}</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($orderRents as $orderRent)
                        <tr>
                            <td>{{ $orderRent->Produit }}</td>
                            <td>{{ optional($orderRent->user)->name }}</td>
                            <td>{{ $orderRent->price }}</td>
                            <td>{{ $orderRent->datestart }}</td>
                            <td>{{ $orderRent->dateend }}</td>
                            <td>{{ $orderRent->cautionnement }}</td>
                            <td>{{ $orderRent->total }}</td>

                            <td>

                                <form method="POST" action="{!! route('order_rents.order_rent.destroy', $orderRent->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('order_rents.order_rent.show', $orderRent->id ) }}" class="btn btn-info" title="{{ trans('order_rents.show') }}">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                       
                                        <button type="submit" class="btn btn-danger" title="{{ trans('order_rents.delete') }}" onclick="return confirm(&quot;{{ trans('order_rents.confirm_delete') }}&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                     <tfoot>
            <tr>
                <th colspan="4" >{{ trans('order_rents.total') }}:</th>
                <th></th>
            </tr>
        </tfoot>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $orderRents->render() !!}
        </div>

        @endif

    </div>
@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable( {
       
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return  parseInt(i) ;
            };
 
            // Total over all pages
            total = api
                .column( 6 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 6, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            // Update footer
            $( api.column( 4 ).footer() ).html(
                'QAR '+pageTotal +' ( {{ trans("order_rents.total") }} QAR '+ total +')'
            );
        }
    } );
} );


</script>
@endsection
