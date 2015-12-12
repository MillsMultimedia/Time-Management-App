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
        $tasks = \App\Task::where('account_id', $id)->with('account')->get();

        // $total_hours = 0;

        // foreach ($tasks as $task)
        // {
        //     $total_hours += $task->hours_spent;
        // }

        // $remaining_hours = $tasks->first()->account->package_hours - $total_hours;

        return view('layouts/update')->with([
            'tasks'=>$tasks,
            //'total_hours'=>$total_hours,
            'package_hours'=>$tasks->first()->account->package_hours,
            ]);

    }

}
