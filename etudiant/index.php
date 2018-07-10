<?php
require_once '../lib/functions.php';
require_once '../model/database.php';

getHeader("Espace étudiant");
?>

<h1>Etudiant</h1>
<p>coucou</p>

<?php
$id = $_SESSION['id'];
$etudiant = getEtudiant($id);
$departements = getAllDepartementByEtudiant($id);
$specialites = getAllSpecialiteByEtudiant($id);

?>

<img src="images/<?php echo $etudiant['avatar']?>">

<h3><?php echo $etudiant['nom'] .' ' . $etudiant['prenom'];?></h3>
<h3><?php echo $etudiant['date_naissance_format'];?></h3>
<p><?php echo $etudiant['mail']; ?></p>
<p><?php echo $etudiant['telephone']; ?></p>
<p><?php echo $etudiant['contrat']; ?></p>
<p><?php echo $etudiant['cv']; ?></p>
<p><?php echo $etudiant['lm']; ?></p>

<?php foreach ($departements as $departement) : ?>
<p><?php echo $departement['label']; ?></p>
<?php endforeach ;?>

<?php foreach ($specialites as $specialite) : ?>
<p><?php echo $specialite['label']; ?></p>
<?php endforeach ;?>


<a class="btn deconnection" href="../admin/logout.php">Se déco</a>

<a class="btn mdp" href="../mpd_form.php">Modifier son mot de passe</a>

<?php require_once '../layout/footer.php'; ?>
