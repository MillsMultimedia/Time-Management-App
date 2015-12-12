<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    public function getClient()
    {
        
        //$tasks = \App\Task::where('account_id', $id)->with('account')->get();


        return view('layouts/update');
        // ->with([
        //     'tasks'=>$tasks,
        //     'package_hours'=>$tasks->first()->account->package_hours,
        //     ]);

    }
}
