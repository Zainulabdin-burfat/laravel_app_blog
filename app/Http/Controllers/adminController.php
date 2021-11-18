<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Models\Post;
// use App\Models\Category;

class adminController extends Controller
{
    // Post::where('category.category_type',1)->with('Category');
    //
    // $query = "SELECT * FROM employees ORDER BY DESC limit 1,1";
    // NOW()
    // DATE()
    public function __construct(){

        $this->middleware('_auth');
    }

    public function dashboard(){

        // $post['posts'] = Post::get_post();
        $post['posts'] = Post::orderby('post_id',"DESC")->Paginate(5);
        return view("dashboard",$post);
    }

    public function addPost(Request $request){

        $result = Post::addPost($request->all());

        if ($result) {
            return Redirect('/admin/dashboard')->with('msg','Post Added Successfully');
        }else{
            return Redirect('/admin/dashboard')->with('msg','Post Not Added');
        }
    }
    public function editPost(Request $request){

        $result['post'] = Post::editPost($request->id);
        return view("edit_post",$result);
    }

    public function updatePost(Request $request){

        $result = Post::updatePost($request->all());

        if ($result) {
            return Redirect('/admin/dashboard')->with('msg','Post Updated Successfully');
        }else{
            return Redirect('/admin/dashboard')->with('msg','Post Not Updated');
        }
    }

    public function deletePost(Request $request){

        $result = Post::deletePost($request->id);

        if ($result) {
            return Redirect('/admin/dashboard')->with('msg','Post Deleted Successfully');
        }else{
            return Redirect('/admin/dashboard')->with('msg','Post Not Deleted');
        }
    }

    public function deletePost_2(Request $request){

        $result = Post::deletePost_2($request->options);
        if ($result) {
            return Redirect('/admin/dashboard')->with('msg',"$result: Posts Deleted Successfully");
        }else{
            return Redirect('/admin/dashboard')->with('msg','Posts Not Deleted');
        }
    }
    
    
}
