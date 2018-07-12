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

<section class="home-banner">


<div class="formulaire-connexion">
        <form action="login.php" method="POST">
             <h2 class="h3 mb-3 font-weight-normal">Connexion</h2>
            <div>
                <label>Email :</label>
                <input type="email" name="email" placeholder="hello@gmail.com">
            </div>
            <div>
                <label>Mot de passe :</label>
                <input type="password" name="password" placeholder="Mot de passe">
            </div>
            <input type="submit">
        </form>
    <br>
    
    <?php include 'nouveau-utilisateur.php'; ?>
    <p>En validant votre inscription vous acceptez <a href="">nos conditions d'utilisation.</a></p>
</div>
    
    </section>
    

<?php getFooter(); ?>

