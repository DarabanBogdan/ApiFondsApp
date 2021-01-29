<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Account;
class TransactionController extends Controller
{

    public function index()
    {

    }


    public function store(Request $request)
    {
        $request->validate([

            'Title'=>'required',
            'Details'=>'required',
            'Sold'=>'required',
            'AccountId'=>'required'
        ]);
        $user=auth()->user();
        $idUser=$user->id;
        $accountsIds=Account::where('UserId' , '=', $idUser)->pluck('id')->toArray();
        $id=$request->get('AccountId');
        if(in_array($id, $accountsIds))
         return response($transaction=Transaction::create($request->all()),201);
        else return response("Acces Forbidden",403);





    }


    public function show($id)
    {

    }


    public function update(Request $request, $id)
    {
        $transaction =Transaction::find($id);
        $transaction->update($request->all());
        return $transaction;
    }

    public function destroy($id)
    {
        return Transaction::destroy($id);

    }
}
