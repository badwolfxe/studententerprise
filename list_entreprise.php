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


<div class="liste-entreprises">
   <img src="images/<?php echo $entreprise['avatar'] ?>" alt="photo_profil" style="height:200px;">
   <h3>Cette entreprise est interessée par ton profil, contacte-la </h3>
    
<?php foreach ($liste_entreprise as $entreprise) : ?>
            
<p> <?php echo $entreprise['nom'] ?></p>
<p> <?php echo $entreprise['mail'] ?></p>
<button>Voir l'annonce</button>
 <?php endforeach; ?>
    
    
    
</div>



<?php getFooter(); ?>