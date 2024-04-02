@extends('layouts.app')

@section('title')
@section('subtitle')

@section('content')
<div class="card">
  <div class="card-header">
    Your order!
  </div>

  <div class="card-body">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Product Name</th>
                <th scope="col">Order Quantity</th>
                <th scope="col">Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->items as $orderItem)
            <tr>
                <td>{{ $orderItem->id }}</td>
                <td>{{ $orderItem->product->product_name }}</td>
                <td>{{ $orderItem->quantity }}</td>
                <td>{{ $orderItem->product->price }}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="2"></td>
                <td>Total: {{ $order->total_amount }}</td>
            </tr>
        </tbody>
    </table>
    
    <form action="{{ route('home.index') }}" method="GET">
        @csrf
        <button class="btn btn-success">
            <i class="bi-house"></i> Go back home
        </button>
    </form>
</div>

</div>
@endsection



