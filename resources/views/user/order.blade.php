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
    
    <form action="{{ route('home.index') }}" method="GET">
        @csrf
        <button class="btn btn-success">
            <i class="bi-house"></i> Go back home
        </button>
    </form>
</div>

</div>
@endsection



