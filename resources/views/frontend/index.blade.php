@extends('layouts.front')

@section('title')

welcome to Sa Fashion

@endsection

@section('contents')
@include('layouts.inc.slider')
<div class="py-5">
    <div class="container">
        <h2>Featured Products</h2>
        <div class="row">
        <div class="owl-carousel featured-carousel owl-theme">
        @foreach($featured_products as $prod)
        <div class="item">
            <div class="card " >
                <img height="200px" src="{{asset('assets/uploads/products/' .$prod->image)}}" alt="Product Image ">
                <div class="card-body">
                    <h5>{{ $prod->name }}</h5>
                    <span class="float-start">{{$prod->selling_price}}</span>
                    <span class="float-end"><s>{{$prod->selling_price}}</s></span>
                </div>
             </div>
            </div>
        @endforeach
        </div>
    </div>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <h2>Popular Categories </h2>
        <div class="row">
        <div class="owl-carousel featured-carousel owl-theme">
        @foreach($trending_category as $tcategory)
        <div class="item">
        <a href="{{ url('view_category/'.$tcategory->slug) }}">

            <div class="card " >
                <img height="200px" src="{{asset('assets/uploads/category/' .$tcategory->image)}}" alt="Popular Image ">
                <div class="card-body">
                    <h5>{{ $tcategory->name }}</h5>
                    <span class="float-start">{{$tcategory->selling_price}}</span>
                    <span class="float-end"><s>{{$tcategory->selling_price}}</s></span>
                </div>
             </div>
            </div>
</a>
        @endforeach
        </div>
    </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
  $('.featured-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
</script>
@endsection