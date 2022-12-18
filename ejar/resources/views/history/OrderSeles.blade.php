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

            <div class="pull-right">
                <h4 class="mt-5 mb-5">{{ trans('order_seles.model_plural') }}</h4>
            </div>

           

        </div>
        
        @if(count($orderSeles) == 0)
            <div class="panel-body text-center">
                <h4>{{ trans('order_seles.none_available') }}</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table id="example" class="table table-striped ">
                    <thead>
                        <tr>
                            <th>{{ trans('order_seles.Produit') }}</th>
                            <th>{{ trans('order_seles.User') }}</th>
                            
                            <th>{{ trans('order_seles.datestart') }}</th>
                       
                            <th>{{ trans('order_seles.price') }}</th>
                            <th>{{ trans('order_seles.cautionnement') }}</th>
                            <th>{{ trans('order_seles.total') }}</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($orderSeles as $orderSele)
                        <tr>
                            <td>{{ $orderSele->Produit }}</td>
                            <td>{{ optional($orderSele->user)->name }}</td>
                          
                            <td>{{ $orderSele->datestart }}</td>
              
                              <td>{{ $orderSele->price }}</td>
                            <td>{{ $orderSele->cautionnement }}</td>
                            <td>{{ $orderSele->total }}</td>

                            <td>

                                <form method="POST" action="{!! route('order_seles.order_sele.destroy', $orderSele->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('order_seles.order_sele.show', $orderSele->id ) }}" class="btn btn-info" title="{{ trans('order_seles.show') }}">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                      
                                     
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                     <tfoot>
            <tr>
                <th colspan="4" >{{ trans('order_seles.total') }}:</th>
                <th></th>
            </tr>
        </tfoot>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $orderSeles->render() !!}
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
                .column( 5 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            console.log(total);
            pageTotal = api
                .column( 5, { page: 'current'} )
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