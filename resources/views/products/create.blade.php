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

          <form class="form-sample" action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row">
           
            <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label required"> Package Type</label>
                          <div class="col-sm-9">
                          <select class="form-control form-control-lg" id="package_type" name="package_type" required>
                      <option value="Single">Single</option>
                     <option value="Combo">Combo</option>
                       </select>
                          </div>
                        </div>
                      </div>

                  <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label required"> Product Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Product Name" name="product_name"  required="true"  value="{{old('product_name')}}" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
  <div class="form-group row">
    <label class="col-sm-2 col-form-label required"> Product Name Arabic</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" placeholder="Product Name Arabic" name="product_name_ar" dir="rtl" required value="{{ old('product_name_ar') }}" />
    </div>
  </div>
</div>
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

                <div class="col-md-12">
               <div class="form-group row">
              <label class="col-sm-2 col-form-label required">Description</label>
              <div class="col-sm-9">
                  <textarea class="form-control" id="description" name="description" required>{{ old('description') }}</textarea>
           </div>
         </div>
          </div>

          <div class="col-md-12">
               <div class="form-group row">
              <label class="col-sm-2 col-form-label required">Description Arabic</label>
              <div class="col-sm-9">
                  <textarea class="form-control" id="description_ar" name="description_ar" dir="rtl" required>{{ old('description_ar') }}</textarea>
           </div>
         </div>
          </div>


            </div>
            <div class="row">

            <div class="col-md-12">
    <hr> <!-- Horizontal line to visually separate sections -->
    <h5 class="mb-4">Add Images</h5> <!-- Section Heading with margin bottom -->
  </div>

                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label required"> Main Image</label>
                          <div class="col-sm-9">
                          <input type="file" name="single_image" class="form-control-file" required>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label required"> Additional Images</label>
                          <div class="col-sm-9">
                          <input type="file" name="multiple_images[]" class="form-control-file" multiple>
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
