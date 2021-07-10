@extends('layout.layout')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="float-left"><h4 class="card-title">Product List</h4></div>
                    
                    <div class="float-right" style="margin-bottom: 30px;"><a href="{{route('create.product')}}" type="button" class="btn btn-success">Add Product</a>
                    </div>
                    <div>
                         @if(session('success'))
                  <div class="alert alert-primary alert-dismissible fade show" role="alert">
                  <strong>{{session('success')}}</strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    @endif
                    </div>
                   
                    <div class="table-responsive" style="overflow-y:hidden;">
                        <table class="table user-table">
                            <thead >
                                <tr>
                                    <th>Sl.No</th>
                                    <th>Product Name</th>
                                    <th>Description</th>
                                    <th>Quantity</th>
                                    <th>Stock</th>
                                    <th>Action</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach($products as $product)
                                <tr> 
                                    <td>{{$i++}}</td>
                                    <td>{{$product->pr_name}}</td>
                                    <td>{{ Str::limit($product->pr_desc, 30) }}</td>
                                    <td>{{$product->pr_qty}}</td>
                                    <td>{{$product->pr_qty - $product->sold_qty}}</td>
                                    <td>
                                        <a href="{{route('edit.product',$product->id)}}" style="margin-right:15px;">
                                            <i class="far fa-edit " style="color: blue;"></i>
                                        </a>
                                    </td>
                                    <td>
                                      <a href="{{route('delete.product',$product->id)}}"  onclick="return confirm('Delete Product?')"><i class="fas fa-trash " style="color: red;" ></i></a>
                                    </td>                  

                                </tr>
                            @endforeach
                                    
                                        </tbody>

                                    </table>
                             <div class="d-flex justify-content-center">
                               
                                 <p>{!!$products->links()!!}</p>
                            </div>
                                </div>
                    </div>
                </div>
        </div>

    </div>
@endsection