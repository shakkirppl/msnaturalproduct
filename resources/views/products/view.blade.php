@extends('layouts.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    
                     <div class="row">
                    <div class="col-6 col-md-6 col-sm-6 col-xs-12" >
                             <h4 class="card-title">Products Sku</h4>
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
              
                    <table class="table table-hover">
        <thead>
            <tr>
                <th>Size</th>
                <th>Image</th>
                <th>Add/Change Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productSku as $product)
            <tr>
            <td>{{ $product->size}}</td>
            <td>
            <img loading="lazy" src="{{ url('uploads/products/' . $product->image) }}" class="product-image"  /></td>
            <td> <a href="{{ url('products-unit.image.change', $product->id) }}" class="btn btn-primary btn-sm">Change Image</a></td>
        <!-- <td>
                <form action="{{ route('product-sku.destroy', $product->id) }}" method="post">
               
                @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">
        <i class="fa fa-trash"></i>
    </button>
</form>
                </td> -->
            </tr>
            @endforeach
        </tbody>
    </table>
                  </div>
                  <hr>
                  <lable>Image</label>
                  <div class="table-responsive">
              
              <table class="table table-hover">
  <thead>
      <tr>
          <th>Image</th>
          <th>Page</th>
          <th>Action</th>
      </tr>
  </thead>
  <tbody>
      <tr>
      <td>  <img loading="lazy" src="{{ url('uploads/products/' . $products->image) }}" class="product-image"  /></td>
   
          <td>
            Main Page
          </td>
          <td> <a href="{{ url('products.main.image.change', $products->id) }}" class="btn btn-primary btn-sm">Change Image</a></td>
      </tr>

      @foreach($productImage as $image)
      <tr>
      <td>  <img loading="lazy" src="{{ url('uploads/products/' . $image->image) }}" class="product-image"  /></td>
   
          <td>
            Detail Page
          </td>
          <td> <a href="{{ url('products.detail.image.change', $image->id) }}" class="btn btn-primary btn-sm">Change Image</a></td>
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
