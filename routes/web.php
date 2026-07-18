<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', function () {
    return Inertia::render('Dashboard');
});


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
});


Route::get('/equipment', function () {
    return Inertia::render('Equipment');
});


Route::get('/booking', function () {
    return Inertia::render('Booking');
});


Route::get('/checkin', function () {
    return Inertia::render('Checkin');
});


Route::get('/login', function () {
    return Inertia::render('Login');
});