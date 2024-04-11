<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        $ost = Post::create([
            'user_id'=> $user_id,
            

        ])

    }
}
