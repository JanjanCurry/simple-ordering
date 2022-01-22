@extends('layouts.app')
@section('content')

<table class="table">
  <thead>
    <tr>
      <th scope="col">Date and Time</th>
      <th scope="col">Total Price</th>
      <th scope="col">View Sale</th>
    </tr>
  </thead>
  <tbody>
@foreach ($orders as $element)
    <tr>
      <th>{{$element->created_at}}</th>
      <th>{{$element->total_sales}}</th>
      <th><button type="button" class="btn btn-primary view" data-id="{{$element->id}}">
  view
</button>
</th>
    </tr>

@endforeach
  </tbody>
</table>
{{-- @foreach ($orders as $element)
    <h1>{{$element->total_sales}}</h1>
    @foreach ($element->OrderByItem as $list)
        <h4>{{$list->MenuList->MenuCategory->name}}</h4>
        
    @endforeach
@endforeach
 --}}
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#SalesSummaryModal">
  Sales Summary
</button>


<div class="modal fade" id="SalesSummaryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sales Summary</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <table class="table">
    
                @foreach ($orders as $element)
                    
              <thead>
                <tr>
                  <th>{{$element->created_at}}</th>
                </tr>
                <tr>
                  <th scope="col">Category</th>
                  <th scope="col">Menu Name</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Price</th>
                </tr>
              </thead>
              <tbody>
                    @foreach ($element->OrderByItem as $list)
                        <tr>
                          <th>{{$list->MenuList->MenuCategory->name}}</th>
                          <th>{{$list->MenuList->name}}</th>
                          <th>{{$list->quantity}}</th>
                          <th>{{$list->quantity * ($list->MenuList->price + $list->MenuList->tax)}}</th>
                        </tr>
                    
                    @endforeach
                    <tr>
                        <th>Total Price</th>
                        <th></th>
                        <th></th>
                        <th>{{$element->total_sales}}</th>
                    </tr>
              </tbody>
                @endforeach
        </table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<button type="button" class="btn btn-primary" id="sales_per_order_button" data-toggle="modal" data-target="#sales_per_order_modal" hidden>
  Sales Per Order
</button>

<div class="modal fade" id="sales_per_order_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sales Per Order</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="sales_per_order">


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection

{{-- <script>
     $(document).ready(function(){
     $("#view").on("click", function() {
        // var request = $.ajax({
        //   url: "/get-by-order",
        //   method: "GET",
        //   data:  {from: 'all_data.date_start', to: 'all_data.date_end',
        //       compareType: 'economic'},
        //   dataType: "JSON",
        // });
  
        // request.done(function( all_datas ) {
            console.log('ahskja');
        // });
    });
    });
 --}}{{-- </script> --}}

