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
                return redirect()->route('evaluateur.candidat',3);

            elseif ($user->categorie === 'litterature') {
                return redirect()->route('evaluateur.candidat',5);
            } elseif ($user->categorie === 'sciences') {
                return redirect()->route('evaluateur.candidat',1);
            } else if ($user->categorie === 'agricole') {
                return redirect()->route('evaluateur.candidat',4);
            } else if ($user->categorie === 'economie') {
                return redirect()->route('evaluateur.candidat',2);
            } else if ($user->categorie === 'admin') {
                return redirect()->route('evaluateur.admin');
            } else {
                echo 'erreur';
            }
        }
        return back()->withErrors([
            'email' => 'Les informations d’identification ne correspondent pas.',
        ]);
    }
}
