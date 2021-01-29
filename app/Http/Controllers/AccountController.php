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

        ]);
        $user=auth()->user();
        $id=$user->id;
        $credential=[
            'UserId' => $id,
        ];
        $result = array_merge($request->all(), $credential);
        return response(Account::create($result), 201);
    }

    public function show($id)
    {

    }

    public function update(Request $request, $id)
    {
        $request->validate([

            'Name'=>'required',
            'Sold'=>'required',
            'Debt'=>['required','boolean'],

        ]);
        $user=auth()->user();
        $idUser=$user->id;
        $credential=[
            'UserId' => $idUser,
        ];
        $result = array_merge($request->all(), $credential);

        $account =Account::find($id);
        if($account->UserId == $idUser){
            $account->update($result);
            return $account;}
        else return response('Acces Forbidden', 403);;
    }


    public function destroy($id)
    {
        $user=auth()->user();
        $idUser=$user->id;
        $account =Account::find($id);
        if($account !=null)
        if($account->UserId == $idUser)
            return Account::destroy($id);
        else return response('Acces Forbidden', 403);
        else return response(' Not Found', 404);
    }
}
