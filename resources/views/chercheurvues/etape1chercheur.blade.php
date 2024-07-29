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
                            <div class="card ">
                                <div class="card-head info"> Informations Personnelle</div>
                                <div class="card-body">
                                    <form action="">
                                        @csrf

                                        <div class="form-group">
                                            <label for="nom" class="form-label">Nom</label>
                                            <input type="text" class="form-control" id="nom" name="nom"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="prenom" class="form-label">Prenom</label>
                                            <input type="text" class="form-control" id="prenom" name="prenom"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="sexe" class="form-label">Sexe</label>
                                            <select name="sexe" id="" class="form-control">
                                                <option value="masculin">Masculin</option>
                                                <option value="feminin">Feminin</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="datenaissance" class="form-label">Date de Naissance</label>
                                            <input type="date" class="form-control" id="datenaissance" name="datenaiss"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="titre" class="form-label">Titre</label>
                                            <select name="titre" id="titre" class="form-control">
                                                <option value="1">Maître de Recherche</option>
                                                <option value="2">Directeur de Recherche</option>
                                                <option value="3">Maître de conférence</option>
                                                <option value="4">Professeur Titulaire</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="datenomin" class="form-label">Date de nomination</label>
                                            <input type="date" class="form-control" id="datenomin" name="datenomin">
                                        </div>
                                        <div class="form-group">
                                            <label for="numerotel" class="form-label">Numero de telephone</label>
                                            <input type="text" class="form-control" id="numerotel" name="numerotel">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">email</label>
                                            <input type="email" class="form-control" id="email">
                                        </div>

                                        <button type="submit" class="btn btn-info"  >Suivant</button>




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
