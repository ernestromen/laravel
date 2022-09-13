<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\countryController;
use App\Http\Controllers\formController;
use Illuminate\Support\Facades\IpCheck;
require __DIR__.'/auth.php';


/* I have added a middleware called IpCheck which checks whenever the location of the user entering the url is from
the United Kingdom or Australia.
Uncomment for the middleware to work!
Libraries used are Laravel breeze and torann/geoip (for finding the user's IP location)
*/



Route::middleware([
// 'ipcheck'
])->group(function () {
    Route::get('/',[formController::class, 'login']);
    // Route::get('/register',[formController::class, 'register'])->name('register');    
});


Route::middleware(['auth',
// 'ipcheck'
])->group(function () {

    Route::get('/dashboard',[countryController::class, 'index'])->name('dashboard');
    Route::post('/dashboard',[countryController::class, 'store'])->name('dashboard');
    Route::get('/dashboard/edit/{id}',[countryController::class, 'edit'])->name('dashboard/edit/{id}');
    Route::post('/dashboard/edit/{id}',[countryController::class, 'update'])->name('dashboard/edit/{id}');
    Route::post('/dashboard/delete/{id}',[countryController::class, 'destroy'])->name('dashboard/delete/{id}');
});

