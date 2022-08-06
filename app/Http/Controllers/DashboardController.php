<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index() {
        $users = [];

        If(Auth::check() && Auth::user()->is_admin) {
            $users = User::get([
                    'id',
                    'user_name',
                    'last_name',
                    'first_name',
                    'email',
                    'phone',
                    'address',
                    'zip_code',
                    'town',
                    'comment'
                ])
                ->where('id', '<>', Auth::id());
        }

        return Inertia::render('Dashboard', [
            'users' => $users
        ]);
    }

    public function edit($userId) {
        If(Auth::check() && Auth::user()->is_admin) {
            $user = User::find($userId);

            if ($user) {
                return Inertia::render('EditUser', [
                    'user' => $user
                ]);
            }
            return back()->with('error', 'Utilisateur inexistant');
        }
        
        return back()->with('error', 'Droits administrateur requis');
    }
}