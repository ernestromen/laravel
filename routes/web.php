<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\countryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\IpCheck;
use  App\Models\Countries;
require __DIR__.'/auth.php';


/* I have add a middleware called IpCheck which check whenever the user entering the url is from
the United Kingdom or Australia.
Uncomment for the middleware to work!
Libraries used are Laravel breeze and torann/geoip (for finding the user's IP location)
*/

Route::get('/', function () {
    if(Auth::check()) { return redirect()->route('dashboard');}
    return view('auth/login');
})
// ->middleware('ipcheck')
;

Route::get('/register', function () {
    return view('auth.register');
})
// ->middleware('ipcheck')
->name('register');



Route::middleware(['auth',
// 'ipcheck'
])->group(function () {

    Route::get('/dashboard', function () {
        $id = Auth::id();
        $countries = Countries::all();
        return view('dashboard',compact('id','countries'));
        })->name('dashboard');

    Route::post('/dashboard',[countryController::class, 'store'])->name('dashboard');
    Route::get('/dashboard/edit/{id}',[countryController::class, 'edit'])->name('dashboard/edit/{id}');
    Route::post('/dashboard/edit/{id}',[countryController::class, 'update'])->name('dashboard/edit/{id}');
    Route::post('/dashboard/delete/{id}',[countryController::class, 'destroy'])->name('dashboard/delete/{id}');
});

