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
                                 <h4 class="card-title">Update Work Center</h4>
                        </div>
                           <div class="col-md-6 heading">
                             <a href="{{ route('work-center.index') }}" class="backicon"><i class="mdi mdi-backburger"></i></a>
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
                  <form class="form-sample"  action="{{ route('work-center.update',$workCenter->id) }}" method="post" enctype="multipart/form-data"  >
                          {{csrf_field()}}
                          @method('PUT')
                    <div class="row">
                        
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label required"> Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder=" Name" name="name" value="{{$workCenter->name}}"  required  />
                          </div>
                        </div>
                      </div>
         
              
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label required">Status </label>
                          <div class="col-sm-9">
                        <select class="form-control form-control-lg" id="status" name="status">
                      
                    @if($workCenter->status==1)
                    <option selected value="1">Active</option>
                      <option value="0">Deactive</option>
                      @else
                      <option selected value="0">Deactive</option>
                     <option  value="1">Active</option>
                     @endif
                       </select>
                          </div>
                        </div>
                      </div>  

             
          
     

                      </div>

                
                <div class="submitbutton">
                    <button type="submit" class="btn btn-primary mb-2 submit">Submit<i class="fas fa-save"></i>


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