<?php
require_once '../lib/functions.php';
require_once '../model/database.php';

if (!currentUserHasRole("etudiant")) {
    header("Location: ../index.php");
}

$etudiants = getAllEtudiants();
$departement = getDepartementByEtudiant();


getHeader("Espace étudiant");
?>

<section class="container-page">

    <h1>Trouvez l'élu</h1>

    <?php foreach ($etudiants as $etudiant) : ?>

        <?php if (isset($etudiant['publication']) == 1) { ?>

            <img src="<?php echo SITE_URL; ?>uploads/<?php echo $etudiant['avatar'] ?>">

            <h3><?php echo $etudiant['nom'] . ' ' . $etudiant['prenom']; ?></h3>
            <h3><?php echo $etudiant['date_naissance_format']; ?></h3>
            <p><?php echo $etudiant['mail']; ?></p>
            <p><?php echo $etudiant['telephone']; ?></p>
            <p><?php echo $etudiant['contrat']; ?></p>

        <?php }endforeach; ?>


    <a class="btn deconnection" href="../admin/logout.php">Se déco</a>

    <a class="btn mdp" href="../mpd_form.php">Modifier son mot de passe</a>

</section>

<?php getFooter(); ?>
