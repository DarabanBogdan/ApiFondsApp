<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
class AccountController extends Controller
{

    public function index()
    {

    }


    public function store(Request $request)
    {



        $request->validate([

            'Name'=>'required',
            'Sold'=>'required',
            'Debt'=>['required','boolean'],
            'UserId'=>'required'
        ]);
        return Account::create($request->all());
    }

    public function show($id)
    {

    }

    public function update(Request $request, $id)
    {
        $account =Account::find($id);
        $account->update($request->all());
        return $account;
    }


    public function destroy($id)
    {
        return Account::destroy($id);
    }
}
