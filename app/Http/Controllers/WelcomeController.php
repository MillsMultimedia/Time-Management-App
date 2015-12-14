<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    public function getIndex() {
        if(\Auth::check()) {
            return redirect()->to('/books');
        }
        
        \Session::flash('flash_message', 'Please log in to continue.');
        return redirect()->to('login');
    }
}
