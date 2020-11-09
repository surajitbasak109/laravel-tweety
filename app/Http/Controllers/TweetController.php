<?php

namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $tweets = Tweet::latest()->get();
        $tweets = auth()->user()->timeline();

        return view(
            'tweets.index',
            compact('tweets')
        );

    }//end index()


    public function store()
    {
        $attributes = request()->validate(['body' => 'required|max:255']);
        Tweet::create(
            [
                'user_id' => auth()->user()->id,
                'body'    => $attributes['body'],
            ]
        );

        return redirect()->route('home');

    }//end store()


}//end class
