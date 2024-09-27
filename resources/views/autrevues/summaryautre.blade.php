@extends('layout.app')

@section('content')
<div class="container">
    <h2>Résumé de vos informations</h2>
 
         <!-- Affichage des messages de succès -->
     <!-- Affichage des messages de succès -->


    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <!-- Affichage des messages d'erreur -->
   
         @if(session('error'))
         <div class="alert alert-danger">
            {{session('error')}}
         </div>
         @endif

    

    <!-- Étape 1: Informations personnelles -->
    

    
    <h3>Informations personnelles</h3>
    <p><strong>Nom:</strong> {{ session('etape1.nomAutre') ?? 'Non renseigné' }}</p>
    <p><strong>Prénom:</strong> {{ session('etape1.prenomAutre') ?? 'Non renseigné' }}</p>
    <p><strong>Date de naissance:</strong> {{ session('etape1.datenaissanceAutre') ?? 'Non renseigné' }}</p>
    <p><strong>Sexe:</strong> {{ session('etape1.sexeAu') ?? 'Non renseigné' }}</p>
    <p><strong>Numero de Téléphone:</strong> {{ session('etape1.numerotelAutre')?? 'Non renseigné' }}</p>
     <p><strong>Categorie: Autre</strong></p>
    <p><strong>Titre:</strong> {{ session('etape1.titreAutre') ?? 'Non renseigné' }}</p>
    <p> <strong>Email:</strong>{{ session('etape1.emailAutre') ?? 'Non renseigné' }}</p>
    <p> <strong>Nom du Premier Parrain: </strong>{{session('etape2.nomPremierPautre') ?? 'Non renseigné'}}</p>
    <p> <strong>Prénom du Premier  Parrain: </strong>{{session('etape2.prenomPremierPautre') ?? 'Non renseigné'}}</p>
    <p> <strong>Nom du Deuxième Parrain: </strong>{{session('etape2.nomDeuxiemePautre') ?? 'Non renseigné'}} </p>
    <p> <strong>Prenom du Deuxième Parrain: </strong>{{session('etape2.prenomDeuxiemePautre') ?? 'Non renseigné'}} </p>
    <p> <strong>Collège dans lequel vous souhaitez postuler</strong>{{ session('etape2.collegeAutre') ?? 'Non renseigné'}}</p>
    <p> <strong>Spécialité  dans le  postulé </strong>{{ session('etape2.specialiteAutre') ?? 'Non renseigné'}}</p>
    
     
    
    
 

    @php
    $diplomes=session('etape3')['diplomesAu'] ?? [];
    @endphp

    @php
         $experiencesNat=session('etape4')['fonctionsAAu'] ?? [];
         $compExpNat=1;
    @endphp

    @php
        $respsNat=session('etape4')['fonctionsAAu'];
        $compteurRespNat=1;
    @endphp
    
  @php
      $experiencesInt=session('etape5')['experiences'];
      $comptExpInt=1;
  @endphp

  @php
      $respsInt=session('etape5')['responsibilities'];
      $compteurRespInt=1;
  @endphp

  @php
      $commissionsAu=session('etape6')['commissionAu'];
      $compteurCommAu=1;
  @endphp

  @php
   
    $edites=session('etape6')['edites'];
    $cmpEdites=1;
  @endphp

  @php
      $nedites=session('etape6')['Nedites'];
      $comptNedites=1;
  @endphp

  @php
      $distinctions=session('etape6')['distinctionsAu'];
      $cmptdisctions=1;
  @endphp

  @php
      $contribution=session('etape6')['contribution']
  @endphp

@php
    $documents=session('documents', []);
@endphp


 <!-- Étape 2 : Informations Academiques -->
    <h3> Informations académiques</h3>
    @foreach ($diplomes as $diplome)
        <p><strong>Diplôme:</strong> {{$diplome['nom']  ?? 'Non renseigné' }}</p>
        <p><strong>Université:</strong> {{ $diplome['institut'] ?? 'Non renseigné' }}</p>
        <p><strong>Année d'obtention:</strong> {{$diplome['periode'] ?? 'Non renseigné' }}</p>
        <p> <strong>Ville:</strong>{{$diplome['ville'] ?? 'Non renseigné' }}</p>
        <p> <strong>Pays:</strong>{{$diplome['pays'] ?? 'Non renseigné' }}</p>
        <hr>
    @endforeach


     <!-- Étape 3: Contributions et Travaux les plus significatifs -->
    <h3> Contributions et Travaux les plus significatifs</h3>
    <p> <Strong>{{session('etapeX.travaux')?? 'Non renseigné'}}</Strong></p>

     <!-- Étape 3: Contributions et Travaux les plus significatifs -->    
    <h3>Implication dans la vie communautaire</h3>
    <p> <strong>{{session('etapeX.implication')}}</strong></p>




    <!-- Étape 4: Expériences professionnelles -->
    <h3> Expériences professionnelles au plan national</h3>
    @foreach ( $experiencesNat as $experienceNat)
        <p><strong> Expérience{{ $compExpNat}} </strong>: {{$experienceNat['intitule'] ?? 'Non renseigné'}} </p>
        <p><strong>Structure:</strong> {{ $experienceNat['structure'] ?? 'Non renseigné' }}</p>
        <p><strong>Debut:</strong> {{ $experienceNat['debut'] ?? 'Non renseigné' }}</p>
        <p><strong>Fin:</strong> {{ $experienceNat['fin'] ?? 'Non renseigné' }}</p>
        <p><strong>Ville:</strong> {{ $experienceNat['ville'] ?? 'Non renseigné' }}</p> 
        <p><strong>Pays:</strong> {{ $experienceNat['pays'] ?? 'Non renseigné' }}</p>
      <hr>
        @php
            $compExpNat++;
        @endphp
    @endforeach


     <!-- Étape : Responsabilites professionnelles au plan nationale -->
    <h3> Etape: Responsabilités professionnelles au plan national </h3>
    @foreach ( $respsNat as $respNat )
      <p><strong> Responsabilite{{ $compteurRespNat}} </strong>: {{$respNat['intitule'] ?? ''}} </p>
        <p><strong>Structure:</strong> {{$respNat['structure'] ?? 'Non renseigné' }}</p>
        <p><strong>Debut:</strong> {{ $respNat['debut'] ?? 'Non renseigné' }}</p>
        <p><strong>Fin:</strong> {{ $respNat['fin'] ?? 'Non renseigné' }}</p>
        <p><strong>Ville:</strong> {{ $respNat['ville'] ?? 'Non renseigné' }}</p> 
        <p><strong>Pays:</strong> {{ $respNat['pays'] ?? 'Non renseigné' }}</p>
        <hr>
        @php
            $compteurRespNat++;
        @endphp
    @endforeach



  <!-- Étape : Expériences professionnelles au plan internationale -->
 <h3>Étape  : Expériences professionnelles au plan international</h3>
    @foreach (  $experiencesInt as $experienceInt)
        <p><strong> Expérience  {{$comptExpInt}} </strong>: {{$experienceInt['functionTitle'] ?? ''}} </p>
        <p><strong>Structure:</strong> {{ $experienceInt['structure']  ?? 'Non renseigné' }}</p>
        <p><strong>Debut:</strong> {{ $experienceInt['startDate'] ?? 'Non renseigné' }}</p>
        <p><strong>Fin:</strong> {{ $experienceInt['endDate'] ?? 'Non renseigné' }}</p>
        <p><strong>Ville:</strong> {{ $experienceInt['city'] ?? 'Non renseigné' }}</p> 
        <p><strong>Pays:</strong> {{ $experienceInt['country'] ?? 'Non renseigné' }}</p>
      <hr>
        @php
            $comptExpInt++
        @endphp
    @endforeach



     <!-- Étape : Responsabilites professionnelles au plan internationale -->
    <h3> Etape: Responsabilités professionnelles au plan international </h3>
    @foreach ( $respsInt as $respInt  )
      <p><strong> Responsabilite{{$compteurRespInt }} </strong>: {{$respInt['responsibilityTitle'] ?? 'Non renseigné'}} </p>
        <p><strong>Structure:</strong> {{$respInt['structure'] ?? 'Non renseigné' }}</p>
        <p><strong>Debut:</strong> {{ $respInt['startDate'] ?? 'Non renseigné' }}</p>
        <p><strong>Fin:</strong> {{ $respInt['endDate'] ?? 'Non renseigné' }}</p>
        <p><strong>Ville:</strong> {{ $respInt['city'] ?? 'Non renseigné' }}</p> 
        <p><strong>Pays:</strong> {{ $respInt['country'] ?? 'Non renseigné' }}</p>
        <hr>
        @php
           $compteurRespInt++;
        @endphp
    @endforeach


    <!-- Étape : Associations, commissions, réseaux, comités d’experts internationaux d’appartenance  -->
    <h3>Étape : Associations, commissions, réseaux, comités d’experts internationaux d’appartenance </h3>
    @foreach ($commissionsAu as $com)
        <p><strong>Association/Commission  {{  $compteurCommAu }}:</strong>{{ $com['nom'] ?? 'Non renseigné' }}</p>
        <hr>
        @php
             $compteurCommAu++;
        @endphp
    @endforeach

    <!-- Étape : Œuvres, ouvrages et principaux documents édités dont vous êtes auteur ou coauteur  -->
    <h3>Étape :  Œuvres, ouvrages et principaux documents édités dont vous êtes auteur ou coauteur </h3>
    @foreach ($edites as $edite)
         <p><strong>Ouvrage  {{ $cmpEdites }}:</strong>{{ $edite['titre'] ?? 'Non renseigné' }}</p>
         <p><strong>Auteur(s):</strong>{{ $edite['nomAuteur'] ?? 'Non renseigné' }}</p>
         <p><strong>Co auteur(s): </strong>{{ $edite['nomCoauteur'] ?? 'Non renseigné' }}</p>
         <p><strong>Année de Publication: </strong>{{ $edite['anneePublication'] ?? 'Non renseigné' }}</p>
         <p><strong>Editeur: </strong>{{ $edite['editeur'] ?? 'Non renseigné' }}</p>
         <p><strong>Nombre de Pages</strong>{{ $edite['nombrePage'] ?? 'Non renseigné' }}</p>
         <hr>
         @php
            $cmpEdites++; 
         @endphp

    @endforeach

     <h3>Étape :  Œuvres, ouvrages et principaux documents non édités dont vous êtes auteur ou coauteur </h3>
      <!-- Étape : Œuvres, ouvrages et principaux documents non édités dont vous êtes auteur ou coauteur  -->
    @foreach ($nedites as $ne)
         <p><strong>Ouvrage  {{  $comptNedites }}:</strong>{{ $ne['titreNe'] ?? 'Non renseigné' }}</p>
         <p><strong>Auteur(s):</strong>{{  $ne['nomAuteurNe'] ?? 'Non renseigné' }}</p>
         <p><strong>Co auteur(s): </strong>{{  $ne['nomCoauteurNe'] ?? 'Non renseigné' }}</p>  
         <p><strong>Nombre de Pages</strong>{{ $ne['nbrePNe'] ?? 'Non renseigné' }}</p>

        <hr>
        @php
            $comptNedites++; 
         @endphp

    @endforeach



  

    

   

    <H3>Distinctions</H3>
    @foreach ( $distinctions  as $distinction )
       <p> <strong>Distinction {{$cmptdisctions}}</strong>  </p>
        <p> <strong>Type:</strong>{{ $distinction['type'] ?? 'Non renseigné' }}</p>
        <p> <strong>Nom:</strong>{{ $distinction['distinctions_nom'] ?? 'Non renseigné' }}</p>
        <p> <strong>Date:</strong>{{ $distinction['distinctions_date'] ?? 'Non renseigné' }}</p>
        <hr>
        @php
        $cmptdisctions++;    
        @endphp
    @endforeach

     <H3>Contribution Majeure dans les domaines du collège postulé</H3>:
   <p>{{session('etape6')['contribution']?? 'Non renseigné'}}</p> 
<hr>

   <h3>Apport Particulier à l'academie</h3>
   <p>{{session('etape6')['apportAu']?? 'Non renseigné'}}</p>
<hr>
   

    <!-- Étape 7: Fichiers joints -->
    <h3> Fichiers joints</h3>
    <p><strong>CV:</strong> {{ session('cvchercheurDoc') ? session('cvchercheurDoc')->getClientOriginalName() : 'Non renseigné' }}</p>
    <p><strong>Diplômes et attestations:</strong> {{ session('dipChercheurDoc') ? session('dipChercheurDoc')->getClientOriginalName() : 'Non renseigné' }}</p>
    <p><strong>Fonctions et responsabilités:</strong> {{ session('fonctionDoc') ? session('fonctionDoc')->getClientOriginalName() : 'Non renseigné' }}</p>
    <p><strong>Sociétés savantes:</strong> {{ session('societeExpertDoc') ? session('societeExpertDoc')->getClientOriginalName() : 'Non renseigné' }}</p>
    <p><strong>Brevets:</strong> {{ session('brevetDoc') ? session('brevetDoc')->getClientOriginalName() : 'Non renseigné' }}</p>
    <p><strong>Articles:</strong> {{ session('articleDoc') ? session('articleDoc')->getClientOriginalName() : 'Non renseigné' }}</p>
    <p><strong>Ouvrages scientifiques:</strong> {{ session('ouvrageDoc') ? session('ouvrageDoc')->getClientOriginalName() : 'Non renseigné' }}</p>
    <p><strong>Distinctions honorifiques:</strong> {{ session('distinctionsHonorifiquesDoc') ? session('distinctionsHonorifiquesDoc')->getClientOriginalName() : 'Non renseigné' }}</p>
    <p><strong>Distinctions scientifiques:</strong> {{ session('distinctionsScientifiquesDoc') ? session('distinctionsScientifiquesDoc')->getClientOriginalName() : 'Non renseigné' }}</p>


     @if (count($documents) > 0)
    @foreach ($documents as $document)
        @if (is_array($document)) <!-- Vérifiez que c'est un tableau -->
            <div class="document-item">
                <h4>{{ $document['nom_originale'] }}</h4>
                
                <a href="{{ asset('storage/' . $document['path']) }}" target="_blank">Voir le document</a>
            </div>
        @else
            <p>Document non valide.</p>
        @endif
    @endforeach
@else
    <p>Aucun document trouvé.</p>
@endif
    <!-- Formulaire de soumission finale -->
    <form method="POST" action="{{ route('AutreControllerNouveau.finir') }}">
        @csrf
      <center><button type="submit" class="btn btn-success mt-4">Terminer et Enregistrer</button></center>   
    </form>
</div>
@endsection
