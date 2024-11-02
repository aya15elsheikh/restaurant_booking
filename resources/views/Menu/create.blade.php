@extends('layouts.layout')
@section('title', 'Add item')
@section('Head', 'Add Item')
@section('content')
<div class="container mt-5">
<h1>Add Menu Item</h1>
    <form action="{{ route('menu.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Item Name:</label>
            <input type="text" class="form-control" id="name" name="name"  required>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" class="form-control" id="price" name="price" step="0.01"  required>

        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" rows="4"  required></textarea>

        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <a href="{{ route('admin')}} "class="btn btn-primary" >Back to Menu</a>
</div>
@endsection




