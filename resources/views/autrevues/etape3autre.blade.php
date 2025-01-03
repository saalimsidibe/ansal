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
                        <li>Etape7</li>
                        <li > Etape Finale</li>
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
                                <div class="card-head info bg-light">  <h3>Informations sur les diplômes</h3> </div>
                                <div class="card-body">
                                    <form action="{{Route('valider3.autre')}}"  method="POST">
                                        {{ csrf_field() }}
                                         @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                             
                                        @php
                                            $diplomesAu=old('diplomesAu',session('etape3.diplomesAu',[]));
                                        @endphp
                             <div class="diplome" id="diplome-section">
                                 <fieldset class="border p-2">
                             <legend class="scheduler-border float-none w-auto">    <h4>Diplôme universitaire</h4> </legend>
    @foreach ($diplomesAu as $indexAu => $diplomeAu )
          <legend class="scheduler-border float-none w-auto"> <h4>Diplôme universitaire{{$indexAu}} </h4> </legend>
   
    
    <div class="form-group">
    
        <label for="intitule_{{ $indexAu }}">Intitulé du diplôme</label>
        <input type="text" class="form-control" id="intitule_{{ $indexAu }}" name="diplomesAu[{{$indexAu}}][nom]" value="{{$diplomeAu['nom'] ?? ''}}" required>
       @error('diplomesAu.' . $indexAu . '.nom')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror 
    </div>
    <div class="form-group">
        <label for="periode_{{ $indexAu }}">Période d'obtention</label>
        <input type="date" class="form-control" id="periode_{{ $indexAu }}" name="diplomesAu[{{$indexAu}}][periode]" placeholder="jjmmaa-jjmmaa" value="{{$diplomeAu['periode']??''}}" required>
    </div>
    <div class="form-group">
        <label for="institut_{{ $indexAu }}">Institution d'obtention</label>
        <input type="text" class="form-control" id="institut_{{ $indexAu }}" name="diplomesAu[{{$indexAu}}][institut]" value="{{$diplomeAu['institut']??''}}"   
             required>
         @error('diplomesAu.' .$indexAu. '.institut')
            <div class="text-danger">{{$message}}</div> 
        @enderror  
    </div>
    <div class="form-group">
        <label for="ville_{{ $indexAu }}">Ville</label>
        <input type="text"  id="ville_{{ $indexAu }}" name="diplomesAu[{{$indexAu}}][ville]" value="{{$diplomeAu['ville']??''}}"     class="form-control" required>
       @error('diplomesAu.' . $indexAu . '.ville')
                            <div class="text-danger">{{ $message }}</div>
     @enderror 
   
    </div>
    <div class="form-group">
        <label for="pays_{{ $indexAu }}">Pays</label>
        <input type="text" name="diplomesAu[{{$indexAu}}][pays]" id="paysAu_{{ $indexAu }}" value="{{$diplomeAu['pays']??''}}"    class="form-control" required>
         
       @error('diplomesAu.' . $indexAu . '.pays')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror 
   

    </div>
     @endforeach

     <div>
        <button type="button" id="add-field" class="btn btn-primary">Ajouter un diplôme</button>
     </div>
    

   </fieldset>
                     
 </div>
                   
                       <div class="btn-group mt-4">
     <a href="{{route('etape2.autre')}}" class="btn btn-warning">Précédent</a>                      
    <button type="submit" class="btn btn-info" value="">Suivant</button> 
    </div> 
                    </div>
                      
            </section>
         
    </form>
      </div>
                           
                        </div>
                        
                        <div class="col-2"> </div>
                         
                    </div>
        </div>
         
    </main>
   
@endsection    

@section('scripts')



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> 
    
    <script>
        //ajouter diplomes
        let comptDip={{ count($diplomesAu) }};
        
    document.getElementById('add-field').addEventListener('click', function() {
        var section = document.getElementById('diplome-section');
        comptDip++;
        var newFields = `
            
            <div class="diplome-item">
                 <fieldset class="border p-2">
                 <legend class="scheduler-border float-none w-auto"> <h4>Diplôme universitaire${comptDip}</h4> </legend>
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
             </fieldset>   
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