<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('app');
});

// OLD VERSION, TRY AGAIN IF SOMETHING BREAKS

/* Route::any('/app/{wildcard?}', function() {
    return view('app');
}); */

Route::any('/app/{wildcard?}', function () {
    return view('app');
})->where('wildcard', '[\/\w\.-]*');