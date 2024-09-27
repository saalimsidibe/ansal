@extends('layout.app')

@section('content')
    <main class="main">
        <div class="container">
            <h1>Télécharger des documents</h1>
            <form method="POST" action="{{ route('file.send') }}" id="sendFileForm" action="#" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="cv">Joindre votre CV</label><br>
                    <input type="file" name="cv" class="form-control" id="cv">
                    <button type="button" onclick="sendFile('cv')">Télécharger</button>
                    <span id="cvStatus"></span>
                    <span id="cv-name"></span>
                </div>

                <div class="form-group">
                    <label for="diplomes">Joindre un fichier unique composé de l'ensemble des
                                                diplomes et attestations</label><br>
                    <input type="file" name="diplomes" class="form-control" id="diplomes">
                    <button type="button" onclick="sendFile('diplomes')">Télécharger</button>
                    <span id="diplomesStatus"></span>
                    <span id="diplomes-name"></span>
                </div>

                <div class="form-group">
                    <label for="justifications_professionnelles">Joindre un fichier unique composé de l'ensemble des
                                                arrêtés justifiants les fonctions et responsabiltés
                                                professionnelles</label><br>
                    <input type="file" name="justifications_professionnelles" class="form-control" id="justifications_professionnelles">
                    <button type="button" onclick="sendFile('justifications_professionnelles')">Télécharger</button>
                    <span id="justifications_professionnellesStatus"></span>
                    <span id="justifications_professionnelles-name"></span>
                </div>

                <div class="form-group">
                    <label for="commites">Joindre un fichier unique justifiant l'appartenance à un
                                                ou plusieurs comités ou sociétés savantes</label><br>
                    <input type="file" name="commites" class="form-control" id="commites">
                    <button type="button" onclick="sendFile('commites')">Télécharger</button>
                    <span id="commitesStatus"></span>
                    <span id="commites-name"></span>
                </div>

                <div class="form-group">
                    <label for="ouvrages">Joindre un fichier unique contenant l'ensemble de vos
                                                ouvrages .Pour chaque ouvrage il est demandé une à deux pages sur
                                                la/lesquelles on peut distinguer le titre, les auteurs et l'éditeur</label><br>
                    <input type="file" name="ouvrages" class="form-control" id="ouvrages">
                    <button type="button" onclick="sendFile('ouvrages')">Télécharger</button>
                    <span id="ouvragesStatus"></span>
                    <span id="ouvrages-name"></span>
                </div>

                <div class="form-group">
                    <label for="distinctions_honorifiques">Joindre un fichier unique contenant
                                                l'ensemble de vos distinctions honorifiques</label><br>
                    <input type="file" name="distinctions_honorifiques" class="form-control" id="distinctions_honorifiques">
                    <button type="button" onclick="sendFile('distinctions_honorifiques')">Télécharger</button>
                    <span id="distinctions_honorifiquesStatus"></span>
                    <span id="distinctions_honorifiques-name"></span>
                </div>

                <div class="form-group">
                    <label for="distinctions_scientifiques">Joindre un fichier unique contenant
                                                l'ensemble des distinctions scientifiques</label><br>
                    <input type="file" name="distinctions_scientifiques" class="form-control" id="distinctions_scientifiques">
                    <button type="button" onclick="sendFile('distinctions_scientifiques')">Télécharger</button>
                    <span id="distinctions_scientifiquesStatus"></span>
                    <span id="distinctions_scientifiques-name"></span>
                </div>
                <input type="submit">
            </form>
        </div>

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

            function sendFile(fileInputId) {
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
                        'X-CSRF-TOKEN': csrf_token
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
    </main>
@endsection