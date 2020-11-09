<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'name',
        'avatar',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['email_verified_at' => 'datetime'];


    public function getAvatarAttribute($value)
    {
        return asset($value ? 'storage/'.$value : '/images/default-avatar.webp');

    }//end getAvatarAttribute()


    /**
     * Set Avatar Attribute
     *
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);

    }//end setPasswordAttribute()


    public function timeline()
    {
        // include all of the user's tweets
        // as well as the tweets of everyone
        // they follow...in decending order by date.
        //
        $friends = $this->follows()->pluck('id');

        return Tweet::whereIn('user_id', $friends)->orWhere('user_id', $this->id)->withLikes()->latest()->paginate(50);

    }//end timeline()


    public function tweets()
    {
        return $this->hasMany(Tweet::class)->latest();

    }//end tweets()


    /**
     * Likes
     *
     * @return void
     */
    public function likes()
    {
        return $this->hasMany(Like::class);

    }//end likes()


    public function path($append='')
    {
        $path = route('profile', $this->username);

        return $append ? $path.'/'.$append : $path;

    }//end path()


}//end class
