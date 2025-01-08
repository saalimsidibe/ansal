<!DOCTYPE html>
<html lang="en">
<head>
     @include('admin.css')
</head>
<body>
   <header> 
         @include('admin.header') 
    </header> 
    @include('admin.sidebar')
<div class="page-content">
    <div class="page-header">
<div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Tableau de board</h2>
    </div>
</div>
<div class="card">
  <div class="card-header">
  <h5>Statistiques pour le collège Sciences et Techniques</h5>
  </div>
  <div class="card-body">
    <h5 class="card-title"></h5>
    <form id="filterscientist">
        <select name="categorie" id="categorie" class="form-control">
            <option value="">Toutes les catégories</option>
            <option value="chercheur">Chercheur</option>
            <option value="autre">Autre</option>
        </select><br>

        <select name="sexe" id="sexe" class="form-control">
            <option value="">Tous les sexes</option>
            <option value="masculin">Masculin</option>
            <option value="feminin">Féminin</option>
        </select><br>

        <button type="submit" class="btn- btn-primary">Filtrer</button>
    </form>
     <div id="resultat_scientist"></div>
  </div>
</div>
 <script>
        // Lorsque le formulaire est soumis, envoyer la requête AJAX
        $('#filterscientist').on('submit', function (e) {
            e.preventDefault();

            var categorie = $('#categorie').val();
            var sexe = $('#sexe').val();

            // Envoi de la requête AJAX
            $.ajax({
                url: '{{ route('filter.scientist') }}',
                method: 'GET',
                data: {
                    categorie: categorie,
                    sexe: sexe
                },
                success: function (response) {
                    var html = '<ul>';
                    response.forEach(function(candidat) {
                        html += '<li>' + candidat.nom +' '+ candidat.prenom + ' (' + candidat.categorie + ', ' + candidat.sexe + ')</li>';
                    });
                    html += '</ul>';
                    $('#resultat_scientist').html(html);
                }
            });
        });
    </script>

 @include('admin.footer')
</body>
</html>