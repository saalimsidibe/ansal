<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    <!-- Inclure Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Scripts -->
    
    <!-- Inclure jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <form action="">
        @csrf
        <div class="form-group">
             <label for="expadmin" class="label-form">Expériences professionnelles exercées au plan national </label>
             <select name="expadmin" id="expadmin">
                <option value="oui">Oui</option>
                <option value="non">Non</option>
             </select>

        </div>
       
        <div>
             <label for="respadmin" class="label-form">Responsabilités administratives exercées au plan national </label>
                <select name="respadmin" id="respadmin">
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


    </form>
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
                    <input type="date" name="start_date[]" class="form-control mt-2" placeholder="Date début">
                    <input type="date" name="end_date[]" class="form-control mt-2" placeholder="Date fin">
                    <input type="text" name="structure_name[]" class="form-control mt-2" placeholder="Nom de la structure">
                    <input type="text" name="city[]" class="form-control mt-2" placeholder="Ville">
                    <input type="text" name="country[]" class="form-control mt-2" placeholder="Pays">
                </div>
            `);
        });
    });
</script>


</body>
</html>