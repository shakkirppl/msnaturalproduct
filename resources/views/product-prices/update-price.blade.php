@extends('layouts.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    
                     <div class="row">
                    <div class="col-6 col-md-6 col-sm-6 col-xs-12" >
                             <h4 class="card-title">Add / Update Price</h4>
                    </div>
                    <div class="col-6 col-md-6 col-sm-6 col-xs-12  heading" style="text-align:end;">
                   
                    </div>
                       
                   
                </div>
                    

 
                 
                  <p class="card-description">
                  <h4>Update Price for {{ $product->product_name }} {{ $productSize->size }}</h4>
                  </p>
                  <div class="table-responsive">
                  @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form method="POST" action="{{ route('products.save-price') }}">
        @csrf
        <input type="hidden" name="product_size_id" value="{{ $productSize->id }}">

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Country</th>
                    <th>Original Price</th>
                    <th>Offer Price</th>
                    <th>Currency</th>
                    <th>In Stock</th>
                </tr>
            </thead>
            <tbody>
                @foreach($countries as $country)
                @php
        $priceData = $productPrices[$country->id] ?? null;
    @endphp
                    <tr>
                    <input type="hidden" name="prices[{{ $country->id }}][country_id]" value="{{ $country->id }}">

                        <td>{{ $country->country_name }}</td>
                        <td>
                           
                        <input type="number" class="form-control" step="any" name="prices[{{ $country->id }}][original_price]" 
                        value="{{ old("prices.{$country->id}.original_price", $priceData->original_price ?? 0) }}"  required>
                        </td>
                        <td>
                        <input type="number" class="form-control" step="any" name="prices[{{ $country->id }}][offer_price]" 
                        value="{{ old("prices.{$country->id}.offer_price", $priceData->offer_price ?? 0) }}" required>
                        </td>
                        <td>
                        <input type="text" class="form-control"  name="prices[{{ $country->id }}][currency]" 
                        value="{{ old("prices.{$country->id}.currency", $priceData->currency ?? 'USD') }}" required>
                        </td>
                        <td>
                        <select name="prices[{{ $country->id }}][in_stock]" class="form-control" required>
        <option value="1" {{ old("prices.{$country->id}.in_stock", $priceData->in_stock ?? '') == '1' ? 'selected' : '' }}>Yes</option>
        <option value="0" {{ old("prices.{$country->id}.in_stock", $priceData->in_stock ?? '') == '0' ? 'selected' : '' }}>No</option>
    </select>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <button type="submit" class="btn btn-success">Save Prices</button>
    </form>
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
