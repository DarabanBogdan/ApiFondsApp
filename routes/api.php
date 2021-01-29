<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controller;
use App\Models\User;
use App\Models\Account;
use App\Models\Transaction;
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
Route::middleware('auth')->resource('Account','App\Http\Controllers\AccountController');
Route::middleware('auth')->resource('Transaction','App\Http\Controllers\TransactionController');





Route::middleware('auth')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('/User/login',function (){

    $pass=request()->only('Password');
    $credential= array(
        'Email' => request()->only('Email'),
        'password' => reset($pass)
    );
    $token=Auth('api')->attempt($credential);
    return $token;

});

Route::middleware('auth')->get('/loginTest',function (){

    $user=auth()->user();
    return $user;

});


Route::middleware('auth')->post('/User/AllAccounts',function (){
    $user=auth()->user();
    $id=$user->id;
    return Account::where('UserId' , '=', $id)->get();
});



Route::middleware('auth')->get('Account/AllTransaction/{id}',function ($id){
    $user=auth()->user();
    $idUser=$user->id;
    $accountsIds=Account::where('UserId' , '=', $idUser)->pluck('id')->toArray();
    if(in_array($id, $accountsIds))
    {
        return Transaction::where('AccountId' , '=', $id)->get();

    }
    else return response('Not Found', 404);

});
