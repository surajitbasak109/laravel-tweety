<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{


    public function show(User $user)
    {
        $tweets = $user->tweets()->withLikes()->paginate(50);

        return view('profiles.show', compact('user', 'tweets'));

    }//end show()


    public function edit(User $user)
    {
        return view('profiles.edit', compact('user'));

    }//end edit()


    /**
     * Update
     *
     * @return void
     */
    public function update(User $user)
    {
        $attributes = request()->validate(
            [
                'username' => [
                    'required',
                    'string',
                    'max:255',
                    'alpha_dash',
                    Rule::unique('users')->ignore($user),
                ],
                'name'     => [
                    'required',
                    'string',
                    'max:255',
                ],
                'avatar'   => ['file'],
                'email'    => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    Rule::unique('users')->ignore($user),
                ],
                'password' => [
                    'required',
                    'string',
                    'min:8',
                    'max:255',
                    'confirmed',
                ],
            ]
        );

        if (request('avatar')) {
            $attributes['avatar'] = request('avatar')->store('avatars');
        }

        $user->update($attributes);

        return redirect($user->path());

    }//end update()


}//end class
