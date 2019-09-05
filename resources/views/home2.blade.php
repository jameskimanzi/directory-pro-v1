@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            DIRECTORY PRO
          <div class="pcoded-content">
<div class="pcoded-inner-content">
<div class="main-body">
<div class="page-wrapper">
<div class="page-body">
<div class="row">

<div class="col-xl-3 col-md-6">
<div class="card bg-c-yellow update-card">
<div class="card-block">
<div class="row align-items-center">
<div class="col-8">
<h4 class="30 text-center">{{$members->count()}}</h4>
 

</div>
<div class="col-4 text-right">
<canvas id="update-chart-1" height="50"></canvas>
</div>
</div>
</div>
<div class="card-footer" style="background-color:  #d27979
;height: 40px">
<p class="text-white m-b-0"><i class="30 fa fa-users"></i><i>Members</i></p>
</div>
</div>
</div>

<div class="col-xl-3 col-md-6">
<div class="card bg-c-pink update-card">
<div class="card-block">
<div class="row align-items-center">
<div class="col-8">
<h4 class="text-black-30 text-center">{{$groups->count()}}</h4>

</div>
<div class="col-4 text-right">
<canvas id="update-chart-3" height="50"></canvas>
</div>
</div>
</div>
<div class="card-footer" style="background-color:  #d27979
;height: 40px">
<p class="text-white m-b-0"><i class="30 fa fa-users"></i>
    <i>Groups</i></p>
</div>
</div>
</div>
<div class="col-xl-3 col-md-6">
<div class="card bg-c-lite-green update-card">
<div class="card-block">
<div class="row align-items-center">
<div class="col-8">
 <h4 class="30 text-center">{{$users->count()}}</h4>
</div>
<div class="col-4 text-right">
<canvas id="update-chart-4" height="50"></canvas>
</div>
</div>
</div>
<div class="card-footer" style="background-color:  #d27979
;height: 40px">
<p class="text-white m-b-0"><i class="30 fa fa-users"></i>Users<i></i></p>
</div>
</div>
</div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection