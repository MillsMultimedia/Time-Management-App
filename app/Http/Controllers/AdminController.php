<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function getAdmin()
    {
        $accounts = \App\Account::orderBy('name')->get();

        return view('layouts/overview')->with('accounts', $accounts);
    }

    public function getAccount($id)
    {
        $updates = \App\Update::where('account_id', $id);
        //$account = \App\Account::where('id', $id);

        //return view('layouts/update')->with('updates', $updates)->with('account', $account);

        dump($updates);
    }

}
