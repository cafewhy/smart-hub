<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{

    public function index()
    {
        return response()->json(
            Equipment::all()
        );
    }


    public function store(Request $request)
    {

        $data = $request->validate([
            'name'=>'required',
            'description'=>'required',
            'status'=>'required'
        ]);


        return Equipment::create($data);

    }



    public function show(Equipment $equipment)
    {
        return $equipment;
    }



    public function update(Request $request, Equipment $equipment)
    {

        $equipment->update(
            $request->all()
        );

        return $equipment;

    }



    public function destroy(Equipment $equipment)
    {

        $equipment->delete();

        return response()->json([
            'message'=>'Equipment deleted'
        ]);

    }



}