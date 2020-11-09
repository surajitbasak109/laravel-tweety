<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;

trait Likable
{


    /**
     * Scope with Likes
     */
    public function scopeWithLikes(Builder $query)
    {
        $query->leftJoinSub(
            'SELECT tweet_id, SUM( liked ) likes, SUM(! liked ) dislikes FROM likes GROUP BY tweet_id',
            'likes',
            'likes.tweet_id',
            'tweets.id'
        );

    }//end scopeWithLikes()


    /**
     * Like
     *
     * @return void
     */
    public function like($user=null, $liked=true)
    {
        $this->likes()->updateOrCreate(
            [
                'user_id' => $user ? $user->id : auth()->id(),
            ],
            ['liked' => $liked]
        );

    }//end like()


    /**
     * Like
     *
     * @return void
     */
    public function dislike($user=null)
    {
        return $this->like($user, false);

    }//end dislike()


    /**
     * Is Liked by
     *
     * @return void
     */
    public function isLikedBy(User $user)
    {
        return (bool) $user->likes->where('tweet_id', $this->id)->where('liked', true)->count();

    }//end isLikedBy()


    /**
     * Is Disliked by
     *
     * @return void
     */
    public function isDislikedBy(User $user)
    {
        return (bool) $user->likes->where('tweet_id', $this->id)->where('liked', false)->count();

    }//end isDislikedBy()


    /**
     * Likes
     *
     * @return void
     */
    public function likes()
    {
        return $this->hasMany(Like::class);

    }//end likes()


}
