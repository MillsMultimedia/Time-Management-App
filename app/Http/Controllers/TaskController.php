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

        //check if user is admin
        if ($user_id == 1)
            $is_admin = true;
        else
            $is_admin = false;


        //check if logged in user is on another user's page
        if ($user_id == $id || $user_id == 1)
            $user = \App\User::where('id', '=', $id)->first();
        else
            return redirect()->to('/tasks/'.$user_id);



        $tasks = $user->tasks;

        return view('layouts/tasklist')->with([
                            'user' => $user,
                            'tasks' => $tasks,
                            'is_admin' => $is_admin,
                            'total_hours' => 0,
                            ]);
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

        $task = \App\Task::find($request->task_id);
        $task->updated_at = \Carbon\Carbon::now()->toDateTimeString();
        $task->description = $request->edit_desc;
        $task->hours_spent = $request->edit_hrs;
        $task->save();

        return redirect()->to('/tasks/'.$id);

    }

    public function deleteTask($id, $task)
    {
        $task = \App\Task::find($task);

        if($task->user())
            $task->user()->detach();

        $task->delete();

        \Session::flash('flash_message', 'Task deleted.');
       
       return \Redirect::to('/tasks/'.$id);
    }

}
