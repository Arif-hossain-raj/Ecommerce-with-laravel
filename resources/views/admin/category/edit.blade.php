@extends('layouts.admin')

@section('contents')
<div class="card">
	<div class="card-header">
    <h4>Edit Category</h4>
	</div>
    <div class="card-body">
        <form action="{{url('update-category/'. $category->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-6 mb-3">
                <label for="">Name</label>
                <input type="text" value="{{ $category->name}}" class="form-control" name="name">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Slug</label>
                <input type="text"  value="{{ $category->slug}}" class="form-control" name="slug">
            </div>
            <div class="col-md-12 mb-3">
                <label for="">Description</label>
                <textarea name="description" rows="3" class="form-control">
                {{ $category->description}}
                </textarea>
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Status</label>
                <input type="checkbox" {{$category->status =="1" ? 'checked': ''}}  class="form-control" name="status" >
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Popular</label>
                <input type="checkbox" {{$category->popular =="1" ? 'checked': ''}} class="form-control" name="popular">
            </div>
            <div class="col-md-12 mb-3">
                <label for="">Meta Title</label>
                <input type="text"  value="{{ $category->meta_title}}" class="form-control" name="meta_title">
            </div>
            <div class="col-md-12 mb-3">
                <label for="">Meta KeyWords</label>
                <textarea name="meta_keywords" rows="3" class="form-control">
                {{ $category->meta_keywords}}
  
                </textarea>
            </div>
            <div class="col-md-12 mb-3">
                <label for="">Meta Description</label>
                <textarea name="meta_description" rows="3" class="form-control">
                {{ $category->meta_descrip}}

                </textarea>
            </div>
            @if($category->image)
                <img style="width:100px;" src="{{asset('assets/uploads/category/'.$category->image )}}" alt="category img">

            @endif
            <div class="col-md-12 mb-3">
            <input type="file" class="form-control" name="image">
            </div>
            <div class="col-md-12 mb-3">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection