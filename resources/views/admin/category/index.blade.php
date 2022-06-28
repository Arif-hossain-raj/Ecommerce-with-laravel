@extends('layouts.admin')

@section('contents')
<div class="card">
	<div class="card-header">
		<h4>Category page</h4>
	</div>
	<div class="card-body">
		<table class="table-bordered table-striped">
			<thead>
				<tr>
					<th>Id </th>
					<th>Nmae</th>
					<th>Description</th>
					<th>Image</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($category as $items)
				<tr>
					<td>{{ $items->id }}</td>
					<td>{{ $items->name }}</td>
					<td>{{ $items->description }}</td>
					<td>
						<img src="{{asset('assets/uploads/category/'.$items->image)}}" alt="Images" class="cat_img">					
					</td>
					<td>
						<a href=" {{url('edit-prod/'.$items->id)}}" class="btn btn-primary">Edit</a>
						<a href=" {{url('delete-category/'.$items->id)}}" class="btn btn-danger">Delete</a>
					</td>


				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection
