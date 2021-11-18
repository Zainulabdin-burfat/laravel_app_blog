<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Models\Post;


class userController extends Controller
{
    //
    public function __construct(){

        $this->middleware('user_auth');
    }

    public function dashboard(){

        $post['posts'] = Post::Paginate(5);
        return view("user_dashboard",$post);
        // return view("user_dashboard");
    }
    
}
