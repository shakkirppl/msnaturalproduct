@extends('layouts.layout')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    
                     <div class="row">
                    <div class="col-6 col-md-6 col-sm-6 col-xs-12" >
                    <h4 class="card-title">Product Size Country Wise Status</h4>
                    </div>
                    <div class="col-6 col-md-6 col-sm-6 col-xs-12  heading" style="text-align:end;">
                 
                    </div>
                       
                   
                </div>
                    
@if($message = Session::get('success'))
<div class="alert alert-sucess">
  <p>{{$message}}</p>
</div>
@endif
 
      
                  
                  <hr>
                 
                  <div class="table-responsive">
              
              <table class="table table-hover" id="value-table">
  <thead>
      <tr>
      <th>Product Size</th>
                <th>Country</th>
                <th>Status</th>
      </tr>
  </thead>
  <tbody>
  @foreach($products as $product)
                @foreach($product->sizes as $size)
                    @foreach($size->countries as $country)
                        <tr>
                            <td>{{$product->product_name}} {{ $size->size }}</td>
                            <td>{{ $country->country_name }}</td>
                            <td>
                                <input type="checkbox" class="toggle-size-status" 
                                       data-size-id="{{ $size->id }}" 
                                       data-country="{{ $country->id }}" 
                                       {{ $country->pivot->is_active ? 'checked' : '' }}>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
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
    $('.toggle-status').change(function () {
        let product_id = $(this).data('id');
        let country_id = $(this).data('country');
        let status = $(this).is(':checked') ? 1 : 0;

        $.ajax({
            url: "{{ url('/product/toggle-status') }}",
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                product_id: product_id,
                country_id: country_id,
                status: status
            },
            success: function (response) {
                alert(response.success);
            }
        });
    });

    $('.toggle-size-status').change(function () {
        let product_size_id = $(this).data('size-id');
        let country_id = $(this).data('country');
        let status = $(this).is(':checked') ? 1 : 0;

        $.ajax({
            url: "{{ url('/product-size/toggle-status') }}",
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                product_size_id: product_size_id,
                country_id: country_id,
                status: status
            },
            success: function (response) {
                alert(response.success);
            }
        });
    });
</script>
<script>
    $(document).ready( function () {
    $('#value-table').DataTable();
} );
</script>
@endsection