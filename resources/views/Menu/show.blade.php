@extends('layouts.layout')
@section('title', 'show item')
@section('Head', "$menu->name")
@section('content')
<div class="container">
  <p><strong>Name: </strong> {{$menu->name}}</p>
  <p><strong>description: </strong> {{$menu->description}}</p>
  <p><strong>price: </strong> {{$menu->price}}</p>
</div>

@endsection