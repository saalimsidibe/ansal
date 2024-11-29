<!DOCTYPE html>
<html lang="en">
<head>
   @include('admin.css')
</head>
<body>
    <header class="header">
@include('admin.header')
    </header>
     @include('admin.sidebar') 
     <div class="page-content">
         <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Tableau de board</h2>
     </div>
      </div>
       

        <table class="table table-striped table-dark table-bordered">
            <thead>
                <tr>
                    <th> Nom</th>
                    <th> Prenom</th>
                    <th>Date de naissance</th>
                    <th> Sexe</th>
                    <th>Type de profil</th>
                    <th>Titre</th>
                    <th>Date de nomination</th>
                    <th>Tel mobile</th>
                    <th>Email</th>
                    <th>Date de Dépôt</th>
                    <th>Actions</th>

                </tr>
            </thead>
            <tbody>
              {{--  @foreach ($candidats as $candidat)
                    <tr>
                        <td>{{ $candidat['nom'] }}</td>
                        <td>{{ $candidat['prenom'] }}</td>
                        <td>{{ $candidat['datenaissance'] }}</td>
                        <td>{{ $candidat['sexe'] }}</td>
                        <td>{{ $candidat['categorie'] }}</td>
                        <td>{{ $candidat['titre'] }}</td>
                        <td>{{ $candidat['datenomin'] }}</td>
                        <td>{{ $candidat['telephone'] }}</td>
                        <td>{{ $candidat['email'] }}</td>
                        <td>{{ $candidat['created_at'] }}</td>
                        <td> <button type="button" class="btn btn-danger "> <a
                                    href="{{ route('profil.admin', $candidat->id) }}">Voir</a></button></td>
                @endforeach--}}
            </tbody>
   </div>
     </body>
   
 


     @include('admin.footer')
</body>
</html>