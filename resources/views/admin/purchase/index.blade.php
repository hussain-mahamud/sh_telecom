@extends('layout.layout')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="float-left"><h4 class="card-title">Sold Product List</h4></div>
                    
                    <div class="float-right" style="margin-bottom: 30px;"><a href="{{route('create.order')}}" type="button" class="btn btn-success">Sell Product</a>
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
                                    <th>Price</th>
                                    <th>Remarks</th>
                                    <th>Customer Name</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach($purchaseList as $item)
                                <tr> 
                                    <td>{{$i++}}</td>
                                    <td>{{$item->pr_name}}</td>
                                    <td>{{ Str::limit($item->pr_desc, 30) }}</td>
                                    <td>{{$item->pc_qty}}</td>
                                    <td>{{$item->pr_price}}</td>
                                    <td>{{$item->c_remarks}}</td>
                                    <td>{{$item->c_name}}</td>
                                    <td>{{$item->c_phone}}</td> 
                                    <td>{{ Str::limit($item->c_address, 30) }}</td>  <td>
                                        <a href="{{route('edit.order',$item->id)}}" style="margin-right:15px;">
                                            <i class="far fa-edit " style="color: blue;"></i>
                                        </a>
                                    </td>               

                                </tr>
                            @endforeach
                                    
                                        </tbody>

                                    </table>
                             <div class="d-flex justify-content-center">
                               
                                 <p>{!!$purchaseList->links()!!}</p>
                            </div>
                                </div>
                    </div>
                </div>
        </div>

    </div>
@endsection