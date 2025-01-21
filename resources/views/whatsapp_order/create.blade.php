@extends('layouts.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-12 grid-margin createtable">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 col-md-6 col-sm-6 col-xs-12">
                            <h4 class="card-title">Whatsapp Orders</h4>
                        </div>
                        <div class="col-6 col-md-6 col-sm-6 col-xs-12 heading" style="text-align:end;">
                            <a href="{{ url('whatsapp-order/list') }}" class="backicon">
                                <i class="mdi mdi-backburger"></i>
                            </a>
                       </div>
                    </div>
                    <!-- 
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                    @endif -->
                    <form class="form-sample" action="{{ route('whatsapp.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group row align-items-center">
                                <label class="col-sm-2 col-form-label required">Customer Name:</label>
                                     <div class="col-sm-8 d-flex">
                                             <select class="form-control" name="customer_id" id="customer_id" style="border: none;">
                                                    <option value="0">Select Customer</option>
                                                      @foreach($whatsapp_customers as $customer)
                                                       <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
                                                      @endforeach
                                               </select>
                                               <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#addCustomerModal" style="text-decoration: none; color: blue; margin-left: 10px; align-self:center;">
                                                  <i class="fas fa-plus" style="cursor: pointer;"></i>
                                               </a>
                             </div>
                           </div>
                        </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label required">Date:</label>
                                    <div class="col-sm-9">
                                        <input type="date" name="in_date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label required">Phone No:</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" placeholder="Phone Number" name="whatsapp_no" required="" value="" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label required">Total Amount:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="total" required="true" value="0.00" readonly />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label required">Shipping Charge:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="shipping_charge" required="true" value="0.00" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label required">Grand Total</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="grand_total" value="" readonly />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label required">Order No:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="invoice_no" value="{{ $invoice_no }}" readonly />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped mt-3" id="productTable">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Unit</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <select class="form-control" name="product_id[]">
                                                    <option value="0">Select Product</option>
                                                    @foreach($products as $product)
                                                        <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control product_size_id" name="product_size_id[]">
                                                    <option value="">Select Unit</option>
                                                    @foreach($productsizes as $size)
                                                        <option value="{{ $size->id }}">{{ $size->size }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="quantity[]" value="1" style="border:none;">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="price[]" value="0.00">
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger remove-row">Remove</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                               
                                <button type="button" class="btn btn-primary mt-3 mb-3" id="addproductRowBtn">Add New Row</button>
    </div>
</div>

<div class="submitbutton">
    <button type="submit" class="btn btn-primary mb-2 submit">Submit <i class="fas fa-save"></i></button>
</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="addCustomerModal" tabindex="-1" aria-labelledby="addCustomerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCustomerModalLabel">Add New Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="addCustomerForm">
                    @csrf
                    <div class="mb-3">
                        <label for="customerName" class="form-label">Customer Name</label>
                        <input type="text" class="form-control" id="customerName" name="customer_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="country" class="form-label">Country</label>
                        <select name="country_id" class="form-control" required>
            <option value="">Select Country</option>
            @foreach($countries as $country)
                <option value="{{ $country->id }}">{{ $country->country_name }}</option>
            @endforeach
        </select>
                    </div>
                    <div class="mb-3">
                            <label for="state" class="form-label" >State</label>
                            <select name="state" class="form-control" id="state">
                                    <option value="">Select State</option>
                                    @foreach($states as $state)
                                        <option value="{{ $state->id }}">{{ $state->state_name }}</option>
                                    @endforeach
                                </select>
                        </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" id="city" name="city">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea id="address" name="address" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="pincode" class="form-label">Pincode</label>
                        <input type="number" class="form-control" id="pincode" name="pincode">
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@endpush
               
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>


<script>
    $(document).ready(function() {

        $('select[name="country_id"]').select2({
        placeholder: 'Select Country',
        allowClear: true,
        dropdownParent: $('#addCustomerModal'),
        width: '100%'
    });

    // Initialize Select2 for the state dropdown
    $('select[name="state"]').select2({
        placeholder: 'Select State',
        allowClear: true,
        dropdownParent: $('#addCustomerModal'),
        width: '100%'
    });

    $('select[name="customer_id"]').select2({
        placeholder: 'Select a Customer',
        allowClear: true
    });
    

   


        $(document).on('change', 'select[name="product_id[]"]', function () {
    const productId = $(this).val();
    const row = $(this).closest('tr');

    const productsWithoutSizes = [3, 4, 5, 6]; // Replace with actual IDs
    if (productsWithoutSizes.includes(parseInt(productId))) {
        row.find('select[name="product_size_id[]"]').hide(); // Hide size dropdown
        fetchPrice(productId, null, row); // Fetch price without size
    } else {
        row.find('select[name="product_size_id[]"]').show(); // Show size dropdown
    }
});

function fetchPrice(productId, sizeId, row) {
    $.ajax({
        url: '{{ url("get-price") }}',
        type: 'GET',
        data: { product_id: productId, product_size_id: sizeId },
        success: function (response) {
            const price = parseFloat(response.price || '0.00');
            row.find('input[name="price[]"]').val(price.toFixed(2));
            row.find('input[name="price[]"]').data('unit-price', price); // Set unit price for total calculation

            const quantity = parseFloat(row.find('input[name="quantity[]"]').val()) || 1;
            const totalPrice = price * quantity;
            row.find('input[name="price[]"]').val(totalPrice.toFixed(2)); // Update total for the row

            updateTotalAmount(); // Recalculate total and grand total
        },
        error: function () {
            alert('Error fetching price');
        }
    });
}






        function updateTotalAmount() {
            let total = 0;
            $('input[name="price[]"]').each(function() {
                const price = parseFloat($(this).val()) || 0;
                total += price;
            });
            $('input[name="total"]').val(total.toFixed(2));
            updateGrandTotal(); // Update grand total whenever total is updated
        }

        function updateGrandTotal() {
            const total = parseFloat($('input[name="total"]').val()) || 0;
            const shippingCharge = parseFloat($('input[name="shipping_charge"]').val()) || 0;
            const grandTotal = total + shippingCharge;
            $('input[name="grand_total"]').val(grandTotal.toFixed(2));
        }

        // Handle shipping charge change
        $('input[name="shipping_charge"]').on('input', function() {
            updateGrandTotal();
        });

        $(document).on('change', 'select[name="product_id[]"]', function () {
        const productId = $(this).val(); // Selected product ID
        const row = $(this).closest('tr'); // Current table row

        if (productId) {
            $.ajax({
                url: '{{ url("get-product-sizes") }}', // Route to fetch sizes
                type: 'GET',
                data: { product_id: productId },
                success: function (response) {
                    const productSizeDropdown = row.find('select[name="product_size_id[]"]');
                    productSizeDropdown.empty(); // Clear existing options

                    if (response.sizes.length > 0) {
                        productSizeDropdown.append('<option value="">Select Unit</option>');
                        $.each(response.sizes, function (key, size) {
                            productSizeDropdown.append(
                                `<option value="${size.id}">${size.size}</option>`
                            );
                        });
                    } else {
                        productSizeDropdown.append(
                            '<option value="">No Sizes Available</option>'
                        );
                    }
                },
                error: function () {
                    alert('Failed to fetch sizes.');
                },
            });
        } else {
            row.find('select[name="product_size_id[]"]').empty().append(
                '<option value="">Select Unit</option>'
            );
        }
    });
        

        // Handle unit change to fetch price
        $(document).on('change', '.product_size_id', function() {
            const sizeId = $(this).val();
            const row = $(this).closest('tr');
            const productId = row.find('select[name="product_id[]"]').val();

            if (sizeId && productId) {
                const url = '{{url('get-price')}}';
                const data = { product_id: productId, product_size_id: sizeId };

                $.ajax({
                    url: url,
                    type: 'get',
                    data: data,
                    success: function(response) {
                        const price = response.price || '0.00';
                        row.find('input[name="price[]"]').data('unit-price', price); // Store unit price
                        const quantity = parseFloat(row.find('input[name="quantity[]"]').val()) || 0;
                        row.find('input[name="price[]"]').val((price * quantity).toFixed(2));
                    
                        updateTotalAmount();
                    },
                    error: function(error) {
                        console.error(error);
                        alert('Something went wrong!');
                    }
                });
            } else {
                alert('Please select a product first.');
            }
        });

        // Handle quantity change to update price and total amount
        $(document).on('input', 'input[name="quantity[]"]', function() {
            const row = $(this).closest('tr');
            const quantity = parseFloat($(this).val()) || 0;
            const unitPrice = parseFloat(row.find('input[name="price[]"]').data('unit-price')) || 0;

            // Update total price for the row
            row.find('input[name="price[]"]').val((quantity * unitPrice).toFixed(2));
            updateTotalAmount();
        });

        // Add new row functionality
        $('#addproductRowBtn').on('click', function () {
        const newRow = `
           <tr>
                <td>
                    <select class="form-control" name="product_id[]">
                        <option value="0">Select Product</option>
                        @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select class="form-control product_size_id" name="product_size_id[]">
                        <option value="">Select Unit</option>
                        @foreach($productsizes as $size)
                        <option value="{{ $size->id }}">{{ $size->size }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="text" class="form-control" name="quantity[]" value="1" style="border:none;">
                </td>
                <td>
                    <input type="number" class="form-control" name="price[]" value="0.00">
                </td>
                <td>
                    <button type="button" class="btn btn-danger remove-row">Remove</button>
                </td>
            </tr>`;
        $('#productTable tbody').append(newRow);
    
});


        // Remove row functionality
        $(document).on('click', '.remove-row', function() {
            $(this).closest('tr').remove();
            updateTotalAmount();
        });

        // Initial calculation on page load (optional, for existing rows)
        updateTotalAmount();
    });

    $(document).ready(function() {
        // Set the in_date input field to the current date
        function setCurrentDate() {
            const today = new Date();
            const formattedDate = today.toISOString().split('T')[0]; // Format as YYYY-MM-DD
            $('input[name="in_date"]').val(formattedDate);
        }

        // Call the function to set the date on page load
        setCurrentDate();

        // Other existing scripts here...
    });



    document.getElementById('addCustomerForm').addEventListener('submit', function (e) {
    e.preventDefault(); // Prevent the default form submission

    let formData = new FormData(this);

    fetch('{{ route("whatsapp-customer.store") }}', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Close the modal without refreshing the page
            let modal = bootstrap.Modal.getInstance(document.getElementById('addCustomerModal'));
            modal.hide(); // Close the modal

            // Optionally, reset the form here if you want it cleared
            document.getElementById('addCustomerForm').reset();

            // You can also trigger any additional success behavior, like updating the UI with the new customer data
            alert('Customer created successfully!');
        } 
    })
   
});










   
</script>




@endsection

