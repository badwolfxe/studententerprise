<?php
require_once '../lib/functions.php';
require_once '../model/database.php';

if (!currentUserHasRole("etudiant")) {
    header("Location: ../index.php");
}

$id = $_SESSION['id'];
$etudiant = getEtudiant($id);
$departements = getAllDepartementByEtudiant($id);
$specialites = getAllSpecialiteByEtudiant($id);

getHeader("Espace étudiant");
?>

<section class="container-page profil">
    <?php require_once '../layout/menu-etudiant.php'; ?>
    <div class="zone-etudiants">
        <div class="container-avatar">   
            <img class="image-avatar" src="<?php echo SITE_URL; ?>uploads/<?php echo $etudiant['avatar'] ?>">
        </div> 

        <a class="btn btnbis" href="update-avatar.php">Modifier ou ajouter mon avatar</a>
        <div class="informations">
            <h3><?php echo $etudiant['nom'] . ' ' . $etudiant['prenom']; ?></h3>
            <p><?php echo $etudiant['date_naissance_format']; ?></p>
            <p><?php echo $etudiant['mail']; ?></p>
            <p><?php echo $etudiant['telephone']; ?></p>
        </div>
        <div class="informations">
            <h3>Niveau d'études</h3>
            <p>Je suis en <?php echo $etudiant['labelniveau'] ?></p>
        </div>
        <div class="informations">
            <h3>Mes spécialités</h3>
            <?php foreach ($specialites as $specialite) : ?>
                <p id="specialite-forme"><?php echo $specialite['label']; ?></p>
            <?php endforeach; ?>
        </div>
        <div class="informations">
            <h3>Date de contrat</h3>
            <p>De <?php echo $etudiant['date_debut_contrat_format'] ?> aux <?php echo $etudiant['date_fin_contrat_format'] ?>
            <p>Pendant <?php echo $etudiant["duree_contrat"]; ?> mois</p>
        </div>
        <div class="informations">
            <h3>Mon CV :</h3>
            <a class="importation" href="<?php echo SITE_URL; ?>uploads/<?php echo $etudiant['cv']; ?>"><?php echo $etudiant['cv']; ?></a>
        </div>
        <div class="informations">
            <h3>Ma lettre de motivation :</h3>
            <a class="importation" href="<?php echo SITE_URL; ?>uploads/<?php echo $etudiant['lm']; ?>"><?php echo $etudiant['lm']; ?></a>
        </div>
        <a class="btn btnbis deconnection" href="update-profil.php">Modifier mon profil</a>
    </div>

</section>

<?php getFooter(); ?>