@extends('layouts.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    
                     <div class="row">
                    <div class="col-6 col-md-6 col-sm-6 col-xs-12" >
                             <h4 class="card-title">Order Dashboard</h4>
                    </div>
                    <div class="col-6 col-md-6 col-sm-6 col-xs-12  heading" style="text-align:end;">
                  
                    </div>

                   
                </div>
                <div class="row">
        <!-- All Orders Count -->
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5>Today's Orders</h5>
                    <h3>{{ $todayOrders }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h5>This Week's Orders</h5>
                    <h3>{{ $weekOrders }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <h5>This Month's Orders</h5>
                    <h3>{{ $monthOrders }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5>Total Orders</h5>
                    <h3>{{ $totalOrders }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Orders -->
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card bg-danger text-white">
                <div class="card-body">
                    <h5>Pending Orders</h5>
                    <h3>{{ $pendingOrders }}</h3>
                </div>
            </div>
        </div>

        <!-- WhatsApp Orders -->
        <div class="col-md-6">
            <div class="card bg-dark text-white">
                <div class="card-body">
                    <h5>WhatsApp Orders</h5>
                    <h3>{{ $whatsappOrders }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Country Wise Order Counts -->
    <h4 class="mt-4">Country Wise Orders</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Country</th>
                <th>Total Orders</th>
            </tr>
        </thead>
        <tbody>
            @foreach($countryWiseOrders as $order)
            <tr>
                <td>{{ $order->country->country_name ?? 'N/A' }}</td>
                <td>{{ $order->total_orders }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Country Wise Pending Orders -->
    <h4 class="mt-4">Country Wise Pending Orders</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Country</th>
                <th>Pending Orders</th>
            </tr>
        </thead>
        <tbody>
            @foreach($countryWisePendingOrders as $order)
            <tr>
                <td>{{ $order->country->country_name ?? 'N/A' }}</td>
                <td>{{ $order->pending_orders }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
 
                 
                 

                </div>
              </div>
            </div>
            </div>
            </div>
            
@endsection
@section('script')
<script>
    $(document).ready( function () {
    $('#value-table').DataTable();
} );
</script>
<script>
    // function exportTableToExcel(tableID, filename = 'invoice-report.xlsx') {
    //     let table = document.getElementById(tableID);
    //     let workbook = XLSX.utils.table_to_book(table, { sheet: "Sheet 1" });
    //     XLSX.writeFile(workbook, filename);
    // }
    function exportTableToExcel(tableID, reportName) {
    // Get the table element by ID
    let table = document.getElementById(tableID);

    // Clone the table to avoid altering the original table in the DOM
    let clonedTable = table.cloneNode(true);

    // Find the "Action" column index by matching the header text
    let actionColIndex = -1;
    const headerCells = clonedTable.rows[0].cells;

    for (let i = 0; i < headerCells.length; i++) {
        if (headerCells[i].innerText.trim().toLowerCase() === 'action') {
            actionColIndex = i;
            break;
        }
    }

    // Remove the "Action" column if it exists
    if (actionColIndex !== -1) {
        for (let row of clonedTable.rows) {
            if (actionColIndex < row.cells.length) {
                row.deleteCell(actionColIndex);
            }
        }
    } else {
        console.warn("Action column not found. No column removed.");
    }

    // Style headers and right-align "Total" and "Grand Total" columns
    for (let header of clonedTable.rows[0].cells) {
        header.style.fontWeight = 'bold'; // Make headers bold
    }

    // Iterate over rows to style the "Total" and "Grand Total" cells
    for (let row of clonedTable.rows) {
        for (let cell of row.cells) {
            // Align "Total" and "Grand Total" cells to the right and bold them
            if (cell.innerText.toLowerCase().includes('total') || cell.innerText.toLowerCase().includes('grand total')) {
                cell.style.textAlign = 'right'; // Align text to the right
                cell.style.fontWeight = 'bold'; // Make bold
            }
        }
    }

    // Convert the styled cloned table to a workbook
    let workbook = XLSX.utils.table_to_book(clonedTable, { sheet: "Sheet 1" });

    // Use the report name as the filename for the Excel file
    XLSX.writeFile(workbook, `${reportName}.xlsx`);
}

    </script>
@endsection
