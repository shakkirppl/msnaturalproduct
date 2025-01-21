@extends('layouts.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    
                     <div class="row">
                    <div class="col-6 col-md-6 col-sm-6 col-xs-12" >
                             <h4 class="card-title">Least Moving</h4>
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
                <th>Sold Count</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $data)
                <tr>
                <td>{{ $data->product->product_name ?? 'N/A' }}</td> <!-- Display product name -->
                    <td>{{ $data->total_sold }}</td>
                  
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
