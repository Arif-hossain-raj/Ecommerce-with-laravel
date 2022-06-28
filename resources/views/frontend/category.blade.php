@extends('layouts.front')

@section('title')
Category

@endsection

@section('contents')

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>All categories</h2>
                    <div class="row">
        @foreach($category as $cate)
            <div class="col-md-3 mb-3">
                <a href="{{ url('view_category/'.$cate->slug) }}">
                <div class="card">
                <img height="200px" src="{{asset('assets/uploads/category/' .$cate->image)}}" alt="Category Image ">
                    <div class="card-body">
                        <h5>{{$cate->name}}</h5>
                        <p>
                            {{$cate->description}}
                        </p>

                    </div>
                </div>  
                </a>  
            </div>
        @endforeach
        </div>
    </div>
    </div>
</div>
</div>

@endsection

<!-- @section('scripts')
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
@endsection -->