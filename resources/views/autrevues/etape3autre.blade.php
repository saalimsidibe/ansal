@extends('layout.app')

@section('content')
    <main class="main">
        <div class="page-title light-background">
            <div class="container">
                <h1>Formulaire-Autre</h1>
                <nav class="breadcrumbs">
                    <ol>

                        <li>Etape1</li>
                        <li >Etape2</li>
                        <li class="current"><a href="#">Etape3</a></li>
                        <li>Etape4</li>
                        <li>Etape5</li>
                        <li>Etape6</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->
<section id="contact" class="contact section">
                <div class="container" data-aos="fade">
                    <div class="row ">
                        <div class="col-2"> </div>
                        <div class="col-8">
                            <div class="card ">
                                <div class="card-head info bg-light">  <h3>Informations sur les diplômes</h3> </div>
                                <div class="card-body">
                                    <form action="{{Route('valider3.autre')}}"  method="POST">
                                        {{ csrf_field() }}
                             
                                        @php
                                            $diplomesAu=old('diplomesAu',session('etape3.diplomesAu',[]));
                                        @endphp
 <div class="diplome" id="diplome-section">
     <h4>Diplôme universitaire</h4>
    @foreach ($diplomesAu as $indexAu => $diplomeAu )
        
   
    
    <div class="form-group">
    
        <label for="intitule_{{ $indexAu }}">Intitulé du diplôme</label>
        <input type="text" class="form-control" id="intitule_{{ $indexAu }}" name="diplomesAu[{{$indexAu}}][nom]" value="{{$diplomeAu['nom'] ?? ''}}" required>
    </div>
    <div class="form-group">
        <label for="periode_{{ $indexAu }}">Période d'obtention</label>
        <input type="date" class="form-control" id="periode_{{ $indexAu }}" name="diplomesAu[{{$indexAu}}][periode]" placeholder="jjmmaa-jjmmaa" value="{{$diplomeAu['periode']??''}}" required>
    </div>
    <div class="form-group">
        <label for="institut_{{ $indexAu }}">Institution d'obtention</label>
        <input type="text" class="form-control" id="institut_{{ $indexAu }}" name="diplomesAu[{{$indexAu}}][institut]" value="{{$diplomeAu['institut']??''}}"        required>
    </div>
    <div class="form-group">
        <label for="ville_{{ $indexAu }}">Ville</label>
        <input type="text"  id="ville_{{ $indexAu }}" name="diplomesAu[{{$indexAu}}][ville]" value="{{$diplomeAu['ville']??''}}"     class="form-control" required>
    </div>
    <div class="form-group">
        <label for="pays_{{ $indexAu }}">Pays</label>
        <input type="text" name="diplomesAu[{{$indexAu}}][pays]" id="paysAu_{{ $indexAu }}" value="{{$diplomeAu['pays']??''}}"    class="form-control" required>
    </div>
     @endforeach

    <button type="button" id="add-field" class="  float-right btn btn-primary">Ajouter un diplôme</button>
</div>
</div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info" value="">Suivant</button>
                        <div class="col-2">  </div>
                        
                    </div>
            </section>
        </div>
        
    </form>
    </main>
   
@endsection    

@section('scripts')



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> 
    
    <script>
        //ajouter diplomes
        let comptDip=0;
        
    document.getElementById('add-field').addEventListener('click', function() {
        var section = document.getElementById('diplome-section');
        comptDip++;
        var newFields = `
         <h4>Diplôme universitaire</h4>
            <div class="diplome-item">
                <div class="form-group">
                    <label for="nomDipAu">Intitulé du diplôme</label>
                    <input type="text" class="form-control" name="diplomesAu[${comptDip}][nom]" id="intitule_${comptDip}" required>
                </div>
                <div class="form-group">
                    <label for="periodDipAu">Période d'obtention</label>
                    <input type="date" class="form-control" name="diplomesAu[${comptDip}][periode]" id="periode_${comptDip}" placeholder="jjmmaa-jjmmaa" required>
                </div>
                <div class="form-group">
                    <label for="instituDipAu">Institution d'obtention</label>
                    <input type="text" class="form-control" name="diplomesAu[${comptDip}][institut]" id="institut_${comptDip}" required>
                </div>
                <div class="form-group">
                    <label for="villeAu">Ville</label>
                    <input type="text" name="diplomesAu[${comptDip}][ville]" id="ville_${comptDip}"  class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="paysAu">Pays</label>
                    <input type="text" name="diplomesAu[${comptDip}][pays]" id="pays__${comptDip}" class="form-control" required>
                </div>
                <button type="button" class="remove-field btn btn-danger">Supprimer</button>
            </div>
        `;
        section.insertAdjacentHTML('beforeend', newFields);
    });

    document.addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('remove-field')) {
            e.target.parentElement.remove();
        }
    });
    </script>

@endsection