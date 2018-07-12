<?php
require_once 'lib/functions.php';
require_once 'model/database.php';

$user = currentUser();

if (!is_null($user['admin'])) {
    header('Location: admin/index.php');
} else if (!is_null($user['etudiant'])) {
    header('Location: etudiant/index.php');
} else if (!is_null($user['entreprise'])) {
    header('Location: entreprise/index.php');
}

$liste_etudiant = getAllEtudiant();

// Déclaration des variables
/*$list_projects = getAllProjects(3);*/

getHeader("Accueil");
?>

<header class="home-banner">
 
</header>


<div class="formulaire-connexion">
        <form action="login.php" method="POST">
            <div>
                <label>Email :</label>
                <input type="email" name="email">
            </div>
            <div>
                <label>Mot de passe :</label>
                <input type="password" name="password">
            </div>
            <input type="submit">
        </form>
    
    <br>
    
    <?php include 'nouveau-utilisateur.php'; ?>
    
    
</div>


<?php getFooter(); ?>

