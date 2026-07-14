<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    public const UPDATED_AT = null; // c'est dire à Laravel : N'essaie pas d'utiliser updated_at, il n'existe pas. Parce qu'on a utilisé seulement "created_at"
    protected $fillable = ['user_id' , 'follower_id'];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function follower(){
        return $this->belongsTo(User::class);
    }

}
