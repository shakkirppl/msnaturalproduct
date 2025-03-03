@extends('layouts.layout')

@section('content')
<style>
.large-button {
    font-size: 40px !important;  /* Force the font size */
    padding: 12px 20px !important; /* Increase padding */
    display: inline-block !important;
}

    </style>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 col-md-6 col-sm-6 col-xs-12">
                            <h4 class="card-title">WhatsApp Customers</h4>
                            <a href="{{ route('whatsapp-customer.add_customer') }}"  class="newicon large-button"><i class="mdi mdi-new-box"></i></a>
                        </div>
                        <div class="col-6 col-md-6 col-sm-6 col-xs-12 heading" style="text-align:end;">
                           
                        </div>
                    </div>

                    <!-- Search Box -->
                    <div class="search-box" style="position: absolute; top: 20px; right: 50px; width: 250px;">
                        <form method="GET" action="{{ route('whatsapp-customers') }}" class="d-flex">
                            <div class="input-group">
                            <input type="text" name="search" id="search-input" class="form-control form-control-sm" placeholder="Search..." value="{{ $search ?? '' }}">
                            <div class="input-group-append">
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
                        <p>{{ $message }}</p>
                    </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-hover" id="value-table">
                            <thead>
                                <tr> 
                                    <th>NO</th>
                                    <th>Customer Name</th>
                                    <th>Country</th>
                                    <th>State</th>
                                    <th>City</th>
                                    <th>Address</th>
                                    <th>Pincode</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                <tr>
                                    <td>{{ $customer->id }}</td>
                                    <td>{{ $customer->customer_name }}</td>
                                    <td>{{ $customer->countries->country_name }}</td>
                                    <td>{{ $customer->StatesModel->state_name }}</td>
                                    <td>{{ $customer->city }}</td>
                                    <td>{{ $customer->address }}</td>
                                    <td>{{ $customer->pincode }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination Links -->
                    <div class="pagination-wrapper">
                    @if($search)
                        <p>Showing {{ $customers->count() }} of {{ $totalEntries }} entries (Search Results)</p>
                        @else
                        <p>Showing {{ $customers->count() }} of {{ $totalEntries }} entries</p>
                        @endif
                        {{ $customers->appends(['search' => $search])->links('pagination::bootstrap-4') }}
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#value-table').DataTable({
            "ordering": true,
            "paging": false,  // Disable paging in DataTable
            "searching": false,  // Enable searching
            "info": false,
            "autoWidth": false,
            "language": {
                "info": "Showing _START_ to _END_ of {{ $totalEntries }} entries"
            }
        });
        $('#clearSearch').on('click', function() {
        $('#search-input').val(''); // Clear the input field
        $('form').submit(); // Trigger the form submission with empty search query
    });

        
    });
</script>
@endsection
