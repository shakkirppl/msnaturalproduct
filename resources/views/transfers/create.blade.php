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
        <form action="{{ route('transfers.store') }}" method="POST">
        @csrf
                    <div class="row">
                        
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label required"> Product </label>
                          <div class="col-sm-9">
                          <select name="product_size_id" id="product_size_id" class="form-control" required>
                <option value="">Select Product Size</option>
                @foreach($productSizes as $size)
                    <option value="{{ $size->id }}">{{ $size->product->product_name }} - {{ $size->size }}</option>
                @endforeach
            </select>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label required"> Target Store</label>
                          <div class="col-sm-9">
                          <select name="store_id" id="store_id" class="form-control" required>
                <option value="">Select Store</option>
                @foreach($stores as $store)
                    <option value="{{ $store->id }}">{{ $store->store_name }} </option>
                @endforeach
            </select>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label required"> Quantity</label>
                          <div class="col-sm-9">
                          <input type="number" name="quantity" id="quantity" class="form-control" required>
                          </div>
                        </div>
                      </div>

                  
                           

             
          
     

                      </div>

                
                <div class="submitbutton">
                    <button type="submit" class="btn btn-primary mb-2 submit">Transfer<i class="fas fa-save"></i>


</button>
                    </div>
                    
                    
                    
                  </form>
                </div>
              </div>
            </div>
          </div>
            </div>
               
@endsection
@section('script')

@endsection