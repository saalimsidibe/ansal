<?php
// app/Http/Controllers/MultiStepFormController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MultiStepFormController extends Controller
{
    public function index(Request $request)
    {

        $request->session()->put('step', "1");
        // $request->session()->put('salim', [4, 2]);

        return view('chercheurvues.etape1chercheur');
    }


    /**
     * Fonction  qui gère les avancement
     */
    public function next(Request $request)
    {

        $step = $request->session()->get('step');
        //dd($step);

        switch ($step) {
            case 1:

                /**
                 * controles des données envoyé et  et l'on stoc dabs la session
                 */
                //dd($step);

                $validatedData = $request->validate([
                    'nom' => 'required|string|max:255',
                    'prenom' => 'required|string|max:255',
                    'sexe' => 'required|string|max:15|in:feminin,masculin',
                    'datenaiss' => 'required|date',
                    'titre' => 'required|integer|in:1,2,3,4,5',
                    // 'datenomin' => 'required|date', // Décommentez cette ligne si ce champ est nécessaire
                    'numerotel' => 'required|string|max:15', // Limite de longueur typique pour un numéro de téléphone
                    'email' => 'required|string|email|max:255',

                    // Ajoutez ici les règles de validation pour les autres champs
                ]);
                ///  dd($step);

                // Stockage des données validées dans la session
                $request->session()->put('data1', [
                    'nom' => $validatedData['nom'],
                    'prenom' => $validatedData['prenom'],
                    'nom' => $validatedData['nom'],
                    'prenom' => $validatedData['prenom'],
                    'sexe' => $validatedData['sexe'],
                    'datenaiss' => $validatedData['datenaiss'],
                    'titre' => $validatedData['titre'],
                    'datenomin' => $request['datenomin'],
                    'numerotel' => $validatedData['numerotel'],
                    'email' => $validatedData['email']

                ]);

                $request->session()->put('step', "2");
                return redirect()->route('etape2chercheur');
                break;
            case 2:


                $validatedData = $request->validate([
                    'nomPremierP' => 'required|string|max:255',
                    'prenomPremierP' => 'required|string|max:255',
                    'nomDeuxiemeP' => 'required|string|max:255',
                    'prenomDeuxiemeP' => 'required|string|max:255',
                    'college' => 'required|integer|in:1,2,3,4,5',
                    'specialite' => 'required|string|max:255',
                ]);

                // Stocker les données en session
                $request->session()->put('data2', array_merge($request->session()->get('data2', []), $validatedData));

                // Rediriger vers l'étape suivante ou finaliser
                $request->session()->put('step', "3"); //
                return redirect()->route('etape3chercheur');
                break;
            case 3:
                $validatedData = $request->validate([
                    'diplomes.*.intitule' => 'required|string|max:255',
                    'diplomes.*.periode' => 'required|string|max:255',
                    'diplomes.*.institution' => 'required|string|max:255',
                ]);

                // Stocker les données en session
                $request->session()->put('data3', array_merge(  $request->session()->get('data3', []), $validatedData));

                // Rediriger vers l'étape suivante
                $request->session()->put('step', "4"); //
                return redirect()->route('etape4chercheur');
                break;
            case 4:
                    /* $validatedData = $request->validate([
                        'diplomes.*.intitule' => 'required|string|max:255',
                        'diplomes.*.periode' => 'required|string|max:255',
                        'diplomes.*.institution' => 'required|string|max:255',
                    ]); */

                    // Stocker les données en session
                    // $request->session()->put('data3', array_merge(  $request->session()->get('data3', []), $validatedData));

                    // Rediriger vers l'étape suivante
                    $request->session()->put('step', "5 "); //
                    return redirect()->route('etape4chercheur');
                    break;

        }
    }

    /***
     * fonction qui gère les recul
     */

    public function previous(Request $request)
    {



        $step = $request->session()->get('step');

        switch ($step) {
            case 1:
                $request->session()->put('step', "1");
                return redirect()->route('etape2chercheur');

                break;
            case 2:
                $request->session()->put('step', "1");
                return redirect()->route('etape1chercheur');;
                break;
            case 3:
                $request->session()->put('step', "2");
                return redirect()->route('etape2chercheur');;
                break;
            case 4:
                $request->session()->put('step', "3");
                return redirect()->route('etape3chercheur');;
                break;
            case 5:
                $request->session()->put('step', "4");
                return redirect()->route('etape4chercheur');;
                break;
                break;
        }
    }


    // app/Http/Controllers/MultiStepFormController.php

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenoms' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'titre' => 'required|string|max:255',
            'tel_mobile' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);

        // Traitez les données validées ici (par exemple, sauvegardez-les en base de données)

        // Redirigez l'utilisateur vers une page de confirmation ou une autre étape du processus
    }
}
