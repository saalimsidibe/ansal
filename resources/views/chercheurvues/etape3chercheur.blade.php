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
                        <li class="current"><a href="#">Etape3</a></li>
                        <li>Etape4</li>
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
                                <div class="card-head info bg-light">  <h3>Informations sur les diplômes</h3> </div>
                                <div class="card-body">

                                    <form method="POST" action="{{ route('multi-step-form.next') }}">
                                        @csrf
                                         @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <div class="diplomes-container">
                                            <!-- Première section de diplôme -->
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-10"></div>
                                                    <button type="button" id="ajouterDiplome"
                                                        class="col-2 float-right btn btn-primary btn-sm">Ajouter</button>
                                                </div>
                                            </div>
                                            <br>
                                            @php
                                                $diplomes = old('diplomes', session('data3.diplomes', []));
                                                
                                                
                                            @endphp

                                            @foreach ($diplomes as $index => $diplome)
                                                <div class="diplome">
                                                    <h4>Diplôme universitaire</h4>
                                                    <div class="form-group">
                                                        <label for="intitule_{{ $index }}">Intitulé du
                                                            diplôme</label>
                                                        <input type="text" class="form-control"
                                                            id="intitule_{{ $index }}"
                                                            name="diplomes[{{ $index }}][intitule]" required
                                                            placeholder="Entrez l'intitulé du diplôme"
                                                            value="{{ $diplome['intitule'] ?? '' }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="periode_{{ $index }}">Période d'obtention</label>
                                                        <input type="date" class="form-control"
                                                            id="periode_{{ $index }}"
                                                            name="diplomes[{{ $index }}][periode]" required
                                                            placeholder="jj/mm/aaaa"
                                                            value="{{ $diplome['periode'] ?? '' }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="institution_{{ $index }}">Institution
                                                            d'obtention</label>
                                                        <input type="text" class="form-control"
                                                            id="institution_{{ $index }}"
                                                            name="diplomes[{{ $index }}][institution]" required
                                                            placeholder="Entrez l'institution"
                                                            value="{{ $diplome['institution'] ?? '' }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="pays_{{ $index }}">Pays</label>
                                                        <input type="text" class="form-control"
                                                            id="pays_{{ $index }}"
                                                            name="diplomes[{{ $index }}][pays]" required
                                                            placeholder="Entrez le pays"
                                                            value="{{ $diplome['pays'] ?? '' }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="ville_{{ $index }}">Institution
                                                            d'obtention</label>
                                                        <input type="text" class="form-control"
                                                            id="ville_{{ $index }}"
                                                            name="diplomes[{{ $index }}][ville]" required
                                                            placeholder="Entrez la ville"
                                                            value="{{ $diplome['ville'] ?? '' }}">
                                                    </div>
                                                    <button type="button"
                                                        class="btn btn-danger supprimerDiplome">Supprimer</button>
                                                </div>
                                            @endforeach
                                        </div>
                                        <br>

                                        <!-- Bouton pour ajouter un nouveau diplôme -->


                                        <!-- Bouton de soumission du formulaire -->
                                        <a href="{{ route('multi-step-form.previous') }}"
                                            class="btn btn-warning">Précédent</a>
                                        <button type="submit" class="btn btn-info">Suivant</button>
                                    </form>

                                    <script>
                                        document.getElementById('ajouterDiplome').addEventListener('click', function() {
                                            var diplomesContainer = document.querySelector('.diplomes-container');
                                            var diplomeCount = diplomesContainer.children.length;

                                            var newDiplome = document.createElement('div');
                                            newDiplome.classList.add('diplome');
                                            newDiplome.innerHTML = `
                                                <h4>Diplôme universitaire</h4>
                                                <div class="form-group">
                                                    <label for="intitule_${diplomeCount}">Intitulé du diplôme</label>
                                                    <input type="text" class="form-control" id="intitule_${diplomeCount}"
                                                           name="diplomes[${diplomeCount}][intitule]" required placeholder="Entrez l'intitulé du diplôme">
                                                </div>
                                                <div class="form-group">
                                                    <label for="periode_${diplomeCount}">Période d'obtention</label>
                                                    <input type="date" class="form-control" id="periode_${diplomeCount}"
                                                           name="diplomes[${diplomeCount}][periode]" required placeholder="jj/mm/aaaa">
                                                </div>
                                                <div class="form-group">
                                                    <label for="institution_${diplomeCount}">Institution d'obtention</label>
                                                    <input type="text" class="form-control" id="institution_${diplomeCount}"
                                                           name="diplomes[${diplomeCount}][institution]" required placeholder="Entrez l'institution">
                                                </div>
                                                 <div class="form-group">
                                                    <label for="pays_${diplomeCount}">Pays d'obtention</label>
                                                    <input type="text" class="form-control" id="pays_${diplomeCount}"
                                                           name="diplomes[${diplomeCount}][pays]" required placeholder="Entrez le pays">
                                                </div>
                                                 <div class="form-group">
                                                    <label for="ville_${diplomeCount}">Ville d'obtention</label>
                                                    <input type="text" class="form-control" id="ville_${diplomeCount}"
                                                           name="diplomes[${diplomeCount}][ville]" required placeholder="Entrez la ville">
                                                </div>
                                                <button type="button" class="btn btn-danger supprimerDiplome">Supprimer</button>
                                            `;
                                            diplomesContainer.appendChild(newDiplome);

                                            // Attacher l'événement de suppression
                                            attachDeleteHandlers();
                                        });

                                        function attachDeleteHandlers() {
                                            document.querySelectorAll('.supprimerDiplome').forEach(function(button) {
                                                button.addEventListener('click', function() {
                                                    this.closest('.diplome').remove();
                                                });
                                            });
                                        }

                                        // Initialement attacher les gestionnaires pour les diplômes existants
                                        attachDeleteHandlers();
                                    </script>
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
        /*   $(document).ready(function() {
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
                <button type="button" class="btn btn-danger btn-sm supprimerDiplome">Supprimer ce diplôme</button>
            </div>
            `;

                    $('.diplomes-container').append(diplomeHtml);


                });

                $(document).on('click', '.supprimerDiplome', function() {
                    $(this).closest('.diplome').remove();
                });
            }); */
    </script>
@endsection
