@extends('layout')

@section('content')

<div class="card">
  <div class="card-header">
    Registration Status
  </div>
  <div class="card-body">
    <div class="row">
            <div class="col-md-6 card">
                <div id="piechart" style="width: 900px; height: 500px;"></div>
            </div>
            <div class="col-md-6 card">
                <div id="columnchart_values" style="width: 600px; height: 500px;"></div>
            </div>
        </div>
  </div>
</div>
@endsection
