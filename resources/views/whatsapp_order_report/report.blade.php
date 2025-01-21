@extends('layouts.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-6">
                            <h4 class="card-title">WhatsApp Order Report</h4>
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
                    <form action="{{ route('whatsapp-order.report') }}" method="GET">
    <div class="row">
        <!-- Customer Dropdown -->
        <div class="col-md-3">
            <select class="form-control" name="customer_id" id="customer_id">
                <option value="0">Select Customer</option>
                @foreach($whatsapp_customers as $customer)
                <option value="{{ $customer->id }}" {{ request('customer_id') == $customer->id ? 'selected' : '' }}>
                    {{ $customer->customer_name }}
                </option>
                @endforeach
            </select>
        </div>
        
        <!-- Date Filters -->
        <div class="col-md-2">
            <input type="date" name="from_date" class="form-control" value="{{ request('from_date') }}" placeholder="From Date">
        </div>
        <div class="col-md-2">
            <input type="date" name="to_date" class="form-control" value="{{ request('to_date') }}" placeholder="To Date">
        </div>

        <!-- Get Button -->
        <div class="col-md-1">
            <button type="submit" class="btn btn-primary mb-2 w-100">Get</button>
        </div>

        <!-- Search Box and Buttons -->
        <div class="col-md-4 d-flex align-items-center">
            <div class="input-group">
                <input type="text" name="search" class="form-control" value="{{ request('search') }}" placeholder="Search">
                <button type="submit" class="btn btn-primary">Search</button>
                <a href="{{ route('whatsapp-order.report') }}" class="btn btn-secondary">Clear</a>
            </div>
        </div>
    </div>
</form>



                    <!-- Table -->
                    <div class="table-responsive mt-4">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Date</th>
                                    <th>Order No</th>
                                    <th>Customer Name</th>
                                    <th>Grand Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($results->count())
                                @foreach ($results as $key => $res)
                                <tr>
                                    <td>{{ $loop->iteration + $results->firstItem() - 1 }}</td>
                                    <td>{{ $res->in_date }}</td>
                                    <td>{{ $res->invoice_no }}</td>
                                    <td>{{ $res->customer->customer_name ?? 'N/A' }}</td>
                                    <td>{{ $res->grand_total }}</td>
                                    <td>
                                        <a href="{{ route('whatsapp-order.reportView', $res->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script>
     $('select[name="customer_id"]').select2({
        placeholder: 'Select a Customer',
        allowClear: true
    });
</script>
@endsection