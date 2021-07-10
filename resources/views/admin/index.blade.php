@extends('layout.layout')

@section('content')

<div class="page-breadcrumb">
               <div class="row align-items-center">
                   <div class="col-md-6 col-8 align-self-center">
                       <h3 class="page-title mb-0 p-0">Dashboard</h3>
                       <div class="d-flex align-items-center">
                           <nav aria-label="breadcrumb">
                               <ol class="breadcrumb">
                                   <li class="breadcrumb-item"><a href="#">Home</a></li>
                                   <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                               </ol>
                           </nav>
                       </div>
                   </div>
                   
               </div>
           </div>
            <div class="container-fluid">
            	<div class="row">
            	    <!-- Column -->
            	    <div class="col-sm-6">
            	        <div class="card">
            	            <div class="card-body">
            	                <h4 class="card-title">Daily Sales</h4>
            	                <div class="text-right">
            	                    <h2 class="font-light m-b-0"><i class="ti-arrow-up text-success"></i>{{$daily_sales}}</h2>
            	                    <span class="text-muted">Todays Sales</span>
            	                </div>
            	                <span class="text-success">80%</span>
            	                <div class="progress">
            	                    <div class="progress-bar bg-success" role="progressbar"
            	                        style="width: 80%; height: 6px;" aria-valuenow="25" aria-valuemin="0"
            	                        aria-valuemax="100"></div>
            	                </div>
            	            </div>
            	        </div>
            	    </div>
            	    <!-- Column -->
            	    <!-- Column -->
            	    <div class="col-sm-6">
            	        <div class="card">
            	            <div class="card-body">
            	                <h4 class="card-title">Weekly Sales</h4>
            	                <div class="text-right">
            	                    <h2 class="font-light m-b-0"><i class="ti-arrow-up text-info"></i> {{$weekly_sales}}</h2>
            	                    <span class="text-muted">Weekly</span>
            	                </div>
            	                <span class="text-info">30%</span>
            	                <div class="progress">
            	                    <div class="progress-bar bg-info" role="progressbar"
            	                        style="width: 30%; height: 6px;" aria-valuenow="25" aria-valuemin="0"
            	                        aria-valuemax="100"></div>
            	                </div>
            	            </div>
            	        </div>
            	    </div>
            	    <!-- Column -->
            	</div>

            	<div class="row">
            	    <!-- column -->
            	    <div class="col-sm-12">
            	        <div class="card">
            	            <div class="card-body">
            	                <h4 class="card-title">Revenue Statistics</h4>
            	                <div class="flot-chart">
            	                    <div class="flot-chart-content " id="flot-line-chart"
            	                        style="padding: 0px; position: relative;">
            	                        <canvas class="flot-base w-100" height="400"></canvas>
            	                    </div>
            	                </div>
            	            </div>
            	        </div>
            	    </div>
            	    <!-- column -->
            	</div>
            </div>
@endsection