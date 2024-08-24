@extends('layout.app')

@section('content')
    <main class="main">
        <div class="page-title light-background">
            <div class="container">
                <h1>Formulaire-Autre</h1>
                <nav class="breadcrumbs">
                    <ol>

                        <li>Etape1</li>
                        <li>Etape2</li>
                        <li>Etape3</li>
                        <li>Etape4</li>
                        <li class="current"><a href="#">Etape5</a></li>
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
                                <div class="card-head info"> Informations Personnelle</div>
                                <div class="card-body">
    <form action="{{Route('valider5.autre')}}" method="POST">
      @csrf
                         <div class="form-group">
                        <label for="expprofintAu">Expériences professionnelles exercées au plan international</label>
                        <select name="expprofintAu" id="expprofintAu" class="form-control" required>
                            <option value="non" {{ old('expprofintAu', session('form.expprofintAu')) == 'non' ? 'selected' : '' }}>Non</option>
                            <option value="oui" {{ old('expprofintAu', session('form.expprofintAu')) == 'oui' ? 'selected' : '' }}>Oui</option>
                        </select>
                    </div>

                      <div id="extraFieldsContainer" style="display: none;">
                    <label for="intitule">Intitulé</label>
                    <input type="text" id="intitule" name="intitule" class="form-control">
                </div>
                <div class="form-group">
                    <label for="debut">Début</label>
                    <input type="date" id="debut" name="debut" class="form-control">
                </div>
                <div class="form-group">
                    <label for="fin">Fin</label>
                    <input type="date" id="fin" name="fin" class="form-control">
                </div>
                <div class="form-group">
                    <label for="structure">Structure</label>
                    <input type="text" id="structure" name="structure" class="form-control">
                </div>
                <div class="form-group">
                    <label for="ville">Ville</label>
                    <input type="text" id="ville" name="ville" class="form-control">
                </div>
                <div class="form-group">
                    <label for="pays">Pays</label>
                    <input type="text" id="pays" name="pays" class="form-control">
                </div>
                <!-- Button to remove fields -->
                <div id="removeButtonContainer">
                    <button type="button" id="removeFields" class="btn btn-danger">Supprimer</button>
                </div>
            </div>

            <!-- Button to add fields -->
            <div id="buttons" class="mt-3">
                <button type="button" id="addFields" class="btn btn-primary">Ajouter</button>
            </div>

                       
                    </div>

                    <div class="form-group">
                        <label for="respintAu">Responsabilités professionnelles exercées au plan international</label>
                        <select name="respintAu" id="respintAu" class="form-control" required>
                            <option value="non" {{ old('respintAu', session('form.respintAu')) == 'non' ? 'selected' : '' }}>Non</option>
                            <option value="oui" {{ old('respintAu', session('form.respintAu')) == 'oui' ? 'selected' : '' }}>Oui</option>
                        </select>
                    </div>

               
                    </div>

         <button type="submit" class="btn btn-info" value="">Suivant</button>   
         
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
    

    //Ajouter une fonction
    
   <script>
    document.addEventListener('DOMContentLoaded', function() {
            const selectElement = document.getElementById('expprofintAu');
            const extraFieldsContainer = document.getElementById('extraFieldsContainer');
            const addFieldsButton = document.getElementById('addFields');
            const removeFieldsButton = document.getElementById('removeFields');

            // Function to show or hide additional fields
            function toggleFields() {
                if (selectElement.value === 'oui') {
                    extraFieldsContainer.style.display = 'block';
                } else {
                    extraFieldsContainer.style.display = 'none';
                }
            }

            // Initial check on page load
            toggleFields();

            // Add event listener for select element change
            selectElement.addEventListener('change', toggleFields);

            // Add event listener for "Add" button
            addFieldsButton.addEventListener('click', function() {
                extraFieldsContainer.style.display = 'block';
                // Move the remove button to the end of the fields
                const removeButtonContainer = document.getElementById('removeButtonContainer');
                extraFieldsContainer.appendChild(removeButtonContainer);
            });

            // Add event listener for "Remove" button
            removeFieldsButton.addEventListener('click', function() {
                extraFieldsContainer.style.display = 'none';
                // Clear the input values
                document.querySelectorAll('#extraFieldsContainer input').forEach(input => input.value = '');
            });
        });
   </script>
@endsection