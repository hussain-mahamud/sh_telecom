@extends('layout.layout')

@section('content')
<style type="text/css">
	.user-shadow-box-list{
		display: flex;
		margin-top: 20px;
		margin-bottom: 20px;
		
	}
	.user-shadow-box{
		
		-webkit-box-shadow: 0px 7px 12px 11px rgba(0,0,0,0.15); 
		box-shadow: 0px 7px 12px 11px rgba(0,0,0,0.15);
		padding: 10px;
		border-radius: 5px;
		margin-right: 20px;
		
	}
	.shadow-box-title{
		text-align: center;

	}
	.shadow-box-content{
		text-align: center;
	}
	.wrapper{

		background-color: white;
	}
	.bottom{
		min-height: 300px;
		background-color: white;
	}
	.pdf-div{
		float: right;
		padding: 12px;
	}
	.report-input-div{
		padding-bottom: 15px;
	}
	.report-title{
		text-align: center;
		margin-top: 10px;
	}
</style>
<div class="container-fluid">
    <div class="row wrapper">
        <div class="col-sm-12 user-shadow-box-list">
			
			<div class="col-sm-3 user-shadow-box">
				<h5 class="shadow-box-title">Daily Sales</h5><br>
				<h6 class="shadow-box-content">{{$daily_sales}}</h6>
			</div>
			<div class="col-sm-3 user-shadow-box">
				<h5 class="shadow-box-title">Weekly Sales</h5><br>
				<h6 class="shadow-box-content">{{$weekly_sales}}</h6>
			</div>
			
			<div class="col-sm-3 user-shadow-box">
				<h5 class="shadow-box-title">Total Returned</h5><br>
				<h6 class="shadow-box-content">gfhh</h6>
			</div>
			<div class="col-sm-2 user-shadow-box">
				<h5 class="shadow-box-title">Total Rejected</h5><br>
				<h6 class="shadow-box-content">fgg</h6>
			</div>
		</div>
		
	
			<div class="col-sm-3 report-input-div" >
			      <label for="d1" class="form-label">Start Date</label>
			      <input type="Date" class="form-control rp_date" id="d1" name="str_date" >
			</div>
			<div class="col-sm-3 report-input-div">
			      <label for="d2" class="form-label">End Date</label>
			      <input type="Date" class="form-control rp_date" id="d2" name="end_date" >
			</div>

			<div class="col-sm-2 report-input-div">
			      <label for="gerateReport" class="form-label">Generate Report</label>
			      <input type="button" class="form-control btn btn-danger range-report" id="gerateReport" name="gerateReport" value="Sales Report" >
			</div>
			<div class="col-sm-2 report-input-div">
			      <label for="dailySales" class="form-label">Daily Sales Report</label>
			      <input type="button" class="form-control btn btn-success daily-sales" id="dailySales" name="dailySales" value="Daily Sales" >
			</div>

			<div class="col-sm-2 report-input-div">
			      <label for="weeklySales" class="form-label">Weekly Sales Report</label>
			      <input type="button" class="form-control btn btn-dark weekly-sales" id="weeklySales" name="weeklySales" value="Weekly Sales" >
			</div>
		
    </div>

    <div class="row bottom" style="margin-top: 20px;">
    		
			 <div class="table-responsive" style="overflow-y:hidden;">
			 	<div class="report-title" ></div>
			 	<div class="pdf-div"></div>
                        <table class="table user-table">
                            <thead >
                                <tr>
                                    
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Customer Name</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                            </tbody>

                       	</table>
                             <div class="d-flex justify-content-center">
                               
                                 <p></p>
                            </div>
                                </div>
                    </div>
		</div>

</div>
@endsection
