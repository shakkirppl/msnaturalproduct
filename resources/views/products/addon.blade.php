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
              <h4 class="card-title">Create New Sku</h4>
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

          <form class="form-sample" action="{{ route('products-sku.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row">

              

                      <input type="hidden" class="form-control" placeholder="Product Id" name="product_id"  required="true"  value="{{$products->id}}" />
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label required"> {{$products->product_name}}</label>
                          <div class="col-sm-9">
                           
                          </div>
                        </div>
                      </div>
            </div>
            <div class="row">



  <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label required"> Size</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Size" name="size"  required="true"  value="{{old('size')}}" />
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label required"> Size Arabic</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Size Arabic" name="size_ar" dir="rtl" required="true"  value="{{old('size_ar')}}" />
                          </div>
                        </div>
                      </div>


            </div>
            <div class="submitbutton">
              <button type="submit" class="btn btn-primary mb-2 submit">Submit<i class="fas fa-save"></i></button>
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
