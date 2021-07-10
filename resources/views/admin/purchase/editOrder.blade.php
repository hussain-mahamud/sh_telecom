@extends('layout.layout')

@section('content')
<div class="container-fluid">
	<div class="card">
		 <div class="card-body">
                        
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


         </div>
		<div class="card-body">
			<form  action="{{route('update.order')}}" enctype="multipart/form-data" method="POST" class="row g-3">
				@csrf
				<input type="hidden" name="id" value="{{$order[0]->id}}">
				<div class="col-md-4">
			      <label for="product" class="form-label">Product</label>
			      <select id="pr_id" class="form-select form-control" name="pr_id" required="true">
			      	<option>select item...</option>
			      	@foreach($products as $product)

			         <option  value="{{$product->id}}">{{$product->pr_name}}</option>
			        
			        @endforeach
			      </select>

			   </div>
			   <div class="col-md-4">
			      <label for="name" class="form-label">Quantity</label>
			      <input type="number" class="form-control" id="name" name="pc_qty" required value="{{$order[0]->pc_qty}}">
			      <input type="hidden" name="previous_qty" value="{{$order[0]->pc_qty}}">
			   </div>
			   	<div class="col-md-4">
				      <label for="quantity" class="form-label">Price</label>
				      <input type="number" class="form-control" id="quantity" name="pr_price" required value="{{$order[0]->pr_price}}">
			  	</div>

			  	<div class="col-md-6">
				      <label for="c_name" class="form-label">Customer Name</label>
				      <input type="text" class="form-control" id="c_name" name="c_name" value="{{$order[0]->c_name}}">
			  	</div>

			  	<div class="col-md-6">
				      <label for="c_phone" class="form-label">Phone number</label>
				      <input type="text" class="form-control" id="c_phone" name="c_phone"  value="{{$order[0]->c_phone}}">
			  	</div>

			<div class="col-md-6">
			     <label for="address" class="form-label">Address </label>
			     <textarea type="text" class="form-control" id="address" name="c_address" value="{{$order[0]->c_address}}">{{$order[0]->c_address}}</textarea>
			  </div>

	
 			<div class="col-md-6">
			     <label for="description" class="form-label">Remarks</label>
			     <textarea type="text" class="form-control" id="description" name="c_remarks" value="{{$order[0]->c_remarks}}">{{$order[0]->c_remarks}}</textarea>
			  </div>

			   <div class="col-md-12" style="margin-top: 50px;">
			      <button type="submit" class="btn btn-danger offset-5"  >Update Order</button>
			   </div>
</form>
		</div>
	</div>
</div>



@endsection