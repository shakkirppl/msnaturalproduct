@extends('layouts.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    
                     <div class="row">
                    <div class="col-6 col-md-6 col-sm-6 col-xs-12" >
                             <h4 class="card-title">Date Wise Visit Report</h4>
                    </div>
                   
                    <form method="GET" action="{{ route('reports.date-wise-visit') }}">
    <div class="row mb-3">
        <div class="col-md-4">
            <input type="date" name="from_date" class="form-control" value="{{ request('from_date') }}">
        </div>
        <div class="col-md-4">
            <input type="date" name="to_date" class="form-control" value="{{ request('to_date') }}">
        </div>
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary">Filter</button>
        </div>
    </div>
</form>
                   
                </div>
                    

 
                 
                  <p class="card-description">
                
                  </p>
                   <!-- Total Visitors -->
                   <table class="table">
    <thead>
        <tr>

            
            <th>IP Address</th>
            <th>CountryCode</th>
            <th>CountryName</th>
            <th>RegionCode</th>
            <th>RegionName</th>
            <th>CityName</th>
            <th>ZipCode</th>
            <th>Visited At</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($visits as $visit)
            <tr>
                <td>{{ $visit->ip }}</td>
                <td>{{ $visit->countryCode }}</td>
                <td>{{ $visit->countryName }}</td>
                <td>{{ $visit->regionCode }}</td>
                <td>{{ $visit->regionName }}</td>
                <td>{{ $visit->cityName }}</td>
                <td>{{ $visit->zipCode }}</td>
                <td>{{ $visit->created_at }}</td>
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
