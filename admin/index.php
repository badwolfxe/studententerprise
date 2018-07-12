<?php
require_once '../lib/functions.php';
require_once '../model/database.php';

$entreprises = getAllEntreprise();
$etudiants = getAllEtudiant();

if (!currentUserHasRole("admin")) {
    header("Location: ../index.php");
}

getHeader("Espace Admin");
?>

<section class="container-page">

    <h1>Admin</h1>

    <p>Controle de la plateforme</p>
       
        <a>
           <button id="test" name="etudiant" onclick="show1();">
                Etudiants
            </button>
        </a>

        <a>
           <button id="test" name="entreprise" onclick="show2();">
                Entreprise
            </button>
        </a>


<div class="liste_admin">
    <?php foreach ($etudiants as $key => $etudiant) : ?>
        <div id="liste-utilisateurs" style="width:100%;">
            <div>
              <h3>Avatar</h3>
               <img src="../uploads/<?php echo $utilisateur['avatar']; ?>">
            </div>
           
            <div>
              <h3>Nom</h3>
               <p><?php echo $etudiant['nom'] . ' ' . $etudiant['prenom']; ?></p>
            </div>
            
            <div>
              <h3>Mail</h3>
               <p><?php echo $etudiant['mail']; ?></p>
            </div>
            
            <div>
              <h3>Contrat</h3>
               <p><?php echo $etudiant['contrat']; ?></p>
            </div>
               
            <div>
              <h3>Valider</h3>
               <input type="checkbox" id="actif-<?php echo $key; ?>" data-id="<?php echo $etudiant['id']; ?>" name="actif" <?php echo ($etudiant['validation'] == 1) ? 'checked' : ''; ?> />
               <label for="actif-<?php echo $key; ?>">Actif <i class="fa fa-spinner fa-pulse fa-fw hidden"></i></label>
            </div>
        </div>
    <?php endforeach; ?>
    
    
    <?php foreach ($entreprises as $key => $entreprise) : ?>
        <div id="liste-entreprise" class="display" style="width:100%;">
            <div>
                 <h3>Logo</h3>
                 <img src=".../uploads/<?php echo $entreprise['avatar']; ?>">
            </div>
            <div>
                 <h3>Nom</h3>
                 <p><?php echo $entreprise['nom']; ?></p>
            </div>
            <div>
                 <h3>Mail</h3>
                 <p><?php echo $entreprise['mail']; ?></p>
            </div>
            <div>
                 <h3>Valider</h3>
                 <input type="checkbox" id="actif-<?php echo $entreprise['id']; ?>" data-id="<?php echo $entreprise['id']; ?>" name="actif" <?php echo ($entreprise['validation'] == 1) ? 'checked' : ''; ?> />
                <label for="actif-<?php echo $entreprise['id']; ?>">Actif <i class="fa fa-spinner fa-pulse fa-fw hidden"></i></label>
            </div>
        </div>
     <?php endforeach; ?>

</div>
</section>




<a class="btn deconnection" href="../admin/logout.php">Se déco</a>

<a class="btn mdp" href="../mpd_form.php">Modifier son mot de passe</a>

<?php require_once '../layout/footer.php'; ?>