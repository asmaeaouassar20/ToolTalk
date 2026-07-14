<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

#[Fillable(['name', 'email', 'password' , 'image' , 'username' ,'bio'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    
    public function posts(){
        return $this->hasMany(Post::class);
    }

    // many to many relation : 
   public function following(){
    return $this->belongsToMany(User::class ,'followers' ,'follower_id' , 'user_id');
   }


   public function followers(){
    return $this->belongsToMany(User::class , 'followers' , 'user_id', 'follower_id' );
   }

    public function imageUrl(){
        if($this->image){
            return Storage::url($this->image);
        }
        return null;
    }


    public function isFollowedBy(?User $user){
        if(!$user){
            return false;
        }
        return $this->followers()->where('follower_id' , $user->id)->exists();
    }



    public function hasLike(Post $post){
        return $post->likes()->where('user_id' , $this->id)->exists();
    }

}
