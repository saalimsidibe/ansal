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
                        <li>Etape4</li>
                        <li>Etape5</li>
                        <li>Etape6</li>
                        <li>Etape7</li>
                        <li class="current"> <a href="#">Etape Finale</a></li>
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
                                <div class="card-head info bg-light">
                                    <H3>Pieces Justificatives</H3>
                                </div>
                                <div class="card-body">

                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <div class="form-group">
                                            <label for="cvchercheurDoc">Joindre une copie de votre cv</label><br>
                                            <input type="file" class="form-control" name="cvchercheurDoc" id="cvchercheurDoc">
                                            <button type="button" onclick="uploadFile('cvchercheurDoc')">Telecharger</button>
                                            <span id="cvchercheurDocStatus"></span>

                                        </div>
                                        <div class="form-group">
                                            <label for="dipChercheurDoc">Joindre un fichier unique composé de l'ensemble des
                                                diplomes et attestations</label> <br>
                                            <input type="file" class="form-control" name="dipChercheurDoc" id="dipChercheurDoc">
                                            <button type="button" onclick="uploadFile('dipChercheurDoc')">Telecharger</button>
                                            <span id="dipChercheurDocStatus"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="fonction">Joindre un fichier unique composé de l'ensemble des
                                                arrêtés justifiants les fonctions et responsabiltés
                                                professionnelles</label><br>
                                            <input type="file" class="form-control"
                                                name="fonctionDoc" id="fonctionDoc">
                                            <button type="button"
                                                onclick="uploadFile('fonctionDoc')">Telecharger</button>
                                            <span id="fonctionDocStatus"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="commite">Joindre un fichier unique justifiant l'appartenance à un
                                                ou plusieurs comités ou sociétés savantes</label><br>
                                            <input type="file" class="form-control" name="commites" id="commites">
                                            <button type="button" onclick="uploadFile('commites')">Telecharger</button>
                                            <span id="commitesStatus"></span>
                                        </div>


                                        <div class="form-group">
                                            <label for="ouvrageDoc">Joindre un fichier unique contenant l'ensemble de vos
                                                ouvrages .Pour chaque ouvrage il est demandé une à deux pages sur
                                                la/lesquelles on peut distinguer le titre, les auteurs et l'éditeur</label>
                                            <input type="file" name="ouvrageDoc" class="form-control" id="ouvrageDoc">
                                            <button type="button" onclick="uploadFile('ouvrageDoc')">Telecharger</button>
                                            <span id="ouvrageDocStatus"></span>
                                        </div>

                                        <div class="form-group">
                                            <label for="distinctionsHonorifiquesDoc">Joindre un fichier unique contenant
                                                l'ensemble de vos distinctions honorifiques</label>
                                            <input type="file" name="distinctionsHonorifiquesDoc" class="form-control"
                                                id="distinctionsHonorifiquesDoc">
                                            <button type="button"
                                                onclick="uploadFile('distinctionsHonorifiquesDoc')">Telecharger</button>
                                            <span id="distinctionsHonorifiquesDocStatus"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="distinctionsScientifiquesDoc">Joindre un fichier unique contenant
                                                l'ensemble des distinctions scientifiques </label><br>
                                            <input type="file" name= "distinctionsScientifiquesDoc" class="form-control"
                                                id="distinctionsScientifiquesDoc">
                                            <button type="button"
                                                onclick="uploadFile('distinctionsScientifiquesDoc')">Telecharger</button>
                                            <span id="distinctionsScientifiquesDocStatus"></span>
                                        </div>

                                    <form method="POST" id="fileUploadForm" action="{{ route('AutreControllerNouveau.finir') }}" enctype="multipart/form-data">
                                        @csrf
                                        <button type="submit" class="btn btn-danger mt-4" a
                                            href="{{ route('resume') }}">Suivant</button>


                                    </form>




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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        let csrf_token = "{{ csrf_token() }}";
        document.addEventListener('DOMContentLoaded', function() {
            const fileInputs = document.querySelectorAll('input[type="file"]');
            fileInputs.forEach(input => {
                input.addEventListener('change', function() {
                    const fileName = this.files[0]?.name || 'Aucun fichier sélectionné';
                    const spanId = this.id + '-name';
                    document.getElementById(spanId).textContent = fileName;
                });
            });
        });

        function uploadFile(fileInputId) {
            let formData = new FormData();
            let fileInput = document.getElementById(fileInputId);
            let statusSpan = document.getElementById(fileInputId + 'Status');

            if (fileInput.files.length === 0) {
                alert("Veuillez sélectionner un fichier.");
                return;
            }


            formData.append("csrf_token", csrf_token);

            formData.append(fileInput.name, fileInput.files[0]);

            $.ajax({
                url: '{{ route('multi-step-form.upload') }}', // Assurez-vous que cette route est correcte
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': csrf_token //$('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    statusSpan.innerHTML = "Fichier téléchargé avec succès.";
                    statusSpan.style.color = 'green';
                },
                error: function(xhr) {
                    statusSpan.innerHTML = "Erreur lors du téléchargement du fichier.";
                    statusSpan.style.color = 'red';
                }
            });
        }
    </script>
