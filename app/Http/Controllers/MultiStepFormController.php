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
                $request->session()->put('data3', array_merge($request->session()->get('data3', []), $validatedData));

                // Rediriger vers l'étape suivante
                $request->session()->put('step', "4"); //
                return redirect()->route('etape4chercheur');
                break;
            case 4:
                $validatedData = $request->validate([
                    'expadmin' => 'required|string|max:5|in:oui,non',
                    'respadmin' => 'required|string|max:5|in:oui,non',
                    'experiences.*.intitule' => 'required|string|max:255',
                    'experiences.*.debut' => 'required|string|max:255',
                    'experiences.*.fin' => 'required|string|max:255',
                    'experiences.*.ville' => 'required|string|max:255',
                    'responsabilites.*.intitule' => 'required|string|max:255',
                    'responsabilites.*.debut' => 'required|string|max:255',
                    'responsabilites.*.fin' => 'required|string|max:255',
                    'responsabilites.*.ville' => 'required|string|max:255',
                    'responsabilites.*.structure' => 'required|string|max:255',
                ]);
                //  dd($validatedData);

                // Stocker les données en session
                $request->session()->put('data4', array_merge($request->session()->get('data4', []), $validatedData));

                // Rediriger vers l'étape suivante
                $request->session()->put('step', "5 "); //
                return redirect()->route('etape5chercheur');
                break;
            case 5:

                $validatedData = $request->validate([
                    'expprofint' => 'required|string|in:oui,non',
                    'experiences.*.intitule' => 'required_if:expprofint,oui|string|max:255',
                    'experiences.*.periode' => 'required_if:expprofint,oui|string|max:255',
                    'experiences.*.institution' => 'required_if:expprofint,oui|string|max:255',
                    'respprofint' => 'required|string|in:oui,non',
                    'responsabilites.*.intitule' => 'required_if:respprofint,oui|string|max:255',
                    'responsabilites.*.periode' => 'required_if:respprofint,oui|string|max:255',
                    'responsabilites.*.institution' => 'required_if:respprofint,oui|string|max:255',
                ]);

                $request->session()->put('data5', array_merge($request->session()->get('data5', []), $validatedData));

                $request->session()->put('step', "6");
                return redirect()->route('etape6chercheur');
                break;

            case 6:

                $validatedData = $request->validate([
                    'commissions.*.name' => 'required|string|max:255',
                    'brevets.*.*.auteur' => 'required|string|max:255',
                    'brevets.*.date' => 'required---------',
                    'brevets.*.intitule' => 'required|string|max:255',
                    'brevets.*.reference' => 'required|string|max:255',
                    'ouvrages.*.auteur' => 'required|string|max:255',
                    'ouvrages.*.annee' => 'required|string|max:255',
                    'ouvrages.*.titre' => 'required|string|max:255',
                    'ouvrages.*.editeur' => 'required|string|max:255',
                    'ouvrages.*.nombre_page' => 'required|string|max:255',
                    'articles.*.auteur' => 'required|string|max:255',
                    'articles.*.coauteur' => 'required|string|max:255',
                    'articles.*.annee_publication' => 'required|string|max:255',
                    'articles.*.titre' => 'required|string|max:255',
                    'articles.*.editeur' => 'required|string|max:255',
                    'articles.*.pages' => 'required|string|max:255',
                    'distinctionTypeCher' => 'required|string|in:oui,non',
                    'distinctionsNomCher' => 'required|string|',
                    'dateDistinctCher' => '',
                    'distinctions.*.type' => 'required|string|in:1,2',
                    'honneurChercheur' => 'required|string|max:255',
                    'contributionChecheur' => 'required|string|max:255'
                ]);
                $request->session()->put('data6', array_merge($request->session()->get('data6', []), $validatedData));
        }
    }

    /*
     * fonction qui gère les recul
     */

    public function previous(Request $request)
    {



        $step = $request->session()->get('step');

        switch ($step) {
            case 1:
                $request->session()->put('step', "1");
                return redirect()->route('multi-step-form');

                break;
            case 2:
                $request->session()->put('step', "1");
                return redirect()->route('multi-step-form');;
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
            case 6:
                $request->session()->put('step', "5");
                return redirect()->route('etape5chercheur');
                break;
            case 7:
                $request->session()->put('step', "6");
                return redirect()->route('etape6chercheur');
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