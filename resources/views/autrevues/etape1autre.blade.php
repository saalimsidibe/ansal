@extends('layout.app')

@section('content')
    <main class="main">
        <div class="page-title light-background">
            <div class="container">
                <h1>Formulaire-Autre</h1>
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
        <form action="{{Route('valider1.autre')}}" method="POST">
            @csrf

 <div class="form-group">
    <label for="nomAutre" class="form-label" >Nom</label>
    <input type="text" class="form-control" id="nomAutre" name="nomAutre" value="{{old('nomAutre',session('etape1.nomAutre',''))}}" required>
</div>
<div class="form-group">
    <label for="prenomAutre" class="form-label">Prenom</label>
    <input type="text" class="form-control" id="prenomAutre" name="prenomAutre" value="{{old('prenomAutre',session('etape1.prenomAutre',''))}}" required>
</div>
<div class="form-group">
    <label for="sexeAu" class="form-label">Sexe</label>
    <select name="sexeAu" id="sexeAu" class="form-control">
        <option value="masculin" {{ old('sexeAu',session('etape1.sexeAu'))=='masculin' ? 'selected' : ''}}>Masculin</option>
        <option value="feminin" {{old('sexeAu',session('etape1.sexeAu'))=='feminin '?'selected': ''}}>Feminin</option>
    </select>
</div>
<div class="form-group">
    <label for="datenaissanceAutre" class="form-label">Date de Naissance</label>
    <input type="date" class="form-control" id="datenaissanceAutre" value="{{old('datenaissanceAutre',session('etape1.datenaissanceAutre','')) }}" name="datenaissanceAutre" required>
</div>
<div class="form-group">
    <label for="titreAutre" class="form-label">Titre</label>
    <input type="text" name="titreAutre" id="titreAutre" value="{{old('titreAutre',session('etape1.titreAutre',''))}}" class="form-control">
</div>

<div class="form-group">
    <label for="numerotelAutre" class="form-label">Numero de telephone</label>
    <input type="text"  id="numerotelAutre" name="numerotelAutre" value="{{old('numerotelAutre',session('etape1.numerotelAutre',''))}}" class="form-control">
</div>
<div class="form-group">
    <label for="emailAutre">email</label>
    <input type="email" class="form-control" id="emailAutre" value="{{old('emailAutre',session('etape1.emailAutre',''))}}" name="emailAutre">
</div>
 <button type="submit" class="btn btn-info" value="">Suivant</button>

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
</body>
</html>