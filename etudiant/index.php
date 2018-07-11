<?php
require_once '../lib/functions.php';
require_once '../model/database.php';

$user = currentUser();

$etudiant = getEtudiant($user["id"]);

if (!isset($etudiant["id"])) {
    header("Location: ../index.php");
}


getHeader("Espace étudiant");
?>


<?php
$entreprises = getAllEntreprise();

?>
<section class="container-page">
<h1>Etudiant</h1>

<h3>Listes des entreprises</h3>
<?php foreach ($entreprises as $entreprise) :?>
<p><?php echo $entreprise['nom'] ?></p>

<a class="btn contact" href="mailto:<?php echo $entreprise['mail'] ?>">Contacter l'entreprise</a>

<?php endforeach; ?>



<a class="btn deconnection" href="profil.php">Mon profil</a>

<a class="btn deconnection" href="../admin/logout.php">Se déco</a>

<a class="btn mdp" href="../mpd_form.php">Modifier son mot de passe</a>

</section>

<?php require_once '../layout/footer.php'; ?>
