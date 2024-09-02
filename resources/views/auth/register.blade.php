<form method="POST" action="{{ route('register') }}">
    @csrf
    <label for="name">Nom:</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Mot de passe:</label>
    <input type="password" id="password" name="password" required>

    <label for="password_confirmation">Confirmer le mot de passe:</label>
    <input type="password" id="password_confirmation" name="password_confirmation" required>

    <label for="category">Catégorie:</label>
    <select id="category" name="category" required>
        <option value="medecine">Medecine</option>
        <option value="litterature">Litterature</option>
        <option value="sciences">Sciences et Techniques</option>
        <option value="agricole">Sciences naturelles et Agricole</option>
        <option value="economie">Sciences économiques</option>
        <!-- Ajoute d'autres catégories si nécessaire -->
    </select>

     <button type="submit">S'inscrire</button>
    
</form>