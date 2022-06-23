@extends('layouts.admin')

@section('contents')
<div class="card">
	<div class="card-header">
		<h4>Product page</h4>
	</div>
	<div class="card-body">
		<table class="table-bordered table-striped">
			<thead>
				<tr>
					<th>Id </th>
					<th>Category</th>
					<th>Name</th>
					<th>Selling Price</th>
					<th>Image</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($products as $items)
				<tr>
					<td>{{ $items->id }}</td>
					<td>{{ $items->category->name }}</td>
					<td>{{ $items->name }}</td>
					<td>{{ $items->description }}</td>
					<td>{{ $items->selling_price }}</td>
					<td>
						<img src="{{asset('assets/uploads/products/'.$items->image)}}" alt="Images" class="cat_img">					
					</td>
					<td>
						<a href=" {{url('edit-product/'.$items->id)}}" class="btn btn-primary">Edit</a>
						<a href=" {{url('delete-product/'.$items->id)}}" class="btn btn-danger">Delete</a>
					</td>


				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection
