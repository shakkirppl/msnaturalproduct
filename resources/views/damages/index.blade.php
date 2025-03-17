@extends('layouts.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    
                     <div class="row">
                    <div class="col-6 col-md-6 col-sm-6 col-xs-12" >
                             <h4 class="card-title">Damage</h4>
                    </div>
                    <div class="col-6 col-md-6 col-sm-6 col-xs-12  heading" style="text-align:end;">
                    <a href="{{ route('damages.create') }}" class="btn btn-primary mb-3">Add Damage Record</a>
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
                <th>Country</th>
                <th>Quantity</th>
                <th>Reason</th>
                <th>Damage Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($damages as $damage)
                <tr>
                    <td>{{ $damage->productSize->product->product_name }}</td>
                    <td>{{ $damage->productSize->size }}</td>
                    <td>{{ $damage->store->store_name }}</td>
                    <td>{{ $damage->quantity }}</td>
                    <td>{{ $damage->reason }}</td>
                    <td>{{ $damage->damage_date }}</td>
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
