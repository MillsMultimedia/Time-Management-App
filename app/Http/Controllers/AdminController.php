<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    
    /**
     * Shows the admin overview layout
     * 
     */
    public function getAdmin()
    {
        $accounts = \App\Account::orderBy('name')->get();

        return view('layouts/overview')->with('accounts', $accounts);
    }

    /**
     * Shows the admin view of specific clients tasks
     * 
     */
    public function getTasks($id)
    {
        $tasks = \App\Task::where('account_id', $id)->with('account')->get();

        return view('layouts/update')->with([
            'tasks'=>$tasks,
            'package_hours'=>$tasks->first()->account->package_hours,
            ]);

    }

    /**
     * Adds a new task from the admin client view
     * 
     */
    public function postTask(Request $request)
    {
        
        \DB::table('tasks')->insert([
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'description' => $request->description,
            'hours_spent' => $request->hrs_used,
            'account_id' => $request->account_id,
            'user_id' => $request->account_id,
        ]);

        //redirects to previous client view with refreshed list of tasks
        return \Redirect::to('/admin/'.$request->account_id );

    }

    /**
     * Updates a specific task from the admin view
     * 
     */
    public function updateTask(Request $request)
    {
        
        \DB::table('tasks')->where('id', '=', $request->task_id)->update( array(
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'description' => $request->edit_desc,
            'hours_spent' => $request->edit_hrs,
        ));

        //redirects to previous client view with refreshed list of tasks
        return \Redirect::to('/admin/'.$request->account_id );

    }

}
