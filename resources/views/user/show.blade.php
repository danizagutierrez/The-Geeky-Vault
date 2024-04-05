@extends('layouts.app')

@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])

@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-8">
      <div class="card-body">
        <p class="card-text"><b>Name:</b> {{ $viewData["name"] }}</p>
        <p class="card-text"><b>E-mail:</b> {{ $viewData["email"] }}</p>
      </div>
    </div>
  </div>
  <form action="{{ route('user.delete', $viewData["user_id"]) }}" method="POST">
    @csrf
    @method('DELETE')
    <div  class="row d-flex justify-content-center align-content-center">
        <button class="btn btn-danger col-3">Delete Account</button>
    </div>
  </form>  
</div>
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-8">
      <div class="card-body">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Order Date</th>
              <th scope="col">Order Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($viewData["orders"] as $order)
            <tr>
              <td>{{ $order->id }}</td>
              <td>{{ $order->order_date }}</td>
              <td>{{ $order->order_status }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection