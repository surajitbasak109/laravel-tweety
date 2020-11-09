<?php

namespace App;

trait Followable
{


    public function follow(User $user)
    {
        return $this->follows()->save($user);

    }//end follow()


    public function unfollow(User $user)
    {
        return $this->follows()->detach($user);

    }//end unfollow()


    public function toggleFollow(User $user)
    {
        $this->follows()->toggle($user);

    }//end toggleFollow()


    public function follows()
    {
        return $this->belongsToMany(self::class, 'follows', 'user_id', 'following_user_id');

    }//end follows()


    public function following(User $user)
    {
        return $this->follows()->where('following_user_id', $user->id)->exists();

    }//end following()


}//end class
