<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
class logout extends Controller
{
    public function logout(){

        Session::flush();
        Auth::logout();
        return Redirect('/login')->with('msg','Logged out Successfully');
    }
}
