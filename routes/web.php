<?php

use Illuminate\Support\Facades\Route;


Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('login');
});

Route::get('/inicio', function () {
    return view('plantilla/app');
});

Route::get('/producto', function () {
    return view('producto/indexProducto');
});