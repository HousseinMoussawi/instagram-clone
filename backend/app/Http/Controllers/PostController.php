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

    public function getFeedPosts(){
        $posts = Post::whereIn('user_id', function ($query)  {
            $query->select('followed_id')
                  ->from('follows')
                  ->where('follower_id', auth()->user()->id);
        })
        ->orderBy('created_at', 'desc')
        ->get();

        if(!$posts)
        return response()->json(['message'=>'no followed users or followerd users have not posts yet']);


        return response()->json([
            'message'=>'posts retreived successfully',
            'posts'=>$posts,
        ]);

    }
}
