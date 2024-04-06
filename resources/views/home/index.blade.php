@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<h3 class="custom-h3">Check out some of our products below.</h3>
<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel">
  <div class="carousel-indicators"> 
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" aria-label="Slide 6"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="/storage/alienspaceship.webp" class="d-block w-100" alt="alienspaceship">
    </div>
    <div class="carousel-item">
      <img src="/storage/capacitor.webp" class="d-block w-100" alt="capacitor">
    </div>
    <div class="carousel-item">
      <img src="/storage/hoverboard.webp" class="d-block w-100" alt="hoverboard">
    </div>
    <div class="carousel-item">
      <img src="/storage/lasergun.jpeg" class="d-block w-100" alt="lasergun">
    </div>
    <div class="carousel-item">
      <img src="/storage/plasmarifle.webp" class="d-block w-100" alt="plasmarifle">
    </div>
    <div class="carousel-item">
      <img src="/storage/jetpack.jpeg" class="d-block w-100" alt="jetpack">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
@endsection
