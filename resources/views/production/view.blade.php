@extends('layouts.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    
                     <div class="row">
                    <div class="col-6 col-md-6 col-sm-6 col-xs-12" >
                             <h4 class="card-title">Production</h4>
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
                  Components
                  </p>
                  <div class="table-responsive">
                    <table class="table table-hover" id="value-table">
                      <thead>
                        <tr>
                   
                          <th>Components</th>
                          <th>Unit</th>
                          <th>Actual Quantity</th>
                        </tr>
                      </thead>
                      <tbody>
                  
                        @foreach($bom->detail as $key=>$bm)
                        <tr>
                         
                            <td class="name">{{$bm->producName}}</td>
                            <td class="name">{{$bm->unit}}</td>
                            <td>{{$bm->bom_actual_quantity}}</td>
                           
                      </tr>
                        @endforeach
               
                      </tbody>
                    </table>
                  </div>
<hr>
<br>
                  <p class="card-description">
                  By-products
                  </p>
                  <div class="table-responsive">
                    <table class="table table-hover" id="value-table">
                      <thead>
                        <tr>
                   
                          <th>By-products</th>
                          <th>Unit</th>
                          <th>Actual Quantity</th>
                        </tr>
                      </thead>
                      <tbody>
                  
                        @foreach($bom->bydetail as $key=>$bm)
                        <tr>
                         
                            <td class="name">{{$bm->producName}}</td>
                            <td class="name">{{$bm->unit}}</td>
                            <td>{{$bm->by_actual_quantity}}</td>
                           
                      </tr>
                        @endforeach
               
                      </tbody>
                    </table>
                  </div>

                  <hr>
<br>
                  <p class="card-description">
                  Labours
                  </p>
                  <div class="table-responsive">
                    <table class="table table-hover" id="value-table">
                      <thead>
                        <tr>
                   
                          <th>No Of Labour</th>
                          <th>Shift</th>
                          <th>Shift Hour</th>
                          <th>Labour Hour Cost</th>
                          <th>Labour Cost</th>
                        </tr>
                      </thead>
                      <tbody>
                  
                        
                        <tr>
                         
                            <td class="name">{{$bom->no_of_labourse}}</td>
                            <td class="name">@foreach($bom->shift as $shif){{$shif->name}}  @endforeach</td>
                            <td class="name">{{$bom->shift_hours}}</td>
                            <td class="name">{{$bom->labor_hour_cost}}</td>
                            <td class="name">{{$bom->labor_cost}}</td>
      
                           
                      </tr>
                      
               
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
