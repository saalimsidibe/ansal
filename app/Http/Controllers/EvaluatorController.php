<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class EvaluatorController extends Controller
{
    public function MedecineDashboard()
    {
        $this->authorizeCategory('medecine');
        return view('evaluator.dashboard.medecine');
    }


    public function LitteratureDashboard()
    {
        $this->authorizeCategory('litterature');
        return view('evaluator.dashboard.litterature');
    }

    private function authorizeCategory($categorie)
    {
        if (!Auth::check() || Auth::user()->categorie !== $categorie) {
            return redirect()->route('home')->withErrors([
                'error' => 'Access Refuse: Vous ne pouvez pas acceder à cette espace.',
            ]);
        }
    }
}
