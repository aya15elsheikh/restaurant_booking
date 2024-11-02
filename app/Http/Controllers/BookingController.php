<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Booking;
use App\Notifications\BookingResponse;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class BookingController extends Controller
{
    
     
    public function create() {
        return view('book.create');
    }

    public function book(Request $request ) {
            $userId = Auth::id();
        
            $validatedData = $request->validate([
                'booking_time' => 'required', 
            ]);
        
            $booking = Booking::create([
                'user_id' => $userId, 
                'booking_time' => $validatedData['booking_time'], 
                'status' => 'pending' 
            ]);
        
            return redirect()->route('book.history')->with('success', 'Table Booked successfully');
    }
            
    
   

    public function history() {
        $userId = Auth::id();
        $bookings = Booking::where('user_id', $userId)->with(['user'])->get();
        return view('book.history',compact('bookings'));
    }


}
