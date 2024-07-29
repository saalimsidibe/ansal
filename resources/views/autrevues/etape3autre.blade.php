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
                        <li class="current"><a href="#">Etape3</a></li>
                        <li>Etape4</li>
                        <li>Etape5</li>
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
 <div class="diplome" id="diplome-section">
    <h4>Diplôme universitaire</h4>
    <div class="form-group">
        <label for="nomDipAu">Intitulé du diplôme</label>
        <input type="text" class="form-control" id="nomDipAu" name="nomDipAu[]" required>
    </div>
    <div class="form-group">
        <label for="periodDipAu">Période d'obtention</label>
        <input type="text" class="form-control" id="periodDipAu" name="periodDipAu[]" placeholder="jjmmaa-jjmmaa" required>
    </div>
    <div class="form-group">
        <label for="instituDipAu">Institution d'obtention</label>
        <input type="text" class="form-control" id="instituDipAu" name="instituDipAu[]" required>
    </div>
    <div class="form-group">
        <label for="villeAu">Ville</label>
        <input type="text" name="villeAu[]" id="villeAu" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="paysAu">Pays</label>
        <input type="text" name="paysAu[]" id="paysAu" class="form-control" required>
    </div>
    <button type="button" id="add-field" class="btn btn-primary">Ajouter un diplôme</button>
</div>
</div>
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
        //ajouter diplomes
        
    document.getElementById('add-field').addEventListener('click', function() {
        var section = document.getElementById('diplome-section');
        var newFields = `
            <div class="diplome-item">
                <div class="form-group">
                    <label for="nomDipAu">Intitulé du diplôme</label>
                    <input type="text" class="form-control" name="nomDipAu[]" required>
                </div>
                <div class="form-group">
                    <label for="periodDipAu">Période d'obtention</label>
                    <input type="text" class="form-control" name="periodDipAu[]" placeholder="jjmmaa-jjmmaa" required>
                </div>
                <div class="form-group">
                    <label for="instituDipAu">Institution d'obtention</label>
                    <input type="text" class="form-control" name="instituDipAu[]" required>
                </div>
                <div class="form-group">
                    <label for="villeAu">Ville</label>
                    <input type="text" name="villeAu[]" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="paysAu">Pays</label>
                    <input type="text" name="paysAu[]" class="form-control" required>
                </div>
                <button type="button" class="remove-field btn btn-danger">Supprimer</button>
            </div>
        `;
        section.insertAdjacentHTML('beforeend', newFields);
    });

    document.addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('remove-field')) {
            e.target.parentElement.remove();
        }
    });
    </script>

@endsection