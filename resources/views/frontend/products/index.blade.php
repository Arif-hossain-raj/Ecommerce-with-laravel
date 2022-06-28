@extends('layouts.front')

@section('title')
{{$category->name}}

@endsection

@section('contents')
<div class="py-5">
    <div class="container">
        <h2>{{$category->name}}</h2>
        <div class="row">
        @foreach($products as $prod)
        <div class="col-md-3 mb-3">
            <div class="card " >
                <a href="{{url('view_category/'.$category->slug.'/'.$prod->slug)}}">
                <img height="200px" src="{{asset('assets/uploads/products/' .$prod->image)}}" alt="Product Image ">
                <div class="card-body">
                    <h5>{{ $prod->name }}</h5>
                    <span class="float-start">{{$prod->selling_price}}</span>
                    <span class="float-end"><s>{{$prod->selling_price}}</s></span>
                </div>
                </a>
             </div>
            </div>
        @endforeach
    
    </div>
    </div>
</div>
@endsection
