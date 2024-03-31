@extends('layouts.app')

@section('title', $viewData["title"])

@section('content')
<div class="card">
  <div class="card-header">
    Your cart!
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Product Name</th>
          <th scope="col">Order Quantity</th>
          <th scope="col">Price</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($viewData["cart"] as $cartItem)
        <tr>
          <td>{{ $cartItem->id }}</td>
          <td>{{ $cartItem->product->product_name }}</td>
          <td>{{ $cartItem->order_qty }}</td>
          <td>{{ $cartItem->product->price }}</td>
          <td>
            <form action="{{ route('admin.product.delete', ['id' => $cartItem->id]) }}" method="POST">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger">
                <i class="bi-trash"></i>
              </button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <form action="{{ route('user.checkout') }}" method="POST">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger">
                <i class="bi-trash">Check out</i>
              </button>
    </form>

  </div>
</div>
@endsection



