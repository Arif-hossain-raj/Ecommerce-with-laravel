@extends('layouts.front')

@section('title')
My Wishlist
@endsection

@section('contents')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{url('/') }}">
            Home
            </a>
            <a href="{{url('wishlist')}}">
            wishlist
            </a>
        </h6>
    </div>
</div>
<div class="container my-5">
    <div class="card shadow ">
        <div class="card-header">
            <h4>My Wishlist</h4>
        </div>
        <div class="card-body">
          @if($wishlist->count()> 0)           
            @foreach($wishlist as $item)
            <div class="row product_data">
                <div class="col-md-2 my-auto">
                    <img src="{{asset('assets/uploads/products/'.$item->products->image)}}" height="70px; width:70px;" alt="product img">
                </div>
                <div class="col-md-2 my-auto">
                    <h6>{{$item->products->name}}</h6>
                </div>
                <div class="col-md-2 my-auto">
                    <h6>{{$item->products->selling_price}}</h6>
                </div>
                <div class="col-md-2 my-auto">
                    <input type="hidden" value="{{$item->prod_id}}" class="prod_id">
                    @if($item->products->qty >= $item->prod_qty)

                    <label for="Quantity">Quantity</label>
                        <div class="input-group text-center mb-3">
                            <button class="input-group-text decrement-btn">-</button>
                            <input type="text" name="quantity" value="1" class="form-control text-center qty_input">
                            <button class="input-group-text increment-btn">+</button>
                        </div>   
                    @else
                    <h6>Out of stoke</h6>
                    @endif
                </div>
                <div class="col-md-2 my-auto">
                    <button class="btn btn-success addToCartBtn"> <i class="fa fa-shopping-cart"></i> Add To Cart</button>
                </div>
                <div class="col-md-2 my-auto">
                    <button class="btn btn-danger remove-wishlist-item"> <i class="fa fa-trash"></i> Remove</button>
                </div>
            </div>

            @endforeach
        </div>         
          @else
            <h4 class="text-center">There is no Product In your Wishlist </h4>                 
          @endif
        </div>
    </div>
</div>
@endsection

