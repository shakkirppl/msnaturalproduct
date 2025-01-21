@extends('layouts.layout')
@section('content')
<style>
  .required:after {
    content:" *";
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
                                 <h4 class="card-title">Transfer</h4>
                        </div>
                          
                        <div class="col-md-6">
                        </div>
                    </div>
                    
                    <div class="row">
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
          </div><br />
          @endif
          
        </div>
        <form action="{{ route('stock_returns.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="product_size_id" class="form-label">Product</label>
            <select name="product_size_id" id="product_size_id" class="form-control" required>
                @foreach ($productSizes as $productSize)
                    <option value="{{ $productSize->id }}">
                        {{ $productSize->product->product_name }} - {{ $productSize->size }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="store_id" class="form-label">Store</label>
            <select name="store_id" id="store_id" class="form-control" required>
                @foreach ($stores as $store)
                    <option value="{{ $store->id }}">{{ $store->store_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" name="quantity" id="quantity" class="form-control" min="1" required>
        </div>

        <div class="mb-3">
            <label for="reason" class="form-label">Reason</label>
            <textarea name="reason" id="reason" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
                </div>
              </div>
            </div>
          </div>
            </div>
               
@endsection
@section('script')

@endsection