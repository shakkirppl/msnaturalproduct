@extends('layouts.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    
                     <div class="row">
                    <div class="col-6 col-md-6 col-sm-6 col-xs-12" >
                             <h4 class="card-title">UAE</h4>
                    </div>
                 
                       
                   
                </div>
                    
@if($message = Session::get('success'))
<div class="alert alert-sucess">
  <p>{{$message}}</p>
</div>
@endif
 
<form method="GET" action="{{ route('courier-template-uae') }}">
    <div>
        <label>Start Date:</label>
        <input type="date" name="start_date" value="{{ request('start_date') }}">
    </div>
    <div>
        <label>End Date:</label>
        <input type="date" name="end_date" value="{{ request('end_date') }}">
    </div>
    


    <div>
        <button type="submit">Filter</button>
    </div>
</form>
                  <p class="card-description">
                
                  </p>
                  <div class="table-responsive">
              
                  <table border="1">
    <thead>
        <tr>
            <th>ShipperRef</th>
            <th>Consignee</th>
            <th>ConsigneeName</th>
            <th>ConsigneeTel1</th>
            <th>ConsigneeMob1</th>
            <th>Destination</th>
            <th>ConsigneeAddress1</th>
            <th>ConsigneeAddress2</th>
            <th>CODAmt</th>
            <th>NoofPieces</th>
            <th>Weight</th>
            <th>GoodsDesc</th>
            <th>SpecialInstruct</th>
            <th>ServiceType</th>
            <th>ProductType</th>
        </tr>
    </thead>
    <tbody>
        @forelse($orders as $order)
            <tr>
                <td>@foreach($order->order as $cust) {{ $cust->order_no ?? 'N/A' }} @endforeach</td>
                <td>@foreach($order->order as $cust) {{ $cust->first_name ?? 'N/A' }} @endforeach</td>
                <td>@foreach($order->order as $cust) {{ $cust->first_name ?? 'N/A' }} @endforeach</td>
                <td>@foreach($order->order as $cust) {{ $cust->phone_number ?? 'N/A' }} @endforeach</td>
                <td>@foreach($order->order as $cust) {{ $cust->phone_number ?? 'N/A' }} @endforeach</td>
                <td>@foreach($order->order as $cust) {{ $cust->state_code ?? 'N/A' }} @endforeach</td>
                <td>@foreach($order->order as $cust) {{ $cust->address ?? 'N/A' }} @endforeach</td>
                <td>@foreach($order->order as $cust) {{ $cust->city ?? 'N/A' }} @endforeach</td>
                <td> {{$order->shipping_charge}} </td>
                <td> {{$order->quantity}} </td>
                <td>2.5 </td>
                <td>@foreach($order->order as $cust) {{ $cust->shipping ?? 'N/A' }} @endforeach</td>
                <td>@foreach($order->order as $cust) {{ $cust->shipping ?? 'N/A' }} @endforeach</td>
                <td></td>
                <td></td>
   
            </tr>
        @empty
            <tr>
                <td colspan="15">No orders found</td>
            </tr>
        @endforelse
    </tbody>
</table>
                  </div>
                </div>
              </div>
            </div>
            </div>
            </div>
            
@endsection
@section('script')
<script>
    $(document).ready( function () {
    $('#value-table').DataTable();
} );
</script>
@endsection
