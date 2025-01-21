@extends('layouts.layout')
@section('content')




<div class="main-panel">
    <div class="content-wrapper">
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    
                     <div class="row">
                    <div class="col-6 col-md-6 col-sm-6 col-xs-12" >
                             <h4 class="card-title">View Detail</h4>
                    </div>
       
                    <div class="col-6 col-md-6 col-sm-6 col-xs-12 heading" style="text-align:end;">
                            <a href="{{ url('whatsapp-order/report') }}" class="backicon">
                                <i class="mdi mdi-backburger"></i>
                            </a>
                       </div> 
                   
                </div>
                <br>
                    
@if($message = Session::get('success'))
<div class="alert alert-sucess">
  <p>{{$message}}</p>
</div>
@endif
<div class="row">
                        
                        <div class="col-md-4">
                          <div class="form-group row">
                          <label class="col-sm-4 col-form-label"> {{ $whatsapporder->customer->customer_name ?? 'N/A' }}</label>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group row">
              
                          <label class="col-sm-4 col-form-label">{{ $whatsapporder->invoice_no }}</label>  
                          </div>
                          </div>                   
                        <div class="col-md-4">
                          <div class="form-group row">
                        
                           
                          <label class="col-sm-4 col-form-label"> {{ $whatsapporder->in_date }}</label>                          
                            
                             </div>
                        </div>
                 </div>

                
             
                  <p class="card-description">
                
                  </p>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                                    <th>No</th>
                                    <th>Product Name</th>
                                    <th>Unit</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <!-- <th>Total</th> -->
                        </tr>
                      </thead>
                     <tbody>
                     @foreach ($whatsapporder->orderDetails as $index => $detail)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $detail->product->product_name ?? 'N/A' }}</td>
                                        <td>{{ $detail->productSize->size ?? 'N/A' }}</td>
                                        <td>{{ $detail->quantity }}</td>
                                        <td>{{ number_format($detail->price, 2) }}</td>
                                        <!-- <td>{{ number_format($detail->total, 2) }}</td> -->
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


     

