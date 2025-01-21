@extends('layouts.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    
                     <div class="row">
                    <div class="col-6 col-md-6 col-sm-6 col-xs-12" >
                             <h4 class="card-title">Transfer</h4>
                    </div>
                    <div class="col-6 col-md-6 col-sm-6 col-xs-12  heading" style="text-align:end;">
                    <a href="{{ route('stock_returns.create') }}" class="btn btn-primary mb-3">Return Stock</a>
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
                  <table class="table table-bordered">
        <thead>
            <tr>
                <th>Product</th>
                <th>Size</th>
                <th>Store</th>
                <th>Quantity</th>
                <th>Reason</th>
                <th>Returned At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stockReturns as $return)
                <tr>
                    <td>{{ $return->productSize->product->product_name }}</td>
                    <td>{{ $return->productSize->size }}</td>
                    <td>{{ $return->store->name }}</td>
                    <td>{{ $return->quantity }}</td>
                    <td>{{ $return->reason }}</td>
                    <td>{{ $return->returned_at }}</td>
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
