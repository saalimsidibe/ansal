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
  <h5>Statistiques pour le collège sciences de la santé humaine et animale</h5>
  </div>
  <div class="card-body">
    <h5 class="card-title"></h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
 @include('admin.footer')
</body>
</html>