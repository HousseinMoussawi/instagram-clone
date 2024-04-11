<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function createPost(Request $req)
    {
        $req->validate([
            'caption'=>'required',
            'file_path'=>'required',
            'user_id'=>'required',
        ]);

        $user_id = auth()->user()->id;

        Post::create([
            'user_id'=> $user_id,
            'caption'=>$req->caption,
            'file_path'=>$req->file_path,
        ]);

        return response()->json([
            'status'=>'success',
            'message'=>'post created successfully'],201);
    }
}
