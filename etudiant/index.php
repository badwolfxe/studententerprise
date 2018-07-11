<?php
require_once '../lib/functions.php';
require_once '../model/database.php';

$user = currentUser();
$etudiant = getEtudiant($user["id"]);

getHeader("Espace étudiant");
?>

<h1>Etudiant</h1>
<p>coucou</p>

<img src="uploads/<?php echo $etudiant['avatar']?>">

<h3><?php echo $etudiant['nom'] .' ' . $etudiant['prenom'];?></h3>
<h3><?php echo $etudiant['date_naissance_format'];?></h3>
<p><?php echo $etudiant['mail']; ?></p>
<p><?php echo $etudiant['telephone']; ?></p>
<?php echo $etudiant['contrat']; ?>

<?php foreach ($departements as $departement) : ?>
<p><?php echo $departement['label']; ?></p>
<?php endforeach ;?>

<?php foreach ($specialites as $specialite) : ?>
<p><?php echo $specialite['label']; ?></p>
<?php endforeach ;?>

<a href="<?php echo SITE_URL ; ?>/uploads/<?php echo $etudiant['cv']; ?>"><?php echo $etudiant['cv']; ?></a>

<a href="<?php echo SITE_URL ; ?>/uploads/<?php echo $etudiant['lm']; ?>"><?php echo $etudiant['lm']; ?></a>



<a class="btn deconnection" href="profil.php">Mon profil</a>

<a class="btn deconnection" href="../admin/logout.php">Se déco</a>

<a class="btn mdp" href="../mpd_form.php">Modifier son mot de passe</a>

<?php require_once '../layout/footer.php'; ?>
