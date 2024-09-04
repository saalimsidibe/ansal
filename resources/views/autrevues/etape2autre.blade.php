@extends('layout.app')

@section('content')
    <main class="main">
        <div class="page-title light-background">
            <div class="container">
                <h1>Formulaire-Autre</h1>
                <nav class="breadcrumbs">
                    <ol>

                        <li>Etape1</li>
                        <li class="current"><a href="#">Etape2</a></li>
                        <li>Etape3</li>
                        <li>Etape4</li>
                        <li>Etape5</li>
                        <li>Etape6</li>
                        <li>Etape7</li>
                        <li> Etape Finale</li>
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
                                <div class="card-head info bg-light ">  <H3>Parrainage et College</H3></div>
                                <div class="card-body">
    <form action="{{Route('valider2.autre')}}" method="POST">
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
            <label for="nomPremierPautre" class="label-form" >Nom du Premier Parrain</label>
            <input type="text" name="nomPremierPautre" id="nomPremierPautre"  value="{{old('nomPremierPautre',session('etape2.nomPremierPautre',''))}}"     class="form-control">
        </div>
        <div class="form-group">
            <label for="prenomPremierPautre" class="label-form" id="prenomPremierPautre">Prenom du Premier Parrain</label>
            <input type="text" name="prenomPremierPautre" id="prenomPremierPautre" value="{{old('prenomPremierPautre',session('etape2.prenomPremierPautre','')) }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="nomDeuxiemePautre" class="label-form"> Nom du Deuxième Parrain</label>
            <input type="text" name="nomDeuxiemePautre" id="nomDeuxiemePautre" value="{{old('nomDeuxiemePautre',session('etape2.nomDeuxiemePautre','')) }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="prenomDeuxiemePautre" class="label-form">Prenom du Deuxième Parrain</label>
            <input type="text" name="prenomDeuxiemePautre" id="prenomDeuxiemePautre" class="form-control" value="{{old('prenomDeuxiemePautre',session('etape2.prenomDeuxiemePautre'))}}">
        </div>
        <div class="form-group">
            <label for="college" class="label-form">Collège dans lequel vous souhaitez postuler</label>
            <select name="collegeAutre" id="titre" class="form-control">
                <option value="1" {{old('collegeAutre',session('etape2.collegeAutre'))=='1'? 'selected' : ''}}>Sciences et Techniques</option>
                <option value="2" {{old('collegeAutre',session('etape2.collegeAutre'))=='2' ? 'selected': ''}}>Sciences juridiques, politiques, économiques et de gestion</option>
                <option value="3"{{old('collegeAutre',session('etape2.collegeAutre'))=='3' ? 'selected': ''}}>Sciences de la santé humaine et animale</option>
                <option value="4" {{old('collegeAutre',session('etape2.collegeAutre'))=='4' ? 'selected':''}}>Sciences naturelles et agronomiques</option>
                <option value="5" {{old('collegeAutre',session('etape2.collegeAutre'))=='5' ? 'selected':''}}>Sciences humaines, des arts, des lettres et de la communication </option>
            </select>
        </div>
        <div class="form-group">
            <label for="specialiteAutre">Precisez votre spécialité dans le collège postulé</label>
            <input type="text" name="specialiteAutre" id="specialiteAutre"  value="{{old('specialiteAutre',session('etape2.specialiteAutre',''))}}"   class="form-control">
        </div>
         <button type="submit" class="btn btn-info" value="{{''}}">Suivant</button>
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
    

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> 
