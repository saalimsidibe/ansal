@extends('layout.app')

@section('content')
    <main class="main">
        <div class="page-title light-background">
            <div class="container">
                <h1>Formulaire-chercheur</h1>
                <nav class="breadcrumbs">
                    <ol>

                        <li >Etape1</li>
                        <li>Etape2</li>
                        <li>Etape3</li>
                        <li>Etape4</li>
                        <li>Etape5</li>
                        <li>Etape6</li>
                        <li class="current"> <a href="#">Etape Finale</a></li>
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
                                <div class="card-head info"> Informations Personnelles</div>
                                <div class="card-body">
    <form action="">
        @csrf
        <div class="form-group">
            <label for="cvchercheurDoc">Joindre une copie de votre cv</label><br>
            <input type="file" class="form-control" name="cv">
        </div>
        <div class="form-group">
            <label for="dipChercheurDoc">Joindre un fichier unique composé de l'ensemble des diplomes et attestations</label> <br>
            <input type="file" class="form-control" name="diplomes">
        </div>
        <div class="form-group">
            <label for="fonctionDoc">Joindre un fichier unique composé de l'ensemble des arrêtés justifiants les fonctions et responsabiltés professionnelles</label><br>
            <input type="file" class="form-control" name="justifications_professionnelles">
        </div>
        <div class="form-group">
            <label for="societeExpertDoc">Joindre un fichier unique justifiant l'appartenance à un ou plusieurs comités ou sociétés savantes</label><br>
            <input type="file" class="form-control" name="commites">
        </div>
       
       
        <div class="form-group">
            <label for="">Joindre un fichier unique contenant l'ensemble de vos ouvrages .Pour chaque ouvrage il est demandé une à deux pages sur  la/lesquelles on peut distinguer  le titre, les auteurs et l'éditeur</label>
            <input type="file" name="ouvrages" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Joindre un fichier unique contenant l'ensemble de vos  distinctions honorifiques</label>
             <input type="file" name="distinctions_honorifiques" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Joindre un fichier unique contenant l'ensemble des distinctions scientifiques </label><br>
            <input type="file" name= "distinctions_scientifiques">
        </div>
        <input type="submit" class="btn btn-danger mt-4" a href="{{ route('resume') }}">Suivant</button>
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
