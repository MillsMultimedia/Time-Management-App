<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    public function getIndex() {
        
        if(\Auth::check()) {

            if(\Auth::user()->id == 1)
                return redirect()->to('/admin');
            else
                return redirect()->to('/tasks/'.\Auth::user()->id);
        }
        
        \Session::flash('flash_message', 'Please log in to continue.');
        return redirect()->to('login');
    }

}
