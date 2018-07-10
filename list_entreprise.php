<?php
require_once 'lib/functions.php';
require_once 'model/database.php';

$liste_entreprise = getAllEntreprise();

// Déclaration des variables
/*$list_projects = getAllProjects(3);*/

getHeader("Accueil");
?>

<header class="home-banner">
 
</header>


<div class="formulaire-connexion">
    
<?php foreach ($liste_entreprise as $entreprise) : ?>
            
<p> <?php echo $entreprise['nom'] ?></p>
 <?php endforeach; ?>
    
    
</div>



<?php getFooter(); ?>