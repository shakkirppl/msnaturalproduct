@extends('layouts.layout')
@section('content')
<link href="https://cdn.materialdesignicons.com/6.5.95/css/materialdesignicons.min.css" rel="stylesheet">
<style>
.list-unstyled li {
  margin-bottom: 0.5rem;
}
.card-header h4 {
  margin-bottom: 1rem;
}
</style>
<div class="main-panel">
    <div class="content-wrapper">
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    
                     <div class="row">
                    <div class="col-6 col-md-6 col-sm-6 col-xs-12" >
                             <h4 class="card-title">Order Details</h4>
                    </div>
                    <div class="col-6 col-md-6 col-sm-6 col-xs-12  heading" style="text-align:end;">
                  
                    </div>
                       
                   
                </div>
                    
@if($message = Session::get('success'))
<div class="alert alert-sucess">
  <p>{{$message}}</p>
</div>
@endif
 
                 
<div class="row">
  <!-- Delivery Details Section -->
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <h4>
          <i class="mdi mdi-truck-delivery"></i> Delivery Details
        </h4>
      </div>
      <div class="card-body">
        <!-- Delivery Details -->
        <h5><i class="mdi mdi-truck-delivery"></i> Delivery Details</h5>
        <ul class="list-unstyled">
          <li><strong>Name:</strong> {{$orders->first_name}} {{$orders->last_name}}</li>
          <li><strong>Phone:</strong> {{$orders->phone_number}}</li>
          <li><strong>Store:</strong> {{ $orders->store->store_name }}</li>
          <li><strong>Date:</strong> {{ \Carbon\Carbon::parse($orders->date)->format('d-m-Y') }}</li>
          <li><strong>Total Amount:</strong> {{ $orders->total_amount }}</li>
        </ul>
        <hr>
        <!-- Additional Delivery Info -->
        <h5><i class="mdi mdi-map-marker-outline"></i> Additional Delivery Info</h5>
        <ul class="list-unstyled">
          <li><strong>Landmark:</strong> {{$orders->landmark}}</li>
          <li><strong>City:</strong> {{$orders->city}}</li>
          <li><strong>Postcode:</strong> {{$orders->pincode}}</li>
          <li><strong>state:</strong>  @foreach( $orders->deliverystate as $st)
          {{$st->state_name }} @endforeach</li>
          <li><strong>Country:</strong> {{$orders->country->country_name}}</li>
          <!-- <li><strong>Payment Type:</strong>
            @if($orders->payment_type == 0)
              Cash on Delivery
            @else
              Stripe
            @endif
          </li> -->
        </ul>
      </div>
    </div>
  </div>

  <!-- Billing Details Section -->
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <h4>
          <i class="mdi mdi-credit-card-outline"></i> Billing Details
        </h4>
      </div>
      <div class="card-body">
        <!-- Billing Details -->
        <h5><i class="mdi mdi-account-outline"></i> Billing Information</h5>
        <ul class="list-unstyled">
          <li><strong>Full Name:</strong> {{$orders->billing_first_name}} {{$orders->billing_second_name}}</li>
          <li><strong>Address:</strong> {{$orders->billing_address}}</li>
          <li><strong>Phone:</strong> {{$orders->billing_phone}}</li>
          <li><strong>City:</strong> {{$orders->billing_city}}</li>
          <li><strong>Post Code:</strong> {{$orders->billing_post_code}}</li>
        
        </ul>
        <hr>
        <!-- Additional Billing Details -->
        <h5><i class="mdi mdi-map-marker-outline"></i> Additional Billing Information</h5>
        <ul class="list-unstyled">
         
          <li><strong>State:</strong>  @foreach( $orders->billingstate as $bs)
          {{$bs->state_name }} @endforeach</li>
          
          <li><strong>Country:</strong> @foreach( $orders->billingcountry as $bc)
          {{$bc->country_name }} @endforeach</li>
        </ul>
      </div>
    </div>
  </div>
</div>



                  <p class="card-description">
                  Order Products
                  </p>
                  <div class="table-responsive">
                    <table class="table table-hover" id="value-table">
                      <thead>
                        <tr>
                   
                          <th>Product Name</th>
                          <th>Quantity</th>
                      
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($orders->detail as $details)
                  <tr>
                    <td>{{$details->product_name}} - {{$details->size}}</td>
                    <td>{{$details->quantity}}<td>
                </tr>
               @endforeach
                      </tbody>
                    </table>
                  </div>

                  <hr>
<br>
                
@if($orders->delivery_status!='Cancel')
<form id="deliveryStatusForm" class="d-flex" action="{{ url('order.status.update') }}" method="post">
@csrf

  <input type="hidden" name="order_id" value="{{$orders->id}}">

    <label for="deliverySelect" class="form-label">Delivery Status</label>
    <select id="deliverySelect" style="margin-top:-10px;margin-left:10px;" name="d_status" class="form-select">
        <option value="Pending" {{ old('delivery_status', $orders->delivery_status) == 'Pending' ? 'selected' : '' }}>Pending</option>  
        <option value="Accepted" {{ old('delivery_status', $orders->delivery_status) == 'Accepted' ? 'selected' : '' }}>Accepted</option>
        <option value="Packed" {{ old('delivery_status', $orders->delivery_status) == 'Packed' ? 'selected' : '' }}>Packed</option>
        <option value="Delivered" {{ old('delivery_status', $orders->delivery_status) == 'Delivered' ? 'selected' : '' }}>Delivered</option>
    </select>

    <!-- Delivery Date Input (Initially hidden) -->
    <div id="deliveryDateDiv" style="display:none;" class="ml-auto" >
        <label for="deliveryDate" class="form-label">Delivery Date</label>
        <input type="date" id="deliveryDate" name="delivery_date" class="form-control">
    </div>

    @if($orders->delivery_date!=null)
    <div class="ml-auto">
        Expected delivering date: {{ \Carbon\Carbon::parse($orders->delivery_date)->format('d-m-Y') }}

      </div>

    @endif

    <div class="submitbutton">
              <button type="submit" class="btn btn-primary mb-2 submit">Submit<i class="fas fa-save"></i></button>
            </div>

          </form>
  
@endif
                  
                </div>
              </div>
            </div>
            </div>
            </div>
            
@endsection



 <style>
        /* Custom Transparent Select Styles */
        select {
            background: rgba(255, 255, 255, 0.9); /* Transparent white */
            backdrop-filter: blur(5px); /* Optional blur effect */
            border: 1px solid rgba(0, 0, 0, 0.1); /* Subtle border */
            color: #000; /* Black text */
            font-size: 16px;
            padding: 10px;
            border-radius: 5px;
            width: 200px;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        select:hover {
            background-color: rgba(0, 0, 0, 0.1); /* Slight background change on hover */
            border-color: rgba(0, 0, 0, 0.3); /* Change border color on hover */
        }

        select:focus {
            outline: none; /* Remove default focus outline */
            background-color: rgba(0, 0, 0, 0.2); /* Darken background when focused */
            border-color: rgba(0, 0, 0, 0.5); /* Darker border when focused */
        }

        </style>



@section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Show the date input when "Packed" is selected
  
</script>


@endsection
