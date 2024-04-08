<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follows extends Model
{
    use HasFactory;

    protected $table = "follows";
    protected $fillable = [
        'followed_id','follower_id'
    ];


    public function follower(){
        return $this->belongsTo(User::class,'follower_id');
    }

    public function followed(){
        return $this->belongsTo(User::class,'followed_id');
    }
}
