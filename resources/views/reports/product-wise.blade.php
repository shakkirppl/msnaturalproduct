@extends('layouts.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <!-- Title -->
                    <div class="row">
                        <div class="col-6 col-md-6 col-sm-6 col-xs-12">
                            <h4 class="card-title">Product Wise Sales Report</h4>
                        </div>
                    </div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                    @endif 

                    <!-- Search Form -->
                    <form action="{{ route('sales-report/product-wise') }}" method="GET">
    <div class="row">
        <!-- Customer Dropdown -->
        <div class="col-md-4">
            <select class="form-control" name="product_id" id="product_id">
                <option value="0">Select Product</option>
                @foreach($products as $product)
                                        <option value="{{ $product->id }}" {{ request('product_id') == $product->id ? 'selected' : '' }}>
                                            {{ $product->product_name }}
                                        </option>
                                    @endforeach
            </select>
        </div>
        
        <!-- Date Filters -->
        <div class="col-md-3">
            <input type="date" name="from_date" class="form-control" value="{{ request('from_date') }}" placeholder="From Date">
        </div>
        <div class="col-md-3">
            <input type="date" name="to_date" class="form-control" value="{{ request('to_date') }}" placeholder="To Date">
        </div>

        <!-- Get Button -->
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary mb-2 w-100">Get</button>
        </div>

   
    </div>
</form>
                

                    <!-- Sales Table -->
                    <div class="table-responsive mt-4">
                        <table class="table table-hover" id="value-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Order ID</th>
                                    <th>Customer</th>
                                    <th>Country</th>
                                    <th>Order Date</th>
                                    <th>Quandity</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if ($results->count())
                                @foreach ($results as $key => $res)
                                    <tr>
                                   
                                        <td>{{ $loop->iteration }}</td>
                                        <td> @foreach ($res->order as $key => $ord) {{ $ord->order_no }}  @endforeach</td>
                                        <td> @foreach ($res->customer as $key => $cust) {{ $cust->first_name }}  @endforeach</td>
                                        <td>{{ $res->country->country_name }}</td>
                                      <td>{{ $res->created_at->format('Y-m-d') }}</td>
                                        <td>{{ $res->quantity }}</td>
                                    </tr>
                                    @endforeach
                                @else
                                <tr>
                                    <td colspan="6" class="text-center">No orders found</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                      <!-- Pagination -->
                      <div class="mt-3">
                        {{ $results->appends(request()->input())->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script>
    $(document).ready(function () {
        $('#value-table').DataTable({
            "paging": false, // Disable DataTable's internal pagination
            "ordering": true,
            "searching": false // Disable search for better performance
        });
    });
</script>
@endsection
