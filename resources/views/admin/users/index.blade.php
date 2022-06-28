@extends('layouts.admin')

@section('title')
    User
@endsection
@section('contents')
<div class="card">
	<div class="card-header">
		<h4>Registered User</h4>
	</div>
	<div class="card-body">
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Id </th>
					<th>Name</th>
					<th>Email</th>
					<th>phone</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $items)
				<tr>
					<td>{{ $items->id }}</td>
					<td>{{ $items->name }}</td>
					<td>{{ $items->email }}</td>
					<td>{{ $items->phone }}</td>
					
					<td>
						<a href=" {{url('view-user/'.$items->id)}}" class="btn btn-primary">view</a>
					</td>


				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection