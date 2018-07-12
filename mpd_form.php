<?php
require_once 'lib/functions.php';
require_once 'model/database.php';

getHeader("Modification profil");
?>

<section class="container-page menu-formulaire">
    <?php require_once 'layout/menu-etudiant.php';?>
<div class="formulaire">
<h1>Réinitialiser votre mot de passe</h1>

<form action="mdp_query.php" method="POST">
   
    <div>
        <label>Email :</label>
        <input type="email" name="libelle_email">
    </div>
    
    <br>
    
    <div>
        <label>Mot de passe :</label>
        <input type="password" name="libelle_mot_de_passe">
    </div>

    <input type="submit" class="btn">

</form>
</div>

</section>


