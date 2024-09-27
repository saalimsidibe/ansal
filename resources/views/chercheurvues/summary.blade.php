@extends('layout.app')

@section('content')
    <div class="container">
        <h2></h2>

        @if (session('successC'))
            <div class="alert alert-success">
                {{ session('successC') }}
            </div>
        @endif

        @if (session('errorC'))
            <div class="alert alert-danger">
                {{ session('errorC') }}
            </div>
        @endif


        @php

        @endphp

        <!--p><strong>Nom:</strong> {{ session('data1')['nom'] ?? 'Non renseigné' }}</p> -->

        <h1>Résumé des Informations</h1>

        <!-- Affichage des données personnelles -->

        @php

        @endphp
        <h2>Informations Personnelles</h2>
        <p><strong>Nom:</strong> {{ session('data1.nom') ?? 'Non renseigné' }}</p>
        <p><strong>Prénom:</strong> {{ session('data1.prenom') ?? 'Non renseigné' }}</p>
        <p><strong>Sexe:</strong> {{ session('data1.sexe') ?? 'Non renseigné' }}</p>
        <p><strong>Date de Naissance:</strong> {{ session('data1.datenaiss') ?? 'Non renseigné' }}</p>
        <p><strong>Categorie: Chercheur</strong></p>
        <p><strong>Titre:</strong> {{ session('data1.titre') ?? 'Non renseigné' }}</p>
        <p><strong>Date de Nomination:</strong> {{ session('data1.datenomin') ?? 'Non renseigné' }}</p>
        <p><strong>Numéro de Téléphone:</strong> {{ session('data1.numerotel') ?? 'Non renseigné' }}</p>
        <p><strong>Email:</strong> {{ session('data1.email') ?? 'Non renseigné' }}</p>
        <p><strong>Expertise:</strong> {{ session('data1.expertise') ?? 'Non renseigné' }}</p>
        <p><strong>Collège:</strong> {{ session('data2.college') ?? 'Non renseigné' }}</p>
        <p><strong>Spécialité:</strong> {{ session('data2.specialite') ?? 'Non renseigné' }}</p>

        <!-- Affichage des informations sur les parents -->
        <h2>Informations sur les Parrains</h2>
        <p><strong>Nom du Premier Parent:</strong> {{ session('data2.nomPremierP') ?? 'Non renseigné' }}</p>
        <p><strong>Prénom du Premier Parent:</strong> {{ session('data2.prenomPremierP') ?? 'Non renseigné' }}</p>
        <p><strong>Nom du Deuxième Parent:</strong> {{ session('data2.nomDeuxiemeP') ?? 'Non renseigné' }}</p>
        <p><strong>Prénom du Deuxième Parent:</strong> {{ session('data2.prenomDeuxiemeP') ?? 'Non renseigné' }}</p>


        <!-- Affichage des diplômes -->
        <h2>Diplômes</h2>
        @foreach (session('data3.diplomes', []) as $diplome)
            <div>
                <p><strong>Intitulé:</strong> {{ $diplome['intitule'] ?? 'Non renseigné' }}</p>
                <p><strong>Période:</strong> {{ $diplome['periode'] ?? 'Non renseigné' }}</p>
                <p><strong>Institution:</strong> {{ $diplome['institution'] ?? 'Non renseigné' }}</p>
                <p><strong>Ville:</strong> {{ $diplome['ville'] ?? 'Non renseigné' }}</p>
                <p><strong>Pays:</strong> {{ $diplome['pays'] ?? 'Non renseigné' }}</p>
            </div>
        @endforeach

        <!-- Affichage des expériences administratives et responsabilités -->
        <h2>Expériences Administratives et Responsabilités au plan national</h2>


        <h3>Expériences</h3>
        @foreach (session('data4.experiences', []) as $experience)
            <div>
                <p>Experience{{ $loop->iteration }}</p>
                <p><strong>Intitulé:</strong> {{ $experience['intitule'] ?? 'Non renseigné' }}</p>
                <p><strong>Type: nationale</strong></p>
                <p><strong>Début:</strong> {{ $experience['debut'] ?? 'Non renseigné' }}</p>
                <p><strong>Fin:</strong> {{ $experience['fin'] ?? 'Non renseigné' }}</p>
                <p><strong>Ville:</strong> {{ $experience['ville'] ?? 'Non renseigné' }}</p>
                <p><strong>Pays: </strong>{{ $experience['pays'] ?? 'Non renseigné' }}</p>
                <p><strong>Structure:</strong> {{ $experience['structure'] ?? 'Non renseigné' }}</p>
                <hr>
            </div>
        @endforeach

        <h3>Responsabilités</h3>
        @foreach (session('data4.responsabilites', []) as $responsabilite)
            <div>
                <p><strong>Responsabilite:{{ $loop->iteration }} </strong></p>
                <p><strong>Intitulé: </strong> {{ $responsabilite['intitule'] ?? 'Non renseigné' }}</p>
                <p><strong>Début: </strong> {{ $responsabilite['debut'] ?? 'Non renseigné' }}</p>
                <p><strong>Fin: </strong> {{ $responsabilite['fin'] ?? 'Non renseigné' }}</p>
                <p><strong>Ville: </strong> {{ $responsabilite['ville'] ?? 'Non renseigné' }}</p>
                <p><strong>Pays: </strong>{{ $responsabilite['pays'] ?? 'Non renseigné' }}</p>
                <p><strong>Structure:</strong> {{ $responsabilite['structure'] ?? 'Non renseigné' }}</p>
                <hr>
            </div>
        @endforeach

        <!-- Affichage des informations professionnelles -->
        <h2>Expériences Administratives et Responsabilités au plan international</h2>

        @if (session('data5.expprofint') == 'oui')
            <h3>Expériences Professionnelles</h3>
            @foreach (session('data5.experiences', []) as $experience)
                <div>
                    <p><strong>Experience{{ $loop->iteration }}</strong></p>
                    <p><strong>Intitulé:</strong> {{ $experience['intitule'] ?? 'Non renseigné' }}</p>
                    <p><strong>Début:</strong> {{ $experience['debut'] ?? 'Non renseigné' }}</p>
                    <p><strong>Fin:</strong> {{ $experience['fin'] ?? 'Non renseigné' }}</p>
                    <p><strong>Institution:</strong> {{ $experience['institution'] ?? 'Non renseigné' }}</p>
                    <p><strong>Ville:</strong> {{ $experience['ville'] ?? 'Non renseigné' }}</p>
                    <p><strong>Pays:</strong> {{ $experience['pays'] ?? 'Non renseigné' }}</p>
                    <hr>
                </div>
            @endforeach

            <h3>Responsabilités Professionnelles</h3>
            @foreach (session('data5.responsabilites', []) as $responsabilite)
                <div>
                    <p><strong>Responsabilite{{ $loop->iteration }}</strong></p>
                    <p><strong>Intitulé:</strong> {{ $responsabilite['intitule'] ?? 'Non renseigné' }}</p>
                    <p><strong>Début:</strong> {{ $responsabilite['debut'] ?? 'Non renseigné' }}</p>
                    <p><strong>Fin:</strong> {{ $responsabilite['fin'] ?? 'Non renseigné' }}</p>
                    <p><strong>Institution:</strong> {{ $responsabilite['institution'] ?? 'Non renseigné' }}</p>
                    <p><strong>Ville:</strong> {{ $responsabilite['ville'] ?? 'Non renseigné' }}</p>
                    <p><strong>Pays:</strong> {{ $responsabilite['pays'] ?? 'Non renseigné' }}</p>
                    <hr>
                </div>
            @endforeach
        @endif

        <!-- Affichage des publications, brevets, distinctions -->
        <h2>Ouvrages</h2>
        @foreach (session('data6.ouvrages', []) as $ouvrage)
            <div>
                <p><strong>Ouvrage{{ $loop->iteration }}</strong></p>
                <p><strong>Auteur: </strong> {{ $ouvrage['auteur'] ?? 'Non renseigné' }}</p>
                <p><strong>Co Auteur: </strong> {{ $ouvrage['coauteur'] ?? 'Non renseigné' }}</p>
                <p><strong>Année:</strong> {{ $ouvrage['annee'] ?? 'Non renseigné' }}</p>
                <p><strong>Titre:</strong> {{ $ouvrage['titre'] ?? 'Non renseigné' }}</p>
                <p><strong>Éditeur:</strong> {{ $ouvrage['editeur'] ?? 'Non renseigné' }}</p>
                <p><strong>Nombre de Pages:</strong> {{ $ouvrage['nombre_pages'] ?? 'Non renseigné' }}</p>
                <hr>
            </div>
        @endforeach


        <h2>Articles</h2>
        @foreach (session('data6.articles', []) as $article)
            <div>
                <p><strong>Article{{ $loop->iteration }}</strong></p>
                <p><strong>Auteur:</strong> {{ $article['auteur'] ?? 'Non renseigné' }}</p>
                <p><strong>Co-auteur:</strong> {{ $article['coauteur'] ?? 'Non renseigné' }}</p>
                <p><strong>Année de Publication:</strong> {{ $article['annee_publication'] ?? 'Non renseigné' }}</p>
                <p><strong>Titre:</strong> {{ $article['titre'] ?? 'Non renseigné' }}</p>
                <p><strong>Éditeur:</strong> {{ $article['editeur'] ?? 'Non renseigné' }}</p>
                <p><strong>Pages:</strong> {{ $article['pages'] ?? 'Non renseigné' }}</p>
                <hr>
            </div>
        @endforeach

        <H2>Brevets</H2>
        @foreach (session('data6.brevets', []) as $brevet)
            <div>
                <p><strong>Brevet{{ $loop->iteration }}</strong></p>
                <p><strong>Reference: </strong> {{ $brevet['reference'] ?? 'Non renseigné' }}</p>
                <p><strong>Intitule: </strong> {{ $brevet['intitule'] ?? 'Non renseigné' }}</p>
                <p><strong>Auteurs: </strong>{{ $brevet['auteur'] ?? 'Non renseigné' }}</p>
                <hr>
            </div>
        @endforeach


        <h2>Commissions</h2>
        @foreach (session('data6.commissions', []) as $comm)
            <p><strong>Commission{{ $loop->iteration }}</strong></p>
            <div>
                <p><strong>Nom: </strong> {{ $comm['name'] ?? 'Non renseigné' }}</p>
                <hr>
            </div>
        @endforeach



        <h2>Distinctions</h2>
        @foreach (session('data6.distinctions', []) as $distinction)
            <div>
                <p><strong>Distinction{{ $loop->iteration }}</strong></p>
                <p><strong>Type: </strong>{{ $distinction['type'] ?? 'Non renseigné' }}</p>
                <p><strong>Nom: </strong>{{ $distinction['nom'] ?? 'Non renseigné' }}</p>
                <p><strong>Date: </strong>{{ $distinction['date'] ?? 'Non renseigné' }}</p>
                <hr>
            </div>
        @endforeach

        <!-- Affichage des fichiers téléchargés -->
        <h2>Fichiers Téléchargés</h2>
        @foreach (session('uploaded_files', []) as $file)
            <div>


                <p><strong>Type:</strong> <?php /* {{ $file['type']}} */?></p>


                <p><strong>Nom Original:</strong> {{ $file['nom_originale'] }}</p>

                <p><strong>Chemin:</strong> <a target="_blank" href="{{ Storage::url($file['path']) }}">Voir le fichier</a>
                </p>


            </div>
        @endforeach

        <!-- Affichage de la contribution et des honneurs -->
        <h2>Contribution</h2>
        <p><strong>Contribution majeure dans les domaines du collège postulé :</strong>
            {{ session('data6.contributionChecheur') }}</p>

        </body>
        <!-- Étape 7: Fichiers joints -->


        <!-- Formulaire de soumission finale -->
        <form method="POST" action="{{ route('multi-step-form.finish') }}">
            @csrf
            <button type="submit" class="btn btn-success mt-4">Terminer et Enregistrer</button>
        </form>
    </div>
@endsection
