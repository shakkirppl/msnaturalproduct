@extends('layouts.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="card-title">Orders Tracking</h4>
                        </div>
                    </div>

                    @if($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif

                    <!-- Filter Form -->
                    <form method="GET" action="{{ route('orders.tracking') }}">
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label>Delivery Status</label>
                                <select name="delivery_status" class="form-control">
                                    <option value="">All</option>
                                    <option value="Pending" {{ request('delivery_status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="Accepted" {{ request('delivery_status') == 'Accepted' ? 'selected' : '' }}>Accepted</option>
                                    <option value="Packed" {{ request('delivery_status') == 'Packed' ? 'selected' : '' }}>Packed</option>
                                    <option value="Delivered" {{ request('delivery_status') == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label>Order No</label>
                                <input type="text" name="order_no" class="form-control" value="{{ request('order_no') }}">
                            </div>
                            <div class="col-md-4">
                                <label>First Name</label>
                                <input type="text" name="first_name" class="form-control" value="{{ request('first_name') }}">
                            </div>
                            <div class="col-md-3">
                                <label>Phone Number</label>
                                <input type="text" name="phone_number" class="form-control" value="{{ request('phone_number') }}">
                            </div>
                            <div class="col-md-3">
                                <label>From Date</label>
                                <input type="date" name="from_date" class="form-control" value="{{ request('date') }}">
                            </div>
                            <div class="col-md-3">
                                <label>To Date</label>
                                <input type="date" name="to_date" class="form-control" value="{{ request('date') }}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('orders.tracking') }}" class="btn btn-secondary">Reset</a>
                    </form>
                    <!-- End Filter Form -->

                    <div class="table-responsive mt-3">
                        <table class="table" id="value-table">
                            <thead>
                                <tr>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>OrderID</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Country</th>
                                    <th>Total amount</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->delivery_status }}</td>
                                        <td>{{ \Carbon\Carbon::parse($order->date)->format('d-m-Y') }}</td>
                                        <td>{{ $order->order_no }}</td>
                                        <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                                        <td>{{ $order->phone_number }}</td>
                                        <td>{{ $order->store->store_name }}</td>
                                        <td>{{ $order->total_amount }}</td>
                                        <td>
                                            <a href="{{ route('order_view', $order->id) }}" class="btn btn-warning">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{ $orders->appends(request()->query())->links() }}

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('#value-table').DataTable();
    });
</script>
@endsection
