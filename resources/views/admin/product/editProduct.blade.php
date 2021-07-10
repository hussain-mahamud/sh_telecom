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
			<form  action="{{route('update.product')}}" enctype="multipart/form-data" method="POST" class="row g-3">
				@csrf
				<input type="hidden" class="form-control"  name="id"  value="{{$product->id}}">
			   <div class="col-md-6">
			      <label for="name" class="form-label">Product Name</label>
			      <input type="text" class="form-control" id="name" name="pr_name" required value="{{$product->pr_name}}">
			   </div>
			   	<div class="col-md-6">
				      <label for="quantity" class="form-label">Quantity</label>
				      <input type="number" class="form-control" id="quantity" name="pr_qty" required value="{{$product->pr_qty}}">
			  	</div>
	
	
 				<div class="col-md-12">
			     <label for="description" class="form-label">Product Description</label>
			     <textarea type="text" class="form-control" id="description" name="pr_desc" rows="5" value="{{$product->pr_desc}}" >{{$product->pr_desc}}</textarea>
			   </div>

			   <div class="col-md-12" style="margin-top: 50px;">
			      <button type="submit" class="btn btn-danger offset-5"  >Upload Product</button>
			   </div>
</form>
		</div>
	</div>
</div>



@endsection