<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controller;
use App\Models\User;
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


Route::resource('User','App\Http\Controllers\UserController');
Route::resource('Account','App\Http\Controllers\AccountController');





Route::middleware('auth')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('/login',function (){

    $pass=request()->only('Password');
    $credential= array(
        'Username' => request()->only('Username'),
        'password' => reset($pass)
    );

    $token=Auth('api')->attempt($credential);


    return $token;

});

Route::middleware('auth')->get('/login-test',function (){

    $user=auth()->user();

    return $user;

});
