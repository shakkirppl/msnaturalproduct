@extends('layouts.layout')

@section('content')
<style>
  .required:after {
    content: " *";
    color: red;  
  }
</style>

<div class="main-panel">
  <div class="content-wrapper">
    <div class="col-12 grid-margin createtable">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <h4 class="card-title">Create New Product</h4>
            </div>
          </div>

          <div class="row">
          <div class="col-md-6 heading">
                             <a href="{{ url('products') }}" class="backicon"><i class="mdi mdi-backburger"></i></a>
                        </div>
            <br>
          </div>

          <div class="col-xl-12 col-md-12 col-sm-12 col-12">
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
          </div>

          <h1>{{ isset($productPrice) ? 'Edit' : 'Add' }} Product Price</h1>
    
    <form action="{{ isset($productPrice) ? route('product-prices.update', $productPrice->id) : route('product-prices.store') }}" method="POST">
        @csrf
        @if(isset($productPrice))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="product_id">Product</label>
            <select name="product_size_id" id="product_size_id" class="form-control" required>
                @foreach ($productSizes as $productSize)
                @if($productSize->id==$productPrice->product_size_id)
                    <option value="{{ $productSize->id }}">
                        {{ $productSize->product->product_name }} - {{ $productSize->size }}
                    </option>
                    @endif
                @endforeach
            </select>
        </div>
        
        <div class="mb-3">
            <label for="store_id" class="form-label">Store</label>
            <select name="store_id" id="store_id" class="form-control" required>
                @foreach ($stores as $store)
                @if($store->id==$productPrice->store_id)
                    <option value="{{ $store->id }}">{{ $store->store_name }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Original Price</label>
            <input type="number" name="original_price" id="original_price" class="form-control" min="1" value="{{$productPrice->original_price}}"  required>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Offer Price</label>
            <input type="number" name="offer_price" id="offer_price" class="form-control" min="1" value="{{$productPrice->offer_price}}" required>
        </div>
        <!-- Additional fields for product size, country, store, prices, etc. -->

        <button type="submit" class="btn btn-success">{{ isset($productPrice) ? 'Update' : 'Add' }}</button>
    </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')

@endsection
