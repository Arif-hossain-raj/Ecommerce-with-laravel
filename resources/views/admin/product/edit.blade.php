@extends('layouts.admin')

@section('contents')
<div class="card">
	<div class="card-header">
    <h4>Edit Product</h4>
	</div>
    <div class="card-body">
        <form action="{{url('update-product/'. $products->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="col-md-12 mb-3">
            <select class="form-select"  aria-label="Default select example">
                
                <option value="">{{$products->category->name}}</option>
            </select>
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Name</label>
                <input value="{{$products->name}}" type="text" class="form-control" name="name">
            </div>

            <div class="col-md-6 mb-3">
                <label for="">Slug</label>
                <input type="text"  value="{{$products->slug}}" class="form-control" name="slug">
            </div>
            <div class="col-md-12 mb-3">
                <label for=""> Small Description</label>
                <textarea name="small_description" rows="3" class="form-control">
                    {{$products->small_description}}
                </textarea>
            </div>

            <div class="col-md-12 mb-3">
                <label for="">Description</label>
                <textarea name="description" rows="3" class="form-control">
                {{$products->description}}
                </textarea>
            </div>

            <div class="col-md-6 mb-3">
                <label for="">Original Price</label>
                <input type="number" class="form-control" value="{{$products->original_price}}" name="original_price">
            </div>

            <div class="col-md-6 mb-3">
                <label for="">Selling Price</label>
                <input type="number" class="form-control" value="{{$products->selling_price}}" name="selling_price">
            </div>

            <div class="col-md-6 mb-3">
                <label for="">Tax</label>
                <input type="number" class="form-control" value="{{$products->tax}}" name="tax">
            </div>

            <div class="col-md-6 mb-3">
                <label for="">Quantity</label>
                <input type="number" class="form-control" value="{{$products->qty}}" name="qty">
            </div>

            <div class="col-md-6 mb-3">
                <label for="">Status</label>
                <input type="checkbox" {{$products->status == "1" ? 'checked' : ''}} class="form-control" name="status">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Trending</label>
                <input type="checkbox" {{$products->trending == "1" ? 'checked' : ''}} class="form-control" name="trending">
            </div>


            <div class="col-md-12 mb-3">
                <label for="">Meta Title</label>
                <input type="text" class="form-control" value="{{$products->original_price}}" name="meta_title">
            </div>

            <div class="col-md-12 mb-3">
                <label for="">Meta KeyWords</label>
                <textarea name="meta_keywords" rows="3" class="form-control">
                {{$products->original_price}}
                </textarea>
            </div>

            <div class="col-md-12 mb-3">
                <label for="">Meta Description</label>
                <textarea name="meta_description" rows="3" class="form-control">
                {{$products->original_price}}
                </textarea>
            </div>
            @if($products->image)
                <img style="width:100px;" src="{{asset('assets/uploads/products/'.$products->image )}}" alt="Products img">

            @endif

            <div class="col-md-12 mb-3">
            <input type="file" class="form-control" name="image">
            </div>
            <div class="col-md-12 mb-3">
                <button type="submit" class="btn btn-primary">Update Product</button>
            </div>
        
        </form>
    </div>
</div>
@endsection
