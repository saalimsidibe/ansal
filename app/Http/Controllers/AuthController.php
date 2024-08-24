<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class AuthController extends Controller
{
    //

    public function showLoginForm()
    {
         return view('auth.login');
    }

    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Redirection basée sur la catégorie
            switch($user->categorie)
            {
                case 'medecine':
                    return redirect::route('evaluator.dashbord.medecine');

                case 'litterature':
                    return redirect::route('evaluator.dashboard.litterature');
                    // les autres à ajotuer
            }
        }
        

     

        
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::route('login');
    }
}