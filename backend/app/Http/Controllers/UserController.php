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
        
        $id = auth()->user()->id;
        $user = User::find($id);
        if(!$user->following()){
            $suggestions = User::all();
        }

        else{
        $followed = Follows::where('follower_id',$user->id)->pluck('followed_id');
        $followedFollowed = Follows::whereIn('follower_id',$followed)->pluck('followed_id');


        


        $suggestions = User::whereIn('id',$followedFollowed)->whereNotIn('id', $followed)->get();
        }
        
        return response()->json(['message'=>'got suggestions successfully',
            'suggestions'=>$suggestions
    ],200);

    }
}
