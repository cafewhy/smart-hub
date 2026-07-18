<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CheckinController;



/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::post('/login', [
    AuthController::class,
    'login'
]);



/*
|--------------------------------------------------------------------------
| API PROTECTED
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->group(function () {


    /*
    |--------------------------------------------------------------------------
    | EQUIPMENT CRUD
    |--------------------------------------------------------------------------
    */

    Route::apiResource(
        'equipments',
        EquipmentController::class
    );



    /*
    |--------------------------------------------------------------------------
    | BOOKING CRUD
    |--------------------------------------------------------------------------
    */

    Route::apiResource(
        'bookings',
        BookingController::class
    );



    /*
    |--------------------------------------------------------------------------
    | CHECK IN EQUIPMENT
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/checkin',
        [CheckinController::class,'index']
    );


    Route::post(
        '/checkin/{id}',
        [CheckinController::class,'store']
    );



    /*
    |--------------------------------------------------------------------------
    | USER LOGIN
    |--------------------------------------------------------------------------
    */

    Route::get('/user', function(Request $request){

        return $request->user();

    });


});