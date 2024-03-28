@extends('layouts.admin')
@include('admin.product.edit_form')
@section('title', $viewData["title"])
@section('content')
@yield('edit_form')
@endsection

