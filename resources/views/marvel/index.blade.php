@extends('layouts.app')
@section('title', 'Marvel Characters')
@section('subtitle', 'Coming soon...')
@section('content')
<div class="row">
  @foreach ($characters as $character)
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <img src="{{ $character['thumbnail']['path'] }}/standard_fantastic.{{ $character['thumbnail']['extension'] }}" class="card-img-top img-card" alt="{{ $character['name'] }}">
      <div class="card-body text-center">
        <h5 class="card-title">{{ $character['name'] }}</h5>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection