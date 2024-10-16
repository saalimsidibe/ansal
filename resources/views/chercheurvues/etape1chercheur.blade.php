@extends('layout.app')

@section('content')
    <main class="main">
        <div class="page-title light-background">
            <div class="container">
                <h1>Formulaire-chercheur</h1>
                <nav class="breadcrumbs">
                    <ol>

                        <li class="current"><a href="#">Etape1</a></li>
                        <li>Etape2</li>
                        <li>Etape3</li>
                        <li>Etape4</li>
                        <li>Etape5</li>
                        <li>Etape6</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <div class="container">
            <section id="contact" class="contact section">
                <div class="container" data-aos="fade">
                    <div class="row ">
                        <div class="col-2"> </div>
                        <div class="col-8">
                            @error('name')
                                <div class="alert alert-danger ">{{ $message }}</div>
                            @enderror
                            <div class="card ">
                                <div class="card-head info bg-ligth"> <h3>Informations Personnelles</h3> </div>
                                <div class="card-body">
                                    <form action="{{ Route('multi-step-form.next') }}" method="POST">
                                        @csrf
                                         @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            <label for="nom" class="form-label">Nom</label>
                                            <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrez votre nom"
                                                   value="{{ old('nom', session('data1.nom')) }}" required>
                                            @error('nom')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="prenom" class="form-label">Prenom</label>
                                            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Entrez votre prénom"
                                                   value="{{ old('prenom', session('data1.prenom')) }}" required>
                                            @error('prenom')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="sexe" class="form-label">Sexe *:</label>
                                            <select name="sexe" id="sexe" class="form-control" required>
                                                <option value="">-Choisir-</option>
                                                <option value="masculin" {{ old('sexe', session('data1.sexe')) == 'masculin' ? 'selected' : '' }}>Masculin</option>
                                                <option value="feminin" {{ old('sexe', session('data1.sexe')) == 'feminin' ? 'selected' : '' }}>Féminin</option>
                                            </select>
                                            @error('sexe')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="datenaissance" class="form-label">Date de Naissance * :</label>
                                            <input type="date" class="form-control" id="datenaissance" name="datenaiss"
                                                   value="{{ old('datenaiss', session('data1.datenaiss')) }}" required>
                                            @error('datenaiss')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="titre" class="form-label">Titre *:</label>
                                            <select name="titre" id="titre" class="form-control" required>
                                                <option value="">-Choisir-</option>
                                                <option value="Maître de Recherche" {{ old('titre', session('data1.titre')) == 'Maître de Recherche' ? 'selected' : '' }}>Maître de Recherche</option>
                                                <option value="Directeur de Recherche" {{ old('titre', session('data1.titre')) == 'Directeur de Recherche' ? 'selected' : '' }}>Directeur de Recherche</option>
                                                <option value="Maître de conférence" {{ old('titre', session('data1.titre')) == 'Maître de conférence' ? 'selected' : '' }}>Maître de conférence</option>
                                                <option value="Professeur Titulaire" {{ old('titre', session('data1.titre')) == 'Professeur Titulaire' ? 'selected' : '' }}>Professeur Titulaire</option>
                                            </select>
                                            @error('titre')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="datenomin" class="form-label">Date de nomination * :</label>
                                            <input type="date" class="form-control" id="datenomin" name="datenomin"
                                                   value="{{ old('datenomin', session('data1.datenomin')) }}">
                                            @error('datenomin')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="numerotel" class="form-label">Numero de téléphone *:</label>
                                            <input type="text" class="form-control" id="numerotel" name="numerotel"
                                                   value="{{ old('numerotel', session('data1.numerotel')) }}" placeholder="Entrez votre numéro de téléphone" required>
                                            @error('numerotel')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="email" class="form-label">Email *:</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                   value="{{ old('email', session('data1.email')) }}" placeholder="Entrez votre email" required>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="expertise" class="form-label" >Domaines d'expertise</label>
                                            <input type="expertise" name="expertise" id="expertise" class="form-control" value="{{ old('expertise', session('data1.expertise')) }}">
                                        </div> <br>

                                        <button type="submit" class="btn btn-info">Suivant</button>
                                    </form>



                                </div>
                            </div>
                        </div>
                        <div class="col-2"> </div>
                    </div>
            </section>
        </div>
    </main>
@endsection


@section('scripts')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
@endsection
