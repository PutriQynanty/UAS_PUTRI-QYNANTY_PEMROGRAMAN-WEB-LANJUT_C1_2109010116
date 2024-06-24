<?php

use App\Http\Controllers\Namapasiencontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('Namapasien', Namapasiencontroller::class);