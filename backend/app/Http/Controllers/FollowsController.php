<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follows;

class FollowsController extends Controller
{
    public function follow(Request $req){
        $follow = new Follows();
        $follow->follower_id = auth()->user()->id;
        $follow->followed_id = $req->followed_id;
        $follow->save();

        return response()->json(['message'=>'followed user successfully'],201);
    }

    public function destroy(Request $req){
        $follow = Follows::where('follower_id',auth()->user()->id)->where('followed_id',$req->followed_id)->first();

        $follow->delete();
        return response()->json(['message'=>'unfollowed the user successfully'],204);
    }
}