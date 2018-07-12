<form action="insert_utilisateur.php" method="post" class="form-signin inscription">
    <h2 class="h3 mb-3 font-weight-normal">Inscription</h2>
    
    <label>Tu es : </label>
    <select type="type" name="type">
        <option type="type" value="etudiant" >Étudiant</option>
        <option type="type" value="entreprise">Entreprise</option>  
    </select>

    <label for="email">Email</label>
    <input type="email" name="email" id="email" class="form-control" placeholder="Email" required autofocus>

    <label for="password">Mot de passe</label>
    <input type="password" name="password" id="password" class="form-control" placeholder="Mot de passe" required>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Valider</button>
</form>
