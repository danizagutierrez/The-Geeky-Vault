@extends('layouts.app')

@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])

@section('content')
<div class="card">
  <div class="card-header text-center">
    <h3 class="custom-h3">Your Cart!</h3>
  </div>
  <?php
    $totalamount = 0;
  ?>
  @if($viewData["cart"]->isEmpty())
  <div class="card-body">
    <p>No items in the cart.</p>
  </div>
  @else
  <div class="card-body">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Product Name</th>
          <th scope="col">Item Quantity</th>
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
          <?php  $totalamount = $totalamount + $cartItem->product->price;
          ?> 
          <td>
            <form action="{{ route('user.product.delete', ['id' => $cartItem->id]) }}" method="POST">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger">
                <i class="bi-trash"></i>
              </button>
            </form>
          </td>
        </tr>
        @endforeach
            <tr>
                <td colspan="2"></td>
                <td>Total:</td>
                <td>{{ $totalamount }}</td>
            </tr>
      </tbody>
    </table>
    <p>Your current balance is 
    {{$previous = $viewData["user"]->getBalance()}} </p>
    
    <?php $newBalance = $previous - $totalamount ?>

    @if($viewData["user"]->getBalance() < $totalamount)
    <div class="alert alert-danger" role="alert">
    Insufficient funds! Try deleting a few items.
    </div>
    @else
    <form action="{{ route('user.checkout') }}" method="POST">
              @csrf
              <button class="btn btn-success">
                <i class="bi-cash"> Check out</i>
              </button>
    </form>
    @endif
  </div>
  @endif
</div>
@endsection



