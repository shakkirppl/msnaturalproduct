@extends('layouts.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    
                     <div class="row">
                    <div class="col-6 col-md-6 col-sm-6 col-xs-12" >
                             <h4 class="card-title">Products</h4>
                    </div>
                    <div class="col-6 col-md-6 col-sm-6 col-xs-12  heading" style="text-align:end;">
                    <a href="{{ route('products.create') }}" class="newicon"><i class="mdi mdi-new-box"></i></a>
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
              
                    <table class="table table-hover"id="value-table">
        <thead>
            <tr>
              <th></th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productSizes as $productSize)
            <tr>
         
            <th><img loading="lazy" src="{{ url('uploads/products/' . $productSize->product->image) }}" width="100px" height="100px" class="product-image"
              alt="Hair Care Oil Product Image" /></th>
                <td>{{ $productSize->product->product_name }} {{ $productSize->size }}</td>
              
                <td>
                    <a href="{{ url('products.add-update-price', $productSize->id) }}" class="btn btn-success btn-sm">Add/Update Price</a>
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
