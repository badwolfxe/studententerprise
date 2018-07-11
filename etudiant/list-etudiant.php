<?php
require_once '../lib/functions.php';
require_once '../model/database.php';

getHeader("Espace étudiant");
?>

<h1>Trouvez l'élu</h1>

<?php
$etudiants = getAllEtudiant();

?>

<?php foreach ($etudiants as $etudiant) : ?>
<img src="images/<?php echo $etudiant['avatar']?>">

<h3><?php echo $etudiant['nom'] .' ' . $etudiant['prenom'];?></h3>
<h3><?php echo $etudiant['date_naissance_format'];?></h3>
<p><?php echo $etudiant['mail']; ?></p>
<p><?php echo $etudiant['telephone']; ?></p>
<p><?php echo $etudiant['contrat']; ?></p>
<?php endforeach ;?>


<a class="btn deconnection" href="../admin/logout.php">Se déco</a>

<a class="btn mdp" href="../mpd_form.php">Modifier son mot de passe</a>

<?php require_once '../layout/footer.php'; ?>
