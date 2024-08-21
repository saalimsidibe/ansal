@extends('layout.app')

@section('content')
<div class="container">
    <h2>Résumé de vos informations</h2>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <!-- Étape 1: Informations personnelles -->
    

    
    <h3>Étape 1: Informations personnelles</h3>
    <p><strong>Nom:</strong> {{ session('data1')['nom'] ?? 'Non renseigné' }}</p>
    <p><strong>Prénom:</strong> {{ session('data1')['prenom'] ?? 'Non renseigné' }}</p>
    <p><strong>Date de naissance:</strong> {{ session('data1')['datenaiss'] ?? 'Non renseigné' }}</p>
    <p><strong>Sexe:</strong> {{ session('data1')['sexe'] ?? 'Non renseigné' }}</p>
    <p><strong>Nationalité:</strong> {{ session('data1')['nationalite']?? 'Non renseigné' }}</p>
    <p><strong>Titre:</strong> {{ session('data1')['titre']?? 'Non renseigné' }}</p>
    <p><strong>Date de nomination(Titre):</strong> {{ session('data1')['datenomin']?? 'Non renseigné' }}</p>



    <p><strong>Email:</strong> {{ session('data1')['email'] ?? 'Non renseigné' }}</p>
    <p><strong>Numéro de téléphone:</strong> {{ session('data1')['numerotel'] ?? 'Non renseigné' }}</p>
    <p> <strong>Nom du Premier Parrain</strong>{{session('data')}}</p>
    
    
    
    
    <!-- Étape 2: Informations académiques -->
    <h3>Étape 2: Informations académiques</h3>
    <p><strong>Diplôme:</strong> {{ session('data2')['diplome'] ?? 'Non renseigné' }}</p>
    <p><strong>Université:</strong> {{ session('data2')['universite'] ?? 'Non renseigné' }}</p>
    <p><strong>Année d'obtention:</strong> {{ session('data2')['annee_obtention'] ?? 'Non renseigné' }}</p>
    <p><strong>Spécialité:</strong> {{ session('specialite') ?? 'Non renseigné' }}</p>

    <!-- Étape 3: Expériences professionnelles -->
    <h3>Étape 3: Expériences professionnelles</h3>
    @foreach (session('experiences', []) as $index => $experience)
        <p><strong>Expérience {{ $index + 1 }}:</strong></p>
        <p><strong>Entreprise:</strong> {{ $experience['entreprise'] ?? 'Non renseigné' }}</p>
        <p><strong>Poste:</strong> {{ $experience['poste'] ?? 'Non renseigné' }}</p>
        <p><strong>Durée:</strong> {{ $experience['duree'] ?? 'Non renseigné' }}</p>
    @endforeach

    <!-- Étape 4: Projets réalisés -->
    <h3>Étape 4: Projets réalisés</h3>
    @foreach (session('projets', []) as $index => $projet)
        <p><strong>Projet {{ $index + 1 }}:</strong></p>
        <p><strong>Nom du projet:</strong> {{ $projet['nom_projet'] ?? 'Non renseigné' }}</p>
        <p><strong>Description:</strong> {{ $projet['description'] ?? 'Non renseigné' }}</p>
        <p><strong>Année:</strong> {{ $projet['annee'] ?? 'Non renseigné' }}</p>
    @endforeach

    <!-- Étape 5: Publications -->
    <h3>Étape 5: Publications</h3>
    @foreach (session('publications', []) as $index => $publication)
        <p><strong>Publication {{ $index + 1 }}:</strong></p>
        <p><strong>Titre:</strong> {{ $publication['titre'] ?? 'Non renseigné' }}</p>
        <p><strong>Revue:</strong> {{ $publication['revue'] ?? 'Non renseigné' }}</p>
        <p><strong>Année:</strong> {{ $publication['annee'] ?? 'Non renseigné' }}</p>
    @endforeach

    <!-- Étape 6: Contributions et distinctions -->
    <h3>Étape 6: Contributions et distinctions</h3>
    <p><strong>Commissions, sociétés savantes/comités d’experts internationaux:</strong></p>
    @foreach (session('commissions', []) as $commission)
        <p>{{ $commission }}</p>
    @endforeach

    <p><strong>Brevets obtenus:</strong></p>
    @foreach (session('brevets', []) as $brevet)
        <p>{{ $brevet['auteur'] ?? 'Non renseigné' }} - {{ $brevet['intitule'] ?? 'Non renseigné' }} ({{ $brevet['date'] ?? 'Non renseigné' }})</p>
    @endforeach

    <p><strong>Ouvrages scientifiques édités:</strong></p>
    @foreach (session('ouvrages', []) as $ouvrage)
        <p>{{ $ouvrage['auteur'] ?? 'Non renseigné' }} - {{ $ouvrage['titre'] ?? 'Non renseigné' }} ({{ $ouvrage['annee'] ?? 'Non renseigné' }})</p>
    @endforeach

    <p><strong>Articles dans des ouvrages scientifiques:</strong></p>
    @foreach (session('articles', []) as $article)
        <p><strong>Auteur:</strong> {{ $article['auteur'] ?? 'Non renseigné' }}</p>
        <p><strong>Coauteurs:</strong> {{ $article['coauteur'] ?? 'Non renseigné' }}</p>
        <p><strong>Année:</strong> {{ $article['annee_publication'] ?? 'Non renseigné' }}</p>
        <p><strong>Titre:</strong> {{ $article['titre'] ?? 'Non renseigné' }}</p>
        <p><strong>Éditeur:</strong> {{ $article['editeur'] ?? 'Non renseigné' }}</p>
        <p><strong>Pages:</strong> {{ $article['pages'] ?? 'Non renseigné' }}</p>
    @endforeach

    <p><strong>Distinctions:</strong></p>
    @foreach (session('distinctions', []) as $distinction)
        <p>{{ $distinction['nom'] ?? 'Non renseigné' }} - {{ $distinction['type'] == '1' ? 'Scientifique' : 'Sociale' }}</p>
    @endforeach

    <p><strong>Contribution scientifique majeure:</strong> {{ session('contributionChecheur') ?? 'Non renseigné' }}</p>
    <p><strong>Déclaration sur l'honneur:</strong> {{ session('honneurChercheur') ? 'Oui' : 'Non' }}</p>

    <!-- Étape 7: Fichiers joints -->
    <h3>Étape 7: Fichiers joints</h3>
    <p><strong>CV:</strong> {{ session('cvchercheurDoc') ? session('cvchercheurDoc')->getClientOriginalName() : 'Non renseigné' }}</p>
    <p><strong>Diplômes et attestations:</strong> {{ session('dipChercheurDoc') ? session('dipChercheurDoc')->getClientOriginalName() : 'Non renseigné' }}</p>
    <p><strong>Fonctions et responsabilités:</strong> {{ session('fonctionDoc') ? session('fonctionDoc')->getClientOriginalName() : 'Non renseigné' }}</p>
    <p><strong>Sociétés savantes:</strong> {{ session('societeExpertDoc') ? session('societeExpertDoc')->getClientOriginalName() : 'Non renseigné' }}</p>
    <p><strong>Brevets:</strong> {{ session('brevetDoc') ? session('brevetDoc')->getClientOriginalName() : 'Non renseigné' }}</p>
    <p><strong>Articles:</strong> {{ session('articleDoc') ? session('articleDoc')->getClientOriginalName() : 'Non renseigné' }}</p>
    <p><strong>Ouvrages scientifiques:</strong> {{ session('ouvrageDoc') ? session('ouvrageDoc')->getClientOriginalName() : 'Non renseigné' }}</p>
    <p><strong>Distinctions honorifiques:</strong> {{ session('distinctionsHonorifiquesDoc') ? session('distinctionsHonorifiquesDoc')->getClientOriginalName() : 'Non renseigné' }}</p>
    <p><strong>Distinctions scientifiques:</strong> {{ session('distinctionsScientifiquesDoc') ? session('distinctionsScientifiquesDoc')->getClientOriginalName() : 'Non renseigné' }}</p>

    <!-- Formulaire de soumission finale -->
    <form method="POST" action="{{ route('AutreControllerNouveau.finir') }}">
        @csrf
        <button type="submit" class="btn btn-success mt-4">Terminer et Enregistrer</button>
    </form>
</div>
@endsection
