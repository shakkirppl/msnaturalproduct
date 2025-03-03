@extends('layouts.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    
                     <div class="row">
                    <div class="col-6 col-md-6 col-sm-6 col-xs-12" >
                             <h4 class="card-title">Orders List</h4>
                    </div>
                    <div class="col-6 col-md-6 col-sm-6 col-xs-12  heading" style="text-align:end;">
                    {{-- <a href="#" class="btn btn-primary">Add New Price</a> --}}
                    </div>
                       
                   
                </div>
                    
@if($message = Session::get('success'))
<div class="alert alert-sucess">
  <p>{{$message}}</p>
</div>
@endif
 
                 
                  <p class="card-description">
                
                  </p>
                  <div class="table-responsive">
              
                  <table class="table" id="value-table">
        <thead>
            <tr>
                <th>Status</th>
                 <th>Date</th>
                 <th>OrderID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Store</th>
                <th>Total amount</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
      
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->delivery_status}}</td>
                    <td>{{ \Carbon\Carbon::parse($order->date)->format('d-m-Y') }}</td>
                    <td>{{ $order->order_no}}</td>
                    <td>{{ $order->first_name }} {{$order->last_name}}</td>
                    <td>{{ $order->phone_number }}</td>
                    <td>{{ $order->store->store_name }}</td>
                     <td>{{ $order->total_amount }}</td>
                     


                    {{-- <td>{{ $price->size->size ?? 'N/A' }}</td>
                    <td>{{ $price->country->country_name }}</td>
                    <td>{{ $price->store->store_name }}</td>
                    <td>{{ $price->original_price }}</td>
                    <td>{{ $price->offer_price ?? 'N/A' }}</td>
                    <td>{{ $price->currency }}</td>
                    <td>{{ $price->is_available ? 'Yes' : 'No' }}</td>
                     <td>{{ $price->state }}</td>
                      <td>{{ $price->shipping_charge }}</td>
                    <!-- <td>{{ $price->in_stock ? 'Yes' : 'No' }}</td>
                    <td>{{ $price->availability_date ?? 'N/A' }}</td> -->  --}}



                    <td> 
                        <a href="{{ route('order_view', $order->id) }}" class="btn btn-warning">View</a>
                    </td>

                </tr>
            @endforeach
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
