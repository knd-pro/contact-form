<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function destroy(User $user) {
        $username = $user->user_name;
        $user->delete();

        return back()->with('message', 'Utilisateur "' . $username . '" supprimé de la base !');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'user_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10',
            'address' => 'required|string|max:255',
            'zip_code' => 'required|numeric',
            'town' => 'required|string|max:255',
            'comment' => 'required|string|max:255'
        ]);

        if (!empty($request['password'] && !empty($request['password_confirmation']))) {
            $request->validate([
                'password' => ['confirmed', Rules\Password::defaults()],
            ]);
            $request['password'] = Hash::make($request->password);
        } else {
            unset($request['password']);
        }

        $user->fill($request->all())->save();

        return redirect(RouteServiceProvider::HOME)->with('message', 'L\'utilisateur à bien été modifié !');
    }
}
