<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ExploreController extends Controller
{


    /**
     * Index
     *
     * @return void
     */
    public function __invoke()
    {
        return view(
            'explore',
            [
                'users' => User::paginate(50),
            ]
        );

    }//end __invoke()


}//end class
