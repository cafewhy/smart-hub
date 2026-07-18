<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{


    public function index()
    {

        return Booking::with(
            'user',
            'equipment'
        )->get();

    }



    public function store(Request $request)
    {


        $data = $request->validate([

            'user_id'=>'required',
            'equipment_id'=>'required',
            'borrow_date'=>'required',
            'return_date'=>'required'

        ]);



        $data['status']='dipinjam';



        return Booking::create($data);


    }



    public function show(Booking $booking)
    {

        return $booking->load(
            'equipment',
            'user'
        );

    }



    public function update(Request $request, Booking $booking)
    {

        $booking->update(
            $request->all()
        );


        return $booking;

    }



    public function destroy(Booking $booking)
    {

        $booking->delete();


        return response()->json([

            'message'=>'Booking deleted'

        ]);

    }


}