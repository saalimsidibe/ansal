@extends('layout.app')

@section('content')
<div class="container">
    <h2></h2>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@php

@endphp



<h1>Résumé des Informations</h1>

    <!-- Affichage des données personnelles -->
    <h2>Informations du Profil</h2>
    <p><strong>Nom: </strong> {{ $agronome->nom ?? 'Non renseigné' }}</p>
    <p><strong>Prénom: </strong> {{ $agronome->prenom ?? 'Non renseigné' }}</p>
    <p><strong>Sexe: </strong> {{$agronome->sexe  ?? 'Non renseigné' }}</p>
    <p><strong>Date de Naissance: </strong> {{$agronome->datenaissance ?? 'Non renseigné'}}</p>
    <p><strong>Titre: </strong> {{ $agronome->titre ?? 'Non renseigné' }}</p>
    <p><strong>Date de Nomination: </strong> {{$agronome->datenomin ?? 'Non renseigné'}}</p>
    <p><strong>Numéro de Téléphone: </strong> {{$agronome->telephone  ?? 'Non renseigné' }}</p>
    <p><strong>Email: </strong> {{$agronome->email ?? 'Non renseigné' }}</p>
    <p><strong>Expertise: </strong> {{ $agronome->expertise ?? 'Non renseigné' }}</p>
    <p><strong>Collège: </strong> {{ $agronome->college ?? 'Non renseigné' }}</p>
    <p><strong>Spécialité: </strong> {{ $agronome->specialite ?? 'Non renseigné' }}</p>
    <p><strong>Travaux Significatifs: </strong>{{ $agronome->travauxSign ?? 'Non renseigné'}}</p>
    <p><strong>Implication Communautaire: </strong>{{ $agronome->communautaire ?? 'Non renseigné'}}</p>





    <!-- Affichage des informations sur les parents -->
    @foreach($agronome->parrains as $parrain)
    <h2>Informations sur les Parrains</h2>
    <p><strong>Nom du Premier Parent:</strong> {{$parrain->nomPreParrain  ?? 'Non renseigné' }}</p>
    <p><strong>Prénom du Premier Parent:</strong> {{ $parrain->PrenomPreParrain ?? 'Non renseigné' }}</p>
    <p><strong>Nom du Deuxième Parent:</strong> {{ $parrain->nomDeuxParrain ?? 'Non renseigné'}}</p>
    <p><strong>Prénom du Deuxième Parent:</strong> {{  $parrain->PrenomDeuxParrain ?? 'Non renseigné' }}</p>
    @endforeach

    <!-- Affichage des diplômes -->
    <h2>Diplômes</h2>
    @foreach ($agronome->diplomes as $diplome)
        <div>
            <h6>Diplome{{$loop->iteration}}</h6>
            <p><strong>Intitulé:</strong> {{ $diplome->nom_diplome ?? 'Non renseigné' }}</p>
            <p><strong>Période:</strong> {{ $diplome->date_acquisition ?? 'Non renseigné'}}</p>
            <p><strong>Institution:</strong> {{ $diplome->nom_college ?? 'Non renseigné' }}</p>
            <p><strong>Ville:</strong> {{ $diplome->ville ?? 'Non renseigné' }}</p>
            <p><strong>Pays:</strong> {{ $diplome->pays ?? 'Non renseigné' }}</p>
            <hr>
        </div>
    @endforeach

    <!-- Affichage des expériences administratives et responsabilités -->
    <h2>Expériences Administratives </h2>
    @foreach ($agronome->experiences as $experience)
        <div>
            <h6>Experience{{$loop->iteration}}</h6>
            <p><strong>Type: </strong>{{ $experience->type ?? 'Non renseigné' }}</p>
            <p><strong>Intitulé: </strong> {{ $experience->intitule ?? 'Non renseigné' }}</p>
            <p><strong>Début: </strong> {{ $experience->debut  ?? 'Non renseigné'}}</p>
            <p><strong>Fin: </strong> {{ $experience->fin ?? 'Non renseigné'}}</p>
            <p><strong>Structure: </strong> {{ $expNa->structure ?? 'Non renseigné' }}</p>
            <p><strong>Ville: </strong> {{ $experience->ville ?? 'Non renseigné' }}</p>
            <p><strong>Pays: </strong>{{$experience->pays ?? 'Non renseigné'}}</p>
            <hr>
        </div>
    @endforeach

    <h3>Responsabilités Administratives</h3>
    @foreach ($agronome->responsabilites as $responsabilite)
        <div>
            <h6>Responsabilite{{$loop->iteration}}</h6>
            <p><strong>Type: </strong>{{$responsabilite->type}}</p>
            <p><strong>Intitulé: </strong> {{ $responsabilite->intitule ?? 'Non renseigné' }}</p>
            <p><strong>Début: </strong> {{ $responsabilite->debut ?? 'Non renseigné' }}</p>
            <p><strong>Fin: </strong> {{ $responsabilite->fin ?? 'Non renseigné' }}</p>
            <p><strong>Structure: </strong> {{ $responsabilite->structure  ?? 'Non renseigné' }}</p>
            <p><strong>Ville: </strong> {{ $responsabilite->ville ?? 'Non renseigné' }}</p>
            <p><strong>Pays: </strong>{{$responsabilite->pays ?? 'Non renseigné'}}</p>
             <hr>
        </div>
    @endforeach

    <!-- Affichage des informations professionnelles -->




    <!-- Affichage des publications, brevets, distinctions -->
    <h2>Ouvrages</h2>
    @foreach ($agronome->ouvrages as $ouvrage)
        <div>
            <h6>Ouvrage{{$loop->iteration}}</h6>
            <p><strong>Type: </strong> {{ $ouvrage->type ?? 'Non renseigné' }}</p>
            <p><strong>Titre:</strong> {{ $ouvrage->nom ?? 'Non renseigné' }}</p>
            <p><strong>Auteur: </strong> {{ $ouvrage->nom_auteur ?? 'Non renseigné' }}</p>
            <p><strong>Co Auteur: </strong> {{ $ouvrage->nom_coauteur ?? 'Non renseigné' }}</p>
            <p><strong>Année:</strong> {{ $ouvrage->annee_publication ?? 'Non renseigné' }}</p>
            <p><strong>Éditeur:</strong> {{ $ouvrage->nom_editeur ?? 'Non renseigné' }}</p>
            <p><strong>Nombre de Pages:</strong> {{ $ouvrage->nombrePage ?? 'Non renseigné' }}</p>
            <hr>
        </div>
    @endforeach


         <h2>Articles</h2>
    @foreach ($agronome->articles as $article)
        <div>
            <h6>Article{{$loop->iteration}}</h6>
             <p><strong>Titre:</strong> {{ $article->titre ?? 'Non renseigné'}}</p>
            <p><strong>Auteur:</strong> {{ $article->auteur ?? 'Non renseigné' }}</p>
            <p><strong>Co-auteur:</strong> {{ $article->coauteur ?? 'Non renseigné' }}</p>
            <p><strong>Année de Publication:</strong> {{ $article->datePub ?? 'Non renseigné' }}</p>
            <p><strong>Éditeur:</strong> {{ $article->editeur ?? 'Non renseigné' }}</p>
            <p><strong>Pages:</strong> {{ $article->refPage ?? 'Non renseigné' }}</p>
            <hr>
        </div>
    @endforeach

    <H2>Brevets</H2>
    @foreach ($agronome->brevets as $brevet)
        <div>
            <h6>Brevet{{$loop->iteration}}</h6>
              <p><strong>Reference: </strong> {{$brevet->ref ?? 'Non renseigné' }}</p>
              <p><strong>Intitule: </strong> {{$brevet->intitule ?? 'Non renseigné' }}</p>
              <p><strong>Auteurs: </strong>{{$brevet->Auteurs ?? 'Non renseigné'}}</p>
              <p><strong>Date: </strong>{{$brevet->date ?? 'Non renseigné'}}</p>
        </div>
        <hr>
    @endforeach


        <h2>Commissions</h2>
        @foreach ($agronome->commissions as $comm)
        <h6>Commission{{$loop->iteration}}</h6>
            <div>
               <p><strong>Nom: </strong> {{$comm->nom ?? 'Non renseigné' }}</p>
            </div>
            <hr>
        @endforeach



         <h2>Distinctions</h2>
    @foreach ($agronome->distinctions as $distinction)
            <h6>Distinction{{$loop->iteration}}</h6>
    <div>
        <p><strong>Type: </strong>{{$distinction->type ?? 'Non renseigné'}}</p>
        <p><strong>Nom: </strong>{{$distinction->nom ?? 'Non renseigné'}}</p>
        <p><strong>Date: </strong>{{$distinction->date ?? 'Non renseigné'}}</p>
    </div>
        <hr>
    @endforeach



    <!-- Affichage des fichiers téléchargés -->
    <h2>Fichiers Téléchargés</h2>

    @if($agronome->categorie==='chercheur')
    @foreach ($agronome->preuveChercheurs as $file)
            <p><strong>Type:</strong>  {{ $file['type']}} </p>


            <p><strong>Nom Original:</strong> {{ $file['nom_originale'] }}</p>

            <p><strong></strong> <a target="_blank" href="{{  Storage::url($file['chemin'])  }}">Voir le fichier</a>
            </p>
        @endforeach
    @endif

    @if($agronome->categorie==='autre')
    {
        @foreach ($agronome->preuveAutres as $file)
            <p><strong>Nom Original</strong>{{$file['nom_originale']}}</p>
            <p><strong><a target="_blank" href="{{ Storage::url($file['path']) }}">Voir le fichier</a></strong></p>
        @endforeach
    }
    @endif

    <!-- Affichage de la contribution et des honneurs -->
    <h2>Contribution</h2>
    <p><strong>Contribution majeure dans les domaines du  collège postulé  :</strong> {{$agronome->contribution ??'' }}</p>

    <hr>

    <h2>Apport Particulier à l'academie</h2>
    <p><strong>{{$agronome->apport ?? 'Non renseigné' }}</strong></p>




</div>
@endsection
