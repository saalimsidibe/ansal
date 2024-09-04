<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidat;
use App\Models\CommissionChercheur;
use App\Models\Diplome;
use App\Models\Experience;
use App\Models\ExpProfChercheur;
use App\Models\Ouvrage;
use App\Models\Parrain;
use App\Models\Responsabilite;
use App\Models\Commission;
use App\Models\Brevet;
use App\Models\Article;
use App\Models\Distinction;
use App\Models\PreuveAutre;

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

        return redirect()->route('etapexautre');

        // return redirect()->route('etape4.autre');
    }

    public function validerEtapeX(Request $request)
    {
        $donneesX = $request->validate([
            'travaux' => 'required|string|max:255',
            'implication' => 'required|string|max:255'
        ]);
        $request->session()->put('etapeX', $donneesX);

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
            'respintAu' => 'required|in:oui,non',
            'experiences.*.functionTitle' => 'required|string|max:255',
            'experiences.*.startDate' => 'required|date',
            'experiences.*.endDate' => 'required|date',
            'experiences.*.structure' => 'required|string|max:255',
            'experiences.*.city' => 'required|string|max:255',
            'experiences.*.country' => 'required|string|max:255',

            'responsibilities.*.responsibilityTitle' => 'required|string|max:255',
            'responsibilities.*.startDate' => 'required|date',
            'responsibilities.*.endDate' => 'required|date',
            'responsibilities.*.country' => 'required|string|max:255',
            'responsibilities.*.city' => 'required|string|max:255',
            'responsibilities.*.structure' => 'required|string|max:255',



        ]);
        $request->session()->put('etape5', $donnees5);


        return redirect()->route('etape6.autre');
    }

    public function validerEtape6(Request $request)
    {
        $donnees6 = $request->validate([
            'commissionAu.*.nom' => 'required|string|max:255',
            'edites.*.titre' => 'required|string|max:255',
            'edites.*.anneePublication' => 'required|integer|digits:4', // Année de publication doit être une année valide
            'edites.*.nomAuteur' => 'required|string|max:255',
            'edites.*.nomCoauteur' => 'nullable|string|max:255', // Coauteur peut être optionnel
            'edites.*.editeur' => 'nullable|string|max:255',
            'edites.*.nombrePage' => 'nullable|integer|min:1', // Nombre de pages peut être optionnel mais doit être un nombre positif


            'Nedites.*.titreNe' => 'nullable|string|max:255',
            'Nedites.*.nomAuteurNe' => 'nullable|string|max:255',
            'Nedites.*.nomCoauteurNe' => 'nullable|string|max:255',
            'Nedites.*.nbrePNe' => 'required|string|max:255',
            'distinctionsAu.*.type' => 'nullable|in:honorifique,scientifique', // Valeur doit être l'une des options spécifiées
            //'distinctAu' => 'nullable|string|max:255',
            'distinctionsAu.*.distinctions_nom' => 'required|string|max:255',
            'distinctionsAu.*.distinctions_date' => 'required|string|max:255',
            'contribution' => 'nullable|string|max:255',
            'apportAu' => 'nullable|string|max:1000', // Limiter la taille du texte
            'honneurAu' => 'required|boolean',

        ]);
        $request->session()->put('etape6', $donnees6);

        return redirect()->route('etapefinale.autre');
    }


    public function uploadFile(Request $request)
    {
        $fichiers = $request->validate([

            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'diplomes' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'justifications_professionnelles' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'commites' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'ouvrages' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'distinctions_honorifiques' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'distinctions_scientifiques' => 'nullable|file|mimes:pdf,doc,docx|max:2048'

        ]);

        foreach ($fichiers as $key => $file) {
            if ($request->hasFile($key)) {
                $path = $file->store('uploads');
                $type = $key;
                $nom_originale = $file->getClientOriginalName();
                session()->put('documents', ['key' => $key, 'path' => $path, 'type' => $type, 'nom_originale' => $nom_originale]);
            }
        }

        return response()->json(['success' => 'File uploaded successfully.']);

        
    }



    public function finir()
    {




        $d1 = session()->get('etape1');
        $d2 = session()->get('etape2');
        $d3 = session()->get('etape3');
        $d4 = session()->get('etape4');
        $d5 = session()->get('etape5');
        $d6 = session()->get('etape6');
        $dx = session()->get('etapeX');
        $documents = session('documents');
        dd($documents);
        $edites = $d6['edites'];
        $Nedites = $d6['Nedites'];
        $distinctions = $d6['distinctionsAu'];


        $candidat = new Candidat();
        $candidat->categorie = 'autre';
        $candidat->nom = $d1['nomAutre'];
        $candidat->prenom = $d1['prenomAutre'];
        $candidat->sexe = $d1['sexeAu'];
        $candidat->datenaissance = $d1['datenaissanceAutre'];
        $candidat->titre = $d1['titreAutre'];
        $candidat->telephone = $d1['numerotelAutre'];
        $candidat->email = $d1['emailAutre'];
        $candidat->college = $d2['collegeAutre'];
        $candidat->specialite = $d2['specialiteAutre'];
        $candidat->travauxSign = $dx['travaux'];
        $candidat->communautaire = $dx['implication'];
        $candidat->apport = $d6['apportAu'];
        $candidat->honneur = $d6['honneurAu'];
        $candidat->contribution = $d6['contribution'];

        $candidat->save();


        $parrain = new Parrain();
        $parrain->nomPreParrain = $d2['nomPremierPautre'];
        $parrain->PrenomPreParrain = $d2['prenomPremierPautre'];
        $parrain->nomDeuxParrain = $d2['nomDeuxiemePautre'];
        $parrain->PrenomDeuxParrain = $d2['prenomDeuxiemePautre'];
        $parrain->candidat_id = $candidat->id;

        $parrain->save();


        foreach ($d3['diplomesAu'] as $key => $dip) {
            $diplome = new Diplome();
            $diplome->nom_diplome = $dip['nom'];
            $diplome->date_acquisition = $dip['periode'];
            $diplome->nom_college = $dip['institut'];
            $diplome->ville = $dip['ville'];
            $diplome->pays = $dip['pays'];
            $diplome->candidat_id = $candidat->id;

            $diplome->save();
        }

        foreach ($d4['fonctionsAAu'] as $key => $ex) {
            $exp = new Experience();
            $exp->intitule = $ex['intitule'];
            $exp->type = 'nationale';
            $exp->structure = $ex['structure'];;
            $exp->debut = $ex['debut'];
            $exp->fin = $ex['fin'];
            $exp->ville = $ex['ville'];
            $exp->pays = 'Burkina Faso';
            $exp->candidat_id = $candidat->id;
            $exp->save();
        }

        foreach ($d4['resAdau'] as $key => $resp) {
            $responsabilite = new Responsabilite();
            $responsabilite->intitule = $resp['intitule'];
            $responsabilite->type = "nationale";
            $responsabilite->debut = $resp['debut'];
            $responsabilite->fin = $resp['fin'];
            $responsabilite->structure = $resp['structure'];
            $responsabilite->ville = $resp['ville'];
            $responsabilite->pays = 'Burkina Faso';
            $responsabilite->candidat_id = $candidat->id;
            $responsabilite->save();
        }



        foreach ($d5['experiences'] as $key => $ex) {
            $exp = new Experience();
            $exp->intitule = $ex['functionTitle'];
            $exp->type = 'internationale';
            $exp->structure = $ex['structure'];;
            $exp->debut = $ex['startDate'];
            $exp->fin = $ex['endDate'];
            $exp->ville = $ex['city'];
            $exp->pays = $ex['country'];
            $exp->candidat_id = $candidat->id;
            $exp->save();
        }





        foreach ($d5['responsibilities'] as $key => $resp) {
            $responsabilite = new Responsabilite();
            $responsabilite->intitule = $resp['responsibilityTitle'];
            $responsabilite->type = "internationale";
            $responsabilite->debut = $resp['startDate'];
            $responsabilite->fin = $resp['endDate'];
            $responsabilite->structure = $resp['structure'];
            $responsabilite->ville = $resp['city'];
            $responsabilite->pays =  $resp['country'];
            $responsabilite->candidat_id = $candidat->id;
            $responsabilite->save();
        }

        foreach ($d6['commissionAu'] as  $key => $comm) {
            $commission = new Commission();
            $commission->nom = $comm['nom'];
            $commission->candidat_id = $candidat->id;
            $commission->save();
        }

        //enregistrer les ouvrages non edites
        foreach ($Nedites as $Nedite) {
            $nomAuteurNe = $Nedite['nomAuteurNe'];
            $nomCoauteurNe = $Nedite['nomCoauteurNe'];
            $titreNe = $Nedite['titreNe'];
            $NbrePage = $Nedite['nbrePNe'];

            $ouvrage = new Ouvrage();
            $ouvrage->nom = $titreNe;
            $ouvrage->nom_auteur =  $nomAuteurNe;
            $ouvrage->nom_coauteur = $nomCoauteurNe;
            $ouvrage->nombrePage = $NbrePage;
            $ouvrage->type = 'non edite';
            $ouvrage->candidat_id = $candidat->id;

            $ouvrage->save();
        }

        //Pour les ouvrages edités
        foreach ($edites as $edite) {
            $nomAuteur = $edite['nomAuteur'];
            $nomCoAuteur = $edite['nomCoauteur'];
            $anneePublication = $edite['anneePublication'];
            $titre = $edite['titre'];
            $editeur = $edite['editeur'];
            $nombrePage = $edite['nombrePage'];

            $ouvrage = new Ouvrage();
            $ouvrage->nom = $titre;
            $ouvrage->nom_auteur = $nomAuteur;
            $ouvrage->nom_coauteur = $nomCoAuteur;
            $ouvrage->annee_publication = $anneePublication;
            $ouvrage->nom_editeur = $editeur;
            $ouvrage->nombrePage = $nombrePage;
            $ouvrage->type = 'edite';
            $ouvrage->candidat_id = $candidat->id;

            $ouvrage->save();
        }

        foreach ($distinctions as $distinction) {
            $type = $distinction['type'];
            $nom = $distinction['distinctions_nom'];
            $date = $distinction['distinctions_date'];

            $distinction = new Distinction();
            $distinction->type = $type;
            $distinction->nom = $nom;
            $distinction->date = $date;

            $distinction->candidat_id = $candidat->id;

            $distinction->save();
        }

        foreach ($documents as $document) {
            $preuve = new PreuveAutre();
            $preuve->type = $document['key'];
            $preuve->chemin = $document['path'];
            $preuve->nom_originale = $document['nom_originale'];
            $preuve->candidat_id = $candidat->id;

            $preuve->save();
        }
    }
}