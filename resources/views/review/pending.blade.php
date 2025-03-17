@extends('layouts.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    
                     <div class="row">
                    <div class="col-6 col-md-6 col-sm-6 col-xs-12" >
                             <h4 class="card-title">Pending</h4>
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
                  <table class="table table-bordered">
        <thead>
            <tr>
                <th>Product</th>
                <th>User</th>
                <th>Country</th>
                <th>Comment</th>
                <th>Rating</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($review as $revie)
                <tr>
                    <td> @foreach ($revie->product as $revi) {{ $revi->product_name }} @endforeach</td>
                    <td>@foreach ($revie->user as $revi) {{ $revi->name }} @endforeach </td>
                    <td>@foreach ($revie->stores as $revi) {{ $revi->store_name }} @endforeach</td>
                    <td>{{ $revie->review }}</td>
                    <td>{{ $revie->start_ratings }}</td>
                    <td><a class="btn btnsmall btn-outline-secondary btn-icon-text" href="{{ url('review-active',$revie->id) }}"> Active</a>
                    <a class="btn btnsmall btn-outline-danger btn-icon-text" href="{{ url('review-block',$revie->id) }}"> Block</a></td>
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
@endsection
