@extends('layouts.layout') 
@section('content') 

<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-12 grid-margin createtable">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add New Customer</h4>
                    <div class="col-6 col-md-12 col-sm-6 col-xs-12 heading" style="text-align:end;">
                            <a href="{{ url('whatsapp-order/list') }}" class="backicon">
                                <i class="mdi mdi-backburger"></i>
                            </a>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <!-- Customer Form -->
                    <form action="{{ route('whatsapp-customer.store') }}" method="POST">
                        @csrf

                        <!-- Customer Name -->
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Customer Name:</label>
                            <div class="col-sm-10">
                                <input type="text" name="customer_name" class="form-control" placeholder="Enter customer name" required>
                            </div>
                        </div>
                  <!-- Phone Number -->
                  <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Phone Number:</label>
                            <div class="col-sm-10">
                                <input type="text" name="phone_number" class="form-control" placeholder="Enter Phone Number" required>
                            </div>
                        </div>
                        <!-- Country Dropdown -->
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Country:</label>
                            <div class="col-sm-10">
                                <select name="country_id" id="country_id" class="form-control" required>
                                    <option value="">Select Country</option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- State Dropdown -->
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">State:</label>
                            <div class="col-sm-10">
                                <select name="state" id="state" class="form-control" id="state">
                                    <option value="">Select State</option>
                                    @foreach($states as $state)
                                        <option value="{{ $state->id }}">{{ $state->state_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- City -->
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">City:</label>
                            <div class="col-sm-10">
                                <input type="text" name="city" class="form-control" placeholder="Enter city">
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Address:</label>
                            <div class="col-sm-10">
                               
                            <textarea name="address" class="form-control"></textarea>

                            </div>
                        </div>

                        <!-- Pincode -->
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Pincode:</label>
                            <div class="col-sm-10">
                                <input type="number" name="pincode" class="form-control" placeholder="Enter pincode">
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@endpush

@endsection


@section('script')
<!-- Include jQuery and Select2 JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>



<script>
$(document).ready(function () {

   

    // Initialize Select2 for the state dropdown
    $('select[name="state"]').select2({
        placeholder: 'Select State',
        allowClear: true
    });

    // Handle country change event to fetch states dynamically
    $('select[name="country_id"]').on('change', function () {
    var countryId = $(this).val();
    if (countryId) {
        $.ajax({
            url: "{{ url('/get-states') }}/" + countryId,
            type: "GET",
            dataType: "json",
            success: function (data) {
                var stateDropdown = $('select[name="state"]');
                stateDropdown.empty();
                stateDropdown.append('<option value="">Select State</option>');

                // Loop through states and append them
                $.each(data.states, function (key, value) {
                    stateDropdown.append('<option value="' + value.id + '">' + value.state_name + '</option>');
                });

                // Reinitialize Select2 after updating the dropdown (if using Select2)
                stateDropdown.trigger('change');
            },
            error: function (xhr, status, error) {
                console.error("Error fetching states:", error);
            }
        });
    } else {
        $('select[name="state"]').empty().trigger('change');
    }
});

});
</script>
@endsection
