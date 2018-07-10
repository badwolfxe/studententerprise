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

?>

<h3><?php echo $etudiant['nom']; ?></h3>


<a class="btn deconnection" href="../admin/logout.php">Se déco</a>

<a class="btn mdp" href="../mpd_form.php">Modifier son mot de passe</a>

<?php require_once '../layout/footer.php'; ?>
