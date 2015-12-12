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

    public function postAccount(Request $request)
    {
        
        // echo $request->description."<br>";
        // echo $request->hrs_used."<br>";
        // echo $request->account_id;

        \DB::table('tasks')->insert([
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'description' => $request->description,
            'hours_spent' => $request->hrs_used,
            'account_id' => $request->account_id,
            'user_id' => $request->account_id,
        ]);

        return \Redirect::to('/admin/'.$request->account_id );

    }

}
