<?php
require_once '../lib/functions.php';
require_once '../model/database.php';

$user = currentUser();
$etudiant = getEtudiant($user["id"]);

getHeader("Espace étudiant");
?>

<h1>Etudiant</h1>
<p>coucou</p>




<a class="btn deconnection" href="profil.php">Mon profil</a>

<a class="btn deconnection" href="../admin/logout.php">Se déco</a>

<a class="btn mdp" href="../mpd_form.php">Modifier son mot de passe</a>

<?php require_once '../layout/footer.php'; ?>
