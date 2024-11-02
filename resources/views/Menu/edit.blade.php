@extends('layouts.layout')
@section('title', 'edit item')
@section('content')
@section('Head', 'Edit Item')
<div class="container mt-5">
    <h2>Update Menu</h2>
    <form action="{{ route('menu.update', $menu->id) }}" method="POST">
    @method('PUT')
        @csrf
        <div class="form-group">
            <label for="name">Item Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$menu->name}}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="4" value="{{$menu->description }}" required></textarea>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" step="0.01" value="{{$menu->price}}" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection

