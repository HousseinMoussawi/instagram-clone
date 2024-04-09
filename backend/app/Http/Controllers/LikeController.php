<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Like;

class LikeController extends Controller
{
    public function like(Request $req){
       $like = new Like();
       $like->user_id = auth()->user()->id;
       $like->post_id = $req->post_id;
       $like->save();
       
       return response()->json(['message'=>'followed the user successfuly'],200);
    }

    public function destroy(Request $req){
        $follow = Like::where('user_id',$req->auth()->user()->id)->where('post_id',$req->post_id)->first();
        $follow->delete();
        return response()->json(['message'=>'like removed successfully'],200);
    }
}
