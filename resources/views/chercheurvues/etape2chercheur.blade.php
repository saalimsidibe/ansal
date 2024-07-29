@extends('layout.app')

@section('content')
    <main class="main">
        <div class="page-title light-background">
            <div class="container">
                <h1>Formulaire-chercheur</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li>Etape1</li>
                        <li class="current"><a href="#">Etape2</a></li>
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
                                <div class="card-head info"> Parrainage et Collège</div>
                                <div class="card-body">
    <form action="">
    @csrf
    <div class="form-group">
        <label for="nomPremierP" class="label-form">Nom du Premier Parrain</label>
        <input type="text" name="nomPremierP" id="nomPremierP" class="form-control">
    </div>
    <div class="form-group">
        <label for="prenomPremierP" class="label-form" id="prenomPremierP">Prenom du Premier Parrain</label>
        <input type="text" name="prenomPremierP" id="prenomPremierP" class="form-control">
    </div>
    <div class="form-group">
        <label for="nomDeuxiemeP" class="label-form"> Nom du Deuxième Parrain</label>
        <input type="text" name="nomDeuxiemeP" id="nomDeuxiemeP" class="form-control">
    </div>
    <div class="form-group">
        <label for="prenomDeuxiemeP" class="label-form">Prenom du Deuxième Parrain</label>
        <input type="text" name="prenomDeuxiemeP" id="prenomDeuxiemeP" class="form-control">
    </div>
    <div class="form-group">
        <label for="college" class="label-form">Collège dans lequel vous souhaitez postuler</label>
        <select name="college" id="titre" class="form-control">
            <option value="1">Sciences et Techniques</option>
            <option value="2">Sciences juridiques, politiques, économiques et de gestion</option>
            <option value="3">Sciences de la santé humaine et animale</option>
            <option value="4">Sciences naturelles et agronomiques</option>
            <option value="5">Sciences humaines, des arts, des lettres et de la communication </option>
        </select>
    </div>
    <div class="form-group">
        <label for="specialite">Precisez votre spécialité dans le collège postulé</label>
        <input type="text" name="specialite" id="specialite" class="form-control">
    </div>
    <button onclick="window.location.href='{{ route('etape3chercheur') }}'">Suivant</button>

</form>
</div>
</div>
</div>
<div class="col-2"></div>
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






