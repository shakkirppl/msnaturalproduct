@extends('layouts.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    
                     <div class="row">
                    <div class="col-6 col-md-6 col-sm-6 col-xs-12" >
                             <h4 class="card-title">BOM</h4>
                    </div>
                    <div class="col-6 col-md-6 col-sm-6 col-xs-12  heading" style="text-align:end;">
                    <a href="{{ route('bom/create') }}" class="newicon"><i class="mdi mdi-new-box"></i></a>
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
                    <table class="table table-hover" id="value-table">
                      <thead>
                        <tr>
                   
                          <th>Date</th>
                          <th>BOM No</th>
                          <th>Product</th>
                          <th>Work Center</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      @if(count($bom))
                        @foreach($bom as $key=>$bm)
                        <tr>
                         
                            <td class="name">{{$bm->in_date}}</td>
                            <td class="name">{{$bm->invoice_no}}</td>
                            <td>@foreach($bm->products as $poduct){{$poduct->product_name}} @endforeach</td>
                            <td>@foreach($bm->workCenter as $center){{$center->name}} @endforeach</td>
                            <td>
                              <!-- <form action="" method="post"> -->
                            <a class="btn btnsmall btn-outline-secondary btn-icon-text" href="{{ url('bom.view',$bm->id) }}"> View</a>
                            <!-- @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                              </form> -->

                            </td>
                      </tr>
                        @endforeach
                        @else
                        <tr><td colspan="2">Sorry, No Records found!</td></tr>
                        @endif
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
<!-- <script>
    $(document).ready( function () {
    $('#value-table').DataTable();
} );
</script> -->
<!-- <script>
    $(document).ready(function () {
        var t = $('#value-table').DataTable({
            "columnDefs": [{
                "searchable": false,
                "orderable": false,
                "targets": 0 // target the first column for serial numbers
            }],
            "order": [[1, 'asc']], // order by the second column (Code)
        });

        // Add serial number index in the first column
        t.on('order.dt search.dt', function () {
            t.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();
    });
</script> -->
@endsection
