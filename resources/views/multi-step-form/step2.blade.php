<!-- resources/views/multi-step-form/step2.blade.php -->



  {{ Session::get('step_data1')['nom']}} 


<form action="{{ route('multi-step-form.next') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="date_naissance" class="form-label">Date de naissance</label>
        <input type="date" class="form-control" id="date_naissance" name="date_naissance" required>
    </div>

    <div class="mb-3">
        <label for="titre" class="form-label">Titre (PT, MC)</label>
        <input type="text" class="form-control" id="titre" name="titre" required>
    </div>

    <!-- Autres champs de la deuxième étape -->

    <button type="submit" class="btn btn-primary">Suivant</button>
</form>
