<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Post extends Model
{
    use HasFactory;

    public static function get_post(){

        $result =  DB::table('posts')
        ->get()->toArray();


        return $result;
    }
    public static function addPost($data = null){

        return $result = DB::insert("INSERT INTO posts(user_id,title,description) Values(?,?,?)",[session('user')->id,$data['title'],$data['description']]);
    }

    public static function editPost($id = null){

        return $result =  DB::table('posts')
        ->where('post_id','=',$id)
        ->get()->toArray();
    }

    public static function updatePost($data = null){

        return $result = DB::update("UPDATE posts SET title=?, description=? WHERE post_id=?",[$data['title'],$data['description'],$data['post_id']]);
    }

    public static function deletePost($id = null){

        return $result = DB::delete("DELETE FROM posts WHERE post_id=?",[$id]);
    }

    public static function deletePost_2($ids = null){

        $result = 0;
        foreach ($ids as $key => $value) {

            $result += DB::delete("DELETE FROM posts WHERE post_id=?",[$value]);
        }

        return $result;

    }

}
