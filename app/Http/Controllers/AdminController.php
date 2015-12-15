<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    /**
     * Display a listing of the user accounts.
     *
     */
    public function getIndex()
    {
        
       
        if (\Auth::user()->id != 1)
        {
            \Session::flash('flash_message', 'You have tried to reach an unauthorized page.');
            return redirect()->to('/');
        }


        $users = \App\User::get();

        return view('layouts/overview')->with('users', $users);
    }


    /**
     * Edit a user account
     *
     */
    public function editUser(Request $request)
    {

        $user = \App\User::find($request->user_id);
        $user->name = $request->edit_contact;
        $user->business_name = $request->edit_name;
        $user->email = $request->edit_email;
        $user->package_hours = $request->edit_package;
        $user->save();

        return redirect()->to('/admin');
    }

    public function deleteUser($id)
    {
        $user = \App\User::find($id);

        if($user->tasks())
            $user->tasks()->detach();

        $user->delete();

        \Session::flash('flash_message', 'User account deleted.');
       
       return \Redirect::to('/admin');
    }

}
