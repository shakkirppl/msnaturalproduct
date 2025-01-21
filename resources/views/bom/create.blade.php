@extends('layouts.layout')
@section('content')
<style>
/* Remove the borders from input fields */
/* input.form-control {
    border: none !important;
    box-shadow: none !important;
} */

/* Adjust spacing between table rows */
#componentTable tbody tr {
    line-height: 1.2em;
    margin-bottom: 0.3em;
}

</style>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-12 grid-margin createtable">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 col-md-6 col-sm-6 col-xs-12">
                            <h4 class="card-title">Bill of Materials</h4>
                        </div>
                        <div class="col-6 col-md-6 col-sm-6 col-xs-12 heading" style="text-align:end;">
                        <a href="{{ url('bom/list') }}" class="backicon"><i class="mdi mdi-backburger"></i></a>
                    </div>
                    </div>

                    <form class="form-sample" action="{{ url('bom-store') }}" method="post">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label required">Product:</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="product_id" id="product_id" style="border: none;">
                                            <option value="0">Select Product</option>
                                            @foreach($products as $product)
                                                <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label required">Unit:</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="unit" id="unit" style="border: none;">
                                            <option value="0">Select Unit</option>
                                           
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label required">Quantity:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Quantity" name="quantity" required="true" value="{{ old('quantity') }}" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Quantity -->
                        <div class="row">
                       
                        </div>

                        <!-- Work Center -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label required">Work Center:</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="work_center" id="work_center">
                                            <option value="0">Select Work Center</option>
                                            @foreach($workCenter as $center)
                                                <option value="{{ $center->id }}">{{ $center->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label required">BOM No:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control"  name="bom_no" required="true" value="{{ $invoice_no }}" readonly />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tabs for Components and By-products -->
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="components-tab" data-toggle="tab" href="#components" role="tab" aria-controls="components" aria-selected="true">Components</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="by-products-tab" data-toggle="tab" href="#by-products" role="tab" aria-controls="by-products" aria-selected="false">By-products</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <!-- Components Tab -->
                                    <div class="tab-pane fade show active" id="components" role="tabpanel" aria-labelledby="components-tab">
                                        <table class="table table-striped mt-3" id="componentTable">
                                            <thead>
                                                <tr>
                                                    <th>Component</th>
                                                    <th>Unit</th>
                                                    <th>Quantity</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <select class="form-control" name="bom_product_id[]">
                                                            <option value="0">Select Product</option>
                                                            @foreach($products as $product)
                                                                <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select class="form-control" name="bom_unit[]">
                                                            <option value="">Select Unit</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="bom_quantity[]" value="1" style="border:none;">
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger remove-row">Remove</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" id="addComponentRowBtn">Add New Row</button>
                                    </div>

                                    <!-- By-products Tab -->
                                    <div class="tab-pane fade" id="by-products" role="tabpanel" aria-labelledby="by-products-tab">
                                        <table class="table table-striped mt-3" id="byProductsTable">
                                            <thead>
                                                <tr>
                                                    <th>By-products</th>
                                                    <th>Unit</th>
                                                    <th>Quantity</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <select class="form-control" name="by_product_id[]">
                                                            <option value="0">Select Product</option>
                                                            @foreach($products as $product)
                                                                <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select class="form-control" name="by_unit[]">
                                                            <option value="">Select Unit</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="by_quantity[]" value="1" style="border:none;">
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger remove-row">Remove</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" id="addByProductRowBtn">Add New Row</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="submitbutton">
                            <button type="submit" class="btn btn-primary mb-2 submit">Submit <i class="fas fa-save"></i></button>
                        </div>
                    </form>
               
@endsection
@section('script')
<script>
$(document).ready(function() {
    $('#product_id').change(function() {
        var productId = $(this).val();
        
        if (productId != 0) {
            $.ajax({
                url: '{{ route("get-units", ":productId") }}'.replace(':productId', productId),
                type: 'GET',
                success: function(data) {
                    // Clear the units dropdown
                    $('#unit').empty();
                    $('#unit').append('<option value="0">Select Unit</option>');
                    
                    // Populate the units dropdown
                    $.each(data.units, function(index, unit) {
                        $('#unit').append('<option value="' + unit.id + '">' + unit.size + '</option>');
                    });
                },
                error: function(xhr) {
                    console.error(xhr);
                }
            });
        } else {
            // Clear the units dropdown if no product is selected
            $('#unit').empty();
            $('#unit').append('<option value="0">Select Unit</option>');
        }
    });

    $('#componentTable').on('change', 'select[name="bom_product_id[]"]', function() {
        let productId = $(this).val();
        let row = $(this).closest('tr');

        // Clear the Unit dropdown
        row.find('select[name="bom_unit[]"]').html('<option value="">Select Unit</option>');

        if (productId) {
            // AJAX request to fetch units based on the selected product
            $.ajax({
                url: '{{ route("get-units", ":productId") }}'.replace(':productId', productId),  // Route to the controller function
                type: 'GET',
                success: function(response) {
                    if (response.units.length > 0) {
                        response.units.forEach(function(unit) {
                            row.find('select[name="bom_unit[]"]').append(`<option value="${unit.id}">${unit.size}</option>`);
                        });
                    }
                },
                error: function() {
                    alert('Failed to load units.');
                }
            });
        }
    });

    // Add new row functionality
    $('#addComponentRowBtn').on('click', function() {
        let newRow = `
            <tr>
                <td>
                    <select class="form-control" name="bom_product_id[]">
                        <option value="0">Select Product</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select class="form-control" name="bom_unit[]">
                        <option value="">Select Unit</option>
                    </select>
                </td>
                <td>
                    <input type="text" name="bom_quantity[]" class="form-control" value="1" >
                </td>
            </tr>
        `;
        $('#componentTable tbody').append(newRow);
    });
});

</script>
<script>
$(document).ready(function() {
    $('#byProductsTable').on('change', 'select[name="by_product_id[]"]', function() {
        let productId = $(this).val();
        let row = $(this).closest('tr');

        // Clear the Unit dropdown
        row.find('select[name="by_unit[]"]').html('<option value="">Select Unit</option>');

        if (productId) {
            // AJAX request to fetch units based on the selected product
            $.ajax({
                url: '{{ route("get-units", ":productId") }}'.replace(':productId', productId),  // Route to the controller function
                type: 'GET',
                success: function(response) {
                    if (response.units.length > 0) {
                        response.units.forEach(function(unit) {
                            row.find('select[name="by_unit[]"]').append(`<option value="${unit.id}">${unit.size}</option>`);
                        });
                    }
                },
                error: function() {
                    alert('Failed to load units.');
                }
            });
        }
    });

    // Add new row functionality
    $('#addByProductRowBtn').on('click', function() {
        let newRow = `
            <tr>
                <td>
                    <select class="form-control" name="by_product_id[]">
                        <option value="0">Select Product</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select class="form-control" name="by_unit[]">
                        <option value="">Select Unit</option>
                    </select>
                </td>
                <td>
                    <input type="text" name="by_quantity[]" class="form-control" value="1" >
                </td>
            </tr>
        `;
        $('#byProductsTable tbody').append(newRow);
    });
});

</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('select[name="bom_product_id[]"]').select2({
            placeholder: 'Select a product',
            allowClear: true
        });
    });
</script>
@endsection