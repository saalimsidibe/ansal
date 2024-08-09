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
                    //'commissions.*' => 'nullable|string|max:255',
                    'commissions.*.name' => 'nullable|string|max:255',
                    'brevets.*.date' => 'nullable|date',
                    'brevets.*.auteur' => 'nullable|string|max:255',
                    'brevets.*.reference' => 'nullable|string|max:255',
                    'contributionChecheur' => 'nullable|string|max:1000',
                    'distinctions.*.type' => 'nullable|integer|in:1,2',
                    'distinctions.*.nom' => 'nullable|string|max:255',
                    'distinctions.*.date' => 'nullable|date',
                    'ouvrages.*.auteur' => 'required|string|max:255',
                    'ouvrages.*.annee' => 'required|integer|min:1900|max:' . date('Y'), // Validation pour une année de publication valide
                    'ouvrages.*.titre' => 'required|string|max:255',
                    'ouvrages.*.editeur' => 'required|string|max:255',
                    'ouvrages.*.nombre_pages' => 'required|integer|min:1', // Doit être un nombre entier positif
                    'articles.*.auteur' => 'required|string|max:255',
                    'articles.*.coauteur' => 'nullable|string|max:255', // Coauteur peut être nullable si non obligatoire
                    'articles.*.annee_publication' => 'required|integer|min:1900|max:' . date('Y'), // Validation pour une année de publication valide
                    'articles.*.titre' => 'required|string|max:255',
                    'articles.*.editeur' => 'required|string|max:255',
                    'articles.*.pages' => 'required|integer|min:1', // Doit être un nombre entier positif
                    //'honneurChercheur' => 'nullable|string|in:checked',
                ]);

               /*  $validatedData = $request->validate([
                    'commissions.*' => 'required|string|max:255', // Le champ "name" n'est pas nécessaire ici puisque la valeur est directement dans l'array
                    'brevets.*' => 'required|string|max:255', // Assurez-vous que le champ brevets est bien une chaîne de caractères et que chaque élément est bien en string
                    'brevets.*.date' => 'required|date', // La date doit être validée comme un format de date
                    'brevets.*.intitule' => 'required|string|max:255',
                    'brevets.*.reference' => 'required|string|max:255',
                    'ouvrages.*.auteur' => 'required|string|max:255',
                    'ouvrages.*.annee' => 'required|integer|min:1900|max:' . date('Y'), // Validation pour une année de publication valide
                    'ouvrages.*.titre' => 'required|string|max:255',
                    'ouvrages.*.editeur' => 'required|string|max:255',
                    'ouvrages.*.nombre_page' => 'required|integer|min:1', // Doit être un nombre entier positif
                    'articles.*.auteur' => 'required|string|max:255',
                    'articles.*.coauteur' => 'nullable|string|max:255', // Coauteur peut être nullable si non obligatoire
                    'articles.*.annee_publication' => 'required|integer|min:1900|max:' . date('Y'), // Validation pour une année de publication valide
                    'articles.*.titre' => 'required|string|max:255',
                    'articles.*.editeur' => 'required|string|max:255',
                    'articles.*.pages' => 'required|integer|min:1', // Doit être un nombre entier positif
                    'distinctions.*.type' => 'required|string|in:1,2', // Correction pour s'assurer que le type est parmi les valeurs acceptées
                    'distinctions.*.nom' => 'required|string|max:255',
                    'distinctions.*.date' => 'required|date', // Doit être une date valide
                    'honneurChercheur' => 'required|boolean', // Validation en tant que booléen
                    'contributionChecheur' => 'required|string|max:255'
                ]); */


              //  dd($request);

                $request->session()->put('step', "7");
                $request->session()->put('data6', array_merge($request->session()->get('data6', []), $validatedData));
                return redirect()->route('etape7chercheur');
                break;
            case 7:
               // dd($request);
                try {
                   /* $validatedData = $request->validate([
                        'cvchercheurDoc' => 'required|file|mimes:pdf,doc,docx|max:2048',
                        'dipChercheurDoc' => 'required|file|mimes:pdf,doc,docx|max:2048',
                        'fonctionDoc' => 'required|file|mimes:pdf,doc,docx|max:2048',
                        'societeExpertDoc' => 'required|file|mimes:pdf,doc,docx|max:2048',
                        'brevetDoc' => 'required|file|mimes:pdf,doc,docx|max:2048',
                        'articleDoc' => 'required|file|mimes:pdf,doc,docx|max:2048',
                        'ouvrageDoc' => 'required|file|mimes:pdf,doc,docx|max:2048',
                        'distinctionsHonorifiquesDoc' => 'required|file|mimes:pdf,doc,docx|max:2048',
                        'distinctionsScientifiquesDoc' => 'required|file|mimes:pdf,doc,docx|max:2048'
                    ]);

                    $filePaths = [];

                    foreach ($validatedData as $key => $file) {
                        if ($request->hasFile($key)) {
                            $path = $file->store('temporary_files');
                            $filePaths[$key] = $path;
                        }
                    }

                    session(['filePaths' => $filePaths]);*/
                    $request->session()->put('step', "8");

                    return redirect()->route('multi-step-form.summary');
                } catch (\Exception $e) {
                    return back()->withErrors(['error' => $e->getMessage()]);
                }
                break;

            case 8:

                // $request->session()->put('salim', [4, 2]);

                return view('chercheurvues.summary');
                break;
            default:
                $request->session()->put('step', "1");
                // $request->session()->put('salim', [4, 2]);

                return view('chercheurvues.etape1chercheur');
                break;
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


    public function uploadFile(Request $request)
{
    $validatedData = $request->validate([
        'cvchercheurDoc' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        'dipChercheurDoc' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        'fonctionDoc' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        'societeExpertDoc' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        'brevetDoc' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        'articleDoc' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        'ouvrageDoc' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        'distinctionsHonorifiquesDoc' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        'distinctionsScientifiquesDoc' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
    ]);

    foreach ($validatedData as $key => $file) {
        if ($request->hasFile($key)) {
            $path = $file->store('uploads');
            session()->push('uploaded_files', ['key' => $key, 'path' => $path]);
        }
    }

    return response()->json(['success' => 'File uploaded successfully.']);
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
