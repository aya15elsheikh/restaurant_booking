@extends('layouts.layout')
@section('title', 'Admin Panel')
@section('Head', 'Admin Panel')
@section('content')
<div class="container">

  <table class="table table-striped">
    <h1>Booking Requests </h1>
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
        <td>   
          <form action="{{ route('admin.accept', $booking->id) }}" method="POST" style="display:inline;">
          @csrf
          <button type="submit" class="btn btn-success">Accept</button>
          </form>     
        </td>
        <td>
        <form action="{{ route('admin.reject', $booking->id) }}" method="POST" style="display:inline;">
           @csrf
           <button type="submit" class="btn btn-danger">Reject</button>
        </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <h1>Menu</h1>
  
  <a href="{{route('admin.add')}}" class ="btn btn-primary">Add Item </a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Price</th>
        <th scope="col">Options</th>
      </tr>
    </thead>
    <tbody>
      @foreach($menu as $item)
      <tr>
        <th scope="row">{{$item->id}}</th>
        <td>{{$item->name}}</td>
        <td>{{$item->description}}</td>
        <td>{{$item->price}}</td>
        <td>   
          <a href="{{route('menu.edit', $item->id)}}" class ="btn btn-primary">Edit</a>
        </td>
        <td>
            <form action={{route('menu.destroy', $item->id)}} method="POST">
             @csrf
             @method('DELETE')
             <button class="btn btn-danger">Delete</button>
            </form>
        </td>
       </tr>
      @endforeach
    </tbody>
  </table>
</div>

<div class="container">
  <h1>Users</h1>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
        <th scope="row">{{$user->id}}</th>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->role}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection
