<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Equipment;
use App\Models\Checkin;
use Illuminate\Http\Request;

class CheckinController extends Controller
{

    public function index()
    {
        return Booking::with('equipment','user')
            ->where('status','dipinjam')
            ->get();
    }



    public function store(Request $request, $id)
    {

        $booking = Booking::findOrFail($id);


        // ubah status booking
        $booking->update([
            'status'=>'dikembalikan'
        ]);



        // ubah alat jadi tersedia
        Equipment::where(
            'id',
            $booking->equipment_id
        )->update([
            'status'=>'tersedia'
        ]);



        // simpan data checkin
        Checkin::create([

            'booking_id'=>$booking->id,

            'checkin_date'=>now()

        ]);



        return response()->json([

            'message'=>'Equipment berhasil dikembalikan'

        ]);

    }


}