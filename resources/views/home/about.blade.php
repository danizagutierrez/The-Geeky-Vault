@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-4 ms-auto">
            <p class="lead">{{ $viewData["description"] }}</p>
        </div>
        <div class="col-lg-4 me-auto">
            <ul>
                <p class="lead">{{ $viewData["authors"] }}</p>
                <li>Moises Silva Student   ID:300344810</li>
                <li>Daniza Gutierrez Student   ID:300358840</li>
                <li>Arthur Hockmuller Student   ID:300364759</li>                
            </ul>
        </div>
    </div>
</div>
@endsection
