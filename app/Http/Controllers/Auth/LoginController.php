<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();


            if ($user->categorie === 'medecine')
                return redirect()->route('evaluateur.medecine');

            elseif ($user->categorie === 'litterature') {
                return redirect()->route('evaluateur.litterature');
            } elseif ($user->categorie === 'sciences') {
                return redirect()->route('evaluateur.sciences');
            } else if ($user->categorie === 'agricole') {
                return redirect()->route('evaluateur.agricole');
            } else if ($user->categorie === 'economie') {
                return redirect()->route('evaluateur.economie');
            } else {
                echo 'erreur';
            }
        }
        return back()->withErrors([
            'email' => 'Les informations d’identification ne correspondent pas.',
        ]);
    }
}
