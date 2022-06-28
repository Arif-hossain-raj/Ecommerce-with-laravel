@extends('layouts.front')

@section('title')
My Orders
@endsection

@section('contents')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        My Orders
                    </div>
                    <div class="card-body">
                    <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Tracking Number</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $item)
                    <tr>
                        <td>{{ $item->tracking_no }}</td>
                        <td>{{ $item->total_price }}</td>
                        <td>{{ $item->status== '0' ? 'pending' : 'On Delivery'}}</td>
                        <td>
                            <!-- <a href="{{ url('view-orders/'.$item->id) }}" class="btn btn-outline-primary">View</a> -->
                            <a href="{{ url('view-order/'.$item->id) }}" class="btn btn-outline-primary">View</a>

                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
                    </div>
                </div>
          
        </div>
    </div>
</div>

@endsection