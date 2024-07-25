<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
   <form method="POST" action="">
        @csrf

        <div class="diplomes-container">
            <!-- Première section de diplôme -->
            <div class="diplome">
                <h4>Diplôme universitaire</h4>
                <div class="form-group">
                    <label for="intitule_1">Intitulé du diplôme</label>
                    <input type="text" class="form-control" id="intitule_1" name="intitule_1" required>
                </div>
                <div class="form-group">
                    <label for="periode_1">Période d'obtention</label>
                    <input type="text" class="form-control" id="periode_1" name="periode_1" placeholder="jjmmaa-jjmmaa" required>
                </div>
                <div class="form-group">
                    <label for="institution_1">Institution d'obtention</label>
                    <input type="text" class="form-control" id="institution_1" name="institution_1" required>
                </div>
            </div>
        </div>

        <!-- Bouton pour ajouter un nouveau diplôme -->
        <div class="form-group">
            <button type="button" id="ajouterDiplome" class="btn btn-primary">Ajouter</button>
        </div>

        <!-- Bouton de soumission du formulaire -->
        <button type="submit" class="btn btn-primary">Suivant</button>
    </form>
</div> 

<script>
    $(document).ready(function() {
        var diplomeCount = 1;

        $('#ajouterDiplome').click(function() {
            diplomeCount++;

            var diplomeHtml = `
                <div class="diplome">
                    <hr>
                    <h4>Diplôme universitaire</h4>
                    <div class="form-group">
                        <label for="intitule_${diplomeCount}">Intitulé du diplôme</label>
                        <input type="text" class="form-control" id="intitule_${diplomeCount}" name="intitule_${diplomeCount}" required>
                    </div>
                    <div class="form-group">
                        <label for="periode_${diplomeCount}">Période d'obtention</label>
                        <input type="text" class="form-control" id="periode_${diplomeCount}" name="periode_${diplomeCount}" placeholder="jjmmaa-jjmmaa" required>
                    </div>
                    <div class="form-group">
                        <label for="institution_${diplomeCount}">Institution d'obtention</label>
                        <input type="text" class="form-control" id="institution_${diplomeCount}" name="institution_${diplomeCount}" required>
                    </div>
                </div>
            `;

            $('.diplomes-container').append(diplomeHtml);
        });
    });
</script>
</body>
</html>