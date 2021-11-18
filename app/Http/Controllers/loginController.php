<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class loginController extends Controller
{

    public function index(Request $request){


        $attempt = Auth::attempt(["email"=>$request->input('email'),"password" => $request->input('password')]);

        if($attempt){
            $request->session()->put('user',Auth::user());
            if (Auth::user()->role == 1) {
                return Redirect("/admin/dashboard")->with("msg","Welcome Admin");
            }else{
                return Redirect("/user/dashboard")->with("msg","Welcome User");
            }
        }else{
            return Redirect("/login_error")->with("msg","Invalid Email/Password");
        }
    }
}
