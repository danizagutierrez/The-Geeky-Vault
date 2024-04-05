@extends('layouts.app')

@section('title', $title)
@section('subtitle', $subtitle)

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
        <?php $totalamount = 0; ?>
        <tbody>
            @foreach ($order->items as $orderItem)
            <tr>
                <td>{{ $orderItem->id }}</td>
                <td>{{ $orderItem->product->product_name }}</td>
                <td>{{ $orderItem->quantity }}</td>
                <td>{{ $orderItem->product->price }}</td>
                <?php  $totalamount = $totalamount + $orderItem->product->price;
                ?> 
            </tr>
            @endforeach
            <?php $order->total_amount = $totalamount;
            $order->order_status = "In progress";
            $order->save();
            ?>
            <tr>
                <td colspan="2"></td>
                <td>Total:</td>
                <td>{{ $order->total_amount }}</td>
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



