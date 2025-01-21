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
                        <div class="col-6">
                            <h4 class="card-title">Production</h4>
                        </div>
                        <div class="col-6 heading" style="text-align:end;">
                            <!-- Empty div, you can add content here if needed -->
                            <a href="{{ url('production/list') }}" class="backicon"><i class="mdi mdi-backburger"></i></a>
                        </div>
                    </div>
                    
                  <div class="col-xl-12 col-md-12 col-sm-12 col-12">
           
           @if ($errors->any())
           <div class="alert alert-danger">
             <ul>
               @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
               @endforeach
             </ul>
           </div><br />
           @endif
           
         </div>
                    <form class="form-sample" action="{{url('production-store')}}" method="post">
                        {{csrf_field()}}
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
                                    <label class="col-sm-2 col-form-label required">Bom No:</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="bom_no" id="bom_no">
                                            <option value="0">Select Bom No</option>
                                            @foreach($bom as $bm)
                                                <option value="{{ $bm->id }}">{{ $bm->invoice_no }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label required">Quantity:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Quantity" name="quandity" required value="{{old('quandity')}}"  id="mainQuantity"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label required">Pr/ No:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="bom_no" required value="{{ $invoice_no }}" readonly />
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

                                    <li class="nav-item">
                                        <a class="nav-link" id="by-products-tab" data-toggle="tab" href="#labour-cost" role="tab" aria-controls="labour-cost" aria-selected="false">Labour Cost</a>
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
                                                    <th>To Consume</th>
                                                    <th>Actual</th>
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
                                                    <input type="hidden" class="form-control bom_base_quantity" name="bom_base_quantity[]" value="1" style="border:none;">
                                                        <input type="text" class="form-control bom_quantity" name="bom_quantity[]" value="1" readonly>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="bom_actual_quantity[]" value="1" style="border:none;">
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger">Remove</button>
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
                                                    <th>To Consume</th>
                                                    <th>Actual</th>
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
                                                    <input type="hidden" class="form-control by_base_quantity" name="by_base_quantity[]" value="1" style="border:none;">
                                                        <input type="text" class="form-control by_quantity" name="by_quantity[]" value="1" readonly>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="by_actual_quantity[]" value="1" style="border:none;">
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger">Remove</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" id="addByProductRowBtn">Add New Row</button>
                                    </div>

<!-- Labour Cost -->
                                    <div class="tab-pane fade " id="labour-cost" role="tabpanel" aria-labelledby="labour-cost-tab">
                                        <table class="table table-striped mt-3" id="labour-costTable">
                                            <thead>
                                                <tr>
                                                <th>Shift</th>
                                                    <th>No of Labours</th>
                                                    <th>Shift Hours</th>
                                                    <th>Labour Hour Cost</th>
                                                    <th>Labour Cost</th>
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                <td>
                                                        <select class="form-control" name="shift_id" id="shift_id">
                                                            <option value="0">Select shift</option>
                                                            @foreach($shift as $shft)
                                                                <option value="{{ $shft->id }}">{{ $shft->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                <td>
                                                        <input type="text" class="form-control" name="no_of_labourse" id="no_of_labourse">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="shift_hours" id="shift_hours" readonly>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="labor_hour_cost" id="labor_hour_cost" readonly>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="labor_cost" id="labor_cost" readonly>
                                                    </td>
                                                  
                                                </tr>
                                            </tbody>
                                        </table>
                                       
                                    </div>


                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="submitbutton">
                            <button type="submit" class="btn btn-primary mb-2 submit">Submit <i class="fas fa-save"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script>
    $(document).ready(function() {
    $('#product_id').change(function() {
        var productId = $(this).val();
        console.log(productId);
        if(productId != 0) {
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

            $.ajax({
                url: '{{ route("get-product-details", ":productId") }}'.replace(':productId', productId),  // Route to the controller function
         
                method: 'GET',
                success: function(response) {
                    // Clear previous rows
                    $('#componentTable tbody').empty();
                    $('#byProductsTable tbody').empty();

                    // Populate components
                   
                    response.components.forEach(function(component) {
                        $('#componentTable tbody').append(`
                            <tr>
                                <td>
                                    <select class="form-control" name="bom_product_id[]">
                                        <option value="${component.bom_product_id}">${component.product_name}</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-control" name="bom_unit[]">
                                        <option value="${component.bom_unit}">${component.unit_name}</option>
                                    </select>
                                </td>
                                <td>
                                 <input type="hidden" class="form-control bom_base_quantity" name="bom_base_quantity[]" value="${component.base_quandity}" style="border:none;">
                                    <input type="text" class="form-control bom_quantity" name="bom_quantity[]" value="${component.bom_quantity}" style="border:none;">
                                </td>
                                <td>
                            <input type="text" class="form-control" name="bom_actual_quantity[]" value="0" style="border:none;">
                            </td>
                                <td>
                                    <button type="button" class="btn btn-danger">Remove</button>
                                </td>
                            </tr>
                        `);
                    });

                    // Populate by-products
                    response.byProducts.forEach(function(byProduct) {
                        $('#byProductsTable tbody').append(`
                            <tr>
                                <td>
                                    <select class="form-control" name="by_product_id[]">
                                        <option value="${byProduct.by_product_id}">${byProduct.product_name}</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-control" name="by_unit[]">
                                        <option value="${byProduct.by_unit}">${byProduct.unit_name}</option>
                                    </select>
                                </td>
                                <td>
                                 <input type="hidden" class="form-control by_base_quantity" name="by_base_quantity[]" value="${byProduct.base_quandity}" style="border:none;">
                                    <input type="text" class="form-control by_quantity" name="by_quantity[]" value="${byProduct.by_quantity}" style="border:none;">
                                </td>
                                 <td>
                            <input type="text" class="form-control" name="by_actual_quantity[]" value="0" style="border:none;">
                            </td>
                                <td>
                                    <button type="button" class="btn btn-danger">Remove</button>
                                </td>
                            </tr>
                        `);
                    });
                }
            });
        }
    });
    $('#shift_id').change(function() {
        var shiftId = $(this).val();
        if (shiftId != 0) {
            $.ajax({
                url: '{{ route("get-shift-details") }}',
                type: 'GET',
                data: { shift_id: shiftId },
                success: function(response) {
                    // Populate shift hours and labor hour cost
                    $('#shift_hours').val(response.shift_hours);
                    $('#labor_hour_cost').val(response.labor_hour_cost);
                    calculateLaborCost();
                }
            });
        } else {
            $('#shift_hours').val('');
            $('#labor_hour_cost').val('');
            $('#labor_cost').val('');
        }
    });
    $('#no_of_labourse').on('input', function() {
        calculateLaborCost();
    });

    function calculateLaborCost() {
        var shiftHours = parseFloat($('#shift_hours').val()) || 0;
        var laborHourCost = parseFloat($('#labor_hour_cost').val()) || 0;
        var noOfLabors = parseFloat($('#no_of_labourse').val()) || 0;

        var laborCost = shiftHours * laborHourCost * noOfLabors;
        $('#labor_cost').val(laborCost.toFixed(2)); // Update the labor cost field
    }
});

$(document).ready(function() {
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
                  <td>
                    <input type="text" name="bom_actual_quantity[]" class="form-control" value="1" >
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
                 <td>
                    <input type="text" name="by_actual_quantity[]" class="form-control" value="1" >
                </td>
            </tr>
        `;
        $('#byProductsTable tbody').append(newRow);
    });
    document.getElementById('mainQuantity').addEventListener('input', function() {
    // Get the new quantity value
    let quantity = parseFloat(this.value) || 1;  // Default to 1 if empty or invalid

    // Update component quantities
    document.querySelectorAll('.bom_quantity').forEach(function(input) {
        let baseQuantity = parseFloat(input.closest('tr').querySelector('.bom_base_quantity').value) || 1;
        input.value = (quantity * baseQuantity).toFixed(2);
    });

    // Update by-product quantities
    document.querySelectorAll('.by_quantity').forEach(function(input) {
        let baseQuantity = parseFloat(input.closest('tr').querySelector('.by_base_quantity').value) || 1;
        input.value = (quantity * baseQuantity).toFixed(2);
    });
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