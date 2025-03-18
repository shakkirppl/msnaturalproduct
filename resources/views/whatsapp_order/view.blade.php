@extends('layouts.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Order Details</h4>
                  

                    @if ($errors->any())
          <div class="alert alert-danger">

            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div><br />
          
          @endif
          <div class="col-6 col-md-6 col-sm-6 col-xs-12 heading" style="text-align:end;">
                            <a href="{{ url('whatsapp-order/list') }}" class="backicon">
                                <i class="mdi mdi-backburger"></i>
                            </a>
                       </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                  
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                           
                            @foreach($orders->detail as $details)
                  <tr>
                    <td>{{$details->product_name}} - {{$details->size}}</td>
                    <td>{{$details->quantity}}</td>
                    <td>{{$details->price}}</td>
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
