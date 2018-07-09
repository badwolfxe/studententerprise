<?php
require_once 'lib/functions.php';
require_once 'model/database.php';

// Déclaration des variables
/*$list_projects = getAllProjects(3);*/

getHeader("Accueil");
?>

<header class="home-banner">
 
</header>


<div class="formulaire-connexion">
    
 <?php include 'admin/login.php'; ?>
    
    <br>
    
    <?php include 'nouveau-utilisateur.php'; ?>
    
    
</div>





<?php getFooter(); ?>