@extends('layouts.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    
                     <div class="row">
                    <div class="col-6 col-md-6 col-sm-6 col-xs-12" >
                             <h4 class="card-title">Day Visit Report</h4>
                    </div>
                   
                       
                   
                </div>
                    

 
                 
                  <p class="card-description">
                
                  </p>
                   <!-- Total Visitors -->
                   <table class="table">
    <thead>
        <tr>
            <th>Date</th>
            <th>Total Visits</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($visits as $visit)
            <tr>
                <td>{{ $visit->visit_date }}</td>
                <td>{{ $visit->total }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $visits->links() }}
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

@endsection
