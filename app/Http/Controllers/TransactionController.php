<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
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
        return Transaction::create($request->all());
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
