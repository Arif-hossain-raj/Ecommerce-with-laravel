@extends('layouts.front')

@section('title')
My Orders
@endsection

@section('contents')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white">Order view
                            <a href="{{url('my-orders')}}" class="btn btn-warning float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 order-details">
                                <h4>Shipping Details</h4>
                                <hr>
                                <label for="">First Name</label>
                                <div class="border p-2">
                                    {{$orders->fname}}
                                </div>
                                <label for="">Last Name</label>
                                <div class="border p-2">
                                    {{$orders->lname}}
                                </div>
                                <label for="">Email</label>
                                <div class="border p-2">
                                    {{$orders->email}}
                                </div>
                                <label for="">Phone</label>
                                <div class="border p-2">
                                    {{$orders->phone}}
                                </div>
                                <label for="">Shopping Address</label>
                                <div class="border p-2">
                                    {{$orders->address1}}
                                    {{$orders->address2}}
                                    {{$orders->city}}
                                    {{$orders->state}}
                                    {{$orders->country}}
                                </div>
                                <label for="">Zip Code</label>
                                <div class="border p-2">
                                    {{$orders->pincode}}
                                </div>

                            </div>
                            <div class="col-md-6">
                                <h4>Order Details</h4>
                                <hr>
                            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders->orderitems as $item)
                    <tr>
                        <td>{{ $item->products->name}} </td>
                        <td>{{ $item->qty }}</td>
                        <td>{{ $item->price }}</td>
                        <td>
                            <img src="{{asset('assets/uploads/products/'.$item->products->image)}}" width="50px" alt="product_img">
                        </td>

                    </tr>
                    @endforeach
                  
                </tbody>
            </table>
            <h4>Grand Total : {{$orders->total_price}} BDT</h4>
                            </div>

                        </div>
            
                    </div>
                </div>
          
        </div>
    </div>
</div>

@endsection