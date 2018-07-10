<?php
require_once 'lib/functions.php';
require_once 'model/database.php';

$liste_etudiant = getAllEtudiant();

// Déclaration des variables
/*$list_projects = getAllProjects(3);*/

getHeader("Accueil");
?>

<header class="home-banner">
 
</header>


<div class="formulaire-connexion">
    
     <section>
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
    </section> 
    
    <br>
    
    <?php include 'nouveau-utilisateur.php'; ?>
    
    
</div>

<section class="liste-etudiant">

<?php foreach ($liste_etudiant as $etudiant) : ?>
    <div class="etudiant-carte">
    <?php $avataruser = getAllAvatarsbyEtudiant($etudiant['id']); ?>
    <div>
        <?php foreach ($avataruser as $avatar) : ?>
        <?php echo $avatar ['avatar'] ?>
         <?php endforeach; ?>
    </div>
            
    <p> <?php echo $etudiant['nom'] ?> - <?php echo $etudiant['prenom'] ?></p>
        
    
    <?php $liste_departement = getAllDepartements($etudiant['id']); ?>
    <?php foreach ($liste_departement as $departement) : ?>
    <p><?php echo $departement['labeldepartement'] ?></p>                    
        
        <?php endforeach; ?>
    
    
        <p>Je suis en <?php echo $etudiant['labelniveau'] ?></p>
        
        <p>Je suis à la recherche de <?php echo $etudiant['labelcontrat'] ?></p>
    
</div>

 <?php endforeach; ?>
    
    </section>
        
<?php getFooter(); ?>

