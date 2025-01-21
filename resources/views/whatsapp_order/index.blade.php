@extends('layouts.layout')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 col-md-6 col-sm-6 col-xs-12">
                            <h4 class="card-title">WhatsApp Orders</h4>
                        </div>
                        <div class="col-6 col-md-6 col-sm-6 col-xs-12 heading" style="text-align:end;">
                            <a href="{{ route('whatsapp-order.create') }}" class="newicon"><i class="mdi mdi-new-box"></i></a>
                        </div>
                    </div>

                    <!-- Search Form (Small search box at the top-right) -->
                    <div class="search-box" style="position: absolute; top: 20px; right: 50px; width: 250px;">
                        <form method="GET" action="{{ route('whatsapp-order/list') }}" class="d-flex">
                            <div class="input-group">
                                <input type="text" name="search" id="search-input" class="form-control form-control-sm" placeholder="Search..." value="{{ old('search', $search) }}">
                                <div class="input-group-append">
                                    <!-- search button -->
                                    <button type="submit" class="btn btn-sm btn-primary">
                                        <i class="mdi mdi-magnify"></i> <!-- You can use any search icon -->
                                     </button>
                                    <!-- Clear Button -->
                                    <button type="button" class="btn btn-sm" id="clearSearch">
                                        <i class="mdi mdi-close"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    @if($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{$message}}</p>
                    </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-hover" id="whatsappOrdersTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Date</th>
                                    <th>Order No</th>
                                    <th>Customer Name</th>
                                    <th>Grand Total</th>
                                    <th>Shipping Charge</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($whatsapporder as $index => $order)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $order->in_date }}</td>
                                    <td>{{ $order->invoice_no }}</td>
                                    <td>{{ $order->customer->customer_name ?? 'N/A' }}</td>
                                    <td>{{ $order->grand_total }}</td>
                                    <td>{{ $order->shipping_charge }}</td>
                                    <td>
                                        <a href="{{ route('whatsapp-order.view', $order->id) }}" class="btn btn-info btn-sm">View</a>
                                        <a href="{{ route('whatsapp-order.destroy', $order->id) }}" 
                                           class="btn btn-danger btn-sm" 
                                           onclick="return confirm('Are you sure you want to delete this order?')">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Display Number of Entries and Page Number -->
                    <div class="pagination-wrapper">
                        @if($search)
                        <p>Showing {{ $whatsapporder->count() }} of {{ $totalRecords }} entries (Search Results)</p>
                        @else
                        <p>Showing {{ $whatsapporder->count() }} of {{ $totalRecords }} entries</p>
                        @endif

                        <!-- Pagination Links -->
                        {{ $whatsapporder->appends(['search' => $search])->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
@endpush

@endsection

@section('script')
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#whatsappOrdersTable').DataTable({
            "ordering": true,
            "paging": false,  // Disable paging in DataTable since we are using Laravel pagination
            "searching": false,  // Disable searching in DataTable since we already have a search form
            "info": false, // Disable info (like "Showing 1 to 10 of 100 entries")
            "autoWidth": false
        });

        // Clear search field when clicking the clear button
        
         
        $('#clearSearch').on('click', function() {
        $('#search-input').val(''); // Clear the input field
        $('form').submit(); // Trigger the form submission with empty search query
    });
    
    });
</script>
@endsection
