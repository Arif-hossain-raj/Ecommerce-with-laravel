@extends('layouts.front')

@section('title')
{{$products->name}}

@endsection

@section('contents')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{url('category') }}">
            Collection
            </a>
            <a href="{{url('view_category/'.$products->category->slug)}}">
            {{$products->category->name}}
            </a>
             <a href="{{url('view_category/'.$products->category->slug.'/'.$products->slug)}}">
             {{$products->name}}
             </a>
           
        </h6>
    </div>
</div>

<div class="container">
    <div class="card shadow product_data">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 border-right">
                    <img src="{{asset('assets/uploads/products/'.$products->image)}}" class="w-100" alt="img">
                </div>
                <div class="col-md-8">
                    <h2 class="mb-0">
                        {{$products->name}}
                        @if($products->trending == '1')
                    <label style="font-size: 16px;" class="float-end bg-danger trending_tag" for=""> Trending</label>
                    @endif
                    </h2>
                    <hr>
                    <label class="me-3">
                        Original Price : <s>BDT {{$products->original_price}}</s>
                    </label>
                    <label class="fw-bold" for="">
                        Selling Price : BDT {{$products->selling_price}}
                    </label>
                    <p class="mt-3">
                        {{ $products->small_description}}
                    </p>
                    <hr>
                    @if($products->qty > 0)
                        <label class="badge bg-success">In stoke</label>
                    @else    
                        <label class="badge bg-danger">Out of stoke</label>
                    @endif

                    <div class="row mt-2">
                        <div class="col-md-3">
                            <input type="hidden" value="{{$products->id}}" class="prod_id">
                            <label for="Quantity">Quantity</label>
                            <div class="input-group text-center mb-3">
                                 <button class="input-group-text decrement-btn">-</button>
                                <input type="text" name="quantity" value="1" class="form-control text-center qty_input">
                             <button class="input-group-text increment-btn">+</button>
                            </div>   
                    </div>
                    <div class="col-md-10">
                        <br>
                        @if($products->qty > 0)
                        <button type="button" class="btn btn-primary me-3 float-start addToCartBtn">Add to Cart <i class="fa fa-shopping-cart"></i></button>
                        @endif
                        <button type="button" class="btn btn-success me-3 float-start addToWishlist">Add to Wishlist <i class="fa fa-heart"></i></button>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



@endsection

