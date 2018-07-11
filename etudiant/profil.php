<?php
require_once '../lib/functions.php';
require_once '../model/database.php';

getHeader("Espace étudiant");

?>

<?php
$id = $_SESSION['id'];
$etudiant = getEtudiant($id);
$departements = getAllDepartementByEtudiant($id);
$specialites = getAllSpecialiteByEtudiant($id);

?>

<section class="container-page profil">
<?php require_once '../layout/menu-etudiant.php';?>
<div class="zone-etudiants">
    
<img class="image-avatar" src="<?php echo SITE_URL ; ?>uploads/<?php echo $etudiant['avatar']?>">
<a class="btn" href="update-avatar.php">Modifier ou ajouter mon profil</a>
<h3><?php echo $etudiant['nom'] .' ' . $etudiant['prenom'];?></h3>
<h3><?php echo $etudiant['date_naissance_format'];?></h3>

<p><?php echo $etudiant['mail']; ?></p>
<p><?php echo $etudiant['telephone']; ?></p>
<h3>Niveau d'études</h3>
<p>Je suis en <?php echo $etudiant['labelniveau'] ?></p>


<h3>Mes spécialités</h3>
<?php foreach ($specialites as $specialite) : ?>
<p><?php echo $specialite['label']; ?></p>
<?php endforeach ;?>

<h3>Mon CV</h3>
<a href="<?php echo SITE_URL ; ?>uploads/<?php echo $etudiant['cv']; ?>"><?php echo $etudiant['cv']; ?></a>
<h3>Ma lettre de motivation</h3>
<a href="<?php echo SITE_URL ; ?>uploads/<?php echo $etudiant['lm']; ?>"><?php echo $etudiant['lm']; ?></a>


<a class="btn deconnection" href="update-profil.php">Modifier mon profil</a>
</div>

</section>
