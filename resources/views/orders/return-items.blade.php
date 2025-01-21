@extends('layouts.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    
                     <div class="row">
                    <div class="col-6 col-md-6 col-sm-6 col-xs-12" >
                             <h4 class="card-title">Return Item List</h4>
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
              
                  <table class="table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Product</th>
                <th>Order No</th>
                <th>Customer Detail</th>
                <th>Quandity</th>
                <th>Reason</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
      
            @foreach ($orders as $order)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($order->in_date)->format('d-m-Y') }}</td>
                    <td> @foreach ($order->product as $prod){{ $prod->product_name }}  @endforeach @foreach ($order->productSize as $siz){{ $siz->size }}  @endforeach</td>
                    <td>@foreach ($order->order as $ord){{ $ord->order_no }}  @endforeach</td>
                    <td>@foreach ($order->customer as $cust){{ $cust->first_name }} {{ $cust->last_name}} <br>{{ $cust->address}},{{ $cust->billing_city}},{{ $cust->phone_number}}  @endforeach</td>
                 
                     <td>{{ $order->quantity }}</td>
                     <td>@foreach ($order->reason as $reas){{ $reas->name }}  @endforeach</td>
                    <td> 
                        <a href="{{ route('return-item/collected', $order->id) }}" class="btn btn-warning">Collected</a>
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
