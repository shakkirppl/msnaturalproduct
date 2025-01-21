@extends('layouts.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 col-md-6 col-sm-6 col-xs-12">
                            <h4 class="card-title">UAE</h4>
                        </div>
                    </div>
                    <form class="form-sample" method="GET" action="{{ route('courier-template-uae') }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-4 col-sm-6 col-xs-12 mt-2">
                                <input type="date" id="start_date" name="start_date" class="form-control">
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12 mt-2">
                                <input type="date" id="end_date" name="end_date" class="form-control">
                            </div>
                            <div class="col-md-2 col-sm-6 col-xs-12 mt-2">
                                <div class="submitbutton">
                                    <button type="submit" class="btn btn-primary mb-2 submit">Get</button>
                                    <button type="button" class="btn btn-primary mb-2" id="myexcel" onclick="exportTableToExcel('value-table', 'Collection Report')">
                                        <i class="fa fa-file-excel-o"></i> Export to Excel
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    
                    @if($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif

                    <div class="table-responsive">
                        <table id="value-table" class="table">
                            <thead>
                                <tr>
                                    <th>ShipperRef</th>
                                    <th>Consignee</th>
                                    <th>ConsigneeName</th>
                                    <th>ConsigneeTel1</th>
                                    <th>ConsigneeMob1</th>
                                    <th>Destination</th>
                                    <th>ConsigneeAddress1</th>
                                    <th>ConsigneeAddress2</th>
                                    <th>CODAmt</th>
                                    <th>NoofPieces</th>
                                    <th>Weight</th>
                                    <th>GoodsDesc</th>
                                    <th>SpecialInstruct</th>
                                    <th>ServiceType</th>
                                    <th>ProductType</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($orders as $order)
                                <tr>
                                    <td>{{ $order->ShipperRef ?? 'N/A' }}</td>
                                    <td>{{ $order->Consignee ?? 'N/A' }}</td>
                                    <td>{{ $order->ConsigneeName ?? 'N/A' }}</td>
                                    <td>{{ $order->ConsigneeTel1 ?? 'N/A' }}</td>
                                    <td>{{ $order->ConsigneeMob1 ?? 'N/A' }}</td>
                                    <td>{{ $order->Destination ?? 'N/A' }}</td>
                                    <td>{{ $order->ConsigneeAddress1 ?? 'N/A' }}</td>
                                    <td>{{ $order->ConsigneeAddress2 ?? 'N/A' }}</td>
                                    <td>{{ $order->CODAmt ?? 'N/A' }}</td>
                                    <td>{{ $order->NoofPieces ?? 'N/A' }}</td>
                                    <td>{{ $order->Weight ?? 'N/A' }}</td>
                                    <td>{{ $order->GoodsDesc ?? 'N/A' }}</td>
                                    <td>{{ $order->SpecialInstruct ?? 'N/A' }}</td>
                                    <td>{{ $order->ServiceType ?? 'N/A' }}</td>
                                    <td>{{ $order->ProductType ?? 'N/A' }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="15">No orders found</td>
                                </tr>
                                @endforelse
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
    // Set default date values to today
    document.addEventListener("DOMContentLoaded", function () {
        const today = new Date().toISOString().split("T")[0]; // YYYY-MM-DD format
        document.getElementById("start_date").value = today;
        document.getElementById("end_date").value = today;
    });

    // Export table to Excel using SheetJS
    function exportTableToExcel(tableID, reportName) {
        let table = document.getElementById(tableID);
        let workbook = XLSX.utils.table_to_book(table, { sheet: "Sheet 1" });
        XLSX.writeFile(workbook, `${reportName}.xlsx`);
    }

    // Initialize DataTable
    $(document).ready(function () {
        $('#value-table').DataTable();
    });
</script>
@endsection
