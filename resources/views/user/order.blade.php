@extends('layouts.app')

@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])

@section('content')
<div class="card">
  <div class="card-header text-center">
    <h3 class="custom-h3 ">Your order!</h3>
  </div>

  <div class="card-body">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">Order ID</th>
                <th scope="col">Order Date</th>
                <th scope="col">Total Amount</th>
                <th scope="col">Order Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $viewData['order']->id }}</td>
                <td>{{ $viewData['order']->order_date }}</td>
                <td>{{ $viewData['order']->total_amount }}</td>
                <td>{{ $viewData['order']->order_status }}</td>
            </tr>

        </tbody>
    </table>
</div>

</div>

<div class="my-3"></div>


<div class="card">
  <div class="card-header text-center">
    <h3 class="custom-h3 "> Order details:</h3>
  </div>

  <div class="card-body">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">Product Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($viewData["order_items"] as $orderItem)
        <tr>
          <td>{{ $orderItem->product->product_name }}</td>
          <td>{{ $orderItem->quantity }}</td>
          <td>{{ $orderItem->product->price }}</td>
        </tr>
        @endforeach
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



