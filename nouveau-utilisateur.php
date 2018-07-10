<?php
require_once 'model/database.php';
?>

<form action="insert_utilisateur.php" method="post" class="form-signin inscription">
    <h1 class="h3 mb-3 font-weight-normal">Inscription</h1>
    
    <label>Tu es : </label>
    <select type="type" name="type">
        <option type="type" value="etudiant">Étudiant</option>
        <option type="type" value="entreprise">Entreprise</option>  
    </select>

    <label for="email" class="sr-only">Email</label>
    <input type="email" name="email" id="email" class="form-control" placeholder="Email" required autofocus>

    <label for="password" class="sr-only">Mot de passe</label>
    <input type="password" name="password" id="password" class="form-control" placeholder="Mot de passe" required>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Valider</button>
</form>

<?php require_once 'layout/footer.php'; ?>