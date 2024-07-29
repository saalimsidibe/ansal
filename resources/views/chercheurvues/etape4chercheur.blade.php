@extends('layout.app')

@section('content')
    <main class="main">
        <div class="page-title light-background">
            <div class="container">
                <h1>Formulaire-chercheur</h1>
                <nav class="breadcrumbs">
                    <ol>

                        <li>Etape1</li>
                        <li>Etape2</li>
                        <li>Etape3</li>
                        <li class="current"><a href="#">Etape4</a></li>
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
             <label for="expadmin" class="label-form">Expériences professionnelles exercées au plan national </label>
             <select name="expadmin" id="expadmin" class="form-control">
                <option value="oui">Oui</option>
                <option value="non">Non</option>
             </select>

        </div>
       
        <div>
             <label for="respadmin" class="label-form">Responsabilités administratives exercées au plan national </label>
                <select name="respadmin" id="respadmin" class="form-control">
            <option value="oui">Oui</option>
            <option value="non">Non</option>
            </select>

        </div>
       
 <!-- Champs supplémentaires à afficher pour les experiences au plan nationale -->
        <div id="expadmin_fields" style="display: none;">
   
            <div class="form-group">
            <label for="nom_fonction">Nom de la fonction</label>
            <input type="text" name="nom_fonction" id="nom_fonction">
        </div>
        <div class="form-group">
            <label for="periode_debut">Période du commencement</label>
            <input type="text" name="periode_debut" id="periode_debut">
        </div>
        <div class="form-group">
            <label for="periode_fin">Période de fin</label>
            <input type="text" name="periode_fin" id="periode_fin">
        </div>
        <div class="form-group">
            <label for="nom_structure">Nom de la structure</label>
            <input type="text" name="nom_structure" id="nom_structure">
        </div>
        <div class="form-group">
            <label for="ville">Ville</label>
            <input type="text" name="ville" id="ville">
        </div>
    </div>

<button id="toggle_expadmin_fields" style="display: none;">Ajouter les champs</button>


<div id="additional-fields" style="display: none;">
            <!-- Champs supplémentaires à ajouter via JavaScript pour les responsabilités administrative -->
        </div>

<button onclick="window.location.href='{{ route('etape5chercheur') }}'" class="btn btn-info">Suivant</button>

    </form>

</div>
                            </div>
                        </div>
                        <div class="col-2"> </div>
                    </div>
            </section>
        </div>
    </main>

</div> 
@endsection

@section('scripts')

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
        var expadminSelect = document.getElementById('expadmin');
        var expadminFields = document.getElementById('expadmin_fields');
        var toggleButton = document.getElementById('toggle_expadmin_fields');

        expadminSelect.addEventListener('change', function() {
            if (expadminSelect.value === 'oui') {
                expadminFields.style.display = 'block';
                toggleButton.style.display = 'block'; // Hide the "Ajouter les champs" button
            } else {
                expadminFields.style.display = 'none';
                toggleButton.style.display = 'non'; // Show the "Ajouter les champs" button
            }
        });

        // Show/hide fields on button click
        toggleButton.addEventListener('click', function() {
            expadminFields.style.display = 'block';
            toggleButton.style.display = 'none'; // Hide the "Ajouter les champs" button
        
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#respadmin').change(function() {
            if ($(this).val() === 'oui') {
                $('#additional-fields').slideDown();  // Afficher les champs supplémentaires
            } else {
                $('#additional-fields').slideUp();    // Cacher les champs supplémentaires
            }
        });

        // Action du bouton "Ajouter des champs"
        $('#addFieldsBtn').click(function() {
            $('#additional-fields').append(`
                <div class="mt-3">
                    <input type="text" name="responsibility_name[]" class="form-control" placeholder="Nom de la responsabilité">
                    <input type="date" name="start_date[]" class="form-control " placeholder="Date début">
                    <input type="date" name="end_date[]" class="form-control " placeholder="Date fin">
                    <input type="text" name="structure_name[]" class="form-control " placeholder="Nom de la structure">
                    <input type="text" name="city[]" class="form-control " placeholder="Ville">
                    <input type="text" name="country[]" class="form-control " placeholder="Pays">
                </div>
            `);
        });
    });
</script>

@endsection