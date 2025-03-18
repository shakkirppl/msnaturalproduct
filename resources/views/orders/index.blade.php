@extends('layouts.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    
                     <div class="row">
                    <div class="col-6 col-md-6 col-sm-6 col-xs-12" >
                             <h4 class="card-title">Orders List</h4>
                    </div>
                    <div class="col-6 col-md-6 col-sm-6 col-xs-12  heading" style="text-align:end;">
                  
                    </div>
                    <div class="d-flex justify-content-end">
    <button type="button" class="btn btn-primary mb-2" id="myexel" target="_blank" onclick="exportTableToExcel('value-table', 'Order Report')">
        <i class="fa fa-file-excel-o"></i> Export
    </button>
</div>
                   
                </div>
                    
@if($message = Session::get('success'))
<div class="alert alert-sucess">
  <p>{{$message}}</p>
</div>
@endif
 
                 
                  <p class="card-description">
                
                  </p>
                  <div class="table-responsive">
              
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
                    <td><label class="badge badge-info">{{ $order->delivery_status}}</label></td>
                    <td>{{ \Carbon\Carbon::parse($order->date)->format('d-m-Y') }}</td>
                    <td>{{ $order->order_no}}</td>
                    <td>{{ $order->first_name }} {{$order->last_name}}</td>
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
