<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutreControllerNouveau extends Controller
{
    //

    public function etape1()
    {
        return view('autrevues.etape1autre');
    }

    public function validerEtape1(Request $request)
    {

        $donnees1 = $request->validate([
            'nomAutre' => 'required|string|max:255',
            'prenomAutre' => 'required|string|max:255',
            'sexeAu' => 'required|string|max:15|in:masculin,feminin',
            'datenaissanceAutre' => 'required|date',
            'titreAutre' => 'required|string|max:255',
            'numerotelAutre' => 'required|string|max:15',
            'emailAutre' => 'required|string|email|max:255',
        ]);

        $request->session()->put('etape1', $donnees1);

        return redirect()->route('etape2.autre');
    }

    public function validerEtape2(Request $request)
    {
        $donnees2 = $request->validate([
            'nomPremierPautre' => 'required|string|max:255',
            'prenomPremierPautre' => 'required|string|max:255',
            'nomDeuxiemePautre' => 'required|string|max:255',
            'prenomDeuxiemePautre' => 'required|string|max:255',
            'collegeAutre' => 'required|integer|in:1,2,3,4,5',
            'specialiteAutre' => 'required|string|max:255',

        ]);
        $request->session()->put('etape2', $donnees2);
        return redirect()->route('etape3.autre');
    }

    public function validerEtape3(Request $request)
    {
        $donnees3 = $request->validate([
            'diplomesAu.*.nom' => 'required|string|max:255',
            'diplomesAu.*.periode' => 'required|date',
            'diplomesAu.*.institut' => 'required|string|max:255',
            'diplomesAu.*.ville' => 'required|string|max:255',
            'diplomesAu.*.pays' => 'required|string|max:255',


        ]);
        $request->session()->put('etape3', $donnees3);

        return redirect()->route('etape4.autre');
    }

    public function validerEtape4(Request $request)
    {
        $donnees4 = $request->validate([
            'expadminAu' => 'required|string|in:oui,non',
            'fonctionsAAu.*.intitule' => 'required|string|max:255',
            'fonctionsAAu.*.debut' => 'required|date',
            'fonctionsAAu.*.fin' => 'required|date',
            'fonctionsAAu.*.structure' => 'required|string|max:255',
            'fonctionsAAu.*.ville' => 'required|string|max:255',
            'fonctionsAAu.*.pays' => 'required|string|max:255',
            'resAdau.*.intitule' => 'required|string|max:255',
            'resAdau.*.debut' => 'required|date',
            'resAdau.*.fin' => 'required|date',
            'resAdau.*.structure' => 'required|string|max:255',
            'resAdau.*.ville' => 'required|string|max:255',
            'resAdau.*.pays' => 'required|string|max:255',


        ]);

        $request->session()->put('etape4', $donnees4);

        return redirect()->route('etape5.autre');
    }

    public function validerEtape5(Request $request)
    {
        $donnees5 = $request->validate([
            'expprofintAu' => 'required|in:oui,non',
            'foncsIau.*.intitule' => 'nullable|string|max:255',
            'foncsIau.*.debut' => 'nullable|date|before_or_equal:fin',
            'foncsIau.*.fin' => 'nullable|date|after_or_equal:debut',
            'foncsIau.*.structure' => 'nullable|string|max:255',
            'foncsIau.*.pays' => 'nullable|string|max:255',
            'foncsIau.*.ville' => 'nullable|string|max:255',
            'respintAu' => 'required|in:oui,non',
            'responsibility_titles.*' => 'nullable|string|max:255',
            'responsibility_starts.*' => 'nullable|date|before_or_equal:responsibility_ends.*',
            'responsibility_ends.*' => 'nullable|date|after_or_equal:responsibility_starts.*',
            'responsibility_organizations.*' => 'nullable|string|max:255',
            'responsibility_countries.*' => 'nullable|string|max:255',
            'responsibility_cities.*' => 'nullable|string|max:255',




        ]);
        $request->session()->put('etape5', $donnees5);
        dd($request);

        return redirect()->route('etape6.autre');
    }

    public function validerEtape6(Request $request)
    {
        $donnees6 = $request->validate([
            'commissionAu.*.nom' => 'required|string|max:255',
            'titre.*' => 'required|string|max:255',
            'anneePublication.*' => 'required|integer|digits:4', // Année de publication doit être une année valide
            'nomAuteur.*' => 'required|string|max:255',
            'nomCoauteur.*' => 'nullable|string|max:255', // Coauteur peut être optionnel
            'editeur.*' => 'nullable|string|max:255',
            'nombrePage.*' => 'nullable|integer|min:1', // Nombre de pages peut être optionnel mais doit être un nombre positif
            'titreNe.*' => 'nullable|string|max:255',
            'nomAuteurNe.*' => 'nullable|string|max:255',
            'nomCoauteurNe.*' => 'nullable|string|max:255',
            'distinctionsAu.*' => 'nullable|in:honorifique,scientifique', // Valeur doit être l'une des options spécifiées
            'distinctAu' => 'nullable|string|max:255',
            'apportAu' => 'nullable|string|max:1000', // Limiter la taille du texte
            'honneurAu' => 'required|boolean',

        ]);
        $request->session()->put('etape6', $donnees6);
        dd($request);
        return redirect()->route('etapefinale.autre');
    }
}