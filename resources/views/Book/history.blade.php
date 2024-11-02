@extends('layouts.layout')
@section('title', 'Booking History')
@section('Head', 'History')
@section('content')
<div class="container">

  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Booking ID</th>
        <th scope="col">User Name</th>
        <th scope="col">Status</th>
        <th scope="col">Time</th>
      </tr>
    </thead>
    <tbody>
      @foreach($bookings as $booking)
      <tr>
        <th scope="row">{{$booking->id}}</th>
        <td>{{$booking->user->name}}</td>
        <td>{{$booking->status}}</td> 
        <td>{{$booking->booking_time}}</td> 
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection
