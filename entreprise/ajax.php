<?php
require_once '../lib/functions.php';
require_once '../model/database.php';

$etudiants = getAllEtudiants($_POST);
?>
<div class="AllSudents">
    <?php if (count($etudiants) > 0) : ?>
        <section class="students">
            <?php foreach ($etudiants as $etudiant) : ?>

                <div class="details">
                    <img src="../uploads/<?php echo $etudiant['avatar'] ?>">

                    <div class="details_text">
                        <h3><?php echo $etudiant['nom'] . ' ' . $etudiant['prenom']; ?></h3>
                        <h3><?php echo $etudiant['date_naissance_format']; ?></h3>
                        
                        <a  class="doc_etudiant" target="_blank" href="<?php echo SITE_URL; ?>uploads/<?php echo $etudiant['cv']; ?>"><?php echo $etudiant["cv"] ?></a>
                        <br>
                        <a class="doc_etudiant" target="_blank" href="<?php echo SITE_URL; ?>uploads/<?php echo $etudiant['lm']; ?>"><?php echo $etudiant['lm']; ?></a>
        
                        <p>Je recherche un(e) <?php echo $etudiant['contrat']; ?> de 

                            <?php echo $etudiant["duree_contrat"] ?>
                        </p>
                    </div>

                    <div class="details_contact">
                        <a href="mailto:<?php echo $etudiant['mail']; ?>"><i class="fa fa-3x fa-envelope" aria-hidden="true"></i></a>
                        <a href="tel:<?php echo $etudiant['telephone']; ?>"><i class="fa fa-3x fa-phone-square" aria-hidden="true"></i></a>
                    </div>
                </div>
            <?php endforeach; ?>

        </section>
    <?php else: ?>
        <p>Aucun étudiant trouvé</p>
    <?php endif; ?>
</div>
