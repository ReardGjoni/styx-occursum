<?php

use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('auth')->group(function() {
    Route::post('/register', 'AuthController@register');
    Route::post('/login', 'AuthController@login');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



// Meetups Routes
// Accessible to anyone, logged in or not.
// Get all Meetups
Route::get('meetups', 'MeetupsController@index');
// Get single Meetup
Route::get('meetups/{id}', 'MeetupsController@show');

Route::group(['prefix' => 'meetups', 'middleware' => 'auth:api', 'scope:create-meetup'], function() {
    // Create new Meetup    
    Route::post('', 'MeetupsController@store');
    
    // Edit Meetup
    Route::put('/{id}', 'MeetupsController@update');
    
    
});

// Only accessible to Administrators
// Delete Meetup
Route::delete('meetups/{id}', 'MeetupsController@destroy')->middleware('auth:api, scope:delete-meetup, edit-users');  


// Users Routes
Route::group(['prefix' => 'users'], function() {
    // Users Routes
    // Accessible to both Administrators & Users
    Route::get('/{id}', 'UsersController@show');

    // Only accessible to Administrators
    Route::get('', 'UsersController@index');    
});


Route::group(['prefix' => 'groups'], function() {
    // Groups Routes
    // Accessible to anyone
    // Get all Groups
    Route::get('', 'GroupsController@index');

    // Get searched for Group
    Route::get('/search', 'GroupsController@search');
    
    // Get single Group
    Route::get('/{id}', 'GroupMeetupsController@show');
});