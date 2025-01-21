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
                            <h4 class="card-title">Area Wise Sales Report</h4>
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
                    <form action="{{ route('sales-report/area-wise') }}" method="GET">
    <div class="row">
        <!-- Customer Dropdown -->
        
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

        <!-- Search Box and Buttons -->
        <div class="col-md-8 d-flex align-items-center">
            <div class="input-group">
                <input type="text" name="search" class="form-control" value="{{ request('search') }}" placeholder="Search">
                <button type="submit" class="btn btn-primary">Search</button>
                <a href="{{ route('sales-report/area-wise') }}" class="btn btn-secondary">Clear</a>
            </div>
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
                                    <th>Total Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if ($results->count())
                                @foreach ($results as $key => $res)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $res->order_no }}</td>
                                        <td>{{ $res->first_name }}</td>
                                        <td>{{ $res->country->country_name }}</td>
                                       <td>{{ $res->created_at->format('Y-m-d') }}</td>
                                        <td>{{ $res->total_amount }}</td>
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
