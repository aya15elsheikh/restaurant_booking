@extends('layouts.layout')

@section('title', 'Menu')

@section('Head', 'Menu')

@section('content')

<div class="container">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Price</th>
      </tr>
    </thead>
    <tbody>
      @foreach($menu as $item)
      <tr>
        <th scope="row">{{$item->id}}</th>
        <td>{{$item->name}}</td>
        <td>{{$item->description}}</td>
        <td>{{$item->price}}</td>
        <td><a href="{{route('menu.show', $item->id)}}" class ="btn btn-primary">show</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection
