<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    /**
     * Display a listing of tasks for logged in user
     * $id = user id
     *
     */
    public function getTasks($id)
    {
        $user_id = \Auth::user()->id;


        //check if logged in user is on another user's page
        if ($user_id == $id || $user_id == 1)
            $user = \App\User::where('id', '=', $id)->first();
        else
            return redirect()->to('/tasks/'.$user_id);


        if( isset($user) )
            $tasks = $user->tasks;
        else if ($id == 1)
            \Session::flash('flash_message', 'Admin User');
        else
            return "This user does not exist";

        return view('layouts/tasklist')->with('user', $user)->with('tasks', $tasks);
    }

    /**
     * Add a new task for the specific account.
     *
     */
    public function addTask(Request $request, $id)
    {
        $task = new \App\Task();

        $task->created_at = \Carbon\Carbon::now()->toDateTimeString();
        $task->updated_at = \Carbon\Carbon::now()->toDateTimeString();
        $task->description = $request->description;
        $task->hours_spent = $request->hrs_used;

        $task->save();

        $task->user()->sync([1, $id]);

        return redirect()->to('/tasks/'.$id);

    }

    /**
     * Edit an existing task for the specific account.
     *
     */
    public function editTask(Request $request, $id)
    {

        // $task = \App\Task::where('id', '=', $request->task_id)->first();
        // $task->updated_at = \Carbon\Carbon::now()->toDateTimeString();
        // $task->description = $request->edit_desc;
        // $task->hours_spent = $request->edit_hrs;
        // $task->save();

        \DB::table('tasks')->where('id', '=', $request->task_id)->update( array(
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'description' => $request->edit_desc,
            'hours_spent' => $request->edit_hrs,
        ));

        return redirect()->to('/tasks/'.$id);

    }

}
