<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function comment(Request $req)
    {
        $req->validate([
            'post_id'=>'required',
            'content'=>'required',
        ]);

        $comment = Comment::create([
            'user_id'=>auth()->user()->id,
            'content'=> $req->content,
            'post_id'=>$req->post_id,
        ]);

        return response()->json(['message'=>'commented successfully on post']);
        
    }

    public function destroy (Request $req)
    {
        $comment = Comment::where('user_id',auth()->user()->id)->where('post_id', $req->id)->first();
        $comment->delete();
        return response()->json([],204);
       }
}

