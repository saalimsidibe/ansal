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
<h5>Statistiques pour le collège sciences naturelles et agricoles</h5>
  </div>
  <div class="card-body">
    <h5 class="card-title"></h5>
    <div>
        <label for="categorie">Catégorie:</label>
        <select id="categorie" class="form-control">
            <option value="">--Sélectionner une catégorie--</option>
            <option value="chercheur">Chercheur</option>
            <option value="autre">Autre</option>
        </select>
    </div>

    <div>
        <label for="sexe">Sexe:</label>
        <select id="sexe" class="form-control">
            <option value="">--Sélectionner le sexe--</option>
            <option value="masculin">Masculin</option>
            <option value="feminin">Féminin</option>
        </select>
    </div>

    <div id="resultats">
        <!-- Les résultats des candidats filtrés s'afficheront ici -->
    </div>


  </div>
</div>
 @include('admin.footer')
</body>
</html>