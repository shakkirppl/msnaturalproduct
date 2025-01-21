@extends('layouts.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    
                     <div class="row">
                    <div class="col-6 col-md-6 col-sm-6 col-xs-12" >
                             <h4 class="card-title">Analytics</h4>
                    </div>
                   
                       
                   
                </div>
                    

 
                 
                  <p class="card-description">
                
                  </p>
                   <!-- Total Visitors -->
    <h3>Total Visitors: {{ $visitors->count() }}</h3>

<!-- Country-wise Visitors -->
<h4>Visitors by Country</h4>
<canvas id="countryChart" width="400" height="200"></canvas>

<!-- City-wise Visitors -->
<h4>Visitors by City</h4>
<canvas id="cityChart" width="400" height="200"></canvas>

<!-- Visitors by Date -->
<h4>Visitors in the Last 7 Days</h4>
<canvas id="dateChart" width="400" height="200"></canvas>
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
        // Country Chart
        var ctxCountry = document.getElementById('countryChart').getContext('2d');
        var countryChart = new Chart(ctxCountry, {
            type: 'bar',
            data: {
                labels: {!! json_encode($countryData->keys()) !!},
                datasets: [{
                    label: 'Visitors by Country',
                    data: {!! json_encode($countryData->values()) !!},
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            }
        });

        // City Chart
        var ctxCity = document.getElementById('cityChart').getContext('2d');
        var cityChart = new Chart(ctxCity, {
            type: 'pie',
            data: {
                labels: {!! json_encode($cityData->keys()) !!},
                datasets: [{
                    label: 'Visitors by City',
                    data: {!! json_encode($cityData->values()) !!},
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(153, 102, 255, 0.6)'
                    ]
                }]
            }
        });

        // Date Chart
        var ctxDate = document.getElementById('dateChart').getContext('2d');
        var dateChart = new Chart(ctxDate, {
            type: 'line',
            data: {
                labels: {!! json_encode($dateData->pluck('date')) !!},
                datasets: [{
                    label: 'Visitors in the Last 7 Days',
                    data: {!! json_encode($dateData->pluck('count')) !!},
                    backgroundColor: 'rgba(255, 159, 64, 0.6)',
                    borderColor: 'rgba(255, 159, 64, 1)',
                    borderWidth: 1
                }]
            }
        });
    </script>
@endsection
