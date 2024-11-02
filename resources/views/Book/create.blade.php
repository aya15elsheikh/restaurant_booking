@extends('layouts.layout')
@section('title', 'Book')
@section('Head', 'Book')
@section('content')
<div class="container mt-5">
    <form action="{{ route('bookPost') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="date">Book Time</label>
            <input type="datetime-local" name="booking_time" id="booking_time" required>
            <button type="submit" class="btn btn-primary">Submit</button>
    </for>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

</div>
@endsection
