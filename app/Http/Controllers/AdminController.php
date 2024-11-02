<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Booking;
use App\Models\User;

class AdminController extends Controller
{
    public function AdminPanel()
    {
        $menu= Menu::get();
        $users= User::get();
        $bookings= Booking::get();
        return view('adminpanel',compact('users', 'bookings', 'menu'));
    }
    public function accept($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'accepted'; 
        $booking->save();

        return redirect()->back()->with('success', 'Booking accepted successfully.');
    }

    public function reject($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'rejected';
        $booking->save();
       
        return redirect()->back()->with('success', 'Booking rejected successfully.');
    }

    public function AddItem()
    {
        return view('Menu.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|int',
            'description' => 'string'
        ]);
        $menu= Menu::create($validatedData);
        return redirect()->route('admin')->with('success', 'Menu item added successfully');
    }

}
