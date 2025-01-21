@extends('layouts.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    
                     <div class="row">
                    <div class="col-6 col-md-6 col-sm-6 col-xs-12" >
                             <h4 class="card-title">Product Prices</h4>
                    </div>
                    <div class="col-6 col-md-6 col-sm-6 col-xs-12  heading" style="text-align:end;">
                    <a href="{{ route('product-prices.create') }}" class="btn btn-primary">Add New Price</a>
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
                <th>Product</th>
                <th>Size</th>
                <th>Country</th>
                <!-- <th>Store</th> -->
                <!-- <th>Original Price</th> -->
                <th>Display Price</th>
                <th>Currency</th>
                <!-- <th>Available</th> -->
                <!-- <th>State</th> -->
                <!-- <th>Shipping Charge</th> -->
                <!-- <th>In Stock</th>
                <th>Availability Date</th> -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productPrices as $price)
                <tr>
                    <td>{{ $price->product->product_name }}</td>
                    <td>{{ $price->size->size ?? 'N/A' }}</td>
                    <td>{{ $price->country->country_name }}</td>
                    <!-- <td>{{ $price->store->store_name }}</td> -->
                    <!-- <td>{{ $price->original_price }}</td> -->
                    <td>{{ $price->offer_price ?? 'N/A' }}</td>
                    <td>{{ $price->currency }}</td>
                    <!-- <td>{{ $price->is_available ? 'Yes' : 'No' }}</td> -->
                     <!-- <td>{{ $price->state }}</td> -->
                      <!-- <td>{{ $price->shipping_charge }}</td> -->
                    <!-- <td>{{ $price->in_stock ? 'Yes' : 'No' }}</td>
                    <td>{{ $price->availability_date ?? 'N/A' }}</td> -->
                    <td>
                        <a href="{{ route('product-prices.edit', $price->id) }}" class="btn btn-warning">Edit</a>
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
