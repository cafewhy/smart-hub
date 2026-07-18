<?php

namespace App\Http\Controllers;


use Inertia\Inertia;



class WebController extends Controller
{


public function login()
{

return Inertia::render('Login');

}



public function dashboard()
{

return Inertia::render('Dashboard');

}



public function equipment()
{

return Inertia::render('Equipment');

}



public function booking()
{

return Inertia::render('Booking');

}


}