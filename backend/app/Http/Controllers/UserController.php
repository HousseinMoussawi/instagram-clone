<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Follows;


class UserController extends Controller
{
    public function getUser(Request $id){
        
    }

    public function suggestions(){
        
        $user = auth()->user()->id;
        if(!$user->followed()){
            $suggestions = User::all();
        }

        else{
        $followed = Follows::where('follower_id',auth()->user()->id)->pluck('followed_id');
        $followedFollowed = Follows::whereIn('follower_id',$followed)->pluck('followed_id');
        $suggestions = User::whereIn('id',$followedFollowed)->whereNotIn('id',$user->followed->followed_id)->get();
        }
        
        return response()->json(['message'=>'got suggestions successfully',
            'suggestions'=>$suggestions
    ],200);

    }
}
