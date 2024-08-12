@extends('layout.app')

@section('content')
<main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container">
        <h1>About</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">About</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->


    <div class="container">
    <h1>Tableau de Bord des Évaluateurs</h1>
    
    <div class="row">
        <div class="col-md-12">
            <h2>Candidatures Récentes</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Date de Dépôt</th>
                        <th>Poste</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                  
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <a href="" class="btn btn-primary">Voir Détails</a>
                            </td>
                        </tr>
                
                </tbody>
            </table>
           
        </div>
    </div>
</div>
    @endsection