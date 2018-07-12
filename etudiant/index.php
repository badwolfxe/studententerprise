<?php
require_once '../lib/functions.php';
require_once '../model/database.php';

if (!currentUserHasRole("etudiant")) {
    header("Location: ../index.php");
}

$entreprises = getAllEntreprise();

getHeader("Espace étudiant");
?>
<section class="container-page">
    <h1>Etudiant</h1>

    <h3>Listes des entreprises</h3>
    <?php foreach ($entreprises as $entreprise) : ?>
        <?php if (isset($entreprise['validation']) == 1) : ?>
            <p><?php echo $entreprise['nom'] ?></p>
            <a class="btn btnbis" href="mailto:<?php echo $entreprise['mail'] ?>">Contacter l'entreprise</a>
        <?php endif; ?>
    <?php endforeach; ?>



    <a class="btn deconnection" href="profil.php">Mon profil</a>

    <a class="btn deconnection" href="../admin/logout.php">Se déco</a>

    <a class="btn mdp" href="../mpd_form.php">Modifier son mot de passe</a>

</section>

<?php getFooter(); ?>
