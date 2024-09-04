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
                        <li>Etape3</li>
                        <li >Etape4</li>
                        <li class="current"><a href="#">Etape5</a></li>
                        <li>Etape6</li>
                         <li>Etape7</li>
                        <li class="current"> Etape Finale</li>
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
                                <div class="card-head info bg-light"> <H3>Experiences nationales</H3>
                                <div class="card-body">
     <form action="{{Route('valider4.autre')}}" method="POST">
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
        <label for="expadminAu" class="label-form">Expériences professionnelles exercées au plan national</label>
        <select name="expadminAu" id="expadminAu" class="form-control">
            <option value="oui">Oui</option>
            <option value="non">Non</option>
        </select>
      </div>
       <!-- Conteneur pour le bouton et les champs supplémentaires de l'experience -->
     <div id="experience-section">
        @php
            $fonctionsAAu=old('fonctionsAAu',session('etape4.fonctionsAAu',[]));
            
        @endphp
       
       @foreach ($fonctionsAAu as $indexAAu =>$fonctionAAu )
       
       <div class="experience-item">
            <div class="form-group">
                 <label for="fonction_{{$indexAAu}}">Nom de la fonction</label>
                 <input type="text" class="form-control" name="fonctionsAAu[{{$indexAAu}}][intitule]" value="{{$fonctionAAu['intitule'] ?? ''}}" id="fonction_{{$indexAAu}}" required>   
            </div>
            <div class="form-group">
                <label for="Debut_{{$indexAAu}}"> Début</label>
                <input type="date" class="form-control" name="fonctionsAAu[{{$indexAAu}}][debut]" id="Debut_{{$indexAAu}}" value="{{$fonctionAAu['debut']}}" required>
            </div>
            <div class="form-group">
                <label for="Fin_{{$indexAAu}}"> Fin</label>
                <input type="date" class="form-control" name="fonctionsAAu[{{$indexAAu}}][fin]" id="Fin_{{$indexAAu}}" value="{{$fonctionAAu['fin'] ?? ''}}"      required>
            </div>
            <div class="form-group">
                <label for="structure_{{$indexAAu}}">Nom de la structure</label>
                <input type="text" class="form-control" name="fonctionsAAu[{{$indexAAu}}][structure]" value="{{$fonctionAAu['structure'] ?? ''}}" id="structure_{{$indexAAu}}" required>   
            </div>
            <div class="form-group">
                  <label for="ville_{{$indexAAu}}">Ville</label>
                  <input type="text" class="form-control" name="fonctionsAAu[{{$indexAAu}}][ville]" id="ville_{{$indexAAu}}" value="{{$fonctionAAu['ville'] ?? ''}}" required>
            </div>
            <div class="form-group">
                <label for="pays_{{$indexAAu}}">Pays</label>
                <input type="text" class="form-control" name="fonctionsAAu[{{$indexAAu}}][pays]" id="pays_{{$indexAAu}}" value="{{$fonctionAAu['pays'] ?? ''}}"  required> 
            </div>
       </div>
        @endforeach 

        <button type="button" id="add-experience" class="btn btn-primary">Ajouter une expérience</button>
        <div id="experiences-list"></div>
    </div>

    <div class="form-group">
            <label for="respadminAu" class="label-form">Responsabilités administratives exercées au plan national</label>
            <select name="respadminAu" id="respadminAu" class="form-control">
                <option value="non">Non</option>
                <option value="oui">Oui</option>
            </select>
        </div>

<!-- Conteneur pour les champs supplémentaires de la responsabilite -->

@php
    $resAdau=old('resAdau',session('etape4.resAdau',[]));
@endphp
         <div id="respadminDynamic" class="respadmin-dynamic">
            @foreach ($resAdau as $j => $reAdau )
                  <div class="field">
             <div class="form-group">
                    <label for="responsibilite_{{$j}}">Intitulé de la responsabilité</label>
                    <input type="text" name="resAdau[{{$j}}][intitule]"  value="{{$reAdau['intitule'] ??'' }}"       placeholder="Titre" class="form-control" id="responsibilite_{{$j}}" required>
                </div>

                <div class="form-group">
                    <label for="debut_{{$j}}">Debut</label>
                    <input type="date" name="resAdau[{{$j}}][debut]" value="{{$reAdau['debut'] ?? ''}}" class="form-control" id="debut_{{$j}}">
                </div>
                <div class="form-group">
                    <label for="fin_{{$j}}"> Fin</label>
                    <input type="date" name="resAdau[{{$j}}][fin]" value="{{$reAdau['fin'] ?? ''}}"  id="fin_{{$j}}"        class="form-control">
                </div>
                <div class="form-group">
                    <label for="structure_{{$j}}">Structure</label>
                    <input type="text" name="resAdau[{{$j}}][structure]"value="{{$reAdau['structure'] ?? ''}} " id="structure_{{$j}}"       placeholder="Structure" class="form-control">
                </div>
                <div class="form-group">
                    <label for="ville_{{$j}}">Ville</label>
                    <input type="text" name="resAdau[{{$j}}][ville]" value="{{$reAdau['ville'] ?? ''}}"   id="ville_{{$j}}"     placeholder="Ville" class="form-control">
                </div>
                <div class="form-group">
                    <label for="Pays_{{$j}}">Pays</label>
                    <input type="text" name="resAdau[{{$j}}][pays]" value="{{$reAdau['pays'] ?? ''}}" placeholder="Pays" id="Pays_{{$j}}" class="form-control">
                </div>
      
            @endforeach
              </div>        
        </div> 
       <div class="btn-group mt-4">
             <a href="{{route('etapexautre')}}" class="btn btn-warning">Précédent</a>
           <button type="submit" class="btn btn-info" value="">Suivant</button>
       </div>
        
       
    </form>


                            </div>
                           
                        </div>
                        
                        <div class="col-2"> </div>
                         
                    </div>
            </section>
           
        </div>
    </main>
@endsection    

@section('scripts')
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> 
    <script>
        //ajouter et supprimer champs experience professionnelle

         // Écoutez les changements sur le select
    document.getElementById('expadminAu').addEventListener('change', function() {
        var experienceSection = document.getElementById('experience-section');
        if (this.value === 'oui') {
            experienceSection.style.display = 'block';
        } else {
            experienceSection.style.display = 'none';
            document.getElementById('experiences-list').innerHTML = ''; // Clear the experiences list
        }
    });

    // Ajoutez un nouvel ensemble de champs lorsque le bouton est cliqué
    document.getElementById('add-experience').addEventListener('click', function() {
        var experiencesList = document.getElementById('experiences-list');
        var index = experiencesList.children.length;
        var newFields = `
            <div class="experience-item">
                <div class="form-group">
                    <label for="fonction${index}">Nom de la fonction</label>
                    <input type="text" class="form-control" name="fonctionsAAu[${index}][intitule]" id="fonction${index}" required>
                </div>
                <div class="form-group">
                    <label for="Debut${index}"> Début</label>
                    <input type="date" class="form-control" name="fonctionsAAu[${index}][debut]" id="Debut${index}" required>
                </div>
                <div class="form-group">
                    <label for="Fin${index}"> Fin</label>
                    <input type="date" class="form-control" name="fonctionsAAu[${index}][fin]" id="Fin${index}">
                </div>
                
                <div class="form-group">
                    <label for="structure${index}">Nom de la structure</label>
                    <input type="text" class="form-control" name="fonctionsAAu[${index}][structure]" id="structure${index}" required>
                </div>
                <div class="form-group">
                    <label for="ville${index}">Ville</label>
                    <input type="text" class="form-control" name="fonctionsAAu[${index}][ville]" id="ville${index}" required>
                </div>
                <div class="form-group">
                    <label for="pays${index}">Pays</label>
                    <input type="text" class="form-control" name="fonctionsAAu[${index}][pays]" id="pays${index}" required>
                </div>
                <button type="button" class="remove-experience btn btn-danger">Supprimer</button>
            </div>
        `;
        experiencesList.insertAdjacentHTML('beforeend', newFields);
    });

    // Supprimez un ensemble de champs lorsqu'un bouton de suppression est cliqué
    document.addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('remove-experience')) {
            e.target.parentElement.remove();
        }
    });        
    </script>

    <script>
        //script pour ajouter dynamiquement les responsabilités administrative nationales
        var i=0;
     
        document.getElementById('respadminAu').addEventListener('change', function() {
            const dynamicFields = document.getElementById('respadminDynamic');
            dynamicFields.innerHTML = ''; // Clear previous fields

            if (this.value === 'oui') {
                // Create and append the button to add fields
                const addBtn = document.createElement('button');
                addBtn.textContent = 'Ajouter une responsabilité';
                addBtn.className = 'add-btn  btn btn-primary';
                addBtn.type = 'button'; // Prevent form submission
                
                addBtn.addEventListener('click', function() {
                 
                   
                    addResponsibilityField();
                });
                dynamicFields.appendChild(addBtn);

                // Add the first responsibility field
                addResponsibilityField();
            }
        });

        function addResponsibilityField() {
            i++;
            const container = document.createElement('div');
            container.className = 'field';
            
            container.innerHTML = `
                <div class="form-group">
                    <label for="responsibilityTitle">Intitulé de la responsabilité</label>
                    <input type="text" name="resAdau[${i}][intitule]" placeholder="Titre" class="form-control">
                </div>

                <div class="form-group">
                    <label for="startDate">Date de commencement</label>
                    <input type="date" name="resAdau[${i}][debut]" class="form-control">
                </div>
                <div class="form-group">
                    <label for="endDate">Date de fin</label>
                    <input type="date" name="resAdau[${i}][fin]" class="form-control">
                </div>
                <div class="form-group">
                    <label for="structure">Structure</label>
                    <input type="text" name="resAdau[${i}][structure]" placeholder="Structure" class="form-control">
                </div>
                <div class="form-group">
                    <label for="city">Ville</label>
                    <input type="text" name="resAdau[${i}][ville]" placeholder="Ville" class="form-control">
                </div>
                <div class="form-group">
                    <label for="country">Pays</label>
                    <input type="text" name="resAdau[${i}][pays]" placeholder="Pays" class="form-control">
                </div>
                <button type="button" class="remove-btn btn btn-danger" onclick="removeField(this)">Supprimer</button>
            `;

            document.getElementById('respadminDynamic').appendChild(container);
        }

        function removeField(button) {
            const field = button.parentElement;
            field.remove();
        }
        
    </script>
    @php
    
    @endphp
    
@endsection