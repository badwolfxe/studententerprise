<?php
require_once '../lib/functions.php';
require_once '../model/database.php';

getHeader("Espace entreprise");
?>

<h1>Entreprise</h1>
<p>coucou</p>

<?php
$id = $_SESSION['id'];
$entreprise = getEntreprise($id);

?>

<h3>Mes infos</h3>

<img src="images/<?php echo $entreprise['avatar']?>">

<h3><?php echo $entreprise['nom'] ;?></h3>
<p><?php echo $entreprise['mail']; ?></p>

<a class="btn mdp" href="../etudiant/list-etudiant.php">Trouver l'élu</a>


<a class="btn deconnection" href="../admin/logout.php">Se déco</a>

<a class="btn mdp" href="../mpd_form.php">Modifier son mot de passe</a>

<?php require_once '../layout/footer.php'; ?>
